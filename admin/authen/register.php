<?php
    session_start();    
    require_once('process_register.php');
    require_once('../../database/utility.php');
    require_once('../../database/dbhelper.php');
    $user = getUserToken();
    if( $user!= null){
        header('Location:../index.php');
            die();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng ký</title>
        <meta charset="utf-8">
        <!-- thư viện -->
        <link rel="stylesheet" href="../../assets/css/index.css">
        <!-- font chữ -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;500&family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400&family=Roboto:ital,wght@0,300;1,100&display=swap" rel="stylesheet">
        <!-- thư viện của bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <header class="header">
            <ul class="header-col">
                <li class="header-item-logo"><a href="https://www.facebook.com/lqvt2002"><img src="../../assets/image/logo1.png" alt=""></a></li>
            </ul>
            <ul class="header-col">
                <li class="header-item"><a href="#" style="color: rgb(8, 8, 8); text-decoration: none;">TRANG CHỦ</a></li>
                <li class="header-item"><a href="login.php" style="color: rgb(8, 8, 8); text-decoration: none;">ĐĂNG NHẬP</a></li>
            </ul>
        </header>
        <div class="container1">
            <div class="container" style="margin-top:40px; width:600px;">
                <form action="" method="POST" onsubmit="return validateForm();" style="border: 1px solid black;  border-radius: 10px; padding:15px; background-color: white; ">
                    <h1 style=" margin:10px; text-align:center;">ĐĂNG KÝ TÀI KHOẢN</h1>
                    <h5 style=" margin:5px; text-align:center; color:red;"><?=$msg?></h5> 
                    <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="email" placeholder="Nhập tên" name="fullname" value="<?=$fullname?>">
                    </div>
                    <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input minlength="6" required="true" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                    </div>
                    <div class="form-group">
                    <label for="nonpassword">Nhập lại mật khẩu:</label>
                    <input minlength="6" required="true" type="password" class="form-control" id="nonpassword" placeholder="Nhập lại mật khẩu" name="nonpassword">
                    </div>
                    <button type="submit" class="btn btn-default" style="background-image: url(../../assets/image/background_header.png);">Đăng ký</button>
                    <p style="text-align: left">Bạn đã có tài khoản? <a href="./login.php" style="text-align: end;">Đăng nhập</a> hoặc
                        <a href="#" >Quên mật khẩu?</a>
                     </p>
                </form>
            </div>
        </div>
<script type="text/javascript"> //kiểm tra mật mẫu có khớp hay không, so sánh bằng for=
    function validateForm(){
        $pwd =$('#password').val();
        $nonpwd = $('#nonpassword').val();
        if($pwd != $nonpwd){
            alert("mật khẩu không khớp, vui lòng kểm tra lại.")
            return false
        }
        return true
    }
</script>
        
    </body>
</html>