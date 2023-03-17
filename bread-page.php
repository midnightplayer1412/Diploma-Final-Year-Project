<?php
session_start();
include"dataconnection.php";
if(isset($_SESSION['loggedin']) == false){
	echo"<script type='text/javascript'>
		  alert('Please Login to continue');
		 </script>";
	echo "<script type='text/javascript'> document.location = 'login_page.php'; </script>";
}
else{
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Final Year Project - Bread Menu Page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Logo.jpg" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

	<!-- ======= Top Bar ======= -->
	<div id="topbar" class="d-flex align-items-center fixed-top">
		<div class="container d-flex justify-content-center justify-content-md-between">

			<div class="contact-info d-flex align-items-center">
				<i class="bi bi-phone d-flex align-items-center"><span>+60 1300-88-5252</span></i>
				<i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 10AM - 22PM</span></i>
			</div>
		</div>
	</div>

  <!-- ======= Header ======= -->
  <?php include"assets/include/header.php"; ?>
	
	<section class="d-flex align-items-center">
	  
	</section>
	
	<main id="main">
	  <section class="cake-page">
        <div class="container">
		  <div class="container" style="width:95%;">
  
		  <!-- Display all Food from food table --> 
		    <?php
		    $sql = "SELECT * FROM product WHERE product_category_id =2 AND product_status='AVAILABLE'";
		    $result = mysqli_query($connect, $sql);
 
		    if (mysqli_num_rows($result) > 0){
		      $count=0;

		      while($row = mysqli_fetch_assoc($result)){
			    if ($count == 0){
			      echo "<div class='row'>";
			    }
		?>
			    <div class="col-md-6 col-lg-6"> 
			      <form method="post" action="">
			        <div class="mypanel" align="center";>
				      <img src="<?php echo $row["product_image"]; ?>" class="img-responsive">
				      <h4 style="color:brown;"><?php echo $row["product_name"]; ?></h4>
				      <h5 style="color:white;"><?php echo $row["product_description"]; ?></h5>
				      <h5 style="color:brown;">RM<?php echo $row["product_price"]; ?></h5>
				      <h5 style="color:white;">Quantity: <input type="number" min="1" max="10" name="quantity" class="form-control" value="1" style="width: 60px;"> </h5>
				  
				      <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>">
				      <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>">
				      <input type="hidden" name="hidden_PID" value="<?php echo $row["product_id"]; ?>">
				      <input type="submit" name="add" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
			        </div>
			      </form>
			    </div>

			    <?php
				  $count++;
				  if($count==4)
				  {
					echo "</div>";
					$count=0;
				  }
			  }// while row
			
			}//if statement 
			?>
	
	      </div>
        </div>
      </section>
	</main><!-- End #main -->

  <!-- ======= Footer ======= -->
	<?php include"assets/include/footer.php";?><!-- End Footer -->

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="assets/vendor/aos/aos.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

	<!-- Main JS File -->
	<script src="assets/js/main.js"></script>
	
	<?php
	  include"assets/include/cart.php";	  
	?>

</body>

</html>
<?php
}
?>