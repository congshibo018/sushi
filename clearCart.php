<?php
//调用clearCart.php 可以清空session中cart内容
	session_start();
	//初始化cart(如果没有)
    $con = mysqli_connect("localhost:3306","root","123");
    if (!$con){
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con,"HefengSushi");
    mysqli_query($con,'set names utf8');
    
    if(empty($_SESSION['cart'])){
        $_SESSION['total_price'] = 0;
    }else{
        $my_array = array();
        $query = "select * from Dish";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $my_array[$row['DishName']] = 0;
        }
        $_SESSION['cart'] = $my_array;
        $_SESSION['total_price'] = 0;
    }
    echo $_SESSION['total_price'];
?>
