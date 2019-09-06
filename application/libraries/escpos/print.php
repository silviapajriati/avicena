<?php 

include 'autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;


/* Open file */
$tmpdir = sys_get_temp_dir();
$file =  tempnam($tmpdir, 'ctk');

/* Do some printing */
// $connector = new FilePrintConnector($file);
// $printer = new Printer($connector);

        $ip         = "172.16.1.65";
        $sharename  = "tm82";
        $user       = "fajar";
        $pwd        = "fajar";  
            
    //  }

        $profile = CapabilityProfile::load("simple");
        $connector = new WindowsPrintConnector("smb://".$user.":".$pwd."@".$ip."/".$sharename);
        $printer = new Printer($connector, $profile);

//header logo chingluh
// $logo = EscposImage::load("chingluh.jpg", false);
// $printer -> setJustification(Printer::JUSTIFY_CENTER);
// $printer -> graphics($logo);

// $header = str_repeat("\xcd", 48)."\n";
// $header .= str_pad("Visitor PT.Ching Luh Indonesia", 46, " ", STR_PAD_BOTH)."\n";
// $header .= str_repeat("\xcd", 48)."\n";
// $printer->text($header);

//barcode
$printer-> setJustification(Printer::JUSTIFY_CENTER);
$printer->setBarcodeTextPosition(Printer::BARCODE_TEXT_BELOW);
$printer->barcode("201705270001", Printer::BARCODE_ITF);

//content
$name 	= new item('Nama', 'Jihan');
$tgl 	= new item('Hari, Tanggal', 'Kamis, 4 Mei 2017');
$jam    = new item('Jam Masuk', '08:30:10');
$meet 	= new item('Bertemu Dengan', 'Hidayat IT');
$need 	= new item('Keperluan', 'Meeting Sistem JLA 2017');
$sign 	= str_pad("Security", 24, " ",STR_PAD_BOTH);
$sign 	.= str_pad("Visitor", 24, " ",STR_PAD_BOTH);

$content = $name.$tgl.$jam.$meet.$need;

$top 	= "\xd6".str_repeat("\xc4", 46)."\xb7\n";
$bot 	= "\xd3".str_repeat("\xc4", 46)."\xbd\n";
$space 	= "\n\n\n\n\n\n";

$printer -> textRaw($top.$content.$bot.$space.$sign."\n\n");

$printer -> cut();
$printer -> close();

/* Copy it over to the printer */
copy($file, "//172.16.1.65/tm82");
unlink($file);

/* A wrapper to do organise item names & prices into columns */
class item
{
    private $title;
    private $desc;    

    public function __construct($title = '', $desc = '')
    {	
    	if(strlen($desc)>28) $desc = substr($desc, 0, 28);

        $this -> title 	= $title;
        $this -> desc 	= $desc;
    }
    
    public function __toString()
    {
        $rightCols 	= 28;
        $leftCols 	= 14;
        
        $left = str_pad($this->title, $leftCols) ;
        
        $right = str_pad($this ->desc, $rightCols, ' ', STR_PAD_RIGHT);

        return "\xba ".$left." : ".$right."\xba\n";
    }
}