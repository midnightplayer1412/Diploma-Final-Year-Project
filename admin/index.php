<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!--a href="../assets/include/pdf.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a-->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Total)</div>
			  <?php $total = mysqli_fetch_assoc(mysqli_query($connect,"SELECT sum(total_amount) FROM payment")); ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800">RM <?php echo $total['sum(total_amount)'];?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Delivery</div>
			  <?php $pending = mysqli_fetch_assoc(mysqli_query($connect,"SELECT COUNT(order_status) AS 'paysus' FROM orders WHERE order_status='PAYMENT SUCCESSFUL'")); ?>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pending['paysus'];?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
	<br>
	<hr>
  <div class="container-fluid">
	<!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sales</h1>
  </div>
  
  <?php
  $query="SELECT DATE_FORMAT(payment_date,'%Y-%m') AS 'month', sum(total_amount) AS 'total' FROM payment GROUP BY month";
  $result = mysqli_query($connect, $query);
  if(mysqli_num_rows($result)>0){
	  $count = 0;
	  while($rows = mysqli_fetch_assoc($result)){
		  if ($count == 0){
			echo "<div class='row'>";
		  }
		  ?>
		 <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (<?php echo $rows['month'];?>)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">RM <?php echo $rows['total'];?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php
		$count++;
		if($count==4){
		  echo "</div>";
		  $count=0;
		}
	  }
  }
?>
  </div>



  <?php
include('includes/admin_scripts.php');
include('includes/footer.php');
?>