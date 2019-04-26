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
		<nav class="nav bg-white nav-custome">
			<div class="container">
				<!-- Header Web -->
				<div class="row" id="nav-web">
					<div class="col-1" align="right">
						<div class="btn-sidebar" onclick="openSideMenu()"><i class="fas fa-bars"></i></div>
					</div>
					<div class="col-2" style="margin-top: -3px;">
						<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/home/images/profile/logo.png') ?>" class="img-fluid"></a>
					</div>
					<div class="col-8">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Cari sayuran dan buah segar disini...">
							<div class="input-group-append">
								<button class="btn btn-outline-warning" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
					<div class="col-1">
						<a class="text-warning" href="#"><i class="far fa-comment-dots"></i></a>
					</div>
				</div>

				<!-- Header Mobile -->
				<div class="row" id="nav-mobile">
					<div class="col-1" style="margin-top: -5px;">
						<div class="btn-sidebar" onclick="openSideMenu()"><i class="fas fa-bars"></i></div>
					</div>
					<div class="col-10" style="margin-right: -20px">
						<div class="input-group mb-3">
							<input type="text" class="form-control form-control-sm" placeholder="Cari sayuran dan buah segar disini...">
							<div class="input-group-append">
								<button class="btn btn-sm btn-outline-warning" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
							</div>
						</div>
					</div>
					<div class="col-1" align="left" style="margin-top: -5px;">
						<a class="text-warning" href="#"><i class="far fa-comment-dots"></i></a>
					</div>
				</div>
			</div>
		</nav>
		<div class="bg-light shadow-sm p-2 mb-5 area">
			<a href="#gantiArea" class="btn-area" data-toggle="modal" data-target="#gantiArea">
				<div class="container" align="center">
					<div class="text-warning">Ganti area dan tanggal pengiriman</div>
					<div class="text-dark">Kota Palu - Kamis, 3 Januari 2019 <i class="fas fa-caret-down"></i></div>
					<div style="margin-top: 5px;"><span class="badge badge-pill badge-warning"><i class="fas fa-exclamation-circle"></i> GRATIS ONGKIR!! Untuk pembelian minimum Rp. 100.000</span></div>
				</div>
			</a>
		</div>

		<!-- Sidenav Menu -->
		<div class="sidenav" id="sideContainer">
			<div class="sidenav-content" id="menuSide">
				<a href="javascript:void(0)" class="close-side" onclick="closeSideMenu()"><i class="fas fa-times"></i></a>
				<!-- <a href="<?php echo base_url('client/order') ?>" class="link-side">My Order</a>
				<a href="<?php echo base_url('client/account') ?>" class="link-side">My Account</a>
				<hr style="border-color: #fff;"> -->
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
					<?php if (isset($id_client)) {?>
						<div align="center">
						<a href="<?=base_url('homepage/logout')?>" class="btn btn-danger w-100">Logout</a>
					</div>
					<?php }else{?>
						<div align="center">
						<!-- <a href="" class="btn btn-danger w-100">Logout</a> -->
						<a href="<?php echo base_url('client/signup') ?>" class="btn btn-warning">Daftar</a>
						<a href="<?php echo base_url('client/signin') ?>" class="btn btn-primary">Login</a>
					</div>

						<?php
					}
					?>
					
					
					<div class="side-note">
						If you sign up with Twitter, Facebook, or G+ and give it to us or give us permission to obtain it, you voluntarily give us certain information. This can include your name, email address and profile photo, your public profile. We'll never post to Twitter or Facebook, or G+ without your permission.
					</div>
				</div>
			</div>
		</div>

		<!-- Sidenav Checkout -->
		<!-- <div class="sidenav" id="sideContainer">
			<div id="checkoutSide" class="side-checkout">
				<a href="javascript:void(0)" class="close-checkout" onclick="closeCheckout()"><i class="far fa-arrow-alt-circle-left"></i> <span style="margin-left: 50px;">Keranjang Belanja</span></a>
				<div class="container" align="center" style="margin-top: 25px;">
					<div class="text-warning" style="font-size: 100px"><i class="far fa-trash-alt"></i></div>
					<div class="text-secondary">Keranjang Masih Kosong <i class="far fa-frown"></i></div>
					<div style="margin-top: 25px;"><button class="btn btn-warning w-100" onclick="closeCheckout()">Lanjut Belanja</button></div>
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
		</div> -->
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

	<main class="container main-body">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="<?php echo base_url('assets/home/images/slider/slide1.jpg') ?>" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?php echo base_url('assets/home/images/slider/slide2.jpg') ?>" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?php echo base_url('assets/home/images/slider/slide3.jpg') ?>" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
