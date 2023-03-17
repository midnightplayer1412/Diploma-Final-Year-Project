  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <?php

include("../dataconnection.php");

if(isset($_POST['registerbtn']))
{
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];
	
	$check_email = "SELECT * FROM employee WHERE employee_email = '$email' ";
    $result_email = mysqli_query($connect,$check_email);
	if(mysqli_num_rows($result_email) !=0){
		?>
		<script type="text/javascript">
            alert("Email already taken. Please try again.");
        </script>
	    
	    <?php
	}else{
		if($password === $confirm_password)
		{
			$query = "INSERT INTO employee (employee_fname,employee_lname,employee_email,employee_contact_no,employee_address,employee_city,employee_state,employee_postcode,employee_password) VALUES ('$fname','$lname','$email','$contact_no','$address','$city','$state','$postcode','$password')";
			$query_run = mysqli_query($connect, $query);
		
			if($query_run)
			{
				?>
				  <script type="text/javascript">
					alert("Employee Added.");
				  </script>
				  <?php
				echo "done";
				$_SESSION['success'] =  "Employee is Added Successfully";
				echo "<script type='text/javascript'> document.location = 'employee.php'; </script>";
			}
			else 
			{
				?>
				  <script type="text/javascript">
					alert("Employee is Not Added.");
				  </script>
				  <?php
				echo "not done";
				$_SESSION['status'] =  "Employee is Not Added";
				echo "<script type='text/javascript'> document.location = 'employee.php'; </script>";
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
			echo "<script type='text/javascript'> document.location = 'employee.php'; </script>";
		}
	}
}

?>