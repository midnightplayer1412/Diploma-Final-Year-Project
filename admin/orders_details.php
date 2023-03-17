<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to remove this order?");
	return answer;
}
 
</script>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Order Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		 if(isset($_GET['view']))
		{
			$ordid = $_GET["ordid"];
			$Orderresult = mysqli_query($connect, "SELECT * FROM orders WHERE order_id='$ordid'");
			$Orderrow = mysqli_fetch_assoc($Orderresult);
			$OrderDetailsresult = mysqli_query($connect, "SELECT * FROM order_details WHERE order_id =$ordid");
			echo "<b>Order ID</b><br>";
			echo $Orderrow['order_id'];
			echo "<hr>";
			?>
			<div class="container">
			  <div class="row">
			    <div class="col-md-3">
			      <?php echo "<b>Customer ID</b><br>";
					    echo $Orderrow["customer_id"]; 
				  ?>
			    </div>
				<div class="col-md-3">
			      <?php echo "<b>Order Date</b><br>";
						echo $Orderrow["order_date"]; 
				  ?>
				</div>
			    <div class="col-md-3">
				  <?php echo "<b>Order Total</b><br>";
					    echo $Orderrow["order_total"]; 
				  ?>
				</div>
				<div class="col-md-3">
			      <?php echo "<b>Order Status</b><br>";
					    echo $Orderrow["order_status"]; 
				  ?>
			    </div>
			  </div>
			  <hr>
			  <?php echo "<br><b>Order Details </b><br><br>";?>
			  <div class="row">
				<table class="table table-bordered">
				  <thead>
				    <tr>
					  <th>Order Details ID</th>
					  <th>Product ID</th>
					  <th>Product Quantity</th>
					  <th>Product Price</th>
					  <th>Total Price</th>
					</tr>
				  </thead>
				  <tbody>
					<?php if(mysqli_num_rows($OrderDetailsresult)>0){
						while($OrderDetailsrow = mysqli_fetch_assoc($OrderDetailsresult)){
					?>
						<tr>
						  <td><?php echo $OrderDetailsrow['order_details_id'];?></td>
						  <td><?php echo $OrderDetailsrow['product_id'];?></td>
						  <td><?php echo $OrderDetailsrow['product_quantity'];?></td>
						  <td><?php echo "RM ".$OrderDetailsrow['product_price'];?></td>
						  <td><?php echo "RM ".$OrderDetailsrow['sub_total'];?></td>
						</tr>
					<?php
						}
					}
				    ?>  
				    </tr>
				  </tbody>
				</table>
			  </div>
			  <br>
			  <div class="row">
			    <div class="col-md-4">
			      <?php echo "<b>Sub Total</b><br>";
					    echo "RM ".$Orderrow["total_price"]; 
				  ?>
			    </div>
			  </div>
			  <br>
			  <div class="row">
				<div class="col-md-4">
			      <?php echo "<b>Delivery Date</b><br>";
						echo $Orderrow["delivery_date"]; 
				  ?>
				</div>
			  </div>
			  <br>
			  <div class="row">
			    <div class="col-md-6">
				  <b>Notes</b><br>
					<textarea rows="6" style="width: 80%" readonly><?php echo $Orderrow["notes"]; ?></textarea>
				 
				</div>
			  </div>
			</div>
			<?php
		}
		?>
			
		  
        

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
if(isset($_GET['del'])){
	$orddetailsid = $_GET['orddetailsid'];
	$delete = mysqli_query($connect,"DELETE FROM order_details WHERE order_details_id='$orddetailsid'");
	if(isset($delete)){
		echo"<script>alert('The row already been deleted.');</script>";
	}
	echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";
}
include('includes/others_scripts.php');
include('includes/footer.php');
?>