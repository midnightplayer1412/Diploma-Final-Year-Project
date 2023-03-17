<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

$result = mysqli_query($connect,"SELECT * FROM delivery ORDER BY delivery_date ASC");
?>

<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to delete this delivery status?");
	return answer;
}
 
</script>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Delivery Details 
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Delivery ID </th>
            <th>Employee ID </th>
            <th>Order ID </th>
			<th>Customer ID</th>
            <th>Delivery Date</th>
            <th>Delivery Time</th>
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
					<td><?php echo $row['delivery_id'];?></td>
					<td><?php echo $row['employee_id'];?></td>
					<td><?php echo $row['order_id'];?></td>
					<td><?php echo $row['customer_id'];?></td>
					<td><?php echo $row['delivery_date'];?></td>
					<td><?php echo $row['delivery_time'];?></td>
					<td>
					  <form action="delivery_details.php?view&devid=<?php echo $row['delivery_id']; ?>" method="post">
						<input type="hidden" name="details_id" value="">
						<button type="submit" name="details_btn" class="btn btn-success"> More Details</button>
					  </form>
					</td>
					<td>
					  <form action="delivery_edit.php?edit&devid=<?php echo $row['delivery_id']; ?>" method="post">
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
	$devid = $_GET["devid"]; 
	$deleteDelivery = "DELETE FROM delivery WHERE delivery_id ='$devid'";
	mysqli_query($connect,$deleteDelivery);
	
	echo "<script type='text/javascript'> document.location = 'delivery.php'; </script>";
}

?>