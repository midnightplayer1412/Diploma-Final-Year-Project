<?php
session_start();
include('dataconnection.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Final Year Project - Reset Password</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Logo.jpg" rel="icon">
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
  
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
  <link href="assets/css/resetpass.css" rel="stylesheet">

</head>

<body>

	<!-- ======= Top Bar ======= -->
	<div id="topbar" class="d-flex align-items-center fixed-top">
		<div class="container d-flex justify-content-center justify-content-md-between">

			<div class="contact-info d-flex align-items-center">
				<i class="bi bi-phone d-flex align-items-center"><span>+60 1300-88-5252</span></i>
				<i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 10AM - 22PM</span></i>
			</div>

		  <!--div class="languages d-none d-md-flex align-items-center">
			<ul>
			  <li>En</li>
			  <li><a href="#">De</a></li>
			</ul>
		  </div-->
		</div>
	</div>

  <!-- ======= Header ======= -->
	<header id="header" class="fixed-top d-flex align-items-cente">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

			<h1 class="logo me-auto me-lg-0"><a href="index.php">Sweet Bakery Shop</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto " href="index.php#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="index.php#about">About</a></li>
					<li><a class="nav-link scrollto" href="index.php#menu">Menu</a></li>
					<!--<li><a class="nav-link scrollto" href="#events">Events</a></li>-->
					<!--<li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>-->
					<li><a class="nav-link scrollto" href="index.php#gallery">Gallery</a></li>
					<!--<li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
					<ul>
					  <li><a href="#">Drop Down 1</a></li>
					  <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
						<ul>
						  <li><a href="#">Deep Drop Down 1</a></li>
						  <li><a href="#">Deep Drop Down 2</a></li>
						  <li><a href="#">Deep Drop Down 3</a></li>
						  <li><a href="#">Deep Drop Down 4</a></li>
						  <li><a href="#">Deep Drop Down 5</a></li>
						</ul>
					  </li>
					  <li><a href="#">Drop Down 2</a></li>
					  <li><a href="#">Drop Down 3</a></li>
					  <li><a href="#">Drop Down 4</a></li>
					</ul>
				  </li>-->
					<li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
			<a href="login_page.php" class="book-a-table-btn scrollto d-none d-lg-flex">Sign Up/Login</a>
			
		</div>
	</header><!-- End Header -->
	
    <section class="d-flex align-items-center">

    </section><!-- End Hero -->

	<main id="main">

		<section class="inner-page">
			<div class="container">
				<div id='reset-form'class='reset-page'>
					<div class="form-box-reset">
					<h6>Reset Your Password</h6>
						<form id='login' class='input-group-reset' method="post">
							<div class="pw-meter">
							  <input type="password" id="password" class="input-field" name="cust_password" required="required" placeholder="Enter New Password">
							  <div class="pw-display-toggle-btn">
							    <i class="bi bi-eye"></i>
							    <i class="bi bi-eye-slash"></i>
							  </div>
							  <input type="password" class="input-field" name="cust_conpassword" required="required" placeholder="Confirm New Password">
							  <div class="pw-strength">
							    <span>Weak</span>
							    <span></span>
							  </div>
							</div>
							<input type='submit'class='submit-btn' name="resetbtn" value="Reset My Password" style="color:black;">
						</form>
					</div>
				</div>
			</div>
		</section>
		
		</div>
		<!---the first script code is for login and registration form to move correctly-->

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
	<script>			
			//password management	
		function getPasswordStrength(password){
		  let s = 0;
		  if(password.length > 6){
			s++;
		  }
		  if(password.length > 10){
			s++;
		  }
		  if(/[A-Z]/.test(password)){
			s++;
		  }
		  if(/[0-9]/.test(password)){
			s++;
		  }
		  if(/[^A-Za-z0-9]/.test(password)){
			s++;
		  }
		  return s;
		}
		document.querySelector(".pw-meter #password").addEventListener("focus",function(){
		  document.querySelector(".pw-meter .pw-strength").style.display = "block";
		});
		document.querySelector(".pw-meter .pw-display-toggle-btn").addEventListener("click",function(){
		  let el = document.querySelector(".pw-meter .pw-display-toggle-btn");
		  if(el.classList.contains("active")){
			document.querySelector(".pw-meter #password").setAttribute("type","password");
			el.classList.remove("active");
		  } else {
			document.querySelector(".pw-meter #password").setAttribute("type","text");
			el.classList.add("active");
		  }
		});

		document.querySelector(".pw-meter #password").addEventListener("keyup",function(e){
		  let password = e.target.value;
		  let strength = getPasswordStrength(password);
		  let passwordStrengthSpans = document.querySelectorAll(".pw-meter .pw-strength span");
		  strength = Math.max(strength,1);
		  passwordStrengthSpans[1].style.width = strength*20 + "%";
		  if(strength < 2){
			passwordStrengthSpans[0].innerText = "Weak";
			passwordStrengthSpans[0].style.color = "#000";
			passwordStrengthSpans[1].style.background = "#d13636";
		  } else if(strength >= 2 && strength <= 4){
			passwordStrengthSpans[0].innerText = "Medium";
			passwordStrengthSpans[0].style.color = "#000";
			passwordStrengthSpans[1].style.background = "#e6da44";
		  } else {
			passwordStrengthSpans[0].innerText = "Strong";
			passwordStrengthSpans[0].style.color = "#000";
			passwordStrengthSpans[1].style.background = "#20a820";
		  }
		});
			
	</script>

<!-- Register new user to database -->
<?php
  //include"assets/include/mailto.php";
    


?>
</body>

</html>