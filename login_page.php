<?php
session_start();
include('dataconnection.php'); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Final Year Project - Login/Register</title>
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
  <link href="assets/css/login_style.css" rel="stylesheet">

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
	<header id="header" class="fixed-top d-flex align-items-cente">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

			<h1 class="logo me-auto me-lg-0"><a href="index.php">Sweet Bakery Shop</a></h1>

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto " href="index.php#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="index.php#about">About</a></li>
					<li><a class="nav-link scrollto" href="index.php#menu">Menu</a></li>
					<li><a class="nav-link scrollto" href="index.php#gallery">Gallery</a></li>
					<li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
			<a href="login_page.php" class="book-a-table-btn scrollto d-none d-lg-flex">Sign Up/Login</a>
			
		</div>
	</header><!-- End Header -->

	<main id="main">

		<section class="inner-page">
			<div class="container">
				<div id='login-form'class='login-page'>
					<!---creating the form-box-->
					<div class="form-box">
						<div class='button-box'>
							<div id='btn'></div>
							<button type='button'onclick='login()'class='toggle-btn' style="color:black;">Log In</button>
							<button type='button'onclick='register()'class='toggle-btn' style="color:white;">Register</button>
						</div>
						<!---creating login form--->
						<form id='login' class='input-group-login' method="post">
							<input type='email'class='input-field' name="login_email" placeholder='Email Id'required>
							<input type='password'class='input-field' name="login_password"placeholder='Enter Password'required>
							<input type='checkbox'class='check-box'><span>Remember Password</span>
							<input type='submit'class='submit-btn' name="loginbtn" value="Log in" style="color:black;">
						</form>
						<!---creating the registration form--->
						<form id='register' class='input-group-register' method="post">
							<p><input type="text" class="input-field" name="cust_fname" required="required" placeholder="First Name">
							<input type="text" class="input-field" name="cust_lname" required="required" placeholder="Last Name">
							<input type="email" class="input-field" name="cust_email" required="required" placeholder="Email">
							<input type="tel" class="input-field" name="cust_contact_no" required="required" placeholder="Contact Number" maxlength="14" pattern="[0-9]{3}-[0-9]{7,8}" title="Format for Contact Number : '01x-xxxxxxxx'">
							<input type="text" class="input-field" name="cust_address" required="required" placeholder="Address">
							<input type="text" class="input-field" name="cust_city" required="required" placeholder="City">
							<input type="text" class="input-field" name="cust_state" required="required" placeholder="State">
							<input type="text" class="input-field" name="cust_postcode" required="required" placeholder="Postcode" pattern="[0-9]{5}" title="Format for Postcode : '00000'">
							<div class="pw-meter">
							  <input type="password" id="password" class="input-field" name="cust_password" required="required" placeholder="Enter Password">
							  <div class="pw-display-toggle-btn">
							    <i class="bi bi-eye"></i>
							    <i class="bi bi-eye-slash"></i>
							  </div>
							  <input type="password" class="input-field" name="cust_conpassword" required="required" placeholder="Confirm Password">
							  <div class="pw-strength">
							    <span>Weak</span>
							    <span></span>
							  </div>
							</div>
							<input type='checkbox'class='check-box' required><span>I agree to the <a href="assets/document/Terms-and-Conditions.pdf">terms and conditions</a></span>
							<input type='submit'class='submit-btn' name="savebtn" value="Submit" style="color:black;">
						</form>
					</div>
				</div>
			</div>
		</section>
		
		</div>
		<!---the first script code is for login and registration form to move correctly-->
		<script>
			var x = document.getElementById('login');
			var y = document.getElementById('register');
			var z = document.getElementById('btn');
			var colour = document.getElementsByClassName("toggle-btn");
			
			function register()
			{
				x.style.left = '-400px';
				y.style.left = '50px';
				z.style.left = '110px';
				colour[0].style.color = "white";
				colour[1].style.color = "black";
			}
			
			function login()
			{
				x.style.left = '50px';
				y.style.left = '450px';
				z.style.left = '0px';
				colour[0].style.color = "black";
				colour[1].style.color = "white";
			}
			
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

<!-- Register new user to database -->
<?php

