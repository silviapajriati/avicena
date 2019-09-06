<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	require_once APPPATH."/third_party/PHPExcel/PHPExcel.php";
	require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
	
	// function __construct() {
    //     include_once APPPATH . '/third_party/fpdf/fpdf.php';
    // }
	 
	class Excel extends PHPExcel { 
	    public function __construct() { 
	        parent::__construct(); 
	    } 
	}
?>