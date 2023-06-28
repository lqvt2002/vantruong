<?php
require_once('layout/header.php');

?>
<div class="container-row">
    <form style="display: flex; width:90%" method="post" onsubmit=" return completeCheckout();">
        <div style="width:40%;margin-top:65px;margin-left:65px;">
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
                <input required="true" type="text" class="form-control" placeholder="Nhập địa chỉ" name="address">
            </div>
            <div class="form-group">
                <textarea required="true" name="note" class="form-control" rows="3" placeholder="Nhập ghi chú"></textarea>
            </div>
        </div>
        <div style="width:50%;">
            <table class="table" style="margin:65px;border: 1px solid rgb(74, 72, 72);">
                <tr>
                <th class="table-th" style="width:5%;">STT</th>
                    <th class="table-th" style="width:40%;">Tiêu đề</th>
                    <th class="table-th" style="width:10%;">Giá</th>
                    <th class="table-th" style="width:10%;">Số lượng</th>
                    <th class="table-th" style="width:10%;">Tổng giá</th>
                </tr>
                <?php
                if (!isset($_SESSION['cart'])){
                    $_SESSION['cart']=[];
                }
                $index=0;
                foreach($_SESSION['cart'] as $item){
                echo ' 
                    <tr>
                        <td class="table-th">'.(++$index).'</td>
                        <td class="table-th">'.$item['title'].'</td>
                        <td class="table-th">'.number_format($item['discount']).' VND</td>
                        <td class="table-th">
                            '.$item['number'].'
                        </td>
                        <td class="table-th">'.number_format($item['discount']*$item['number']).' VND</td>
                    </tr>';
                }
                ?>
            </table>
            <button style="background-color:#74a6d4;color: white;border: 1px solid #ced4da;width:100%; text-align:center;margin-bottom:30px;margin-left: 65px;">Thanh toán</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    function completeCheckout(){
        $.post('ajax.php', {
            'action':'checkout',
            'fullname':$('[name=fullname]').val(),
            'phone_number':$('[name=phone_number]').val(),
            'email':$('[name=email]').val(),
            'address':$('[name=address]').val(),
            'note':$('[name=note]').val()
        }, function(){
            window.open('complete.php', '_seft');
        })
    return false;
    }
</script>
<?php
    require_once('layout/footer.php')
?>