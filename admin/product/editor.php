<?php 

 $title = 'Thêm/sửa sản phẩm';
 $baseUrl='../';
 require_once('../layout/header.php');
 $id=$thumbnail=$title=$price=$discount=$category_id=$decription='';
 require_once('form_save.php');// su ly phan them va sua tai khoan
 $id = getGET('id');
if($id != '' && $id>0 ){
    $sql = "SELECT * from product where id = '$id' and deleted=0";
    $productItem = executeResult($sql,true);
    if($productItem !=null ){
        $thumbnail= $productItem['thumbnail'];
        $title=$productItem['title'];
        $discount=$productItem['discount'];
        $decription=$productItem['decription'];
        $price=$productItem['price'];
        $category_id =$productItem['category_id'];
    } else{
        $id=0;
    }
    }
 
 $sql= "SELECT * from category";
 $categoryItems= executeResult($sql);
?>

<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<link rel="stylesheet" href="../../assets/product/editor.css">
<div>
    <h1> Thêm/sửa sản phẩm</h1>
    <div class="container" style="">
                <form class="container-form" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-col1">
                            <div class="form-group">
                                <label for="title">Tên sản phẩm:</label>
                                <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name ="title" value="<?=$title?>">
                                <input type="text" name="id" value="<?=$id?>" hidden="true"> 
                            </div>
                            <div class="form-group">
                                <label for="decription">Mô tả:</label>
                                <br>
                                <textarea placeholder="Nhập mô tả sản phẩm" name="decription" id="decription" style="width:100%" rows="10"><?=$decription?></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default" style="background-image: url(../../assets/image/background_header.png);">Lưu sản phẩm</button>
                        </div>
                        <div class="form-col2">
                            <div class="form-group" style="height:260px">
                                <label for="thumbnail">Hình ảnh:</label>
                                <!-- <input type="text" class ="form-control"  placeholder="Nhập đường dẫn ảnh" name="thumbnail" id="thumbnail" onchange="updateThumbnail()" value="<?=$thumbnail?>"> -->
                                <input type="file" accept=".jpg, .png, .jpeg, .gif" class ="form-control"  placeholder="Nhập thumbnail" name="thumbnail" id="thumbnail" onchange="updateThumbnail()" >
                                <img name="thumbnail_img" id="thumbnail_img" src="<?=fixUrl($thumbnail)?>" alt="" style="max-height:160px; margin-top:10px;">
                            </div>
                            <div class="form-group">
                                <label for="category_id">Danh mục:</label>
                                <select class="form-control" name="category_id" id="category_id" required="true">
                                    <option value="">-- chọn --</option>
                                    <?php
                                        foreach($categoryItems as $category){
                                            echo '<option select value="'.$category['id'].'" >'.$category['name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price">Giá:</label>
                                <input type="number" class="form-control"  placeholder="Nhập giá" name="price" value="<?=$price?>">
                            </div>
                            <div class="form-group">
                                <label for="discount">Giá giảm:</label>
                                <input type="number" class="form-control"  placeholder="Nhập giá giảm" name="discount" value="<?=$discount?>">
                            </div>
                        </div>
                    </div>
                    
                </form>
    </div>

</div>
<script type="text/javascript">
    function updateThumbnail() {
  var inputFile = $('#thumbnail')[0];
  var img = $('#thumbnail_img')[0];
  
  if (inputFile.files && inputFile.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $(img).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(inputFile.files[0]);
  } else {
    $(img).attr('src', ''); // Reset the image source if no file is selected
  }
}

</script>
<script>
      $('#decription').summernote({
        placeholder: 'Nhập mô tả sản phẩm...',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
<?php
 require_once('../layout/footer.php')
?>