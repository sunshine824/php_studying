<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/31
 * Time: 13:46
 */
$filename='./2.txt';

//file_get_contents()：将整个文件读入一个字符串
$string=file_get_contents($filename);
echo $string;
echo strip_tags($string);

//file_put_contents($filename,$data)：将一个字符串写入文件
//$data是字符串格式
//如果文件不存在，file_put_contents会自动创建文件
$res=file_put_contents($filename,'this is a test');
echo $res;

//serialize()：序列化
$data=['a','b','c'];
$data=serialize($data);
file_put_contents($filename,$data);
$res=file_get_contents($filename);

//unserialize()：反序列化
print_r(unserialize($res));


//将数组或对象转换为json之后再写入文件
//json_encode：对变量进行 JSON 编码
$data=[
    ['a','b','c'],
    ['d','e','f']
];
$data=json_encode($data);
file_put_contents($filename,$data);
$res=json_decode(file_get_contents($filename));
print_r($res);
