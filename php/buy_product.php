<!doctype HTML>
<?php
	$page="buy";
	$title="Buy Product";
	require_once('header.php');
	
?>
	
      <div class="container-fluid cart-container">
				<div class="panel panel-default">
				  <div class="panel-heading">order successfull</div>
				  <div class="panel-body">
					<table class="table cart_table" align="center">
					  <tr style="font-weight:bolder">
						
						<td>Painting</td>
						<td>Caption</td>
						<td>Cost</td>
                                                <td>Cancel order</td>
						
					  </tr>
					    <?php 
                                                        require_once "Admin/conn.php";
                        $ml=$_SESSION['uname'];
                                                        $result= mysqli_query($link,"SELECT *  FROM paiting,buy where paiting.pid=buy.pid and buy.mail='$ml'");
                                            while($row = mysqli_fetch_array($result)) {
	?>
                        
                        <tr><td style="text-align: center; 
    vertical-align: middle;">                                                     
                                                  <?php echo "<img src=image1.php?pid=".$row['pid']." width='200'  />" ?>
                                                        
                                                        </td>
                                                        <td style="text-align: center; 
    vertical-align: middle;"> <?php echo "{$row['caption']}" ?> </td>
                            
                                                        <td style="text-align: center; 
    vertical-align: middle;"> <?php echo "{$row['cost']}" ?> <br>
                           
                            </td>

      <td style="text-align: center; 
    vertical-align: middle;"> 
              <p> click here to cancel order</p>
                                 <a href="cancel_item.php?pid=<?php echo $row['pid'];?>&mail=<?php echo $_SESSION['uname'];?>&cost=<?php echo "{$row['cost']}"?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
						</td>
						                                       
                        </tr>
                        
                        
                        <?php } ?>
                        
					</table>
						
				  </div>
				</div>	
      </div>
			
		 
		  

	<script type="text/javascript">
		
		function btnClick(x)
		{
			if(x=='+')
			{
				var a=document.getElementById("q_item").innerHTML;
				document.getElementById("q_item").innerHTML=parseInt(a)+1;
			}
			else
			{
				document.getElementById("q_item").innerHTML-=1;
			}
		}
	</script>

<?php
	require('footer.php');
?>