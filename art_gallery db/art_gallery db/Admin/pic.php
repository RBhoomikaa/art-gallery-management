<?php
    require_once "conn.php";
    if(isset($_GET['img_id'])) {
        $sql = "SELECT img_Type,img FROM insert1 WHERE phone=" . $_GET['img_id'];
		$result = mysqli_query($link, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($link));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}
	mysqli_close($link);
?>