<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html, $size, $orientation, $filename='', $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
	
	
	
	// Sets the paper size & orientation , 1st parameter page-size & 2nd parameter page_orientation
	//$dompdf->set_paper($size,$orientation);	
	
	
	$dompdf->set_paper(50, 'A4');
	//You can use 'letter', 'legal', 'A4', etc..


	$customPaper = array(0,0,800,800);
	$dompdf->set_paper($customPaper);
	
	
	// Loads an HTML string. Parse errors are stored in the global array $_dompdf_warnings. 
    $dompdf->load_html($html);
	
	// Renders the HTML to PDF.
    $dompdf->render();
	
	// set page no. on page footer
	$canvas = $dompdf->get_canvas();
	$font = Font_Metrics::get_font("Arial", "bold",7);
	
	// get height and width of pdf page
	$w = $canvas->get_width();
  	$h = $canvas->get_height();
	
	// page no. text position from left (x) and top (y)
	$x = ($w / 2) - 20;
	$y = $h - 20;
	
	// show page no. on pdf
	$canvas->page_text(16, $y, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 8, array(0,0,0));
	
	// show report print date
	$date = date('d-m-Y h:i:s A');
	$canvas->page_text($w-230, $y, "Printed On : ".$date, $font, 8, array(0,0,0));
	
    if($stream) 
	{
        // Streams the PDF to the client. The file will open a download dialog by default. The options parameter controls the output.
		$dompdf->stream($filename.".pdf");
    } 
	else 
	{
        // Returns the PDF as a string. The file will open a download dialog by default. The options parameter controls the output.
		return $dompdf->output();
    }
}

?>