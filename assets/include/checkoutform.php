<?php

  if(isset($_POST['submit'])){
	$_SESSION['deliveryAddress']= $_POST['address'];
	$_SESSION['deliveryCity']= $_POST['city'];
	$_SESSION['deliveryState']= $_POST['state'];
	$_SESSION['deliveryPostcode']= $_POST['postcode'];
	$_SESSION['deliveryFName']= $_POST['fname'];
	$_SESSION['deliveryLName']= $_POST['lname'];
	$_SESSION['deliveryContact']= $_POST['contact'];
	$_SESSION['deliveryEmail']= $_POST['email'];
	$_SESSION['deliveryNotes']= $_POST['notes'];
	$_SESSION['paymentMethod']= $_POST['payment'];
	
	$getOrderID = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM orders WHERE customer_id=".$_SESSION['ID']." AND order_status='PENDING'"));
	$_SESSION['orderID'] = $getOrderID['order_id'];
	$updateOrders = mysqli_query($connect,"UPDATE orders SET order_total='$order_total', total_price='$sub_total', notes='".$_POST['notes']."' WHERE order_id='".$_SESSION['orderID']."'");
	echo "<script type='text/javascript'>
			document.location = 'payment.php';
		 </script>";
  }

?>