<!-- 
		<section id="category-section">
			
			<div class="row-category" id="category-web">
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category">
							<div class="media">
								<img class="mr-3" width="50" src="<?php echo base_url('assets/home/images/icons/spesial-promos.png') ?>" alt="Generic placeholder image">
								<div class="media-body">
									<h6 class="mt-0">Special Promos</h6>
									<span class="desc-category">Buah dan sayur dengan harga miring.</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category">
							<div class="media">
								<img class="mr-3" width="50" src="<?php echo base_url('assets/home/images/icons/newest-items.png') ?>" alt="Generic placeholder image">
								<div class="media-body">
									<h6 class="mt-0">Newest Items</h6>
									<span class="desc-category">Produk terbaru dari Titipin.</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category">
							<div class="media">
								<img class="mr-3" width="50" src="<?php echo base_url('assets/home/images/icons/best-seller.png') ?>" alt="Generic placeholder image">
								<div class="media-body">
									<h6 class="mt-0">Best Seller</h6>
									<span class="desc-category">Produk terlaris dari Titipin.</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category">
							<div class="media">
								<img class="mr-3" width="50" src="<?php echo base_url('assets/home/images/icons/coventional.png') ?>" alt="Generic placeholder image">
								<div class="media-body">
									<h6 class="mt-0">Conventional</h6>
									<span class="desc-category">Produk non-organik dengan harga murah.</span>
								</div>
							</div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category">
							<div class="media">
								<img class="mr-3" width="50" src="<?php echo base_url('assets/home/images/icons/category.png') ?>" alt="Generic placeholder image">
								<div class="media-body">
									<h6 class="mt-0">Other Category</h6>
									<span class="desc-category">Lihat semua kategori. &nbsp; &nbsp; &nbsp;</span>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

			
			<div class="row-category" id="category-mobile">
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category" align="center">
							<img width="50" src="<?php echo base_url('assets/home/images/icons/spesial-promos.png') ?>" alt="Generic placeholder image">
							<div class="title-category"><b>Special Promos</b></div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category" align="center">
							<img width="50" src="<?php echo base_url('assets/home/images/icons/newest-items.png') ?>" alt="Generic placeholder image">
							<div class="title-category"><b>Newest Items</b></div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category" align="center">
							<img width="50" src="<?php echo base_url('assets/home/images/icons/best-seller.png') ?>" alt="Generic placeholder image">
							<div class="title-category"><b>Best Seller</b></div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category" align="center">
							<img width="50" src="<?php echo base_url('assets/home/images/icons/coventional.png') ?>" alt="Generic placeholder image">
							<div class="title-category"><b>Conventional</b></div>
						</div>
					</a>
				</div>
				<div class="col-category">
					<a href="<?php echo base_url('homepage/see_all') ?>" class="btn-category text-dark">
						<div class="card-category" align="center">
							<img width="50" src="<?php echo base_url('assets/home/images/icons/category.png') ?>" alt="Generic placeholder image">
							<div class="title-category"><b>Other Category</b></div>
						</div>
					</a>
				</div>
			</div>
		</section> -->

		<section id="items-section">
			
		<!-- 	<div class="like-area">
				<div class="row">
					<div class="col-8">
						<h5><i class="far fa-heart"></i> Wajib Coba</h5>
					</div>
					<div class="col-4" align="right">
						<a href="<?php echo base_url('homepage/see_all') ?>" class="text-warning"><small>Lihat Semua...</small></a>
					</div>
				</div>
				<hr class="line-space">

		
				<div class="row-items" id="items-web">
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Jagung</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 30.000</s></div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kentang.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Kentang Sigi</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/telur.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Telur Biromaru</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 25.000</s></div>
								<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/daging.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Daging Sapi</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 60.000</s></div>
								<div><b>Rp. 55.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kangkung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Kangkung</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 5.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
				</div>

				
				<div class="row-items container-items" id="items-mobile">
					<div class="slide-items-like">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Jagung</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 30.000</s></div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-like">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kentang.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Kentang Sigi</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-like">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/telur.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Telur Biromaru</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 25.000</s></div>
									<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-like">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/daging.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Daging Sapi</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 60.000</s></div>
									<div><b>Rp. 55.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-like">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kangkung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Kangkung</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 5.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<a class="prev-items-like" onclick="plusSlides(-1)"><i class="fas fa-angle-left"></i></a>
					<a class="next-items-like" onclick="plusSlides(1)"><i class="fas fa-angle-right"></i></a>
				</div>
				<div class="dot-container-items">
					<span class="dot-items-like" onclick="currentSlide(1)"></span> 
					<span class="dot-items-like" onclick="currentSlide(2)"></span> 
					<span class="dot-items-like" onclick="currentSlide(3)"></span>
					<span class="dot-items-like" onclick="currentSlide(4)"></span> 
					<span class="dot-items-like" onclick="currentSlide(5)"></span> 
				</div>
			</div> -->

			<!-- Produk Special Promos -->
		<!-- 	<div class="promo-area">
				<div class="row">
					<div class="col-8">
						<h5><i class="fas fa-percent"></i> Special Promos</h5>
					</div>
					<div class="col-4" align="right">
						<a href="<?php echo base_url('homepage/see_all') ?>" class="text-warning"><small>Lihat Semua...</small></a>
					</div>
				</div>
				<hr class="line-space">
				
				<div class="row-items" id="items-web">
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Jagung</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 30.000</s></div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/semangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Semangka Merah</b></div>
								<div><small>Value (500 - 1000gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 30.000</s></div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/telur.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Telur Biromaru</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 25.000</s></div>
								<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/daging.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Daging Sapi</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 60.000</s></div>
								<div><b>Rp. 55.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/nangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Nangka</b></div>
								<div><small>Value (500 - 1000gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 25.000</s></div>
								<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
				</div>

			
				<div class="row-items container-items" id="items-mobile">
					<div class="slide-items-promo">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Jagung</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 30.000</s></div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-promo">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/semangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Semangka Merah</b></div>
									<div><small>Value (500 - 1000gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 30.000</s></div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-promo">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/telur.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Telur Biromaru</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 25.000</s></div>
									<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-promo">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/daging.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Daging Sapi</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 60.000</s></div>
									<div><b>Rp. 55.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-promo">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/nangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Nagka</b></div>
									<div><small>Value (500 - 1000gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 25.000;</s></div>
									<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<a class="prev-items-promo" onclick="plusSlidespromo(-1)"><i class="fas fa-angle-left"></i></a>
					<a class="next-items-promo" onclick="plusSlidespromo(1)"><i class="fas fa-angle-right"></i></a>
				</div>
				<div class="dot-container-items">
					<span class="dot-items-promo" onclick="currentSlidepromo(1)"></span> 
					<span class="dot-items-promo" onclick="currentSlidepromo(2)"></span> 
					<span class="dot-items-promo" onclick="currentSlidepromo(3)"></span>
					<span class="dot-items-promo" onclick="currentSlidepromo(4)"></span> 
					<span class="dot-items-promo" onclick="currentSlidepromo(5)"></span> 
				</div>
			</div> -->

			<!-- Produk Newest Items -->
			<div class="newest-area">
				<div class="row">
					<div class="col-8">
						<h5><i class="far fa-smile"></i> Newest Items</h5>
					</div>
					<div class="col-4" align="right">
						<a href="<?php echo base_url('homepage/see_all') ?>" class="text-warning"><small>Lihat Semua...</small></a>
					</div>
				</div>
				<hr class="line-space">
				<!-- Produk Newest Items Web -->
				<div class="row-items" id="items-web">
					<a id="show_data_new">
				</div>

				<!-- Produk Newest Items Mobile -->
				<div class="row-items container-items" id="items-mobile">
					<a id="show_data_m_new">
				</div>
				<div class="dot-container-items">
					<a id="slide_new_items">
				</div>
			</div>

			<!-- Produk Best Seller -->
		<!-- 	<div class="best-area">
				<div class="row">
					<div class="col-8">
						<h5><i class="far fa-thumbs-up"></i> Best Seller</h5>
					</div>
					<div class="col-4" align="right">
						<a href="<?php echo base_url('homepage/see_all') ?>" class="text-warning"><small>Lihat Semua...</small></a>
					</div>
				</div>
				<hr class="line-space">

				<div class="row-items" id="items-web">
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Jagung</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 30.000</s></div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kentang.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Kentang Sigi</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/telur.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Telur Biromaru</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 25.000</s></div>
								<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/daging.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Daging Sapi</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 60.000</s></div>
								<div><b>Rp. 55.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kangkung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Kangkung</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 5.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
				</div>

				
				<div class="row-items container-items" id="items-mobile">
					<div class="slide-items-best">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Jagung</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 30.000</s></div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-best">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kentang.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Kentang Sigi</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-best">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/telur.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Telur Biromaru</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 25.000</s></div>
									<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-best">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/daging.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Daging Sapi</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 60.000</s></div>
									<div><b>Rp. 55.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-best">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kangkung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Kangkung</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 5.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<a class="prev-items-best" onclick="plusSlidesbest(-1)"><i class="fas fa-angle-left"></i></a>
					<a class="next-items-best" onclick="plusSlidesbest(1)"><i class="fas fa-angle-right"></i></a>
				</div>
				<div class="dot-container-items">
					<span class="dot-items-best" onclick="currentSlidebest(1)"></span> 
					<span class="dot-items-best" onclick="currentSlidebest(2)"></span> 
					<span class="dot-items-best" onclick="currentSlidebest(3)"></span>
					<span class="dot-items-best" onclick="currentSlidebest(4)"></span> 
					<span class="dot-items-best" onclick="currentSlidebest(5)"></span> 
				</div>
			</div> -->

			<!-- Produk Vegetables -->
<!-- 			<div class="vege-area">
				<div class="row">
					<div class="col-8">
						<h5><i class="fas fa-carrot"></i> Vegetables</h5>
					</div>
					<div class="col-4" align="right">
						<a href="<?php echo base_url('homepage/see_all') ?>" class="text-warning"><small>Lihat Semua...</small></a>
					</div>
				</div>
				<hr class="line-space">
			
				<div class="row-items" id="items-web">
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Jagung</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 30.000</s></div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kentang.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Kentang Sigi</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/tomat.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Tomat</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/cabai.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Cabai Lombok</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kangkung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Kangkung</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 5.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
				</div>

			
				<div class="row-items container-items" id="items-mobile">
					<div class="slide-items-vege">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Jagung</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 30.000</s></div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-vege">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kentang.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Kentang Sigi</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-vege">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/tomat.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Tomat</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-vege">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/cabai.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Cabai Lombok</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-vege">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/kangkung.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Kangkung</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 5.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<a class="prev-items-vege" onclick="plusSlidesvege(-1)"><i class="fas fa-angle-left"></i></a>
					<a class="next-items-vege" onclick="plusSlidesvege(1)"><i class="fas fa-angle-right"></i></a>
				</div>
				<div class="dot-container-items">
					<span class="dot-items-vege" onclick="currentSlidevege(1)"></span> 
					<span class="dot-items-vege" onclick="currentSlidevege(2)"></span> 
					<span class="dot-items-vege" onclick="currentSlidevege(3)"></span>
					<span class="dot-items-vege" onclick="currentSlidevege(4)"></span> 
					<span class="dot-items-vege" onclick="currentSlidevege(5)"></span> 
				</div>
			</div>

			
			<div class="fruit-area">
				<div class="row">
					<div class="col-8">
						<h5><i class="fas fa-apple-alt"></i> Fruits</h5>
					</div>
					<div class="col-4" align="right">
						<a href="<?php echo base_url('homepage/see_all') ?>" class="text-warning"><small>Lihat Semua...</small></a>
					</div>
				</div>
				<hr class="line-space">
			
				<div class="row-items" id="items-web">
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/apel.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Apel Merah</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 30.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/semangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Semangka Merah</b></div>
								<div><small>Value (500 - 1000gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 30.000</s></div>
								<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/alpukat.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Alpukat Mangga</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 35.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/buahnaga.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Buah Naga Merah</b></div>
								<div><small>Value (300 - 500gr)</small></div>
								<div class="text-danger" align="right"><small>&nbsp;</small></div>
								<div>&nbsp;</div>
								<div><b>Rp. 30.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
					<div class="col-items">
						<div class="card-items">
							<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/nangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
							<div class="card-body-items">
								<div><b>Nangka</b></div>
								<div><small>Value (500 - 1000gr)</small></div>
								<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
								<div><s>Rp. 25.000</s></div>
								<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
								<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
							</div>
						</div>
					</div>
				</div>

		
				<div class="row-items container-items" id="items-mobile">
					<div class="slide-items-fruit">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/apel.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Apel Merah</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 30.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-fruit">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/semangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Semangka Merah</b></div>
									<div><small>Value (500 - 1000gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 30.000</s></div>
									<div><b>Rp. 25.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-fruit">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/alpukat.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Alpukat Mangga</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 35.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-fruit">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/buahnaga.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Buah Naga Merah</b></div>
									<div><small>Value (300 - 500gr)</small></div>
									<div class="text-danger" align="right"><small>&nbsp;</small></div>
									<div>&nbsp;</div>
									<div><b>Rp. 30.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<div class="slide-items-fruit">
						<div class="col-items-mobile">
							<div class="card-items">
								<a href="<?php echo base_url('homepage/detail') ?>"><img src="<?php echo base_url('assets/home/images/items/nangka.jpg') ?>" class="img-fluid" alt="Generic placeholder image"></a>
								<div class="card-body-items">
									<div><b>Nagka</b></div>
									<div><small>Value (500 - 1000gr)</small></div>
									<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>
									<div><s>Rp. 25.000;</s></div>
									<div><b>Rp. 15.000</b>/<small>500 gram</small></div>
									<div><a href="" class="btn btn-warning btn-cart"><i class="fas fa-shopping-basket"></i> Beli</a></div>
								</div>
							</div>
						</div>
					</div>
					<a class="prev-items-fruit" onclick="plusSlidesfruit(-1)"><i class="fas fa-angle-left"></i></a>
					<a class="next-items-fruit" onclick="plusSlidesfruit(1)"><i class="fas fa-angle-right"></i></a>
				</div>
				<div class="dot-container-items">
					<span class="dot-items-fruit" onclick="currentSlidefruit(1)"></span> 
					<span class="dot-items-fruit" onclick="currentSlidefruit(2)"></span> 
					<span class="dot-items-fruit" onclick="currentSlidefruit(3)"></span>
					<span class="dot-items-fruit" onclick="currentSlidefruit(4)"></span> 
					<span class="dot-items-fruit" onclick="currentSlidefruit(5)"></span> 
				</div>
			</div> -->

			<!-- Semua Produk -->
<!-- 			<div class="all-area">
				<div class="row">
					<div class="col-8">
						<h5><i class="fas fa-cubes"></i> All Items</h5>
					</div>
					<div class="col-4" align="right">
						<a href="<?php echo base_url('homepage/see_all') ?>" class="text-warning"><small>Lihat Semua...</small></a>
					</div>
				</div>
				<hr class="line-space">
	
				<div class="row-items" id="items-web">
						<a id="show_data">
						</div>

						<div class="row-items container-items" id="items-mobile">
						<dak id="show_data_m">

							
						</div>
						<div class="dot-container-items">
							<dak id="slide_all_items">
			
				</div>
			</div> -->
		</section>

		<section class="fixed-bottom" id="checkout-section">
			<div class="bg-light shadow-sm p-2 mb-5">
				<div class="container">
					<div class="row">
						<div class="col-2 checkout btn-sidebar" onclick="openCheckout()">
							<cdc id="total_items">
						</div>
						<div class="col-6 btn-sidebar" onclick="openCheckout()">
							<div class="text-danger text-checkout"><b><span id="total_beli_x"></span></b></div>
							<div class="text-danger" style="font-size: 12px;"><b>FREE</b> ongkir pembelian diatas Rp. 100.000</div>
						</div>
						<div class="col-4" align="right" style="padding-top: 7px">
							<button type="button" id="btn_checkout" class="btn btn-warning">Checkout</button>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<!-- Modal -->
	<div class="modal fade bd-example-modal-lg" id="gantiArea" tabindex="-1" role="dialog" aria-labelledby="gantiArea" aria-hidden="true">
		<div class="modal-dialog modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="gantiArea">Ganti Area Pengiriman</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div align="center">
						Jika Anda mengganti tanggal pengiriman, maka pilihan belanja Anda sebelumnya akan hilang, dikarenakan, ketersediaan sayur pada setiap harinya tidak sama.
					</div>
					<hr>
					<div align="center"><b>Silakan Pilih Lokasi Pengiriman Anda:</b></div>
					<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
						<div class="col-6" align="center">
							<img src="<?php echo base_url('assets/home/images/icons/map.png') ?>" class="img-fluid" width="100">
						</div>
						<div class="col-6">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="daerah" id="daerah1" value="Palu Timur" checked>
								<label class="custom-control-label" for="daerah1">
									Palu Timur
								</label>
							</div>
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="daerah" id="daerah2" value="Palu Barat">
								<label class="custom-control-label" for="daerah2">
									Palu Barat
								</label>
							</div>
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="daerah" id="daerah3" value="Palu Utara">
								<label class="custom-control-label" for="daerah3">
									Palu Utara
								</label>
							</div>
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="daerah" id="daerah4" value="Palu Selatan">
								<label class="custom-control-label" for="daerah4">
									Palu Selatan
								</label>
							</div>
						</div>
					</div>
					<div align="center"><small><b>TTIPIN</b> melayani pengantaran untuk seluruh wilayah Kota Palu</small></div>
					<hr>
					<div align="center"><b>Pilih Waktu Pengiriman Minggu ini:</b></div>
					<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
						<div class="col-6" align="center">
							<img src="<?php echo base_url('assets/home/images/icons/calander.png') ?>" class="img-fluid" width="100">
						</div>
						<div class="col-6">
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="waktu" id="waktu1" value="Besok" checked>
								<label class="custom-control-label" for="waktu1">
									Besok
								</label>
							</div>
							<div class="custom-control custom-radio">
								<input class="custom-control-input" type="radio" name="waktu" id="waktu2" value="Lusa">
								<label class="custom-control-label" for="waktu2">
									Lusa
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer" align="center">
					<button type="button" class="btn btn-lg btn-warning" style="width: 100%">Mulai Belanja</button>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url('assets/home/js/jquery.js') ?>"></script>
	<script src="<?=base_url('assets/admin')?>/js/sweetalert.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/home/js/jquery.js') ?>"><\/script>')</script>
	<script src="<?php echo base_url('assets/home/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/home/js/style.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			show_chart();
			function show_chart(){
				$.ajax({
					type  : 'ajax',
					url   : '<?php echo site_url('homepage/all_items/')?>',
					async : false,
					dataType : 'json',
					success : function(data){
						var html = '';
						var html_m = '';
						var html_s = '';
						var i;
						var no = 1;
						var totalhpp=0;
						var total_pembelian=0;
						var total_items = 0;
						var html_chart = 0;
							
							
						for(i=0; i<data.length; i++){
							hpp = data[i].harga-(data[i].harga*data[i].disc_1/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100))*data[i].disc_2/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100))*data[i].disc_2/100))*data[i].disc_3/100);

							laba = ((data[i].harga_jual - hpp)/hpp)*100;
							
							h_jual = data[i].p_harga_jual;
							jumlah_item = data[i].jml;

							total_pembelian+=h_jual*jumlah_item;
							total_items += 1*jumlah_item;
						
							if (data[i].jml<=0) {
							html += '<div class="col-items">'+
							'<div class="card-items">'+
							'<img width="240" height="240" id="view_product" id_item="'+data[i].produk_id+'" src="<?php echo base_url("assets/gambar/thumb/")?>'+data[i].p_big_pic+'" class="img-fluid" alt="Generic placeholder image">'+
							'<div class="card-body-items">'+
							'<div><b>'+data[i].p_nama_produk+'</b></div>'+
							'<div><small>Value ('+data[i].i_satuan+')</small></div>'+
							'<!-- <div class="text-danger" align="right"><small>Promo Maksimal 1</small></div> -->'+
							'<!-- <div><s>Rp. 30.000</s></div> -->'+
							'<div><b>'+data[i].p_harga_jual+'</b>/<small>'+data[i].i_satuan+'</small></div>'+
			
								'<div><a class="btn btn-warning btn-cart" id="add_item_chart" id_item_add="'+data[i].produk_id+'" kode_produk_tambah="'+data[i].p_kode_produk+'"><i class="fas fa-shopping-basket"></i> Beli</a></div>'+
							'</div>'+
							'</div>'+
							'</div>';
							html_m += '<div class="slide-items-all">'+
							'<div class="col-items-mobile">'+
							'<div class="card-items"  >'+
							'<a id="view_product_m" id_item="'+data[i].produk_id+'"><img src="<?php echo base_url("assets/gambar/thumb/")?>'+data[i].p_big_pic+'" class="img-fluid" alt="Generic placeholder image"></a>'+
							'<div class="card-body-items">'+
							'<div><b>'+data[i].p_nama_produk+'</b></div>'+
							'<div><small>Value ('+data[i].p_satuan+')</small></div>'+
							'<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>'+
							'<div><b>'+data[i].harga_jual+'</b>/<small>'+data[i].p_satuan+'</small></div>'+
							'<button class="btn btn-warning btn-cart" id="add_item_chart_m" id_item_add_m="'+data[i].produk_id+'" kode_produk_tambah_m="'+data[i].p_kode_produk+'"><i class="fas fa-shopping-basket" ></i> Beli</button>'+
							'</div>'+
							'</div>'+
							'</div>'+
							'</div>'+
							'<a class="prev-items-all" onclick="plusSlidesall(-1)"><i class="fas fa-angle-left"></i></a>'+
							'<a class="next-items-all" onclick="plusSlidesall(1)"><i class="fas fa-angle-right"></i></a>';
						}else{
							html += '<div class="col-items">'+
							'<div class="card-items">'+
							'<img  id="view_product" id_item="'+data[i].produk_id+'" src="<?php echo base_url("assets/gambar/thumb/")?>'+data[i].big_pic+'" class="img-fluid" alt="Generic placeholder image">'+
							'<div class="card-body-items">'+
							'<div><b>'+data[i].nama_produk+'</b></div>'+
							'<div><small>Value ('+data[i].satuan+')</small></div>'+
							'<!-- <div class="text-danger" align="right"><small>Promo Maksimal 1</small></div> -->'+
							'<!-- <div><s>Rp. 30.000</s></div> -->'+
							'<div><b>'+data[i].harga_jual+'</b>/<small>'+data[i].satuan+'</small></div>'+
							'<div class="btn-cart" align="center">'+
									'<div class="input-group mb-3">'+
										'<div class="input-group-prepend">'+
											'<button class="btn btn btn-danger" type="button" id="min_item_chart" id_item_min="'+data[i].produk_id+'" kode_produk_kurang="'+data[i].kode_produk+'"><i class="fas fa-minus"></i></button>'+
										'</div>'+
										'<input type="text" class="form-control" id="jumlah_dibeli'+i+'"  value="'+data[i].jml+'" style="text-align: center;">'+
										'<div class="input-group-append">'+
											'<button class="btn btn btn-success" type="button" id="add_item_chart" id_item_add="'+data[i].produk_id+'" kode_produk_tambah="'+data[i].kode_produk+'"><i class="fas fa-plus"></i></button>'+

										'</div>'+
									'</div>'+ 
								'</div>'+
							'</div>'+
							'</div>'+
							'</div>';
							html_m += '<div class="item active">'+
							'<div class="slide-items-all">'+
							'<div class="col-items-mobile">'+
							'<div class="card-items"  >'+
							'<a id="view_product_m" id_item="'+data[i].produk_id+'"><img src="<?php echo base_url("assets/gambar/thumb/")?>'+data[i].p_big_pic+'" class="img-fluid" alt="Generic placeholder image"></a>'+
							'<div class="card-body-items">'+
							'<div><b>'+data[i].nama_produk+'</b></div>'+
							'<div><small>Value ('+data[i].satuan+')</small></div>'+
							'<div class="text-danger" align="right"><small>Promo Maksimal 1</small></div>'+
							'<div><b>'+data[i].harga_jual+'</b>/<small>'+data[i].satuan+'</small></div>'+
							'<div class="btn-cart" align="center">'+
										'<div class="input-group mb-3">'+
											'<div class="input-group-prepend">'+
												'<button class="btn btn btn-danger" type="button" id="min_item_chart_m" id_item_min_m="'+data[i].produk_id+'" kode_produk_kurang_m="'+data[i].kode_produk+'"><i class="fas fa-minus"></i></button>'+
											'</div>'+
											'<input type="text" class="form-control" id="jumlah_dibeli'+i+'"  value="'+data[i].jml+'" style="text-align: center;">'+
											'<div class="input-group-append">'+
												'<button class="btn btn btn-success" type="button" id="add_item_chart_m" id_item_add_m="'+data[i].produk_id+'" kode_produk_tambah_m="'+data[i].p_kode_produk+'"><i class="fas fa-plus"></i></button>'+


											'</div>'+
										'</div>'+
									'</div>'+
							'</div>'+
							'</div>'+
							'</div>'+
							'</div>'+
							'</div>'+
							'<a class="prev-items-all" onclick="plusSlidesall(-1)"><i class="fas fa-angle-left"></i></a>'+
							'<a class="next-items-all" onclick="plusSlidesall(1)"><i class="fas fa-angle-right"></i></a>';
							html_chart += '<li class="list-group-item">'+
							'<div class="row" style="margin-bottom: 10px;">'+
								'<div class="col-10">'+
									'<div class="media">'+
										'<img class="mr-3 img-fluid" width="50" src="<?php echo base_url("assets/gambar/thumb/")?>'+data[i].small_pic+'">'+
										'<div class="media-body">'+
											'<h6 class="mt-0">'+data[i].nama_produk+'</h6>'+
											'<div class="text-muted text-checkout-sm">Value '+data[i].satuan+'</div>'+
										    '<div class="text-checkout-sm"><b>'+convertToRupiah(data[i].harga_jual)+'/'+data[i].satuan+'</b></div>'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="col-2" align="right">'+
									'<a id="hapus_chart" kode_produk_hapus = "'+data[i].kode_produk+'" class="btn-area text-danger"><h5><i class="far fa-trash-alt"></i></h5></a>'+
								'</div>'+
							'</div>'+
							'<div class="row">'+
								'<div class="col-6">'+
									'<div class="input-group mb-3">'+
										'<div class="input-group-prepend">'+
											'<button class="btn btn-sm btn-danger" type="button" id="min_item_chart_c" id_item_min="'+data[i].produk_id+'" kode_produk_kurang="'+data[i].kode_produk+'"><i class="fas fa-minus"></i></button>'+
										'</div>'+
										'<input type="text" class="form-control form-control-sm"  id="jumlah_dibeli'+i+'"  value="'+data[i].jml+'"  style="text-align: center;">'+
										'<div class="input-group-append">'+
											'<button class="btn btn-sm btn-success" type="button" id="add_item_chart_c" id_item_add="'+data[i].produk_id+'" kode_produk_tambah="'+data[i].p_kode_produk+'"><i class="fas fa-plus"></i></button>'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div class="col-6" align="right">'+
									'<div><b>'+convertToRupiah(data[i].harga_jual*data[i].jumlah)+'</b></div>'+
								'</div>'+
							'</div>'+
						'</li>';

						}
							
							

							html_s += '<span class="dot-items-all" onclick="currentSlideall('+no++ +')"></span>';
							

						}

						html_total_items = '<span class="fa-stack fa-2x has-badge text-warning"'+
						'data-count="'+total_items+'">'+
								'<i class="fas fa-shopping-basket"></i>'+
							'</span>';
						html_total_items_c ='<span class="fa-stack has-badge text-warning" data-count="'+total_items+'">'+
									'<i class="fas fa-shopping-basket"></i>'+
								'</span>';

						$('#show_data').html(html);
						$('#show_data_m').html(html_m);
						$('#slide_all_items').html(html_s);
						$('#show_chart').html(html_chart);
						
						$('#total_beli').html(convertToRupiah(total_pembelian));
						$('#total_beli_x').html(convertToRupiah(total_pembelian));
						$('#total_items').html(html_total_items);
						$('#total_items_c').html(html_total_items_c);

						$('#show_data_new').html(html);
						$('#slide_new_items').html(html_s);
						$('#show_data_m_new').html(html_m);
					}

				});
			}
			
		function convertToRupiah(angka)
        {
          var rupiah = '';    
          var angkarev = angka.toString().split('').reverse().join('');
          for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
			$('#show_data, #show_data_new').on('click','#view_product',function(){
				var id_item =$(this).attr('id_item');

				window.location="<?=base_url('homepage/detail/')?>"+id_item+"";
			});
			$('#show_data_m, #show_data_m_new').on('click','#view_product',function(){
				var id_item =$(this).attr('id_item');
				window.location="<?=base_url('homepage/detail/')?>"+id_item+"";
			});
			$('#show_data, #show_data_new, #show_chart').on('click','#add_item_chart, #add_item_chart_c',function(){
				var id_item =$(this).attr('id_item_add');
				var kode_produk =$(this).attr('kode_produk_tambah');
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('homepage/tambah_ke_chart')?>",
					dataType : "JSON",
					data : {id_item:id_item,kode_produk:kode_produk},
					success: function(data){
						show_chart();

					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal Ditambahkan, stock tidak mencukupi!" ,  "error",  {
              	buttons: false,
              	timer: 1000,
              } );
          })
				});
			
			});
			$('#show_chart').on('click','#hapus_chart',function(){
				var kode_produk =$(this).attr('kode_produk_hapus');
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('homepage/hapus_dari_chart')?>",
					dataType : "JSON",
					data : {kode_produk:kode_produk},
					success: function(data){
						show_chart();
						// swal ( "Sukses" ,  "Produk Berhasil Ditambahkan!" ,  "success", {
						// 	buttons: false,
						// 	timer: 1000,
						// } );
						// window.location.replace("<?=base_url('admin/pembelian')?>");

					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal Ditambahkan!" ,  "error",  {
              	buttons: false,
              	timer: 1000,
              } );
          })
				});

			});

			$('#show_data_m,  #show_data_m_new,  #show_chart').on('click','#add_item_chart_m',function(){
				var id_item =$(this).attr('id_item_add_m');
				var kode_produk =$(this).attr('kode_produk_tambah_m');
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('homepage/tambah_ke_chart')?>",
					dataType : "JSON",
					data : {id_item:id_item,kode_produk:kode_produk},
					success: function(data){
						show_chart();

					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal Ditambahkan, stock tidak mencukupi!" ,  "error",  {
              	buttons: false,
              	timer: 1000,
              } );
          })
				});
			
			});
			$('#show_data, #show_data_new,  #show_chart').on('click','#min_item_chart, #min_item_chart_c',function(){
				var id_item =$(this).attr('id_item_min');
				var kode_produk =$(this).attr('kode_produk_kurang');
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('homepage/kurang_ke_chart')?>",
					dataType : "JSON",
					data : {id_item:id_item,kode_produk:kode_produk},
					success: function(data){
						show_chart();
						// swal ( "Sukses" ,  "Produk Berhasil Ditambahkan!" ,  "success", {
						// 	buttons: false,
						// 	timer: 1000,
						// } );
						// window.location.replace("<?=base_url('admin/pembelian')?>");

					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal Ditambahkan!" ,  "error",  {
              	buttons: false,
              	timer: 1000,
              } );
          })
				});
			

			});


			$('#add_item_to_chart').on('click',function(){
				var id_item_add =$(this).attr('id_item_add');
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('kasir/tambah_ke_chart')?>",
					dataType : "JSON",
					data : {id_item_add:id_item_add},
					success: function(data){
						show_chart();
						swal ( "Sukses" ,  "Produk Berhasil Ditambahkan!" ,  "success", {
							buttons: false,
							timer: 1000,
						} );
						window.location.replace("<?=base_url('admin/pembelian')?>");

					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal diposting!" ,  "error",  {
              	buttons: false,
              	timer: 1000,
              } );
          })
				});

				return false;
			});
			$('#show_data_m, #show_data_m_new,  #show_chart').on('click','#min_item_chart_m',function(){
				var id_item =$(this).attr('id_item_min_m');
				var kode_produk =$(this).attr('kode_produk_kurang_m');
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('homepage/kurang_ke_chart')?>",
					dataType : "JSON",
					data : {id_item:id_item,kode_produk:kode_produk},
					success: function(data){
						show_chart();

					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal Ditambahkan!" ,  "error",  {
              	buttons: false,
              	timer: 1000,
              } );
          })
				});
			

			});

			$('#view_product').on('click',function(){
				var id_item =$(this).attr('id_item');

				window.location.replace("<?=base_url('homepage/detail/')?>"+id_item+"");

				return false;
			});
			$('#view_product_m').on('click',function(){
				var id_item =$(this).attr('id_item');
				window.location.replace("<?=base_url('homepage/detail/')?>"+id_item+"");

				return false;
			});


			$('#add_item_to_chart_m').on('click',function(){
				var id_item_add =$(this).attr('id_item_add');
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('kasir/tambah_ke chart')?>",
					dataType : "JSON",
					data : {id_item_add:id_item_add},
					success: function(data){
						show_chart();
						swal ( "Sukses" ,  "Produk Berhasil Ditambahkan!" ,  "success", {
							buttons: false,
							timer: 1000,
						} );
						window.location.replace("<?=base_url('admin/pembelian')?>");

					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal diposting!" ,  "error",  {
              	buttons: false,
              	timer: 1000,
              } );
          })
				});

				return false;
			});
			
			$('#btn_checkout,#btn_checkout_a').on('click',function(){
				ip_customer = "<?=$ip_customer?>"
				$.ajax({
					type : "POST",
					url  : "<?php echo site_url('homepage/check_user_checkout')?>",
					dataType : "JSON",
					data : {ip_customer:ip_customer},
					success: function(data){
						window.location.href = "<?=base_url('client/order')?>";
						// window.location.replace("<?=base_url('client/order')?>");
					},
					error: (function(data) {
						show_chart();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Harus Login Dahulu!" ,  "error",  {
              	buttons: false,
              	timer: 2000,
              } );
          })
				});

				return false;
			});
		});
	</script>



</body>
</html>