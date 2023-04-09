<?php
require('Admin/conn.php');
$id=$_REQUEST['pid'];
$mail=$_REQUEST['mail'];
$cost=$_REQUEST['cost'];
$query = "DELETE FROM buy WHERE pid=$id"; 
$result = mysqli_query($link,$query);
header("Location: buy_product.php"); 
?>