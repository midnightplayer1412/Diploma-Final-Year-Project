<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

$result = mysqli_query($connect,"SELECT * FROM employee");
?>

<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to delete this employee?");
	return answer;
}
 
</script>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> First Name </label>
                <input type="text" name="fname" class="form-control" placeholder="Enter First Name" required>
            </div>
			<div class="form-group">
                <label> Last Name </label>
                <input type="text" name="lname" class="form-control" placeholder="Enter Last Name" required>
            </div>
            <div class="form-group">
                <label> Email </label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
            </div>
			<div class="form-group">
                <label> Contact No </label>
                <input type="text" name="contact_no" class="form-control" placeholder="Enter Contact No" required pattern="\+60[0-9]{2}-[0-9]{7,8}" title="Format for Contact Number : '+601x-xxxxxxxx'">
            </div>
            <div class="form-group">
                <label> Address </label>
                <input type="text" name="address" class="form-control" placeholder="Enter Address" required>
            </div>
			<div class="form-group">
                <label> City </label>
                <input type="text" name="city" class="form-control" placeholder="Enter City" required>
            </div>
			<div class="form-group">
                <label> State </label>
                <input type="text" name="state" class="form-control" placeholder="Enter State" required>
            </div>
			<div class="form-group">
                <label> Postcode </label>
                <input type="text" name="postcode" class="form-control" placeholder="Enter Postcode" required pattern="[0-9]{5}" title="Format for Postcode : '00000'">
            </div>
			<div class="form-group">
                <label> Password </label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
                <label> Confirm Password </label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" required>
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
    <h6 class="m-0 font-weight-bold text-primary">Employee Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Employee Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Last Name </th>
            <th>Email </th>
            <th>Contact no </th>
            <th>Position </th>
			<th>More Details </th>
            <th>EDIT </th>
            <!--<th>DELETE </th>-->
          </tr>
        </thead>
        <tbody>
		
		  <?php
		    if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
				  ?>
				  <tr>
					<td><?php echo $row['employee_id'];?></td>
					<td><?php echo $row['employee_lname'];?></td>
					<td><?php echo $row['employee_email'];?></td>
					<td><?php echo $row['employee_contact_no'];?></td>
					<td><?php echo $row['employee_position_title'];?></td>
					<td>
					  <form action="employee_details.php?view&empid=<?php echo $row['employee_id']; ?>" method="post">
						<input type="hidden" name="details_id" value="">
						<button type="submit" name="details_btn" class="btn btn-success"> More Details</button>
					  </form>
					</td>
					<td>
					  <form action="employee_edit.php?edit&empid=<?php echo $row['employee_id']; ?>" method="post">
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
include('includes/employee_scripts.php');
include('includes/footer.php');
?>

<?php

if (isset($_REQUEST["del"])) 
{
	$empid = $_REQUEST["empid"]; 
	mysqli_query($connect, "delete from employee where employee_id = $empid");
	
	echo "<script type='text/javascript'> document.location = 'employee.php'; </script>";
}

?>