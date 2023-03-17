
	<header id="header" class="fixed-top d-flex align-items-cente">
		<div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

			<h1 class="logo me-auto me-lg-0"><a href="homepage.php">Sweet Bakery Shop</a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
			<!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

			<nav id="navbar" class="navbar order-last order-lg-0">
				<ul>
					<li><a class="nav-link scrollto" href="homepage.php#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="homepage.php#about">About</a></li>
					<li><a class="nav-link scrollto" href="homepage.php#menu">Menu</a></li>
					<li><a class="nav-link scrollto" href="homepage.php#gallery">Gallery</a></li>
					<li><a class="nav-link scrollto" href="homepage.php#contact">Contact</a></li>
					<li><a class="nav-link scrollto" href="shoppingcart.php#shopping-cart">Cart</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav><!-- .navbar -->
			<a href="userprofile_page.php" class="book-a-table-btn scrollto d-none d-lg-flex"><?php echo $_SESSION['lastname'];?></a>
			
		</div>
	</header><!-- End Header -->