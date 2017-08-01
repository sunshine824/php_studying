<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/8/1
 * Time: 14:30
 */
require_once '../file_func.php';
$fileInfo=$_FILES['myFile'];
//var_dump($fileInfo);
var_dump(upload_file($fileInfo));
