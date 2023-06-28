<?php
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
if(!empty($_POST)){
    $id = getPOST('id');
    $title = getPOST('title');
    $price = getPOST('price');
    $discount = getPOST('discount');
    $thumbnail= moveFile('thumbnail');
    $decription = getPOST('decription');
    $category_id= getPOST('category_id');
    $create_at = $update_at= date('Y-m-d H:i:s');

        if ($id>0){
                //update
            if( $thumbnail!=''){
                $sql="UPDATE product set thumbnail='$thumbnail', title='$title', price='$price', discount='$discount ', decription='$decription', update_at='$update_at', category_id='$category_id' where  id=$id";
            } else{
                $sql="UPDATE product set title='$title', price='$price', discount='$discount ', decription='$decription', update_at='$update_at', category_id='$category_id' where  id=$id";
            }
            execute($sql);
            header('location:index.php');
            die();
        }
        else{
            //insert
            $sql="INSERT into product (thumbnail, title, price, discount, decription,create_at, update_at, deleted, category_id) values ('$thumbnail','$title', '$price','$discount ','$decription','$create_at','$update_at', 0, '$category_id')";
            execute($sql);
            header('location:index.php');
            die();
        }
    }
    ?>