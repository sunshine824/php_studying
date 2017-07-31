<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/31
 * Time: 10:15
 */
$filename = __DIR__ . '/test.txt';
//echo $filename;
//$handle=fopen($filename,'rb');
//echo fread($handle,filesize($filename));
//fclose($handle);

$handle = fopen($filename, 'rb+');
//fwrite()/fputs()：写入内容
//fwrite($handle,'test');
fwrite($handle,'abcdef',3);
fclose($handle);