<?php

namespace App\Http\Controllers\Order;


use App\Madein;
use App\User;
use App\Order;
use App\LaunchOrder;
use App\ProProperty;
use App\Quote;
use App\Company;
use App\Product;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    private function getPageNum($data,$per_page){
        if(count($data) == 0){
            $page_number = 1;
        }else{
            $page_number = ceil(count($data) / $per_page );
        }
        return $page_number;
    }

    public function frame()
    {
        return view('admin/order/frame');
    }

    public function index()
    {
        return view('admin/order/index');
    }

    public function orderlist(Request $request)
    {
        $orders = Order::orderBy('order_time','desc')
            ->where('order_id','like','%'.(isset($request->keywords)?$request->keywords:"").'%');
        if($request->user()->user_type == 'admin'){
            $orders = $orders->get();
        }else if($request->user()->user_type == 'company'){
            $orders = $orders->where('company_id',$request->user()->company_id)->get();
        }
        foreach($orders as $k => $order){
            $orders[$k]['order_user_id'] = User::where('user_id',$order->order_user_id)->first()->user_name;
            $orders[$k]['company_id']  = Company::where('company_id',$order->company_id)->first()->company_name;
        }
        $orders = json_decode(json_encode($orders,true));
        $page_number = $this->getPageNum($orders,10);
        if (isset($request->page) && is_int((int)$request->page)) {
            $orders = array_slice($orders, ((int)$request->page - 1) * 10, 10);
        } else {
            $orders = array_slice($orders, 0, 10);
        }
        return view('admin/order/order_list', ['orders' => $orders,'page_number'=>$page_number]);
    }

    public function addOrderView(Request $request){
        $products = array();
        if($request->user()->user_type == 'admin'){
            $companies = Company::selectRaw('company_id,company_name')->get();
        }else{
            $companies = Company::where('company_id',$request->user()->company_id)->get();
            $product_ids = Product::where('company_id',$companies[0]['company_id'])->get();
            foreach($product_ids as $key => $product_id){
                $products[$key]['proid'] = $product_id->pro_id;
                $products[$key]['proname'] = ProProperty::where('property_name','pro_name')
                    ->where('pro_id',$product_id->pro_id)
                    ->first()->property_value;
            }
        }
        return view('admin/order/add',['companies'=>$companies,'products'=>$products]);
    }

    public function orderDetail(Request $request)
    {
        if (isset($request->orderid)) {
            $order = Order::where('order_id', $request->orderid)->first();
            if (!empty($order->launch_order_id)) {
                $proinfo = LaunchOrder::where('launch_order_id', $order->launch_order_id)->onlyTrashed()->first();
                $order['product_info'] = array(
                    'pro_name' => $proinfo->launch_order_name,
                    'pro_detail' => isset($proinfo->launch_order_detail)?$proinfo->launch_order_detail:"",
                );
            } else if (!empty($order->pro_id)) {
                $proinfoArr = ProProperty::selectRaw('property_name,property_value')
                    ->where('pro_id', $order->pro_id)
                    ->get();
                $proinfo = array();
                foreach ($proinfoArr as $k => $v) {
                    $proinfo[$v->property_name] = $v->property_value;
                }
                $order['product_info'] = array(
                    'pro_name' => $proinfo['pro_name'],
                    'pro_detail' => $proinfo['proinfo_desc'],
                );
            }
            $order->company_id = Company::where('company_id',$order->company_id)->first()->company_name;
            $order->order_user_id = User::where('user_id',$order->order_user_id)->first()->user_name;
            return view('admin/order/orderDetail', ['order' => $order]);
        } else {
            return redirect()->back();
        }
    }

    public function launchOrderManage(Request $request)
    {
        $orders = LaunchOrder::selectRaw('launch_order_id,launch_order_name,created_at,user_id')
            ->whereNull('canceled_at')
            ->where(function ($query){
                $query->where('launch_order_id','like','%'.(isset($request->keywords)?$request->keywords:"").'%')
                    ->orWhere('launch_order_name','like','%'.(isset($request->keywords)?$request->keywords:"").'%');
            })
            ->orderBy('created_at','desc')
            ->get();
        foreach ($orders as $k => $order) {
            $orders[$k]['user_name'] = User::where('user_id', $order->user_id)->first()->user_name;
            $quote_count = Quote::where('quote_launch_order_id', $order->launch_order_id)->count();
            if ($quote_count == 0) {
                $orders[$k]['quote_status'] = '暂未有人报价';
            } else {
                $orders[$k]['quote_status'] = '已有 ' . $quote_count . ' 人报价';
            }
        }
        $orders = json_decode(json_encode($orders,true));
        $page_number = $this->getPageNum($orders,10);
        if (isset($request->page) && is_int((int)$request->page)) {
            $orders = array_slice($orders, ((int)$request->page - 1) * 10, 10);
        } else {
            $orders = array_slice($orders, 0, 10);
        }
        return view('admin/order/launch_order/launch_order_manage', ['orders' => $orders,'page_number'=>$page_number]);
    }

    public function launchOrderDetail(Request $request)
    {
        if (isset($request->orderid)) {
            $order = LaunchOrder::where('launch_order_id', $request->orderid)->first();
            $order['quotes'] = Quote::where('quote_launch_order_id', $request->orderid)->get();
            foreach($order['quotes'] as $k => $value){
                $order['quotes'][$k]['company_name'] = Company::where('company_id',$value->quote_user_id)->first()
                    ->company_name;
            }
            $order['user_name'] = User::where('user_id', $order->user_id)->first()->user_name;
            if($request->user()->user_type == 'admin'){
                $companies = Company::selectRaw('company_id,company_name')->get();
            }else{
                $companies = Company::where('company_id',$request->user()->company_id)->get();
            }
            $madein = Madein::all();
            return view('admin/order/launch_order/launch_order_detail', ['order' => $order, 'companies' =>
                $companies,'madein'=>$madein]);
        } else {
            return redirect()->back();
        }
    }
}