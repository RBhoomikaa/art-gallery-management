<?php
    require_once "conn.php";
    if(isset($_GET['pid'])) {
        $a=$_GET['pid'];
        $sql = "SELECT img_type,img FROM paiting WHERE pid='$a'";
		$result = mysqli_query($link, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" .mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["img_type"]);
        echo $row["img"];
        
	}
	mysqli_close($link);
?>