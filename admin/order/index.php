<?php 

 $title = 'Quản lý đơn hàng';
 $baseUrl='../';
 require_once('../layout/header.php');

 $sql = "SELECT * from orders order by status asc, order_date desc ";
 $data= executeResult($sql);
?>
<div>
    <link rel="stylesheet" href="../../assets/feedback/index.css">
    <div>
    <h1>QUẢN LÝ ĐƠN HÀNG</h1>
    <div class="table-responsive">          
        <table class="table" >
            <thead>
            <tr style="background-image: url(../../assets/image/background_header.png);">
                <th class="table-th" style=" width:5%">STT</th>
                <th class="table-th" style=" width:9%">Họ và tên</th>
                <th class="table-th" style=" width:9%">SĐT</th>
                <th class="table-th" style=" width:10%">Email</th>
                <th class="table-th" style=" width:19%;">Địa chỉ</th>
                <th class="table-th" style=" width:25%;">Nội dung đơn</th>
                <th class="table-th" style=" width:13%;">Ngày đặt đơn </th>
                <th class="table-th" style=" width:10%;">Tổng tiền </th>
                <th class="table-th" style=" width:50px;"></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $index=0;
                foreach ($data as $item){
                    echo'
                    <tr>
                        <th class="table-th"><a href="detail.php?id='.($item['id']).'">'.(++$index).' (Xem)</a></th>
                        <th class="table-th">'.($item['fullname']).'</th>
                        <th class="table-th">'.($item['phone_number']).'</th>
                        <th class="table-th" > '.($item['email']).'</th>
                        <th class="table-th" > '.($item['address']).'</th>
                        <th class="table-th" > '.($item['note']).'</th>
                        <th class="table-th" > '.($item['order_date']).'</th>
                        <th class="table-th" > '.($item['total_money']).'</th>';
                        if( $item['status'] == 0){
                        echo ' <th class="table-th" >
                            <button onclick="updateStatus('.$item['id'].',1)" style="background-color:#AFDEDE;">Phê duyệt</button>
                            <button onclick="updateStatus('.$item['id'].',2)" style="background-color:#E6EDED; margin-top:10px;">Hủy đơn</button>
                            </th>
                        ';
                        } else if( $item['status'] == 1){
                            echo '<th><label for="">Đã duyệt</label></th>';
                        } else{
                            echo '<th><label for="">Đã hủy</label></th>';
                        }
                        
                    echo '</tr> ';
                }
                ?>
            </tbody> 
        </table>
    </div>

</div>
<script type="text/javascript">
    function updateStatus(id,status){
        $.post('updateStatus.php', {
            'id':id, 
            'status': status,
            'action':'updateStatus'
            }, function(data){
                location.reload()
            })
    }
</script>
<?php
 require_once('../layout/footer.php')
?>