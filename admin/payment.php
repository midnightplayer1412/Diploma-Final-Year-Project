<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

$result = mysqli_query($connect,"SELECT * FROM payment ORDER BY payment_date ASC");
?>

<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to remove this payment?");
	return answer;
}
 
</script>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Product Name </label>
                <input type="text" name="prod_name" class="form-control" placeholder="Enter Product Name">
            </div>
			<div class="form-group">
                <label> Product Description </label>
                <textarea type="text" name="prod_desc" class="form-control" placeholder="Enter Product Description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label> Product Price </label>
                <input type="text" name="prod_price" class="form-control" placeholder="Enter Product Price">
            </div>
			<div class="form-group">
                <label> Product Category ID </label>
                <input type="text" name="prod_catID" class="form-control" placeholder="Enter Category ID">
            </div>
            <div class="form-group">
                <label> Product Status </label>
                <input type="text" name="prod_stat" class="form-control" placeholder="Enter Product Status" value="AVAILABLE">
            </div>
			<div class="form-group">
                <label> Product Image<br>( Please add the image to product folder under assets/img )</label>
                <input type="file" name="prod_img" class="form-control">
            </div>
            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Payment Details 
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Payment ID </th>
            <th>Order ID </th>
            <th>Customer ID </th>
			<th>Total Amount</th>
            <th>Payment Method</th>
            <th>Payment Date</th>
          </tr>
        </thead>
        <tbody>
		  <?php
		    if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
				  ?>
				  <tr>
					<td><?php echo $row['payment_id'];?></td>
					<td><?php echo $row['order_id'];?></td>
					<td><?php echo $row['customer_id'];?></td>
					<td><?php echo "RM ".$row['total_amount'];?></td>
					<td><?php echo $row['payment_method'];?></td>
					<td><?php echo $row['payment_date'];?></td>
					
				  </tr>
			<?php	  
				}
			}
		  ?>
		  
        </tbody>
      </table>

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

if (isset($_GET["del"])) 
{
	$payid = $_GET["payid"]; 
	$deletePayment = "DELETE FROM payment WHERE payment_id ='$payid'";
	mysqli_query($connect,$deletePayment);
	
	echo "<script type='text/javascript'> document.location = 'payment.php'; </script>";
}

?>