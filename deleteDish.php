<?php
// 类似于action 顾名思义deleteDish
	session_start();
	$dishName = $_GET["dishName"];
	
	$con = mysqli_connect("localhost:3306","root","123");
    if (!$con){
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con,"HefengSushi");
    mysqli_query($con,'set names utf8');
    $query = "select * from Dish where DishName = '".$dishName."'";
    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    	if ($_SESSION['cart'][$dishName] > 0){
    		$_SESSION['cart'][$dishName] -= 1;
    		$_SESSION['total_price'] -= $row['Price'];
    	}
	}
	echo $_SESSION['total_price'];
?>