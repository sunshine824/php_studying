<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/31
 * Time: 11:23
 */

//fgetcsv()：从文件指针中读入一行并解析 CSV 字段
/*$filename='user.csv';
$handle=fopen($filename,'rb+');
$rows=[];
while ($row=fgetcsv($handle)){
    $rows[]=$row;
}
print_r($rows);*/

//fputcsv()：将行格式化为 CSV 并写入文件指针
$filename = 'user2.csv';
$handle = fopen($filename,'wb+');
/*$data=[
    [1,'php','php是最好的语言'],
    [2,'js','js是最火的语言'],
    [3,'java','java是最难得语言']
];*/
$data=[
    ['id'=>1,'courseName'=>'ios','courseDesc'=>'this is a ios'],
    ['id'=>2,'courseName'=>'android','courseDesc'=>'this is a android'],
    ['id'=>3,'courseName'=>'ios','courseDesc'=>'this is a ios'],
];
foreach ($data as $val){
    fputcsv($handle,$val,'-');
}
fclose($handle);
