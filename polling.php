<?php

$con = mysqli_connect("localhost:3306","root","123");
if (!$con){
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"HefengSushi");
mysqli_query($con,'set names utf8');

$orderType = $_POST['orderType'];

$my_array = array();
$query = "SELECT * FROM Orders WHERE Status=".$orderType;
if($orderType == 2){
        $page = $_POST['page'];
        $count = $_POST['count'];
        $query = $query." limit ".$page.",".$count." ";
}

$result = mysqli_query($con,$query);
$jsonResult = '{errorcode="0", errortext="",data=[';
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$my_array['Order Id'] = $row['id'];
	$my_array['Custom Name:']=$row['CustomName'];
	$my_array['Address:']=$row['Address'];
	$my_array['Phone:']=$row['Phone'];
	$my_array['Detail']=$row['Detail'];
	$my_array['DeliveryMethod']=$row['DeliveryMethod'];
	$my_array['DeliveryTime']=$row['DeliveryTime'];
	
	$jsonResult .= "{\"Order Id\":\"";
        $jsonResult .= $row['id'];
        $jsonResult .= "\",";

        $jsonResult .= "\"Custom Name\":\"";
        $jsonResult .= $row['CustomName'];
        $jsonResult .= "\",";

        $jsonResult .= "\"Address\":\"";
        $jsonResult .= $row['Address'];
        $jsonResult .= "\",";

        $jsonResult .= "\"Phone\":\"";
        $jsonResult .= $row['Phone'];
        $jsonResult .= "\",";

        $jsonResult .= "\"Detail\":\"";
        $jsonResult .= $row['Detail'];
        $jsonResult .= "\",";

        $jsonResult .= "\"DeliveryMethod\":\"";
        $jsonResult .= $row['DeliveryMethod'];
        $jsonResult .= "\",";

        $jsonResult .= "\"DeliveryTime\":\"";
        $jsonResult .= $row['DeliveryTime'];
        $jsonResult .= "\"},";

}
$jsonResult = rtrim($jsonResult,",");
$jsonResult.=']}';
echo $jsonResult;
?>