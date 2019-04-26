  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <a href="<?=base_url('kasir')?>"><i class="fa fa-dashboard"></i> Kasir</a>
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url('kasir')?>"><i class="fa fa-dashboard"></i> Kasir</a></li>
        <li><a href="#">Index</a></li>
        <li class="active"><?=$uri?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="collapse multi-collapse" id="multiCollapseExample2">
        <!-- Default box -->
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Cari Barang</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="row form-inline">
              <div class="col-md-3" >
                <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Tutup</button>
              </div>
            </div>

            <div class="box-body">
             <table class="table table-bordered table-striped" id="barang">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Barang</th>
                  <th>Kode Barcode</th>
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <!-- <th>Harga Awal</th> -->
                  <!--       <th>HPP</th> -->
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
                  <!--   <td><?=$prdk->harga?></td> -->
                  <!-- <td><?=$hpp?></td> -->
                  <td><?=$prdk->harga_jual?></td>
                  <td>
                    <a href="javascript:void(0);" class="btn btn-success btn-block tambah_pembelian"  kode_produk="<?=$prdk->kode_produk?>" uri="<?=$uri?>" nama_admin="<?=$nama_admin?>" >Tambah <i class="mdi mdi-plus"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>  
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            How to use
          </button>

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->


    </div>
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Barang Kasir</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="row form-inline">
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
          <div class="col-md-1">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Cari Barang</button>  
          </div>


        </div>
        <div class="row form-inline">
         <div class="col-md-12" >
          Total:
          <span id="total_beli_terbilang"></span>  
        </div>
      </div>
      <div class="box-body">
        <div id="reload">
          <div class="table-responsive" >

           <table class="table table-bordered table-striped" id="mydata">
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
    <!-- /.box-body -->
    <div class="box-footer">
      <button type="button" class="btn btn-default" data-toggle="modal" data-target="#Modal_help">
        How to use (F2)
      </button>
      
      <!--   <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Cari Barang</button> -->

    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.box-body -->

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
        <input type="text" name="kode_faktur" id="kode_faktur" value="<?=$uri?>" class="form-control hidden"  required="true" > 
        <div class="form-group">
          <div class="col-md-12">
            <label>Nama Produk</label>
          </div>
          <div class="col-md-12">
            <input name="nama_produk_edit" id="nama_produk_edit" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Kode Produk</label>
          </div>
          <div class="col-md-12">
            <input type="text" name="kode_produk_edit" id="product_code_edit" class="form-control"  disabled >     
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Barcode</label>
          </div>
          <div class="col-md-12">
            <input type="text" name="barcode_edit" id="barcode_edit" class="form-control" disabled>    
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Jumlah Produk</label>
          </div>
          <div class="col-md-12">
            <input name="jumlah_produk_edit" id="jumlah_produk_edit" class="form-control" type="number" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Harga Jual</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="harga_jual_edit" id="harga_jual_edit" class="form-control"  required="true" >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Discount 1 (%)</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="disc_1_edit" id="disc_1_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Discount 2 (%)</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="disc_2_edit" id="disc_2_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Discount 3 (%)</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="disc_3_edit" id="disc_3_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Potongan Harga</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="potongan_harga" id="potongan_harga" class="form-control"  required="true"  >    
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Harga Akhir</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="harga_akhir_edit" id="harga_akhir_edit" class="form-control"  disabled>    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
      </div>

      <div class="modal-footer">

        <button class="btn btn-info" id="btn_simpan_edit">Simpan</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

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
       <h3 class="modal-title" id="myModalLabel">Bayar (F9)</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="kode_faktur_bayar" id="kode_faktur_bayar" value="<?=$uri?>" class="form-control hidden"  required="true" > 
        <div class="form-group">
          <div class="col-md-12">
            <label>Sub Total</label>
          </div>
          <div class="col-md-12">
            <input name="bayar_sub_total" id="bayar_sub_total" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Discount</label>
          </div>
          <div class="col-md-12">
            <input name="bayar_discount" id="bayar_discount" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Potongan</label>
          </div>
          <div class="col-md-12">
            <input type="text" name="bayar_potongan" id="bayar_potongan" class="form-control" disabled>     
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Total</label>
          </div>
          <div class="col-md-12">
            <input type="text" name="bayar_total" id="bayar_total" class="form-control hidden">
            <input type="text" name="bayar_total_rp" id="bayar_total_rp" class="form-control"  disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Terbilang</label>
          </div>
          <div class="col-md-12">  
            <font color="blue"><span id="bayar_terbilang"></span>  </font>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Uang Bayar</label>
          </div>
          <div class="col-md-12">
            <input type="text" name="bayar_uang_bayar" id="bayar_uang_bayar" class="form-control" required>    
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label>Kembalian</label>
          </div>
          <div class="col-md-12">
            <input name="bayar_kembalian" id="bayar_kembalian" class="form-control" type="number" disabled>
            <font color="green">  <span id="bayar_kembalian_terbilang"></span></font>
          </div>
        </div>
      </div>


      <div class="modal-footer">
        <button class="btn btn-info" id="btn_simpan_bayar">Simpan</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT-->
