<?php
    require_once "conn.php";
    if(isset($_GET['mail'])) {
        $a=$_GET['mail'];
        $sql = "SELECT img_type,img FROM insert1 WHERE mail='$a'";
		$result = mysqli_query($link, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" .mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["img_type"]);
        echo $row["img"];
        
	}
	mysqli_close($link);
?>