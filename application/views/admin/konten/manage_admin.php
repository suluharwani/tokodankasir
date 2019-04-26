</script> 
<div class="main-panel">
  <div class="content-wrapper">




    <div class="col-lg-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="container">

           <div class="row x_title">
            <div class="col-md-6">
              <h3>Data  <small>Admin</small></h3>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="chart_plot_01" class="demo-placeholder">  

              <div class="row form-inline">
                <div class="col-md-3" >
                 <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalaAdd"><span class="fa fa-plus"></span> Tambah Admin</a></div>

               </div>
             </div>
             <hr>
             <div id="reload">
              <div class="table-responsive" >
                <table class="table table-bordered table-striped" id="mydata ">
                  <thead>
                    <tr>
                      <th>Nomor</th>
                      <th>Nama Admin</th>
                      <th>Username Admin</th>
                      <th>Level</th>
                      <th style="text-align: right;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody id="show_data">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<!--     </div> -->

</div>
<!-- content-wrapper ends -->
<!-- MODAL ADD -->
<div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Tambah Admin</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">

        <div class="form-group">
          <label class="control-label col-xs-3" >Nama</label>
          <div class="col-md-12">
            <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama Lengkap"  required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-xs-3" >Username</label>
          <div class="col-md-12">
            <input name="username" id="username" class="form-control" type="text" placeholder="Username"  required>
            <span id="username_result"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Level</label>
          <div class="col-md-12">
            <input type="radio" name="level" id="level" value="2" required>Admin</label> 
            <input type="radio" name="level" id="level" value="1" required>Super Admin</label>            
            <input type="radio" name="level" id="level" value="3" required>Kasir</label>            
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Password</label>
          <div class="col-md-12">
            <input name="password" id="password" class="form-control" type="password"  required>
            <span id="password_result_panjang"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Confirm Password</label>
          <div class="col-md-12">
            <input name="confirm_password" id="confirm_password" class="form-control" type="password"   required>
            <span id="password_result"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Kode</label>
          <div class="col-md-12">
            <!-- <input name="kodeaktivasi" id="kodeaktivasi" class="form-control" type="text" value="<?=$kodeaktivasi?>" disabled> -->
            <input name="kodeaktivasi" id="kodeaktivasi" class="form-control" value="<?=$kodeaktivasi?>" type="text" disabled>
            <span id="kodeaktivasi"></span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Aktivasi</label>
          <div class="col-md-12">
            <input name="konfirmasi_aktivasi" id="konfirmasi_aktivasi" class="form-control" type="text"   required>
          </div>
        </div>
        
      </div>
      
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-info" id="btn_simpan">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL ADD-->

<!-- MODAL EDIT PASSWORD -->
<div class="modal fade" id="ModalaEditPassword" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Password Admin</h3>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">
          <input type="hidden" name="id_admin" id="id_admin" value="">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama Admin</label>
            <div class="col-md-12">
              <input name="nama_admin" class="form-control" type="text" placeholder="Nama Admin" readonly >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Username</label>
            <div class="col-md-12">
              <input name="username_admin" class="form-control" type="text" placeholder="Nama Admin" readonly >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Password Baru</label>
            <div class="col-md-12">
              <input name="password_edit" id="password_edit" class="form-control" type="password"  required>
              <span id="password_result_panjang_edit"></span>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Confirm Password Baru</label>
            <div class="col-md-12">
              <input name="confirm_password_edit" id="confirm_password_edit" class="form-control" type="password"   required>
              <span id="password_result_edit"></span>
            </div>
          </div>
          

          
        </div>
        
        <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
          <button class="btn btn-info" id="btn_update_password">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL EDIT PASSWORD-->

<!-- MODAL EDIT -->
<div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Admin</h3>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">
          <input type="hidden" name="id_admin" id="id_admin" value="">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nama Admin</label>
            <div class="col-md-12">
              <input name="nama_admin_edit" id="nama_admin_edit" class="form-control" type="text" placeholder="Nama Admin" >
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Username</label>
            <div class="col-md-12">
              <input name="username_admin_edit" id="username_admin_edit" class="form-control" type="text" placeholder="Nama Admin" >
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-xs-3" >Level</label>
            <div class="col-md-12">

             <input type="number" name="level_edit" id="level_edit" min="1" max="3" required>1. Super Admin 2. Admin</label>
             
           </div>
         </div>
         
       </div>
       
       <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-info" id="btn_update">Update</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT-->

<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Admin</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="kode" id="textkode" value="">
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus semua data admin ini?</p></div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL HAPUS-->
<!-- partial:../../partials/_footer.html -->
<footer class="footer">
  <div class="container-fluid clearfix">
    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
      <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
        <i class="mdi mdi-heart text-danger"></i>
      </span>
    </div>
  </footer>
  <!-- partial -->
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>


