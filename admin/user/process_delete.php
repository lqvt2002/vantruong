<?php
session_start();
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
 $user = getUserToken();
 if ($user == null){
    die();
 }
 if (!empty($_POST)){
    deleteuser();
 }
 function deleteuser(){
    $id = getPost('id');
    $update_at= date(("Y-m-d H:i:s"));
    $sql = "UPDATE user set deleted=1, update_at='$update_at' where id ='$id'";
    execute($sql);
 }
 ?>