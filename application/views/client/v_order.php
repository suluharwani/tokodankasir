<section>
	<ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><h5>In Progress <span class="badge badge-pill badge-danger">3</span></h5></a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><h5>Completed</h5></a>
		</li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
		<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
			<ul class="list-group list-group-flush">
				<?php 
				function TanggalIndo($date){
						$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

						$tahun = substr($date, 0, 4);
						$bulan = substr($date, 5, 2);
						$tgl   = substr($date, 8, 2);

						$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
						return($result);
					}
				foreach ($query_progress->result() as $progress)
				{
					
					$status_bayar = $progress->bayar;
					$status_kirim = $progress->kirim;
					$status_sampai = $progress->sampai;
					if ($status_bayar==1&&$status_kirim==0&&$status_sampai==0) {
						$status_pembelian = '<span class="text-success">PAID</span></div>';
					}else if($status_bayar==1&&$status_kirim==1&&$status_sampai==0){
						$status_pembelian = '<span class="text-warning">In Progress</span></div>';
					}else if($status_bayar==1&&$status_kirim==1&&$status_sampai==1){
						$status_pembelian = "";
					}else{
						$status_pembelian = '<span class="text-danger">NOT PAID</span></div>';
					}
					$tanggal = TanggalIndo($progress->tanggal_buat);
					$tanggal_sampai =$progress->tanggal_estimasi_sampai;
					?>
					<li class="list-group-item">
						<div class="row">
							<div class="col-6">
								<h5><b>ORDER ID.</b> <?=$progress->nomor_faktur?></h5>
							</div>
							<div class="col-6" align="right">
								<h5><?=$tanggal?></h5>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<div><b>Delivery Date:</b></div>
								<div><?=$tanggal_sampai?></div>
								<div><b>Last Status</b></div>
								<div>CREATED - <?=$status_pembelian?>
							</div>
							<div class="col-6" align="right">
								<div><b>Bill Total:</b></div>
								<div><?=$controller->jumlah_pembelian($progress->nomor_faktur)?></div>
								<div><b>&nbsp;</b></div>
								<div><a href="#viewDetail" class="btn btn-warning" data-toggle="modal" data-target="#viewDetail">View Detail</a></div>
							</div>
						</div>
					</li>
				<?php }
				?>
			</ul>
		</div>
		<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			<div class="text-danger" align="center">You have no order history</div>
		</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="viewDetail" tabindex="-1" role="dialog" aria-labelledby="viewDetail" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewDetail"><b>ORDER ID.</b> 20082019</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div>
					<h3 align="center"><b>Ringkasan Belanja</b></h3>
					<div class="row">
						<div class="col-6">
							<div><b>1 x Kentang Sigi</b></div>
							<div><b>2 x Jagung</b></div>
						</div>
						<div class="col-6" align="right">
							<div>Rp. 25.000</div>
							<div>Rp. 20.000</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-6">
							<div><b>Ongkos Kirim</b></div>
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
						<div class="col-6">
							<h5><b>Grand Total</b></h5>
						</div>
						<div class="col-6" align="right">
							<h5>Rp. 65.007</h5>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-6">
							<div><b>Metode Pembayaran</b></div>
							<div><b>Stock Exchange</b></div>
						</div>
						<div class="col-6" align="right">
							<div>Transfer Bank</div>
							<div>Refund Voucher for your next order</div>
						</div>
					</div>
					<hr>
					<div>
						<h5><b>Alamat Pengiriman:</b></h5>
						<h5>Agus Suga</h5>
						<div>Jl. Raya Ramai No. 00</div>
						<div>Kecamatan, Kota/Kabupaten</div>
						<div>Provinsi</div>
						<div>Telp. +62812345678</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>