<?php
$orderId = $_POST['orderId']; 

$con = mysqli_connect("localhost:3306","root","123");
if (!$con){
	die('Could not connect: ' . mysqli_error());
}
mysqli_select_db($con,"HefengSushi");
mysqli_query($con,'set names utf8');
$query = "UPDATE Orders SET Status=2 WHERE id=".$orderId;
$errortext = "";
$errorcode = 0;
if (!mysqli_query($con,$query)) 
{ 
    $errortext .= mysqli_error($con);
    $errorcode = 1;
} 
$jsonResult = '{errorcode="'.$errorcode.'", errortext="'.$errortext.'"}';
echo $jsonResult;
?>