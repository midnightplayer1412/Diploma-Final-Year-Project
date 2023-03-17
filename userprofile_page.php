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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Final Year Project - User Profile</title>
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
  <link href="assets/css/userprofile_style.css" rel="stylesheet">

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
	<section id="user-profile" class="user-profile">
	  <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo $user_rows['customer_profile_image'];?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <a class="btn btn-md btn-info mr-4" onclick="edit_profile()">Edit Profile</a>
                <a class="btn btn-md btn-default float-right" href="logout.php">Log Out</a>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
			  <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
          
                  </div>
                </div>
              </div>
              <div class="text-center">
                <button class="btn " onclick="showOrder()">Order Status</button>
				<button class="btn btn-md" onclick="showPayment()">Payment History</button>
              </div>
            </div>
          </div>
        </div>
		<!-- User Details Card Panel -->
		  <div class="user-section col-xl-8 order-xl-1" id="user-section">
          <div class="card bg-secondary shadow">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3>User account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post">
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">First Name</label>
                        <input type="text" id="input-fname" name="cus_fname" readonly class="form-control form-control-alternative" placeholder="Username" value="<?php echo $user_rows['customer_fname'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-lname" name="cus_lname" readonly class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $user_rows['customer_lname'];?>">
                      </div>
					</div>
                  </div>
                  <div class="row">
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" name="cus_email" readonly class="form-control form-control-alternative" placeholder="example@example.com" value="<?php echo $user_rows['customer_email'];?>">
                      </div>
                    </div>
                  </div>
				  <div class="hidden" id="hidden-password">
				  <div class="row">
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">New Password</label>
                        <input type="password" id="input-password" name="cus_password" class="form-control form-control-alternative" placeholder="New Password">
                      </div>
                    </div>
					<div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Confirm Password</label>
                        <input type="password" id="input-con-password" name="cus_con_password" class="form-control form-control-alternative" placeholder="Confirm Password">
                      </div>
                    </div>
                  </div>
				  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" name="cus_address" class="form-control form-control-alternative" placeholder="Address" readonly value="<?php echo $user_rows['customer_address'];?>" type="text">
                      </div>
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">City</label>
                        <input id="input-city" name="cus_city" class="form-control form-control-alternative" placeholder="City" readonly value="<?php echo $user_rows['customer_city'];?>" type="text">
                      </div>
                    </div>
					<div class="col-md-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">State</label>
                        <input id="input-state" name="cus_state" class="form-control form-control-alternative" placeholder="State" readonly value="<?php echo $user_rows['customer_state'];?>" type="text">
                      </div>
                    </div>
					<div class="col-md-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Postcode</label>
                        <input id="input-postcode" name="cus_postcode" class="form-control form-control-alternative" placeholder="Postcode" 
						pattern="[0-9]{5}" title="Format for Postcode : '00000'" readonly value="<?php echo $user_rows['customer_postcode'];?>" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Contact No</label>
                        <input type="text" id="input-contact" name="cus_contact_no" class="form-control form-control-alternative" pattern="[0-9]{3}-[0-9]{7,8}" title="Format for Contact Number : '01x-xxxxxxxx'" readonly value="<?php echo $user_rows['customer_contact_no'];?>">
                      </div>
                    </div>
                    
                    
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
				<div class="hidden" id="hidden-file">
                <h6 class="heading-small text-muted mb-4">Profile Image</h6>
                <div class="pl-lg-4">
                  <div class="form-group focused">
                    <label>Upload A New Profile Picture</label>
                    <input type="file" id="input-image" accept=".jpg, .jpeg, .png" class="form-control form-control-alternative" name="cus_img">
                  </div>
                </div>
				  <div class="row">
				    <div class="col">
				      <input type='submit'class='submit-btn' name="savebtn" value="Save" style="color:black;">
				    </div>
				  </div>
              </form>
            </div>
          </div>
          </div>
        </div><!-- End User Details Card Panel -->
		<!-- Order Status Card Panel -->
		  <div class="order-section col-xl-8 order-xl-1" id="order-section">
          <div class="card bg-secondary shadow">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3>Order Status</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
				  <tr>
					<th>Order ID </th>
					<th>Order Date</th>
					<th>Order Total </th>
					<th>Total Price </th>
					<th>Order Status</th>
					<th>Delivery Date</th>
					<th>More Details</th>
			      </tr>
				</thead>
				<tbody>
				<?php
				  $order_result = mysqli_query($connect,"SELECT * FROM orders WHERE customer_id='$user_id' AND NOT order_status ='PENDING'");
				  if(mysqli_num_rows($order_result)>0){
					while($order_row = mysqli_fetch_assoc($order_result)){
						$order_id = $order_row['order_id'];
						$getDeliveryDate = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM delivery WHERE order_id='$order_id'"));
				  ?>
					  <tr>
						<td><?php echo $order_row['order_id'];?></td>
						<td><?php echo $order_row['order_date'];?></td>
						<td><?php echo $order_row['order_total'];?></td>
						<td><?php echo "RM ".$order_row['total_price'];?></td>
						<td><?php echo $order_row['order_status'];?></td>
						<td><?php if($getDeliveryDate['delivery_date']=='0000-00-00'){
							echo"Waiting For Delivery";
						}else{
							echo $getDeliveryDate['delivery_date'];
						}	
						?></td>
						
						
						<td>
						  <form action="userprofile_page.php?details&ordid=<?php echo $row['order_id']; ?>" method="post">
							<!--input type="hidden" name="edit_id" value=""-->
							<input type="submit" name="details_btn" class="btn btn-success" onclick="showDetails()" value="More Details">
						  </form>
						</td>
					  </tr>
					  
			<?php	  
					}
				  }
		  ?>
		  
				</tbody>
			  </table>
            </div>
          </div>
          </div>
        <!-- End Order Status Card Panel -->
		<!-- Order Details Card Panel -->
		  <div class="order_details-section col-xl-8 order-xl-1" id="order_details-section">
          <div class="card bg-secondary shadow">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3>Order Details</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
			
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
				  <tr>
					<th>Order Details ID </th>
					<th>Product Name</th>
					<th>Product Quantity</th>
					<th>Product Price</th>
					<th>Sub Total</th>
			      </tr>
				</thead>
				<tbody>
				<?php
				  $order_details_result = mysqli_query($connect,"SELECT * FROM order_details WHERE order_id='$order_id'");
				  if(mysqli_num_rows($order_details_result)>0){
					while($order_details_row = mysqli_fetch_assoc($order_details_result)){
						$product_id= $order_details_row['product_id'];
				  ?>
					  <tr>
						<td><?php echo $order_details_row['order_details_id'];?></td>
				<?php $product_rows = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM product WHERE product_id='$product_id'"));	?>
						<td><?php echo $product_rows['product_name'];?></td>
						<td><?php echo $order_details_row['product_quantity'];?></td>
						<td><?php echo "RM ".$order_details_row['product_price'];?></td>
						<td><?php echo "RM ".$order_details_row['sub_total'];?></td>
					  </tr>
			<?php	  
					}
				  }
			?>

				</tbody>
			  </table>
            </div>
          </div>
          </div>
        <!-- End Order Details Card Panel -->
		<!-- Payment History Card Panel -->
		  <div class="payment-section col-xl-8 order-xl-1" id="payment-section">
          <div class="card bg-secondary shadow">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3>Payment History</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
				  <tr>
					<th>Order ID </th>
					<th>Payment Date</th>
					<th>Total Amount </th>
					<th>Payment Method</th>
					<th>Payment Receipt</th>
			      </tr>
				</thead>
				<tbody>
				<?php
				  $payment_result = mysqli_query($connect,"SELECT * FROM payment WHERE customer_id='$user_id'");
				  if(mysqli_num_rows($payment_result)>0){
					while($payment_row = mysqli_fetch_assoc($payment_result)){
				  ?>
					  <tr>
					    <td><?php echo $payment_row['order_id'];?></td>
						<td><?php echo $payment_row['payment_date'];?></td>
						<td><?php echo "RM ".$payment_row['total_amount'];?></td>
						<td><?php echo $payment_row['payment_method'];?></td>
						<td>
						  <form action="Receipt.php?generate&payid=<?php echo $payment_row['payment_id'];?>" method="post">
							<!--input type="hidden" name="edit_id" value=""-->
							<button type="submit" name="details_btn" class="btn btn-success"> View Receipt</button>
						  </form>
						</td>
					  </tr>
					  
			<?php	  
					}
				  }
		  ?>
				</tbody>
			  </table>
            </div>
          </div>
          </div>
       <!-- End Payment History Card Panel -->
		</div>
	  </div>
	</section>
	  <!-- End User Profile Section -->
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
	
	<!-- Edit Porfile Button -->
	<script>
	  function edit_profile(){
		  document.getElementById('user-section').style.display = "block";
		  document.getElementById('order-section').style.display = "none";
		  document.getElementById('payment-section').style.display = "none";
		  document.getElementById('order_details-section').style.display = "none";
		  var hidden_p = document.getElementById("hidden-password");
		  var hidden_f = document.getElementById("hidden-file");
		  if (hidden_p.style.display == "block"){
			hidden_p.style.display = "none";
			document.getElementById("input-lname").setAttribute("readonly","true");
		    document.getElementById("input-fname").setAttribute("readonly","true");
		    document.getElementById("input-email").setAttribute("readonly","true");
		    document.getElementById("input-address").setAttribute("readonly","true");
		    document.getElementById("input-city").setAttribute("readonly","true");
		    document.getElementById("input-state").setAttribute("readonly","true");
		    document.getElementById("input-postcode").setAttribute("readonly","true");
		    document.getElementById("input-contact").setAttribute("readonly","true");
		  } else{
			 hidden_p.style.display = "block";
			 document.getElementById("input-lname").removeAttribute("readonly");
		     document.getElementById("input-fname").removeAttribute("readonly");
		     document.getElementById("input-address").removeAttribute("readonly");
			 document.getElementById("input-city").removeAttribute("readonly");
			 document.getElementById("input-state").removeAttribute("readonly");
			 document.getElementById("input-postcode").removeAttribute("readonly");
		     document.getElementById("input-contact").removeAttribute("readonly");
		  } 
		  if (hidden_f.style.display == "block"){
			  hidden_f.style.display = "none";
			document.getElementById("input-lname").setAttribute("readonly","true");
		    document.getElementById("input-fname").setAttribute("readonly","true");
		    document.getElementById("input-email").setAttribute("readonly","true");
		    document.getElementById("input-address").setAttribute("readonly","true");
		    document.getElementById("input-city").setAttribute("readonly","true");
		    document.getElementById("input-state").setAttribute("readonly","true");
		    document.getElementById("input-postcode").setAttribute("readonly","true");
		    document.getElementById("input-contact").setAttribute("readonly","true");
		  } else{
			 hidden_f.style.display = "block";
			 document.getElementById("input-lname").removeAttribute("readonly");
		     document.getElementById("input-fname").removeAttribute("readonly");
		     document.getElementById("input-address").removeAttribute("readonly");
			 document.getElementById("input-city").removeAttribute("readonly");
			 document.getElementById("input-state").removeAttribute("readonly");
			 document.getElementById("input-postcode").removeAttribute("readonly");
		     document.getElementById("input-contact").removeAttribute("readonly");
		  } 			
		  
	  }
	</script>
	
	<!-- Order Status Button -->
	<script>
	  function showOrder(){
		  document.getElementById('user-section').style.display = "none";
		  document.getElementById('order-section').style.display = "block";
		  document.getElementById('payment-section').style.display = "none";
		  document.getElementById('order_details-section').style.display = "none";
	  }
	</script>
	
	<!-- Payment History Button -->
	<script>
	  function showPayment(){
		  document.getElementById('user-section').style.display = "none";
		  document.getElementById('order-section').style.display = "none";
		  document.getElementById('payment-section').style.display = "block";
		  document.getElementById('order_details-section').style.display = "none";
	  }
	</script>
	
	<!-- More Details Button -->
	<script>
	  function showDetails(){
		  document.getElementById('user-section').style.display = "none";
		  document.getElementById('order-section').style.display = "none";
		  document.getElementById('payment-section').style.display = "none";
		  document.getElementById('order_details-section').style.display = "block";
	  }
	</script>
	

