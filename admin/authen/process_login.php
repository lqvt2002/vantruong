<?php
 require_once('../../database/utility.php');
 require_once('../../database/dbhelper.php');
$email=$password=$msg='';
if(!empty($_POST)){
    $email = getPOST('email');
    $password = getPOST('password');
    $password = getSecureityMD5($password); //ma hoaá md5
    //validate
    if(empty($email) || empty($password) || strlen($password)<6){
    }
    else{
        //thanh cong
        $checkUser = executeResult("SELECT * from user where email = '$email' AND password = '$password' and deleted=0",true);
        if($checkUser == null){
            $msg='email hoặc mật khẩu không chính xác!';
        }else {
            // login thành công
            //THỰC HEINẸ LƯU TOKEN VÀO BẢNG TOKENS
            $token = getSecureityMD5($checkUser['email'].time());
            // SET THỜI GIAN SỐNG CHO COOKỈE, SAU THỜI GIAN NÀY THÌ CẦN LOGIN LẠI
            setcookie('token',$token, time()+60*60*24*7,'/'); 
            //LƯU NGÀY ĐĂNG NHÂP
            $created_at= date('Y-m-d H:i:s');
            //THÔNG TIN USER
            $_SESSION['user']= $checkUser;
            $userId = $checkUser['id'];
            //DÁN THÔNG TIN VÀO CSDL 
            $sql = "insert into tokens (user_id, token, created_at) values ('$userId', '$token','$created_at')";
            execute($sql);
            header('Location:../index.php');
            die();
        }
    }
}
?>