<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

$result = mysqli_query($connect,"SELECT * FROM product ORDER BY product_category_id, product_name ASC");
$getCategory = mysqli_query($connect,"SELECT * FROM product_category");

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
        <h5 class="modal-title" id="exampleModalLabel">Add Product Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Product Name </label>
                <input type="text" name="prod_name" class="form-control" placeholder="Enter Product Name">
            </div>
			<div class="form-group">
                <label> Product Description </label>
                <textarea type="text" name="prod_desc" class="form-control" placeholder="Enter Product Description" rows="4"></textarea>
            </div>
            <div class="form-group">
                <label> Product Price </label>
                <input type="text" name="prod_price" class="form-control" pattern="\d{1,3}.\d{2}" title="The Price Format : 'xxx.xx'" placeholder="Enter Product Price">
            </div>
			<div class="form-group">
                <label> Product Category ID </label>
				<select type="text" name="prod_catID" class="form-control">
				  <option value="" disabled selected>Select your option</option>
				  <?php 
					if(mysqli_num_rows($getCategory)>0){
					  while($categoryRows=mysqli_fetch_assoc($getCategory)){
						  echo "<option value='".$categoryRows['product_category_id']."'>".$categoryRows['product_category_id']." - ".$categoryRows['product_category_name']."</option>";
					  }
					}
				 ?>  
				</select>
            </div>
			<div class="form-group">
                <label> Product Image<br>( Please add the image to product folder under assets/img )</label>
                <input type="file" name="prod_img" class="form-control">
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
    <h6 class="m-0 font-weight-bold text-primary">Product Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add New Product
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>ID </th>
            <th>Name </th>
            <th>Description </th>
            <th>Price</th>
            <th>Category ID</th>
            <th>Status</th>
            <th>Image Link</th>
            <th>EDIT </th>
          </tr>
        </thead>
        <tbody>
		  <?php
		    if(mysqli_num_rows($result)>0){
				while($row = mysqli_fetch_assoc($result)){
					$getCategoryName = mysqli_fetch_row(mysqli_query($connect, "SELECT product_category_name FROM product_category WHERE product_category_id='".$row['product_category_id']."'"));
				  ?>
				  <tr>
					<td><?php echo $row['product_id'];?></td>
					<td><?php echo $row['product_name'];?></td>
					<td><?php echo $row['product_description'];?></td>
					<td><?php echo $row['product_price'];?></td>
					<td><?php echo $row['product_category_id']." - ".$getCategoryName[0];?></td>
					<td><?php echo $row['product_status'];?></td>
					<td><?php echo $row['product_image'];?></td>
					<td>
					  <form action="product_edit.php?edit&prodid=<?php echo $row['product_id']; ?>" method="post">
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
include('includes/product_scripts.php');
include('includes/footer.php');
?>

<?php

if (isset($_REQUEST["del"])) 
{
	$prodid = $_REQUEST["prodid"]; 
	mysqli_query($connect, "delete from product where product_id = $prodid");
	
	echo "<script type='text/javascript'> document.location = 'product.php'; </script>";
}

?>