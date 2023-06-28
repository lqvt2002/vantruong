<?php
 require_once('../../database/utility.php');
 require_once('../../database/dbhelper.php');
$fullname=$email=$msg='';
if(!empty($_POST)){
    $fullname = getPOST('fullname');
    $email = getPOST('email');
    $password = getPOST('password');
    //validate
    if(empty($fullname) || empty($email) || empty($password) || strlen($password)<6){
    }
    else{
        //thanh cong
        $userExist = executeResult("SELECT * from user where email = '$email'",true);
        if($userExist != null){
            $msg='email đã được đăng ký trên hệ thống.';
        }else {
            $created_at = $update_at= date('Y-m-d H:i:s');//sử dụng MD5 để mã hóa mật khẩu, lưu thời gian đkí
            //su dung ma hoa mat khau bang MD5
            $password= getSecureityMD5($password);
            $sql ="INSERT into user (fullname, email, password, role_id, create_at, update_at, deleted) values ('$fullname', '$email', '$password',2, '$created_at', '$update_at', 0) ";
            execute($sql);
            header('Location:login.php');
            die();
        }
    }
}
?>