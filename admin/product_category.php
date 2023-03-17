<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

$result = mysqli_query($connect,"SELECT * FROM product_category");
?>

<script type="text/javascript">
 
function confirmation()
{
	answer = confirm("Do you want to delete this product?");
	return answer;
}
 
</script>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product Category Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Product Category Name </label>
                <input type="text" name="prod_cat_name" class="form-control" placeholder="Enter Category Name" title="Enter Category Name" required>
				<label> Product Category Image </label>
                <input type="file" name="prod_cat_img" class="form-control" title="The image need to store under category folder" accept=".png, .jpg, .jpeg"  required>
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
    <h6 class="m-0 font-weight-bold text-primary">Product Category Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New Category
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Category Name </th>
			<th>Category Image </th>
            <th>Category Status </th>
            <th>EDIT </th>
          </tr>
        </thead>
        <tbody>
		  <?php
		    if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
				  ?>
				  <tr>
					<td><?php echo $row['product_category_id'];?></td>
					<td><?php echo $row['product_category_name'];?></td>
					<td><?php echo $row['product_category_image'];?></td>
					<td><?php echo $row['product_category_status'];?></td>
					<td>
					  <form action="product_category_edit.php?edit&prod_catid=<?php echo $row['product_category_id']; ?>" method="post">
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
include('includes/product_category_scripts.php');
include('includes/footer.php');
?>
