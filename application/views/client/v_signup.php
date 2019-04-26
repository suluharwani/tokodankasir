<section>
	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<h3>Daftar</h3>
			<div class="text-muted" style="margin-top: 15px; margin-bottom: 15px;">Buat akun di TITIPIN untuk kemudahan memesan dan memantau order Anda.</div>
			<div style="margin-bottom: 20px;">
				<form method="post">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" class="form-control border-warning" id="nama" required name="nama" placeholder="Nama">
					</div>
					<div class="form-group">
						<label>Alamat Email</label>
						<input type="email" class="form-control border-warning" id="username" required name="username" placeholder="Email Address">
					</div>
					<span id="username_result"></span>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control border-warning"  id="password" required name="password"placeholder="Password">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" class="form-control border-warning"  name="confirm_password" id="confirm_password" required placeholder="Password">
					</div>
					 <span id="password_result"></span>
				<!-- 	<div class="form-group form-check">
						<input type="checkbox" class="form-check-input"  onclick="showPass()">
						<label class="form-check-label">Tampilkan Password</label>
					</div> -->
					<button class="btn btn-warning w-100">Daftar Sekarang</button>
				</form>
			</div>
			<div align="right">Sudah punya akun? <a href="<?php echo base_url('client/signin') ?>" class="text-warning">Masuk</a>.</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</section>
<script src="<?=base_url('assets/adminLTE')?>/bower_components/jquery/dist/jquery.min.js"></script>
 <script type="text/javascript">
   $(document).on('change keydown keyup blur focus', function(){
    $('#username').change(function(){
     var username = $('#username').val();
     if(username != ''){
      $.ajax({
        url: "<?php echo base_url(); ?>client/check_username",
        method: "POST",
        data: {username:username},
        success: function(data){
          $('#username_result').html(data);
        }
      });
    }
  });
  });
</script>
<script type="text/javascript">
 $(document).on('change keydown keyup blur focus', function(){
  $('#confirm_password').change(function(){
   var confirm_password = $('#confirm_password').val();
   var password = $('#password').val();
   if(confirm_password != '' && password !=''){
    $.ajax({
      url: "<?php echo base_url(); ?>client/check_password",
      method: "POST",
      data: {confirm_password:confirm_password, password:password},
      success: function(data){
        $('#password_result').html(data);
      }
    });
  }
});
});
</script>