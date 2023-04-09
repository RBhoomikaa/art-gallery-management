<?php
require('Admin/conn.php');
$id=$_REQUEST['pid'];
$mail=$_REQUEST['mail'];
$query = "DELETE FROM cart WHERE product=$id"; 
$result = mysqli_query($link,$query) or die ( mysqli_error());
header("Location: cart.php"); 
?>