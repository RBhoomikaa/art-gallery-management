<?php
require('Admin/conn.php');
$pid=$_REQUEST['pid'];
$mail=$_REQUEST['mail'];
$sql = "INSERT INTO cart(product,mail)	VALUES('$pid','$mail')";
	$result = mysqli_query($link,$sql) or die ( mysqli_error());mysqli_error($link);
header("Location: home.php"); 
?>