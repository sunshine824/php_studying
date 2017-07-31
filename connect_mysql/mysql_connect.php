<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/27
 * Time: 13:38
 */
header('content-type:text/html;charset=utf-8');

//1.连接数据库
$link = @mysql_connect('localhost', 'root', 'cx19950824') or die('数据库连接失败！');;

//2.选择数据库
mysql_select_db('test') or die('数据库不存在');

//3.设置字符集
mysql_set_charset('utf8');

//4.1 insert 插入数据
//$result = mysql_query("INSERT INTO userinfo VALUES (NULL,'陈鑫','cx19950824')");

//4.2 修改数据
//$result = mysql_query("UPDATE userinfo SET username='cx' where id=1");

//4.3 删除数据
//$result=mysql_query("delete from userinfo where id=2");

//4.4 删除数据表
//$result=mysql_query("drop table test");

//4.5 查询数据
$result=mysql_query("select * from userinfo");
//$line=mysql_fetch_row($result);  //返回是索引数组
//$line=mysql_fetch_assoc($result);  //返回的是关联数组

/*
 * MYSQL_ASSOC 返回关联数组 == mysql_fetch_assoc
 * MYSQL_NUM  返回索引数组 == mysql_fetch_row
 * MYSQL_BOTH 返回混合数组
 */
//$line=mysql_fetch_array($result,MYSQL_ASSOC);

while ($line=mysql_fetch_array($result,MYSQL_ASSOC)){
    $data[]=$line;
}

var_dump($data);

//关闭数据库连接
mysql_close($link);
