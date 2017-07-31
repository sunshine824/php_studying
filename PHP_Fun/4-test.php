<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 10:05
 */
header('content-type:text/html;charset=utf-8');
//变量的作用域
function test1()
{
    $i = 1;
    $j = 2;
    return $i + $j;
}
echo test1();

//var_dump($i,$j);
echo '<br/>';

$m=3;
$n=4;
function test2(){
    var_dump($m,$n);
}
//test2();

//局部变量--动态变量
function test3(){
    $i=1; //动态变量 调用之后立即释放
    $j=2;
    echo $i,'<br/>';
    echo $j,'<br/>';
}
test3();

//局部变量--动态变量
function test4(){
    static $i=1; //静态变量 会保存在静态内存中，不会释放
    echo $i,'<br/>';
    $i++;
}
test4();
test4();
test4();

var_dump($i);