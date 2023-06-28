<?php
require_once('layout/header.php');
if(!empty($_POST)){
    $fullname=getPOST('fullname');
    $phone_number=getPOST('phone_number');
    $email=getPOST('email');
    $subject_name=getPOST('subject_name');
    $note=getPOST('note');
    $created_at=$update_at= date('Y-m-d H:i:s');
    $sql="INSERT into feedback(fullname, phone_number, email, subject_name, note, created_at, update_at, status) values('$fullname', '$phone_number','$email', '$subject_name','$note', '$created_at', '$update_at', 1)";
    execute($sql);
}
?>
<div class="container-row" >
    <form style="width:40%; margin:65px;" method="post">
            <div class="form-group">
                <input required="true" type="text" class="form-control" placeholder="Nhập họ và tên" name="fullname">
            </div>
            <div class="form-group">
                <input required="true" type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone_number">
            </div>
            <div class="form-group">
                <input required="true" type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <input required="true" type="text" class="form-control" placeholder="Nhập chủ đề" name="subject_name">
            </div>
            <div class="form-group">
                <textarea required="true" name="note" class="form-control" rows="3" placeholder="Nhập noi dung"></textarea>
            </div>
            <button style="background-color:#74a6d4;color: white;border: 1px solid #ced4da;text-align:center;margin-bottom:30px;">Gửi phản hồi</button>
    </form>
    <div class="map"style="margin:65px; width:40%;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3850.3523835717947!2d108.72438807472274!3d15.193870162277475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTXCsDExJzM3LjkiTiAxMDjCsDQzJzM3LjEiRQ!5e0!3m2!1svi!2s!4v1687972578396!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>
<?php
    require_once('layout/footer.php')
?>