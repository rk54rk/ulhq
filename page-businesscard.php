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
  @page {size: auto; margin: 0mm; }
</style>
  
<style>
  html, body{margin:0;padding:0}
  .page{width:85mm;height:55mm;border:1px solid #000}
  .content{padding:5mm}
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
<div id="nopopup" style="display:none;">["#no_1","#no_2"]</div>
<input type="hidden" id="popup" value="4" />
<input type="hidden" id="columns" value="11" />
<input type="hidden" id="rows" value="28" />
<div class="page" id="facevalue">
  <div class="printable">
    <div class="content">
      <div class="body">
        <div id="no_1" style="font-size:8pt;font-family: 'Trocchi_ulregular', serif;position:absolute;top:5mm">
        <a href="http://unlimitedltd.co" style="color:black;text-decoration:none;border-bottom:1px solid #000">Unlimited Limited</a>
        <br>
        </div>
        <br><br>
        <div id="no_2" style="font-family: 'Trocchi_ulregular', serif;font-size:8pt;position:absolute;top:95pt">
<?php 
$contactnumber = bp_get_profile_field_data('field=Contact number&user_id='.bp_loggedin_user_id());
echo $current_user->display_name.'<br>Partner<br>'.$current_user->user_email.'<br>'.$contactnumber;
?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/parts/vis/facevalue_vi.js"></script>