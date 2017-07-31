<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/26
 * Time: 14:22
 */
header('content-type:text/html;charset=utf-8');
/*
 * 日期函数
 */

/*
 * date获取当前时间
 * 设置时区的方法
 * 一：date_default_timezone_set('Asia/ShangHai')
 * 二：修改php配置文件，php.ini
 */
//date_default_timezone_set('Asia/ShangHai'); //设置时区
echo date('Y年m月d日 H:i:s'); //必须设置时区，不然时间获取有误
echo '<br/>';


/*
 * time函数，获取时间戳
 */
echo '当前日期时间是：', date('Y年m月d日 H:i:s'), '<br/>';
echo '昨天日期时间是：', date('Y年m月d日 H:i:s', time() - 86400);  //86400一天的秒数
echo '<br/>';


/*
 * strtotime函数：将字符串转换成Unix时间戳
 */
echo '三个星期之前的时间戳是:', strtotime('-3 weeks'), '<br/>';

//获取上一个月的日期
echo date('Y年m月d日 H:i:s', strtotime('last day of -1 month'));
echo '<br/>';


/*
 * microtime函数：返回当前Unix时间戳和微秒数
 */
echo microtime(), '<br/>';
echo microtime(true), '<br/>';

//用于计算程序运行时间
$start = microtime(true);
$sum = 0;
for ($i = 0; $i < 1000000; $i++) {
    $sum += $i;
}
$end = microtime(true);
echo '共花费：', round($end - $start, 3), '秒';
echo '<br/>';


/*
 * uniqid函数：生成唯一ID
 */
echo uniqid(), '<br/>';
echo uniqid('mooc'), '<br/>';
echo uniqid(microtime()), '<br/>';
echo uniqid(microtime() . mt_rand()), '<br/>';
echo md5(uniqid(microtime() . mt_rand())); //uuid



/*
 * getdate函数：可以获取日期/时间信息
 */
print_r(getdate());


