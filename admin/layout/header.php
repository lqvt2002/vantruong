<?php
session_start();
require_once($baseUrl.'../database/utility.php');
require_once($baseUrl.'../database/dbhelper.php');
 $user = getUserToken();
 if ($user == null){
    header('Location:'.$baseUrl.'authen/login.php');
    die();
 }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <title><?=$title?></title>
        <link rel="shortcut icon" href="<?=$baseUrl?>../assets/image/logo1.png" />
        <meta charset="utf-8">
        <!-- thư viện -->

        <link rel="stylesheet" href="<?=$baseUrl?>../assets/css/index.css">
        <link rel="stylesheet" href="<?=$baseUrl?>../assets/themify-icons-font/themify-icons/themify-icons.css">
</head>
        <!-- font chữ -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
        <!-- thư viện của bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header class="header">
            <ul class="header-col">
                <li class="header-item-logo"><a href="https://www.facebook.com/lqvt2002"><img src="<?=$baseUrl?>../assets/image/logo1.png" alt=""></a></li>
            </ul>
            <ul class="header-col">
                <li class="header-item"><a href="#" style="color: rgb(8, 8, 8); text-decoration: none;">TRANG CHỦ</a></li>
                <li class="header-item"><a href="<?=$baseUrl?>../admin/authen/logout.php" style="color: rgb(8, 8, 8); text-decoration: none;">ĐĂNG XUẤT</a></li>
            </ul>
        </header>
        <div class="container1">
            <ul class="con-col1" >
                <p>
                    <a href="<?=$baseUrl?>index.php" style="text-decoration: none;color: rgb(18, 17, 17)"><i class="icon-nav ti-home"></i>  Dashboard</a>
                </p>
                <p>
                    <a href="<?=$baseUrl?>category" style="text-decoration: none; color: rgb(18, 17, 17);"><i class="icon-nav ti-folder"></i> Danh mục sản phẩm</a>
                </p>
                <p>
                    <a href="<?=$baseUrl?>product" style="text-decoration: none;color: rgb(18, 17, 17)"> <i class="icon-nav ti-package"></i> Sản phẩm</a>
                </p>
                <p>
                    <a href="<?=$baseUrl?>order" style="text-decoration: none;color: rgb(18, 17, 17)"><i class="icon-nav ti-shopping-cart"></i>  Quản lý đơn hàng</a>
                </p>
                <p>
                    <a href="<?=$baseUrl?>feedback" style="text-decoration: none;color: rgb(18, 17, 17)"> <i class="icon-nav ti-comment-alt"></i> Quản lý phản hồi</a>
                </p>
                <p>
                    <a href="<?=$baseUrl?>user" style="text-decoration: none;color: rgb(18, 17, 17)"> <i class="icon-nav ti-user" ></i> Quản lý người dùng</a>
                </p>

            </ul>
            <ul class="con-col2">
                <!-- Hiển thị trang thực hiện -->