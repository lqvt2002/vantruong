<?php 

 $title = 'Quản lý sản phẩm';
 $baseUrl='../';
 require_once('../layout/header.php');
 $sql = "SELECT product.*, category.name as category_name from product left join category on product.category_id= category.id where product.deleted=0";
 $data= executeResult($sql);
?>
<div>
    <link rel="stylesheet" href="../../assets/product/index.css">
    <div>
    <h1>QUẢN LÝ SẢN PHẨM</h1>
    <a href="editor.php"><button>Thêm sản phẩm</button></a>
    <div class="table-responsive">          
        <table class="table" >
            <thead>
            <tr style="background-image: url(../../assets/image/background_header.png);">
                <th class="table-th" style=" width:5%">STT</th>
                <th class="table-th" style=" width:15%">Thumbnail </th>
                <th class="table-th" style=" width:30%">Tên sản phẩm</th>
                <th class="table-th" style=" width:10%">Giá</th>
                <th class="table-th" style=" width:20%">Danh mục</th>
                <th class="table-th" style=" width:50px;"></th>
                <th class="table-th" style=" width:50px;"></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $index=0;
                foreach ($data as $item){
                    echo'
                    <tr>
                        <th class="table-th">'.(++$index).'</th>
                        <th class="table-th"><img src="'.fixUrl($item['thumbnail']).'" style="height:100px;" alt=""></th>
                        <th class="table-th">'.($item['title']).'</th>
                        <th class="table-th">'.number_format($item['discount']).' VNĐ</th>
                        <th class="table-th" > '.($item['category_name']).'</th>
                        <th style="width:50px; border: 1px solid black;"><a href="editor.php?id='.($item['id']).'"> 
                            <button ">Sửa</button></a>
                        </th>
                        <th style="width:50px; border: 1px solid black;"><button onclick="deleteProduct('.$item['id'].')" >Xóa</button> </th>
                    </tr> ';
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
    function deleteProduct(id){
        Option= confirm ('Bạn có chắc chắn muốn xóa sản phẩm này không?');
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