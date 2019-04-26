<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Titip adalah perusahaan jasa titip yang mempermudah anda. Dengan Titip menjadi lebih mudah.">
	<meta name="author" content="WeeR INDONESIA">
	<link rel="icon" href="<?php echo base_url('assets/home/images/profile/favicon.png') ?>">

	<title>Layanan Jasa Titip - Titipin</title>

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
						<div class="btn-sidebar" onclick="openSideMenu()"><i class="fas fa-bars"></i></div>
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
			<div class="sidenav-content" id="menuSide">
				<a href="javascript:void(0)" class="close-side" onclick="closeSideMenu()"><i class="fas fa-times"></i></a>
				<a href="<?php echo base_url('client/order') ?>" class="link-side">My Order</a>
				<a href="<?php echo base_url('client/account') ?>" class="link-side">My Account</a>
				<hr style="border-color: #fff;">
				<a href="<?php echo base_url() ?>" class="link-side">Shop</a>
				<a href="<?php echo base_url('homepage/news_promo') ?>" class="link-side">News & Promo</a>
				<a href="<?php echo base_url('homepage/how_it_works') ?>" class="link-side">How It Works</a>
				<a href="<?php echo base_url('homepage/our_farmers') ?>" class="link-side">Our Farmers</a>
				<a href="<?php echo base_url('homepage/how_to_pay') ?>" class="link-side">How To Pay</a>
				<a href="<?php echo base_url('homepage/faq') ?>" class="link-side">FAQ</a>
				<a href="<?php echo base_url('homepage/contact_us') ?>" class="link-side">Contact Us</a>
				<a href="<?php echo base_url('homepage/privacy_policy') ?>" class="link-side">Privacy Policy</a>
				<a href="<?php echo base_url('blog') ?>" class="link-side" target="_blank">Blog</a>
				<div class="container" style="margin-top: 25px;">
					<div align="center">
						<a href="" class="btn btn-danger w-100">Logout</a>
						<!-- <a href="<?php echo base_url('client/signup') ?>" class="btn btn-warning">Daftar</a>
						<a href="<?php echo base_url('client/signin') ?>" class="btn btn-primary">Login</a> -->
					</div>
					<div class="side-note">
						If you sign up with Twitter, Facebook, or G+ and give it to us or give us permission to obtain it, you voluntarily give us certain information. This can include your name, email address and profile photo, your public profile. We'll never post to Twitter or Facebook, or G+ without your permission.
					</div>
				</div>
			</div>
		</div>
	</header>

	<main class="container content-area">