<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/24
 * Time: 15:46
 */
header('content-type:text/html;charset=utf-8');

/*
 * 参数列子
 * 返回一个3行2列表格
 */

/*
 * 创建3行2列的表格
 * @return string
 */
function createTable(){
    $table="<table border='1' cellpadding='0' cellspacing='0' width='80%'>";
    for($i=1;$i<=3;$i++){
        $table.="<tr>";
        for($j=1;$j<=2;$j++){
            $table.="<td>x</td>";
        }
        $table.="</tr>";
    }
    $table.="</table>";
    return $table;
}

echo createTable();
echo '<br/>';
/*
 * 按照需求创建指定的表格
 * @param number $rows
 * @param number $cols
 * @return string
 */
function createTable1($rows,$cols){
    $table="<table border='1' cellpadding='0' cellspacing='0' width='80%'>";
    for($i=1;$i<=$rows;$i++){
        $table.="<tr>";
        for($j=1;$j<=$cols;$j++){
            $table.="<td>x</td>";
        }
        $table.="</tr>";
    }
    $table.="</table>";
    return $table;
}
//必须参数，调用函数的时候一定要传值
echo createTable1(5,3);
echo '<br/>';

/*
 * 按照需求创建指定的表格
 * @param number $rows
 * @param number $cols
 * @param string $bgColor
 * @content string $content
 * @return string
 */
function createTable2($rows=5,$cols=3,$bgColor='green',$content='x'){
    $table="<table border='1' cellpadding='0' cellspacing='0' width='80%' bgcolor='{$bgColor}'>";
    for($i=1;$i<=$rows;$i++){
        $table.="<tr>";
        for($j=1;$j<=$cols;$j++){
            $table.="<td>{$content}</td>";
        }
        $table.="</tr>";
    }
    $table.="</table>";
    return $table;
}
//可选参数
echo createTable2(5,3,'red');
echo '<br/>';


/*
 * 给你文件名，返回文件的拓展名
 * mysql_connect.php--php
 * 1.txt.html--html
 * @param string $fileName
 * @return string
 */
$fileName='1.txt.html';
function getExtension($fileName){
    $ext=strtolower(pathinfo($fileName,PATHINFO_EXTENSION));
    return $ext;
}
echo getExtension($fileName);
echo '<br/>';