<?php
require_once('../../database/utility.php');
require_once('../../database/dbhelper.php');
 if (!empty($_POST)){
    $id = getPost('id');
    $name = getPost('name');
    if ($id>0){
        //update
        if($name!=''){
            $sql = "UPDATE category set name = '$name' where id=$id";
            execute($sql);
        }
        
    }    else{
        //insert
        if($name!=''){
            $sql="INSERT into category(name)values ('$name')";
            execute($sql);
        }
        
    }
 }