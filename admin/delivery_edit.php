<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

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
		if(isset($_GET["edit"])){
		  $devid = $_GET["devid"];
 
		  $result = mysqli_query($connect, "SELECT * FROM delivery WHERE delivery_id = $devid");
		  $row = mysqli_fetch_assoc($result);
		  $devID = $row['employee_id'];
		  $empresult = mysqli_query($connect, "SELECT * FROM employee WHERE employee_position_title = 'DELIVERY MAN'");
		  
		?>
		<h1>Edit Delivery Data</h1>
 
		<form method="post" action="">
			<p><label>Delivery ID:</label><br>
			<input type="text" name="dev_id" size="50" value="<?php echo $row['delivery_id']; ?>" style="width:80%" readonly>
			<p><label>Employee ID:</label><br>
			<select type="text" name="emp_id" style="width:80%">
			<?php if(mysqli_num_rows($empresult)>0){
				while($emprows = mysqli_fetch_assoc($empresult)){
					echo "<option value='".$emprows['employee_id']."'";
					if($devID == $emprows['employee_id']){
						echo "selected";
					}
					echo">".$emprows['employee_id']." - ".$emprows['employee_lname']." - ".$emprows['employee_city']." ".$emprows['employee_state']."</option>";					
				}
			}
			?>  
			</select>
			<p><label>Order ID:</label><br>
			<input type="text" name="ord_id" size="50" required value="<?php echo $row['order_id']; ?>" style="width:80%">
			<p><label>Customer ID:</label><br>
			<input type="text" name="cus_id" required value="<?php echo $row['customer_id']; ?>" style="width:80%">
			<p><label>Delivery Address:</label><br>
			<input type="text" name="delivery_address" required value="<?php echo $row['delivery_address']; ?>" style="width:80%">
			<p><label>Delivery City:</label><br>
			<input type="text" name="delivery_city" required value="<?php echo $row['delivery_city']; ?>" style="width:80%">
			<p><label>Delivery State:</label><br>
			<input type="text" name="delivery_state" required value="<?php echo $row['delivery_state']; ?>" style="width:80%">
			<p><label>Delivery Postcode:</label><br>
			<input type="text" name="delivery_postcode" required value="<?php echo $row['delivery_postcode']; ?>" style="width:80%">
			<p><label>Customer Contact No:</label><br>
			<input type="text" name="customer_contact_no" required value="<?php echo $row['customer_contact_no']; ?>" style="width:80%">
			<p><label>Delivery Date:</label><br>
			<input type="date" name="delivery_date" value="<?php echo $row['delivery_date']; ?>" style="width:80%">	
			<p><label>Delivery TIme:</label><br>
			<input type="time" name="delivery_time" size="50" value="<?php echo $row['delivery_time']; ?>" style="width:80%">
			<p><label>Remark:</label><br>
			<textarea type="text" name="remark" rows="4" style="width:80%"><?php echo $row['remark']; ?></textarea>
			<p><button type="submit" name="savebtn" class="btn btn-primary">Save</button>
		</form>
	    <?php 
		}
		  ?>
			
		  
        

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/others_scripts.php');
include('includes/footer.php');

if(isset($_POST['savebtn']))
{
	$dev_id = $_POST['dev_id'];
	$ord_id = $_POST['ord_id'];
	$emp_id = $_POST['emp_id'];
    $cus_id = $_POST['cus_id'];
    $delivery_address = $_POST['delivery_address'];
	$delivery_city = $_POST['delivery_city'];
	$delivery_state = $_POST['delivery_state'];
	$delivery_postcode = $_POST['delivery_postcode'];
	$customer_contact_no = $_POST['customer_contact_no'];
	$delivery_date = $_POST['delivery_date'];
	$delivery_time = $_POST['delivery_time'];
	$remark 	 = $_POST['remark'];

        $query = "UPDATE delivery SET order_id='$ord_id',employee_id='$emp_id',customer_id='$cus_id',delivery_address='$delivery_address',delivery_city='$delivery_city',delivery_state='$delivery_state',delivery_postcode='$delivery_postcode',customer_contact_no='$customer_contact_no',delivery_date='$delivery_date',delivery_time='$delivery_time' WHERE delivery_id='$dev_id'";
        $query_run = mysqli_query($connect, $query);
		if($emp_id!=1 && $delivery_date!=NULL){
			$updateOrder = mysqli_query($connect,"UPDATE orders SET delivery_date='$delivery_date', order_status='DELIVERING' WHERE order_id='$ord_id'");
			echo "<script type='text/javascript'>
			  	alert('Order Status Updated');
			  </script>";
		}
		
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Delivery Data Updated");
			  </script>
			  <?php
            echo "done";
            $_SESSION['success'] =  "Order is Added Successfully";
			echo "<script type='text/javascript'> document.location = 'delivery.php'; </script>";
        }
        else 
        {
			?>
			  <script type="text/javascript">
			  	alert("Delivery Data is Not Updated.");
			  </script>
			  <?php
            echo "not done";
            $_SESSION['status'] =  "Order is Not Added";
			echo "<script type='text/javascript'> document.location = 'delivery.php'; </script>";
        }
    

}

?>
