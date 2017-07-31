<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/31
 * Time: 10:53
 */
$filename='2.txt';
/*$handle=fopen($filename,'ab+');
fwrite($handle,PHP_EOL.'def');*/

//rewind()：重置指针
/*rewind($handle);
$res=fread($handle,filesize($filename));
fclose($handle);
var_dump($res);*/

$handle=fopen($filename,'rb+');

//ftruncate()：截断文件
ftruncate($handle,4);
fclose($handle);