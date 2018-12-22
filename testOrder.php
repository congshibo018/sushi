<?php
// 类似于action 顾名思义addDish
include('mail.php');
$custom = 22;
	$dishName = $_GET["dishName"];
	    $con = mysqli_connect("localhost:3306","root","123");
        if (!$con){
            die('Could not connect: ' . mysqli_error());
        }
        mysqli_select_db($con,"HefengSushi");
        mysqli_query($con,'set names utf8');
        $query = "UPDATE Orders SET Status=1 WHERE id=".$custom;
        mysqli_query($con,$query);

        $query = "SELECT * FROM Orders WHERE id=".$custom;
        $result = mysqli_query($con,$query);

        $port = 994;
        $user = 'alec_110'; //请替换成你自己的smtp用户名
        $pass = 'as6377658'; //请替换成你自己的smtp密码
        $host = 'ssl://smtp.163.com';
        $from = 'alec_110@163.com'; 
        $to = 'alec_110@163.com';
        $body = '订单号:'.$custom.'<br>';
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $body = $body.'Custom Name:'.$row['CustomName'].'<br>';
            $body = $body.'Address:'.$row['Address'].'<br>';
            $body = $body.'Phone:'.$row['Phone'].'<br>';
            $body = $body.'Detail:'.$row['Detail'].'<br>';
            $body = $body.$row['PayMethod'].'<br>';
        }

        $subjet = '和风寿司订单确认';
        $mailer = new Mailer($host,$port,$user,$pass,true);
        $mailer->sendMail($from,$to,$subjet,$body);
?>