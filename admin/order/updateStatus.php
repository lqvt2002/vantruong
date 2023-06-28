<?php
session_start();
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
 $user = getUserToken();
 if ($user == null){
    die();
 }
 if (!empty($_POST)){
    updateStatus();
 }
 function updateStatus(){
    $id = getPost('id');
    $status = getPOST('status');
    $sql = "UPDATE orders set status= $status where id ='$id'";
    execute($sql);
 }
 ?>