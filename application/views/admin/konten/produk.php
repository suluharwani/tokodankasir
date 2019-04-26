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
                   <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#ModalAdd"><span class="fa fa-plus"></span> Tambah Produk</a></div>

                 </div>
               </div>
               <div id="reload">
                <div class="table-responsive" >

                 <table class="table table-striped" id="mydata">
                  <thead>
                    <tr>
                      <th>Product Code</th>
                      <th>Barcode</th>
                      <th>Product Name</th>
                      <th>HPP</th>
                      <th>Disc 1 </th>
                      <th>Disc 2</th>
                      <th>Disc 3</th>
                      <th>HPP Akhir</th>
                      <th>Harga Jual</th>
                      <th>Laba</th>
                      <th>Stock</th>
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
  <div class="modal fade" id="ModalKategoriEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
         <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
         <h3 class="modal-title" id="myModalLabel">Edit Kategori</h3>
       </div>
       <form class="form-horizontal">
        <div class="modal-body">


       <!--    <div class="control-group">
           <label class="control-label col-xs-3" >Kategori</label>
           <div class="controls">
             <div class="col-md-12">
              <select name="kategori" id="kategori" class="form-control" required="true" >
                <option value="" selected disabled>--- Pilih Kategori ---</option>
                <?php
                foreach ($kategori as $key => $value) {
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
            <select name="sub_cat" id="sub_kategori" class="form-control"  required="true" >
              <option selected disabled>Pilih Sub Kategori</option>}
              option
            </select>
          </div>
        </div>
      </div>

    -->
<!-- <div class="form-group">
  <label class="control-label col-xs-3" >Confirm Password</label>
  <div class="col-md-12">
    <input name="confirm_password" id="confirm_password" class="form-control" type="password"   required>
    <span id="password_result"></span>
</div>
</div> -->

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
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row form-inline">
        <div class="col-md-3" >
          <div class="modal-header">
           <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
           <h3 class="modal-title" id="myModalLabel">Tambah Produk</h3>
         </div>
       </div>

     </div>
     <form class="form-horizontal">
      <div class="modal-body">

        <div class="form-group">
          <label class="control-label col-xs-3" >Nama Produk</label>
          <div class="col-md-12">
            <input name="nama_produk" id="nama_produk" class="form-control" type="text" placeholder="Nama Produk"  required>
          </div>
        </div>
        <div class="control-group">
         <label class="control-label col-xs-3" >Kategori</label>
         <div class="controls">
           <div class="col-md-12">
            <select name="kategori" id="kategori" class="form-control" required="true" >
              <option value="" selected disabled>--- Pilih Kategori ---</option>
              <?php
              foreach ($kategori as $key => $value) {
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
          <select name="sub_cat" id="sub_kategori" class="form-control"  required="true" >
            <option selected disabled>Pilih Sub Kategori</option>}
            option
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-3" >Kode Produk</label>
      <div class="col-md-12">
        <input type="text" name="kode_produk" id="kode_produk" class="form-control"  required="true" >    
        <span id="check_kode_produk"></span>  
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-xs-3" >Supplier</label>
      <div class="col-md-12">
       <select name="supplier" id="supplier" class="form-control" required="true" >
        <option value="" selected disabled>--- Pilih Supplier ---</option>
        <?php
        foreach ($supplier as $sup) {
          echo "<option value='".$sup->id."'>".$sup->nama_supplier."</option>";
        }
        ?>
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
<!--END MODAL EDIT-->
<div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Edit Produk</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">
        <input type="text" name="id_barang" id="id_barang" class="form-control"  required="true" hidden> 
        <div class="form-group">
          <label class="control-label col-xs-3" >Nama Produk</label>
          <div class="col-md-12">
            <input name="nama_produk_edit" id="product_name_edit" class="form-control" type="text" placeholder="Nama Produk"  required>

          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Stock Produk</label>
          <div class="col-md-12">
            <input name="stock_produk_edit" id="stock_produk_edit" class="form-control" type="number" required>

          </div>
        </div>
