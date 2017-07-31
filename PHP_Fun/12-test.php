<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 15:42
 */
/*
 * 通过require/require_once 包含文件不存在,会产生一个致命错误和一个警告，程序终止执行
 */
/*require 'common_func.php';

$filename='1.html';
echo getExt($filename);*/

/*
 * 通过include/include_once 包含文件不存在,会产生两个警告，程序继续执行
 */
/*include 'common_func1.php';

echo 'this is a test';*/
require 'common_func.php';

randCode(3,4);

echo '<br/>';

//sprinf 格式化
$number=123;
$number1=456;
$txt=sprintf("%1\$.2f<br/>%2\$.3f",$number,$number1);
echo $txt;

echo '<br/>';

$arr=[1,2,3,8,5];
echo max($arr);

echo '<br/>';

//日期函数
echo date('Y年m月d日 H:i:s');