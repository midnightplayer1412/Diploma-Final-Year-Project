<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Payment Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		if(isset($_GET["edit"])){
		  $payid = $_GET["payid"];
 
		  $result = mysqli_query($connect, "SELECT * FROM payment WHERE payment_id = $payid");
		  $row = mysqli_fetch_assoc($result);
		  $payMethod = $row['payment_method'];
		  
		?>
		<h1>Edit Payment Data</h1>
 
		<form method="post" action="">
			<p><label>Payment ID:</label><br>
			<input type="text" name="pay_id" size="50" value="<?php echo $row['payment_id']; ?>" style="width:80%" readonly>
			<p><label>Order ID:</label><br>
			<input type="text" name="ord_id" size="50" value="<?php echo $row['order_id']; ?>" style="width:80%">
			<p><label>Customer ID:</label><br>
			<input type="text" name="cus_id" size="50" value="<?php echo $row['customer_id']; ?>" style="width:80%">
			<p><label>Total Amount ( RM ):</label><br>
			<input type="text" name="total_amount" pattern="\d{1,3}.\d{2}" title="The Price Format : 'xxx.xx'" value="<?php echo $row['total_amount']; ?>" style="width:80%">
			<p><label>Payment Method:</label><br>
			<select type="text" name="payment_method" style="width:80%">
			  <option value="ONLINE BANKING" <?php if($payMethod=="ONLINE BANKING") echo "selected='selected'"; ?>>ONLINE BANKING</option>
			  <option value="CREDIT DEBIT CARD" <?php if($payMethod=="CREDIT DEBIT CARD") echo "selected='selected'"; ?>>CREDIT DEBIT CARD</option>
			</select>
			<p><label>Payment Date:</label><br>
			<input type="datetime" name="pay_date" size="50" value="<?php echo $row['payment_date']; ?>" style="width:80%">
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
	$pid = $_POST['pay_id'];
	$oid = $_POST['ord_id'];
    $cid = $_POST['cus_id'];
    $total_amount = $_POST['total_amount'];
	$payment_method = $_POST['payment_method'];
	$pay_date = $_POST['pay_date'];

        $query = "UPDATE payment SET total_amount='$total_amount',payment_method='$payment_method',payment_date='$pay_date', order_id='$oid', customer_id='$cid' WHERE payment_id='$pid'";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Payment Data Updated");
			  </script>
			  <?php
            echo "done";
            $_SESSION['success'] =  "Order is Added Successfully";
			echo "<script type='text/javascript'> document.location = 'payment.php'; </script>";
        }
        else 
        {
			?>
			  <script type="text/javascript">
			  	alert("Payment Data is Not Updated.");
			  </script>
			  <?php
            echo "not done";
            $_SESSION['status'] =  "Order is Not Added";
			echo "<script type='text/javascript'> document.location = 'payment.php'; </script>";
        }
    

}

?>
