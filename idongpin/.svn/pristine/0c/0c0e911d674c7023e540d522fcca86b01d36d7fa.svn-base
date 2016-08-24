<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/7/11
 * Time: 10:04
 */
namespace App\Http\Models;

trait FileFunction{
    function readAllFile($dir)
    {
        if ($file = scandir($dir)) {
            return $file;
        } else {
            return false;
        }
    }

    function readPic($dir){
        $img = array('gif','png','jpg');//所有图片的后缀名
        $pic = array();

        foreach ($img as $k => $v) {
            $pattern = $dir . '*.' . $v;

            if($all = glob($pattern)){
                foreach($all as $key=>$value) {
                    if($value==$dir.'view.'.$v){
                        array_splice($all,$key,1);
                        break;
                    }
                }
                $pic = array_merge($pic, $all);
            }
        }

        return $pic;
    }
}