<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 15:16
 */
header('content-type:text/html;charset=utf-8');
//递归函数的列子:自己调自己
function test($i){
    echo $i,'<br/>';
    --$i;
    if($i>=0){
        test($i);
    }
}

test(3);
echo '<br/>';


function test1($i){
    echo $i,'<br/>';
    if($i>=0){
        test1($i-1);
    }
    echo $i,'<br/>';
}
//test1(3);

function test3($i){
    echo $i,'<br/>';
    if($i>=0){
        //test1($i-1);
        $func=__FUNCTION__;//获取当前函数名
        $func($i-1);
    }
    echo $i,'<br/>';
}
test3(3);

