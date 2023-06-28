<?php 

 $title = 'Quản lý phản hồi';
 $baseUrl='../';
 require_once('../layout/header.php');

 $sql = "SELECT *from feedback order by status asc ";
 $data= executeResult($sql);
?>
<div>
    <link rel="stylesheet" href="../../assets/feedback/index.css">
    <div>
    <h1>QUẢN LÝ PHẢN HỒI</h1>
    <div class="table-responsive">          
        <table class="table" >
            <thead>
            <tr style="background-image: url(../../assets/image/background_header.png);">
                <th class="table-th" style=" width:5%">STT</th>
                <th class="table-th" style=" width:9%">Tên người dùng</th>
                <th class="table-th" style=" width:9%">SĐT</th>
                <th class="table-th" style=" width:10%">Email</th>
                <th class="table-th" style=" width:19%;">Chủ đề</th>
                <th class="table-th" style=" width:30%;">Nội dung</th>
                <th class="table-th" style=" width:12%;">Ngày tạo</th>
                <th class="table-th" style=" width:10px;"></th>
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
                        <th class="table-th">'.($item['phone_number']).'</th>
                        <th class="table-th" > '.($item['email']).'</th>
                        <th class="table-th" > '.($item['subject_name']).'</th>
                        <th class="table-th" > '.($item['note']).'</th>
                        <th class="table-th" > '.($item['created_at']).'</th>';
                        if( $item['status'] == 0){
                        echo ' <th class="table-th" ><button onclick="markRead('.$item['id'].')">Đã xem</button></th> ';
                        }
                        
                    echo '</tr> ';
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
    function markRead(id){
        $.post('markread.php',{
            'id':id, 'action':'mark'
            }, function(data){
                location.reload()
            })
    }
</script>
<?php
 require_once('../layout/footer.php')
?>