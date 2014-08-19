<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-8-11
 * Time: 下午3:06
 */
require_once('./SqcDataFormat.php');
$TestArr = array(
    'idnum'=>1,
    'name'=>'hu yun xiang',
    'name2'=>'hu yun xiang2',
    'numbers'=>array('w','r','sun',array(1,2,3)),
);

//SqcDataFormat::json(200,'shu ju fan hui cheng gong',$TestArr);

SqcDataFormat::show(200,'xiao zhu zhu',$TestArr,"array");











