<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/28
 * Time: 15:24
 */
/**
 * 文件内容相关API
 */
$filename='./test22.txt';
//fopen()：打开指定文件，以指定方式打开
$handle=fopen($filename,'r');
var_dump($handle);

//fread()：读取文件
$res=fread($handle,3);
echo $res,'<br/>';

//ftell()：获取指针位置
echo ftell($handle),'<br/>';
echo fread($handle,3),'<br/>';
echo ftell($handle),'<br/>';
fread($handle,filesize($filename));
echo ftell($handle),'<br/>';
var_dump(fread($handle,2)); //指针已到末尾

//fseek($handle,$num)：重置指针
fseek($handle,0);
var_dump(fread($handle,20));

//fclose($handle)：关闭文件句柄
fclose($handle);
