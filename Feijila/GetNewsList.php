<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-6-16
 * Time: 上午10:04
 */
    header("Content-type:text/html;charset=utf-8");

    echo('fei ji la ');

    echo('<br> <br>');
    if($con = mysqli_connect('localhost','sunqichao','123456'))
    {
        echo('链接成功');
    }else
    {
        echo('链接失败');
    }
    echo('<br> <br>');

    if(mysql_select_db('test'))
    {
        echo('选择数据库成功');
    }else
    {
        echo('选择数据库失败');
    }
    echo('<br> <br>');
    mysql_query('set names utf8');
//    $insert = 'insert into info(name) values("itouch")';

    if(mysql_query($insert))
    {
        echo '插入成功';
    }else
    {
        echo '插入失败';
    }
    echo('<br> <br>');

    $query = mysql_query("select name from info");

    while($row=mysql_fetch_row($query))
    {
        print_r($row);
        echo('<br> <br>');
    }




