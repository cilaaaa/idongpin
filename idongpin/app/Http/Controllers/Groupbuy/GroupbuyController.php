<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/29
 * Time: 10:06
 */

namespace App\Http\Controllers\Groupbuy;

use App\PCModels\Launch_Tg;
use App\PCModels\LaunchOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupbuyController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('groupPurchase/index');
    }
}