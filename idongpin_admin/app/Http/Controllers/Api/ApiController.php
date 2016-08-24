<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Company;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    /**
     * API首页
     *
     * 欢迎来到i冻品api首页
     *
     */
    public function index(){

    }

    /**
     * 获取单个商铺信息
     *
     * @param  string  $companyid
     * @return App/Company
     */

    public function companyinfo(Request $request){
        if(isset($request->companyid)){
            $company = Company::where('company_id',$request->companyid)->first();
            if($company){
                return new JsonResponse($company,200);
            }else{
                $error['msg'] = '查无此商铺';
                return new JsonResponse($error,400);
            }
        }else{
            $error['msg'] = '缺少参数';
            return new JsonResponse($error,400);
        }
    }
}
