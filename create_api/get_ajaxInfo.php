<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/27
 * Time: 15:25
 */

header('Access-Control-Allow-Origin:*');
header('content-type:text/html;charset=utf-8');

$output = [];
$username = @$_POST['username'] ? $_POST['username'] : '';
$password = @$_POST['password'] ? $_POST['password'] : '';


if (empty($username) || empty($password)) {
    postInfo(null,'用户名或密码不能空',0);
    return;
}

$connect = mysqli_connect('localhost', 'root', 'cx19950824', 'test') or die('连接数据库失败！');

mysqli_query($connect, 'set names utf8');

$data = mysqli_fetch_all(mysqli_query($connect, "select username from userinfo"), MYSQLI_ASSOC);
$len = count($data);

if(checkInUsername($data,$len,$username)){
    $result = mysqli_query($connect, "insert into userinfo values (NULL,'$username','$password')");
    if($result){
        postInfo(null,'插入成功',1);
    }else{
        postInfo(null,'插入失败',0);
    }
}else{
    postInfo(null,'用户已存在',0);
}

/**
 * 判断用户名是否存在
 * @param Array $data          数据库查询数据
 * @param int $len             数据长度
 * @param string $username     用户名
 * @return bool
 */
function checkInUsername($data,$len,$username){
    for ($i = 0; $i < $len; $i++) {
        if($username==$data[$i]['username']){
            return false;
        }
    }
    return true;
}

/**
 * 数据返回函数
 * @param Array $data     //返回数据
 * @param string $info    //返回信息
 * @param int $code       //返回状态码
 */
function postInfo($data,$info,$code){
    $output = [
        'data' => $data,
        'info' => $info,
        'code' => $code
    ];

    echo json_encode($output);
}

mysqli_close($connect);

