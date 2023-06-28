<?php
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
if(!empty($_POST)){
    $id = getPOST('id');
    $fullname = getPOST('fullname');
    $email = getPOST('email');
    $address = getPOST('address');
    $phone_number = getPOST('phone_number');
    $password = getPOST('password');
    if($password != ''){
        $password= getSecureityMD5($password);
    }
    $created_at = $update_at= date('Y-m-d H:i:s');//sử dụng MD5 để mã hóa mật khẩu, lưu thời gian đkí
    $role_id = getPOST('role_id');

        if ($id>0){
                //update
                $userExist = executeResult("SELECT * from user where email = '$email' and id<>'$id' ",true); //kiểm tra email có tồn tại hay chưa để chỉnh sửa
                if ($userExist ==null){
                    if($password != ''){
                        $sql = "UPDATE user set fullname='$fullname', email= '$email',address='$address',  password ='$password', phone_number ='$phone_number', role_id = '$role_id', update_at='$update_at' where id=$id ";
                    } else{
                        $sql = "UPDATE user set fullname='$fullname', email= '$email',address='$address',  phone_number='$phone_number', role_id= '$role_id', update_at='$update_at' where id=$id ";
    
                    }
                    execute($sql);
                    header('Location:index.php');
                }
                else{
                    $msg='email đã được đăng ký trên hệ thống.';
                }
        }
        else{
            //insert
            $userExist = executeResult("SELECT * from user where email = '$email'",true);
            if($userExist != null){
                $msg='email đã được đăng ký trên hệ thống.';
            }else {
                $sql ="INSERT into user (fullname, email,address,  password, phone_number, role_id, create_at, update_at, deleted) values ('$fullname', '$email','$address', '$password','$phone_number','$role_id', '$created_at', '$update_at', 0) ";
                execute($sql);
                header('Location:index.php');
                die();
            }
        }
    }
    ?>