<!--     <div class="form-group">
      <label class="control-label col-xs-3" >Kategori</label>
      <div class="col-md-12">
        <input name="kategori" id="kategori" class="form-control" type="text" placeholder="kategori"  required>

    </div>
  </div> -->

  <div class="control-group">
   <label class="control-label col-xs-3" >Kategori</label>
   <div class="controls">
     <div class="col-md-12">
       <input type="text" name="kategori_edit" id="kategori_view_edit"class="form-control"  required="true" disabled> 
     </div>
   </div>
 </div>
 <div class="control-group">
  <label class="control-label col-xs-3" > Sub Kategori</label>
  <div class="controls">
   <div class="col-md-12">
    <input name="sub_kategori_view_edit" id="sub_kategori_view_edit" class="form-control" type="text"   disabled>
  </div>
</div>
</div>
<div class="form-group">
  <label class="control-label col-xs-3" >Kode Produk</label>
  <div class="col-md-12">
    <input type="text" name="kode_produk_edit" id="product_code_edit" class="form-control"  required="true" >    
    <span id="check_kode_produk"></span>  
  </div>
</div>
<div class="form-group">
  <label class="control-label col-xs-3" >Barcode</label>
  <div class="col-md-12">
    <input type="text" name="barcode_edit" id="barcode_edit" class="form-control"  required="true" >    
    <span id="check_kode_produk"></span>  
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
  <label class="control-label col-xs-3" >Discount 1</label>
  <div class="col-md-12">
    <input type="number" name="disc_1_edit" id="disc_1_edit" class="form-control"  required="true" >    
    <span id="check_kode_produk"></span>  
  </div>
</div>
<div class="form-group">
  <label class="control-label col-xs-3" >Discount 2</label>
  <div class="col-md-12">
    <input type="number" name="disc_2_edit" id="disc_2_edit" class="form-control"  required="true" >    
    <span id="check_kode_produk"></span>  
  </div>
</div>
<div class="form-group">
  <label class="control-label col-xs-3" >Discount 3</label>
  <div class="col-md-12">
    <input type="number" name="disc_3_edit" id="disc_3_edit" class="form-control"  required="true" >    
    <span id="check_kode_produk"></span>  
  </div>
</div>
<div class="form-group">
  <label class="control-label col-xs-3" >HPP Akhir</label>
  <div class="col-md-12">
    <input type="number" name="harga_akhir_edit" id="harga_akhir_edit" class="form-control"  required="true" disabled >    
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
  <label class="control-label col-xs-3" >Supplier</label>
  <div class="col-md-12">
   <select name="supplier" id="supplier_edit" class="form-control" required="true" >
    <option value="" selected disabled>--- Pilih Supplier ---</option>
    <?php
    foreach ($supplier as $sup) {
      echo "<option value='".$sup->id."'>".$sup->nama_supplier."</option>";
    }
    ?>
  </select>
</div>
</div>
<!-- <div class="form-group">
  <label class="control-label col-xs-3" >Confirm Password</label>
  <div class="col-md-12">
    <input name="confirm_password" id="confirm_password" class="form-control" type="password"   required>
    <span id="password_result"></span>
