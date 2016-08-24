<?php
/**
 * Created by PhpStorm.
 * User: chendongnan
 * Date: 16/8/19
 * Time: 下午1:54
 */

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showIndex()
    {
        return view('index/index');
    }

    public function search(Request $request){
        return view('index/search');
    }

    public function merchantAuth(Request $request){
        return view('auth/authentication/authentication');
    }
}