<?php

// Unlimited Limited pdf generator

/* Load WP functions */
define('WP_USE_THEMES', false);
require_once('../../../../../wp-load.php');

if ( is_user_logged_in() ) {
    global $current_user;
    get_currentuserinfo();
    $address = bp_get_profile_field_data('field=Address&user_id='.bp_loggedin_user_id());
    $title = bp_get_profile_field_data('field=Title&user_id='.bp_loggedin_user_id());
} else {
	echo 'Please sign in first.';
    exit;
}


// include tcpdf
require_once(dirname(__FILE__).'/tcpdf_min/tcpdf.php');

// set page format
$pageOrientation = 'l'; //landscapee
$pageSize = array(297, 210);
$pageMargin = array(5, 5, 5, 5);

// create new PDF document
$pdf = new TCPDF($pageOrientation, 'mm', $pageSize, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('Unlimited Limited');
$pdf->SetAuthor('Unlimited Limited');
$pdf->SetTitle('Share Certificate to '.$current_user->display_name);

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins($pageMargin[3], $pageMargin[0], $pageMargin[1], $pageMargin[2]);

// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, $pageMargin[2]);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// add a page
$pdf->AddPage();

// -- set new background ---

// get the current page break margin
$bMargin = $pdf->getBreakMargin();
// get current auto-page-break mode
$auto_page_break = $pdf->getAutoPageBreak();
// disable auto-page-break
$pdf->SetAutoPageBreak(false, 0);
// set bacground image
$img_file = 'ul_share_certificate.png';
$pdf->Image($img_file, 0, 0, 297, 210, '', '', '', false, 300, '', false, false, 0);
// restore auto-page-break status
$pdf->SetAutoPageBreak($auto_page_break, $bMargin);
// set the starting point for the page content
$pdf->setPageMark();

// set font
$pdf->SetFont('trocchi', '', 12);

// Write the shareholder details
$html = 
    '<div style="text-align:center">THIS CERTIFICATES<br><br>'
    .$title.' '.$current_user->display_name.'<br><br>'
    .$address.'<br><br>'
    .'OWNS EXACT ONE SHARE OF<br>THE UNLIMITED LIMITED.<><br></div>';

// set color for text #444
$pdf->SetTextColor(68, 68, 68);

//w, h, x, y, html
$pdf->writeHTMLCell(99, '', 99, 75, $html, 0, 0, 0, true, 'J', true);

// Write the certificate ID
$html = '<div style="text-align:center">NUMBER<br>'.bp_loggedin_user_id().'</div>';

// set color for text #444
$pdf->SetTextColor(68, 68, 68);

//w, h, x, y, html
$pdf->writeHTMLCell(25, 25, 25, 173, $html, 0, 0, 0, true, 'J', true);



// Render QR code
require_once(dirname(__FILE__).'/tcpdf_min/tcpdf_barcodes_2d.php');

$style = array(
	'border' => false,
	'vpadding' => 5,
	'hpadding' => 5,
	'fgcolor' => array(68,68,68),
	'bgcolor' => array(255,255,255), //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);

$pdf->write2DBarcode( bp_loggedin_user_domain() , 'QRCODE,Q', 65, 170, 25, 25, $style, 'H');

//Close and output PDF document
$pdf->Output('ul_share-certificate_id'.bp_loggedin_user_id().'.pdf', 'I');
