     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
     <div class="main-panel">
       <div class="content-wrapper">


        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="container"> 

                <div class="row form-inline">
                  <div class="col-md-3" >
                   <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" id="btn_tambah_pembelian"><span class="fa fa-plus"></span> Tambah Pembelian</a></div>

                 </div>
               </div>
               <div id="reload">
                <div class="table-responsive" >

                 <table class="table table-striped" id="mydata">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Faktur</th>
                      <th>Supplier</th>
                      <th>Tanggal Beli</th>
                      <th>Tanggal Posting</th>
                      <th>Admin</th>
                      <th>Status</th>
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
  <!-- content-wrapper ends -->
  <!--MODAL batal-->
  <div class="modal fade" id="ModalBatal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
          <h4 class="modal-title" id="myModalLabel">Batal produk</h4>
        </div>
        <form class="form-horizontal">
          <div class="modal-body">

            <input type="hidden" name="faktur_batal" id="faktur_batal" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau membatalkan pembelian faktur <span id="faktur_batal"></span>?</p>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus btn btn-danger" id="btn_batal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!--END MODAL batal-->
  <!-- MODAL ADD -->
  <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
         <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
         <h3 class="modal-title" id="myModalLabel">Tambah Pembelian</h3>
       </div>
       <form class="form-horizontal">
        <div class="modal-body">
          <div class="form-group">
            <label class="control-label col-xs-3" >Nomor Faktur</label>
            <div class="col-md-12">
              <input name="nomor_faktur_input" id="nomor_faktur_input" class="form-control" type="text" placeholder="Nomor Faktur"  required>
              <span id="check_nomor_faktur"></span>  
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-xs-3" >Supplier</label>
            <div class="col-md-12">
             <select name="supplier_nama" id="supplier_nama" class="form-control"  required="true" >
              <option selected disabled>Pilih Supplier</option>}
              option
            </select>
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
<!-- MODAL ADD -->
<!--MODAL HAPUS-->
<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Hapus Kategori</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="kode" id="id_faktur_hapus" value="">
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus <u> <span id="nomor_faktur_hapus"></span></u>?</p>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button class="btn_hapus btn btn-danger" id="btn_hapus_faktur">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<script type="text/javascript">
  $(document).ready(function(){
        show_product(); //call function show all product

        $('#mydata').dataTable();

        //function show all product
        function show_product(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('admin/pembelian_data')?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              var no = 1;
              for(i=0; i<data.length; i++){
                if (data[i].status == 0) {
                  status = '<label class="badge badge-warning">Belum diposting</label>';
                  html += '<tr>'+
                  '<td>'+ no++ +'</td>'+
                  '<td>'+data[i].nomor_faktur+'</td>'+
                  '<td>'+data[i].nama_supplier+'</td>'+
                  '<td>'+data[i].tanggal_buat+'</td>'+
                  '<td>'+data[i].tanggal_posting+'</td>'+
                  '<td>'+data[i].nama+'</td>'+
                  '<td>'+status+'</td>'+
                  '<td style="text-align:right;">'+
                  '<a href="<?=base_url('admin/beli/')?>'+data[i].nomor_faktur+'" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>'+' '+
                  '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" id_faktur="'+data[i].id+'"  nomor_faktur_hapus="'+data[i].nomor_faktur+'">Delete</a>'+
                  '</td>'+
                  '</tr>'
                }else{
                  status = '<label class="badge badge-success">Sudah diposting</label>';
                  html += '<tr>'+
                  '<td>'+ no++ +'</td>'+
                  '<td>'+data[i].nomor_faktur+'</td>'+
                  '<td>'+data[i].nama_supplier+'</td>'+
                  '<td>'+data[i].tanggal_buat+'</td>'+
                  '<td>'+data[i].tanggal_posting+'</td>'+
                  '<td>'+data[i].nama+'</td>'+
                  '<td>'+status+'</td>'+
                  '<td style="text-align:right;">'+
                  '<a href="javascript:void(0);" class="btn btn-warning btn-sm batal_posting" title="'+data[i].nomor_faktur+'" kode_faktur_batal="'+data[i].nomor_faktur+'">Batalkan</a>'+
                  '</td>'+
                  '</tr>'
                }
              }
              $('#show_data').html(html);
            }

          });
        }
        $('#show_data').on('click','.item_batal',function(){
            // var product_code = $(this).data('product_code');
            var faktur_batal = $(this).attr('faktur_batal');
            // $('[name="product_code"]').val("");
            // $('[name="product_name"]').val("");
            // $('[name="price"]').val("");

            $('#ModalBatal').modal('show');
            // $('#faktur').html(nomor_faktur);
            $('#faktur_batal').val(faktur_batal);
          });


        //Save product
        $('#btn_simpan').on('click',function(){
          var nomor_faktur = $('#nomor_faktur_input').val();
          var id_supplier = $('#supplier_nama').val();

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/simpan_faktur_pembelian')?>",
            dataType : "JSON",
            data : {nomor_faktur:nomor_faktur , id_supplier:id_supplier},
            success: function(data){
              $('#ModalAdd').modal('hide');
              show_product();
            }
          });
          return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
          var product_code = $(this).data('product_code');
          var product_name = $(this).data('product_name');
          var price        = $(this).data('price');

          $('#Modal_Edit').modal('show');
          $('[name="product_code_edit"]').val(product_code);
          $('[name="product_name_edit"]').val(product_name);
          $('[name="price_edit"]').val(price);
        });
        //update record to database
        $('#btn_batal').on('click',function(){
          var faktur = $('#faktur_batal').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/batal_pembelian')?>",
            dataType : "JSON",
            data : {faktur:faktur},
            success: function(data){
              $('#ModalBatal').modal('hide');
              show_product();
            }
          });
          return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
          var nomor_faktur = $(this).attr('nomor_faktur_hapus');
          var id_faktur = $(this).attr('id_faktur');

          $('#Modal_Delete').modal('show');
          $('#nomor_faktur_hapus').val(nomor_faktur);
          $('#id_faktur_hapus').val(id_faktur);
        });

        //delete record to database
        
        $('#btn_hapus_faktur').on('click',function(){
          var nomor_faktur = $('#nomor_faktur_hapus').val();
          var id_faktur = $('#id_faktur_hapus').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/hapus_faktur')?>",
            dataType : "JSON",
            data : {nomor_faktur:nomor_faktur,id_faktur:id_faktur},
            success: function(data){
              swal ( "Sukses" ,  "Produk Berhasil dihapus!" ,  "success", {
                buttons: false,
                timer: 1000,
              } );
              $('#Modal_Delete').modal('hide');
              show_product();
            }
          });
          return false;
        });
           $('#show_data').on('click','.batal_posting',function(){
          var kode_faktur =$(this).attr('kode_faktur_batal');

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/batal_posting_pembelian')?>",
            dataType : "JSON",
            data : {kode_faktur:kode_faktur},
            success: function(data){
             show_product();
             swal ( "Sukses" ,  "Produk Berhasil Dibatalkan!" ,  "success", {
              buttons: false,
              timer: 1000,
            } );

           },
           error: (function(data) {
            show_product();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal!" ,  "error",  {
                buttons: false,
                timer: 1000,
              } );
            })
         });
          return false;
        });
        $('#btn_tambah_pembelian').on('click',function(){
          // var id_cat = $('#id_cat_hapus').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/get_supplier')?>",
            dataType : "JSON",
            success: function(supplier){

              $('#ModalAdd').modal('show');
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
      $('#nomor_faktur_input').on('keydown change keyup paste blur focus keyup',function(){
       var nomor_faktur_input = $('#nomor_faktur_input').val();
       if(nomor_faktur_input !=''){
        $.ajax({
          url: "<?php echo base_url(); ?>admin/check_nomor_faktur",
          method: "POST",
          data: {nomor_faktur_input:nomor_faktur_input},
          success: function(data){
            $('#check_nomor_faktur').html(data);
          }
        });
      }
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