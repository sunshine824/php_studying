<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 11:15
 */
header('content-type:text/html;charset=utf-8');
//可变函数的使用
$funName='md5';
echo $funName('king'); //md5()
echo '<br/>';
echo md5('king');
echo '<hr/>';

function test(){
    echo 'this is a test<br/>';
}
test();
$funName='test';
$funName();

//get_defined_functions() : 得到所有已定义的函数，返回是数组，包含系统函数和用户自定义函数
print_r(get_defined_functions());