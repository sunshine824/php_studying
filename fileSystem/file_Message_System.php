<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/28
 * Time: 10:53
 */
header('content-type:text/html;charset=utf-8');

/**
 * 文件信息相关API
 */
$filename = "./test.txt";

//filetype[$filename]：获取文件的类型，返回的是文件的类型
echo '文件类型为：', filetype($filename), '<br/>';

//filesize($filename)：获取文件大小
echo '文件大小为：', filesize($filename), '<br/>';

//filectime($filename)：获取文件创建时间，返回的是时间戳
echo '文件创建时间为：', date('Y年m月d日 H:i:s', filectime($filename)), '<br/>';

//filemtime($filename)：文件修改时间，返回时间戳
echo '文件修改时间为：', date('Y-m-d H:i:s', filemtime($filename)), '<br/>';

//fileatime($filename)：文件最后访问时间，返回时间戳
echo '文件最后访问时间为：', date('Y-m-d H:i:s',fileatime($filename)), '<br/>';

//is_readable,is_writable,is_executable：判断文件是否可读，可写，可执行
var_dump(
    is_readable($filename),
    is_writable($filename),
    is_executable($filename),
    is_writeable($filename)
);

//is_file()：检查是否是文件，并且文件存在
$filename1='./test1.txt';
var_dump(is_file($filename));
var_dump(is_file($filename1));