</div>
</div> -->

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
<!-- MODAL DET -->
<div class="modal fade" id="ModalDet" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
       <!--  <button type="button" class="close"  data-dismiss="modal" aria-hidden="true">×</button> -->
       <h3 class="modal-title" id="myModalLabel">Detail Produk</h3>
     </div>
     <form class="form-horizontal">
      <div class="modal-body">

        <div class="form-group">
          <label class="control-label col-xs-3" >Nama Produk</label>
          <div class="col-md-12">
            <input name="product_name_det" id="product_name_det" class="form-control" type="text"  disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Kode Produk</label>
          <div class="col-md-12">
            <input name="product_code_det" id="product_code_det" class="form-control" type="text"  disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Barcode</label>
          <div class="col-md-12">
            <input type="text" name="product_barcode_det" id="product_barcode_det" class="form-control"  disabled="true" >    
            <span id="check_kode_produk"></span>  
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Kategori</label>
          <div class="col-md-12">
            <input name="product_cat_det" id="product_cat_det" class="form-control" type="text"  disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-xs-3" >Sub Kategori</label>
          <div class="col-md-12">
            <input name="product_sub_cat_det" id="product_sub_cat_det" class="form-control" type="text"  disabled>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-xs-3" >Supplier</label>
          <div class="col-md-12">
           <input name="product_supplier_det" id="product_supplier_det" class="form-control" type="text"  disabled>
         </div>
       </div>
       <div class="form-group">
        <label class="control-label col-xs-3" >Harga Awal</label>
        <div class="col-md-12">
          <input name="harga_det" id="harga_det" class="form-control" type="text"   disabled>

        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" >Discount</label>
        <div class="col-md-3">
          <input name="disc_1_det" id="disc_1_det" class="form-control" type="text"  disabled>
        </div>
        <div class="col-md-3">
          <input name="disc_2_det" id="disc_2_det" class="form-control" type="text"  disabled>
        </div>
        <div class="col-md-3">
          <input name="disc_3_det" id="disc_3_det" class="form-control" type="text"  disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" >HPP</label>
        <div class="col-md-12">
          <input name="hpp_det" id="hpp_det" class="form-control" type="text"   disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" >Jual</label>
        <div class="col-md-12">
          <input name="laba_det" id="laba_det" class="form-control" type="text"   disabled>
          <input name="terbilang_harga_det" id="terbilang_harga_det" class="form-control" type="text"   disabled>
          
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" >Terakhir Ditambahkan oleh</label>
        <div class="col-md-12">
          <input name="nama_admin_det" id="nama_admin_det" class="form-control" type="text"   disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-xs-3" >Terakhir Diupdate</label>
        <div class="col-md-12">
          <input name="tanggal_det" id="tanggal_det" class="form-control" type="text"   disabled>
        </div>
      </div>
    </div>

    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
      <!-- <button class="btn btn-info" id="btn_simpan_det">Simpan</button> -->
    </div>
  </form>
</div>
</div>
</div>
<!--END MODAL ADD-->
<!--MODAL HAPUS-->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button> -->
        <h4 class="modal-title" id="myModalLabel">Hapus Produk</h4>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">

          <input type="hidden" name="kode" id="textkode" value="">
          <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus <span id="product_name_modal"></span>?</p>
            Kode: <span id="product_kode"></span>
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
<script src="<?=base_url('assets/jscode/')?>/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?=base_url('assets/')?>DataTables1/datatables.min.js"></script>
<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#example').DataTable();
  } );
</script>
<script>
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

  // document.write(format(1000000.5,3)+"<br>");
  // document.write(format(1000000.55555,3)+"<br>");

  // document.write(sayit(1000000)+"<br>");
  // document.write(sayit(1000000.5)+"<br>");
  // document.write(sayit(1000000.05)+"<br>");
  // document.write(sayit(1000000.11)+"<br>");
  // document.write(sayit(1000000.55555)+"<br>");
