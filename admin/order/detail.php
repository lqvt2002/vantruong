<?php 

 $title = 'Chi tiết đơn hàng';
 $baseUrl='../';
 require_once('../layout/header.php');
 $orderId= getGET('id');
 $sql = "SELECT order_detail.*, product.title, product.thumbnail from order_detail left join product on product.id=order_detail.product_id where order_detail.order_id=$orderId";
 $data= executeResult($sql);
 $sql = "SELECT *from orders where id=$orderId";
 $dataU= executeResult($sql,true);
?>
<div>
    <link rel="stylesheet" href="../../assets/feedback/index.css">
    <div>
    <h1>CHI TIẾT ĐƠN HÀNG</h1>
    <div class="container-order" style="display: flex">
        <div class="container-u" style="width:40%; margin:20px;padding:20px; border-radius: 10px; border: 2px solid #858282;">
            <h4>Tên khách hàng: <?=$dataU['fullname']?></h4>
            <h4>Email: <?=$dataU['email']?></h4>
            <h4>Số điện thoại: <?=$dataU['phone_number']?></h4>
            <h4>Địa chỉ: <?=$dataU['address']?></h4>
            <h4>Ghi chú: <?=$dataU['note']?></h4>
        </div>
        <div class="table-responsive" style= "width: 50%;">          
            <table class="table">
                <thead>
                <tr style="background-image: url(../../assets/image/background_header.png)">
                    <th class="table-th" style=" width:5%">STT</th>
                    <th class="table-th" style=" width:30%">Hình ảnh</th>
                    <th class="table-th" style=" width:20%">Tên sản phẩm</th>
                    <th class="table-th" style=" width:15%">Giá</th>
                    <th class="table-th" style=" width:15%;">Số lượng</th>
                    <th class="table-th" style=" width:15%;">Tổng giá</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $index=0;
                    foreach ($data as $item){
                        echo'
                        <tr>
                            <th class="table-th">'.(++$index).'</th>
                            <th class="table-th"><img src="'.fixUrl($item['thumbnail']).'" alt="" style="height:100px;"></th>
                            <th class="table-th">'.($item['title']).'</th>
                            <th class="table-th" > '.($item['price']).'</th>
                            <th class="table-th" > '.($item['number']).'</th>
                            <th class="table-th" > '.($item['total_money']).'</th>';
                            
                        echo '</tr> ';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    

</div>
<script type="text/javascript">
    function markRead(id){
        $.post('markread.php', {
            'id':id, 'action':'mark'
            }, function(data){
                location.reload()
            })
    }
</script>
<?php
 require_once('../layout/footer.php')
?>