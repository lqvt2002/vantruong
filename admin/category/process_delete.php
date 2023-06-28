<?php
session_start();
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
 $user = getUserToken();
 if ($user == null){
    die();
 }
 if (!empty($_POST)){
    deleteCategory();
 }
 function deleteCategory(){
    $id = getPost('id');
    // V. check điều kiện nếu danh mục nào có chứa sản phẩm thì k dc phép xóa
    $sql = "SELECT count(*) as total from product where category_id=$id and deleted=0";
    $data= executeResult($sql,true);
    $total= $data['total'];
    if($total>0){
        echo 'danh mục có chứa sản phẩm nên không được phép xóa. ';
        die();
    } else{
        $sql = "DELETE from category where id ='$id'";
        execute($sql);
    }
    
 }
 ?>