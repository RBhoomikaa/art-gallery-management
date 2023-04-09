<?php

	$page="index";
	$title="Home";
	require_once('header.php');
?>		
 
		<div class="container-fluid">
		  <div class="row slider">
			<div class="col-lg-14">			
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				  <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
                      <li data-target="#myCarousel" data-slide-to="3"></li>
				  </ol>
				  <div class="carousel-inner" role="listbox">
					<div class="item active">
					  <img src="images/Slider/s1.jpg" alt="Chania">
					</div>
					<div class="item">
					  <img src="images/Slider/s2.jpg" alt="Chania">
					</div>
                      <div class="item">
					  <img src="images/Slider/s4.jpg" alt="Chania">
					</div>
                      <div class="item">
					  <img src="images/Slider/s3.jpg" alt="Chania">
					</div>
					
				  </div>
				  
				  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				  </a>
				</div>
			</div>
		  </div>
		
		  <div class="row home_info">
			<div class="col-md-12 recent_product">
                <div class="panel panel-default">
				    <div class="panel-heading">Recent Painting</div>
				        <div class="panel-body">
                            <div class="container recent_product_container">
                              <div class="row recent_img">
                                  <form action="">
                                <?php 
                                                        require_once "Admin/conn.php";
                                                        $result= mysqli_query($link,"SELECT *  FROM paiting where pid not in (select product from cart) order by date desc LIMIT 6 ");
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
                                    <div class="col-md-4">
                                        
                                        <a href="cart_page.php?pid=<?php echo $row['pid'];?>&mail=<?php echo $_SESSION['uname']; ?>"  class="btn btn-info">  Add Cart</a><br><br>
                                      </div>
                                      </div>      
                                      
                                  </div>
                                  
                                  	
<?php		
	}
    mysqli_close($link);?>
                                
                                  </form>
                                  
                                  
                                  
                                  
                              </div>
                               
                            </div>
                        </div>
                </div>
			</div>
			
		  </div>
<?php

	require('footer.php');
?>	
