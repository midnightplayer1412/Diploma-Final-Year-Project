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
		if(isset($_GET["edit"])){
		  $empid = $_GET["empid"];
 
		  $result = mysqli_query($connect, "select * from employee where employee_id = $empid");
		  $row = mysqli_fetch_assoc($result);
		  $empPosition = $row['employee_position_title'];
		  $empStatus = $row['employee_status'];
		?>
		<h1>Edit Employee Profile</h1>
 
		<form method="post" action="">
			<p><label>Employee First Name:</label><br>
			<input type="text" name="emp_fname" size="20" value="<?php echo $row['employee_fname']; ?>" style="width:80%" required>
			<p><label>Employee Last Name:</label><br>
			<input type="text" name="emp_lname" size="50" value="<?php echo $row['employee_lname']; ?>" style="width:80%" required>
			<p><label>Employee Email:</label><br>
			<input type="email" name="emp_email" value="<?php echo $row['employee_email']; ?>" style="width:80%" required>
			<p><label>Employee Contact No:</label><br>
			<input type="text" name="emp_contact_no" value="<?php echo $row['employee_contact_no']; ?>" style="width:80%" required pattern="\+60[0-9]{2}-[0-9]{7,8}" title="Format for Contact Number : '+601x-xxxxxxxx'">
			<p><label>Employee Address:</label><br>
			<textarea type="text" name="emp_address" rows="4" style="width:80%" required><?php echo $row['employee_address']; ?></textarea>
			<p><label>Employee City:</label><br>
			<input type="text" name="emp_city" value="<?php echo $row['employee_city']; ?>" style="width:80%" required> 
			<p><label>Employee State:</label><br>
			<input type="text" name="emp_state" value="<?php echo $row['employee_state']; ?>" style="width:80%" required>
			<p><label>Employee Postcode:</label><br>
			<input type="text" name="emp_postcode" value="<?php echo $row['employee_postcode']; ?>" style="width:80%" required pattern="[0-9]{5}" title="Format for Postcode : '00000'">
			<p><label>Employee Salary (RM):</label><br>
			<input type="text" name="emp_salary" value="<?php echo $row['employee_salary']; ?>" style="width:80%" required>
			<p><label>Employee Position:</label><br>
			<select type="text" name="emp_position" style="width:80%">
			  <option value="STAFF" <?php if($empPosition=="STAFF") echo "selected='selected'"; ?>>STAFF</option>
			  <option value="DELIVERY MAN" <?php if($empPosition=="DELIVERY MAN") echo "selected='selected'"; ?>>DELIVERY MAN</option>
			  <option value="MANAGER" <?php if($empPosition=="MANAGER") echo "selected='selected'"; ?>>MANAGER</option>
			</select>
			<p><label>Employee Password:</label><br>
			<input type="password" name="emp_password" value="<?php echo $row['employee_password']; ?>" style="width:80%" required>
			<p><label>Employee Confirm Password</label><br>
			<input type="password" name="emp_con_password" value="<?php echo $row['employee_password']; ?>" style="width:80%" required>
			<p><label>Employee Status:</label><br>
			<select type="text" name="emp_status" style="width:80%">
			  <option value="ACTIVE" <?php if($empStatus=="ACTIVE") echo "selected='selected'"; ?>>ACTIVE</option>
			  <option value="INACTIVE" <?php if($empStatus=="INACTIVE") echo "selected='selected'"; ?>>INACTIVE</option>
			</select>
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
include('includes/employee_scripts.php');
include('includes/footer.php');
?>

<?php
if(isset($_POST['savebtn']))
{
    $fname = $_POST['emp_fname'];
	$lname = $_POST['emp_lname'];
    $email = $_POST['emp_email'];
    $contact_no = $_POST['emp_contact_no'];
    $address = $_POST['emp_address'];
	$city = $_POST['emp_city'];
	$state = $_POST['emp_state']; 
	$postcode = $_POST['emp_postcode']; 
	$salary = $_POST['emp_salary'];
    $position = $_POST['emp_position'];
    $password = $_POST['emp_password'];
    $confirm_password = $_POST['emp_con_password'];
	$status = $_POST['emp_status'];

    if($password === $confirm_password)
    {
        $query = "UPDATE employee SET employee_fname='$fname',employee_lname='$lname',employee_email='$email',employee_contact_no='$contact_no',employee_address='$address',employee_city='$city',employee_state='$state',employee_postcode='$postcode',employee_salary='$salary',employee_position_title='$position',employee_password='$password',employee_status='$status' WHERE employee_id='$empid'";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Employee Profile Updated");
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
			  	alert("Employee Profile is Not Updated.");
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

?>
