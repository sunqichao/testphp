<?php



    $con = mysqli_connect('localhost','sunqichao','123456');

    if ($con)
    {
//        echo('链接成功');
    }else
    {
//        echo('链接失败');
    }

    if(mysql_selectdb('test'))
    {
//        echo('success');
    }else
    {
//        echo('failed');
    }


   if(mysql_query('insert into info(name) value("2laopo");'))
   {
       echo('insert success');
   }else
   {
       echo mysql_error();
       echo('insert failed');
   }
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-6-11
 * Time: 下午2:32
 */ 