<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to remove this delivery status?");
	return answer;
}
 
</script>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Delivery Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		 if(isset($_GET['view']))
		{
			$devid = $_GET["devid"];
			$Deliveryresult = mysqli_query($connect, "SELECT * FROM delivery WHERE delivery_id='$devid'");
			$Delievryrow = mysqli_fetch_assoc($Deliveryresult);
			echo "<b>Delivery ID</b><br>";
			echo $Delievryrow['delivery_id'];
			echo "<hr>";
			?>
			<div class="container">
			  <div class="row">
			    <div class="col-md-3">
			      <?php echo "<b>Employee ID</b><br>";
					    echo $Delievryrow["employee_id"]; 
				  ?>
			    </div>
				<div class="col-md-3">
			      <?php echo "<b>Order ID</b><br>";
						echo $Delievryrow["order_id"]; 
				  ?>
				</div>
			    <div class="col-md-3">
				  <?php echo "<b>Customer ID</b><br>";
					    echo $Delievryrow["customer_id"]; 
				  ?>
				</div>
				<div class="col-md-3">
				  <?php echo "<b>Customer Contact No</b><br>";
					    echo $Delievryrow["customer_contact_no"]; 
				  ?>
				</div>
			  </div>
			  <hr>
			  <?php
				echo "<br><br><b>Delivery Address</b><br>";
				echo $Delievryrow["delivery_address"];
				echo "<br><br><b>Delivery City</b><br>";
				echo $Delievryrow["delivery_city"];
				echo "<br><br><b>Delivery State</b><br>";
				echo $Delievryrow["delivery_state"];
				echo "<br><br><b>Delivery Postcode</b><br>";
				echo $Delievryrow["delivery_postcode"];
			  ?>
			  <br>
			  <br>
			  <br>
			  <div class="row">
				<div class="col-md-4">
			      <?php echo "<b>Delivery Date</b><br>";
						echo $Delievryrow["delivery_date"]; 
				  ?>
				</div>
			  </div>
			  <br>
			  <div class="row">
				<div class="col-md-4">
			      <?php echo "<b>Delivery TIme</b><br>";
						echo $Delievryrow["delivery_time"]; 
				  ?>
				</div>
			  </div>
			  <br>
			  <div class="row">
			    <div class="col-md-6">
				  <b>Remark</b><br>
					<textarea rows="6" style="width: 80%" readonly><?php echo $Delievryrow["remark"]; ?></textarea>
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