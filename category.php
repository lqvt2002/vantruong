<?php
require_once('layout/header.php');
$category_id= getGET('id');
//kiểm tra giá trị tr về của id danh mục, và sau đ xất ra dư liêu
// laáy dữ liệu
if($category_id == null or $category_id=='' ){
    $sql ="SELECT product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted=0 order by product.update_at desc limit 0,12 ";
} else{
    $sql ="SELECT product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted=0 and product.category_id = $category_id order by product.update_at desc limit 0,12 ";
}

    $productIteams= executeResult($sql);
?>
   
    <!-- GIỚI THIỆU SẢN PHẨM -->
    <h1 style="text-align:center; margin-top:100px;">SẢN PHẨM MỚI NHẤT</h1>
    <div class="container-row">
        <?php
        foreach($productIteams as $item){
            echo '
            <div class="row-product item-product">
                <a href="detail.php?id='.$item['id'].'"><img src="'.$item['thumbnail'].'" alt=""></a>
                <p>'.$item['category_name'].'</p>
                <a href="detail.php?id='.$item['id'].'"><p>'.$item['title'].'</p></a>
                <p style="color:red;">'.number_format($item['discount']).' VND</p>
                <p><button onclick="addCart('.$item['id'].',1)" style="background-color:#74a6d4;color: white;border: 1px solid #ced4da;width:100%; text-align:center;"><i class="ti-shopping-cart"></i> Thêm vào giỏ hàng</button></p>
            </div>';
        }
        ?>
    </div>
<script type="text/javascript">
    function addCart(productId, number){
        $.post('ajax.php', {
            'action': 'cart', 'id': productId, 'number':number
        }, function(data){
            location.reload()
        })
    }
</script>
<?php
    require_once('layout/footer.php')
?>