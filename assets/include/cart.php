<?php
  
  if(isset($_POST['add'])){
	$prod_id = $_POST['hidden_PID'];
	$prod_price = $_POST['hidden_price'];
	$prod_quantity = $_POST['quantity'];
	$sub_total = $prod_quantity * $prod_price;
	
	$checkOrderID = mysqli_query($connect,"SELECT * FROM orders WHERE customer_id=".$_SESSION['ID']." AND order_status='PENDING'");
	// The order ID already EXIST
	if(mysqli_num_rows($checkOrderID)>0){
		$ordersRow = mysqli_fetch_assoc($checkOrderID);
		$orderID = $ordersRow['order_id'];
		$checkProdID = mysqli_query($connect, "SELECT * FROM order_details WHERE order_id ='$orderID' AND product_id='$prod_id'");
		$checkProdIDRows = mysqli_fetch_assoc($checkProdID);
		// Check Duplication Product
		if(mysqli_num_rows($checkProdID)>0){
			$newProdQty = $checkProdIDRows['product_quantity'] + $prod_quantity;
			$newProdSubPrice = $newProdQty * $checkProdIDRows['product_price'];
			$updateOrderDetails = mysqli_query($connect, "UPDATE order_details SET product_quantity='$newProdQty', sub_total='$newProdSubPrice' WHERE order_id='$orderID' AND product_id='$prod_id'");
			$newQtyForOrder = $prod_quantity + $ordersRow['order_total'];
			$updateOrders = mysqli_query($connect, "UPDATE orders SET order_total='$newQtyForOrder', total_price='$newProdSubPrice' WHERE order_id='$orderID'");
			if(isset($updateOrderDetails)){
				echo"<script type='text/javascript'>alert('Product Added Successfully'); </script>";
			}else{
				echo"<script type='text/javascript'>alert('Product Not Added Into Cart'); </script>";
			}
		}else{
			$newQtyForOrder = $prod_quantity + $ordersRow['order_total'];
			$newSubForOrder = $sub_total + $ordersRow['total_price'];
			$updateOrders = mysqli_query($connect, "UPDATE orders SET order_total='$newQtyForOrder', total_price='$newSubForOrder' WHERE order_id='$orderID'");
			$addProdcutToOrder_details = mysqli_query($connect,"INSERT INTO order_details(order_id, product_id, product_quantity, product_price, sub_total) VALUE ('".$ordersRow['order_id']."', '$prod_id', '$prod_quantity', '$prod_price', '$sub_total')");
			if(isset($addProdcutToOrder_details)){
				echo"<script type='text/javascript'>alert('Product Added Successfully'); </script>";
			}else{
				echo"<script type='text/javascript'>alert('Product Not Added Into Cart'); </script>";
			}
		}
		
	}
	//The order ID is not EXIST
	else{
		$order_id = date("mdhi").$_SESSION['ID'];
		$order_date = date("Y-m-d");
		
		$addProductToOrders = mysqli_query($connect,"INSERT INTO orders(order_id, customer_id, order_date, order_total, total_price) VALUE ('$order_id', '".$_SESSION['ID']."', '$order_date', '$prod_quantity', '$sub_total')");
		//$ordersRow = mysqli_fetch_assoc($checkOrderID);
		//$newQtyForOrder = $prod_quantity + $ordersRow['order_total'];
		//$newSubForOrder = $newProdSubPrice + $ordersRow['total_price'];
		$addProdcutToOrder_details = mysqli_query($connect,"INSERT INTO order_details(order_id, product_id, product_quantity, product_price, sub_total) VALUE ('$order_id', '$prod_id', '$prod_quantity', '$prod_price', '$sub_total')");
		//$addProductToOrders = mysqli_query($connect,"UPDATE orders SET order_date='$order_date', order_total='$newQtyForOrder', total_price='$newSubForOrder' WHERE order_id='$order_id' AND customer_id='".$_SESSION['ID']."'");
		if(isset($addProdcutToOrder_details)&&isset($addProductToOrders)){
			echo"<script type='text/javascript'>alert('Product Added Successfully'); </script>";
		}else{
			echo"<script type='text/javascript'>alert('Product Not Added Into Cart'); </script>";
		}
	}
	  
  }



?>