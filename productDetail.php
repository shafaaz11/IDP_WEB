<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath."/lib/Session.php";
Session::init();



spl_autoload_register(function($classes){

include 'classes/'.$classes.".php";

});


$users = new Users();

?>
		<?php

if (isset($_GET['id'])) {
$userid = preg_replace('/[^a-zA-Z0-9-]/', '', (int)$_GET['id']);

}




?>
	<?php
	$getProduknfo = $users->getProductInfoById($userid);
	if ($getProduknfo) {


	?>

		<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $getProduknfo->namaproduk; ?> Borneo Store</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/styles/bootstrap4/bootstrap.min.css">
<link href="assets/Coloshop/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="assets/Coloshop/plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="assets/Coloshop/styles/single_responsive.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/css/intlTelInput.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/intlTelInput.js"></script>  
	<script>
	$(function () {
	$("#phone").intlTelInput({
			autoHideDialCode: true,
			autoPlaceholder: true,
			separateDialCode: true,
			nationalMode: true,
			geoIpLookup: function (callback) {
				$.get("http://ipinfo.io", function () {}, "jsonp").always(function (resp) {
					var countryCode = (resp && resp.country) ? resp.country : "";
					callback(countryCode);
				});
			},
			initialCountry: "auto",
		});

		// get the country data from the plugin
		var countryData = $.fn.intlTelInput.getCountryData(),
		telInput = $("#phone"),
		addressDropdown = $("#listcountry");

		// init plugin
		telInput.intlTelInput({
		utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.5.0/js/utils.js" // just for formatting/placeholders etc
		});

		// populate the country dropdown
		$.each(countryData, function(i, country) {
		addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
		});

		// listen to the telephone input for changes
		telInput.on("countrychange", function() {
		var countryCode = telInput.intlTelInput("getSelectedCountryData").iso2;
		addressDropdown.val(countryCode);
		});

		// trigger a fake "change" event now, to trigger an initial sync
		telInput.trigger("countrychange");

		// listen to the address dropdown for changes
		addressDropdown.change(function() {
		var countryCode = $(this).val();
		telInput.intlTelInput("setCountry", countryCode);
		});

		// update the hidden input on submit
		$("form").submit(countryData,function(i, country) {
		$("#country").val(telInput.intlTelInput("getSelectedCountryData").name);
		$("#phonefull").val('+' + telInput.intlTelInput("getSelectedCountryData").dialCode + $("#phone").val());      
		});

	});
	</script>

	<style>
		.red_button {
			background-color: red;
			color: white;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
			border-radius: 5px;
			font-weight: bold;
		}

		.green_button {
			background-color: green;
			color: white;
			border: none;
			padding: 10px 20px;
			cursor: pointer;
			border-radius: 5px;
			font-weight: bold;
		}


		.add_to_cart_button {
			margin-top: 20px;
		}
	</style>

</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav" style="background-color: #6777ef;">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left"></div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- Currency / Language / My Account -->
								<li class="account" style="background-color: #6777ef;">
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
										Daftar sekarang !
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
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="menu_selection">
									<li><a href="dashboard.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Dashboard</a></li>
									<?php  } ?>
									<?php } ?>
								<?php if (Session::get('id') == TRUE) { ?>
									<?php if (Session::get('roleid') == '2') { ?>
										<a href="#">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="menu_selection">
									<li><a href="dashboard.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Dashboard</a></li>
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
			</ul>
		</div>
	</div>

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $getProduknfo->kategori; ?></a></li>
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $getProduknfo->namaproduk; ?></a></li>
					</ul>
				</div>

			</div>
		</div>
		

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-9 image_col">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(<?php echo $getProduknfo->fldimage; ?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
	<div class="product_details">
		<div class="product_details_title">
			<h2><?php echo $getProduknfo->namaproduk; ?></h2>
		</div>
		<br>
		<div class="product_price">Rp. <?php echo number_format($getProduknfo->harga); ?></div>
		<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
			<span>Penjual : <b><?php echo $getProduknfo->penjual; ?></b></span>
			<?php if ($getProduknfo->stok == "Tersedia") { ?>
				<button type="button" class="green_button add_to_cart_button" data-toggle="modal" data-target=".bd-example-modal-lg">Beli Sekarang</button>
			<?php } else { ?>
				<button type="button" class="red_button add_to_cart_button" disabled>Stok Habis</button>
			<?php } ?>
		</div>
	</div>
</div>

		</div>

	</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<?php 
			if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
				$order = $users->AddOrder($_POST);
			}
			
			if (isset($order)) {
				echo $order;
			}
	?>
	<div class="modal-body">

	<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-9 image_col">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(<?php echo $getProduknfo->fldimage; ?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?php echo $getProduknfo->namaproduk; ?></h2>
						<p><?php echo substr($getProduknfo->deskripsi,0,300); ?>...</p>
					</div>
					<br>
					<div class="product_price">Rp. <?php echo number_format($getProduknfo->harga); ?></div>
				</div>
			</div>
		</div>

		<br><br>

					<form action="" method="post" enctype="multipart/form-data">
						<div>
							<input type="hidden" name="penjual" value="<?php echo $getProduknfo->penjual; ?>" class="form-control">

							<input type="hidden" name="nproduk" value="<?php echo $getProduknfo->namaproduk; ?>" class="form-control">

							<input name="npembeli" id="wa_name" class="form_input input_email input_ph" type="text" placeholder="Nama" required="required" data-error="Valid email is required.">

							<input name="no_pembeli" id="wa_email" class="form_input input_name input_ph" type="number" placeholder="No.Wa Aktif" required="required" data-error="Name is required.">
							<label>Tambahkan Kode Nomor Negara Cth : 62xxxxx</label>

							<input name="jumlah" id="jumlah" class="form_input input_email input_ph" type="number" placeholder="Jumlah Beli" required="required" data-error="Valid email is required.">
							
							<textarea name="alamat" id='wa_textarea' class="form_input input_name input_ph" placeholder='Alamat Lengkap' row='1' required=""></textarea>
							
							<input type="hidden" id="totalsemua" name="total" class="form-control">

							<input type="hidden" name="status" value="Proses" class="form-control">
							</div>
							<br><br>
							<input name="add" id="send_form" class="red_button message_submit_btn trans_300" href="javascript:void" type="submit" title="Beli Lewat Whatsap" value="Beli Lewat Whatsapp"></input>
					</form>
	</div>
	</div>
</div>
</div>
	<!-- Tabs -->

	<div class="tabs_section_container">

		<div class="container">
			<div class="row">
				<div class="col">
					<div id="description" class="tabs_container">
				
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">

					<!-- Tab Description -->

	<div id="tab_1" class="tab_container active">
						<div class="row">
							<div class="col-lg-5 desc_col">
								<div class="tab_title">
									<h4>Description</h4>
								</div>
								<?php echo nl2br($getProduknfo->deskripsi); ?>
							</div>
						</div>
					</div>


						</div>
					</div>

				</div>
			</div>
		</div>

	</div>


	
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script type="text/javascript">
$(document).on('click','#send_form', function(){
var input_blanter = document.getElementById('wa_email');

/* Whatsapp Settings */
var walink = 'https://web.whatsapp.com/send',
	phone = '<?php echo $getProduknfo->notlp; ?>',
	nproduct = '<?php echo $getProduknfo->namaproduk; ?>',
	harga = '<?php echo $getProduknfo->harga; ?>',
	jumlah = document.getElementById("jumlah").value,
	walink2 = 'Halo saya ingin membeli',
	text_yes = 'Terkirim.',
	text_no = 'Isi semua Formulir lalu klik Send.';
	hasil = harga * jumlah;
	var subtotal = 'Rp. ' + hasil.toLocaleString();
	document.getElementById("totalsemua").value = subtotal;
	var hargaori = "<?php echo number_format($getProduknfo->harga,2,",","."); ?>";

/* Smartphone Support */
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
var walink = 'whatsapp://send';
}

if("" != input_blanter.value){

/* Call Input Form */
var input_name1 = $("#wa_name").val(),
	input_email1 = $("#wa_email").val(),
	input_textarea1 = $("#wa_textarea").val();

/* Final Whatsapp URL */
var contact_whatsapp = walink + '?phone=' + phone + '&text=' + walink2 + '%0A%0A' +
	'=============='+ '%0A' +
	'Detail Pemesanan'+ '%0A' +
	'=============='+ '%0A' +
	'|| *Nama Produk* : ' + nproduct + '%0A' +
	'|| *Harga* : Rp. ' + hargaori + '%0A' +
	'|| *Jumlah* : ' + jumlah + '%0A' +
	'|| *Total* : ' + subtotal + '%0A' +
	'==============='+ '%0A' +
	'Detail Customer'+ '%0A' +
	'==============='+ '%0A' +
	'|| *Name* : ' + input_name1 + '%0A' +
	'|| *Email Address* : ' + input_email1 + '%0A' +
	'|| *Alamat* : ' + input_textarea1 + '%0A';

/* Whatsapp Window Open */
window.open(contact_whatsapp,'_blank');
document.getElementById("text-info").innerHTML = '<span class="yes">'+text_yes+'</span>';
} else {
document.getElementById("text-info").innerHTML = '<span class="no">'+text_no+'</span>';
}
});
</script>
<script>//<![CDATA[
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
if (event.target == modal) {
	modal.style.display = "none";
}
}
//]]>      
</script>
<?php }else {
	echo "Produk Telah Dihapus Atau Tidak Ada";
} ?>
<script src="assets/Coloshop/styles/bootstrap4/popper.js"></script>
<script src="assets/Coloshop/styles/bootstrap4/bootstrap.min.js"></script>
<script src="assets/Coloshop/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="assets/Coloshop/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="assets/Coloshop/plugins/easing/easing.js"></script>
<script src="assets/Coloshop/plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="assets/Coloshop/js/single_custom.js"></script>
</body>

</html>
