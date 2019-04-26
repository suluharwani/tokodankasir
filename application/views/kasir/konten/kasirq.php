    <!--  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="<?=base_url('assets/DataTables1/datatables.min.css')?>">
    <style type="text/css" media="screen">
    .modal-lg {
      max-width: 200% !important;
    }
  }
</style>
<div class="main-panel">
 <div class="content-wrapper">
       <!--  <div class="row purchace-popup">
          <div class="col-12">
            <span class="d-block d-md-flex align-items-center">
              <p>Like what you see? Check out our premium version for more.</p>
              <a class="btn ml-auto download-button d-none d-md-block" href="https://github.com/BootstrapDash/StarAdmin-Free-Bootstrap-Admin-Template" target="_blank">Download Free Version</a>
              <a class="btn purchase-button mt-4 mt-md-0" href="https://www.bootstrapdash.com/product/star-admin-pro/" target="_blank">Upgrade To Pro</a>
              <i class="mdi mdi-close popup-dismiss d-none d-md-block"></i>
            </span>
          </div>
        </div> -->
        <div class="row">
          <div class="col">
            <div class="col">
              <div class="collapse multi-collapse" id="multiCollapseExample2">
               <div class="row purchace-popup">
                <div class="col-12">

                 <div class="col-lg-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <div class="container">
                        <div class="row form-inline">
                          <div class="col-md-3" >
                            <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Tutup</button>
                          </div>
                        </div> 
                        <form>       
                          <div id="reload">
                            <div class="table-responsive" >

                             <table class="table table-striped" id="barang">
                              <thead>
                                <tr>
                                  <th>No</th>
                                  <th>Kode Barang</th>
                                  <th>Kode Barcode</th>
                                  <th>Nama Barang</th>
                                  <th>Supplier</th>
                                  <th>Harga Awal</th>
                                  <th>HPP</th>
                                  <th>Harga Jual</th>
                                  <th style="text-align: right;">Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $no=1;
                                foreach ($barang as $prdk) {
                                 $hpp = $prdk->harga-($prdk->harga*$prdk->disc_1/100)-(($prdk->harga-($prdk->harga*$prdk->disc_1/100))*$prdk->disc_2/100)-(($prdk->harga-($prdk->harga*$prdk->disc_1/100)-(($prdk->harga-($prdk->harga*$prdk->disc_1/100))*$prdk->disc_2/100))*$prdk->disc_3/100);
                                 ?>
                                 <tr>
                                  <td><?=$no++?></td>
                                  <td><?=$prdk->kode_produk?></td>
                                  <td><?=$prdk->barcode?></td>
                                  <td title="<?=$prdk->nama_produk?>"><?=word_limiter($prdk->nama_produk, 10)?></td>
                                  <td><?=$prdk->nama_supplier?></td>
                                  <td><?=$prdk->harga?></td>
                                  <td><?=$hpp?></td>
                                  <td><?=$prdk->harga_jual?></td>
                                  <td>
                                    <a href="javascript:void(0);" class="btn btn-success btn-block tambah_pembelian"  kode_produk="<?=$prdk->kode_produk?>" uri="<?=$uri?>" nama_admin="<?=$nama_admin?>" >Tambah <i class="mdi mdi-plus"></i></a>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>  
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- isi -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="container"> 

          <div class="row form-inline">
            <div class="col-md-2" >
              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">&nbsp;&nbsp;&nbsp;&nbsp;Cari&nbsp; &nbsp;&nbsp;&nbsp;</button>
            </div>
            <div class="col-md-3" >
              <input type="text" name="kode_barang" id="kode_barang"  class="form-control" placeholder="barcode"  > 
            </div>
            <div class="col-md-3" >
              No: <input type="text" id="faktur_pembelian" value="<?=$uri?>" disabled size="10">
            </div>
            <div class="col-md-4" >
              Total:
              <span id="total_beli"></span>  
            </div>


          </div>
<!--        <div class="row form-inline">
        <div class="col-md-2" >
             <div class="btn-group">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pilihan
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <button class="dropdown-item" type="button">Cetak Barcode</button>
                <?php 
                if ($status == true) {?>
                  <button class="dropdown-item batal_posting" type="button">Batal Posting</button>
                  <?php
                }else{?>
                 <button class="dropdown-item posting" type="button" kode_faktur_posting="<?=$uri?>" >Posting</button>
                 <?php
               }
               ?>
             </div>
           </div>
         </div>
        <div class="col-md-4" >
          Total Diskon: <input type="text" id="faktur_pembelian" value="" disabled size="10">
        </div>
        <div class="col-md-4" >
          Potongan: <input type="text" id="faktur_pembelian" value="" size="10">

          <span id="total_beli"></span>  
        </div>

      </div> -->
      <div id="reload">
        <div class="table-responsive" >

         <table class="table table-striped" id="mydata">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Kode Barcode</th>
              <th>Nama Barang</th>
              <th>Harga </th>
<!--               <th>Dics 1</th>
              <th>Disc 2</th>
              <th>Disc 3</th> -->
              <th>Harga Akhir</th>
              <th>Jumlah</th>
              <th>Total</th>
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

<!--END MODAL EDIT-->
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Pembelian</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="kode_faktur" id="kode_faktur" value="<?=$uri?>" class="form-control"  required="true" hidden> 
        <div class="form-group">
          <label class="control-label col-xs-3" >Nama Produk</label>
          <div class="col-md-12">
            <input name="nama_produk_edit" id="nama_produk_edit" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Kode Produk</label>
          <div class="col-md-12">
            <input type="text" name="kode_produk_edit" id="product_code_edit" class="form-control"  disabled >     
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Barcode</label>
          <div class="col-md-12">
            <input type="text" name="barcode_edit" id="barcode_edit" class="form-control" required>    
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Jumlah Produk</label>
          <div class="col-md-12">
            <input name="jumlah_produk_edit" id="jumlah_produk_edit" class="form-control" type="number" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >HPP Pembelian</label>
          <div class="col-md-12">
            <input type="number" name="harga_edit" id="harga_edit" class="form-control"  required="true" >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Discount 1 (%)</label>
          <div class="col-md-12">
            <input type="number" name="disc_1_edit" id="disc_1_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Discount 2 (%)</label>
          <div class="col-md-12">
            <input type="number" name="disc_2_edit" id="disc_2_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Discount 3 (%)</label>
          <div class="col-md-12">
            <input type="number" name="disc_3_edit" id="disc_3_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >HPP Akhir</label>
          <div class="col-md-12">
            <input type="number" name="hpp_edit" id="hpp_edit" class="form-control"  required="true" disabled >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Harga Jual</label>
          <div class="col-md-12">
            <input type="number" name="harga_jual_edit" id="harga_jual_edit" class="form-control"  required="true" >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Laba Jual %</label>
          <div class="col-md-12">
            <input type="number" name="laba_jual_edit" id="laba_jual_edit" class="form-control"  disabled >    
          </div>
        </div>
      </div>

      <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-info" id="btn_simpan_edit">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT-->
<!--END MODAL EDIT-->
<div class="modal fade" id="Modal_Pembayaran" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Bayar</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="kode_faktur" id="kode_faktur" value="<?=$uri?>" class="form-control"  required="true" hidden> 
        <div class="form-group">
          <label class="control-label col-xs-3" >Sub Total</label>
          <div class="col-md-12">
            <input name="nama_produk_edit" id="nama_produk_edit" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Discount</label>
          <div class="col-md-12">
            <input name="nama_produk_edit" id="nama_produk_edit" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Potongan</label>
          <div class="col-md-12">
            <input type="text" name="kode_produk_edit" id="product_code_edit" class="form-control"  >     
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Total</label>
          <div class="col-md-12">
            <input type="text" name="kode_produk_edit" id="product_code_edit" class="form-control"  disabled >     
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Uang Bayar</label>
          <div class="col-md-12">
            <input type="text" name="barcode_edit" id="barcode_edit" class="form-control" required>    
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Kembalian</label>
          <div class="col-md-12">
            <input name="jumlah_produk_edit" id="jumlah_produk_edit" class="form-control" type="number" required>
          </div>
        </div>
        
        <div class="form-group">
          <label class="control-label col-xs-3" >Terbilang</label>
          <div class="col-md-12">  
            <span id="check_kode_produk"></span>  
          </div>
        </div>
      </div>

      <div class="modal-footer">

        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
        <button class="btn btn-info" id="btn_simpan_edit">Simpan</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT-->
<!-- content-wrapper ends -->
<script src="<?=base_url('assets/jscode/')?>/jquery-3.3.1.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="<?=base_url('assets/')?>DataTables1/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#example').DataTable();

  } );
