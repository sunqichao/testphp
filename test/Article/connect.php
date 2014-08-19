<?php

    require_once('config.php');

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
