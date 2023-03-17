<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Profile Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		if(isset($_GET["edit"])){
		  $cusid = $_GET["cusid"];
 
		  $result = mysqli_query($connect, "select * from customer where customer_id = $cusid");
		  $row = mysqli_fetch_assoc($result);
		?>
		<h1>Edit User Profile</h1>
 
		<form method="post" action="">
			<p><label>Customer First Name:</label><br>
			<input type="text" name="cus_fname" size="20" value="<?php echo $row['customer_fname']; ?>" style="width:80%">
			<p><label>Customer Last Name:</label><br>
			<input type="text" name="cus_lname" size="50" value="<?php echo $row['customer_lname']; ?>" style="width:80%">
			<p><label>Customer Email:</label><br>
			<input type="email" name="cus_email" value="<?php echo $row['customer_email']; ?>" style="width:80%">
			<p><label>Customer Contact No:</label><br>
			<input type="text" name="cus_contact_no" value="<?php echo $row['customer_contact_no']; ?>" style="width:80%">
			<p><label>Customer Address:</label><br>
			<textarea type="text" name="cus_address" rows="4" style="width:80%"><?php echo $row['customer_address']; ?></textarea>
			<p><label>Customer City:</label><br>
			<input type="text" name="cus_city" value="<?php echo $row['customer_city']; ?>" style="width:80%">
			<p><label>Customer State:</label><br>
			<input type="text" name="cus_state" value="<?php echo $row['customer_state']; ?>" style="width:80%">
			<p><label>Customer Postcode:</label><br>
			<input type="text" name="cus_postcode" value="<?php echo $row['customer_postcode']; ?>" style="width:80%">
			<p><label>Customer Password:</label><br>
			<input type="password" name="cus_password" value="<?php echo $row['customer_password']; ?>" style="width:80%">
			<p><label>Customer Confirm Password</label><br>
			<input type="password" name="cus_con_password" value="<?php echo $row['customer_password']; ?>" style="width:80%">
			<p><label>Customer Status:</label><br>
			<select type="text" name="cus_status" style="width:80%">
			  <option value="ACTIVE" <?php if($row['customer_status']=="ACTIVE") echo "selected='selected'"; ?>>ACTIVE</option>
			  <option value="INACTIVE" <?php if($row['customer_status']=="INACTIVE") echo "selected='selected'"; ?>>INACTIVE</option>
			</select>
			<p><label>Customer Profile Image Link:</label><br>
			<input type="text" name="cus_img" value="<?php echo $row['customer_profile_image']; ?>" style="width:80%">
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
    $fname = $_POST['cus_fname'];
	$lname = $_POST['cus_lname'];
    $email = $_POST['cus_email'];
    $contact_no = $_POST['cus_contact_no'];
    $address = $_POST['cus_address'];
	$city = $_POST['cus_city'];
	$state = $_POST['cus_state']; 
	$postcode = $_POST['cus_postcode']; 
    $password = $_POST['cus_password'];
    $confirm_password = $_POST['cus_con_password'];
	$status = $_POST['cus_status'];
	$image = $_POST['cus_img'];

    if($password === $confirm_password)
    {
        $query = "UPDATE customer SET customer_fname='$fname',customer_lname='$lname',customer_email='$email',customer_contact_no='$contact_no',customer_address='$address', customer_city='$city', customer_state='$state', customer_postcode='$postcode', customer_password='$password',customer_profile_image='$image', customer_status='$status' WHERE customer_id='$cusid'";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Customer Profile Updated");
			  </script>
			  <?php
            echo "done";
            $_SESSION['success'] =  "Customer is Added Successfully";
			echo "<script type='text/javascript'> document.location = 'customer.php'; </script>";
        }
        else 
        {
			?>
			  <script type="text/javascript">
			  	alert("Customer Profile is Not Updated.");
			  </script>
			  <?php
            echo "not done";
            $_SESSION['status'] =  "Customer is Not Added";
			echo "<script type='text/javascript'> document.location = 'customer.php'; </script>";
        }
    }
    else 
    {
		?>
			  <script type="text/javascript">
			  	alert("Password and Confirm Password Does not Match");
			  </script>
			  <?php
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
		echo "<script type='text/javascript'> document.location = 'customer.php'; </script>";
    }

}

?>
