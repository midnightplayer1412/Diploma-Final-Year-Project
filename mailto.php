
<?php
if(isset($_POST['emailbtn'])){
	$to_email = $_POST['getEmail'];
	$subject = "Reset Password for Sweet Bakery Shop Website";
	$body = "Hi,

	There was a request to change your password!

	If you did not make this request then please ignore this email.

	Otherwise, please click this link to change your password: 
	
	[C:\xampp\htdocs\FYP_latest\reset-password.php]";

	$headers = "From: fyp.sweetbakeryshop@gmail.com";

	 
	if (mail($to_email, $subject, $body, $headers)) {
		echo "<script type='text/javascript'>
			  	alert('Email successfully sent to ".$to_email." ... ');
			  </script>";
		echo "<script type='text/javascript'> document.location = 'login_page.php'; </script>";
	} else {
		echo "<script type='text/javascript'>
			  	alert('Email sending failed...');
			  </script>";
		echo "<script type='text/javascript'> document.location = 'login_page.php'; </script>";	  
	}
}
?>