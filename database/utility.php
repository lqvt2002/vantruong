<?php
require_once('config.php');
function fixSqlInject($sql){ //fix loi du lieu dau vao
    $sql= str_replace('\\','\\\\',$sql);
    $sql= str_replace('\'','\\\'',$sql);
    return $sql;
}
function getGet($key){
    $value='';
    if(isset($_GET[$key])){
        $value=$_GET[$key];
        $value=fixSqlInject($value);
    }
    return trim($value);
}
function getPost($key){
    $value='';
    if(isset($_POST[$key])){
        $value=$_POST[$key];
        $value=fixSqlInject($value);
    }
    return trim($value);
}
function getCookie($key){
    $value='';
    if(isset($_COOKIE[$key])){
        $value=$_COOKIE[$key];
        $value=fixSqlInject($value);
    }
    return trim($value);
}
function getSecureityMD5($password){
    return md5(md5($password).private_key);
}
function getUserToken(){
    if (isset($_SESSION['user'])){
        return $_SESSION['user'];
    }
    $token = getCookie('token');
    $sql = "SELECT * from tokens where tolen = '$token'";
    $item = executeResult($sql, true);
    if ($item != null){
        $userId= $item['user_id'];
        $sql = "SELECT * from user where id = '$userId' and deleted=0";
        $item = executeResult($sql, true);
        if ($item != null){
            $_SESSION['user'] = $item;
            return $item;
        }

    }
    return null;
}
function moveFile($key, $rootPath = "../../"){
    //$key=thumbnail
    //kiem tra file day len cos ton tai tren he thong khong
    if(!isset($_FILES[$key]) || !isset($_FILES[$key]['name']) || $_FILES[$key]['name']==''){
        return '';
    }
    // luu duong dan tam thoi
    $pathTemp= $_FILES[$key]["tmp_name"];
    //filename la ten file
    $filename = $_FILES[$key]["name"];
    //luu file vao duong dan cua trang web
    $newPath="assets/image/".$filename;

    move_uploaded_file($pathTemp, $rootPath.$newPath);

    return $newPath;
}
function fixUrl($thumbnail, $rootPath="../../"){
    if (stripos($thumbnail, 'http://') !==false|| stripos($thumbnail, 'http://') !==false){

    } else{
        $thumbnail =$rootPath.$thumbnail;
    }
    return $thumbnail;
}