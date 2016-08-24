<?php
/**
 * Created by PhpStorm.
 * Author: Cila
 * Date: 2016/6/29
 * Time: 14:51
 */

namespace App\Http\Models;

trait PhoneMessage{
    public function sendPhoneMessageByModule($phone,$tplId,$code){
        header("Content-Type:text/html;charset=utf-8");
        $apikey = "e1d0aa91e41c52cc8a6398bf1877b3f4"; //修改为您的apikey(https://www.yunpian.com)登陆官网后获取
        $ch = curl_init();

        /* 设置验证方式 */

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded','charset=utf-8'));

        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $data=array('tpl_id'=>$tplId,'tpl_value'=>('#code#').'='.urlencode($code),'apikey'=>$apikey,'mobile'=>$phone);
        $json_data = $this::tpl_send($ch,$data);
        $array = json_decode($json_data,true);
        return $array;
    }

    function tpl_send($ch,$data){
        curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/sms/tpl_single_send.json');
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        return curl_exec($ch);
    }
}