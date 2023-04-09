<?php
require('Admin/conn.php');

$mail=$_REQUEST['mail'];
$pid=$_REQUEST['pid'];
$cost=$_REQUEST['cost'];
$sql = "INSERT INTO buy(mail,pid,cost) VALUES('$mail','$pid','$cost')";
	$result = mysqli_query($link,$sql) or die ( mysqli_error());mysqli_error($link);

$query = "DELETE FROM cart WHERE product=$pid"; 
$result1 = mysqli_query($link,$query) or die ( mysqli_error());

$result2 = mysqli_query($link, 
     "CALL update_qty()") or die("Query fail: " . mysqli_error());

header("Location: cart.php"); 
?>