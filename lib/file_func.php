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

/**
 * 读取文件内容，返回字符串
 * @param string $filename 文件名
 * @return bool|string
 */
function read_file($filename)
{
    //检测是否是一个文件并文件已存在
    if (is_file($filename) && is_readable($filename)) {
        return file_get_contents($filename);
    }
    return false;
}

//var_dump(read_file('../fileSystem/1.txt'));

/**
 * 读取文件中的内容到数组中
 * @param string $filename
 * @param bool $skip_empty_lines
 * @return array|bool
 */
function read_file_array($filename, $skip_empty_lines = false)
{
    if (is_file($filename) && is_readable($filename)) {
        if ($skip_empty_lines) {
            return file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        } else {
            return file($filename);
        }
    }
    return false;
}

//var_dump(read_file_array('../fileSystem/1.txt',true));


/**
 * 向文件中写入内容
 * @param string $filename   文件名
 * @param mixed $data        写入内容（数组和对象需要处理）
 * @param bool $clearFlag    是否覆盖原有内容 true:覆盖  false:不覆盖
 * @return bool
 */
function write_file($filename, $data, $clearFlag = false)
{
    $dirname = dirname($filename);
    if (!file_exists($filename)) {
        mkdir($dirname, 0777, true);
    }
    //检测文件是否存在并且可读
    if (is_file($filename) && is_readable($filename)) {
        //读取文件内容，之后和新写入的内容拼接在一起
        if (filesize($filename) > 0) {
            $srcData=file_get_contents($filename);
        }
    }
    //不需要覆盖
    if(!$clearFlag){
        $data=$srcData.$data;
    }
    //判断内容是否是数组或对象
    if (is_array($data) || is_object($data)) {
        //序列化数据
        $data = serialize($data);
    }
    //向文件中写入内容
    if (file_put_contents($filename, $data) !== false) {
        return true;
    } else {
        return false;
    }
}

//var_dump(write_file('../fileSystem/1.txt', ['a','b','c'],true));

/**
 * 截断文件到指定大小
 * @param string $filename   文件名
 * @param int $length        截断长度
 * @return bool
 */
function truncate_file($filename,$length){
    //检测是否是文件
    if(is_file($filename) && is_writeable($filename)){
        $handle=fopen($filename,'r+');
        $length=$length<0?0:$length;
        ftruncate($handle,$length);
        fclose($handle);
        return true;
    }
    return false;
}
//var_dump(truncate_file('./1.txt',2));

/**
 * 文件下载
 * @param string $filename     文件名
 * @param array $allowDownExt  允许文件下载类型
 * @return bool
 */
function down_file($filename,$allowDownExt=['jpg','jpeg','gif','txt','html','png','rar','zip']){
    //检测下载文件是否存在，并且可读
    if(!is_file($filename) || !is_readable($filename)){
        return false;
    }
    //检测文件类型是否允许下载
    $ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    if(!in_array($ext,$allowDownExt)){
        return false;
    }
    //通过header()发送头信息
    //告诉浏览器输出的是字节流
    header('content-type:application.octet-stream');

    //告诉浏览器返回的文件大小是按照字节大小进行计算的
    header('Accept-Ranges:bytes');

    //告诉浏览器返回的文件大小
    header('Accpet-Length:'.filesize($filename));

    //告诉浏览器文件作为附件处理，告诉浏览器最终下载完成的文件名称
    header('Content-Disposition:attachment;filename=cx_'.basename($filename));

    //读取文件中内容
    readfile($filename);

    exit;
}

/**
 * 文件切片下载
 * @param string $filename     文件名
 * @param array $allowDownExt  允许文件下载类型
 * @return bool
 */
function down_file1($filename,$allowDownExt=['jpg','jpeg','gif','txt','html','png','rar','zip']){
    //检测下载文件是否存在，并且可读
    if(!is_file($filename) || !is_readable($filename)){
        return false;
    }
    //检测文件类型是否允许下载
    $ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    if(!in_array($ext,$allowDownExt)){
        return false;
    }
    //通过header()发送头信息
    //告诉浏览器输出的是字节流
    header('content-type:application.octet-stream');

    //告诉浏览器返回的文件大小是按照字节大小进行计算的
    header('Accept-Ranges:bytes');

    $filesize=filesize($filename);
    //告诉浏览器返回的文件大小
    header('Accpet-Length:'.$filesize);

    //告诉浏览器文件作为附件处理，告诉浏览器最终下载完成的文件名称
    header('Content-Disposition:attachment;filename=cx_'.basename($filename));

    //规定每个读取文件的字节数为1024字节，直接输出数据
    $read_buffer=1024;
    $sum_buffer=0;
    $handle=fopen($filename,'rb');
    while (!feof($handle) && $sum_buffer<$filesize){
        echo fread($handle,$read_buffer);
        $sum_buffer+=$read_buffer;
    }
    fclose($handle);
    exit;
}

/**
 * 单文件上传
 * @param array $fileInfo      上传文件信息
 * @param string $uploadPath   文件上传默认路径
 * @param bool $imageFlag      是否检测真实图片
 * @param array $allowExt      允许上传文件类型
 * @param int $maxSize         文件上传最大值
 * @return mixed|string
 */
