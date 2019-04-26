<section>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3 align="center">Masuk Sekarang</h3>
			<div style="margin-bottom: 20px;">
				<form method="post">
					<div class="form-group">
						<label>Alamat Email</label>
						<input type="email" class="form-control border-warning"  name="username" placeholder="Email Address">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control border-warning" name="password" id="pass" placeholder="Password">
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" onclick="showPass()">
						<label class="form-check-label">Tampilkan Password</label>
					</div>
					<button class="btn btn-warning w-100" name="submit" value="submit">Masuk Sekarang</button>
				</form>
			</div>
			<div align="right">Belum punya akun? <a href="<?php echo base_url('client/signup') ?>" class="text-warning">Daftar</a>.</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</section>