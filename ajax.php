<?php
    session_start();
    require_once('database/utility.php');
    require_once('database/dbhelper.php');
    $action= getPOST('action');
    switch($action){
        case 'cart':
            addCart();
            break;
        case 'updateCart':
            updateCart();
            break;
        case 'checkout':
            completeCheckout();
            break;
    }
    function completeCheckout(){
        if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
            return ;
        }
        $fullname = getPOST("fullname");
        $phone_number = getPOST("phone_number");
        $email = getPOST("email");
        $address = getPOST("address");
        $note = getPOST("note");
        $user= getUserToken();
        $userId=0;
        if($user !=null){
            $userId= $user['id'];
        }
        $orderDate= date('Y-m-d H:i:s');
        $totalMoney =0;
        foreach($_SESSION['cart'] as $item){
            $totalMoney +=$item['discount']*$item['number'];
        }
        //Luu cac thong tin vao bang orders
        $sql="INSERT into orders(user_id, fullname, email, phone_number, address, note, order_date, status, total_money) values($userId,'$fullname', '$email','$phone_number','$address', '$note','$orderDate',1, '$totalMoney')";
        execute($sql);
        //Luu thong tin chi tiet don hang vao bang order_detal
        $sql="SELECT *from orders where order_date ='$orderDate'";
        $orderItem= executeResult($sql, true);
        $orderId= $orderItem['id'];
        foreach($_SESSION['cart'] as $item){
            $product_id= $item['id'];
            $price= $item['discount'];
            $number= $item['number'];
            $totalMoney= $price* $number;
            $sql="INSERT into order_detail(order_id, Product_id, price, number, total_money) values ('$orderId','$product_id', '$price','$number','$totalMoney')";
            execute($sql);
        }    
        unset($_SESSION['cart']);
    }
    function updateCart(){
        $id= getPOST('id');
        $number= getPOST('number');
        if( !isset($_SESSION['cart'])){
            $_SESSION['cart']=[];
        }
        for($i=0; $i<count($_SESSION['cart']); $i++){
            if ($_SESSION['cart'][$i]['id']== $id){
                $_SESSION['cart'][$i]['number']= $number;
                if($number<=0){
                    array_splice($_SESSION['cart'], $i, 1);
                }
                break;
            }
        }
    }
    function addCart(){
        $id= getPOST('id');
        $number= getPOST('number');
        if( !isset($_SESSION['cart'])){
             $_SESSION['cart']=[];
         }

        $isFind=false;
        for($i=0; $i<count($_SESSION['cart']); $i++){
            if ($_SESSION['cart'][$i]['id']== $id){
                $_SESSION['cart'][$i]['number']+= $number;
                $isFind=true;
                break;
            }
        }
    if (!$isFind){
        $sql ="SELECT product.*, category.name as category_name from product left join category on product.category_id = category.id where product.id = $id";
        $product=executeResult($sql, true);
        $product['number']=$number;
        $_SESSION['cart'][]= $product;
    }
    }