</body>

</html>
<?php
  if(isset($_POST['savebtn']))
  {
    $fname = $_POST['cus_fname'];
	$lname = $_POST['cus_lname'];
    $email = $_POST['cus_email'];
    $contact_no = $_POST['cus_contact_no'];
    $address = $_POST['cus_address'];
	$city = $_POST['cus_city'];
	$state = $_POST['cus_state']; 
	$postcode = $_POST['cus_postcode']; 
    $password = $_POST['cus_password'];
    $confirm_password = $_POST['cus_con_password'];
	$status = $_POST['cus_status'];
	$image = $_POST['cus_img'];
    
	if($password =='' && $confirm_password==''){
		$password = $user_rows['customer_password'];
		$confirm_password = $password;
		if($image ==''){
			$image = $user_rows['customer_profile_image'];
			$query = "UPDATE customer SET customer_fname='$fname',customer_lname='$lname',customer_email='$email',customer_contact_no='$contact_no',customer_address='$address', customer_city='$city', customer_state='$state', customer_postcode='$postcode', customer_password='$password',customer_profile_image='$image' WHERE customer_id='$user_id'";
		}else{
			$query = "UPDATE customer SET customer_fname='$fname',customer_lname='$lname',customer_email='$email',customer_contact_no='$contact_no',customer_address='$address', customer_city='$city', customer_state='$state', customer_postcode='$postcode', customer_password='$password',customer_profile_image='assets/img/userprofilepic/$image' WHERE customer_id='$user_id'";
		}
        $query_run = mysqli_query($connect, $query);
    
        if($query_run)
        {
			//echo "<script type='text/javascript'> alert('$username'); </script>";
			?>
			  <script type="text/javascript">
			  	alert("Your Profile Already Updated");
			  </script>
			  <?php
			  $_SESSION['loggedin'] = true;
			  $_SESSION['email'] = $email;
			  $_SESSION['lastname'] = $lname;
			  $_SESSION['firstname'] = $fname;
			  $_SESSION['contact_no'] = $contact;
			  $_SESSION['address'] = $address;
			  $_SESSION['state'] = $state;
			  $_SESSION['city'] = $city;
			  $_SESSION['postcode'] = $postcode;
			echo "<script type='text/javascript'> document.location = 'userprofile_page.php'; </script>";
        }
        else 
        {
			?>
			  <script type="text/javascript">
			  	alert("Your Profile is Not Updated.");
			  </script>
			  <?php
			echo "<script type='text/javascript'> document.location = 'userprofile_page.php'; </script>";
        }
	}
	else{
		if($password === $confirm_password){
		  if($image ==''){
			$image = $user_rows['customer_profile_image'];
			$query = "UPDATE customer SET customer_fname='$fname',customer_lname='$lname',customer_email='$email',customer_contact_no='$contact_no',customer_address='$address', customer_city='$city', customer_state='$state', customer_postcode='$postcode', customer_password='$password',customer_profile_image='$image' WHERE customer_id='$user_id'";
		  }else{
			$query = "UPDATE customer SET customer_fname='$fname',customer_lname='$lname',customer_email='$email',customer_contact_no='$contact_no',customer_address='$address', customer_city='$city', customer_state='$state', customer_postcode='$postcode', customer_password='$password',customer_profile_image='assets/img/userprofilepic/$image' WHERE customer_id='$user_id'";
		  }
          $query_run = mysqli_query($connect, $query);
    
          if($query_run){
			?>
			  <script type="text/javascript">
			  	alert("Your Profile Already Updated. Please Login Again To Continue");
			  </script>
			  <?php
			  $_SESSION['loggedin'] = true;
			  $_SESSION['email'] = $email;
			  $_SESSION['lastname'] = $lname;
			  $_SESSION['firstname'] = $fname;
			  $_SESSION['contact_no'] = $contact;
			  $_SESSION['address'] = $address;
			  $_SESSION['state'] = $state;
			  $_SESSION['city'] = $city;
			  $_SESSION['postcode'] = $postcode;
			echo "<script type='text/javascript'> document.location = 'logout.php'; </script>";
          }
          else{
			?>
			  <script type="text/javascript">
			  	alert("Your Profile is Not Updated.");
			  </script>
			  <?php
			echo "<script type='text/javascript'> document.location = 'userprofile_page.php'; </script>";
          }
        } 
		else{
		?>
			  <script type="text/javascript">
			  	alert("Password and Confirm Password Does not Match");
			  </script>
			  <?php
		    echo "<script type='text/javascript'> document.location = 'userprofile_page.php'; </script>";
        }
	}
  }

}
?>