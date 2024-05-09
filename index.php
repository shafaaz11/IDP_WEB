<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/lib/Session.php";
Session::init();



spl_autoload_register(function($classes){

  include 'classes/'.$classes.".php";

});


$users = new Users();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
	// Session::set('logout', '<div class="alert alert-success alert-dismissible mt-3" id="flash-msg">
	// <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	// <strong>Success !</strong> You are Logged Out Successfully !</div>');
	Session::destroy();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Borneo Store</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/styles/bootstrap4/bootstrap.min.css">
<link href="assets/Coloshop/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/styles/responsive.css">
</head>

<body>
<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav" style="background-color: #6777ef;">
			<div class="container" >
				<div class="row" >
					<div class="col-md-6" >
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->
								<li class="account"  style="background-color: #6777ef;">
								<?php if (Session::get('id') == TRUE) { ?>
									<?php if (Session::get('roleid') == '1') { ?>
									<a href="#">
										Data Akun Saya    
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
									<li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
									<li><a href="vieworder.php"><i class="fa fa-history" aria-hidden="true"></i>Order History</a></li>
									<li><a href="?action=logout"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
									<?php  } ?>
									<?php } ?>
								<?php if (Session::get('id') == TRUE) { ?>
									<?php if (Session::get('roleid') == '2') { ?>
										<a href="#">
										Data Akun Saya
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
									<li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
									<li><a href="vieworder.php"><i class="fa fa-history" aria-hidden="true"></i>Order History</a></li>
									<li><a href="?action=logout"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
									<?php  } ?>
								<?php } else {?>
									<a href="#">
										Daftar Sekarang !
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
									<li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
									<li><a href="daftar.php"><i class="fa fa-user-plus" aria-hidden="true"></i>daftar</a></li>
									<?php } ?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="index.php">Borneo<span>Store</span></a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
							<li><a href="index.php">home</a></li>
							<li ><a href="#shop">shop</a></li>
							</ul>
							<ul class="navbar_user">
							<?php if (Session::get('id') == TRUE) { ?>
									<?php if (Session::get('roleid') == '1') { ?>
									<li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i></a></li>
									<?php  } ?>
									<?php } ?>
								<?php if (Session::get('id') == TRUE) { ?>
									<?php if (Session::get('roleid') == '2') { ?>
									<li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i></a></li>
									<?php  } ?>
								<?php }?>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<li class="menu_item has-children">
				<?php if (Session::get('id') == TRUE) { ?>
									<?php if (Session::get('roleid') == '1') { ?>
									<a href="#">
										Data Akun Saya
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="menu_selection">
									<li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
									<li><a href="vieworder.php"><i class="fa fa-history" aria-hidden="true"></i>Order History</a></li>
									<li><a href="?action=logout"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
									<?php  } ?>
									<?php } ?>
								<?php if (Session::get('id') == TRUE) { ?>
									<?php if (Session::get('roleid') == '2') { ?>
										<a href="#">
										Data Akun Saya
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="menu_selection">
									<li><a href="dashboard.php"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a></li>
									<li><a href="vieworder.php"><i class="fa fa-history" aria-hidden="true"></i>Order History</a></li>
									<li><a href="?action=logout"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a></li>
									<?php  } ?>
								<?php } else {?>
									<a href="#">
										Daftar Sekarang !
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="menu_selection">
									<li><a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
									<li><a href="daftar.php"><i class="fa fa-user-plus" aria-hidden="true"></i>daftar</a></li>
									<?php } ?>
									</ul>
				</li>
				<li class="menu_item"><a href="index.php">home</a></li>
				<li class="menu_item"><a href="#shop">shop</a></li>
			</ul>
		</div>
	</div>

	<!-- Slider -->

	<div class="main_slider">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Selamat Berbelanja</h6>
						<h1>Semua jadi lebih mudah berbelanja di borneo store</h1>
						<div class="red_button shop_now_button"><a href="#shop">beli sekarang</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Daftar Produk</h2>
					</div>
				</div>
			</div>
			<div id="shop" class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">Semua</li>
							<?php
							$allUser = $users->selectAllProductByCtegory();
							if ($allUser) {
								foreach ($allUser as  $value) {
							?>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".<?php echo $value->kategori; ?>"><?php echo $value->kategori; ?></li>
							<?php }}else{ ?>
							<tr class="text-center">
							<h1>Tidak Ada Produk Yang Tersedia</h1>
							</tr>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>
						<?php
						$allUser = $users->selectAllProduct();

						if ($allUser) {
						foreach ($allUser as  $value) {

						?>
						<!-- Product 1 -->
						<div class="product-item <?php echo $value->kategori; ?>">
							<div class="product discount product_filter">
								<div class="product_image">
								<?php echo '<img src=',$value->fldimage,' height="235" width="235" >'; ?>
								</div>
								<div class="product_info">
									<h6 class="product_name"><a href="productDetail.php?id=<?php echo $value->product_id;?>"><?php echo $value->namaproduk; ?></a></h6>
									<div class="product_price"><?php echo "Rp. ". number_format($value->harga); ?></div>
								</div>
							</div>
							<div class="red_button add_to_cart_button"><a href="productDetail.php?id=<?php echo $value->product_id;?>">Beli</a></div>
						</div>

						<?php }}else{ ?>
						<tr class="text-center">
						<h1>Tidak Ada Produk Yang Tersedia</h1>
						</tr>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>


<script src="assets/Coloshop/js/jquery-3.2.1.min.js"></script>
<script src="assets/Coloshop/styles/bootstrap4/popper.js"></script>
<script src="assets/Coloshop/styles/bootstrap4/bootstrap.min.js"></script>
<script src="assets/Coloshop/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="assets/Coloshop/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="assets/Coloshop/plugins/easing/easing.js"></script>
<script src="assets/Coloshop/js/custom.js"></script>
</body>

</html>
