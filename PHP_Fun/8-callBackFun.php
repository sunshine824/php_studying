<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 13:32
 */
header('content-type:text/html;charset=utf-8');
//回调函数的列子

function study(){
    echo 'studying...<br/>';
}
function play(){
    echo 'playing...<br/>';
}
function sing(){
    echo 'singing...<br/>';
}

function doWhat($funcName){
    echo '我正在';
    $funcName();
}

$funcName='study';
doWhat($funcName);

function study1($username){
    echo $username.' is studying...<br/>';
};
function play1($username){
    echo $username.' is playing...<br/>';
}

function doWhat1($funcName,$param){
    $funcName($param);
}
doWhat1('study1','chenxin');

$array=array(1,2,3,4,5);
function multiply($item){
    return $item*2;
}
$res=array_map('multiply',$array);
print_r($array);
echo '<br/>';
print_r($res);

$array=array(1,2,3,4,5,6,7,8);
function test(&$item){
    return $item*=3;
}
var_dump(array_walk($array,'test'));
print_r($array);

echo '<br/>';

$array=array(1,2,3,4,5,6,7,8,9);
function odd($var){
    if($var%2==1){
        return $var;
    }
}
$res=array_filter($array,'odd');
var_dump($res);