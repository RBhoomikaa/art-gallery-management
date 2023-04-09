<!DOCTYPE html>
<?php $msg="";  $about_msg=""; 
    
    session_start();

if(isset($_POST['logout']))
		{
			session_destroy();
			header('location:index.php');
		}

?>




<?php

require_once('conn.php');
if(isset($_POST['submit'])) {
    if(count($_FILES) > 0) {
        if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
        $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
	   $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
            
        $cap=$_POST['caption'];
            $cos=$_POST['cost'];
            $cate=$_POST['cat'];
            $ml=$_SESSION['uname'];
            $obj=$_POST['object'];
            $pid=rand(1000, 2000);
                $aid='10';
            $sold='0';
            date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
    $time=(string)date('d-m-Y H:i:s');
	   $sql = "INSERT INTO paiting(caption, img_type ,img,cost,category,object,mail,aid,pid,date,sold)	VALUES ('$cap','{$imageProperties['mime']}', '{$imgData}','$cos','$cate','$obj','$ml','$aid','$pid','$time',$sold)";
	   
	   if(mysqli_query($link,$sql)) {
                $msg=mysqli_error($link);
	}
            else
            {
                mysqli_query($link, $sql) ;
           echo '<script language="javascript">';
        echo 'alert("Painting has been Successfully Uploaded"); location.href=" adminHome.php"';
        echo '</script>';
           
           
            }
}
}}
?>





<?php
require_once('conn.php');
if(isset($_POST['news_submit'])) {
        $nn=$_POST['new_news'];
            $ml=$_SESSION['uname'];
    $nid=rand(1000, 2000);
    
    date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
    $time=(string)date('d-m-Y H:i:s');
	   $sql = "INSERT INTO news(mail, mid ,time,news)	VALUES ('$ml','$nid','$time','$nn')";
	   $current_id = mysqli_query($link, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($link));
	   if(isset($current_id)) {
           
           echo '<script language="javascript">';
        echo 'alert("News has been Updated"); location.href=" adminHome.php"';
        echo '</script>';
           
	}
}
?>



<html>
	  <head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Art Gallery | Admin</title>
			<link href="../images/icon.png" rel="icon">
			<link href="../css/bootstrap.min.css" rel="stylesheet">
			<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">
			<link href="style.css" rel="stylesheet">
          <script type="text/javascript">
          
          function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
          </script>
	  </head>
    <style>
        body{ background-image: url(../images/admin_main.jpg);
        background-repeat: no-repeat;
        background-size: cover;"
        }
    </style>
	  <body>
		<div class="container-fluid">
			<div class="row header">
				<div class="col-md-9"><h3>Art Gallery</h3></div>
				<div class="col-md-3">
					<ul class="user-nav">
						<li class="dropdown user-icon">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<span>Hi <?php echo $_SESSION['uname']; ?> </span> <span class="glyphicon glyphicon-user"></span>  <span class="glyphicon glyphicon-triangle-bottom"></span></a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li class="divider"></li>
								<li class="logout-li"><form method="post"><span class="glyphicon glyphicon-log-out"></span><button type="submit" name="logout" class="btn btn-default logout"> Logout</button></form></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="row center-container" >
				<div class="col-md-2 left-nav">
					<ul class="nav nav-stacked left-menu">
						<li role="presentation"><a href="#dashboard" class="active">Home</a></li>
						<li role="presentation"><a href="#home">Add Painting</a></li>
						<li role="presentation"><a href="#about">News</a></li>
						
						<li role="presentation"><a href="#reach_us">Painting</a></li>
						
					</ul>
				
				</div>
				<div class="col-md-10">
					<div class="pages center-container">
						<div id="dashboard" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Home</h3>
								</div>
								<div class="panel-body">
									
									<!-- Social Links  -->
									<div class="panel panel-default social-links">
										<div class="panel-heading">
											<h4>My Profile</h4>
										</div>
										<div class="panel-body">
                                            <?php	
                                            $ml=$_SESSION['uname'];
											$sql="select * from insert1 where mail='$ml'";
											$result=mysqli_query($link,$sql) or die("Error fetching data.".mysqli_error($link));
											$socialcontent=mysqli_fetch_assoc($result);
											mysqli_free_result($result);
										?>
                                            
                                            <table class="table table-bordered">
                                                <tr>
                                            <td><b>Name:</b></td>
                                                    <td><?php echo $socialcontent['name']; ?></td>
                                                    <td colspan="3" rowspan="6" align="center"> 
                                                        <?php
                                                        require_once "conn.php";
                                                        $ml=$_SESSION['uname'];
                                                         $sql = "SELECT mail FROM insert1 where mail='$ml'"; 
                                                $result = mysqli_query($link, $sql);
	               while($row = mysqli_fetch_array($result)) {
	?>
		<img src="image.php?mail=<?php echo $row["mail"]; ?>" width="200" height=200 alt="AQS"/><br/>
	
<?php		
	}
    
