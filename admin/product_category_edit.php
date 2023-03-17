<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Product Category Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		if(isset($_GET["edit"])){
		  $prod_catid = $_GET["prod_catid"];
 
		  $result = mysqli_query($connect, "select * from product_category where product_category_id = $prod_catid");
		  $row = mysqli_fetch_assoc($result);
		?>
		<h1>Edit Product Category Data</h1>
 
		<form method="post" action="">
			<p><label>Product Category Name:</label><br>
			<input type="text" name="prod_category_name" size="50" value="<?php echo $row['product_category_name']; ?>" style="width:80%" required>
			<p><label>Product Category Image:</label><br>
			<input type="file" name="prod_category_img" title="The image need to store under category folder" style="width:80%">
			<p><label>Product Category Status:</label><br>
			<select type="text" name="prod_category_status" style="width:80%">
			  <option value="AVAILABLE" <?php if($row['product_category_status']=="AVAILABLE") echo "selected='selected'"; ?>>AVAILABLE</option>
			  <option value="NOT AVAILABLE" <?php if($row['product_category_status']=="NOT AVAILABLE") echo "selected='selected'"; ?>>NOT AVAILABLE</option>
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
include('includes/others_scripts.php');
include('includes/footer.php');
?>

<?php
if(isset($_POST['savebtn']))
{
	$name = $_POST['prod_category_name'];
	$status = $_POST['prod_category_status'];
	$image = $_POST['prod_category_img'];
	$checkCategory = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM product_category WHERE product_category_id ='$prod_catid'"));
	$checkName = mysqli_query($connect,"SELECT * FROM product_category WHERE product_category_name ='$name'");
	
	if($checkCategory['product_category_name']!= $name || $name==''){
		if(mysqli_num_rows($checkName)!=0){
			?>
			<script type="text/javascript">
				alert("Product Category already exist. Please check the name and try again.");
			</script>
			
			<?php
		}else{
			if($image==''){
				$image=$checkCategory['product_category_image'];
				$query = "UPDATE product_category SET product_category_name='$name', product_category_image='$image', product_category_status='$status' WHERE product_category_id='$prod_catid'";
			}else{
				$query = "UPDATE product_category SET product_category_name='$name', product_category_image='assets/img/category/$image', product_category_status='$status' WHERE product_category_id='$prod_catid'";
			}
		
			$query_run = mysqli_query($connect, $query);
    
			if($query_run)
			{
				?>
				  <script type="text/javascript">
					alert("Product Category Data Updated");
				  </script>
				  <?php
				echo "done";
				$_SESSION['success'] =  "Product Category is Added Successfully";
				echo "<script type='text/javascript'> document.location = 'product_category.php'; </script>";
			}
			else 
			{
				?>
				  <script type="text/javascript">
					alert("Product Category Data is Not Updated.");
				  </script>
				  <?php
				echo "not done";
				$_SESSION['status'] =  "Product Category is Not Added";
				echo "<script type='text/javascript'> document.location = 'product_category.php'; </script>";
			}
		}
	}else{
		if($image==''){
			$image=$checkCategory['product_category_image'];
			$query = "UPDATE product_category SET product_category_name='$name', product_category_image='$image', product_category_status='$status' WHERE product_category_id='$prod_catid'";
		}else{
			$query = "UPDATE product_category SET product_category_name='$name', product_category_image='assets/img/category/$image', product_category_status='$status' WHERE product_category_id='$prod_catid'";
		}
		
		$query_run = mysqli_query($connect, $query);
    
		if($query_run)
		{
			?>
			  <script type="text/javascript">
				alert("Product Category Data Updated");
			  </script>
			  <?php
			echo "done";
			$_SESSION['success'] =  "Product Category is Added Successfully";
			echo "<script type='text/javascript'> document.location = 'product_category.php'; </script>";
		}
		else 
		{
			?>
			  <script type="text/javascript">
				alert("Product Category Data is Not Updated.");
			  </script>
			  <?php
			echo "not done";
			$_SESSION['status'] =  "Product Category is Not Added";
			echo "<script type='text/javascript'> document.location = 'product_category.php'; </script>";
		}
	}
	
	
	
        
    

}

?>
