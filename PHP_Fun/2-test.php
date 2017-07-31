<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/24
 * Time: 15:19
 */
header('content-type:text/html;charset=utf-8');
/*
 * 测试函数的返回值
 * 返回值通过return 返回值形式
 * 函数默认返回的是null
 * 返回值形式可以是任意类型
 */
if(!function_exists('test1')){
    function test1(){
        echo 'this is test1<br/>';
    }
}
var_dump(test1());

function test2(){
    return array(12,true,'chenxin');
    return 23;
}
echo test2()[0];
var_dump(test2());