<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

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
		if(isset($_GET["edit"])){
		  $ordid = $_GET["ordid"];
 
		  $result = mysqli_query($connect, "select * from orders where order_id = $ordid");
		  $row = mysqli_fetch_assoc($result);
		  
		?>
		<h1>Edit Orders Data</h1>
 
		<form method="post" action="">
			<p><label>Order ID:</label><br>
			<input type="text" name="ord_id" size="50" value="<?php echo $row['order_id']; ?>" readonly style="width:80%">
			<p><label>Customer ID:</label><br>
			<input type="text" name="cus_id" size="50" value="<?php echo $row['customer_id']; ?>" readonly style="width:80%">
			<p><label>Order Date:</label><br>
			<input type="date" name="ord_date" size="50" value="<?php echo $row['order_date']; ?>" readonly style="width:80%">
			<p><label>Order Total Product:</label><br>
			<input type="number" name="ord_total_product" min="1" value="<?php echo $row['order_total']; ?>" style="width:80%" required>
			<p><label>Order Total Price ( RM ):</label><br>
			<input type="text" name="ord_total_price" pattern="\d{1,3}.\d{2}" title="The Price Format : 'xxx.xx'" value="<?php echo $row['total_price']; ?>" style="width:80%" required>
			<p><label>Order Status:</label><br>
			<select type="text" name="ord_status" style="width:80%">
			  <option value="PENDING" <?php if($row['order_status']=="PENDING") echo "selected='selected'"; ?>>PENDING</option>
			  <option value="PAYMENT SUCCESSFUL" <?php if($row['order_status']=="PAYMENT SUCCESSFUL") echo "selected='selected'"; ?>>PAYMENT SUCCESSFUL</option>
			  <option value="IN PROGRESS" <?php if($row['order_status']=="IN PROGRESS") echo "selected='selected'"; ?>>IN PROGRESS</option>
			  <option value="COMPLETED" <?php if($row['order_status']=="COMPLETED") echo "selected='selected'"; ?>>COMPLETED</option>
			  <option value="DELIVERING" <?php if($row['order_status']=="DELIVERING") echo "selected='selected'"; ?>>DELIVERING</option>
			  <option value="DELIVERED" <?php if($row['order_status']=="DELIVERED") echo "selected='selected'"; ?>>DELIVERED</option>
			</select>
			<p><label>Delivery Date:</label><br>
			<input type="date" name="deli_date" size="50" value="" style="width:80%">
			<p><label>Notes:</label><br>
			<textarea type="text" name="notes" rows="4" style="width:80%"><?php echo $row['notes']; ?></textarea>
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
	$oid = $_POST['ord_id'];
    $cid = $_POST['cus_id'];
    $date = $_POST['ord_date'];
    $total_product = $_POST['ord_total_product'];
	$total_price = $_POST['ord_total_price'];
	$status = $_POST['ord_status'];
	$delivery = $_POST['deli_date'];
	$notes = $_POST['notes'];

        $query = "UPDATE orders SET order_total='$total_product',total_price='$total_price',order_status='$status', delivery_date='$delivery',notes='$notes' WHERE order_id='$oid'";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Order Data Updated");
			  </script>
			  <?php
            echo "done";
            $_SESSION['success'] =  "Order is Added Successfully";
			echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";
        }
        else 
        {
			?>
			  <script type="text/javascript">
			  	alert("Order Data is Not Updated.");
			  </script>
			  <?php
            echo "not done";
            $_SESSION['status'] =  "Order is Not Added";
			echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";
        }
    

}

?>
