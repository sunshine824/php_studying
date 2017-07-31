<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/31
 * Time: 10:27
 */
//如果文件不存在会创建
//如果文件存在，会先将文件内容截断为0，接着再开始写入
$filename='./1.txt';
//$handle=fopen($filename,'w');
$handle=fopen($filename,'ab+'); //追加
//fputs($handle,'this is a test'.PHP_EOL);
//fputs($handle,'hello world');
fwrite($handle,PHP_EOL.'hello cx');
fclose($handle);