<div class="modal fade" id="Modal_help">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Bantuan</h4>
        </div>
        <div class="modal-body">
          <p>Pembayaran : F9</p>
          <p>Bantuan : F2</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  <style type="text/css" media="screen">

</style>

<div class="modal fade" id="Modal_Faktur" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Faktur</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
       <x id="faktur_print">
       </div>


       <div class="modal-footer">
        <input type="button" class="btn" onclick="printDiv('printableArea')" value="print a div!" />

        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
      </div>
    </form>
  </div>
</div>
</div>
<!--END MODAL EDIT-->
<!-- content-wrapper ends -->
<!--MODAL HAPUS-->
<div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Hapus Produk Dari Pembelian</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="product_code_delete" id="product_code_delete_pembelian">
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus produk <span id="product_name_delete"></span>?</p>
            Kode: <span id="product_code_delete"></span>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button class="btn_hapus btn btn-danger" id="btn_delete">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL HAPUS-->
<!-- <script src="<?=base_url('assets/jscode/')?>/jquery-3.3.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="<?=base_url('assets/')?>DataTables1/datatables.min.js"></script> -->
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#example').DataTable();

  } );
</script>
<script type="text/javascript">
  function printDiv(divName) {
   var printContents = document.getElementById(divName).innerHTML;
   var originalContents = document.body.innerHTML;

   document.body.innerHTML = printContents;

   window.print();

   document.body.innerHTML = originalContents;
 }
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
                harga_akhir = data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100))*data[i].disc_2/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100))*data[i].disc_2/100))*data[i].disc_3/100)-data[i].potongan;

                laba = ((data[i].harga_jual - harga_akhir)/harga_akhir)*100;
                totalpenjualan+=harga_akhir*data[i].jumlah;
                // subtotal+=data[i].harga_jual*data[i].jumlah;
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
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" product_code="'+data[i].kode_produk+'" det_nama_produk="'+data[i].nama_produk+'" jumlah_produk_edit="'+data[i].jumlah+'" harga_edit="'+data[i].harga+'" disc_1_edit="'+data[i].disc_1+'" disc_2_edit="'+data[i].disc_2+'" disc_3_edit="'+data[i].disc_3+'"  harga_jual_edit="'+data[i].harga_jual+'" nota="'+data[i].id_pembelian+'" barcode_edit="'+data[i].barcode+'" potongan_harga_edit="'+data[i].potongan+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" product_code_delete="'+data[i].kode_produk+'" product_name_delete="'+data[i].nama_produk+'">Delete</a>'+
                '</td>'+
                '</tr>';
                // harga_akhir_edit="'+harga_akhir+'"
                
              }
              $('#show_data').html(html);
              $('#total_beli').html(convertToRupiah(totalpenjualan.toFixed(2)));
              // $('#sub_total').html(convertToRupiah(subtotal.toFixed(2)));
              $('#total_beli_terbilang').html(sayit(totalpenjualan));
            }

          });
        }
        var thoudelim=".";
        var decdelim=",";
        var curr="Rp ";
        var d=document;

  // format(1000000.5,3) : 1.000.000,500
  // format(1000000.55555,3) : 1.000.000,556
  document.onkeyup = function(e) {
    if (e.which == 120) {
      var faktur = "<?=$uri?>";
      $.ajax({
        type  : 'post',
        url   : '<?php echo site_url('kasir/penjualan_barang')?>',
        async : false,
        dataType : 'json',
        data :{faktur:faktur},
        success : function(bayar){
          var html = '';
          var i;
          var no = 1;
          var totalpenjualan=0;
          var subtotal=0;
          var bayar_discount=0;
          var potongan=0;
          var bayartotalpenjualan = 0;
          for(i=0; i<bayar.length; i++){
            harga_akhir_pembayaran = bayar[i].harga_jual-(bayar[i].harga_jual*bayar[i].disc_1/100)-((bayar[i].harga_jual-(bayar[i].harga_jual*bayar[i].disc_1/100))*bayar[i].disc_2/100)-((bayar[i].harga_jual-(bayar[i].harga_jual*bayar[i].disc_1/100)-((bayar[i].harga_jual-(bayar[i].harga_jual*bayar[i].disc_1/100))*bayar[i].disc_2/100))*bayar[i].disc_3/100)-bayar[i].potongan;

            bayartotalpenjualan+=harga_akhir_pembayaran*bayar[i].jumlah;
            subtotal+=bayar[i].harga_jual*bayar[i].jumlah;
            bayar_discount+=bayar[i].jumlah*(bayar[i].harga_jual*bayar[i].disc_1/100)-((bayar[i].harga_jual-(bayar[i].harga_jual*bayar[i].disc_1/100))*bayar[i].disc_2/100)-((bayar[i].harga_jual-(bayar[i].harga_jual*bayar[i].disc_1/100)-((bayar[i].harga_jual-(bayar[i].harga_jual*bayar[i].disc_1/100))*bayar[i].disc_2/100))*bayar[i].disc_3/100);
            potongan+=bayar[i].potongan*bayar[i].jumlah;
          }

          $('#bayar_sub_total').val(subtotal);
          $('#bayar_discount').val(bayar_discount);
          $('#bayar_potongan').val(potongan);
          $('#bayar_total').val(bayartotalpenjualan);
          $('#bayar_total_rp').val(convertToRupiah(bayartotalpenjualan.toFixed(2)));
          $('#bayar_terbilang').html(sayit(bayartotalpenjualan));
          $('#bayar_uang_bayar').on('keydown click change keyup paste blur load keyup',function(){
           var uang = $('#bayar_uang_bayar').val();
           var kembalian = uang-bayartotalpenjualan;

           $('#bayar_kembalian').val(kembalian);
           if (kembalian>=0) {
             $('#bayar_kembalian_terbilang').html(sayit(kembalian));
           }else{
             $('#bayar_kembalian_terbilang').html('<font color="red">MINUS</font> '+sayit(-kembalian)+' Uang Pembayaran Kurang '+sayit(-kembalian));
           }
         });
          $('#Modal_Pembayaran').modal('show');
        }

      });



    } else if (e.ctrlKey && e.which == 65) {
    alert("Ctrl + A shortcut combination was pressed"); //ctrl+a
  } else if (e.which == 113) { //F2
    $('#Modal_help').modal('show');
  }
};

