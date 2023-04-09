<?php
	$page="cart";
	$title="Cart";
	require_once('header.php');
	
?>
	  
      <div class="container-fluid cart-container">
				<div class="panel panel-default">
				  <div class="panel-heading">Cart</div>
				  <div class="panel-body">
					<table class="table cart_table" align="center">
					  <tr style="font-weight:bolder">
						
						<td>Painting</td>
						<td>Caption</td>
						<td>shipping details</td>
						<td>Total Price</td>
                          <td>Remove Item</td>


					  </tr>
					    <?php 
                                                        require_once "Admin/conn.php";
                                                        $result= mysqli_query($link,"SELECT *  FROM paiting where pid in (select product from cart)");
                                            while($row = mysqli_fetch_array($result)) {
	?>
                        
                        <tr><td style="text-align: center; 
    vertical-align: middle;">                                                     
                                                  <?php echo "<img src=image1.php?pid=".$row['pid']." width='200'  />" ?>
                                                        
                                                        </td>
                                                        <td style="text-align: center; 
    vertical-align: middle;"> <?php echo "{$row['caption']}" ?> </td>
                            <td style="text-align: center; 
    vertical-align: middle;">                                                     
                           <a href="payment.php"> click here</a> to enter details</td>  
                            
                                                        <td style="text-align: center; 
                                                                   vertical-align: middle;"> <b>Rs. <?php echo "{$row['cost']}" ?>/- </b><br><br>
                                                            <a href="buy_cart.php?mail=<?php echo $_SESSION['uname']; ?>&pid=<?php echo $row['pid'];?>&cost=<?php echo $row['cost'];?>" class="btn btn-primary">BUY</a>
                            
                            </td>
                            <td style="text-align: center; 
    vertical-align: middle;">	
                                <a href="delete_item.php?pid=<?php echo $row['pid'];?>&mail=<?php echo $_SESSION['uname']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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