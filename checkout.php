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
  $user_id = $_SESSION['ID'];
  $user_rows = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM customer WHERE customer_id='$user_id'"));
  $orders_result = mysqli_query($connect,"SELECT * FROM orders WHERE customer_id='$user_id' AND order_status='PENDING'");
  $sub_total =0;
  $order_total =0;
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Final Year Project - Checkout Page</title>
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
  <link href="assets/css/checkout.css" rel="stylesheet">

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
	  <section id="checkout" class="checkout">
		<!-- Payment --> 
		<div class="container">
		  <div class="title">
		    <h2>Checkout Form</h2>
		  </div>
		  <div class="d-flex">
		  <div class="row">
		    <div class="col-md-8">
			<form action="" method="post" id="checkoutForm1">
			  <input type="hidden" name="formID" value="1">
			  <label>
				<span class="fname">First Name <span class="required">*</span></span>
				<input type="text" name="fname" id="fname" readonly value="<?php echo $user_rows['customer_fname'];?>">
			  </label>
			  <label>
				<span class="lname">Last Name <span class="required">*</span></span>
				<input type="text" name="lname" id="lname" readonly value="<?php echo $user_rows['customer_lname'];?>">
			  </label>
			  <label>
			    <span>Street Address <span class="required">*</span></span>
			    <input type="text" name="address" id="address" placeholder="House number and street name" required value="<?php echo $user_rows['customer_address'];?>">
			  </label>
			  <label>
			    <span>Town / City <span class="required">*</span></span>
			    <input type="text" name="city" id="city" required value="<?php echo $user_rows['customer_city'];?>"> 
			  </label>
			  <label>
			    <span>State <span class="required">*</span></span>
			    <input type="text" name="state" id="state" required value="<?php echo $user_rows['customer_state'];?>"> 
			  </label>
			  <label>
			    <span>Postcode / ZIP <span class="required">*</span></span>
			    <input type="text" name="postcode" id="postcode" required pattern="[0-9]{5}" title="Format for Postcode : '00000'" value="<?php echo $user_rows['customer_postcode'];?>"> 
			  </label>
			  <label>
			    <span>Phone <span class="required">*</span></span>
			    <input type="tel" name="contact" id="contact" readonly value="<?php echo $user_rows['customer_contact_no'];?>"> 
			  </label>
			  <label>
			    <span>Email Address <span class="required">*</span></span>
			    <input type="email" name="email" id="email" readonly value="<?php echo $user_rows['customer_email'];?>"> 
			  </label>
			  <label>
			    <span>Additional Notes</span>
			    <textarea id="notes" name="notes"></textarea>
			  </label>
			  <label>
			    <span>Payment Method</span>
			  </label>
			    <div class="row">
				  <div id="payment-method">
				  <div>
					<input type="radio" name="payment" value="Online Banking" checked> Online Banking
				  </div>
				  <p>
					Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
				  </p>
				  <div>
					<input type="radio" name="payment" value="Credit Debit Card"> Credit or debit card <span>
					<img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
					</span>
				  </div>
				  </div>
				</div>
			    <br>
			  <input type="submit" name="submit" value="Place Order">
		    </form>
			</div>
			<div class="col-md-4">
			<div class="Yorder">
			  <table>
			    <thead>
				  <th colspan="2">Your order</th>
			    </thead>
				<tbody>
				<?php
				  if(mysqli_num_rows($orders_result)>0){
					  $order_rows = mysqli_fetch_assoc($orders_result);
					  $order_id = $order_rows['order_id'];
					  $order_details_result = mysqli_query($connect,"SELECT * FROM order_details WHERE order_id='$order_id'");
					  
					  if(mysqli_num_rows($order_details_result)>0){
						  $sub_total =0;
						  $order_total =0;
						  while($order_details_rows = mysqli_fetch_assoc($order_details_result)){
							$product_id = $order_details_rows['product_id'];
							$product_result = mysqli_query($connect,"SELECT * FROM product WHERE product_id='$product_id'");
							$product_rows = mysqli_fetch_assoc($product_result);
							echo"<tr>";
							echo"<td class='removespacetd'>".$order_details_rows['product_quantity']."x  ".$product_rows['product_name']."</td>";
							echo"<td class='removespacetd'>"."RM ".$order_details_rows['sub_total']."</td>";
							echo"</tr>";
							$sub_total += $order_details_rows['sub_total'];
							$order_total += $order_details_rows['product_quantity'];
						  }
						  $_SESSION['total_price'] = $sub_total;
					  }
					  
				  }
				  
				?>
				
			    <tr>
				  <td>Total Price</td>
				  <td class="removespacetd" style="border-bottom:1px solid #dadada;"><?php echo"RM ".number_format((float)$sub_total, 2, '.', '')?></td>
			    </tr>
			    <tr>
				  <td>Delivery fee</td>
				  <td>Free Delivery</td>
			    </tr>
				</tbody>
			  </table><br>
			  
		    </div><!-- Yorder -->
			</div>
	      </div>
          </div>
	    </div>
	  </section>
	  <!-- End Checkout Section -->
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
	include"assets/include/checkoutform.php";
	?>
	
</body>

</html>
<?php
}
?>