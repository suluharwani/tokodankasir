     <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
     <link rel="stylesheet" href="<?=base_url('assets/DataTables1/datatables.min.css')?>">
     <div class="main-panel">
      <div class="content-wrapper">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="container"> 

                <div class="row form-inline">
                  <div class="col-md-3" >
                   <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Modalcat"><span class="fa fa-plus"></span> Tambah Kategori</a></div>
                 </div>

                 <div class="col-md-3" >
                   <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Modalsubcat"><span class="fa fa-plus"></span> Tambah Sub Kategori</a></div>
                 </div>
               </div>
               <div id="reload">
                <div class="table-responsive" >

                 <table class="table table-striped" id="datacat">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kategori</th>
                      <th style="text-align: right;">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="show_data_cat">
                  </tbody>
                </table>  
              </div>
            </div>
            <div id="reload">
              <div class="table-responsive" >

               <table class="table table-striped" id="mydata">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Sub Kategori</th>
                    <th>Kategori</th>
                    <th style="text-align: right;">Actions</th>
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
<!-- MODAL DET -->
<div class="modal fade" id="Modalcat" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Tambah Kategori</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label col-xs-3" >Kategori</label>
          <div class="col-md-12">
            <input name="kategori_tambah" id="kategori_tambah" class="form-control" type="text" placeholder="Kategori"  required>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-info" id="btn_simpan_kategori">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT KATEGORI-->
