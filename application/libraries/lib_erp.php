<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class lib_erp{

    var $CI;

    function lib_erp(){

        $CI =& get_instance();
        $CI->load->database();
    }

	function get_kurs($tgl){

	    $CI =& get_instance();

	    $sql   = "SELECT kurs FROM bc_kurs WHERE curr='USD' AND date_start <= '".$tgl."' AND date_end >= '".$tgl."' ORDER BY date_start LIMIT 1";
	    $query = $CI->db->query($sql)->result();

		foreach($query as $row){

		   return $row->kurs;
		}

	}

	function get_kurss($tgl,$curr){

		$CI =& get_instance();

	    $sql   = "SELECT kurs FROM bc_kurs 
	    			WHERE curr='".$curr."' 
	    				AND date_start <= '".$tgl."' 
	    				AND date_end >= '".$tgl."' 
	    			ORDER BY date_start LIMIT 1";

	    $query = $CI->db->query($sql);

		return $query->row()->kurs;
		
	}

	function get_kurs_eur($tgl){

	    $CI =& get_instance();

	    $sql = "SELECT kurs FROM bc_kurs_eur WHERE date_start <= '".$tgl."' AND date_end >= '".$tgl."' ORDER BY date_start LIMIT 1";
	    $query = $CI->db->query($sql)->result();

		foreach($query as $row){

		   return $row->kurs;
		}

	}

	function terbilang($var){

		$n 				= floor($var);
		$fix_terbilang 	= "";

		$satuan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");

		if($n >= 0 && $n <= 11){

			$fix_terbilang = " ".$satuan[floor($n)];
		}
		elseif($n >= 12 && $n <= 19){

			$fix_terbilang = terbilang($n%10)." belas";
		}
		elseif($n >= 20 && $n <= 99){

			$fix_terbilang = terbilang(floor($n / 10))." puluh".terbilang($n%10);
		}
		elseif($n >= 100 && $n <= 199){

			$fix_terbilang = " Seratus".terbilang($n-100);
		}
        elseif($n >= 200 && $n <= 999){

			$fix_terbilang = terbilang(floor($n/100))." ratus".terbilang($n%100);
		}
        elseif($n >= 1000 && $n <= 1999){

			$fix_terbilang = " Seribu".terbilang($n-1000);
		}
		elseif($n >= 2000 && $n <= 999999){

			$fix_terbilang = terbilang(floor($n/1000))." ribu".terbilang($n%1000);
		}
		elseif($n >= 1000000 && $n <= 999999999){

			$fix_terbilang = terbilang(floor($n/1000000))." juta".terbilang($n%1000000);
		}
		else{

			$fix_terbilang = terbilang(floor($n/1000000000))." Milyar".terbilang($n%1000000000);
		}

		return $fix_terbilang;
    }

    function insert_log_access($sys_name,$menu_id){

        $CI =& get_instance();

        $ip     = $CI->input->ip_address();
        $user   = $CI->session->userdata('id_user');
        $app    = $sys_name.' - '.$menu_id;

        $ins = array(

            'app_name' => $app,
            'user'     => $user,
            'ip_add'   => $ip
        );

        $CI->db->insert('log_access_menu',$ins);

        $CI->session->set_userdata('active_menu',$menu_id);
    }

    function build_sidemenu(){

    	$CI =& get_instance();

    	$active_menu 	= $CI->session->userdata('active_menu');
    	$uid 			= $CI->session->userdata('id_user');

    	//data hierarchy menu
    	$qhier  = "SELECT m1.`parent_id` AS p1,
						m2.`parent_id` AS p2,
						m3.`parent_id` AS p3
					FROM `menu_id` m1
						LEFT JOIN `menu_id` m2
							ON m1.`parent_id` = m2.`prog_id`
						LEFT JOIN `menu_id` m3
							ON m2.`parent_id` = m3.`prog_id`
					WHERE m1.`prog_id` = '".$active_menu."'";

		$dhier  = $CI->db->query($qhier)->row();
		//end data hierarchy menu

    	$q 		= "SELECT m.* FROM menu_id m
						INNER JOIN privilege p
							ON m.`prog_id` = p.`prog`
					WHERE m.parent_id = '0' AND p.`user_id` = '".$uid."'  ORDER BY sequence";

    	$d 		= $CI->db->query($q)->result();

    	$menu = "";

    	foreach ($d as $r) {

    		$url  = $r->url=="#"?$r->url:base_url().$r->url;
    		$flag = "";

    		if(substr($active_menu,0,1)==substr($r->prog_id,0,1)){

    			$flag = "class='active open'";
    		}

    		$menu .= "<li ".$flag.">";
			$menu .= "<a href='".$url."'>";
			$menu .= "<i class='".$r->img."'></i>";
			$menu .= "<span class='title'>".$r->prog_name."</span>";

			//child-1
			$qchild1 = "SELECT m.* FROM menu_id m
						INNER JOIN privilege p
							ON m.`prog_id` = p.`prog`
						WHERE m.parent_id = '".$r->prog_id."' AND p.`user_id` = '".$uid."'  ORDER BY sequence";

			$dchild1 = $CI->db->query($qchild1)->result();

			if($dchild1!=NULL){

				$menu .= "<span class='arrow'></span>";
				$menu .= "</a>";
				$menu .= "<ul class='sub-menu'>";

				foreach ($dchild1 as $c1) {

					$url  = $c1->url=="#"?$c1->url:base_url().$c1->url;
					$flag = "";

					if($active_menu==$c1->prog_id){

						$flag = "class='active'";
					}
                    
                    if($dhier!=NULL){

                        if($dhier->p1==$c1->prog_id){

    						$flag = "class='active open'";
    					}
                    }

					$menu .= "<li ".$flag.">";
					$menu .= "<a href='".$url."'>";
					$menu .= "<i class='".$c1->img."'></i>&nbsp;";
					$menu .= "<span class='title'>".$c1->prog_name."</span>";


					//child-2
					$qchild2 = "SELECT m.* FROM menu_id m
									INNER JOIN privilege p
										ON m.`prog_id` = p.`prog`
								WHERE m.parent_id = '".$c1->prog_id."' AND p.`user_id` = '".$uid."'  ORDER BY sequence";

					$dchild2 = $CI->db->query($qchild2)->result();

					if($dchild2!=NULL){

						$menu .= "<span class='arrow'></span>";
						$menu .= "</a>";
						$menu .= "<ul class='sub-menu'>";

						foreach ($dchild2 as $c2){

							$url = $c2->url=="#"?$c2->url:base_url().$c2->url;
							$flag = "";

							if($active_menu==$c2->prog_id){

								$flag = "class='active'";
							}

							$menu .= "<li ".$flag.">";
							$menu .= "<a href='".$url."'>";
							$menu .= "<i class='".$c2->img."'></i>&nbsp;";
							$menu .= "<span class='title'>".$c2->prog_name."</span>";
							$menu .= "</a>";
							$menu .= "</li>";

						}

						$menu .= "</ul>";
					}
					else{

						$menu .= "</a>";
					}

					$menu .= "</li>";
				}

				$menu .= "</ul>";
			}
			else{

				$menu .= "</a>";
			}

			$menu .= "</li>";
    	}

    	echo $menu;
    }

    function encrypt_string($param){

    	$CI =& get_instance();

    	$id 		= $param;
    	$id 		= explode('#', $id); //each variable separated with #
    	$var 	= array();

    	for($i=0;$i<count($id);$i++){

    		array_push($var, $id[$i]);
    	}

		$json 		= json_encode($var);
		$encrypted 	= $CI->encrypt->encode($json, 'iosoft'); //encryption key must be same to decrypt
		$base64 	= base64_encode($encrypted);
		return $base64;
    }

   	function cek_aktif($active,$current){

		if($active==$current){

			return "class='active'";
		}
	}

	function generate_qrcode($string){

		require_once realpath(__DIR__.'/../thirdparty/phpqrcode/qrlib.php');	
		
		$filename 	= "./images/qrcode/qr_".$string.".png";		
		$string 	= str_replace("_", "#", $string);
		
    	QRcode::png($string, $filename, "L", 4, 2); 
	}

	function generate_qrcode2($string){

		require_once realpath(__DIR__.'/../thirdparty/phpqrcode/qrlib.php');	
		
		$filename 	= "./images/qrcode/qr_".$string.".png";		
		
    	QRcode::png($string, $filename, "L", 2, 2); 
	}
}
