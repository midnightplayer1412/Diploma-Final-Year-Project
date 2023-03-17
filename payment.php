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

  <title>Final Year Project - Payment</title>
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
  <link href="https://fonts.gstatic.com" rel="preconnect">


  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/payment.css" rel="stylesheet">
  
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
  <?php include"assets/include/header.php"; ?><!-- End Header -->
  
  <section class="d-flex align-items-center">
	
  </section>
  
  <main id="main">
    <section class="payment-page">
	  <div class="container" style="width:95%;">

	<!-- Payment --> 
	
	
    <?php 
	  if($_SESSION['paymentMethod']=='Online Banking'){
	?>
	<!-- Online Banking Panel -->
	<div class="col-25"> <h3> Online Banking </h3> </div>
	  <div class="online-section" id="online-section">
		<form action="" method="POST">
		  <p>Please select your preferred bank:</p>
		    <div class='row'>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="maybank" name="bank" value="maybank" checked>
				<img src="assets/img/maybank.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="cimb" name="bank" value="cimb" >
				<img src="assets/img/cimb.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="public" name="bank" value="public">
				<img src="assets/img/public.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="rhb" name="bank" value="rhb">
				<img src="assets/img/rhb.jpg" width="100" height="50">
			  </div>
			</div>
			<div class='row'>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="hongleong" name="bank" value="hongleong">
				<img src="assets/img/hongleong.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="ambank" name="bank" value="ambank">
				<img src="assets/img/ambank.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="rakyat" name="bank" value="rakyat">
				<img src="assets/img/rakyat.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="islam" name="bank" value="islam">
				<img src="assets/img/islam.jpg" width="100" height="50">
			  </div>
			</div>
			<div class='row'>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="affin" name="bank" value="affin">
				<img src="assets/img/affin.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="bsn" name="bank" value="bsn">
				<img src="assets/img/bsn.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="agro" name="bank" value="agro">
				<img src="assets/img/agro.jpg" width="100" height="50">
			  </div>
			  <div class='col-lg-3 col-md-3'>
				<input type="radio" id="hsbc" name="bank" value="hsbc">
				<img src="assets/img/hsbc.jpg" width="100" height="50">
			  </div>
			</div>
			<input type="submit" name="submit" style="margin-top:5px;" class="btn btn-success" value="Pay">
			<!--button-->
		</form>
	  </div>
	<?php	
	  }
	  if($_SESSION['paymentMethod']=='Credit Debit Card'){
	?>
		  <!-- Credit or debit card Panel -->
	<div class="col-25"> <h3> Credit Or Debit Card </h3> </div>
	  <div class="container">
	      <div class="debit-section" id="debit-section">
            <label for="fname">Accepted Cards</label>
			<br>
			<div class="rows">
			<div class="col-md-3">
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy; background-color: white;"></i>
			  <i class="fa fa-cc-amex" style="color:blue; background-color: white;"></i>
			  <i class="fa fa-cc-mastercard" style="color:red; background-color: white;"></i>
			  <i class="fa fa-cc-discover" style="color:orange; background-color: white;"></i>
            </div>
            </div>
			</div>
			<form method="POST">
            <label for="cname">Card holder</label>
            <input type="text" id="cname" name="cardname" pattern="[A-Za-z\s]+" required>
            <label for="ccnum">Card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" data-mask="0000 0000 0000 0000" required>
			<label for="expmonth">Exp Month</label>
			<select type="text" name="expmonth" id="expiry_month">
			  <option value="00" disabled selected>MM</option>
			  <option value="01">JANUARY</option>
			  <option value="02">FEBRUARY</option>
			  <option value="03">MARCH</option>
			  <option value="04">APRIL</option>
			  <option value="05">MAY</option>
			  <option value="06">JUNE</option>
			  <option value="07">JULY</option>
			  <option value="08">AUGUST</option>
			  <option value="09">SEPTEMBER</option>
			  <option value="10">OCTOBER</option>
			  <option value="11">NOVEMBER</option>
			  <option value="12">DECEMBER</option>
			</select>
            <div class="row">
              <div class="col-25">
                <label for="expyear">Exp Year</label>
				<select type="text" name="expyear" id="expiry_year" onchange="runCheck()">
				  <option value="" disabled selected>YY</option>
				<?php 
					$currentYear = date('Y');
					for($x = 0; $x < 4; $x++){
						echo "<option value='$currentYear'>".$currentYear."</option>";
						$currentYear ++;
					}
					?>
				</select>
              </div>
              <div class="col-25">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" data-mask="000" required>
              </div>
            </div>
			<input type="submit" name="submit" style="margin-top:5px;" class="btn btn-success" value="Pay">
			</form>
           </div>
      </div>
	<?php
	  }
	  ?>
	
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
  <script src="assets/js/main-from-res.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
  
  <script type="text/javascript">
  function runCheck(){
		//update value every run
		var expiry_month = document.getElementById("expiry_month").value;
		var expiry_year = document.getElementById("expiry_year").value;

		var today = new Date();
		var selDate = new Date();

		if (today.getTime() > selDate.setFullYear(expiry_year, expiry_month)){
		 //too late
			alert ("\u2022 Expiry month and year cannot be blank/Expiry month and year is before today month and year.");
			location.reload();
			return false;
		} else {
		//do good stuff...

		}
  }
	
    </script>	

</body>
</html>

  
  <?php
	
	include"assets/include/paymentform.php";
	
	
  ?>

</body>

</html>

<?php
}
?>