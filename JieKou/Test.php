<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-8-11
 * Time: 下午2:49
 */

class Response
{
    /**
     * 按json方式返回通讯数据
     * @param $code 状态码
     * @param string 提示信息
     * @param arra 数据
     */
    public static function json_test($code,$message='',$data=array())
    {
        if(!is_numeric($code))
        {
            return'';
        }

        $result = array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );

        echo json_encode($result);
        exit;

    }

}



