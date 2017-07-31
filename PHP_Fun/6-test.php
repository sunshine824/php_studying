<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 10:48
 */
header('content-type:text/html;charset=utf-8');
$str='CheNxin';
$res=strtolower($str);
echo $res,'<br/>';
echo $str;

$arr=array('a','b','c','d');
$res=array_pop($arr);
var_dump($res);
var_dump($arr);

/*
 * 传值
 * 默认情况下，函数参数通过值传递，所以即使在函数内部改变参数的值也不会改变函数外部的值
 */
function test($i){
   $i+=10;
   var_dump($i);
}
$i=2;
test($i); //12
var_dump($i); //2

/*
 * 传引用
 * 可以通过在参数前添加&符号，代表通过引用传递参数，在函数内部对其所做操作影响其本身
 */
//取变量的地址
function test1(&$j){
    $j+=20;
    var_dump($j);
}
$m=5;
test1($m); //25
var_dump($m); //25