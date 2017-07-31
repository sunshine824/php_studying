<?php
/**
 * Created by PhpStorm.
 * User: Gatsby
 * Date: 2017/7/31
 * Time: 10:39
 */
/**
 * 封装创建文件函数
 * @param $filename string
 * @return bool
 */
function create_file($filename)
{
    //检测文件是否存在，不存在则创建
    if (file_exists($filename)) {
        return false;
    }
    //检测目录是否存在，不存在则创建
    if (!file_exists(dirname($filename))) {
        //创建目录，可以创建多级
        mkdir(dirname($filename), 0777, true);
    }
    /*if(touch($filename)){
        return true;
    }*/
    if (file_put_contents($filename, '') !== false) {
        return true;
    }
    return false;
}

//create_file('/3.txt');

/**
 * 删除文件
 * @param $filename string
 * @return bool
 */
function del_file($filename)
{
    //检测删除文件是否存在
    if (!file_exists($filename) || !is_writeable($filename)) {
        return false;
    }
    if (unlink($filename)) {
        return true;
    }
    return false;
}

//var_dump(del_file('3.txt'));

/**
 * 文件拷贝
 * @param $filename string
 * @param $dest string 目标路径
 * @return bool
 */
function copy_file($filename, $dest)
{
    //检测$dest是否是目录目标并且这个目录是否存在，不存在则创建
    if (!is_dir($dest)) {
        mkdir($dest, 0777, true);
    }
    $destName = $dest . DIRECTORY_SEPARATOR . basename($filename);
    //检测目标路径下是否存在同名文件
    if (file_exists($destName)) {
        return false;
    }
    //拷贝文件
    if (copy($filename, $destName)) {
        return true;
    }
    return false;
}

//var_dump(copy_file('../fileSystem/1.txt','./'));

/**
 * 文件重命名
 * @param $oldName string 原文件名
 * @param $newName string 新文件名
 * @return bool
 */
function rename_file($oldName, $newName)
{
    //检测原文件是否是文件并且存在
    if (!is_file($oldName)) {
        return false;
    }
    //得到原文件所在的路径
    $path = dirname($oldName);
    $destname = $path . DIRECTORY_SEPARATOR . $newName;
    echo $destname;
    if (is_file($destname)) {
        return false;
    }
    if (rename($oldName, $newName)) {
        return true;
    }
    return false;
}

//var_dump(rename_file('1.txt','11.txt'));

/**
 * 文件剪切
 * @param $filename string 原文件名
 * @param $dest string 剪切路径
 * @return bool
 */
function cut_file($filename, $dest)
{
    if (!is_file($filename)) {
        return false;
    }
    if (!is_dir($dest)) {
        mkdir($dest, 0777, true);
    }
    $destName = $dest . DIRECTORY_SEPARATOR . basename($filename);
    if (is_file($destName)) {
        return false;
    }
    if (rename($filename, $destName)) {
        return true;
    }
    return false;
}

//var_dump(cut_file('11.txt','../create_api'));

/**
 * 返回文件信息
 * @param $filename string 文件名
 * @return array|bool
 */
function get_file_info($filename)
{
    if (!is_file($filename) || !is_readable($filename)) {
        return false;
    }
    return [
        'atime' => date('Y-m-d H:i:s', fileatime($filename)), //最后访问时间
        'mtime' => date('Y-m-d H:i:s', filemtime($filename)), //修改时间
        'ctime' => date('Y-m-d H:i:s', filectime($filename)), //文件创建时间
        'size' => trans_byte(filesize($filename)),                              //文件大小(字节)
        'type' => filetype($filename)                               //文件类型
    ];
}

//var_dump(get_file_info('../fileSystem/1.txt'));

/**
 * 字节单位转换的函数
 * @param int $byte 字节大小
 * @param int $precision 保留位数
 * @return string
 */
function trans_byte($byte, $precision = 2)
{
    $kb = 1024;
    $mb = 1024 * $kb;
    $gb = 1024 * $mb;
    $tb = 1024 * $gb;
    if ($byte < $kb) {
        return $byte . 'B';
    } elseif ($byte < $mb) {
        return round($byte / $kb, $precision) . 'KB';
    } elseif ($byte < $gb) {
        return round($byte / $mb, $precision) . 'MB';
    } elseif ($byte < $tb) {
        return round($byte / $gb, $precision) . 'GB';
    } else {
        return round($byte / $tb, $precision) . 'TB';
    }
}
//var_dump(trans_byte(12345678));