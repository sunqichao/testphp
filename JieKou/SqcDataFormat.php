<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-8-12
 * Time: 下午3:11
 */


class SqcDataFormat
{
    const JSON = "json";

    /**
     * 按通用方式返回通讯数据
     * @param $code 状态码
     * @param string 提示信息
     * @param arra 数据
     * @param type 数据格式
     */
    public static function show($code,$message='',$data=array(),$type=self::JSON)
    {
        if(!is_numeric($code))
        {
            return'';
        }

        $type = isset($_GET['format'])?$_GET['format']:self::JSON;

        $result = array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );

        if ($type == 'json'){
            self::json($code,$message,$data);
            exit;
        }elseif ($type == 'array')
        {
            var_dump($result);
        }elseif ($type == 'xml')
        {
            self::xmlEncode($code,$message,$data);
            exit;
        }else
        {
            //
        }

    }


    /**
     * 按json方式返回通讯数据
     * @param $code 状态码
     * @param string 提示信息
     * @param arra 数据
     */
    public static function json($code,$message='',$data=array())
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

    /**
     * 按xml方式返回通讯数据
     * @param $code 状态码
     * @param string 提示信息
     * @param arra 数据
     */
    public static function xmlEncode($code,$message,$data=array())
    {
        if(!is_numeric($code))
        {
            return"";
        }

        $result = array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data,
        );

        header("Content-Type:text/xml");
        $xml = "<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml .= "<root>\n";
        $xml .= self::xmlToEncode($data);
        $xml .= "</root>\n";

        echo $xml;
    }

    public static function xmlToEncode($data){
        $xml=$attr="";
        foreach($data as $key => $value){
            if(is_numeric($key))
            {
                $attr = "id='{$key}'";
                $key = "item";
            }
            $xml.= "<{$key} {$attr}>";
            $xml.= is_array($value)?self::xmlToEncode($value):$value;
            $xml.= "</{$key}>\n";
        }
        return $xml;
    }

}

















