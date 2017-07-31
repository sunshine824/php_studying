<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 10:24
 */
header('content-type:text/html;charset=utf-8');
//在函数体内使用全局变量
$i = 2;
$j = 3;
function test1()
{
    var_dump($i, $j);
}

//test1();

/*
 * 第一种方式，通过global关键字调用全局变量
 */
function test2()
{
    //global $i;
    //global $j;
    global $i,$j;
    var_dump($i,$j);
    $i=3; //注意：这是是赋值给全局变量
    $j=5;
}
test2();
var_dump($i,$j);

function test3(){
    global $m,$n;
    $m=3;
    $n=4;
}
test3();
var_dump($m,$n);

/*
 * 第二种方式，通过$GLOBALS超全局变量
 */
$age=13;
$username='chexin';
$email='790168710@qq.com';
//print_r($GLOBALS);
function test4(){
    echo '用户名为：'.$GLOBALS['username'].'<br/>';
    echo '年龄为：'.$GLOBALS['age'].'<br/>';
    echo '邮箱为：'.$GLOBALS['email'].'<br/>';
    $GLOBALS['age']=22;
}
test4();
var_dump($age);