if(isset($_POST["savebtn"])) 	
{
	$cust_fname = $_POST["cust_fname"];  	
	$cust_lname = $_POST["cust_lname"];
	$cust_email = $_POST["cust_email"];
	$cust_contact_no = $_POST["cust_contact_no"];
	$cust_address = $_POST["cust_address"];
	$cust_city = $_POST["cust_city"];
	$cust_state = $_POST["cust_state"];
	$cust_postcode = $_POST["cust_postcode"];

	$cust_password = $_POST["cust_password"];
	$cust_conpassword = $_POST["cust_conpassword"];

	$check_email = "SELECT * FROM customer WHERE customer_email = '$cust_email' ";
    $result_email = mysqli_query($connect,$check_email);
	
	$to_email = $cust_email;
	$subject = "Welcome To Sweet Bakery Shop Website";
	$body = "Hi ".$cust_fname." ".$cust_lname.",

	Welcome to SWEET BAKERY SHOP

	";

	$headers = "From: fyp.sweetbakeryshop@gmail.com";
	
	if(mysqli_num_rows($result_email) !=0)
	{
		?>
		<script type="text/javascript">
            alert("Email already taken.");
        </script>
	    
	    <?php
	}
    else
    {
		if($cust_password === $cust_conpassword){
	
          $customer_row = mysqli_query($connect,"INSERT INTO customer(customer_fname, customer_lname, customer_email, customer_contact_no, customer_address, customer_city, customer_state, customer_postcode, customer_password, customer_status) VALUES ('$cust_fname', '$cust_lname', '$cust_email', '$cust_contact_no', '$cust_address', '$cust_city', '$cust_state', '$cust_postcode', '$cust_password', 'ACTIVE')");
		  if(isset($customer_row)){
		?>
			<script type="text/javascript">
				alert("Account created. Welcome");
			</script>
		
		  <?php
		  mail($to_email, $subject, $body, $headers);
		  }
			$_SESSION['loggedin'] = true;
			$_SESSION['email'] = $cust_email;
			$_SESSION['lastname'] = $cust_lname;
			$_SESSION['firstname'] = $cust_fname;
			$_SESSION['contact_no'] = $cust_contact_no;
			$_SESSION['address'] = $cust_address;
			$_SESSION['state'] = $cust_state;
			$_SESSION['city'] = $cust_city;
			$_SESSION['postcode'] = $cust_postcode;

			$customer_result = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM customer WHERE customer_email='$cust_email'"));
			$_SESSION['ID'] = $customer_result['customer_id'];
			$_SESSION['image'] = $customer_result['customer_profile_image'];

			echo "<script type='text/javascript'> document.location = 'homepage.php'; </script>";
			echo $_SESSION['image'];

		}
		else
		{
			?>
			<script type="text/javascript">
				alert("Password and Confirm Password doesn't Match");
			</script>
		
		  <?php
		}
        ?>
	  
	<?php
	}
}	

?>

<!--Login function-->
<?php	 
if(isset($_POST['loginbtn'])){
	
    $login_email = mysqli_real_escape_string($connect,$_POST['login_email']);
    $login_password = mysqli_real_escape_string($connect,$_POST['login_password']);
    if ($login_email != "" && $login_password != ""){
		
		$sql_query1 ="select * from admin where admin_email='$login_email' and admin_password='$login_password'";
        $result1 = mysqli_query($connect,$sql_query1);
        $row1 = mysqli_fetch_assoc($result1);
		
		if(mysqli_num_rows($result1)>0){
			$_SESSION['admin_id']= $row1['admin_id'];
			?>
		  <script type="text/javascript">
			alert("Welcome");
		  </script>
		  <?php echo "<script type='text/javascript'> document.location = 'admin/index.php'; </script>";
		}
		else{
		  $sql_query2 ="select * from customer where customer_email='$login_email' and BINARY customer_password='$login_password'";
          $result2 = mysqli_query($connect,$sql_query2);
          $row2 = mysqli_fetch_assoc($result2);
		  
		  if(mysqli_num_rows($result2)>0){
			?>
			<script type="text/javascript">
			  alert("Welcome");
			</script>
			<?php
				$_SESSION['loggedin'] = true;
				$_SESSION['ID'] = $row2['customer_id'];
				$_SESSION['lastname'] = $row2['customer_lname'];
				$_SESSION['firstname'] = $row2['customer_fname'];
				$_SESSION['email'] = $row2['customer_email'];
				$_SESSION['contact_no'] = $row2['customer_contact_no'];
				$_SESSION['address'] = $row2['customer_address'];
				$_SESSION['state'] = $row2['customer_state'];
				$_SESSION['city'] = $row2['customer_city'];
				$_SESSION['postcode'] = $row2['customer_postcode'];
				$_SESSION['image'] = $row2['customer_profile_image'];
			    echo "<script type='text/javascript'> document.location = 'homepage.php'; </script>";
		  }else{
			?>
			<script type="text/javascript">
			  alert("Invalid Username or Password");
			</script>
			<?php
		  }
		  
		}
		
		   
    }
}

    


?>
</body>

</html>