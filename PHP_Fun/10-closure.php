<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 14:54
 */
header('content-type:text/html;charset=utf-8');
//匿名函数的形式
$func = function () {
    return 'this is a test';
};
echo $func();

echo '<br/>';

$func = function ($username) {
    return 'say hi to' . $username;
};
echo $func('chenxin');

echo '<br/>';

//通过create_function()
$func = create_function('', 'echo "this is a test...";');
$func();

echo '<br/>';

$array = [1, 2, 3, 4, 5];
$res=array_map(function ($var) {
    return $var*2;
},$array);
print_r($res);

echo '<br/>';

call_user_func(function ($username){
    echo 'hello '.$username;
    echo '<br/>';
    echo "hello {$username}";
},'chenxin');