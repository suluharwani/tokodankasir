  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Supplier</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
            </div>
            <div class="form-inline">
             <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal_supplier"><span class="fa fa-plus"></span> Tambah Supplier</a></div>
           </div>
         </div>

         <div class="box-body">
           <div id="reload">
            <div class="table-responsive" >

             <table class="table table-striped" id="datacat">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Supplier</th>
                  <th style="text-align: right;">Actions</th>
                </tr>
              </thead>
              <tbody id="show_data_cat">
              </tbody>
            </table>  
          </div>
        </div> 
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Sales</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
          <div class="form-inline">
           <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" id="btn_tambah_sales" ><span class="fa fa-plus"></span> Tambah Sales</a></div>
         </div>
       </div>
       <div class="box-body">
         <div class="table-responsive" >

           <table class="table table-striped" id="mydata">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Sales</th>
                <th>Supplier</th>
                <th>No HP</th>
                <th style="text-align: right;">Actions</th>
              </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
          </table>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- MODAL DET -->
  <div class="modal fade" id="modal_supplier" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
         <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
         <h3 class="modal-title" id="myModalLabel">Tambah Supplier</h3>
       </div>
       <form class="form-horizontal">
        <div class="modal-body">
          <div class="form-group">
            <div class="col-md-12">
              <label class="control-label" >Supplier</label>
            </div>
            <div class="col-md-12">
              <input name="supplier_tambah" id="supplier_tambah" class="form-control" type="text" placeholder="Supplier"  required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-info" id="btn_simpan_supplier">Simpan</button>
          <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL EDIT KATEGORI-->
<!-- MODAL ADD -->
<div class="modal fade" id="Modaltambahsales" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h3 class="modal-title" id="myModalLabel">Tambah Sales</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <div class="control-group">
          <div class="col-md-12">
           <label class="control-label" >Supplier</label>
         </div>
         <div class="controls">
           <div class="col-md-12">
            <select name="supplier_nama" id="supplier_nama" class="form-control"  required="true" >
              <option selected disabled>Pilih Supplier</option>}
              option
            </select>
          </div>
        </div>
      </div>
      <div class="control-group">
        <div class="col-md-12">
          <label class="control-label" >Sales</label>
        </div>
        <div class="controls">
         <div class="col-md-12">
          <input name="nama_sales_tambah" id="nama_sales_tambah" class="form-control required" type="text" placeholder="Nama Sales" required>
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="col-md-12">
        <label class="control-label" >Nomor HP</label>
      </div>
      <div class="controls">
       <div class="col-md-12">
        <input name="no_hp" id="no_hp" class="form-control" type="text" placeholder="08xxxxx" >
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="submit" class="btn btn-info" id="btn_simpan_sales">Simpan</button>
  <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
  </form>
</div>

</div>
</div>
</div>

