
<script src="<?=base_url('assets/JsBarcode/')?>/dist/JsBarcode.all.js"></script>
<script src="<?=base_url('assets/jscode/')?>/jquery-3.3.1.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script> -->
<script type="text/javascript" src="<?=base_url('assets/jquery-qrcode/')?>jquery.qrcode.min.js"></script>
<!-- <script>
    jQuery(function(){
        render  : "table",
        jQuery('#output').qrcode({
        text    : "http://jetienne.com"
    });
        
    });
</script> -->
<script type="text/javascript">
     jQuery(function(){
        render  : "table",
        jQuery('#output').qrcode({
        text    : "http://jetienne.com"
    });
        
    });
 function printDiv(divName)
 {

     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;

     window.print();
     document.body.innerHTML = originalContents;
     
 }


</script>
<script>
    Number.prototype.zeroPadding = function(){
        var ret = "" + this.valueOf();
        return ret.length == 1 ? "0" + ret : ret;
    };
</script>
<style type="text/css" media="screen">
.example-print {
    display: none;
}
@media print {
   .example-screen {
       display: none;
    }
    .example-print {
       display: block;
    }
}
</style>







<div id="printableArea" class="example-print">
    <div align="center">
        <img id="barcode" >
    </div>

    <script>JsBarcode("#barcode", "rghjk", {
        format:"CODE128",
        displayValue:true,
        fontSize:20
    });</script>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Invoice</title>
        <link rel="stylesheet" href="<?=base_url('assets/contoh/')?>nota.css">

    </head>
    <body>
        <header>
            
            <div class="invoiceNbr">
                Invoice 00014
                <br />
                9/1/2014
            </div>
            <div class="logo">

                <img src="<?=base_url('assets/logo/')?>logo.jpg"" alt="generic business logo" width="100"  />
            </div>
        </header>

        <div class="fromto from">
            <div class="panel">FROM:</div>
            <div class="fromtocontent">
                <span>Robert Crowley</span><br />
                <span>123 My St.</span><br />
                <span>Portland ME, 04101</span><br />
            </div>
        </div>
        <div class="fromto to">
           <div class="panel">TO:</div>
        <div class="fromtocontent">
            <span>Someone</span><br />
            <span>123 Street St.</span><br />
            <span>Portland ME, 04101</span>
        </div>
        </div>

        <section class="items">

            <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
            <div class="row">
                <div class="col-1-10 panel">
                    Date
                </div>
                <div class="col-1-52 panel">
                    Description
                </div>
                <div class="col-1-10 panel">
                    Units
                </div>
                <div class="col-1-10 panel">
                    Rate
                </div>
                <div class="col-1-10 panel">
                    Sub Total
                </div>
            </div>

            <div class="row panel">
                <div class="col-1-10">

                </div>
                <div class="col-1-52">

                </div>
                <div class="col-1-10">

                </div>
                <div class="col-1-10">
                    Pay this amount:
                </div>
                <div class="col-1-10">
                    $900.00
                </div>
            </div>
        </section>
    </body>
    </html>
</div>
<div align="center">
<input type="button" onclick="printDiv('printableArea')" value="Print Invoice" />
</div>
