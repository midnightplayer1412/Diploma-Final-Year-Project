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
    $category_name = $_POST['prod_cat_name'];
	$category_image = $_POST['prod_cat_img'];
	$checkName = mysqli_query($connect,"SELECT * FROM product_category WHERE product_category_name ='$category_name'");
	
	if(mysqli_num_rows($checkName)!=0 || $category_name==''){
		?>
		<script type="text/javascript">
            alert("Product Category already exist. Please check the name and try again.");
        </script>
	    
	    <?php
	}
	else{
		$query = "INSERT INTO product_category (product_category_name, product_category_image, product_category_status) VALUES ('$category_name', 'assets/img/category/$category_image', 'AVAILABLE')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Product Category Added.");
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
			  	alert("Product Category is Not Added.");
			  </script>
			  <?php
            echo "not done";
            $_SESSION['status'] =  "Product Category is Not Added";
			echo "<script type='text/javascript'> document.location = 'product_category.php'; </script>";
        }
	}

       

}

?>