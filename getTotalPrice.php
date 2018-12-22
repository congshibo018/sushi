<?php
// trash code
	session_start();
	if(empty($_SESSION['total_price'])||$_SESSION['total_price']==0){
		$_SESSION['total_price'] = 0;
	}
	echo $_SESSION['total_price'];
?>