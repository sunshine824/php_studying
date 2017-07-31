<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/31
 * Time: 11:01
 */
header('content-type:text/html;charset=utf-8');

$filename='./2.txt';
$handle=fopen($filename,'rb+');
//echo fgetc($handle),'<br/>';

//feof()：判断指针是否到文件末尾
while(!feof($handle)){
    //一个字符一个字符读取
    //echo fgetc($handle),'<br/>';

    //一行一行读取
    //echo fgets($handle),'<br/>';

    //一行一行读取，并且过滤HTML标记
    //strip_tags()： 从字符串中去除 HTML 和 PHP 标记
    //echo strip_tags(fgets($handle)).'<br/>';
    echo fgetss($handle),'<br/>';
}