</script>
<script type="text/javascript">
  window.onload = function() {
    document.getElementById("kode_barang").focus();

  };





//cari barang
$(document).ready(function(){
        show_product(); //call function show all product

        $('#mydata').dataTable();

        //function show all product
        function show_product(){
          var faktur = "<?=$uri?>";
          $.ajax({
            type  : 'post',
            url   : '<?php echo site_url('kasir/penjualan_barang')?>',
            async : false,
            dataType : 'json',
            data :{faktur:faktur},
            success : function(data){
              var html = '';
              var i;
              var no = 1;
              var totalpenjualan=0;
              for(i=0; i<data.length; i++){
                harga_akhir = data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100))*data[i].disc_2/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100))*data[i].disc_2/100))*data[i].disc_3/100);

                laba = ((data[i].harga_jual - harga_akhir)/harga_akhir)*100;
                totalpenjualan+=harga_akhir*data[i].jumlah;
                html += '<tr>'+
                '<td>'+ no++ +'</td>'+
                '<td>'+data[i].kode_produk+'</td>'+
                '<td>'+data[i].barcode+'</td>'+
                '<td>'+data[i].nama_produk+'</td>'+
                '<td>'+data[i].harga_jual+'</td>'+
                // '<td>'+data[i].disc_1+'</td>'+
                // '<td>'+data[i].disc_2+'</td>'+
                // '<td>'+data[i].disc_3+'</td>'+
                '<td>'+harga_akhir.toFixed(2)+'</td>'+
                '<td>'+data[i].jumlah+'</td>'+
                '<td>'+data[i].jumlah*harga_akhir.toFixed(2)+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" product_code="'+data[i].kode_produk+'" det_nama_produk="'+data[i].nama_produk+'" jumlah_produk_edit="'+data[i].jumlah+'" harga_edit="'+data[i].harga+'" disc_1_edit="'+data[i].disc_1+'" disc_2_edit="'+data[i].disc_2+'" disc_3_edit="'+data[i].disc_3+'" harga_akhir_edit="'+harga_akhir+'" harga_jual_edit="'+data[i].harga_jual+'" nota="'+data[i].id_pembelian+'" barcode_edit="'+data[i].barcode+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].product_code+'">Delete</a>'+
                '</td>'+
                '</tr>';
                
              }
              $('#show_data').html(html);
              $('#total_beli').html(convertToRupiah(totalpenjualan));
            }

          });
        }
        function convertToRupiah(angka)
        {
          var rupiah = '';    
          var angkarev = angka.toString().split('').reverse().join('');
          for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
            return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
        }
        $(document).ready(function(){
          $('#btn_tambah_faktur').on('click',function(){
            var id_admin = <?=$id_admin?>;
            $.ajax({
              type : "post",
              url  : "<?php echo site_url('kasir/get_faktur')?>",
              dataType : "JSON",
              data: {id_admin:id_admin},
              success: function(data){
                $('#faktur_pembelian').val(data);
                var faktur = $('#faktur_pembelian').val();
                window.location.replace("<?=base_url('kasir/index/')?>"+faktur+"");
              }
            });
            return false;
          });
        });
        //Save product
        $('#btn_save').on('click',function(){
          var product_code = $('#product_code').val();
          var product_name = $('#product_name').val();
          var price        = $('#price').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('product/save')?>",
            dataType : "JSON",
            data : {product_code:product_code , product_name:product_name, price:price},
            success: function(data){
              $('[name="product_code"]').val("");
              $('[name="product_name"]').val("");
              $('[name="price"]').val("");
              $('#Modal_Add').modal('hide');
              show_product();
            }
          });
          return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
          var kode_produk_edit = $(this).attr('product_code');
          var product_name = $(this).attr('det_nama_produk');
          var nota        = $(this).attr('nota');
          var jumlah_produk_edit  = $(this).attr('jumlah_produk_edit');
          var disc_1_edit  = $(this).attr('disc_1_edit');
          var disc_2_edit  = $(this).attr('disc_2_edit');
          var disc_3_edit  = $(this).attr('disc_3_edit');
          var hpp_edit  = $(this).attr('hpp_edit');
          var harga_jual_edit  = $(this).attr('harga_jual_edit');
          var harga_edit  = $(this).attr('harga_edit');
          var barcode_edit  = $(this).attr('barcode_edit');

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/info_barang_beli')?>",
            dataType : "JSON",
            data : {kode_produk_edit:kode_produk_edit, id_pembelian:nota },
            success: function(data){
              $('#Modal_Edit').modal('show');
              $('[name="kode_produk_edit"]').val(kode_produk_edit);
              $('[name="nama_produk_edit"]').val(product_name);
              $('[name="barcode_edit"]').val(barcode_edit);
              $('[name="harga_edit"]').val(harga_edit);
              $('[name="jumlah_produk_edit"]').val(jumlah_produk_edit);
              $('[name="disc_1_edit"]').val(disc_1_edit);
              $('[name="disc_2_edit"]').val(disc_2_edit);
              $('[name="disc_3_edit"]').val(disc_3_edit);
              // $('[name="hpp_edit"]').val(hpp_edit);
              $('#harga_edit,#disc_1_edit,#disc_2_edit,#disc_3_edit,#hpp_edit,#harga_jual_edit,.item_edit').on('keydown click change keyup paste blur load keyup',function(){
                var disc_1_edit_hpp = $('#disc_1_edit').val();
                var disc_2_edit_hpp = $('#disc_2_edit').val();
                var disc_3_edit_hpp = $('#disc_3_edit').val();
                var harga_edit_hpp = $('#harga_edit').val();
                var harga_jual_edit_hpp = $('#harga_jual_edit').val();
                hpp_akhir = harga_edit_hpp-(harga_edit_hpp*disc_1_edit_hpp/100)-((harga_edit_hpp-(harga_edit_hpp*disc_1_edit_hpp/100))*disc_2_edit_hpp/100)-((harga_edit_hpp-(harga_edit_hpp*disc_1_edit_hpp/100)-((harga_edit_hpp-(harga_edit_hpp*disc_1_edit_hpp/100))*disc_2_edit_hpp/100))*disc_3_edit_hpp/100);
                laba = ((harga_jual_edit_hpp - hpp_akhir)/hpp_akhir)*100;
                $('[name="hpp_edit"]').val(hpp_akhir);
                $('[name="laba_jual_edit"]').val(laba);
              });
              
              $('[name="harga_jual_edit"]').val(harga_jual_edit);
            }
          });
        });
        //update record to database
        $('#btn_simpan_edit').on('click',function(){

          var kode_faktur = $('#kode_faktur').val();
          var kode_produk_edit = $('#product_code_edit').val();
          var nama_produk_edit = $('#nama_produk_edit').val();
          var barcode_edit = $('#barcode_edit').val();
          var harga_edit = $('#harga_edit').val();
          var jumlah_produk_edit = $('#jumlah_produk_edit').val();
          var disc_1_edit = $('#disc_1_edit').val();
          var disc_2_edit = $('#disc_2_edit').val();
          var disc_3_edit = $('#disc_3_edit').val();
          var hpp_edit = $('#hpp_edit').val();
          var harga_jual_edit = $('#harga_jual_edit').val();
          var laba_jual_edit = $('#laba_jual_edit').val();



          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/update_daftar_pembelian')?>",
            dataType : "JSON",
            data : {kode_faktur:kode_faktur,
              kode_produk_edit:kode_produk_edit,
              nama_produk_edit:nama_produk_edit,
              barcode_edit:barcode_edit,
              harga_edit:harga_edit,
              jumlah_produk_edit:jumlah_produk_edit,
              disc_1_edit:disc_1_edit,
              disc_2_edit:disc_2_edit,
              disc_3_edit:disc_3_edit,
              hpp_edit:hpp_edit,
              harga_jual_edit:harga_jual_edit,
              laba_jual_edit:laba_jual_edit},
              success: function(data){
                $('#Modal_Edit').modal('hide');
                show_product();
              }
            });
          return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
          var product_code = $(this).data('product_code');

          $('#Modal_Delete').modal('show');
          $('[name="product_code_delete"]').val(product_code);
        });

        //delete record to database
        $('#btn_delete').on('click',function(){
          var product_code = $('#product_code_delete').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('product/delete')?>",
            dataType : "JSON",
            data : {product_code:product_code},
            success: function(data){
              $('[name="product_code_delete"]').val("");
              $('#Modal_Delete').modal('hide');
              show_product();
            }
          });
          return false;
        });

        $('.tambah_pembelian').on('click',function(){
          var kode_produk = $(this).attr('kode_produk');
          var uri =$(this).attr('uri');
          var nama_admin = $(this).attr('nama_admin');
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/tambah_pembelian')?>",
            dataType : "JSON",
            data : {kode_produk:kode_produk, uri:uri, nama_admin:nama_admin},
            success: function(data){
             show_product();
             swal ( "Sukses" ,  "Produk Berhasil Ditambahkan!" ,  "success", {
              buttons: false,
              timer: 1000,
            } );

           },
           error: (function(data) {
            show_product();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Produk sudah ada di list!" ,  "error",  {
                buttons: false,
                timer: 1000,
              } );
            })
         });
          return false;
        });
        $('.posting').on('click',function(){
          var kode_faktur =$(this).attr('kode_faktur_posting');

          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/posting_pembelian')?>",
            dataType : "JSON",
            data : {kode_faktur:kode_faktur},
            success: function(data){
             show_product();
             swal ( "Sukses" ,  "Produk Berhasil Diposting!" ,  "success", {
              buttons: false,
              timer: 1000,
            } );
             window.location.replace("<?=base_url('admin/pembelian')?>");

           },
           error: (function(data) {
            show_product();
              // alert('Gagal\nProduk sudah ada di list');
              swal ( "Gagal" ,  "Gagal diposting!" ,  "error",  {
                buttons: false,
                timer: 1000,
              } );
            })
         });
          return false;
        });

      });
    $(document).ready(function() {
      $('#barang').DataTable();
    } );
  </script>
  <script type="text/javascript">
    var cari = document.getElementById("kode_barang");
    
    cari.addEventListener("keyup", function(event) {
      event.preventDefault();
      if (event.keyCode === 13) {
        var kode_barang =  $('#kode_barang').val();
        alert( ""+kode_barang+"" );
      }
    });


    document.onkeyup = function(e) {
      if (e.which == 120) {
    $('#Modal_Pembayaran').modal('show'); //f9
  } else if (e.ctrlKey && e.which == 65) {
    alert("Ctrl + A shortcut combination was pressed"); //ctrl+a
  } 
};
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