<?php
session_start();
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
 $user = getUserToken();
 if ($user == null){
    die();
 }
 if (!empty($_POST)){
    markRead();
 }
 function markRead(){
    $id = getPost('id');
    $update_at= date(("Y-m-d H:i:s"));
    $sql = "UPDATE feedback set status=1, update_at='$update_at' where id ='$id'";
    execute($sql);
 }
 ?>