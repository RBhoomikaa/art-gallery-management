<!DOCTYPE html>
<?php
   include("conn.php");
$msg="";
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($link,$_POST['uname']);
      $mypassword1 = mysqli_real_escape_string($link,$_POST['password']); 
      $mypassword = md5($mypassword1);
      $sql = "SELECT mail FROM insert1 WHERE mail = '$myusername' and pwd = '$mypassword'";
      $result = mysqli_query($link,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	  isset($cOTLdata['mail']);
      
      $count = mysqli_num_rows($result);
      
      if($count == 1) {
         
         $_SESSION['uname'] = $myusername;
         
         header("location: adminHome.php");
      }else {
          
         $msg = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Admin Login</title>
		<link href="../images/icon.png" rel="icon">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
        <style>
    body
    {
        background-image: url(../images/admin_reg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
    
    
    </style>

	</head>

	<body>
	
		
		<nav class="navbar navbar-inverse top-menu">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <a class="navbar-brand" href="#">Art Gallery</a>
			</div>
			<div>
			  
				<ul class="nav navbar-nav navbar-right">
				<li><a href="registration.php"><span class="glyphicon glyphicon-user"></span> Registration</a><li>
				<li><a href="#" style="color:#fff"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			  </ul>
			</div>
		  </div>
		</nav>
		<div class="container">
			<div class="panel panel-primary admin-login">
				<div class="panel-heading">
					<h3>Login</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="post">
					  <div class="bg-danger error_msg"><?php echo $msg; ?></div>
					  <div class="form-group input-group">
							<span class="input-group-addon glyphicon glyphicon-envelope" style="top:0"></span><input type="email" name="uname" class="form-control"placeholder="Enter email">
					  </div>
					  <div class="form-group input-group">
							<span class="input-group-addon glyphicon glyphicon-lock" style="top:0"></span><input type="password" name="password" class="form-control" placeholder="Enter password">
					  </div>
					  
					  <div class="form-group"> 
						  <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
					  </div>
					</form>
				</div>
			</div>
		</div>
		<?php
			require_once('dbconclose.php');
		?>
		
	</body>
</html>




