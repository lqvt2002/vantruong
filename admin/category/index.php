<?php 
    $title = 'Danh mục sản phẩm';
    $baseUrl='../';
    require_once('../layout/header.php');
    require_once('form_save.php');
    $id=$name='';
    //
    if (isset($_GET['id'])){
        $id= getGet('id');
        $sql = "SELECT * from category where id = $id";
        $data= executeResult($sql,true);
        if($data!=null){
            $name=$data['name'];
        }
    }
    //lay thong tin cac danh muc ra 
    $sql= "SELECT * from category ";
    $data= executeResult($sql);
?>
<link rel="stylesheet" href="../../assets/category/index.css">
<div class="main-responsive">
    <div class="responsive">
        <form action="index.php" method="POST" onsubmit="return validateForm();" style=" ">
                    <h1 style=" margin:10px; text-align:center;">QUẢN LÝ DANH MỤC SẢN PHẨM</h1>
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" id="email" placeholder = "Nhập tên danh mục" name="name" value="<?=$name?>">
                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                    </div>
                    <button type="submit" class="btn btn-default" style="background-image: url(../../assets/image/background_header.png);">Lưu</button>
                     </p>
                </form>
    </div>
    <div class="table-responsive ">          
        <table class="table" style="border: 1px solid black; padding: 8px;">
            <thead>
            <tr style="background-image: url(../../assets/image/background_header.png);">
                <th style="border: 1px solid black; padding: 8px; width:5%">STT</th>
                <th style="border: 1px solid black; padding: 8px; width:80%">Tên danh mục</th>
                <th style="width:50px;border: 1px solid black; padding: 8px;"></th>
                <th style="width:50px;border: 1px solid black; padding: 8px;"></th>
            </tr>
            </thead>
            <tbody>
                <?php
                $index=0;
                foreach ($data as $item){
                    echo'
                    <tr>
                        <th style="border: 1px solid black; padding: 8px;">'.(++$index).'</th>
                        <th style="border: 1px solid black; padding: 8px;">'.($item['name']).'</th>
                        <th style="width:50px; border: 1px solid black;"><a href="?id='.($item['id']).'"> 
                            <button ">Sửa</button></a>
                        </th>
                        <th style="width:50px; border: 1px solid black;">
                            <button onclick="deleteCategory('.$item['id'].')" >Xóa</button> 
                        </th>
                    </tr> ';
                }
                ?>
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
    function deleteCategory(id){
        Option= confirm ('Bạn có chắc chắn muốn xóa danh mục sản phẩm này không?');
        if(!Option) return;
        $.post('process_delete.php',{
            'id':id, 'action':'delete'
            }, function(data){
                if( data != null && data !=''){
                    alert(data);
                    return;
                }
                location.reload()
            })
    }
</script>
<?php
 require_once('../layout/footer.php')
?>
