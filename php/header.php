<!DOCTYPE html>

<?php

		include('Admin/conn.php');
		
		if(isset($_POST['logout']))
		{
			session_destroy();
			header('location:index.php');
		}        
	//require_once('Admin/conn.php');
	
	
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Gallery | <?php echo $title; ?></title>
    <link href="images/icon.png" rel="icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet"/>
	
  </head>
  
  
	
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
			  <a class="navbar-brand" href="home.php">Art Gallery</a>
			</div>
			<div>
				<ul class="nav navbar-nav navbar-right signup">
					
						<li class="dropdown user-icon">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span>Hi <?php session_start(); echo $_SESSION['uname']; ?> </span> <span class="glyphicon glyphicon-user"></span>  <span class="glyphicon glyphicon-triangle-bottom"></span></a>
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
                  <li <?php if($page=="buy") echo 'class="active"' ?>><a href="buy_product.php">My orders</a></li>
			  </ul>
			</div>
         </div>
		</nav>
	