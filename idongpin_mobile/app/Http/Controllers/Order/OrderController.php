<?php
/**
 * Created by PhpStorm.
 * User: chendongnan
 * Date: 16/8/23
 * Time: 下午2:12
 */

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrder()
    {
        return view('order/myOrder');
    }

    public function myCart()
    {
        return view('order/purcherCar');
    }

    public function payment()
    {
        return view('order/payment');
    }

    public function createOrder(){
        return view('order/createOrder');
    }
}