<?php

$html = "<p style='font-family: GB'>文件代号</p>";

//==============================================================
//==============================================================
//==============================================================

include("../mpdf.php");

$mpdf=new mPDF('','A4','','',32,25,27,25,16,13); 
//$mpdf->SetDisplayMode('fullpage');


// LOAD a stylesheet
// $stylesheet = file_get_contents('mpdfstyleA4.css');
// $mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->Output();
exit;
//==============================================================
//==============================================================
//==============================================================


?>