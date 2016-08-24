<?php
/**
 * Created by PhpStorm.
 * User: chendongnan
 * Date: 16/8/10
 * Time: 下午12:12
 */
namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Company;
use App\Http\Controllers\Controller;

class CompanyAjax extends Controller{
    private function mkDirs($path){
        if(is_dir($path)){//已经是目录了就不用创建
            return true;
        }
        if(is_dir(dirname($path))){//父目录已经存在，直接创建
            return mkdir($path);
        }
        $this->mkDirs(dirname($path));//从子目录往上创建
        return mkdir($path);//因为有父目录，所以可以创建路径
    }

    public function img_upload(Request $request){
        if($request->imgtype == 'cursor'){
            if(!is_dir('/www/web/idongpin/storage/app/upload/company/'.$request->companyid)){
                $this->mkDirs('/www/web/idongpin/storage/app/upload/company/'.$request->companyid);
            }
            $path = '/www/web/idongpin/storage/app/upload/company/' .$request->companyid.'/'.$_FILES['images']['name'];
            copy($_FILES['images']['tmp_name'],$path);
            return new JsonResponse($path, 200);
        }
        return new JsonResponse($request, 200);
    }
}