$('#btn_simpan_bayar').on('click',function(){
  var sub_total = $('#bayar_sub_total').val();
  var discount = $('#bayar_discount').val();
  var potongan = $('#bayar_potongan').val();
  var terbilang = $('#bayar_terbilang').val();
  var uang_bayar = $('#bayar_uang_bayar').val();
  var kembalian = $('#bayar_kembalian').val();
  var kode_faktur = $('#kode_faktur_bayar').val();
  $.ajax({
    type : "POST",
    url  : "<?php echo site_url('kasir/simpan_pembayaran')?>",
    dataType : "JSON",
    data : {sub_total:sub_total , discount:discount, potongan:potongan, terbilang:terbilang,uang_bayar:uang_bayar,kembalian:kembalian,kode_faktur:kode_faktur},
    success: function(data){

      // $('#Modal_Pembayaran').modal('hide');
      $.ajax({
        type : "POST",
        url  : "<?php echo site_url('kasir/show_nota')?>",
        dataType : "JSON",
        data : {kode_faktur:kode_faktur},
        success: function(data){
          var faktur_tabel_html="";
          var faktur_header="";
          var faktur_footer="";
          var nama_perusahaan="<?=$nama_perusahaan?>";
          var logo="<?php echo site_url('assets/gambar/web/').$logo?>";
          var alamat="<?=$alamat?>";
          var nama_admin ="<?=$nama_admin?>";
          var telepon ="<?=$telepon?>";
          var email ="<?=$email?>";
          var tanggal ="<?=$tanggal?>";
          var nama_client = "<?=$nama_client?>";
          var alamat_client = "<?=$alamat_client?>";
          var hp_client = "<?=$hp_client?>";
          var email_client = "<?=$email_client?>";
          var no = 1;
          var total_belanja = 0;
          var nomor_faktur = "<?=$uri?>";
          var total_barang_harga = 0;

          for(i=0; i<data.length; i++){
            var harga_akhir = data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100))*data[i].disc_2/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100)-((data[i].harga_jual-(data[i].harga_jual*data[i].disc_1/100))*data[i].disc_2/100))*data[i].disc_3/100)-data[i].potongan;
            var harga = harga_akhir*data[i].jumlah;
            total_belanja += harga;
            harga_awal = data[i].harga_jual;
            faktur_tabel_html +='<tr>'+
            '<td>'+no++ +'</td>'+
            '<td>'+data[i].barcode+'</td>'+
            '<td>'+data[i].nama_produk+'</td>'+
            '<td>'+data[i].jumlah+'</td>'+
            '<td>'+data[i].harga_jual+'</td>'+
            '<td>'+data[i].disc_1+'</td>'+
            '<td>'+data[i].disc_2+'</td>'+
            '<td>'+data[i].disc_3+'</td>'+
            '<td>'+data[i].potongan+'</td>'+
            '<td>'+harga_akhir+'</td>'+
            '<td>'+convertToRupiah(harga.toFixed(0))+'</td>'+
            '</tr>';
            total_barang_harga+=data[i].jumlah*harga_awal;

          }
          total_potongan = -1*(total_belanja-total_barang_harga);
          faktur_header = '<div id="printableArea">'+
          '<div class="wrapper">'+
          '<section class="invoice">'+
          '<div class="row">'+
          '<div class="col-xs-12">'+
          '<h2 class="page-header">'+
          '<img src="'+logo+'" height=25></i> '+nama_perusahaan+'.'+
          '<small class="pull-right">Date: '+tanggal+'</small>'+
          '</h2>'+
          '</div>'+
          '</div>'+
          '<div class="row invoice-info">'+
          '<div class="col-sm-4 invoice-col">'+
          'From'+
          '<address>'+
          '<strong>Admin, '+nama_admin+'.</strong><br>'+
          ''+alamat+'<br/>'+
          'Phone: '+telepon+''+
          'Email: '+email+''+
          '</address>'+
          '</div>'+
          '<div class="col-sm-4 invoice-col">'+
          'To'+
          '<address>'+
          '<strong>'+nama_client+'</strong><br>'+
          ''+alamat_client+'<br>'+
          'Phone: '+hp_client+''+
          'Email: '+email_client+''+
          '</address>'+
          '</div>'+
          '<div class="col-sm-4 invoice-col">'+
          '<b>Invoice #'+nomor_faktur+'</b><br>'+
          '<br>'+
          '<b>Order ID:</b>'+nomor_faktur+'<br>'+
          // '<b>Payment Due:</b> '+tanggal+'<br>'+
         
          '</div>'+
          '</div>'+
          '<div class="row">'+
          '<div class="col-xs-12 table-responsive">'+
          '<table class="table table-striped">'+
          '<thead>'+
          '<tr>'+
          '<th>No</th>'+
          '<th>Kode Produk</th>'+
          '<th>Nama</th>'+
          '<th>Qty</th>'+
          '<th>Harga/produk</th>'+
          '<th>Disc 1</th>'+
          '<th>Disc 2</th>'+
          '<th>Disc 3</th>'+
          '<th>Potongan</th>'+
          '<th>Harga</th>'+
          '<th>Subtotal</th>'+
          '</tr>'+
          '</thead>'+
          '<tbody>';
          faktur_footer ='</tbody>'+
          '</table>'+
          '</div>'+
          '</div>'+
          '<div class="row">'+
          '<div class="col-xs-6">'+
          // '<p class="lead">Payment Methods:</p>'+
          // '<img src="../../dist/img/credit/visa.png" alt="Visa">'+
          // '<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">'+
          // '<img src="../../dist/img/credit/american-express.png" alt="American Express">'+
          // '<img src="../../dist/img/credit/paypal2.png" alt="Paypal">'+
          ' <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">'+
          ' Tanda Tangan <br><br><br>'+
          ' Penerima<br><br'+
          ' ........'+
          '</p>'+
          '</div>'+
          ' <div class="col-xs-6">'+
          // '<p class="lead">Amount Due 2/22/2014</p>'+
          '<div class="table-responsive">'+
          ' <table class="table">'+
          '<tr>'+
          '<th style="width:50%">Subtotal:</th>'+
          '<td>'+convertToRupiah(total_barang_harga.toFixed(0))+'</td>'+
          '</tr>'+
          '<tr>'+
          // '<th>Tax (9.3%)</th>'+
          // '<td>$10.34</td>'+
          // '</tr>'+
          // '<tr>'+
          '<th>Potongan:</th>'+
          '<td>'+convertToRupiah(total_potongan.toFixed(0))+'</td>'+
          '</tr>'+
          '<tr>'+
          '<th>Total:</th>'+
          ' <td>'+convertToRupiah(total_belanja.toFixed(0))+'</td>'+
          '</tr>'+
          '</table>'+
          ' </div>'+
          ' </div>'+
          '</div>'+
          '</section>'+
          '</div>'+
          '</div>';
          faktur_print = ''+faktur_header+''+faktur_tabel_html+''+faktur_footer+'';

          $('#faktur_header').html(faktur_header);
          $('#faktur_tabel').html(faktur_tabel_html);
          $('#faktur_footer').html(faktur_footer);
          $('#faktur_id').val('kode_faktur');
          $('#faktur_print').html(faktur_print);
          $('#Modal_Faktur').modal('show');
        }
      }),
  show_product();
}
});
  return false;
});

  function format(s,r) {
    s=Math.round(s*Math.pow(10,r))/Math.pow(10,r);
    s=String(s);s=s.split(".");var l=s[0].length;var t="";var c=0;
    while(l>0){t=s[0][l-1]+(c%3==0&&c!=0?thoudelim:"")+t;l--;c++;}
    s[1]=s[1]==undefined?"0":s[1];
    for(i=s[1].length;i<r;i++) {s[1]+="0";}
      return curr+t+decdelim+s[1];
  }

  function threedigit(word) {
    eja=Array("Nol","Satu","Dua","Tiga","Empat","Lima","Enam","Tujuh","Delapan","Sembilan");
    while(word.length<3) word="0"+word;
    word=word.split("");
    a=word[0];b=word[1];c=word[2];
    word="";
    word+=(a!="0"?(a!="1"?eja[parseInt(a)]:"Se"):"")+(a!="0"?(a!="1"?" Ratus":"ratus"):"");
    word+=" "+(b!="0"?(b!="1"?eja[parseInt(b)]:"Se"):"")+(b!="0"?(b!="1"?" Puluh":"puluh"):"");
    word+=" "+(c!="0"?eja[parseInt(c)]:"");
    word=word.replace(/Sepuluh ([^ ]+)/gi, "$1 Belas");
    word=word.replace(/Satu Belas/gi, "Sebelas");
    word=word.replace(/^[ ]+$/gi, "");

    return word;
  }
  function sayit(s) {
    var thousand=Array("","Ribu","Juta","Milyar","Trilyun");
    s=Math.round(s*Math.pow(10,2))/Math.pow(10,2);
    s=String(s);s=s.split(".");
    var word=s[0];
    var cent=s[1]?s[1]:"0";
    if(cent.length<2) cent+="0";

    var subword="";i=0;
    while(word.length>3) {
      subdigit=threedigit(word.substr(word.length-3, 3));
      subword=subdigit+(subdigit!=""?" "+thousand[i]+" ":"")+subword;
      word=word.substring(0, word.length-3);
      i++;
    }
    subword=threedigit(word)+" "+thousand[i]+" "+subword;
    subword=subword.replace(/^ +$/gi,"");

    word=(subword==""?"NOL":subword.toUpperCase())+" RUPIAH";
    subword=threedigit(cent);
    cent=(subword==""?"":" ")+subword.toUpperCase()+(subword==""?"":" SEN");
    return word+cent;
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
          var potongan_harga  = $(this).attr('potongan_harga_edit');

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
              $('[name="potongan_harga"]').val(potongan_harga);
              $('#potongan_harga,#harga_edit,#disc_1_edit,#disc_2_edit,#disc_3_edit,#hpp_edit,#harga_jual_edit,.item_edit').on('keydown click change keyup paste blur load keyup',function(){
                var disc_1_edit_hpp = $('#disc_1_edit').val();
                var disc_2_edit_hpp = $('#disc_2_edit').val();
                var disc_3_edit_hpp = $('#disc_3_edit').val();
                var harga_edit_hpp = $('#harga_edit').val();
                var harga_jual_edit = $('#harga_jual_edit').val();
                var potongan_harga = $('#potongan_harga').val();
                harga_akhir_edit_sementara = harga_jual_edit-(harga_jual_edit*disc_1_edit_hpp/100)-((harga_jual_edit-(harga_jual_edit*disc_1_edit_hpp/100))*disc_2_edit_hpp/100)-((harga_jual_edit-(harga_jual_edit*disc_1_edit_hpp/100)-((harga_jual_edit-(harga_jual_edit*disc_1_edit_hpp/100))*disc_2_edit_hpp/100))*disc_3_edit_hpp/100);
                harga_akhir_edit = harga_akhir_edit_sementara-potongan_harga;
                // laba = ((harga_jual_edit_hpp - hpp_akhir)/hpp_akhir)*100;
                // $('[name="hpp_edit"]').val(hpp_akhir);
                // $('[name="laba_jual_edit"]').val(laba);
                $('[name="harga_akhir_edit"]').val(harga_akhir_edit);

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
          var potongan = $('#potongan_harga').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('kasir/update_daftar_pembelian')?>",
            dataType : "JSON",
            data : {potongan:potongan,
              kode_faktur:kode_faktur,
              kode_produk_edit:kode_produk_edit,
              nama_produk_edit:nama_produk_edit,
              barcode_edit:barcode_edit,
              harga_edit:harga_edit,
              jumlah_produk_edit:jumlah_produk_edit,
              disc_1_edit:disc_1_edit,
              disc_2_edit:disc_2_edit,
              disc_3_edit:disc_3_edit,
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
          var product_code = $(this).attr('product_code_delete');
          var product_name = $(this).attr('product_name_delete');

          $('#product_code_delete_pembelian').val(product_code);
          $('#product_code_delete').html(product_code);
          $('#product_name_delete').html(product_name);
          $('#Modal_Delete').modal('show');
        });

        //delete record to database
        $('#btn_delete').on('click',function(){
          var product_code = $('#product_code_delete_pembelian').val();
          var faktur = "<?=$uri?>";
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('kasir/hapus_daftar')?>",
            dataType : "JSON",
            data : {product_code:product_code, faktur:faktur},
            success: function(data){
              $('[name="product_code_delete_pembelian"]').val("");
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
            url  : "<?php echo site_url('kasir/tambah_penjualan')?>",
            dataType : "JSON",
            data : {kode_produk:kode_produk, uri:uri, nama_admin:nama_admin},
            success: function(data){
             show_product();
             swal ( "Sukses" ,  "Produk Berhasil Ditambahkan!" ,  "success", {
              buttons: false,
              timer: 1000,
            } );
             $('#multiCollapseExample2').collapse('hide');

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

        var cari = document.getElementById("kode_barang");

        cari.addEventListener("keyup", function(event) {
          event.preventDefault();
          var audio = new Audio("<?=base_url('assets/sound/fail.mp3')?>");
          var beepaudio = new Audio("<?=base_url('assets/sound/beep.mp3')?>");
      if (event.keyCode === 13) { //enter
        var kode_barcode =  $('#kode_barang').val();
        var faktur = "<?=$uri?>";
        $.ajax({
          type : "POST",
          url  : "<?php echo site_url('kasir/tambah_by_barcode')?>",
          dataType : "JSON",
          data : {kode_barcode:kode_barcode, faktur:faktur},
          success: function(data){
           show_product();
           beepaudio.play();
          //  swal ( "Sukses" ,  "Produk Berhasil Ditambahkan!" ,  "success", {
          //   buttons: false,
          //   timer: 500,
          // } );

          $('#kode_barang').val('');

        },
        error: (function(data) {
          show_product();
              // alert('Gagal\nProduk sudah ada di list');
              audio.play();
              swal ( "Gagal" ,  "Gagal Ditambahkan!" ,  "error",  {
                buttons: false,
                timer: 1000,
              } );
              $('#kode_barang').val('');
            })

      });

      }
    });

      });
  $(document).ready(function() {
    $('#barang').DataTable();
  } );
</script>
<script type="text/javascript">




</script>