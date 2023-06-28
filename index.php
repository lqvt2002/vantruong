<?php
require_once('layout/header.php');
$sql ="SELECT product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted=0 order by product.update_at desc limit 0,8 ";
    $productIteams= executeResult($sql);
?>
    <!-- banner shop -->
    <div id="demo" class="carousel slide" data-ride="carousel">

        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="assets/image/banner.jpg" alt="">
            </div>
            <div class="carousel-item">
            <img src="assets/image/banner-image.jpg" alt="">
            </div>
            <div class="carousel-item">
            <img src="assets/image/banner.jpg" alt="">
            </div>
        </div>

        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        </div>
    <!-- GIỚI THIỆU SẢN PHẨM -->
    <h1 style="text-align:center;">SẢN PHẨM MỚI NHẤT</h1>
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
    <!-- Hiển thị sản phẩm theo menu -->
<?php
    foreach($menuIteams as $item){
        //chọn ra các sản phẩm có cùng loại.
    $sql ="SELECT product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted=0 and product.category_id=".$item['id']." order by product.update_at desc limit 0,4 ";
    $items= executeResult($sql);
    if ($items ==null) continue;
        ?>
    <h1 style="text-align:center;">SẢN PHẨM <?=$item['name']?></h1>
    <div class="container-row">
        <?php
        //hiển thị các sản phẩm trong mỗi thư mục
        foreach($items as $pItem){
            echo '
            <div class="row-product item-product">
                <a href="detail.php?id='.$pItem['id'].'"><img src="'.$pItem['thumbnail'].'" alt=""></a>
                <p>'.$pItem['category_name'].'</p>
                <a href="detail.php?id='.$pItem['id'].'"><p>'.$pItem['title'].'</p></a>
                <p style="color:red;">'.number_format($pItem['discount']).' VND</p>
                <p><button onclick="addCart('.$pItem['id'].',1)" style="background-color:#74a6d4;color: white;border: 1px solid #ced4da;width:100%; text-align:center;"><i class="ti-shopping-cart"></i> Thêm vào giỏ hàng</button></p>
            </div>';
        }
        ?>
    </div>
<?php
}
?>
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