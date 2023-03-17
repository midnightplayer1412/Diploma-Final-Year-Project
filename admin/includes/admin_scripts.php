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
//$connection = mysqli_connect("localhost","root","","sweet_bakery_shop");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmpassword'];
	
	$check_email = "SELECT * FROM admin WHERE admin_email = '$email'";
    $result_email = mysqli_query($connect,$check_email);
	
	if(mysqli_num_rows($result_email) !=0)
	{
		?>
		<script type="text/javascript">
            alert("Email already taken.");
        </script>
	    
	    <?php
	}
    else{
		if($password === $confirm_password)
		{
			$query = "INSERT INTO admin (admin_username,admin_email,admin_password) VALUES ('$username','$email','$password')";
			$query_run = mysqli_query($connect, $query);
		
			if($query_run)
			{
				?>
				  <script type="text/javascript">
					alert("Admin Added. Welcome");
				  </script>
				  <?php
				echo "done";
				$_SESSION['success'] =  "Admin is Added Successfully";
				echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
			}
			else 
			{
				?>
				  <script type="text/javascript">
					alert("Admin is Not Added.");
				  </script>
				  <?php
				echo "not done";
				$_SESSION['status'] =  "Admin is Not Added";
				echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
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
			echo "<script type='text/javascript'> document.location = 'admin.php'; </script>";
		}
	}

    

}


?>