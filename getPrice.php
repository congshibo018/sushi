<?php
//ajax 调用getPrice.php 可以获得单价
    $con = mysqli_connect("localhost:3306","root","123");
    $dishName = $_GET["dishName"];
    if (!$con){
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con,"HefengSushi");
    mysqli_query($con,'set names utf8');
    $query = "select * from Dish where DishName = '".$dishName."'";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo $row['Price'];
    }
?>
