<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/24
 * Time: 14:43
 */
/*
 * 一个函数只完成一个功能
 * 输出字符串
 */
function saySth(){
    echo "this is my first php file<br/>";
}
/*
 * 函数执行原理
 * 函数不调用不执行，当封装完函数之后将其载入到内存中，当调用函数的时候，执行函数体
 * 当碰到return语句，或者执行到函数的末尾，在将控制权移交到调用的函数的位置上，接着程序继续向下执行
 */
saySth();

//函数名称不区分大小写
echo STRTOLOWER('IMOOC').'<br/>';


/*
 * 监测函数名称是否存在
 * function_exists($funcName) : 如果存在返回true , 否则返回false
 */
var_dump(function_exists('saySth'));