<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/favicon.png" />
<!-- Linking fonts -->
<link href='<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/trocchi/stylesheet.css' rel='stylesheet' type='text/css'>
<link href='<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/texgyreheros/stylesheet.css' rel='stylesheet' type='text/css'>
  
<style type="text/css" media="print">
  * {-webkit-print-color-adjust:exact;}
  .shadow{  -webkit-filter: blur(0);-moz-filter: blur(0);filter: blur(0);}
  .page{border:none!important;}
  @page {size: 297mm 210mm; margin: 0mm; }
</style>
  
<style>
  html, body{margin:0;padding:0}
  .page{width:297mm;height:209mm;border:1px solid #000}
  .content{padding:15mm 25mm 15mm 25mm}
  .header{font-family: 'Trocchi_ulregular', serif;font-size:9pt;margin-bottom:30mm}
  .content{font-family: 'texgyreherosregular', sans-serif;font-size:12pt;}
  .logo{border-bottom:1pt solid black}
  
  b{font-family: 'texgyreherosbold', sans-serif;}
  p{margin:0}
  
/*advertisings and facevalue*/
.fv_char{float:left;}
.fv_kerning{float:left;}
.fv_dot{background-position: center;background-size: cover;}
.shadow{box-shadow: 2px 4px 8px rgba(0,0,0,0.3);background-color:rgba(0,0,0,0.2);}
  
.on{background-size: cover;background-color: #FFF;}
.off{box-shadow: none;}

.fv_dot{height:50px;width:50px;border-radius:50%;}

</style>
</head>

<body>
<div id="nopopup" style="display:none;">["#no_1","#no_2","#no_3","#no_4"]</div>
<input type="hidden" id="popup" value="20" />
<input type="hidden" id="columns" value="40" />
<input type="hidden" id="rows" value="28" />
<div class="page" id="facevalue">
  <div class="printable">
    <div class="content">
      <div class="body">
        <div id="no_1" style="font-size:18pt;font-family: 'Trocchi_ulregular', serif;width:33%">
        <span>This is to certificate that</span>
        <br><?php 
$address = bp_get_profile_field_data('field=Address&user_id='.bp_loggedin_user_id());
$title = bp_get_profile_field_data('field=Title&user_id='.bp_loggedin_user_id());
echo $title.' '.$current_user->display_name . ' <br>' .$address.'<br>owns exact one share of
Unlimited Limited.'; ?>
        </div>
        <br><br>
        <div id="no_2" style="font-size:10pt;width:33%;height:80pt;">shareholder certificate no.<?php echo bp_loggedin_user_id().'<br>'.bp_loggedin_user_domain(); ?>
        </div>
        <br><br>
        <div id="no_3" style="position:relative;width:150pt;height:150pt;padding:25pt;left:-25pt">
<?php

require_once(dirname(__FILE__).'/parts/ul-pdf/tcpdf_min/tcpdf.php');
require_once(dirname(__FILE__).'/parts/ul-pdf/tcpdf_min/tcpdf_barcodes_2d.php');

// set the barcode content and type
$barcodeobj = new TCPDF2DBarcode(bp_loggedin_user_domain(), 'QRCODE,L');

// output the barcode as HTML object
echo $barcodeobj->getBarcodeHTML(3, 3, 'black');
?>
        </div>
        <br>
        <div id="no_4" style="position:absolute;left:224mm;top:123mm;width:48mm;height:72mm">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/parts/vis/assets/seal.svg" alt="1 share">
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/parts/vis/facevalue_vi.js"></script>