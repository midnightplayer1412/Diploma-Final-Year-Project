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
    $name = $_POST['prod_name'];
	$description = $_POST['prod_desc'];
    $price = $_POST['prod_price'];
    $category_ID = $_POST['prod_catID'];
    $image = "assets/img/product/".$_POST['prod_img'];
	$checkName = mysqli_query($connect,"SELECT * FROM product WHERE product_name ='$name'");
	
	if(mysqli_num_rows($checkName)!=0){
		?>
		<script type="text/javascript">
            alert("Product already exist. Please check the name and try again.");
        </script>
	    
	    <?php
	}else{
		$query = "INSERT INTO product (product_name,product_description,product_price,product_category_id,product_status,product_image) VALUES ('$name','$description','$price','$category_ID','AVAILABLE','$image')";
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			?>
			  <script type="text/javascript">
			  	alert("Product Added.");
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
			  	alert("Product is Not Added.");
			  </script>
			  <?php
            echo "not done";
            $_SESSION['status'] =  "Product is Not Added";
			echo "<script type='text/javascript'> document.location = 'product.php'; </script>";
        }
	}

        

}

?>