<script type="text/javascript">
  $(document).ready(function(){
        show_data_admin();   //pemanggilan fungsi tampil

        $('#mydata').dataTable();

        //fungsi tampil barang
        function show_data_admin(){
          $.ajax({
            type  : 'ajax',
            url   : "<?php echo base_url('admin/admin_list')?>",
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                no = i+1;
                html += '<tr>'+
                '<td>'+no+'</td>'+
                '<td>'+data[i].nama+'</td>'+
                '<td>'+data[i].username+'</td>'+
                '<td>'+data[i].level+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:;" class="btn btn-warning btn-xs password_edit" data="'+data[i].id_admin+'">Ubah Password</a>'+'                '+
                '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id_admin+'">Edit</a>'+' '+
                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id_admin+'">Hapus</a>'+
                '</td>'+
                '</tr>';
              }
              $('#show_data').html(html);
            }

          });
        }

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
          var id=$(this).attr('data');
          $.ajax({
            type : "GET",
            url  : "<?php echo base_url('admin/get_admin')?>",
            dataType : "JSON",
            data : {id_admin:id},
            success: function(data){
             $.each(data,function(nama, username){
              $('#ModalaEdit').modal('show');
              $('[name="nama_admin_edit"]').val(data.nama);
              $('[name="level_edit"]').val(data.level);
              $('[name="username_admin_edit"]').val(data.username);
              $('[name="id_admin"]').val(data.id_admin);
            });
           }
         });
          return false;
        });
        $('#show_data').on('click','.password_edit',function(){
          var id=$(this).attr('data');
          $.ajax({
            type : "GET",
            url  : "<?php echo base_url('admin/get_admin')?>",
            dataType : "JSON",
            data : {id_admin:id},
            success: function(data){
             $.each(data,function(nama, username){
              $('#ModalaEditPassword').modal('show');
              $('[name="nama_admin"]').val(data.nama);
              $('[name="username_admin"]').val(data.username);
              $('[name="id_admin"]').val(data.id_admin);
            });
           }
         });
          return false;
        });


        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
          var id=$(this).attr('data');
          $('#ModalHapus').modal('show');
          $('[name="kode"]').val(id);
        });

        //Simpan Barang
        $('#btn_simpan').on('click',function(){
          var nama=$('#nama').val();
          var username=$('#username').val();
          var level=$("input[name='level']:checked").val();
          var password=$('#password').val();
          var confirm_password=$('#confirm_password').val();
          var kodeaktivasi=$('#kodeaktivasi').val();
          var konfirmasi_aktivasi=$('#konfirmasi_aktivasi').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/simpan_admin')?>",
            dataType : "JSON",
            data : {kodeaktivasi:kodeaktivasi, konfirmasi_aktivasi:konfirmasi_aktivasi, nama:nama , username:username, password:password, level:level, confirm_password:confirm_password},
            success: function(data){
              $('[name="nama"]').val("");
              $('[name="username"]').val("");
              $('[name="password"]').val("");
              // $('[name="level"]').val("");
              $('#ModalaAdd').modal('hide');
              show_data_admin();
              window.location.replace("<?=base_url('admin/manage_admin')?>");
            },
            error: function(data) {
              swal ( "Gagal" ,  "Admin gagal ditambahkan!" ,  "error",  {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });

        //Update Admin
        $('#btn_update').on('click',function(){
          var nama=$('#nama_admin_edit').val();
          var username=$('#username_admin_edit').val();
          var level=$('#level_edit').val();
          var id_admin=$('#id_admin').val();

          $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/update_admin')?>",
            dataType : "JSON",
            data : {nama:nama , level:level, username:username, id_admin:id_admin},
            success: function(data){
              // $('[name="kobar_edit"]').val("");
              // $('[name="nabar_edit"]').val("");
              // $('[name="nabar_edit"]').val("");
              // $('[name="id_admin"]').val("id");
              $('#ModalaEdit').modal('hide');
              show_data_admin();
            }
          });
          return false;
        });

         //Update Barang
         $('#btn_update_password').on('click',function(){
          var confirm_password=$('#confirm_password_edit').val();
          var password=$('#password_edit').val();
          var id_admin=$('#id_admin').val();

          $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/update_password_admin')?>",
            dataType : "JSON",
            data : {password:password , confirm_password:confirm_password, id_admin:id_admin},
            success: function(data){
              // $('[name="kobar_edit"]').val("");
              // $('[name="nabar_edit"]').val("");
              // $('[name="nabar_edit"]').val("");
              // $('[name="id_admin"]').val("id");
              $('#ModalaEditPassword').modal('hide');
              show_data_admin();
            }
          });
          return false;
        });


        //Hapus Barang
        $('#btn_hapus').on('click',function(){
          var id_admin=$('#textkode').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo base_url('admin/hapus_admin')?>",
            dataType : "JSON",
            data : {id_admin: id_admin},
            success: function(data){
              $('#ModalHapus').modal('hide');
              show_data_admin();
            },
            error: function(data){
              $('#ModalHapus').modal('hide');
              show_data_admin();
            }
          });
          return false;
        });

      });

    </script>
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
<script type="text/javascript">
 $(document).ready(function(){
  $('#password').change(function(){
   var password = $('#password').val();
   if(password !=''){
    $.ajax({
      url: "<?php echo base_url(); ?>login/check_password_panjang",
      method: "POST",
      data: {password:password},
      success: function(data){
        $('#password_result_panjang').html(data);
      }
    });
  }
});
});
</script>
<script type="text/javascript">
 $(document).ready(function(){
  $('#confirm_password_edit').change(function(){
   var confirm_password_edit = $('#confirm_password_edit').val();
   var password_edit = $('#password_edit').val();
   if(confirm_password_edit != '' && password_edit !=''){
    $.ajax({
      url: "<?php echo base_url(); ?>login/check_password",
      method: "POST",
      data: {confirm_password:confirm_password_edit, password:password_edit},
      success: function(data){
        $('#password_result_edit').html(data);
      }
    });
  }
});
});
</script>
<script type="text/javascript">
 $(document).ready(function(){
  $('#password_edit').change(function(){
   var password_edit = $('#password_edit').val();
   if(password_edit !=''){
    $.ajax({
      url: "<?php echo base_url(); ?>login/check_password_panjang",
      method: "POST",
      data: {password:password_edit},
      success: function(data){
        $('#password_result_panjang_edit').html(data);
      }
    });
  }
});
});
</script>