<?php
    header('Content-Type: application/json');
    header('Content-Type: text/html;charset=utf-8');

    session_start();

    $series = $_GET['series'];
    $dish = [];

    $con = mysqli_connect("localhost:3306","root","123");
    if (!$con){
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con,"HefengSushi");
    mysqli_query($con,'set names utf8');
    $query = "select count(*) from Dish where Series = '".$series."'";
    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_array($result);
    $count = ceil($row[0]/12);
    echo $count;
?>


