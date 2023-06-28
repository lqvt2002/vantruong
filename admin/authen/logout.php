<?php 
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
    session_start();
    $token = getCookie('token');
    setcookie('token', '', time()-10,'/');
    session_destroy();
    header('location:login.php')
?>