<?php
// read the post from PayPal system and add 'cmd'  
include('mail.php');
$req = 'cmd=_notify-validate';  
foreach ($_POST as $key => $value) {
	$value = urlencode(stripslashes($value));
	$req .= "&$key=$value";  
}  
  
// post back to PayPal system to validate  
$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";  
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";  
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";  
  

$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30); 
  
// assign posted variables to local variables  
$item_name = $_POST['item_name'];  
$item_number = $_POST['item_number'];  
$payment_status = $_POST['payment_status'];  
$payment_amount = $_POST['mc_gross'];  
$payment_currency = $_POST['mc_currency'];  
$txn_id = $_POST['txn_id'];  
$receiver_email = $_POST['receiver_email'];  
$payer_email = $_POST['payer_email'];  
$mc_gross = $_POST['mc_gross ']; // 付款金额  
$custom = $_POST['custom ']; // 得到订单号  

$myfile = fopen("testfile2.txt", "w");
fwrite($myfile, $req);
fclose($myfile);
if (!$fp) {  
// HTTP ERROR  
} else {  
fputs ($fp, $header . $req);  
while (!feof($fp)) {  
$res = fgets ($fp, 1024);  

if (strcmp ($res, "VERIFIED") == 0) {  

	if($payment_status == "Completed"){
		$con = mysqli_connect("localhost:3306","root","123");
		if (!$con){
			die('Could not connect: ' . mysqli_error());
		}
		mysqli_select_db($con,"HefengSushi");
		mysqli_query($con,'set names utf8');
		$query = "UPDATE Orders SET Status=1 ,SuccessDate=".date('Y-m-d H:i:s')." WHERE id=".$custom;
		mysqli_query($con,$query);

		$query = "SELECT * FROM Orders WHERE id=".$custom;
		$result = mysqli_query($con,$query);

		$port = 994;
		$user = 'alec_110'; //请替换成你自己的smtp用户名
		$pass = 'as6377658'; //请替换成你自己的smtp密码
		$host = 'smtp.163.com';
		$from = 'alec_110@163.com'; 
		$to = 'alec_110@163.com';
		$body = '订单号:'.$custom.'<br>';
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			$body = $body.'Custom Name:'.$row['CustomName'].'<br>';
			$body = $body.'Address:'.$row['Address'].'<br>';
			$body = $body.'Phone:'.$row['Phone'].'<br>';
			$body = $body.'Detail:'.$row['Detail'].'<br>';
			$body = $body.$row['DeliveryMethod'].'<br>';
			$body = $body.$row['DeliveryTime'].'<br>';
		}

		$subjet = '和风寿司订单确认';
		$mailer = new Mailer($host,$port,$user,$pass,true);
		$mailer->sendMail($from,$to,$subjet,$body);
	}
	
// check the payment_status is Completed  
// check that txn_id has not been previously processed  
// check that receiver_email is your Primary PayPal email  
// check that payment_amount/payment_currency are correct  
// process payment  
// 验证通过。付款成功了，在这里进行逻辑处理（修改订单状态，邮件提醒，自动发货等）  
}  
else if (strcmp ($res, "INVALID") == 0) {  
// log for manual investigation  
// 验证失败，可以不处理。  
}  
}  
fclose ($fp);  
}  
?>  