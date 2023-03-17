<?php
session_start();
include"dataconnection.php";

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false){
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

  <title>Final Year Project - Cart Page</title>
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

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/shoppingcart_style.css" rel="stylesheet">
  
  <!-- JavaScript File -->
  <script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>

  
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

  </section><!-- End Hero -->

  <main id="main">
	<section class="shopping-cart" id="shopping-cart">
	  <div class="container">
	    <b>
	      <div class="txt-heading">
		    <h1><center>Your Shopping Cart<center><h1>
		    <h2><center>Looks tasty...!!!<center><h2>
			<div class="table-area">
			<?php
			  $ordersResult = mysqli_query($connect,"SELECT * FROM orders WHERE customer_id='".$_SESSION['ID']."' AND order_status='PENDING'");
			  $ordersRows = mysqli_fetch_assoc($ordersResult);
			  if(mysqli_num_rows($ordersResult)==0){
			?>
				<div class="button">
				  <a href ="homepage.php#menu"><input type="submit" value="Continue Shopping" class="btn btn-success" name="continue shopping"></a>
				</div>
			<?php
			  }else{
				  $result = mysqli_query($connect,"SELECT * FROM order_details WHERE order_id=".$ordersRows['order_id']);
				  if(mysqli_num_rows($result)>0){
			?>
			  <!--form method="POST"--> 
				<div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
				  <table class="table table-striped">
					<thead>
					  <tr>
					    <th>Food Image</th>
						<th>Food Name</th>
						<th>Quantity</th>
						<th>Price Details</th>
						<th>Total Price</th>
						<th>Remove</th>
					  </tr>
					</thead>
					<tbody>
					<?php 
					
					  while($ordDetailsRows=mysqli_fetch_assoc($result)){
					    $productID = $ordDetailsRows['product_id'];
					    $productRows = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM product WHERE product_id='$productID'"));
					?>
					<form action="shoppingcart.php?del&prodid=<?php echo $ordDetailsRows['order_details_id'];?>" method="post">
					  <tr>
					    <td><img src="<?php echo $productRows['product_image']?>" class="cart-item-image"/></td>
						<td><?php echo $productRows['product_name']?></td>
					    <td><?php echo $ordDetailsRows['product_quantity'];?></td>
						  <input type="hidden" name="hidden_quantity" value="<?php echo $ordDetailsRows['product_quantity'];?>">
					    <td><?php echo "RM ".$productRows['product_price'];?></td>
					    <td><?php echo "RM ".$ordDetailsRows['sub_total'];?></td>
						  <input type="hidden" name="hidden_subtotal" value="<?php echo $ordDetailsRows['sub_total'];?>">
					    <td>
					      <input type="submit" name="delete_btn" class="btn btn-danger" onclick="return confirmation()" value="REMOVE">
						</td>
					  </tr>
					</form>
			<?php
					}
			?>
					</tbody>
				  </table>
				</div>
				<form method="POST">
				  <input type="submit" value="CHECKOUT" class="btn btn-success" name="checkout">
				</form>
			<?php
					}
					
			  }
			  if(isset($_POST['checkout'])){
				echo "<script type='text/javascript'> document.location = 'checkout.php'; </script>";
			  }
			?>
	      </div>
	    </b>
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
  
  <script type="text/javascript">	
	function confirmation()
	{
		answer = confirm("Do you want to remove this product? ");
		return answer;
	}
	
		$('.minus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value > 1) {
    			value = value - 1;
    		} else {
    			value = 1;
    		}

        $input.val(value);

    	});

    	$('.plus-btn').on('click', function(e) {
    		e.preventDefault();
    		var $this = $(this);
    		var $input = $this.closest('div').find('input');
    		var value = parseInt($input.val());

    		if (value < 100) {
      		value = value + 1;
    		} else {
    			value =1;
    		}

    		$input.val(value);
    	});
	 
  </script>
  
  
  <?php
    if(isset($_GET['del'])){
	  $ordDetailsID = $_GET['prodid'];
	  mysqli_query($connect,"DELETE FROM order_details WHERE order_details_id=$ordDetailsID");
	  $getOrderRows =  mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM orders WHERE customer_id='".$_SESSION['ID']."' AND order_status='PENDING'"));
	  $newOrderTotal = $getOrderRows['order_total'] - $_POST['hidden_quantity'];
	  $newOrderPrice = $getOrderRows['total_price'] - $_POST['hidden_subtotal'];
	  $updateOrders = mysqli_query($connect, "UPDATE orders SET order_total='$newOrderTotal', total_price='$newOrderPrice' WHERE customer_id='".$_SESSION['ID']."' AND order_status='PENDING'");
	  if(isset($updateOrders)){
		  echo "<script type='text/javascript'> alert('The Cart List is Updated') </script>";
		  echo "<script type='text/javascript'> document.location = 'shoppingcart.php'; </script>";
	  }else{
		  echo "<script type='text/javascript'> alert('The Cart List is Not Updated') </script>";
	  }
	  
	}

	
	
  ?>

</body>

</html>

<?php
}

?>