<!-- MODAL ADD -->
<div class="modal fade" id="Modalsubcat" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row form-inline">
        <div class="col-md-3" >
          <div class="modal-header">
           <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
           <h3 class="modal-title" id="myModalLabel">Tambah Sub Kategori</h3>
         </div>
       </div>
       
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <div class="control-group">
         <label class="control-label col-xs-3" >Kategori</label>
         <div class="controls">
           <div class="col-md-12">
            <select name="kategori" id="kategori_parent" class="form-control" required="true" >
              <option disabled selected value="">--- Pilih Kategori ---</option>
              <?php
              foreach ($kategori->result() as $key => $value) {
                echo "<option value='".$value->id."'>".$value->kategori."</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label col-xs-3" > Sub Kategori</label>
        <div class="controls">
         <div class="col-md-12">
          <input name="sub_cat_tambah" id="sub_cat_tambah" class="form-control" type="text" placeholder="Sub Kategori"  required>
        </div>
      </div>
    </div>
  </div>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
    <button class="btn btn-info" id="btn_simpan_sub_kategori">Simpan</button>
  </div>
</form>
</div>
</div>
</div>

<!--END MODAL EDIT-->
<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus_sub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Hapus Sub Kategori</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="id_sub_hapus" id="id_sub_hapus" >
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus <u><span id="sub_cat_hapus"></span></u> pada kategori <u><span id="kategori_hapus"></span></u>?</p>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button class="btn_hapus btn btn-danger" id="btn_hapus_sub">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL HAPUS-->
<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus_cat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="kode" id="id_cat_hapus" value="">
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus <u> <span id="cat_hapus"></span></u>?</p>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button class="btn_hapus btn btn-danger" id="btn_hapus_cat">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL HAPUS-->

<!--END MODAL EDIT-->

<!-- content-wrapper ends -->
<!--END MODAL EDIT-->
<div class="modal fade" id="Modal_Edit_Sub_Kategori" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Sub Kategori</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="id_sub_edit" id="id_sub_edit" class="form-control"  required="true" hidden> 
        <input type="text" name="id_cat_parent_edit" id="id_cat_parent_edit" class="form-control"  required="true" hidden> 
        <div class="form-group">
          <label class="control-label col-xs-3" >Kategori</label>
          <div class="col-md-12">
            <input name="kategori_parent_edit" id="kategori_parent_edit" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Sub Kategori</label>
          <div class="col-md-12">
            <input name="sub_cat_edit" id="sub_cat_edit" class="form-control" type="text" required>
          </div>
        </div>
      </div>

      <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-info" id="btn_simpan_edit_sub">Simpan Sub Kategori</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT-->
<div class="modal fade" id="Modal_Edit_Kategori" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="id_cat_edit" id="id_cat_edit" class="form-control"  required="true" hidden> 
        <div class="form-group">
          <label class="control-label col-xs-3" >Kategori</label>
          <div class="col-md-12">
            <input name="kategori_edit" id="kategori_edit" class="form-control" type="text">
          </div>
        </div>
      </div>

      <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-info" id="btn_simpan_edit_cat">Simpan Kategori</button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- content-wrapper ends -->
<script src="<?=base_url('assets/jscode/')?>/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?=base_url('assets/')?>DataTables1/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>

</script>
<script type="text/javascript">
  $(document).ready(function(){
        show_product(); //call function show all product
        show_product_cat(); //call function show all product
        $('#mydata').dataTable();
        $('#datacat').dataTable();
        //function show all product
        function show_product(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('admin/get_kategori')?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              var no=1;
              for(i=0; i<data.length; i++){

                html += '<tr>'+
                '<td>'+ no++ +'</td>'+
                '<td>'+data[i].sub_kategori+'</td>'+
                '<td>'+data[i].kategori+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit_sub" id_sub="'+data[i].sub_id+'" sub_cat="'+data[i].sub_kategori+'" kategori="'+data[i].kategori+'" id_kategori="'+data[i].id_kategori+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_sub" id_sub_hapus="'+data[i].sub_id+'" kategori="'+data[i].kategori+'"  sub_cat="'+data[i].sub_kategori+'">Delete</a>'+
                '</td>'+
                '</tr>';
              }
              $('#show_data').html(html);
            }

          });
        }
        function show_product_cat(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('admin/get_cat')?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              var no=1;
              for(i=0; i<data.length; i++){

                html += '<tr>'+
                '<td>'+ no++ +'</td>'+
                '<td>'+data[i].kategori+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:void(0);" class="btn btn-info btn-sm edit_kategori_btn" id_cat="'+data[i].id+'" kategori_edit="'+data[i].kategori+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_cat" id_cat="'+data[i].id+'" kategori_hapus="'+data[i].kategori+'" >Delete</a>'+
                '</td>'+
                '</tr>';

              }
              $('#show_data_cat').html(html);
            }

          });
        }

        //Save product
        $('#btn_simpan_kategori').on('click',function(){
          var kategori  = $('#kategori_tambah').val();

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/tambah_kategori')?>",
            dataType : "JSON",
            data : {kategori:kategori},
            success: function(data){

              $('#Modalcat').modal('hide');
              show_product_cat();
              swal ( "Sukses" ,  "Kategori Berhasil Ditambahkan!" ,  "success", {
                buttons: false,
                timer: 1000,
              } );
            },
            error: function(data) {
              swal ( "Gagal" ,  "Kategori Sudah Tersedia!" ,  "error",  {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });
        $('#btn_simpan_sub_kategori').on('click',function(){
          var sub_kategori  = $('#sub_cat_tambah').val();
          var id_kategori  = $('#kategori_parent').val();

            $.ajax({
              type : "POST",
              url  : "<?php echo site_url('admin/tambah_sub_kategori')?>",
              dataType : "JSON",
              data : {sub_kategori:sub_kategori, id_kategori:id_kategori},
              success: function(data){

                $('#Modalsubcat').modal('hide');
                show_product();
                swal ( "Sukses" ,  "Sub Kategori "+sub_kategori+" Berhasil Ditambahkan!" ,  "success", {
                  buttons: false,
                  timer: 1000,
                } );
              },
              error: function(data) {
                swal ( "Gagal" ,  "Sub Kategori Sudah Tersedia Atau Kategori Kosong!" ,  "error",  {
                  buttons: false,
                  timer: 2000,
                } );
              }
            });
          return false;
        });
        $('#show_data').on('click','.item_detail',function(){
          var kode_produk = $(this).attr('product_code_det');
          var hpp = $(this).attr('hpp_det');
          var jual = $(this).attr('jual');
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/det_produk')?>",
            dataType : "JSON",
            data : {kode_produk:kode_produk},
            success: function(data){
             $('#ModalDet').modal('show');
             $.each(data, function(key, value) {
              var terbilang = sayit(jual);
              $('[name="product_code_det"]').val(value.kode_produk);
              $('[name="product_name_det"]').val(value.nama_produk);
              $('[name="product_cat_det"]').val(value.kategori);
              $('[name="product_sub_cat_det"]').val(value.sub_kategori);
              $('[name="product_barcode_det"]').val(value.barcode);
              $('[name="product_name_det"]').val(value.nama_produk);
              $('[name="product_supplier_det"]').val(value.nama_supplier);
              $('[name="disc_1_det"]').val(value.disc_1);
              $('[name="disc_2_det"]').val(value.disc_2);
              $('[name="disc_3_det"]').val(value.disc_3);
              $('[name="harga_det"]').val(value.harga);
              $('[name="hpp_det"]').val(hpp);
              $('[name="laba_det"]').val(value.harga_jual);
              $('[name="nama_admin_det"]').val(value.nama_admin_produk);
              $('[name="terbilang_harga_det"]').val(terbilang);
              $('[name="tanggal_det"]').val(value.tanggal);

            });
           }
         });


        });
        //kategori edit
        $('#show_data').on('click','.btn_kategori_edit',function(){
          var product_code = $(this).data('product_code');
            // var product_name = $(this).data('product_name');
            // var price        = $(this).data('price');

            $('#ModalKategoriEdit').modal('show');
            $('[name="product_code_det"]').val(product_code);
            $('[name="product_name_det"]').val(product_name);
            $('[name="price_edit"]').val(price);
          });


        //get data for update record
        $('#show_data').on('click','.item_edit_sub',function(){
          var id_sub = $(this).attr('id_sub');
          var sub_cat = $(this).attr('sub_cat');
          var kategori = $(this).attr('kategori');
          var id_kategori = $(this).attr('id_kategori');
          $('#id_sub_edit').val(id_sub);
          $('#id_cat_parent_edit').val(id_kategori);
          $('#sub_cat_edit').val(sub_cat);
          $('#kategori_parent_edit').val(kategori);
          $('#Modal_Edit_Sub_Kategori').modal('show');

            // $("#sub_kategori_edit").val(sub_kategori);
          });

          $('#show_data_cat').on('click','.edit_kategori_btn',function(){
          var id_cat_edit = $(this).attr('id_cat');
          var kategori_edit = $(this).attr('kategori_edit');

          $('#id_cat_edit').val(id_cat_edit);
          $('#kategori_edit').val(kategori_edit);
          $('#Modal_Edit_Kategori').modal('show');

            // $("#sub_kategori_edit").val(sub_kategori);
          });
          $('#btn_simpan_edit_cat').on('click',function(){
          var id_cat = $('#id_cat_edit').val();
          var kategori = $('#kategori_edit').val();
          

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/update_kategori')?>",
            dataType : "JSON",
            data : {id_cat:id_cat, kategori:kategori},
            success: function(data){
              $('#Modal_Edit_Kategori').modal('hide');
              show_product_cat();
              show_product();
              swal ( "Sukses" ,  "Kategori "+kategori+" Berhasil Diubah!" ,  "success", {
                buttons: false,
                timer: 2000,
              } );
            },
            error: function(data) {
              swal ( "Gagal" ,  "Kategori "+kategori+" Sudah Tersedia!" ,  "error",  {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });

        //update record to database
        $('#btn_simpan_edit_sub').on('click',function(){
          var id_sub = $('#id_sub_edit').val();
          var sub_cat = $('#sub_cat_edit').val();
          var kategori_parent = $('#kategori_parent_edit').val();
          var id_cat_parent_edit = $('#id_cat_parent_edit').val();
          

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/update_sub_kategori')?>",
            dataType : "JSON",
            data : {id_sub:id_sub, sub_cat:sub_cat, kategori_parent:kategori_parent, id_cat_parent_edit:id_cat_parent_edit},
            success: function(data){
              $('#Modal_Edit_Sub_Kategori').modal('hide');
              show_product();
              swal ( "Sukses" ,  "Sub Kategori "+sub_cat+" Berhasil Diubah!" ,  "success", {
                buttons: false,
                timer: 2000,
              } );
            },
            error: function(data) {
              swal ( "Gagal" ,  "Sub Kategori "+sub_cat+" Sudah Tersedia!" ,  "error",  {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });



        //get data for delete record
        $('#show_data').on('click','.item_delete_sub',function(){
            // var product_code = $(this).data('product_code');
            var id_sub=$(this).attr('id_sub_hapus');
            var sub_cat=$(this).attr('sub_cat');
            var kategori=$(this).attr('kategori');
            // $('[name="product_code"]').val("");
            // $('[name="product_name"]').val("");
            // $('[name="price"]').val("");
            $('#id_sub_hapus').val(id_sub);
            $('#sub_cat_hapus').html(sub_cat);
            $('#kategori_hapus').html(kategori);
            $('#ModalHapus_sub').modal('show');
            
          });

        //delete record to database
        $('#btn_hapus_sub').on('click',function(){
          var kode_sub = $('#id_sub_hapus').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/hapus_sub_kategori')?>",
            dataType : "JSON",
            data : {kode_sub:kode_sub},
            success: function(data){
              // $('[name="kode"]').val("");
              $('#ModalHapus_sub').modal('hide');
              show_product();
              swal ( "Sukses" ,  "Sub Kategori Berhasil Dihapus!" ,  "success", {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });

          //get data for delete record
        $('#show_data_cat').on('click','.item_delete_cat',function(){
            // var product_code = $(this).data('product_code');
            var id_cat=$(this).attr('id_cat');
            var kategori=$(this).attr('kategori_hapus');
            // var sub_cat=$(this).attr('sub_cat');
            // var kategori=$(this).attr('kategori');
            // $('[name="product_code"]').val("");
            // $('[name="product_name"]').val("");
            // $('[name="price"]').val("");
            // $('#id_sub_hapus').val(id_sub);
            $('#id_cat_hapus').val(id_cat);
            $('#cat_hapus').html(kategori);
            $('#ModalHapus_cat').modal('show');
            
          });

        //delete record to database
        $('#btn_hapus_cat').on('click',function(){
          var id_cat = $('#id_cat_hapus').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/hapus_kategori')?>",
            dataType : "JSON",
            data : {id_cat:id_cat},
            success: function(data){
              // $('[name="kode"]').val("");
              $('#ModalHapus_cat').modal('hide');
              show_product();
              show_product_cat();
              swal ( "Sukses" ,  "Sub Kategori Berhasil Dihapus!" ,  "success", {
                buttons: false,
                timer: 1000,
              } );
            }
          });
          return false;
        });

      });

    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="kategori"]').on('change keyup blur focus', function() {
          var catid = $(this).val();
          if(catid) {
            $.ajax({
              url: "<?php echo site_url('admin/pilih_kategori/')?>"+catid,
              type: "GET",
              dataType: "json",
              success:function(data) {
                $('select[name="sub_cat"]').empty();
                $.each(data, function(key, value) {
                  $('select[name="sub_cat"]').append('<option value="'+ value.id +'">'+ value.sub_kategori +'</option>');
                });
              }
            });
          }else{
            $('select[name="sub_cat"]').empty();
          }
        });
      });
    </script>


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