?>
                                                                                   
                                                                                   </td>
                                                    </tr>
                                                    <tr>
                                                <td> <b>Phone No:</b></td>
                                                        <td> <?php echo $socialcontent['phone']; ?></td>
                                                
                                                </tr>
                                                <tr>
                                                <td><b>Address:</b></td>
                                                    <td><?php echo $socialcontent['address']; ?></td>
                                                
                                                </tr>
                                                
                                                <tr>
                                                <td><b>DOB:</b></td>
                                                    <td><?php echo $socialcontent['dob']; ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                <td><b>Gender:</b></td>
                                                    <td><?php echo $socialcontent['gender']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Categroies</b></td>
                                                    <td><?php echo $socialcontent['c1']; ?>, <?php echo $socialcontent['c2']; ?>, <?php echo $socialcontent['c3']; ?></td>
                                                    
                                                </tr>
                                            </table>
                                            
                                            
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<!-- ------------------Home Page--------------  -->
						<div id="home" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>Add Painting</h3>
								</div>
								<div class="panel-body">
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" >
					
                                    <table class="table table-bordered">
                                    <tr>
                                        <td rowspan="5" align="center" ><img id="blah" src="#" style="background-color:#f1f1f1" height="200" width="300"/> </td>                                    
                                        </tr>
                                        <tr>
                                            <td colspan="2"><label class="radio-inline">Caption:</label> <input type="text" name="caption"/></td>
                                            
                                        </tr>
                                    
                                        <tr>
                                        <td colspan="2">
                                            
                                                <label class="radio-inline">Object: </label>
                                                <select name="object">
    <option value="People">People</option>
    <option value="Nature">Nature</option>
    <option value="Animal">Animal</option>
    <option value="Birds">Birds</option>
  </select>
                                                    </td>
                                            
                                        </tr>
                                        <?php	
                                            $ml=$_SESSION['uname'];
											$sql="select * from insert1 where mail='$ml'";
											$result=mysqli_query($link,$sql) or die("Error fetching data.".mysqli_error($link));
											$socialcontent=mysqli_fetch_assoc($result);
											mysqli_free_result($result);
										?>
                                        <tr>
                                        <td colspan="2">
                                            
                                            <div class="form-group input-group">
                        <label class="radio-inline">Category: </label>                  
                        <label class="radio-inline">
                            <input type="radio" name="cat" value="<?php echo $socialcontent['c1']; ?>" checked><?php echo $socialcontent['c1']; ?>
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="cat" value="<?php echo $socialcontent['c2']; ?> "checked><?php echo $socialcontent['c2']; ?>
                        </label>
                                                <label class="radio-inline">
                            <input type="radio" name="cat" value="<?php echo $socialcontent['c3']; ?>"  checked><?php echo $socialcontent['c3'];?>
                        </label>
                        </div></td>
                                            
                                        </tr>
                                        <tr>
                                            <td colspan="2"><label class="radio-inline">Cost:</label> <input type="text" name="cost"/></td>
                                            
                                        </tr>
                                        <tr>
                                            <td align="center"><label class="radio-inline">
                                                
                                                <input type='file' name="userImage" class="inputFile"  onchange="readURL(this);" />
    
                                                
                                                </label></td>
                                            <td align="center"><label class="radio-inline"><button type="submit" name="submit" class="btn btn-primary btn-block">Upload</button>
                                                
                                                </label></td>
                                            <td align="center"><label class="radio-inline"><button type="submit" name="clear" class="btn btn-primary btn-block">Clear</button>
                                                
                                                </label></td>
                                            
                                        </tr>
                                    
                                    </table>
                                    </form>  
                                    <div class="bg-danger error_msg" style="text-align:center;"><?php echo $msg; ?></div>
									
									
								</div>
							</div>
						</div>
						<!-- ------------------End Home Page--------------  -->
						
                        <!-- ---------------About page--------------->
						<div id="about" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>News</h3>
								</div>
								<div class="panel-body">
									<!-- About us content  -->
									<div class="panel panel-default social-links">
										<div class="panel-heading">
											<h4>Post a new News</h4>
										</div>
										<div class="panel-body">
										
											<form class="form-inline" method="post">
												<div class="form-group">
												  <textarea class="form-control" rows="5" cols="100" name="new_news" id="myInfo"> </textarea>
												</div>
												<br/>
												<span class="text-success" style="padding-left:10px"><?php echo $about_msg; ?></span>
												<br/>
												<div class="form-group">
													<button type="submit" class="btn btn-success" name="news_submit">Add</button>
													
												</div>
                                     
                                                
                                                
											</form>
										</div>
                                        
                                        <div class="panel-heading">
											<h4>Post a new News</h4>
                                            
                                            
										</div>
                                        <br/>
                                        <div>
                                                   
                                                <table class="table table-bordered">
                                    <tr>
                                        <th>News ID</th>
                                        <th> Time </th>
                                        <th> News </th>
                                                    </tr>
                                                    
                                                    
                                                        <?php 
                                                        require_once "conn.php";
                                                    $ml=$_SESSION['uname'];
                                                        $result= mysqli_query($link,"SELECT * FROM news where mail='$ml'");
                                            while($row = mysqli_fetch_array($result))
                                                        echo "<tr><td>{$row['mid']}</td><td>{$row['time']}</td><td>{$row['news']}</td></tr>";
                                                        
                                                    
                                                    ?>
                                                </table>
                                     
                                        
                                        
                                        </div>
									</div>
									
								</div>
							</div>
						</div>
						<!-- ------------------End About page--------------->
                        
                        <!-- ---------------Reach us page------------- -->
						<div id="reach_us" class="switchgroup dashboard">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3>View Painting</h3>
								</div>
								<div class="panel-body">
									<!-- Reach us content--> 
									<div class="panel panel-default social-links">
										
										<div class="panel-body">
										
											<form class="form-inline" method="post">
											  
                                                 <table class="table table-bordered">
                                    <tr>
                                        
                                        <td> Painting </td>
                                        <td> Caption </td>
                                        <td> Object </td>
                                        <td> Category </td>
                                        <td> Cost </td>
                                        <td> Date </td>
                                        <td> Sold </td>
                                                     </tr>
                                                
                                                <?php 
                                                        require_once "conn.php";
                                                     $ml=$_SESSION['uname'];
                                                        $result= mysqli_query($link,"SELECT * FROM paiting where mail='$ml'" );
                                            while($row = mysqli_fetch_array($result))
                                                        echo "<tr><td align='center'>                                                     
                                                        <img src=image1.php?pid=".$row['pid']." width='200'  />
                                                        
                                                        </td>
                                                        
                                                        <td>{$row['caption']}</td><td>{$row['object']}</td><td>{$row['category']}</td><td>{$row['cost']}</td><td>{$row['date']}</td><td>{$row['sold']}</td></tr>";
                                                        
                                                    
                                                    ?>
                                                     
                                                     
                                                     
                                                
                                                </table>
                                                
											</form>
										</div>
									</div>
									
								</div>
						</div>
						</div>
						<!-- ------------------End Reach us page--------------->
                        
                        
						
						
					</div>
				</div>
			</div>
		</div>
		
		
		
		<div class="modal fade" id="slider_img_add" tabindex="-1" role="dialog" aria-labelledby="slider_img_add">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Slider Image</h4>
			  </div>
			  <form method="post" enctype="multipart/form-data" class="form-inline">
					
				  <div class="modal-body">
							<div class="form-group ">
								<input type="file" name="sliderpicpic_add">
							</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" name="picadd_submit" class="btn btn-primary">Add</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		
		
		
		
		
		
		<script type="text/javascript">
		</script>
		
		
		
		
		
		
		<?php
			require_once('dbconclose.php');
		?>
		
		<script src="../js/jquery.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	  </body>
</html>