<!--END MODAL EDIT-->
<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus_sales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Hapus Sub Kategori</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="id_sales_hapus" id="id_sales_hapus" >
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus <u><span id="nama_sales_hapus"></span></u>?</p>
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
<div class="modal fade" id="ModalHapus_sup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="kode" id="id_sup_hapus" value="">
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus <u> <span id="sup_hapus"></span></u>?</p>
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
<div class="modal fade" id="Modal_Edit_Sales" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Sales Edit</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="id_sales_edit" id="id_sales_edit" class="form-control hidden"  required="true" > 
        <input name="id_supplier_sales_edit" id="id_supplier_sales_edit" class="form-control hidden" type="text" >
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Supplier</label>
          </div>
          <div class="col-md-12">
            <input name="supplier_sales_edit" id="supplier_sales_edit" class="form-control" type="text" disabled>
            
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Sales</label>
          </div>
          <div class="col-md-12">
            <input name="sales_edit" id="sales_edit" class="form-control" type="text" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Nomor HP</label>
          </div>
          <div class="col-md-12">
            <input name="no_hp_edit" id="no_hp_edit" class="form-control" type="text" >
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-info" id="btn_simpan_edit_sales">Simpan</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT-->
<div class="modal fade" id="Modal_Edit_Supplier" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Edit Supplier</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="id_supplier_edit" id="id_supplier_edit" class="form-control hidden"  required="true" > 
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Supplier</label>
          </div>
          <div class="col-md-12">
            <input name="supplier_edit" id="supplier_edit" class="form-control" type="text">
          </div>
        </div>
      </div>

      <div class="modal-footer">

        <button class="btn btn-info" id="btn_simpan_edit_sup">Simpan</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

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
            url   : '<?php echo site_url('admin/get_sales')?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              var no=1;
              for(i=0; i<data.length; i++){

                html += '<tr>'+
                '<td>'+ no++ +'</td>'+
                '<td>'+data[i].nama+'</td>'+
                '<td>'+data[i].nama_supplier+'</td>'+
                '<td>'+data[i].no_hp+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit_sales" id_sales="'+data[i].sales_id+'" nama_supplier="'+data[i].nama_supplier+'" id_supplier="'+data[i].id_supplier+'"  nama_sales="'+data[i].nama+'" no_hp="'+data[i].no_hp+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_sales" id_sales="'+data[i].sales_id+'" nama_sales_hapus="'+data[i].nama+'" >Delete</a>'+
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
            url   : '<?php echo site_url('admin/get_supplier')?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              var no=1;
              for(i=0; i<data.length; i++){

                html += '<tr>'+
                '<td>'+ no++ +'</td>'+
                '<td>'+data[i].nama_supplier+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:void(0);" class="btn btn-info btn-sm edit_sup_btn" id_sup="'+data[i].id+'" supplier_edit="'+data[i].nama_supplier+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete_supplier" id_sup="'+data[i].id+'" sup_hapus="'+data[i].nama_supplier+'" >Delete</a>'+
                '</td>'+
                '</tr>';

              }
              $('#show_data_cat').html(html);
            }

          });
        }

        //Save product
        $('#btn_simpan_supplier').on('click',function(){
          var supplier  = $('#supplier_tambah').val();

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/tambah_supplier')?>",
            dataType : "JSON",
            data : {supplier:supplier},
            success: function(data){

              $('#modal_supplier').modal('hide');
              show_product_cat();
              swal ( "Sukses" ,  "Supplier Berhasil Ditambahkan!" ,  "success", {
                buttons: false,
                timer: 1000,
              } );
            },
            error: function(data) {
              swal ( "Gagal" ,  "Supplier Sudah Tersedia!" ,  "error",  {
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
        $('#show_data').on('click','.btn_supplier_edit',function(){
          var product_code = $(this).data('product_code');
            // var product_name = $(this).data('product_name');
            // var price        = $(this).data('price');

            $('#ModalKategoriEdit').modal('show');
            $('[name="product_code_det"]').val(product_code);
            $('[name="product_name_det"]').val(product_name);
            $('[name="price_edit"]').val(price);
          });


        //get data for update record
        $('#show_data').on('click','.item_edit_sales',function(){
          var id_sales = $(this).attr('id_sales');
          var nama_supplier = $(this).attr('nama_supplier');
          var id_supplier = $(this).attr('id_supplier');
          var no_hp = $(this).attr('no_hp');
          var nama_sales = $(this).attr('nama_sales');

          $('#id_sales_edit').val(id_sales);
          $('#no_hp_edit').val(no_hp);
          $('#sales_edit').val(nama_sales);
          $('#supplier_sales_edit').val(nama_supplier);
          $('#id_supplier_sales_edit').val(id_supplier);
          $('#Modal_Edit_Sales').modal('show');

            // $("#sub_supplier_edit").val(sub_kategori);
          });

        $('#show_data_cat').on('click','.edit_sup_btn',function(){
          var id_sup = $(this).attr('id_sup');
          var supplier_edit = $(this).attr('supplier_edit');

          $('#id_supplier_edit').val(id_sup);
          $('#supplier_edit').val(supplier_edit);
          $('#Modal_Edit_Supplier').modal('show');

            // $("#sub_supplier_edit").val(sub_kategori);
          });
        $('#btn_simpan_edit_sales').on('click',function(){
          var id_sales = $('#id_sales_edit').val();
          var no_hp = $('#no_hp_edit').val();
          var nama = $('#sales_edit').val();
          var supplier = $('#supplier_sales_edit').val();
          var id_supplier = $('#id_supplier_sales_edit').val();
          

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/update_sales')?>",
            dataType : "JSON",
            data : {id_sales:id_sales, no_hp:no_hp, nama:nama, id_supplier:id_supplier},
            success: function(data){
              $('#Modal_Edit_Sales').modal('hide');
              show_product_cat();
              show_product();
              swal ( "Sukses" ,  "Sales"+nama+" pada supplier "+supplier+" Berhasil Diubah!" ,  "success", {
                buttons: false,
                timer: 2000,
              } );
            },
            error: function(data) {
              swal ( "Gagal" ,  "Sales"+nama+" dan nomor hp "+no_hp+" pada supplier "+supplier+" Sudah Tersedia!" ,  "error",  {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });

        $('#btn_simpan_edit_sup').on('click',function(){

          var id_supplier = $('#id_supplier_edit').val();
          var nama_supplier = $('#supplier_edit').val();
          

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/update_supplier')?>",
            dataType : "JSON",
            data : {id_supplier:id_supplier, nama_supplier:nama_supplier},
            success: function(data){
              $('#Modal_Edit_Supplier').modal('hide');
              show_product_cat();
              show_product();
              swal ( "Sukses" ,  "Supplier Berhasil Diubah!" ,  "success", {
                buttons: false,
                timer: 2000,
              } );
            },
            error: function(data) {
              swal ( "Gagal" ,  "Supplier "+nama_supplier+" Sudah Tersedia!" ,  "error",  {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });



        //get data for delete record
        $('#show_data').on('click','.item_delete_sales',function(){
            // var product_code = $(this).data('product_code');
            var id_sales=$(this).attr('id_sales');
            var nama_sales=$(this).attr('nama_sales_hapus');
            // $('[name="product_code"]').val("");
            // $('[name="product_name"]').val("");
            // $('[name="price"]').val("");
            $('#id_sales_hapus').val(id_sales);
            $('#nama_sales_hapus').html(nama_sales);

            $('#ModalHapus_sales').modal('show');
            
          });

        //delete record to database
        $('#btn_hapus_sub').on('click',function(){
          var id_sales = $('#id_sales_hapus').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/hapus_sales')?>",
            dataType : "JSON",
            data : {id_sales:id_sales},
            success: function(data){
              // $('[name="kode"]').val("");
              $('#ModalHapus_sales').modal('hide');
              show_product();
              swal ( "Sukses" ,  "Sales Berhasil Dihapus!" ,  "success", {
                buttons: false,
                timer: 2000,
              } );
            }
          });
          return false;
        });

          //get data for delete record
          $('#show_data_cat').on('click','.item_delete_supplier',function(){
            // var product_code = $(this).data('product_code');
            var id_sup=$(this).attr('id_sup');
            var sup=$(this).attr('sup_hapus');
            // var sub_cat=$(this).attr('sub_cat');
            // var kategori=$(this).attr('kategori');
            // $('[name="product_code"]').val("");
            // $('[name="product_name"]').val("");
            // $('[name="price"]').val("");
            // $('#id_sales_hapus').val(id_sales);
            $('#id_sup_hapus').val(id_sup);
            $('#sup_hapus').html(sup);
            $('#ModalHapus_sup').modal('show');
            
          });

        //delete record to database
        $('#btn_hapus_cat').on('click',function(){
          var id_sup = $('#id_sup_hapus').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/hapus_supplier')?>",
            dataType : "JSON",
            data : {id_sup:id_sup},
            success: function(data){
              // $('[name="kode"]').val("");
              $('#ModalHapus_sup').modal('hide');
              show_product();
              show_product_cat();
              swal ( "Sukses" ,  "Supplier Berhasil Dihapus!" ,  "success", {
                buttons: false,
                timer: 1000,
              } );
            }
          });
          return false;
        });


        $('#btn_simpan_sales').on('click',function(){
          var sales = $('#nama_sales_tambah').val();
          var id_sup = $('#supplier_nama').val();
          var no_hp = $('#no_hp').val();

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/tambah_sales')?>",
            dataType : "JSON",
            data : {id_sup:id_sup, sales:sales, no_hp:no_hp},
            success: function(data){
              // $('[name="kode"]').val("");
              $('#Modaltambahsales').modal('hide');
              show_product();
              show_product_cat();
              swal ( "Sukses" ,  "sales "+sales+" Berhasil ditambahkan!" ,  "success", {
                buttons: false,
                timer: 1000,
              } );
            }
          });
          return false;
        });

        $('#btn_tambah_sales').on('click',function(){
          // var id_cat = $('#id_cat_hapus').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/get_supplier')?>",
            dataType : "JSON",
            success: function(supplier){

              $('#Modaltambahsales').modal('show');
              $.each(supplier, function(key, value) {
                $('select[name="supplier_nama"]').append('<option value="'+ value.id +'">'+ value.nama_supplier +'</option>');
              });
            }
          });
          return  $('select[name="supplier_nama"]').empty();
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