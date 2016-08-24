<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/29
 * Time: 10:06
 */

namespace App\Http\Controllers\Findorder;


use App\Http\Controllers\Controller;
use App\PCModels\Quote;
use Illuminate\Http\Request;
use Validator;
use App\PCModels\Madein;
use App\PCModels\LaunchOrder;

class FindorderController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    private function getPageNum($data,$per_page){
        if(count($data) == 0){
            $page_number = 1;
        }else{
            $page_number = ceil(count($data) / $per_page );
        }
        return $page_number;
    }

    private function countInterval($oldTime)
    {
        $newTime=time();
        $date=floor(($newTime-strtotime($oldTime))/86400);
        $hour=floor(($newTime-strtotime($oldTime))%86400/3600);
        $minute=floor(($newTime-strtotime($oldTime))%86400/60);
        $second=floor(($newTime-strtotime($oldTime))%86400%60);
        if($date>0)
        {
            return $date."天之前";
        }
        if($hour>0)
        {
            return $hour."小时之前";
        }
        if($minute>0)
        {
            return $minute."分钟之前";
        }
        return $second."秒之前";
    }

    public function index(Request $request)
    {
        $madein = Madein::all();
        $launchOrder = LaunchOrder::orderBy('created_at', 'desc')->get();
        foreach($launchOrder as $key => $value){
            if(Quote::where('quote_launch_order_id',$value->launch_order_id)->count()==0){
                $launchOrder[$key]['order_time_status'] = $this->countInterval($value->created_at);
            }else{
                $launchOrder[$key]['order_time_status'] = '买家比价中';
            }
        }
        $launchOrder = json_decode(json_encode($launchOrder));
        $page_number = $this->getPageNum($launchOrder,10);
        if (isset($request->page) && is_int((int)$request->page)) {
            $launchOrder = array_slice($launchOrder, ((int)$request->page - 1) * 10, 10);
        } else {
            $launchOrder = array_slice($launchOrder, 0, 10);
        }
        return view('findorder/index',['launchorders'=>$launchOrder,'madein'=>$madein,'page_number'=>$page_number]);
    }

    private function validateLaunchOrder(array $data){
        return Validator::make($data,[
            'launch_order_name' => 'required',
            'amount' => 'required',
            'limit_time_from' => 'required',
            'limit_time_to' => 'required',
            'shelf_life' => 'required'
        ]);
    }

    public function launchOrder(Request $request){
        $validator = $this->validateLaunchOrder($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $infoArr = array_except($request->all(),['_token']);
        $infoArr['user_id'] = $request->user()->user_id;
        LaunchOrder::create($infoArr);
        return redirect('/user/myLaunch');
    }
}