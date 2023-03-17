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
		 if(isset($_GET['view']))
		{
			$cusid = $_GET["cusid"];
			$result = mysqli_query($connect, "SELECT * FROM customer WHERE customer_id =$cusid");
			$row = mysqli_fetch_assoc($result);
		
		echo "<br><b>Customer ID</b><br>";
		echo $row["customer_id"];
		echo "<br><br><b>Customer First Name</b><br>";
		echo $row["customer_fname"]; 
		echo "<br><br><b>Customer Last Name</b><br>";
		echo $row["customer_lname"]; 
		echo "<br><br><b>Customer Email</b><br>";
		echo $row["customer_email"]; 
		echo "<br><br><b>Customer Contact No</b><br>";
		echo $row["customer_contact_no"]; 
		echo "<br><br><b>Customer Address</b><br>";
		echo $row["customer_address"];
		echo "<br><br><b>Customer City</b><br>";
		echo $row["customer_city"];
		echo "<br><br><b>Customer State</b><br>";
		echo $row["customer_state"];
		echo "<br><br><b>Customer Postcode</b><br>";
		echo $row["customer_postcode"];
		echo "<br><br><b>Customer Status</b><br>";
		echo $row["customer_status"]; 
		echo "<br><br><b>Customer Profile Image Link</b><br>";
		echo $row["customer_profile_image"]; 
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