<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/27
 * Time: 14:37
 */
header('content-type:text/html;charset=utf-8');

$connect = mysqli_connect('localhost', 'root', 'cx19950824', 'test');

mysqli_query($connect, 'set names utf8');

$sql = "select * from userinfo";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

var_dump($data);

mysqli_close($connect);