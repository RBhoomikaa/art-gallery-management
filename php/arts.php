<?php
	$page="arts";
	$title="Arts";
	require_once('header.php');
	
?>	

     <body>
     <nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="#">Art Gallery</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right signup">
					
						<li class="dropdown user-icon">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span>Hi <?php  echo $_SESSION['uname']; ?>  </span> <span class="glyphicon glyphicon-user"></span>  <span class="glyphicon glyphicon-triangle-bottom"></span></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li class="divider"></li>
								<li class="logout-li"><form method="post"><span class="glyphicon glyphicon-log-out"></span><button type="submit" name="logout" class="btn btn-default logout"> Logout</button></form></li>
							</ul>
						</li>
					
					 <form class="navbar-form navbar-left" method="post">
					  <div class="input-group">
						<input type="text" class="form-control" placeholder="Search for object, category, caption" name="search_key">
						<div class="input-group-btn">
						  <button class="btn btn-default" type="submit" name="search">
							<i class="glyphicon glyphicon-search"></i>
						  </button>
						</div>
					  </div>
					</form>
                    
                    <?php 
                    if(isset($_POST['search']))
{
                    $_SESSION['key']=$_POST['search_key'];
                        header("location: search.php");
                    }
                    ?>
					
					
				</ul>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			  <ul class="nav navbar-nav navbar-right top_menu">
				
				<li <?php if($page=="index") echo 'class="active"' ?>><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
				<li <?php if($page=="aboutus") echo 'class="active"' ?>><a href="about_us.php">About us</a></li>
				<li class="dropdown <?php if($page=="arts") echo "active" ?>">
				  <a href="arts.php" class="dropdown-toggle <?php if($page=="arts") echo "active" ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Arts <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="arts.php">Gallery</a></li>
				  </ul>
				</li>
				
                  <li <?php if($page=="cart") echo 'class="active"' ?>><a href="cart.php">Cart</a></li>
                  <li <?php if($page=="buy") echo 'class="active"' ?>><a href="buy_product.php">Buy Product</a></li>
			  </ul>
			</div>
		  
		</nav>
		
	<div class="container-fluid">
		  <div class="row art_inner">
			<div class="row home_info">
			<div class="col-md-12 recent_product">
                <div class="panel panel-default">
				    <div class="panel-heading">All Paintings</div>
				        <div class="panel-body">
                            <div class="container recent_product_container">
                              <div class="row recent_img">
                               <?php 
                                                        require_once "Admin/conn.php";
                                                        $result= mysqli_query($link,"SELECT *  FROM paiting where pid not in (select product from cart) order by date desc");
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
		  </div>
		  
<?php
	require('footer.php');
?>