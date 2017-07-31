<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/28
 * Time: 13:58
 */
/**
 * 文件相关操作的API
 * 文件创建、删除、剪切、重命名、拷贝
 */
header('content-type:text/html;charset=utf-8');

//touch($filename)：创建文件
$filename = 'test2.txt';
/*var_dump(touch($filename));*/

//unlink($filename)：删除指定文件
//var_dump(unlink($filename));

//检测文件是否存在则删除
if(file_exists($filename)){
    if(unlink($filename)){
        echo '文件删除成功！';
    }else{
        echo '文件删除失败！';
    }
}else{
    echo '文件不存在!';
}

//rename($oldname,$newname)：重命名或剪切文件
$newname = 'test22.txt';
if (file_exists($filename)) {
    if (rename($filename, $newname)) {
        echo '重命名成功！';
    } else {
        echo '重命名失败！';
    }
} else {
    echo '文件不存在！';
}

//将test22.txt剪切到test目录下test123.txt
$filename = 'test22.txt';
$path = '../../php_learn/test22.txt';
if (file_exists($filename)) {
    if (rename($filename,$path)) {
        echo '文件剪切成功！';
    }else{
        echo '文件剪切失败！';
    }
} else {
    echo '文件不存在！';
}

//copy($filename,$dest)：复制文件
$source='../test22.txt';
$dest='../fileSystem/test22.txt';
if(copy($source,$dest)){
    echo '拷贝成功！';
}else{
    echo '拷贝失败！';
}

//拷贝远程文件需要开启PHP配置文件中的allow_url_fopen=On
var_dump(copy('http://imgmini.eastday.com/pushimg/20170728/580x310_597a900c598c3.jpg','new.jpg'));

