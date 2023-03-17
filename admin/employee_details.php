<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Employee Profile Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		 if(isset($_GET['view']))
		{
			$empid = $_GET["empid"];
			$result = mysqli_query($connect, "SELECT * FROM employee WHERE employee_id =$empid");
			$row = mysqli_fetch_assoc($result);
		
		echo "<br><b>Employee ID</b><br>";
		echo $row["employee_id"];
		echo "<br><br><b>Employee First name</b><br>";
		echo $row["employee_fname"]; 
		echo "<br><br><b>Employee Last Name</b><br>";
		echo $row["employee_lname"]; 
		echo "<br><br><b>Employee Email</b><br>";
		echo $row["employee_email"]; 
		echo "<br><br><b>Employee Contact No</b><br>";
		echo $row["employee_contact_no"]; 
		echo "<br><br><b>Employee Address</b><br>";
		echo $row["employee_address"];
		echo "<br><br><b>Employee City</b><br>";
		echo $row["employee_city"];
		echo "<br><br><b>Employee State</b><br>";
		echo $row["employee_state"];
		echo "<br><br><b>Employee Postcode</b><br>";
		echo $row["employee_postcode"];
		echo "<br><br><b>Employee Salary (Per Month)</b><br>";
		echo "RM ".number_format($row["employee_salary"],2); 		
		echo "<br><br><b>Employee Position Title</b><br>";
		echo $row["employee_position_title"];
		echo "<br><br><b>Employee Status</b><br>";
		echo $row["employee_status"]; 
		 }
		?>
			
		  
        

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/employee_scripts.php');
include('includes/footer.php');
?>