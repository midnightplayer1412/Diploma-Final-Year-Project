<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		if(isset($_GET["edit"])){
		  $admid = $_GET["admid"];
 
		  $result = mysqli_query($connect, "select * from admin where admin_id = $admid");
		  $row = mysqli_fetch_assoc($result);
		?>
		<h1>Edit Admin Profile</h1>
 
		<form method="post" action="">
			<p><label>Admin Username:</label><br>
			<input type="text" name="adm_username" size="20" value="<?php echo $row['admin_username']; ?>" style="width:80%">
			<p><label>Admin Email:</label><br>
			<input type="email" name="adm_email" value="<?php echo $row['admin_email']; ?>" style="width:80%">
			<p><label>Admin Password:</label><br>
			<input type="password" name="adm_password" value="<?php echo $row['admin_password']; ?>" style="width:80%">
			<p><label>Admin Confirm Password</label><br>
			<input type="password" name="adm_con_password" value="<?php echo $row['admin_password']; ?>" style="width:80%">
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
    $username = $_POST['adm_username'];
	$name = $_POST['adm_name'];
    $email = $_POST['adm_email'];
    $password = $_POST['adm_password'];
    $confirm_password = $_POST['adm_con_password'];

    if($password === $confirm_password)
    {
        $query = "UPDATE admin SET admin_username='$username',admin_email='$email',admin_password='$password' WHERE admin_id='$admid'";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Admin Profile Updated");
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
			  	alert("Admin Profile is Not Updated.");
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

?>
