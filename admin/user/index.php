<?php 

 $title = 'Quản lý người dùng';
 $baseUrl='../';
 require_once('../layout/header.php');
 $sql= "SELECT user.*, Role.name as role_name from user left join role on user.role_id = role.id where user.deleted=0";
 $data= executeResult($sql);
?>
<link rel="stylesheet" href="../../assets/user/index.css">
<div>
    <h1>QUẢN LÝ NGƯỜI DÙNG</h1>
    <a href="editor.php"><button>Thêm người dùng</button></a>
    <div class="table-responsive">          
        <table class="table" >
            <thead>
            <tr style="background-image: url(../../assets/image/background_header.png);">
                <th class="table-th" style=" width:5%">STT</th>
                <th class="table-th" style=" width:20%">Họ tên</th>
                <th class="table-th" style="width:15%">Email</th>
                <th class="table-th" style=" width:10%">SĐT</th>
                <th class="table-th" style=" width:30%">Địa chỉ</th>
                <th class="table-th" style=" width:5%">Vai trò (Role)</th>
                <th class="table-th" style="width:50px;"></th>
                <th class="table-th" style="width:50px;"></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $index=0;
                foreach ($data as $item){
                    echo'
                    <tr>
                        <th class="table-th">'.(++$index).'</th>
                        <th class="table-th">'.($item['fullname']).'</th>
                        <th class="table-th">'.($item['email']).'</th>
                        <th class="table-th">'.($item['phone_number']).'</th>
                        <th class="table-th" > '.($item['address']).'</th>
                        <th class="table-th">'.($item['role_name']).'</th>
                        <th style="width:50px; border: 1px solid black;"><a href="editor.php?id='.($item['id']).'"> 
                            <button ">Sửa</button></a>
                        </th>
                        <th style="width:50px; border: 1px solid black;">';
                    if($item['role_id'] !=1){ //nhung tai khoan admin thi khong duoc xoa
                        echo       ' <button onclick="deleteuser('.$item['id'].')" >Xóa</button> ';
                    }
                    echo    ' </th>
                    </tr> ';
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
    function deleteuser(id){
        Option= confirm ('Bạn có chắc chắn muốn xóa người dùng này không?');
        if(!Option) return;
        $.post('process_delete.php', {
            'id':id, 'action':'delete'
            }, function(data){
                location.reload()
            })
    }
</script>
<?php
 require_once('../layout/footer.php')
?>