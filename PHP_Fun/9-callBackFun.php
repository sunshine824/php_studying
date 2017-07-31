<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 14:21
 */
header('content-type:text/html;charset=utf-8');

//call_user_func() 和 call_user_func_array()的使用
function study1($username){
    echo $username.' is studying...<br/>';
};
function play1($username){
    echo $username.' is playing...<br/>';
}

function doWhat1($funcName,$param){
    $funcName($param);
}
//doWhat1('study1','chenxin');
call_user_func('study1','chenxin');



function add($x,$y){
    return $x+$y;
}
function reduce($x,$y){
    return $x-$y;
}
echo call_user_func('add',1,3);
echo '<br/>';
echo call_user_func_array('add',array(2,3));