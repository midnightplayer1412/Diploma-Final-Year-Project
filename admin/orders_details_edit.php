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
		  $orddetailsid = $_GET["orddetailsid"];
		  $result = mysqli_query($connect, "SELECT * FROM order_details WHERE order_details_id ='$orddetailsid'");
		  $row = mysqli_fetch_assoc($result);
		  $orderID = $row['order_id'];
		  
		?>
		<h1>Edit Orders Details Data</h1>
 
		<form method="post" action="">
			<input type="hidden" name="orderID" value="<?php echo $orderID; ?>">
			<p><label>Order Details ID:</label><br>
			<input type="text" name="ordetails_id" size="50" value="<?php echo $row['order_details_id']; ?>" readonly style="width:80%">
			<p><label>Product ID:</label><br>
			<input type="text" name="prod_id" size="50" value="<?php echo $row['product_id']; ?>" style="width:80%"><!-- product = 16-->
			<input type="hidden" name="h_prod_id" size="50" value="<?php echo $row['product_id']; ?>" style="width:80%"><!-- product = 10-->
			<p><label>Product Price ( RM ):</label><br>
			<input type="text" name="prod_price" size="50" pattern="\d{1,3}.\d{2}" title="The Price Format : 'xxx.xx'" value="<?php echo $row['product_price']; ?>" style="width:80%">
			<input type="hidden" name="h_prod_price" size="50" value="<?php echo $row['product_price']; ?>" style="width:80%">
			<p><label>Product Quantity:</label><br>
			<input type="number" name="prod_qty" min='1' max='50' value="<?php echo $row['product_quantity']; ?>" style="width:80%">
			<input type="hidden" name="h_prod_qty" value="<?php echo $row['product_quantity']; ?>" style="width:80%">
			<p><label>Sub Total ( RM ):</label><br>
			<input type="text" name="sub_total" value="<?php echo $row['sub_total']; ?>" style="width:80%" pattern="\d{1,3}.\d{2}" title="The Price Format : 'xxx.xx'">
			<input type="hidden" name="h_sub_total" value="<?php echo $row['sub_total']; ?>" style="width:80%">

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
?>

<?php
if(isset($_POST['savebtn']))
{
	$orderID = $_POST['orderID'];
	$ordetails_id = $_POST['ordetails_id'];
	if($_POST['prod_id']!=$_POST['h_prod_id']){
	  $productRow = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM product WHERE product_id='".$_POST['prod_id']."'"));
	  $price = $productRow['product_price'];
	  $_POST['sub_total'] = $price * $_POST['prod_qty'];
	  $query1 = "UPDATE order_details SET product_id='".$_POST['prod_id']."', product_quantity='".$_POST['prod_qty']."', product_price='$price', sub_total='".$_POST['sub_total']."' WHERE order_details_id='$ordetails_id'";
      $query_run = mysqli_query($connect, $query1);
	}
	if($_POST['prod_price']!=$_POST['h_prod_price']){
	  $_POST['sub_total'] = $_POST['prod_price'] * $_POST['prod_qty'];
	  $query2 = "UPDATE order_details SET product_id='".$_POST['prod_id']."', product_quantity='".$_POST['prod_qty']."', product_price='".$_POST['prod_price']."', sub_total='".$_POST['sub_total']."' WHERE order_details_id='$ordetails_id'";
      $query_run = mysqli_query($connect, $query2);
	}
	if($_POST['prod_qty']!=$_POST['h_prod_qty']){
	  $_POST['sub_total'] = $_POST['prod_price'] * $_POST['prod_qty'];
	  $query3 = "UPDATE order_details SET product_id='".$_POST['prod_id']."', product_quantity='".$_POST['prod_qty']."', product_price='".$_POST['prod_price']."', sub_total='".$_POST['sub_total']."' WHERE order_details_id='$ordetails_id'";
      $query_run = mysqli_query($connect, $query3);
	}
	if($_POST['sub_total']!=$_POST['h_sub_total']){
	  $query4 = "UPDATE order_details SET product_id='".$_POST['prod_id']."', product_quantity='".$_POST['prod_qty']."', product_price='".$_POST['prod_price']."', sub_total='".$_POST['sub_total']."' WHERE order_details_id='$ordetails_id'";
      $query_run = mysqli_query($connect, $query4);
	}
      if(isset($query_run))
      {
		?>
		  <script type="text/javascript">
		  	alert("Order Details Data Updated");
		  </script>
		  <?php
        echo "done";
		echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";
      }
      else 
      {
		?>
		  <script type="text/javascript">
		  	alert("Order Details Data is Not Updated.");
		  </script>
		  <?php
        echo "not done";
		echo "<script type='text/javascript'> document.location = 'orders.php'; </script>";
      }
    

}

?>
