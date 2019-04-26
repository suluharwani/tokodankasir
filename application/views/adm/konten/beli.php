  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pembelian Barang
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#">Beli</a></li>
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
        <h3 class="box-title">Daftar Pembelian Barang</h3>

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
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Cari Barang</button>
          </div>
          <div class="col-md-3" >
            No Faktur: <?=$uri?>
          </div>
          <div class="col-md-4" >
            Total:
            <span id="total_beli"></span>  
          </div>
          <div class="col-md-1" >
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

     </div>
     <div class="row form-inline">
       <div class="col-md-12" >
        Total:
        <span id="total_beli_terbilang"></span>  
      </div>
    </div>
    <div class="box-body">
      <div class="table-responsive" >
       <table class="table table-bordered table-striped" id="mydata">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Harga Beli</th>
            <th>Dics 1</th>
            <th>Disc 2</th>
            <th>Disc 3</th>
            <th>HPP</th>
            <th>Harga Jual</th>
            <th>Laba</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Admin</th>
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
    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
      How to use
    </button>
  </div>
  <!-- /.box-footer-->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
            <label class="control-label" >Nama Produk</label>
          </div>
          <div class="col-md-12">
            <input name="nama_produk_edit" id="nama_produk_edit" class="form-control" type="text" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Kode Produk</label>
          </div>
          <div class="col-md-12">
            <input type="text" name="kode_produk_edit" id="product_code_edit" class="form-control"  disabled >     
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Barcode</label>
          </div>
          <div class="col-md-12">
            <input type="text" name="barcode_edit" id="barcode_edit" class="form-control" required>    
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Jumlah Produk</label>
          </div>
          <div class="col-md-12">
            <input name="jumlah_produk_edit" id="jumlah_produk_edit" class="form-control" type="number" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >HPP Pembelian</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="harga_edit" id="harga_edit" class="form-control"  required="true" >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Discount 1 (%)</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="disc_1_edit" id="disc_1_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Discount 2 (%)</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="disc_2_edit" id="disc_2_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Discount 3 (%)</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="disc_3_edit" id="disc_3_edit" class="form-control"  >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >HPP Akhir</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="hpp_edit" id="hpp_edit" class="form-control"  required="true" disabled >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Harga Jual</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="harga_jual_edit" id="harga_jual_edit" class="form-control"  required="true" >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label class="control-label" >Laba Jual %</label>
          </div>
          <div class="col-md-12">
            <input type="number" name="laba_jual_edit" id="laba_jual_edit" class="form-control"  disabled >    
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
          <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!--END MODAL HAPUS-->
<!-- content-wrapper ends -->
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#example').DataTable();

  } );
  var thoudelim=".";
  var decdelim=",";
  var curr="Rp ";
  var d=document;

  // format(1000000.5,3) : 1.000.000,500
  // format(1000000.55555,3) : 1.000.000,556

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

  // 1 SEN = 1/100 RUPIAH = 0.01 RUPIAH

  // sayit(1000000) : SATU JUTA RUPIAH
  // sayit(1000000.5) = 1000000.50 : SATU JUTA RUPIAH LIMA PULUH SEN
  // sayit(1000000.05) : SATU JUTA RUPIAH LIMA SEN
  // sayit(1000000.11) : SATU JUTA RUPIAH SEBELAS SEN
  // sayit(1000000.55555) = 1000000.56 : SATU JUTA RUPIAH LIMA PULUH ENAM SEN

  function sayit(s) {
    var thousand=Array("","Ribu","Juta","Milyar","Trilyun","Quadrilyun","Quintillion","Sextillion","Septillion","Octillion");
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
</script>
<script type="text/javascript">
  $(document).ready(function(){
        show_product(); //call function show all product

        $('#mydata').dataTable();

        //function show all product
        function show_product(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('admin/pembelian_barang/')?><?=$uri?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              var no = 1;
              var totalhpp=0;

              for(i=0; i<data.length; i++){
                hpp = data[i].harga-(data[i].harga*data[i].disc_1/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100))*data[i].disc_2/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100))*data[i].disc_2/100))*data[i].disc_3/100);

                laba = ((data[i].harga_jual - hpp)/hpp)*100;

                totalhpp+=hpp*data[i].jumlah;
                html += '<tr>'+
                '<td>'+ no++ +'</td>'+
                '<td>'+data[i].kode_produk+'</td>'+
                '<td>'+data[i].barcode+'</td>'+
                '<td>'+data[i].nama_produk+'</td>'+
                '<td>'+data[i].harga+'</td>'+
                '<td>'+data[i].disc_1+'</td>'+
                '<td>'+data[i].disc_2+'</td>'+
                '<td>'+data[i].disc_3+'</td>'+
                '<td>'+hpp+'</td>'+
                '<td>'+data[i].harga_jual+'</td>'+
                '<td>'+laba.toFixed(2)+' %</td>'+
                '<td>'+data[i].jumlah+'</td>'+
                '<td>'+convertToRupiah(data[i].jumlah*hpp)+'</td>'+
                '<td>'+data[i].nama_admin+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" product_code="'+data[i].kode_produk+'" det_nama_produk="'+data[i].nama_produk+'" jumlah_produk_edit="'+data[i].jumlah+'" harga_edit="'+data[i].harga+'" disc_1_edit="'+data[i].disc_1+'" disc_2_edit="'+data[i].disc_2+'" disc_3_edit="'+data[i].disc_3+'" hpp_edit="'+hpp+'" harga_jual_edit="'+data[i].harga_jual+'" nota="'+data[i].id_pembelian+'" barcode_edit="'+data[i].barcode+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" product_name_hapus="'+data[i].nama_produk+'" product_code_hapus="'+data[i].kode_produk+'" >Delete</a>'+
                '</td>'+
                '</tr>';
                
              }
              $('#show_data').html(html);
              $('#total_beli').html(convertToRupiah(totalhpp.toFixed(2)));
              $('#total_beli_terbilang').html(sayit(totalhpp.toFixed(2)));
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
          var product_code = $(this).attr('product_code_hapus');
          var product_name = $(this).attr('product_name_hapus');
          
          
          $('#product_code_delete_pembelian').val(product_code);
          $('#product_code_delete').html(product_code);
          $('#product_name_delete').html(product_name);
          $('#Modal_Delete').modal('show');
         
        });

        //delete record to database
        $('#btn_hapus').on('click',function(){
          var product_code = $('#product_code_delete_pembelian').val();
          var faktur = "<?=$uri?>";
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/hapus_barang_pembelian')?>",
            dataType : "JSON",
            data : {product_code:product_code, faktur:faktur},
            success: function(data){
              $('[name="product_code_delete_pembelian"]').val("");
              $('#Modal_Delete').modal('hide');
              show_product();
              swal ( "Sukses" ,  "Produk Berhasil Dihapus!" ,  "success", {
              buttons: false,
              timer: 1000,
            } );
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

