<?php

// Unlimited Limited pdf generator

/* Load WP functions */
define('WP_USE_THEMES', false);
require_once('../../../../../wp-load.php');

if ( is_user_logged_in() ) {
    global $current_user;
    get_currentuserinfo();
    $address = bp_get_profile_field_data('field=Address&user_id='.bp_loggedin_user_id());
    $contactnumber = bp_get_profile_field_data('field=Contact number&user_id='.bp_loggedin_user_id());
} else {
	echo 'Please sign in first.';
    exit;
}

// include tcpdf
require_once(dirname(__FILE__).'/tcpdf_min/tcpdf.php');

// set page format
$pageOrientation = 'l'; //landscapee
$pageSize = array(85, 55);
$pageMargin = array(3, 3, 3, 3);

// create new PDF document
$pdf = new TCPDF($pageOrientation, 'mm', $pageSize, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Unlimited Limited');
$pdf->SetAuthor('Unlimited Limited');
$pdf->SetTitle('Business card');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins($pageMargin[3], $pageMargin[0], $pageMargin[1]);

// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, $pageMargin[2]);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// insert logo
$pdf->ImageSVG($file='ul_logo_business-card.svg', $x=0, $y=0, $w='30', $h='5', $link='http://www.tcpdf.org', $align='', $palign='', $border=0, $fitonpage=false);

// set font
$pdf->SetFont('trocchi', '', 9);

// add a page
$pdf->AddPage();

// set some text to print
$html = '<br><br><br><br><br><br><br><br><br>&nbsp;'.$current_user->display_name;

$pdf->writeHTML($html, true, false, true, false, '');

// set font
$pdf->SetFont('trocchi', '', 9);

// set some text to print
$html = '
&nbsp;Business Executive<br>&nbsp;'
.$current_user->user_email.
'<br>&nbsp;'
.$contactnumber.
'
</div>
</div>
';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->ImageEps('ul_logo_business-card.eps', 3.5, 6, 30, '', 'http://unlimitedltd.co', true, '', '', 0, false);


//Close and output PDF document
$pdf->Output('ul_business-card_rongkai-he.pdf', 'I');
