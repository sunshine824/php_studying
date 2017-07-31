<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/28
 * Time: 13:33
 */
/**
 * pathfile()：文件路径相关信息
 */
header('content-type:text/html;charset=utf-8');

$filename = './test.txt';
$pathinfo = pathinfo($filename);
print_r($pathinfo);
/*
    Array
    (
        [dirname] => .            //当前目录
        [basename] => test.txt    //文件名
        [extension] => txt        //扩展名
        [filename] => test        //主文件名
    )
 */
echo '文件扩展名：', pathinfo($filename, PATHINFO_EXTENSION),'<br/>';

$filename1=__FILE__;
echo $filename1,'<br/>';
echo pathinfo($filename1,PATHINFO_DIRNAME),'<br/>';
echo pathinfo($filename1,PATHINFO_BASENAME),'<br/>';
echo pathinfo($filename1,PATHINFO_EXTENSION),'<br/>';
echo pathinfo($filename1,PATHINFO_FILENAME),'<br/>';

//basename()：返回路径中的文件名部分
echo basename($filename1),'<br/>';
echo basename($filename1,'.php'),'<br/>';

//dirname()：返回文件名中路径部分
echo dirname($filename1),'<br/>';

//file_exists()：检查文件或目录是否存在
var_dump(file_exists($filename));














