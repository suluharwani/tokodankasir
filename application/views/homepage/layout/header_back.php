<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Titip adalah perusahaan jasa titip yang mempermudah anda. Dengan Titip menjadi lebih mudah.">
	<meta name="author" content="WeeR INDONESIA">
	<link rel="icon" href="<?php echo base_url('assets/home/images/profile/favicon.png') ?>">

	<title>Layanan Jasa Titip - Titipin</title>

	<script src="<?php echo base_url('assets/home/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/home/js/jquery.js') ?>"></script>
	<link href="<?php echo base_url('assets/home/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/home/css/all.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/home/css/style.css') ?>" rel="stylesheet">

</head>
<body>
	<header class="fixed-top">
		<nav class="nav bg-white shadow-sm p-2 mb-5 nav-custome">
			<div class="container">
				<div class="row">
					<div class="col-3" align="left">
						<div class="btn-sidebar" onclick="backPage();"><i class="far fa-arrow-alt-circle-left"></i></div>
					</div>
					<div class="col-6" align="center" style="margin-top: -3px;">
						<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/home/images/profile/logo.png') ?>" class="img-fluid" width="100"></a>
					</div>
					<div class="col-3" align="right">
						<a class="text-warning" href="#"><i class="far fa-comment-dots"></i></a>
					</div>
				</div>
			</div>
		</nav>

		<div class="sidenav" id="sideContainer">
			<div id="checkoutSide" class="side-checkout">
				<a href="javascript:void(0)" class="close-checkout" onclick="closeCheckout()"><i class="far fa-arrow-alt-circle-left"></i> <span style="margin-left: 50px;">Keranjang Belanja</span></a>
				<div class="container detail-checkout">
					<div class="row" style="margin-bottom: 15px;">
						<div class="col-9 text-secondary">
							<b>Area Pengiriman</b><br>
							<span>Palu Timur</span><br>
							<b>Waktu Pengiriman</b><br>
							<span>Besok</span>
						</div>
						<div class="col-3" align="right">
							<a href="#gantiArea" class="btn-area text-secondary" data-toggle="modal" data-target="#gantiArea"><h3><i class="far fa-edit"></i></h3></a>
						</div>
					</div>
					<ul class="list-group list-group-flush" style="margin-bottom: 70px;">
						<x id="show_chart">
					</ul>
				</div>
				<div class="bg-light checkout-area shadow-sm p-2 mb-5">
					<div class="container">
						<div class="row" style="margin-top: 5px; margin-bottom: -5px;">
							<div class="col-2" style="font-size: 25px;">
								<sss id="total_items_c">
							</div>
							<div class="col-6" style="margin-top: 10px;">
								<div class="text-danger"><small><b><span id="total_beli"></span> </b></small></div>
							</div>
							<div class="col-4" align="right" style="margin-top: 8px;">
								<button type="button" id="btn_checkout_a" class="btn btn-sm btn-warning">Checkout</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<main class="container">