<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-6-11
 * Time: 下午4:13
 */
header("Content-type:text/html;charset-utf-8");
define('HOST','127.0.0.1');
define('USERNAME','sunqichao');
define('PASSWORD','123456');

if(!$con = mysqli_connect(HOST,USERNAME,PASSWORD))
{
    echo mysql_error();
}

if(!mysql_selectdb('test'))
{
    echo mysql_error();
}

if(mysql_query('set names utf8'))
{
    echo mysql_error();
}

    $title = "开始学习php";
    $author = "facebokk mark";
    $description = "facebook me facebook me kuai kuai";
    $content = "gang cai gen mu ke wang de lao shi liao tian le ,ta wen wo shi zenme zhidao mukewang de ";
    $dateline = time();
    $insertsql = "insert into article(title, author,description,content,dateline) values('$title','$author','$description','$content',$dateline)";
    echo $insertsql;
    if(mysql_query($insertsql))
    {
        echo "send success";
    }else
    {
        //echo mysql_error();
    }