<?php
	session_start();

	$custom_name = $_GET['custom_name'];
	$custom_time = $_GET['custom_time'];
	$custom_phone = $_GET['custom_phone'];
	$pay_method = $_GET['pay_method'];
    $myfile = fopen("testfile.txt", "w");
    fwrite($myfile, $custom_time);
    fclose($myfile);
    if($pay_method=='delivery'){
        $custom_address = $_GET['custom_address'];
    }else{
        $custom_address = 'pick up';
    }

    $con = mysqli_connect("localhost:3306","root","123");
    if (!$con){
        die('Could not connect: ' . mysqli_error());
    }
    mysqli_select_db($con,"HefengSushi");
    mysqli_query($con,'set names utf8');
    if(empty($_SESSION['cart'])){
        echo "empty cart";
    }else{
    	$my_array = array();
    	$my_array = $_SESSION['cart'];
    	$Detail = "";
    	foreach ($my_array as $key => $value) {
    		if($value!=0){
    			$Detail = $Detail.$key.":".$value."\n";
    		}
    	}
    	$query = "INSERT INTO Orders (CustomName,Address,Phone,Detail,DeliveryMethod,DeliveryTime,Status) VALUES ('".$custom_name."','".$custom_address."','".$custom_phone."','".$Detail."','".$pay_method."','".$custom_time."',0)";
    	$result = mysqli_query($con,$query);
    	$orderId = mysqli_insert_id($con);
    	echo $orderId;
    }
    
?>