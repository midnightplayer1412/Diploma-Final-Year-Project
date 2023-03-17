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

  <title>Final Year Project - Payment Successful</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Logo.jpg" rel="icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  <link href="payment.css" rel="stylesheet" >
  <link href="https://fonts.gstatic.com" rel="preconnect">


  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
</head>

<style>

.success-page
{
  max-width:400px;
  display:block;
  margin: 0px auto;
  text-align: center;
  position: relative;
  top: 100%;
}
.success-page img
{
  max-width:62px;
  display: block;
  margin: 0 auto;
}
.success-page .btn-view-orders
{
  display: block;
  border:1px solid brown;
  width:150px;
  margin: 0 auto;
  margin-top: 45px;
  padding: 10px;
  color:#fff;
  background-color: brown;
  text-decoration: none;
  margin-bottom: 20px;
}

.success-page .btn-view-receipt
{
  display: block;
  border:1px solid brown;
  width:150px;
  margin: 0 auto;
  margin-top: 10px;
  padding: 10px;
  color:#fff;
  background-color: brown;
  text-decoration: none;
  margin-bottom: 20px;
}

.success-page .btn-view-orders:hover 
{
  background-color: #d5b276;
  border:1px solid #d5b276;
  color: white;
}

.success-page .btn-view-receipt:hover 
{
  background-color: #d5b276;
  border:1px solid #d5b276;
  color: white;
}
.success-page h1
{
  color:#cda45e;
  margin-top: 0px;
}
.success-page i
{
  color: #9ABC66;
  line-height: 200px;
  margin-left:-15px;
  
}
.success-page a
{
  text-decoration: none;
}
.success-page a:hover{
	color: white;
}

</style>

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
  <?php include"assets/include/header.php"; ?><!-- End Header -->
  
  <section class="d-flex align-items-center">

  </section>

  <main id="main">

    <section class="successpage">
      <div class="container">
		<div class="container" style="width:95%;">
		<!-- Successful Payment --> 
			<div class="success-page">
			  <img  src="http://share.ashiknesin.com/green-checkmark.png" class="center" alt="" />
			  <i style="font-size: 100px;" class="checkmark">✓</i>
			  <h1>Payment Successful!</h1>
			  <p>We are pleased to inform you that we have received your payment.<br/> We will be in touch with you shortly.</p>
			  <a href="userprofile_page.php" class="btn-view-orders">View Orders</a>
			  <a href="ReceiptAfterPayment.php" class="btn-view-receipt">View Receipt</a>
			  <a href="homepage.php#menu">Continue Shopping</a>
			</div>
		</div>
	  </div>
    </section>
	
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include"assets/include/footer.php";?><!-- End Footer -->

  <!-- <div id="preloader"></div> -->
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
  
 

</body>

</html>

<?php
}
?>