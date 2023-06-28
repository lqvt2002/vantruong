<?php 

 $title = 'Thêm/sửa tài khoản người dùng';
 $baseUrl='../';
 require_once('../layout/header.php');
 $id=$fullname=$email=$msg=$address=$phone_number=$role_id='';
 require_once('form_save.php');// su ly phan them va sua tai khoan
 $id = getGET('id');
 if($id != '' && $id>0 ){
    $sql = "SELECT * from user where id = '$id' ";
    $userItem = executeResult($sql,true);
    if($userItem !=null ){
        $fullname= $userItem['fullname'];
        $email=$userItem['email'];
        $phone_number=$userItem['phone_number'];
        $address=$userItem['address'];
        $role_id=$userItem['role_id'];
    } else{
        $id=0;
    }
    }
 
 $sql= "SELECT * from role";
 $roleItems= executeResult($sql);
?>
<div>
    <h1> Thêm/sửa tài khoản người dùng</h1>
    <h5 style=" margin:5px; text-align:center; color:red;"><?=$msg?></h5> 
    <div class="container" style="margin-top:20px; width:100%;">
                <form action="" method="POST" style=" padding:15px; background-color: white; " onsubmit="return validateForm();">
                    <div class="form-group">
                        <label for="name">Tên:</label>
                        <input type="text" class="form-control" id="email" placeholder="Nhập tên" name="fullname" value="<?=$fullname?>">
                    <input type="text" name="id" value="<?=$id?>" hidden="true">  <!--  // an dong thong bao email ton tai -->
                </div>
                    <div class="form-group">
                    <label for="name">Role:</label>
                    <select class="form-control" name="role_id" id="role_id" required="true">
                        <option value="">-- chọn --</option>
                        <?php
                            foreach($roleItems as $role){
                                echo '<option select value="'.$role['id'].'" >'.$role['name'].'</option>';
                            }
                        ?>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email" value="<?=$email?>">
                    </div>
                    <div class="form-group">
                    <label for="phone_number">SĐT:</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="Nhập số điện thoại" name="phone_number" value="<?=$phone_number?>">
                    </div>
                    <div class="form-group">
                    <label for="address">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" placeholder="Nhập địa chỉ" name="address" value="<?=$address?>">
                    </div>
                    <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input minlength="6" <?=($id>0? '':'required="true" ')?> type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="password">
                    </div>
                    <div class="form-group">
                    <label for="nonpassword">Nhập lại mật khẩu:</label>
                    <input minlength="6" <?=($id>0? '':'required="true" ')?> type="password" class="form-control" id="nonpassword" placeholder="Nhập lại mật khẩu" name="nonpassword">
                    </div>
                    <button type="submit" class="btn btn-default" style="background-image: url(../../assets/image/background_header.png);">Ok</button>
                    
                </form>
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
</div>
<?php
 require_once('../layout/footer.php')
?>