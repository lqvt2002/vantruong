<?php
    session_start();
    require_once('database/utility.php');
    require_once('database/dbhelper.php');
    $sql ="SELECT *from category";
    $menuIteams= executeResult($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>Trang chu - shop</title>
    <link rel="shortcut icon" href="assets/image/logo1.png" />
    <link rel="stylesheet" href="assets/index.css">
    <link rel="stylesheet" href="assets/themify-icons-font/themify-icons/themify-icons.css">
    <!-- // link font chu -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300&display=swap" rel="stylesheet">
        <!-- thư viện của bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <style>
        /* Make the image fully responsive */
        </style>
</head>
<body>
    <!-- menu shop -->
    <header class="header fixed-top">
        <ul class="header-col">
            <li class="header-item-logo"><a href="https://www.facebook.com/lqvt2002"><img src="assets/image/logo1.png" alt=""></a></li>
            <li class="header-item"><a href="index.php" class="text"><h5>TRANG CHỦ</h5></a></li>
                <?php
                foreach($menuIteams as $item){
                    echo '<li class="header-item"><a href="category.php?id='.$item['id'].'" class="text"><h5>'.$item['name'].'</h5></a></li>';
                }
                ?>
            <li class="header-item"><a href="contact.php" class="text"><h5>LIÊN HỆ</h5></a></li>
        </ul>
        <ul class="header-col">
                
        </ul>
        <ul class="header-col">
         <!-- Rỗng    -->
        </ul>
    </header>