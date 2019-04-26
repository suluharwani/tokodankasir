<section>
	<div class="card mb-3">
		<div class="card-header bg-warning border-warning" align="center"><i class="fas fa-user-alt"></i> My Account</div>
		<div class="card-body">
			<form method="post">
				<div class="row">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="id_client" id="id_client" hidden required>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="nama_lengkap" id="nama_client" placeholder="Nama Lengkap" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" id="email_client" placeholder="Alamat Email" required>
						</div>
						<div class="form-group">
							<label>No. Handphone <small class="text-danger">(Tanpa angka nol)</small></label>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="basic-addon3">+62</span>
								</div>
								<input type="number" class="form-control" name="hp" id="hp" placeholder="81234..." required>
							</div>
						</div>
						<div class="form-group">
							<label>Alamat Lengkap</label>
							<textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Lengkap..." required></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Provinsi</label>
							<select class="form-control" name="provinsi" id="provinsi" required>
								<option selected disabled>-- Pilih Provinsi --</option>
								<?php
								foreach ($provinsi->result() as $prov) {?>
									<option  value="<?=$prov->id?>"><?=$prov->name?></option>
								<?php }
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Kota/Kabupaten</label>
							<select name="kabupaten" id="kabupaten" class="form-control"  required="true" >
								<option selected disabled>Pilih Kota/Kabupaten</option>}
								option
							</select>
						</div>
						<div class="form-group">
							<label>Kecamatan</label>
							<select name="kecamatan" id="kecamatan" class="form-control"  required="true" >
								<option selected disabled>Pilih District/Kecamatan</option>}
								option
							</select>
						</div>
						<div class="form-group">
							<label>Kode Pos</label>
							<input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Nama Lengkap" required>
						</div>
						<span id="prov"></span>/
						<span id="kab"></span>/
						<span id="kec"></span>/
						<span id="alamat_lengkap"></span>/
						<span id="kode_p"></span>
					</div>
				</div>
				<div>
					<!-- <button class="btn btn-success w-100">Simpan</button> -->
					<button class="btn btn-warning w-100" id="Edit">Edit</button>
				</div>
			</form>
		</div>
	</div>
</section>
<script src="<?=base_url('assets/adminLTE')?>/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url('assets/admin')?>/js/sweetalert.js"></script>
<script type="text/javascript">



	$(document).ready(function() {
		show_data();

		function show_data(){
			$.ajax({
				type  : 'ajax',
				url   : '<?php echo site_url('client/data_client')?>',
				async : false,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					var no = 1;
					for(i=0; i<data.length; i++){	
						var nama_client = data[i].nama;              
						var username = data[i].username;              
						var hp = data[i].no_hp;              
						var alamat = data[i].alamat;              
						var provinsi = data[i].provinsi;              
						var kabupaten = data[i].kabupaten;              
						var kecamatan = data[i].kecamatan;              
						var kode_pos = data[i].kode_pos;              
						var id_client = data[i].id_customer;              

						$('#nama_client').val(nama_client);
						$('#email_client').val(username);
						$('#hp').val(hp);
						$('#alamat').val(alamat);
						$('#alamat_lengkap').html(alamat);
						$('#prov').html(provinsi);
						$('#kab').html(kabupaten);
						$('#kec').html(kecamatan);
						$('#kode_pos').val(kode_pos);
						$('#kode_p').html(kode_pos);
						$('#id_client').val(id_client);

					}
				}

			});
		}

		$('select[name="provinsi"]').on('change keyup blur focus', function() {
			var prov_id = $(this).val();
			if(prov_id) {
				$.ajax({
					url: "<?php echo site_url('client/pilih_kota/')?>"+prov_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						$('select[name="kecamatan"]').empty();
						$('select[name="kabupaten"]').empty();
						$.each(data, function(key, value) {
							$('select[name="kabupaten"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
						});

					}
				});

			}else{
				 $('select[name="kabupaten"]').empty();
				$('select[name="kecamatan"]').empty();
			}


		});
		$('select[name="kabupaten"]').on('change keyup blur focus', function() {
			var kab_id = $(this).val();
			if(kab_id) {
				$.ajax({
					url: "<?php echo site_url('client/pilih_kecamatan/')?>"+kab_id,
					type: "GET",
					dataType: "json",
					success:function(data) {
						$('select[name="kecamatan"]').empty();
						$.each(data, function(key, kecamatan) {
							$('select[name="kecamatan"]').append('<option value="'+ kecamatan.id +'">'+ kecamatan.name +'</option>');
						});
					}
				});
				return 0;

			}else{
				$('select[name="kecamatan"]').empty();
			}

		});
		$('#Edit').on('click', function() {

			var nama_client =  $('#nama_client').val();
			var hp = $('#hp').val();
			var email = $('#email_client').val();
			var kode_pos = $('#kode_pos').val();
			var alamat = $('#alamat').val();
			var provinsi = $('#provinsi').val();
			var kabupaten = $('#kabupaten').val();
			var kecamatan = $('#kecamatan').val();
			var id_client = $('#id_client').val();

			$.ajax({
				url: "<?php echo site_url('client/edit_customer/')?>",
				type: "post",
				dataType: "json",
				data:{nama_client:nama_client,hp:hp,alamat:alamat,kode_pos:kode_pos, alamat:alamat, provinsi:provinsi, kabupaten:kabupaten,kecamatan:kecamatan, id_client:id_client, email:email},
				success:function(data) {
					swal ( "Sukses" ,  "Data Berhasil diubah!" ,  "success", {
						buttons: false,
						timer: 1000,
					} );
					show_data();
				}
			});

		});

	});
</script>