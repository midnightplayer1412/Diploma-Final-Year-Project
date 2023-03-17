<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

$result = mysqli_query($connect,"SELECT * FROM customer");
?>

<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to delete this user? This will delete all the order and payment history.");
	return answer;
}
 
</script>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
			<div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
			<div class="form-group">
                <label> Contact No </label>
                <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact No">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address">
            </div>
			<div class="form-group">
                <label> Password </label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
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
    <h6 class="m-0 font-weight-bold text-primary">User Profile 
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>First Name </th>
            <th>Last Name </th>
            <th>Email </th>
            <th>Contact no</th>
			<th>More Details</th>
            <th>EDIT </th>
          </tr>
        </thead>
        <tbody>
		
		  <?php
		    if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
				  ?>
				  <tr>
					<td><?php echo $row['customer_id'];?></td>
					<td><?php echo $row['customer_fname'];?></td>
					<td><?php echo $row['customer_lname'];?></td>
					<td><?php echo $row['customer_email'];?></td>
					<td><?php echo $row['customer_contact_no'];?></td>
					<td>
					  <form action="customer_details.php?view&cusid=<?php echo $row['customer_id']; ?>" method="post">
						<input type="hidden" name="details_id" value="">
						<button type="submit" name="details_btn" class="btn btn-success"> More Details</button>
					  </form>
					</td>
					<td>
					  <form action="customer_edit.php?edit&cusid=<?php echo $row['customer_id']; ?>" method="post">
						<input type="hidden" name="edit_id" value="">
						<button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
					  </form>
					</td>
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
	$cusid = $_GET["cusid"];
	$deleteDelivery = mysqli_query($connect,"DELETE FROM delivery WHERE customer_id='$cusid'");
	$deletePayment = mysqli_query($connect,"DELETE FROM payment WHERE customer_id='$cusid'");
	$getOrderID = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM orders WHERE customer_id='$cusid'"));
	$deleteOrderDetails = mysqli_query($connect,"DELETE FROM order_details WHERE order_id='".$getOrderID['order_id']."'");
	$deleteOrders = mysqli_query($connect,"DELETE FROM orders WHERE customer_id='$cusid'");
	$deleteCustomer = mysqli_query($connect,"DELETE FROM customer WHERE customer_id='$cusid'");
	$checkUser = mysqli_query($connect,"SELECT * FROM customer WHERE customer_id='$cusid'");
	if(mysqli_num_rows($checkUser)==0){
		echo "<script type='text/javascript'>alert('The User Already Been Deleted.')</script>";
	}else{
		echo "<script type='text/javascript'>alert('The User Is Not Deleted.')</script>";
	}

	
	
	echo "<script type='text/javascript'> document.location = 'customer.php'; </script>";
}

?>