</script>
<script type="text/javascript">
  $(document).ready(function(){
        show_product(); //call function show all product

        $('#mydata').dataTable();

        //function show all product
        function show_product(){
          $.ajax({
            type  : 'ajax',
            url   : '<?php echo site_url('admin/product_data')?>',
            async : false,
            dataType : 'json',
            success : function(data){
              var html = '';
              var i;
              for(i=0; i<data.length; i++){
                hpp = data[i].harga-(data[i].harga*data[i].disc_1/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100))*data[i].disc_2/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100)-((data[i].harga-(data[i].harga*data[i].disc_1/100))*data[i].disc_2/100))*data[i].disc_3/100);
                laba = (data[i].harga_jual - hpp)/hpp *100;
                html += '<tr>'+
                '<td>'+data[i].kode_produk+'</td>'+
                '<td>'+data[i].barcode+'</td>'+
                '<td title="'+data[i].nama_produk+'" >'+data[i].nama_produk.substr(0, 15)+'</td>'+
                '<td>'+data[i].harga+'</td>'+
                '<td>'+data[i].disc_1+'</td>'+
                '<td>'+data[i].disc_2+'</td>'+
                '<td>'+data[i].disc_3+'</td>'+
                '<td>'+hpp+'</td>'+
                '<td>'+data[i].harga_jual+'</td>'+
                '<td>'+laba.toFixed(2)+'%'+'</td>'+
                '<td>'+data[i].jumlah+'</td>'+
                '<td style="text-align:right;">'+
                '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_detail" jual="'+data[i].harga_jual+'" product_code_det="'+data[i].kode_produk+'" hpp_det="'+hpp+'" data-price="'+data[i].product_price+'">Detail</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" kode_produk_edit="'+data[i].kode_produk+'" nama_produk_edit="'+data[i].nama_produk+'" harga_edit="'+data[i].harga+'" id_barang="'+data[i].id_produk+'" harga_jual="'+data[i].harga_jual+'" disc_1_edit="'+data[i].disc_1+'" disc_2_edit="'+data[i].disc_2+'" disc_3_edit="'+data[i].disc_3+'" kategori_edit="'+data[i].id_cat+'" sub_kategori_edit="'+data[i].id_sub_cat+'" barcode_edit="'+data[i].barcode+'" stock_produk_edit="'+data[i].jumlah+'" supplier_edit="'+data[i].id_supplier+'">Edit</a>'+' '+
                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" product_code="'+data[i].kode_produk+'" product_name="'+data[i].nama_produk+'">Delete</a>'+
                '</td>'+
                '</tr>';
              }
              $('#show_data').html(html);
            }

          });
        }

        //Save product
        $('#btn_simpan').on('click',function(){
          var nama_produk  = $('#nama_produk').val();
          var sub_kategori  = $('#sub_kategori').val();
          var kategori  = $('#kategori').val();
          var kode_produk  = $('#kode_produk').val();
          var supplier  = $('#supplier').val();


          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/tambah_produk')?>",
            dataType : "JSON",
            data : {nama_produk:nama_produk , kategori:kategori, sub_kategori:sub_kategori, kode_produk:kode_produk, supplier:supplier},
            success: function(data){
                    // $('[name="product_code"]').val("");
                    // $('[name="product_name"]').val("");
                    // $('[name="price"]').val("");
                    $('#ModalAdd').modal('hide');
                    show_product();

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
        $('#show_data').on('click','.item_edit',function(){
          var id_barang = $(this).attr('id_barang');
          var stock_produk_edit = $(this).attr('stock_produk_edit');
          var product_code = $(this).attr('kode_produk_edit');
          var barcode = $(this).attr('barcode_edit');
          var product_name =$(this).attr('nama_produk_edit');
          var harga        = $(this).attr('harga_edit');
          var disc_1        = $(this).attr('disc_1_edit');
          var disc_2        = $(this).attr('disc_2_edit');
          var disc_3        = $(this).attr('disc_3_edit');
          var harga_jual        = $(this).attr('harga_jual');
          var supplier        = $(this).attr('supplier_edit');
          var id_sub_kategori        = $(this).attr('sub_kategori_edit');
          var harga_akhir = harga-(harga*disc_1/100)-((harga-(harga*disc_1/100))*disc_2/100)-((harga-(harga*disc_1/100)-((harga-(harga*disc_1/100))*disc_2/100))*disc_3/100);

          if (id_sub_kategori) {
           $.ajax({
            url: "<?php echo site_url('admin/get_nama_kategori/')?>"+id_sub_kategori,
            type: "GET",
            dataType: "json",
            success:function(data) {
              $.each(data, function(key, value) {
                // $('select[name="sub_cat"]').append('<option value="'+ value.id +'">'+ value.sub_kategori +'</option>');
                $('#kategori_view_edit').val(value.kategori);
                $('#sub_kategori_view_edit').val(value.sub_kategori);
              });
              $('#Modal_Edit').modal('show');
              $('#product_code_edit').val(product_code);
              $('#product_name_edit').val(product_name);
              $('#disc_1_edit').val(disc_1);
              $('#disc_2_edit').val(disc_2);
              $('#disc_3_edit').val(disc_3);
              $('#harga_edit').val(harga);
              $('#barcode_edit').val(barcode);
              // $('#harga_akhir_edit').val(harga - (harga*disc_1/100)-(harga*disc_1/100)-(harga*disc_1/100));
              // $('#disc_1_edit,#disc_2_edit,#disc_3_edit,#harga_edit').on('change keyup blur focus', function() {
              //   $('#harga_akhir_edit').val(harga_akhir);
              // });
              $('#harga_akhir_edit').val(harga_akhir);
              $('#harga_jual_edit').val(harga_jual);
              $('#id_barang').val(id_barang);
              $('#stock_produk_edit').val(stock_produk_edit);
              $("#supplier_edit").val(supplier);
              
            }
          });
         }

            // $("#sub_kategori_edit").val(sub_kategori);
          });

        //update record to database
        $('#btn_simpan_edit').on('click',function(){
          var id_barang = $('#id_barang').val();
          var kode_produk = $('#product_code_edit').val();
          var barcode = $('#barcode_edit').val();
          var nama_produk = $('#product_name_edit').val();
          var disc_1        = $('#disc_1_edit').val();
          var disc_2        = $('#disc_2_edit').val();
          var disc_3        = $('#disc_3_edit').val();
          var harga        = $('#harga_edit').val();
          var harga_jual        = $('#harga_jual_edit').val();
          var stock_produk_edit        = $('#stock_produk_edit').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/update_barang')?>",
            dataType : "JSON",
            data : {kode_produk:kode_produk, id_barang:id_barang , stock_produk_edit:stock_produk_edit, nama_produk:nama_produk, disc_1:disc_1, disc_2:disc_2, disc_3:disc_3, harga:harga, harga_jual:harga_jual, barcode:barcode},
            success: function(data){
              $('#Modal_Edit').modal('hide');
              show_product();
            }
          });
          return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            // var product_code = $(this).data('product_code');
            var product_code=$(this).attr('product_code');
            var product_name=$(this).attr('product_name');
            // $('[name="product_code"]').val("");
            // $('[name="product_name"]').val("");
            // $('[name="price"]').val("");

            $('#ModalHapus').modal('show');
            $('#product_name_modal').html(product_name);
            $('#product_kode').html(product_code);
            $('[name="kode"]').val(product_code);
          });

        //delete record to database
        $('#btn_hapus').on('click',function(){
          var kode_produk = $('#textkode').val();
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('admin/delete_produk')?>",
            dataType : "JSON",
            data : {kode_produk:kode_produk},
            success: function(data){
              $('[name="kode"]').val("");
              $('#ModalHapus').modal('hide');
              show_product();
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

    <script type="text/javascript">
      $(document).ready(function() {
        $('select[name="sub_cat"]').on('click', function() {
          var subcatid = $(this).val();
          if(subcatid) {
            $.ajax({
              url: "<?php echo site_url('admin/get_kode_produk/')?>"+subcatid,
              type: "GET",
              dataType: "json",
              success:function(data) {
               $('#kode_produk').val(data.kode_barang);
             },

           });
          }else{
            $('input[name="kode_produk"]').empty();
          }
        });
      });
    </script>
    <script type="text/javascript">
     $(document).ready(function(){
      $('#kode_produk').change(function(){
       var kode_produk = $('#kode_produk').val();
       if(kode_produk !=''){
        $.ajax({
          url: "<?php echo base_url(); ?>admin/check_kode_produk",
          method: "POST",
          data: {kode_produk:kode_produk},
          success: function(data){
            $('#check_kode_produk').html(data);
          }
        });
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