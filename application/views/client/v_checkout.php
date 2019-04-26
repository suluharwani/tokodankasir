<section>
	<div class="row">
		<div class="col-md-6">
			<div class="card mb-3">
				<div class="card-header bg-warning border-warning">
					<div class="row">
						<div class="col-6">
							<i class="fas fa-shopping-basket"></i> Keranjang Belanja
						</div>
						<div class="col-6" align="right">
							<small>* Maximum quantity : 10</small>
						</div>
					</div>
				</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-10">
									<div class="media">
										<img class="mr-3 img-fluid" width="50" src="<?php echo base_url('assets/home/images/items/kentang.jpg') ?>">
										<div class="media-body">
											<h6 class="mt-0">Kentang Sigi</h6>
											<div class="text-checkout-sm"><b>Rp. 25.000/500 gram</b></div>
										</div>
									</div>
								</div>
								<div class="col-2" align="right">
									<a href="#hapus" class="btn-area text-danger"><h5><i class="far fa-trash-alt"></i></h5></a>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<button class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button>
										</div>
										<input type="text" class="form-control form-control-sm" value="1" style="text-align: center;">
										<div class="input-group-append">
											<button class="btn btn-sm btn-success" type="button"><i class="fas fa-plus"></i></button>
										</div>
									</div>
								</div>
								<div class="col-6" align="right">
									<div><b>Rp. 25.000</b></div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" style="margin-bottom: 10px;">
								<div class="col-10">
									<div class="media">
										<img class="mr-3 img-fluid" width="50" src="<?php echo base_url('assets/home/images/items/jagung.jpg') ?>">
										<div class="media-body">
											<h6 class="mt-0">Jagung</h6>
											<div class="text-muted text-checkout-sm"><s>Rp. 30.000</s></div>
											<div class="text-checkout-sm"><b>Rp. 25.000/500 gram</b></div>
										</div>
									</div>
								</div>
								<div class="col-2" align="right">
									<a href="#hapus" class="btn-area text-danger"><h5><i class="far fa-trash-alt"></i></h5></a>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<button class="btn btn-sm btn-danger" type="button"><i class="fas fa-minus"></i></button>
										</div>
										<input type="text" class="form-control form-control-sm" value="2" style="text-align: center;">
										<div class="input-group-append">
											<button class="btn btn-sm btn-success" type="button"><i class="fas fa-plus"></i></button>
										</div>
									</div>
								</div>
								<div class="col-6" align="right">
									<div><b>Rp. 25.000</b></div>
									<div class="text-danger" style="font-size: 10px;">Promo Maksimal 999</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="card-footer">
					<div style="margin-top: 10px;">
						<a class="text-warning" data-toggle="collapse" href="#kodeVoucher" role="button" aria-expanded="false" aria-controls="kodeVoucher">Punya Kode Voucher?</a>
						<div class="collapse" id="kodeVoucher">
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Masukkan kode voucher...">
								<div class="input-group-append">
									<button class="btn btn-success" type="button">Gunakan</button>
								</div>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-6">
							<div><b>Biaya Kirim</b></div>
							<div class="text-danger"><b>Diskon</b></div>
							<div class="text-success"><b>Kode Unik</b></div>
						</div>
						<div class="col-6" align="right">
							<div>Rp. 20.000</div>
							<div class="text-danger">Rp. 0</div>
							<div class="text-success">Rp. 7</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-6"><h5><b>Total Pembayaran</b></h5></div>
						<div class="col-6" align="right"><h5>Rp. 70.007</h5></div>
					</div>
					<small class="text-danger">GRATIS biaya kirim dengan min. order Rp. 100.000</small>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card mb-3">
				<div class="card-header bg-warning border-warning"><i class="fas fa-user-alt"></i> Data Anda</div>
				<div class="card-body">
					<div class="form-group">
						<label>Waktu Pengiriman</label>
						<input type="text" class="form-control" placeholder="Besok" readonly required>
					</div>
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control" placeholder="Nama Lengkap" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" placeholder="Alamat Email" required>
					</div>
					<div class="form-group">
						<label>No. Handphone <small class="text-danger">(Tanpa angka nol)</small></label>
						<div class="input-group mb-3">
							<div class="input-group-prepend">
								<span class="input-group-text" id="basic-addon3">+62</span>
							</div>
							<input type="number" class="form-control" placeholder="81234..." required>
						</div>
					</div>
					<div class="form-group">
						<label>Alamat Lengkap</label>
						<textarea class="form-control" placeholder="Alamat Lengkap..." required></textarea>
					</div>
					<div class="form-group">
						<label>Provinsi</label>
						<select class="form-control" required>
							<option selected disabled>-- Pilih Provinsi --</option>
						</select>
					</div>
					<div class="form-group">
						<label>Kota/Kabupaten</label>
						<select class="form-control" required>
							<option selected disabled>-- Pilih Kota/Kabupaten --</option>
						</select>
					</div>
					<div class="form-group">
						<label>Kecamatan</label>
						<select class="form-control" required>
							<option selected disabled>-- Pilih Kecamatan --</option>
						</select>
					</div>
					<div class="card bg-light border-light">
						<div class="card-body">
							<div class="alert alert-warning" role="alert" align="center">
								<small><i class="fas fa-exclamation-circle"></i> Silahkan pilih estimasi waktu pengiriman pesanan Anda.</small>
							</div>
							<div style="margin-bottom: 15px;">
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="waktu" id="waktu1" value="Palu Timur" checked>
									<label class="custom-control-label" for="waktu1">
										Siang
									</label>
								</div>
								<div><small>ETA 11:00 - 15:00 WITA</small></div>
							</div>
							<div style="margin-bottom: 15px;">
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="waktu" id="waktu2" value="Palu Barat">
									<label class="custom-control-label" for="waktu2">
										Sore
									</label>
								</div>
								<div><small>ETA 17:00 - 20:00 WIB</small></div>
							</div>
							<div style="margin-bottom: 15px;">
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="waktu" id="waktu2" value="Palu Barat">
									<label class="custom-control-label" for="waktu2">
										Khusus Restoran/Katering
									</label>
								</div>
								<div><small>ETA Senin-Sabtu 06.00-09.00am - Terbatas untuk pembelian produk di kategori Resto&Cafe. **Proses validasi akan dilakukan. Dengan memilih opsi ini anda telah menyetujui S&K yang berlaku. Hubungi <a href="#" target="_blank">+62812345678</a> untuk informasi lebih lanjut.</small></div>
							</div>
						</div>
					</div>
					<br>
					<div class="card bg-light border-light">
						<div class="card-body">
							<div class="alert alert-warning" role="alert" align="center">
								<small><i class="fas fa-exclamation-circle"></i> Jika terjadi gagal panen atau stok produk kosong, silahkan pilih salah satu opsi di berikut ini</small>
							</div>
							<div style="margin-bottom: 15px;">
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="stock" id="stock1" value="Palu Timur" checked>
									<label class="custom-control-label" for="stock1">
										Swap for another veggie of higher value of our choice
									</label>
								</div>
								<div><small>Anda akan mendapatkan produk pengganti yang harganya lebih tinggi. Tim Sayurbox akan memilihkan produk pengganti sesuai persediaan.</small></div>
							</div>
							<div style="margin-bottom: 15px;">
								<div class="custom-control custom-radio">
									<input class="custom-control-input" type="radio" name="stock" id="stock2" value="Palu Barat">
									<label class="custom-control-label" for="stock2">
										Refund voucher for your next order
									</label>
								</div>
								<div><small>Anda akan mendapatkan refund dalam bentuk voucher belanja senilai harga produk yang tidak tersedia. Refund voucher akan dikirimkan kepada Anda melalui email.</small></div>
							</div>
						</div>
					</div><br>
					<div class="form-group">
						<label>Notes</label>
						<textarea class="form-control" placeholder="Tulis catatan..."></textarea>
					</div>
					<div class="card bg-light border-light">
						<div class="card-body">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="tasplastik">
								<label class="custom-control-label" for="tasplastik">Saya tidak mau menggunakan tas plastik</label>
							</div>
							<div><small>Akan ada kemungkinan barang akan rusak apabila memilih opsi ini.</small></div>
						</div>
					</div><br>
					<input type="submit" class="btn btn-warning w-100" value="Konfirmasi Pembayaran">
				</div>
			</div>
		</div>
	</div>
</section>