function upload_file($fileInfo,$uploadPath='./uploads',$imageFlag=true,$allowExt=['jpeg','jpg','png','gif'],$maxSize=2097152){
    $UPLOAD_ERRS =[
        'upload_max_filesize'=>'超过了PHP配置文件中upload_max_filesize选项值',
        'form_max_size'=>'超过了表单MAX_FILE_SIZE选项值',
        'upload_file_partial'=>'文件部分被上传',
        'no_upload_file_select'=>'没有选择上传文件',
        'upload_system_error'=>'系统错误',
        'no_allow_ext'=>'非法文件类型',
        'exceed_max_size'=>'超出上传最大值',
        'no_true_image'=>'文件不是真实图片',
        'not_http_post'=>'文件不是通过HTTP POST方式上传上来的',
        'move_error'=>'文件移动失败'
    ];

    //检测是否上传有错误
    if($fileInfo['error']===UPLOAD_ERR_OK){
        //检测文件类型
        $ext=strtolower(pathinfo($fileInfo['name'],PATHINFO_EXTENSION));
        if(!in_array($ext,$allowExt)){
            return $UPLOAD_ERRS['no_allow_ext'];
        }
        //检测上传文件大小是否符合规范
        if($fileInfo['size']>$maxSize){
            return $UPLOAD_ERRS['exceed_max_size'];
        }
        //检测是否是真是图片
        if($imageFlag){
            if(@!getimagesize($fileInfo['tmp_name'])){
                return $UPLOAD_ERRS['no_true_image'];
            }
        }
        //检测文件是否通过HTTP POST方式上传上来的
        if(!is_uploaded_file($fileInfo['tmp_name'])){
            return $UPLOAD_ERRS['not_http_post'];
        }
        //检测目标目录是否存在，不存在则创建
        if(!is_dir($uploadPath)){
            mkdir($uploadPath,0777,true);
        }
        //生成唯一文件名，防止重名产生覆盖
        $uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
        $dest=$uploadPath.DIRECTORY_SEPARATOR.$uniName;

        //移动文件
        if(@!move_uploaded_file($fileInfo['tmp_name'],$dest)){
            return $UPLOAD_ERRS['move_error'];
        }
        return $dest;
    }else{
        switch($fileInfo['error']){
            case 1:
                $mes=$UPLOAD_ERRS['upload_max_filesize'];
                break;
            case 2:
                $mes=$UPLOAD_ERRS['form_max_size'];
                break;
            case 3:
                $mes=$UPLOAD_ERRS['upload_file_partial'];
                break;
            case 4:
                $mes=$UPLOAD_ERRS['no_upload_file_select'];
                break;
            case 5:
            case 6:
            case 7:
                $mes=$UPLOAD_ERRS['upload_system_error'];
                break;
        }
        return $mes;
    }
}

/**
 * 压缩单个文件
 * @param string $filename 文件名
 * @return bool
 */
function zip_file($filename,$deleteOldFile=true){
    if(!is_file($filename)){
        return false;
    }
    $zip=new ZipArchive();
    $zipName=basename($filename).'.zip';
    //打开指定压缩包，不存在则创建，存在则覆盖
    if($zip->open($zipName,ZipArchive::CREATE|ZipArchive::OVERWRITE)){
        //将文件添加到压缩包中
        if($zip->addFile($filename)){
            if($deleteOldFile){
                @unlink($filename);
            }
        }
        $zip->close();
        return true;
    }else{
        return false;
    }
}
//var_dump(zip_file('./1.txt',true));

/**
 * 多文件压缩
 * @param string $zipName    压缩包名称
 * @param array ...$files    需要压缩文件名，可以是多个
 * @return bool
 */
function zip_files($zipName,...$files){
    //检测压缩包名称是否正确
    $zipExt=strtolower(pathinfo($zipName,PATHINFO_EXTENSION));
    if('zip'!==$zipExt){
        return false;
    }
    $zip=new ZipArchive();
    if($zip->open($zipName,ZipArchive::CREATE|ZipArchive::OVERWRITE)){
        if(is_dir($files[0])){
            //判断是否是压缩文件夹
            if($dh=opendir($files[0])){
                while (($file = readdir($dh)) !== false){
                    if(is_file($file)){
                        $zip->addFile($file);
                    }elseif (is_dir($file)){
                        if($file!=='.' && $file!=='..'){
                            if($dh1=opendir($file)){
                                while (($file=readdir($dh1))!==false){
                                    if(is_file($file)){
                                        var_dump($file);
                                        $zip->addFile($file);
                                    }else{
                                        var_dump($file);
                                    }
                                }
                            }
                        }
                    }
                }
                closedir($dh);
            }
        }else{
            foreach ($files as $file){
                if(is_file($file)){
                    $zip->addFile($file);
                }
            }
        }
        $zip->close();
        return true;
    }else{
        return false;
    }
}

var_dump(zip_files('test1.zip','../lib'));


/**
 * 解压缩
 * @param string $zipName  压缩包名称
 * @param $dest            压缩到指定目录
 * @return bool
 */
function unzip_file($zipName,$dest){
    //检测要解压的压缩包是否存在
    if(!is_file($zipName)){
        return false;
    }
    //检测目标路径是否存在
    if(!is_dir($dest)){
        mkdir($dest,0777,true);
    }
    $zip=new ZipArchive();
    if($zip->open($zipName)){
        $zip->extractTo($dest);
        $zip->close();
        return true;
    }else{
        return false;
    }
}
//var_dump(unzip_file('test1.zip','a'));





















