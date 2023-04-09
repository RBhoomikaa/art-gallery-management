<?php

	$page="Seach";
	$title="Search";
	require_once('header.php');
?>		
 <br/><br/><br/><br/><br/><br/>
		<div class="row home_info">
			<div class="col-md-12 recent_product">
                <div class="panel panel-default">
				    <div class="panel-heading">Recent Painting</div>
				        <div class="panel-body">
                            <div class="container recent_product_container">
                              <div class="row recent_img">
				        
                               <?php 
                                                        require_once "Admin/conn.php";
                    
                    $key=$_SESSION['key'];
                                                        $result= mysqli_query($link,"SELECT *  FROM paiting where (caption='$key' || object='$key' || category='$key') and pid not in (select product from cart) order by date desc");
                                                        $result= mysqli_query($link,"SELECT *  FROM paiting where (caption='$key' || object='$key' || category='$key') and pid not in (select product from cart) order by date desc");
                                            while($row = mysqli_fetch_array($result)) {
	?>
                                  
                                  <div class="col-md-4">
                                      <img src="image1.php?pid=<?php echo $row["pid"]; ?>" class="img-thumbnail home_img" width="150%" />
                                      
                                      <div class="row recent_img_desc">
                                    <div class="col-md-4"><?php echo $row['caption'] ?></div>
                                  </div>
                                      <div class="row recent_img_desc">
                                    <div class="col-md-4"><p><b>Cost: </b><?php echo $row['cost'] ?></p></div>
                                  </div>
                                      
                                      <div class="row recent_img_desc">
                                    <div class="col-md-4"><p><b>Object: </b><?php echo $row['object'] ?></p></div>
                                  </div>
                                      
                                      <div class="row recent_img_desc">
                                    <div class="col-md-4"><p><b>Category: </b><?php echo $row['category'] ?></p></div>
                                  </div>
                                      
                                <div class="row recent_img_desc">
                                    <div class="col-md-4">
                                        
                                        <a href="cart_page.php?pid=<?php echo $row['pid'];?>&mail=<?php echo $_SESSION['uname']; ?>" class="btn btn-info">  Add Cart</a><br><br>
                                      </div>
                                      </div>      
                                      
                                  </div>
                                  
                                  	
<?php		
	}
    mysqli_close($link);?>
                                
                                  
                              </div>
                               
                            </div>
                        </div>
                </div>
			</div>
			
		  </div>
		  
<?php

	require('footer.php');
?>	
