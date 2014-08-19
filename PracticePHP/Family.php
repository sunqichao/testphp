<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-6-13
 * Time: 下午4:50
 */



//    $con = mysqli_connect("localhost","root","08024360e3");
    $con = mysqli_connect("localhost","sunqichao","123456");

    if (!$con)
    {
        die('Could not connect:'.mysql_error());
    }
    mysql_select_db("test");





//    mysql_close($con);

