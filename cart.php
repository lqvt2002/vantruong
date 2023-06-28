<?php
require_once('layout/header.php');

?>
<div class="container-row">
    <div style="width:90%;">
    <table class="table" style="margin:65px;border: 1px solid rgb(74, 72, 72);">
        <tr>
            <th class="table-th" style="width:5%;">STT</th>
            <th class="table-th" style="width:10%;">Thumbnail</th>
            <th class="table-th" style="width:40%;">Tiêu đề</th>
            <th class="table-th" style="width:10%;">Giá</th>
            <th class="table-th" style="width:15%;">Số lượng</th>
            <th class="table-th" style="width:10%;">Tổng giá</th>
            <th class="table-th" style="width:10%;">Xóa</th>
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
                <td class="table-th"><img src="'.$item['thumbnail'].'" alt="" style="height:80px;"></td>
                <td class="table-th">'.$item['title'].'</td>
                <td class="table-th">'.number_format($item['discount']).' VND</td>
                <td class="table-th">
                    <button style="width:30px; text-align:center;border: 1px solid #ced4da;" onclick="addMoreCart('.$item['id'].',-1)">-</button>
                    <input type="number" id="num_'.$item['id'].'" style="width:40px;" value="'.$item['number'].'">
                    <button style="width:30px; text-align:center;border: 1px solid #ced4da;" onclick="addMoreCart('.$item['id'].',1)">+</button>
                </td>
                <td class="table-th">'.number_format($item['discount']*$item['number']).' VND</td>
                <td class="table-th"><button onclick="updateCart('.$item['id'].',0)">Xóa</button></td>
            </tr>';
        }
        ?>
    </table>
    <a href="checkout.php"><button style="background-color:#74a6d4;color: white;border: 1px solid #ced4da;width:100px; text-align:center;margin-bottom:30px;margin-left: 65px;">Thanh toán</button></a>
    </div>
</div>
<script type="text/javascript">
    function addMoreCart(id, delta){
        number= parseInt($('#num_'+id).val())
        number+=delta
        $('#num_'+id).val(number)
        updateCart(id, number)
    }
    function updateCart(productId, number){
        $.post('ajax.php', {
            'action': 'updateCart', 
            'id': productId, 
            'number':number
        }, function(data){
            location.reload()
        })
    }
</script>
<?php
    require_once('layout/footer.php')
?>