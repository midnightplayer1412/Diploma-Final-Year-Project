<?php
include('../dataconnection.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Product Details
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <?php
		if(isset($_GET["edit"])){
		  $prodid = $_GET["prodid"];
 
		  $result = mysqli_query($connect, "select * from product where product_id = $prodid");
		  $row = mysqli_fetch_assoc($result);
		  $catID = $row['product_category_id'];
		?>
		<h1>Edit Product Data</h1>
 
		<form method="post" action="">
			<p><label>Product Name:</label><br>
			<input type="text" name="prod_name" size="50" value="<?php echo $row['product_name']; ?>" style="width:80%">
			<p><label>Product Description:</label><br>
			<textarea type="text" name="prod_desc" rows="4" style="width:80%"><?php echo $row['product_description']; ?></textarea>
			<p><label>Product Price:</label><br>
			<input type="text" name="prod_price" pattern="\d{1,3}.\d{2}" title="The Price Format : 'xxx.xx'" value="<?php echo $row['product_price']; ?>" style="width:80%">
			<p><label>Product Category ID:</label><br>
			<select type="text" name="prod_catID" style="width: 80%;">
			  <?php 
				$getCategory = mysqli_query($connect,"SELECT * FROM product_category");
				if(mysqli_num_rows($getCategory)>0){
				  while($categoryRows=mysqli_fetch_assoc($getCategory)){
					echo "<option value='".$categoryRows['product_category_id']."'";
					if($catID == $categoryRows['product_category_id']){
					  echo "selected";
					}
					echo ">".$categoryRows['product_category_id']." - ".$categoryRows['product_category_name']."</option>";
				  }
				}
			 ?>  
			</select>
			<p><label>Product Status:</label><br>
			<select type="text" name="prod_status" style="width:80%">
			  <option value="AVAILABLE" <?php if($row['product_status']=="AVAILABLE") echo "selected='selected'"; ?>>AVAILABLE</option>
			  <option value="NOT AVAILABLE" <?php if($row['product_status']=="NOT AVAILABLE") echo "selected='selected'"; ?>>NOT AVAILABLE</option>
			</select>
			<p><label>Product Image Link:</label><br>
			<input type="text" name="prod_img" value="<?php echo $row['product_image']; ?>" style="width:80%">
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
	$name = $_POST['prod_name'];
    $description = $_POST['prod_desc'];
    $price = $_POST['prod_price'];
    $category_id = $_POST['prod_catID'];
	$status = $_POST['prod_status'];
	$image = $_POST['prod_img'];
	$checkProduct = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM product WHERE product_id ='$prodid'"));
	$checkName = mysqli_query($connect,"SELECT * FROM product WHERE product_name ='$name'");
	
	if($checkProduct['product_name']!=$name){
		if(mysqli_num_rows($checkName)!=0){
			?>
			<script type="text/javascript">
				alert("Product already exist. Please check the name and try again.");
			</script>
			
			<?php
		}else{
			$query = "UPDATE product SET product_name='$name',product_description='$description',product_price='$price',product_category_id='$category_id',product_status='$status',product_image='$image' WHERE product_id='$prodid'";
			$query_run = mysqli_query($connect, $query);
    
			if($query_run)
			{
				?>
				  <script type="text/javascript">
					alert("Product Data Updated");
				  </script>
				  <?php
				echo "done";
				$_SESSION['success'] =  "Product is Added Successfully";
				echo "<script type='text/javascript'> document.location = 'product.php'; </script>";
			}
			else 
			{
				?>
				  <script type="text/javascript">
					alert("Product Data is Not Updated.");
				  </script>
				  <?php
				echo "not done";
				$_SESSION['status'] =  "Product is Not Added";
				echo "<script type='text/javascript'> document.location = 'product.php'; </script>";
			}
		}
	}else{
		$query = "UPDATE product SET product_name='$name',product_description='$description',product_price='$price',product_category_id='$category_id',product_status='$status',product_image='$image' WHERE product_id='$prodid'";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Product Data Updated");
			  </script>
			  <?php
            echo "done";
            $_SESSION['success'] =  "Product is Added Successfully";
			echo "<script type='text/javascript'> document.location = 'product.php'; </script>";
        }
        else 
        {
			?>
			  <script type="text/javascript">
			  	alert("Product Data is Not Updated.");
			  </script>
			  <?php
            echo "not done";
            $_SESSION['status'] =  "Product is Not Added";
			echo "<script type='text/javascript'> document.location = 'product.php'; </script>";
        }
	}

        
    

}

?>
