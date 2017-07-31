<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/25
 * Time: 15:33
 */
/*
 * 截取文件拓展名
 * @param string $filename
 * @return string
 */
function getExt($filename)
{
    return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}

/*
 * 封装简单计算器
 * 传入两个数值，一个操作符，返回计算的结果
 * 默认加法操作
 */


/*
 * 封装获取日期时间星期的形式
 * @param string $del1 年
 * @param string $del2 月
 * @param string $del3 日
 * @return string
 */
function getDateStr($del1='年',$del2='月',$del3='日')
{
    $dayArr = ['日', '一', '二', '三', '四', '五', '六'];
    $day = date('w'); //一周内的第几天，0~6
    echo date("Y{$del1}m{$del2}d{$del3} 星期") . $dayArr[$day];
}

/*
 * 默认产生4位的数字验证码
 * type=1 数字
 * type=2 字母
 * type=3 数字加字母
 * 可以改变验证码长度
 */
function randCode($type=1,$len=4){
    switch ($type){
        case 1:
            $str='';
            for($i=1;$i<=$len;$i++){
                $str.=rand(1,9);
            }
            echo $str;
            break;
        case 2:
            $str='';
            for($i=1;$i<=$len;$i++){
                $str.=chr(rand(97, 122));
            }
            echo $str;
            break;
        case 3:
            $str='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
            $key='';
            /*
             * 方法一
             */
            /*for($i=1;$i<=$len;$i++){
                $key.= $str{mt_rand(0,strlen($str))};
            }
            echo $key;*/

            /*
             * 方法二
             */
            $key=trim(str_shuffle($str));
            echo substr($key,0,$len);

    }
}

