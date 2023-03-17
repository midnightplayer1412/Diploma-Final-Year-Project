<?php

  if(isset($_POST['submit'])){
	  
	if(isset($_POST['expmonth'])&&($_POST['expmonth'])=='00'){
		echo "<script type='text/javascript>alert ('\u2022 Expiry month and year cannot be blank/Expiry month and year is before today month and year.');</script>";
	}else{
		date_default_timezone_set('Asia/Kuala_Lumpur');
	  
		//Update Delivery Database
		$insertDeliveryDB = mysqli_query($connect,"INSERT INTO delivery(order_id, customer_id, delivery_address, delivery_city, delivery_state, delivery_postcode, customer_contact_no, remark) VALUES ('".$_SESSION['orderID']."', '".$_SESSION['ID']."', '".$_SESSION['deliveryAddress']."', '".$_SESSION['deliveryCity']."', '".$_SESSION['deliveryState']."', '".$_SESSION['deliveryPostcode']."', '".$_SESSION['deliveryContact']."', '".$_SESSION['deliveryNotes']."')");
		$insertPaymentDB = mysqli_query($connect,"INSERT INTO payment(customer_id, total_amount, payment_method, order_id, payment_date) VALUES ('".$_SESSION['ID']."', '".$_SESSION['total_price']."', '".$_SESSION['paymentMethod']."', '".$_SESSION['orderID']."', '".date("Y-m-d h:i:sa")."')");
		$updateOrderStatus = mysqli_query($connect,"UPDATE orders SET order_status='PAYMENT SUCCESSFUL'");
		$getPaymentID = mysqli_fetch_row(mysqli_query($connect, "SELECT payment_id FROM payment WHERE order_id='".$_SESSION['orderID']."'"));
		$_SESSION['paymentID'] = $getPaymentID[0];
		if(isset($insertDeliveryDB)&& isset($insertPaymentDB) && isset($updateOrderStatus)){
			$to_email = $_SESSION['email'];
			$subject = "Sweet Bakery Shop Website Payment Details";
			$body = "Hi ".$_SESSION['lastname']." ,

	We are pleased to inform you that we have received your payment.
	
	Your Order ID is ".$_SESSION['orderID']." .
	
	We will be in touch with you shortly, Your can check the order status at our website user profile page. 
	
	Thank you. 

	";

			$headers = "From: fyp.sweetbakeryshop@gmail.com";
			mail($to_email, $subject, $body, $headers);
			echo "<script type='text/javascript'>
			  document.location = 'success-page.php';
			 </script>";
		}
	}

	

  }

?>