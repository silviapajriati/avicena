<?php 
//rodin 29-11-17 //dinamis header khusus rep_bcintpb / laporan tpb
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Excel library for Code Igniter applications
* Based on: Derek Allard, Dark Horse Consulting, www.darkhorse.to, April 2006
* Tweaked by: Moving.Paper June 2013
*/

    
    function to_excel2($array,$arrayme, $filename) {
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');

         //Filter all keys, they'll be table headers
        $h = array();
        $headme = array();
        //$dataheader = array('Doc','No Pabean','Tgl Pabean','No Penerimaan','Tgl Terima','Nama Supplier','Kode Barang','Nama Barang','Satuan','Jumlah','Nilai Barang');
        if ($array->num_rows() == 0 and $arrayme->num_rows() == 0) {
          echo '<table border=1><tr><th style="background-color: red;color:white;">TIDAK ADA DATA!</th></tr>'
            . '<tr><th style="background-color: black;color:white;">DATA IS NOTHING. CHECK YOUR DATA!</th></tr></table>';
     } else {
        foreach($array->result() as $row){
            foreach($row as $key=>$val){
                if(!in_array($key, $h)){
                 $h[] = $key;   
                }
                }
                }
                //echo the entire table headers
                echo '<table border=1><tr>';
                foreach($arrayme->result() as $me) {
                   // $key = ucwords($key);
                    foreach($me as $our){
                    echo '<th style="background-color: #cceeff;">'.$our.'</th>';
                }
                }
//                echo '<th style="background-color: #cceeff;">Cur</th>';
                echo '</tr>';
                
                foreach($array->result() as $row){
                     echo '<tr>';
                    foreach($row as $val)
                         echo '<td>'.utf8_decode($val).'</td>';
//                    echo '<td>IDR</td>';
                }
                
                echo '</tr>';
                echo '</table>';
                
            
        }
    }


?>