<?php
    require_once('layout/header.php');
    $product_id= getGET('id');
    // lấy thông tin sp theo id nhậndđược
    $sql ="SELECT product.*, category.name as category_name from product left join category on product.category_id = category.id where product.id = $product_id";
    $product= executeResult($sql, true);
    // Xuất ra những sp có cùng danh mục với sp được chọn
    $category_id= $product['category_id'];
    $sql ="SELECT product.*, category.name as category_name from product left join category on product.category_id = category.id where product.deleted=0 and product.category_id = $category_id order by product.update_at desc limit 0,4 ";
    $productIteams= executeResult($sql);
?>
    <!-- CHI TIẾT SẢN PHẨM -->
    
    <div class="container-detail">
        <div class="row-detail">
            <div class="col-detail" style="width:50%;">
                <img src="<?=$product['thumbnail']?>" alt="">
            </div>
            <div class="col-detail" style="width:40%;">
                <ul>
                    <li><a href="index.php">Trang chu</a>  /</li>
                    <li><a href="category.php?id=<?=$product['category_id']?>"><?=$product['category_name']?></a>  /</li>
                    <li><?=$product['title']?> </li>
                </ul>
                <h2><?=$product['title']?></h2>
                <h2 style="color:red;"><?=number_format($product['discount'])?> VND</h2>
                <p style="color:#868e96;text-decoration: line-through;"><?=number_format($product['price'])?> VND</p>
                <div>
                    <button style="width:30px; text-align:center;border: 1px solid #ced4da;" onclick="addMoreCart(-1)">-</button>
                    <input type="number" name="number" id="" step="1" value="1" style="width:80px; text-align:center;border: 1px solid #ced4da;">
                    <button style="width:30px; text-align:center;border: 1px solid #ced4da;" onclick="addMoreCart(1)">+</button>
                </div> 
                <button style="color:white;font-size: 30px;background-color: green;border: 1px solid #ced4da; margin-top:20px; width:100%; text-align:center;" onclick="addCart(<?=$product['id']?>,$('[name=number]').val())"><i class="ti-shopping-cart"></i> THÊM VÀO GIỎ HÀNG</button>
                <a href="cart.php"><button style="color:black;font-size: 30px;background-color:#898b8c;border: 1px solid #ced4da; margin-top:20px; width:100%; text-align:center;"><i class="ti-heart"></i> XEM GIỎ HÀNG</button></a>
                
            </div>

        </div>
        <div style="margin-left: 40px;margin-right: 40px;">
            <h3>CHI TIẾT SẢN PHẨM</h3>
            <?=$product['decription']?>
        </div>

    </div>
    <!-- GIỚI THIỆU SẢN PHẨM -->
    <div>
        <h1 style="text-align:center; margin-top:100px;">SẢN PHẨM LIÊN QUAN</h1>
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
    </div>
<script type="text/javascript">
    function addMoreCart(delta){
        number= parseInt($('[name=number]').val())
        number+=delta
        if( number<1){number=1}
        $('[name=number]').val(number)
    }
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