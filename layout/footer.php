<footer>
    <div class="container-row footer">
        <div class="footer-col">
            <h4>GIỚI THIỆU</h4>
            <ul>
                <li>Email: admin@gmail.com</li>
                <li>SĐT: 0947713152</li>
            </ul>
        </div> 
        <div class="footer-col">
            <h4>SẢN PHẨM MỚI</h4>
            <ul>
                <li>Nam</li>
                <li>Phụ nữ</li>
                <li>Trẻ em</li>
            </ul>
        </div> 
    </div>
</footer>
<div style="background-color: rgb(24, 95, 138); margin:0px"><p style="margin:0px; text-align:center;">Được thiết kế bởi VT</p></div>

<!-- cho hiển thị số lượng hàng trong giỏ hàng -->
<?php
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart']=[];
    }
    $count=0;
    foreach($_SESSION['cart'] as $item){
       $count += $item['number']; 
    }
    ?>

<!-- --------cart -->
<div>
    <span style="position:fixed; z-index:999999; right:0px; top:45%; ">
        <span style=" background-color: red; color:white; font-size:16px; padding-left:5px; padding-right:5px;border-radius:8px; position:fixed; right:60px;"><?=$count?></span>
        <a href="cart.php"><img src="assets/image/cart.png" alt="" style="width:80px"></a>
    </span>
</div>
</body>
</html>