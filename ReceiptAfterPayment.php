<?php
session_start();
//include connection file 
include("dataconnection.php");
include("assets/include/fpdf/fpdf.php");
if(isset($_POST['generate'])==false){
	$paymentID = $_SESSION['paymentID'];
	$getPayment = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM payment WHERE payment_id='$paymentID'"));
	$customerID = $getPayment['customer_id'];
	$getCustomer = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM customer WHERE customer_id='$customerID'"));
	$orderID = $_SESSION['orderID'];
	$getDelivery = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM delivery WHERE customer_id='$customerID' AND order_id='$orderID'"));
	$getOrder = mysqli_fetch_assoc(mysqli_query($connect,"SELECT * FROM orders WHERE order_id='$orderID'"));
	$getOrderDetails = mysqli_query($connect,"SELECT * FROM order_details WHERE order_id='$orderID'");

	class PDF extends FPDF
	{
	// Page header
	function Header()
	{
		// Logo
		
		//$this->Image('images/Shop logo.jpg',10,-1,70);
		$this->Ln(5);
		$this->SetFont('Arial','B',20);
		$this->Cell(80,10,'Sweet Bakery Shop',0,0,'L',false);
		$this->Cell(110,10,'RECEIPT',0,1,'R',false);
		$this->SetFont('Arial',false,12);
		$this->Cell(80,5,'Jalan Ayer Keroh Lama,',0,1,'L',false);
		$this->Cell(80,5,'75450 Bukit Beruang, Melaka',0,1,'L',false);
		$this->Ln(5);
		$this->Cell(80,5,'Phone: +60 1300-88-5252',0,1,'L',false);
		$this->Cell(80,5,'Email: fyp.sweetbakeryshop@gmail.com',0,1,'L',false);
		$this->Ln(10);
		// Move to the right
		//$this->Cell(80);
		// Title
		//$this->Cell(80,10,'Product List',1,0,'C');
		// Line break
		
	}

	// Page footer
	function Footer()
	{
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}

	}


	//$db = new dbObj();
	//$connString =  $db->getConnstring();
	$pdf = new PDF();
	//header
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(100,10,'Delievry Details',0,0);
	$pdf->Cell(60,10,'Payment Date',0,0,'R');
	$pdf->SetFont('Arial',false,12);
		$paydate=mysqli_fetch_row(mysqli_query($connect,"SELECT DATE_FORMAT(payment_date,'%Y-%m-%d') AS 'date' FROM payment WHERE order_id='$orderID'"));
	$pdf->Cell(30,10,$paydate[0],0,1,'L');
	//delivery address
	$y=$pdf->GetY(); // Getting Y or vertical position
	$x=$pdf->GetX(); // Getting X or horizontal position
	$pdf->multicell(100,5,$getCustomer['customer_fname']." ".$getCustomer['customer_lname']."\n".$getDelivery['delivery_address']."\n".$getDelivery['delivery_city']."\n".$getDelivery['delivery_postcode']." ".$getDelivery['delivery_state'],1,'L');
	//end of user address
	$pdf->SetXY($x+100,$y);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,10,'Receipt No.',0,0, 'R');
	$pdf->SetFont('Arial',false,12);
	$pdf->Cell(30,10,$getPayment['payment_id'],0,1, 'L');  // Payment ID
	$y=$pdf->GetY(); // Getting Y or vertical position
	$x=$pdf->GetX(); // Getting X or horizontal position
	$pdf->SetXY($x+100,$y);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(60,10,'Order No.',0,0,'R');
	$pdf->SetFont('Arial',false,12);
	$pdf->Cell(30,10,$getPayment['order_id'],0,1, 'L'); // Order ID

	$pdf->Ln(10);
	//order table

	$width_cell=array(100,30,30,30);
	$pdf->SetFillColor(193,229,252); // Background color of header 
	// Header starts /// 
	$pdf->Cell($width_cell[0],10,'Item Description',1,0,'C',true); // First header column 
	$pdf->Cell($width_cell[1],10,'Quantity',1,0,'C',true); // Second header column
	$pdf->Cell($width_cell[2],10,'Unit Price (RM)',1,0,'C',true); // Third header column 
	$pdf->Cell($width_cell[3],10,'Amount (RM)',1,1,'C',true); // Fourth header column
	//// header is over ///////
	if(mysqli_num_rows($getOrderDetails)>0){
		while($orderDetailsRows = mysqli_fetch_assoc($getOrderDetails)){
			$productID = $orderDetailsRows['product_id'];
			$productRows = mysqli_fetch_row(mysqli_query($connect,"SELECT product_name, product_price FROM product WHERE product_id='$productID'"));
			$pdf->Cell($width_cell[0],10,$productRows[0],'LR',0,'L',false); // First column of row 1 
			$pdf->Cell($width_cell[1],10,$orderDetailsRows['product_quantity'],'LR',0,'C',false); // Second column of row 1 
			$pdf->Cell($width_cell[2],10,$orderDetailsRows['product_price'],'LR',0,'R',false); // Third column of row 1 
			$pdf->Cell($width_cell[3],10,$orderDetailsRows['sub_total'],'LR',1,'R',false); // Fourth column of row 1 
		}
		$pdf->Cell($width_cell[0],10,'','LRB',0,'L',false); // First column of end row
		$pdf->Cell($width_cell[1],10,'','LRB',0,'C',false); // Second column of end row
		$pdf->Cell($width_cell[2],10,'','LRB',0,'R',false); // Third column of end row
		$pdf->Cell($width_cell[3],10,'','LRB',1,'R',false); // Fourth column of end row
		$y=$pdf->GetY(); // Getting Y or vertical position
		$x=$pdf->GetX(); // Getting X or horizontal position
		$pdf->SetXY($x+130,$y);
		$pdf->Cell(30,10,'Subtotal  ',0,0,'R');
		$pdf->Cell(30,10,$getOrder['total_price'],1,1,'R');
		$y=$pdf->GetY(); // Getting Y or vertical position
		$x=$pdf->GetX(); // Getting X or horizontal position
		$pdf->SetXY($x+130,$y);
		$pdf->Cell(30,10,'Delivery Fee  ',0,0,'R');
		$pdf->Cell(30,10,'0.00',1,1,'R');
		$y=$pdf->GetY(); // Getting Y or vertical position
		$x=$pdf->GetX(); // Getting X or horizontal position	$pdf->SetXY($x+130,$y+10);
		$pdf->SetXY($x+130,$y);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(30,10,'Total  ',0,0,'R');
		$pdf->Cell(30,10,$getOrder['total_price'],1,1,'R');
		$pdf->Ln(20);
	}else{
		$pdf->Cell($width_cell[0],10,'','LRB',0,'L',false); // First column of row 1 
		$pdf->Cell($width_cell[1],10,'','LRB',0,'C',false); // Second column of row 1 
		$pdf->Cell($width_cell[2],10,'','LRB',0,'R',false); // Third column of row 1 
		$pdf->Cell($width_cell[3],10,'','LRB',1,'R',false); // Fourth column of row 1 
		$y=$pdf->GetY(); // Getting Y or vertical position
		$x=$pdf->GetX(); // Getting X or horizontal position
		$pdf->SetXY($x+130,$y);
		$pdf->Cell(30,10,'Subtotal  ',0,0,'R');
		$pdf->Cell(30,10,'',1,1,'R');
		$y=$pdf->GetY(); // Getting Y or vertical position
		$x=$pdf->GetX(); // Getting X or horizontal position
		$pdf->SetXY($x+130,$y);
		$pdf->Cell(30,10,'Delivery Fee  ',0,0,'R');
		$pdf->Cell(30,10,'',1,1,'R');
		$y=$pdf->GetY(); // Getting Y or vertical position
		$x=$pdf->GetX(); // Getting X or horizontal position	$pdf->SetXY($x+130,$y+10);
		$pdf->SetXY($x+130,$y);
		$pdf->SetFont('Arial','B',14);
		$pdf->Cell(30,10,'Total  ',0,0,'R');
		$pdf->Cell(30,10,'',1,1,'R');
		$pdf->Ln(20);
	}
	//end of table
	//check notes
	if($getOrder['notes']!=''){
		$pdf->SetFont('Arial','BU',12);
		$pdf->Cell(100,10,'Notes',0,2,'L');
		$pdf->SetFont('Arial',false,12);
		$pdf->multicell(100,5,$getOrder['notes'],0,'L');
	}else{
		
	}




	$pdf->Output('receipt.pdf','I');
}
?>

