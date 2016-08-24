<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Validator;
use App\Http\Controllers\Controller;
use App\User;
use App\UserType;
use App\Group;
use App\Company;

class UserController extends Controller
{
    private function getPageNum($data,$per_page){
        if(count($data) == 0){
            $page_number = 1;
        }else{
            $page_number = ceil(count($data) / $per_page );
        }
        return $page_number;
    }

    public function index(){
        return view('admin/user/index');
    }

    public function user_list(Request $request){
        $users =  User::selectRaw('user_id,user_name,user_phone,user_type,groupid,status')
            ->where('user_name','!=','')
            ->where(function ($query){
                $query->where('user_id','like','%'.(isset($request->keywords)?$request->keywords:"").'%')
                    ->orWhere('user_name','like','%'.(isset($request->keywords)?$request->keywords:"").'%');
            })
            ->get();
        foreach ($users as $k => $user){
            $users[$k]['user_type'] = UserType::where('value',$user->user_type)->first()->text;
            $users[$k]['groupid'] = Group::where('value',$user->groupid)->first()->text;
            if($user->status==1){
                $users[$k]['status'] = '启用';
            }else{
                $users[$k]['status'] = '停用';
            }
        }
        $users = json_decode(json_encode($users,true));
        $page_number = $this->getPageNum($users,10);
        if (isset($request->page) && is_int((int)$request->page)) {
            $users = array_slice($users, ((int)$request->page - 1) * 10, 10);
        } else {
            $users = array_slice($users, 0, 10);
        }
        $user_types = UserType::all();
        $groups = Group::all();
        return view('admin/user/list',['users'=>$users,'page_number'=>$page_number,'usertypes'=>$user_types,
            'groups'=>$groups]);
    }

    public function userDetail(Request $request){
        $user = User::where('user_id',$request->userid)->first();
        $user_types = UserType::all();
        $groups = Group::all();
        $company =Company::all();
        return view('admin/user/userDetail',['user'=>$user,'usertypes'=>$user_types, 'groups'=>$groups,'company'=>$company]);
    }

    private function validateUserinfo(array $data,$option){
        if($option == 'add'){
            return Validator::make($data,[
                'user_phone' => 'required|unique:idp_user',
                'user_name' => 'required',
                'password' => 'required'
            ]);
        }else{
            return Validator::make($data,[
                'user_phone' => 'required',
                'user_name' => 'required',
            ]);
        }
    }

    public function update(Request $request){
        if(isset($request->do_method)){
            if($request->do_method == "add"){
                $info_arr = json_decode($request->userinfo,true);
                $validator = $this->validateUserinfo($info_arr,'add');
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                $info_arr['password'] = bcrypt($info_arr['password']);
                $info_arr['status'] = 1;
                User::create($info_arr);
            }else if($request->do_method == 'update'){
                $info_arr = json_decode($request->userinfo,true);
                $validator = $this->validateUserinfo($info_arr,'update');
                if ($validator->fails()) {
                    $this->throwValidationException(
                        $request, $validator
                    );
                }
                $userphone = $info_arr['user_phone'];
                $info_arr = array_except($info_arr,'user_phone');
                if(isset($info_arr['password']) && $info_arr['password']!=""){
                    $info_arr['password'] = bcrypt($info_arr['password']);
                }else{
                    $info_arr = array_except($info_arr,'password');
                }
                User::where('user_phone',$userphone)->update($info_arr);
            }else if($request->do_method == 'del'){
                User::where('user_id',$request->user_id)->delete();
            }else if($request->do_method == 'open'){
                User::where('user_id',$request->user_id)->update([
                    'status' => 1
                ]);
            }else if($request->do_method == 'close'){
                User::where('user_id',$request->user_id)->update([
                    'status' => 0
                ]);
            }
            return new JsonResponse(array('msg'=>'success'),200);
        }else{
            return new JsonResponse(array('msg'=>'缺少参数'),422);
        }
    }
}