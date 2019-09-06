 <?php

    //include('qrlib.php');
    include "qrlib.php"; 

    $string = $_GET['string'];
    
    // outputs image directly into browser, as PNG stream
    //QRcode::png('PHP QR Code :)'); 
	$filename = "G:\\xampp\htdocs\erp\images\qrcode\qr_".$string.".png";

    QRcode::png($string, $filename, "L", 4, 2); 
    echo '<img src="'.$filename.'" /><hr/>';  