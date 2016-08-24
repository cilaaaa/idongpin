<?php
/**
 * Created by PhpStorm.
 * User: chendongnan
 * Date: 16/8/23
 * Time: 下午3:59
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usercenter/index');
    }

}