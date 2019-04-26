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
	<script src="<?php echo base_url('assets/home/js/detail.js') ?>"></script>
	<script src="<?php echo base_url('assets/home/js/seeall.js') ?>"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			show_chart();
			function show_chart(){
				var uri = "<?=$uri?>";
				$.ajax({
					type  : 'post',
					url   : '<?php echo site_url('homepage/items_sesuai')?>',
					async : false,
					dataType : 'json',
					data :{uri:uri},
					success : function(data){
						var html = '';
						var html_m = '';
						var html_s = '';
						var html_chart = '';
						var i;
						var no = 1;
						var totalhpp=0;
						var total_pembelian=0;
						var total_items = 0;
							
							
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

						$('#show_chart').html(html_chart);
						$('#show_data').html(html);
						$('#show_data_m').html(html_m);
						$('#slide_all_items').html(html_s);
						
						
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
			$('#show_data_m,  #show_data_m_new').on('click','#add_item_chart_m',function(){
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
			$('#show_data, #show_data_new, #show_chart').on('click','#min_item_chart, #min_item_chart_c',function(){
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
			$('#show_data_m, #show_data_m_new').on('click','#min_item_chart_m',function(){
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