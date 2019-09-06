<?php 
//mod rodin 29-11-17
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
* Excel library for Code Igniter applications
* Based on: Derek Allard, Dark Horse Consulting, www.darkhorse.to, April 2006
* Tweaked by: Moving.Paper June 2013
*/

    
    function to_excel3($array, $filename) {
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename='.$filename.'.xls');

         //Filter all keys, they'll be table headers
        $h = array();
        if ($array->num_rows() == 0) {
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
                echo '<th rowspan="3" style="background: white;text-align: center">No<br> 序号</th>
                    <th rowspan="3" style="background: white;text-align: center;">DEPARTEMEN<br> 部门</th>
                    <th colspan="2" rowspan="2" style="background: yellow;text-align: center">IN<br> 新进</th>
                    <th colspan="2" rowspan="2" style="background: yellow;text-align: center">OUT<br> 离职</th>
                    <th colspan="3" rowspan="2" style="background: yellow;text-align: center">JLH. KARYAWAN <br>应道</th>
                    <th colspan="2" rowspan="2" style="background: yellow;text-align: center">DIPINJAM (lend)<br>借调“出”</th>
                    <th colspan="2" rowspan="2" style="background: yellow;text-align: center">MEMINJAM(borrow)<br>借调“进”</th>
                    <th colspan="3" rowspan="2" style="background: yellow;text-align: center">TOTAL EMPLOYEE (ACTUAL)<br> 员工总数 （实现）</th>
                    <th colspan="10" style="background: skyblue;text-align: center">ABSEN (absence)考勤</th>
                    <th rowspan="2" colspan="3" style="background: skyblue;text-align: center">TOTAL ABSEN
<br>(Total absence)<br>考勤总数</th>
                    <th rowspan="2" colspan="3" style="background: skyblue;text-align: center">% ABSEN <br> 考勤%</th>
                    <th colspan="7" style="background: greenyellow;text-align: center">ABSEN LAINNYA (absence - others) 其他考勤</th>
                    <th rowspan="2" colspan="3" style="background: greenyellow;text-align: center">TOTAL ABSEN<br> LAINNYA<br>其他考勤总数</th>
                    <th rowspan="2" colspan="3" style="background: greenyellow;text-align: center">% TOTAL ABSENCE <br>- OTHERS<br>其他考勤总数%</th>
                    <th rowspan="3" style="background: white;text-align: center">"TOTAL TIDAK HADIR<br>
(total not<br> show up)<br>缺勤人數"
</th>
                     <th colspan="2" rowspan="2" style="background: violet;text-align: center">HADIR<br> 实到</th>
                                        <th rowspan="3" style="background: violet;text-align: center">TOTAL<br> HADIR<br>总计
</th>
                    <th rowspan="3" style="background: white;text-align: center">%    KEHADIRAN<br> 考勤
</th>
                    <th rowspan="3" style="background: white;text-align: center">KETERANGAN<br> 信息
</th>
                </tr>
                <tr>
                    
                    <th colspan="2" style="background: skyblue;text-align: center">ALPA<br> 旷工</th>
                    <th colspan="2" style="background: skyblue;text-align: center">SAKIT<br> 病假</th>
                    <th colspan="2" style="background: skyblue;text-align: center">ITB (ijin <br>tidak dibayar)<br>事假</th>
                    <th colspan="2" style="background: skyblue;text-align: center">SKD<br> 补贴病假</th>
                    <th colspan="2" style="background: skyblue;text-align: center">STOP WORK<br> 停工</th>
                    <th colspan="2" style="background: greenyellow;text-align: center">OFF<br> 
(schedulled)<br> 休假</th>
                    <th colspan="2" style="background: greenyellow;text-align: center">
                        IDB<br> (paid leaves)<br> 特殊带新假</th>
                    <th colspan="2" style="background: greenyellow;text-align: center">CUTI <br>
(annual leaves)<br> 年休假</th>
                    <th style="background: greenyellow;text-align: center">C.HAMIL<br> (maternity leaves)<br> 产假</th>
                </tr>
				<tr>
					<th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>JLH</th>
                    <th>L</th>
                    <th>P</th>
                   <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>JLH</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                     <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>Total</th>
                    <th>L</th>
                    <th>P</th>
                    <th>Total</th>
                     <th>L</th>
                    <th>P</th>
                     <th>L</th>
                    <th>P</th>
                     <th>L</th>
                    <th>P</th>
                    <th>P</th>
                    <th>L</th>
                    <th>P</th>
                    <th>Total</th>
                    <th>L</th>
                    <th>P</th>
                    <th>Total</th>
                   <th>L</th>
                    <th>P</th>';
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