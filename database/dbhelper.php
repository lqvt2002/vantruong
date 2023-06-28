<?php
require_once("config.php");
//chua cac ham chung insert, update, delete, select
function execute($sql){ //SQL: insert, update, delete
    // open conection
    $conn = mysqli_connect( HOST, username, password, database);
    mysqli_set_charset($conn,'utf-8');
    // query truy van
    mysqli_query($conn,$sql);
    // close connection
    mysqli_close($conn);
}

//select: lay du lieu dau ra, va lay ra danh sach hoac 1 ban ghi
function executeResult($sql, $isSingle=false){ //sql truy van select
    $data=null;
    // open conection
    $conn = mysqli_connect( HOST, username, password, database);
    mysqli_set_charset($conn,'utf-8');

    // query truy van
    $resultSet=mysqli_query($conn,$sql);
    if($resultSet){
        if( $isSingle){
            $data = mysqli_fetch_array($resultSet,1);
        }
        else{
            $data=[];
            while(($row = mysqli_fetch_array($resultSet,1))!= null){
                $data[] =$row;
            }
        }
   
    // close connection
    mysqli_close($conn);
    }
    return $data;
}