<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$title?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url('assets/admin')?>/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin')?>/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?=base_url('assets/admin')?>/vendors/css/vendor.bundle.addons.css">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url('assets/admin')?>/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url('assets/admin')?>/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <h2 class="text-center mb-4">Register</h2>
            <div class="auto-form-wrapper">
              <form method="post">
                  <?php if (isset($check_password)) {
                   echo $check_password;
                 }
                 if (isset($check_username)) {
                   echo $check_username;
                 }

                  ?>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nama" required placeholder="Nama Lengkap">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" id="username" required name="username" placeholder="Username  min 5 karakter">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                  <span id="username_result"></span>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" id="password" required name="password" placeholder="Password  min 5 karakter">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" required placeholder="Confirm Password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                  <span id="password_result"></span>
                </div>
                <div class="form-group d-flex justify-content-center">
                  <div class="form-check form-check-flat mt-0">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" required> I agree to the Term
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block " name="submit" value="register" >Register</button>
                </div>
                <div class="text-block text-center my-3">
                  <a href="#" class="text-black text-small">Term</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url('assets/admin')?>/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?=base_url('assets/admin')?>/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=base_url('assets/admin')?>/js/off-canvas.js"></script>
  <script src="<?=base_url('assets/admin')?>/js/misc.js"></script>
  <!-- endinject -->
  <script type="text/javascript">
   $(document).ready(function(){
    $('#username').change(function(){
     var username = $('#username').val();
     if(username != ''){
      $.ajax({
        url: "<?php echo base_url(); ?>login/check_username",
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
 $(document).ready(function(){
  $('#confirm_password').change(function(){
   var confirm_password = $('#confirm_password').val();
   var password = $('#password').val();
   if(confirm_password != '' && password !=''){
    $.ajax({
      url: "<?php echo base_url(); ?>login/check_password",
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
</body>

</html>