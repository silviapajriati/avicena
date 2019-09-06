<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ppdb extends CI_Controller {

	private $data;
	
	public function __construct()
	{
        parent::__construct();
		$CI=&get_instance();
		$this->data['controller'] = $this->uri->segment("home");
		$this->data['pageTitle'] = "PPDB";
		$this->load->model('ppdb_mod');
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->library('pdf');

	}

	public function jadwal(){

		$user 			= $this->session->userdata('username');

		if($user==null){
			
			$this->session->set_flashdata('pesan1','Anda Harus Login Terlebih Dahulu!');
			$data['content']    = $this->load->view('login','',TRUE);
			$data['title']      = "Login";
			$this->load->view('main',$data);


		}else{
			$priv['priv']	= $this->session->userdata('priv');
			$data['content']    = $this->load->view('jadwal',$priv,TRUE);
			$data['title']      = "Jadwal Pendaftaran";
			$this->load->view('main',$data);
		}

			
	
	}

	public function daftar(){

		$user 			= $this->session->userdata('username');

		if($user==null){
			
			$this->session->set_flashdata('pesan1','Anda Harus Login Terlebih Dahulu!');
			$data['content']    = $this->load->view('login','',TRUE);
			$data['title']      = "Login";
			$this->load->view('main',$data);


		}else{

			$vdata	= $this->ppdb_mod->cek_gelombang();

			foreach($vdata as $r){

				$vdata['id']			= $r->id;
				$vdata['gelombang']		= $r->gelombang;
				$vdata['tgl_start']		= $r->tgl_start;
				$vdata['tgl_end']		= $r->tgl_end;
				$vdata['tgl_tes']		= $r->tgl_tes;
				$vdata['tgl_hasil']		= $r->tgl_hasil;
				$vdata['tgl_daftar']	= $r->tgl_daftar;

			}

			$vdata['priv']		= $this->session->userdata('priv');
			$data['content']    = $this->load->view('daftar',$vdata,TRUE);
			$data['title']      = "Daftar Online";
			$this->load->view('main',$data);
		}

			
	
	}

	function data_jadwal(){


		$data 	= $this->ppdb_mod->get_jadwal();

		if($data != NULL){

			foreach($data as $r){


				$array_item[] = array(

					'id'			=> $r->id,
					'gelombang'		=> $r->gelombang,
					'tgl_start'		=> date('d-m-Y', strtotime($r->tgl_start)),
					'tgl_end'		=> date('d-m-Y', strtotime($r->tgl_end)),
					'tgl_tes'		=> date('d-m-Y', strtotime($r->tgl_tes)),
					'tgl_hasil'		=> date('d-m-Y', strtotime($r->tgl_hasil)),
					'tgl_daftar'	=> date('d-m-Y', strtotime($r->tgl_daftar))
				);
			}

		}else{
			 
			$array_item = array();
		}

		echo json_encode($array_item);

	}

	function data_kuota(){


		$data 	= $this->ppdb_mod->get_kuota();

		// var_dump($data);
		// exit();

		if($data != NULL){

			foreach($data as $r){

				$array_item[] = array(

					'id'			=> $r->id,
					'jurusan'		=> $r->jurusan,
					'kelas'			=> $r->kelas,
					'siswa'			=> $r->siswa

				);
			}

		}else{
			 
			$array_item = array();
		}

		echo json_encode($array_item);

	}

	function update(){

		$id 			= $this->input->post('txt_id');
		$txt_gelombang 	= $this->input->post('txt_gelombang');
		$txt_start 		= $this->input->post('txt_start');
		$txt_end 		= $this->input->post('txt_end');
		$txt_tes 		= $this->input->post('txt_tes');
		$txt_hasil 		= $this->input->post('txt_hasil');
		$txt_daftar 	= $this->input->post('txt_daftar');

		$data = array(

			'gelombang' 	=> $txt_gelombang,
			'tgl_start'		=> date('Y-m-d', strtotime($txt_start)),
			'tgl_end' 		=> date('Y-m-d', strtotime($txt_end)),
			'tgl_tes' 		=> date('Y-m-d', strtotime($txt_tes)),
			'tgl_hasil' 	=> date('Y-m-d', strtotime($txt_hasil)),
			'tgl_daftar' 	=> date('Y-m-d', strtotime($txt_daftar)),
		);
		
		$result = $this->ppdb_mod->update($id, $data);
	}

	function updatekuota(){

		$id 			= $this->input->post('id_kuota');
		$txt_jurusan 	= $this->input->post('txt_jurusan');
		$txt_kelas 		= $this->input->post('txt_kelas');
		$txt_siswa 		= $this->input->post('txt_siswa');

		$data = array(

			'jurusan' 	=> $txt_jurusan,
			'kelas'		=> $txt_kelas,
			'siswa' 	=> $txt_siswa
		);
		
		$result = $this->ppdb_mod->updatekuota($id, $data);
	}

	function save_data(){

		$id 			= $this->input->post('txt_id');
		$no_daftar 		= $this->get_daftar_no();
		$txt_nama 		= $this->input->post('txt_nama');
		$jurusan 		= $this->input->post('jurusan');
		$txt_ttl 		= $this->input->post('txt_ttl');
		$txt_lahir 		= $this->input->post('txt_lahir');
		$gender 		= $this->input->post('gender');
		$alamat 		= $this->input->post('alamat');
		$telp 			= $this->input->post('telp');
		$email 			= $this->input->post('email');
		$agama 			= $this->input->post('agama');
		$sekolah 		= $this->input->post('sekolah');
		$ayah 			= $this->input->post('ayah');
		$kerjaA 		= $this->input->post('kerjaA');
		$ibu 			= $this->input->post('ibu');
		$kerjaB 		= $this->input->post('kerjaB');
		$telpB 			= $this->input->post('telpB');
		$user			= $this->session->userdata('username');
		$gelombang		= $this->input->post('hid_gel');

		$data = array(

			'id' 			=> $id,
			'no_daftar'		=> $no_daftar,
			'nama'			=> $txt_nama,
			'jurusan' 		=> $jurusan,
			't_lahir' 		=> $txt_ttl,
			'tgl_lahir' 	=> $txt_lahir,
			'jk' 			=> $gender,
			'alamat' 		=> $alamat,
			'telp' 			=> $telp,		
			'email' 		=> $email,
			'agama' 		=> $agama,
			'asalsekolah' 	=> $sekolah,
			'n_ayah' 		=> $ayah,
			'k_ayah' 		=> $kerjaA,
			'n_ibu' 		=> $ibu,
			'p_ibu' 		=> $kerjaB,
			'telp_ortu' 	=> $telpB,
			'hasil'			=> '0',
			'uploader'		=> $user,
			'upload_date'	=> date('Y-m-d'),
			'gelombang'		=> $gelombang
		);

		$this->ppdb_mod->insert_in($data);
		// $this->ppdb_mod->update_user($no_daftar,$user);

	}

	function get_daftar_no(){

		$last_no		= $this->ppdb_mod->get_no();

	
			if($last_no==null){
				
				$new_no = "AVCN-".date('ym')."-001";
				
			}
			else{			

				$ym_no 		= date('ym');
				$ym_last 	= substr($last_no,7,4);

				if($ym_no!=$ym_last){

					$last_seq 	= substr($last_no,-3);
					$new_seq 	= (int)$last_seq;
					$new_seq  	= ++$new_seq;
					$new_seq 	= str_pad($new_seq, 3, "0", STR_PAD_LEFT);
					
					$new_no = "AVCN-".date('ym')."-".$new_seq;

				}
				else{
					$new_no = "AVCN-".date('ym')."-001";
				}
			}

			$upd_data = array(

				'lastno' => $new_no
			);

			
			$this->ppdb_mod->update_get_no($upd_data);

			return $new_no;
	}

	function data_cetak(){

		$user 		= $this->session->userdata('username');
		$data 		= $this->ppdb_mod->get_daftar($user);

		if($data != NULL){

			foreach($data as $r){

				switch ($r->jurusan) {
					case '1':
						$ijurusan = 'Multimedia';
						break;
					case '2':
						$ijurusan = 'Administrasi Perkantoran';
						break;
					case '3':
						$ijurusan = 'Akuntansi';
						break;
					case '4':
						$ijurusan = 'Teknik Kendaraan Ringan (TKR)';
						break;
					case '5':
						$ijurusan = 'Teknik Sepeda Motor (TSM)';
						break;
					case '6':
						$ijurusan = 'Teknik Komputer dan Jaringan (TKJ)';
						break;
				}

				$array_item[] = array(

					'id'			=> $r->id,
					'no_daftar'		=> $r->no_daftar,
					'nama'			=> $r->nama,
					'jurusan'		=> $ijurusan

				);
			}

		}else{
			 
			$array_item = array();
		}

		echo json_encode($array_item);

	}

	function printtes($id){

		$data 	= $this->ppdb_mod->get_print($id);

		$pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		// mencetak string
		$pdf->setLeftMargin(20);
		$pdf->setRightMargin(20);
		$pdf->image('images/bg/logo.png',20,8,20,20); 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUAN AVICENA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'KARTU TES TERTULIS',0,1,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(190,5,'Jl. Raya Rajeg - Mauk KM.1 Desa Sukamanah Kecamatan Rajeg Kabupaten Tangerang 15540',0,1,'C');
		$pdf->SetLineWidth(1);
        $pdf->Line(20,30,190,30);
        $pdf->SetLineWidth(0);
        $pdf->Line(20,31,190,31);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'NO DAFTAR',1,0);
        $pdf->Cell(30,6,'NAMA SISWA',1,0);
        $pdf->Cell(50,6,'JURUSAN',1,0);
        $pdf->Cell(30,6,'TANGGAL TES',1,0);
        $pdf->Cell(30,6,'TTD PENGAWAS',1,1);
        $pdf->SetFont('Arial','',10);
		$data 	= $this->ppdb_mod->get_print($id);

        foreach ($data as $row){

			switch ($row->jurusan) {
				case '1':
					$ijurusan = 'Multimedia';
					break;
				case '2':
					$ijurusan = 'Administrasi Perkantoran';
					break;
				case '3':
					$ijurusan = 'Akuntansi';
					break;
				case '4':
					$ijurusan = 'Teknik Kendaraan Ringan (TKR)';
					break;
				case '5':
					$ijurusan = 'Teknik Sepeda Motor (TSM)';
					break;
				case '6':
					$ijurusan = 'Teknik Komputer dan Jaringan (TKJ)';
					break;
			}

            $pdf->Cell(30,15,$row->no_daftar,1,0);
            $pdf->Cell(30,15,$row->nama,1,0);
            $pdf->Cell(50,15,$ijurusan,1,0);
            $pdf->Cell(30,15,date('d-m-Y', strtotime($row->tgl_tes)),1,0); 
            $pdf->Cell(30,15,'',1,1); 
		}
		
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(33,7,'',0,1,'C');
        $pdf->Cell(33,7,'Syarat dan Ketentuan :',0,1,'C');
        $pdf->Cell(160,7,'1. Harap Memakai Pakaian Kemeja Putih dan Celana(Laki-Laki)/Rok(Perempuan) Panjang Berwarna Hitam.',0,1,'C');
        $pdf->Cell(35,7,'2. Membawa Alat Tulis.',0,1,'C');
        $pdf->Cell(66,7,'3. Membawa Kartu Tes yang Sudah Dicetak.',0,1,'C');
		$pdf->Cell(86,7,'4. Hadir 30 Menit Lebih Awal Sebelum Ujian Berlangsung.',0,1,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(33,7,'',0,1,'C');
		$pdf->Cell(86,7,'*Lembar Untuk Siswa',0,1,'B');
		$pdf->Cell(33,11,'',0,1,'C');
		$pdf->SetLineWidth(0);
        $pdf->Line(20,115,190,115);
        // $pdf->SetLineWidth(0);
        // $pdf->Line(10,37,138,37);
		$pdf->SetFont('Arial','B',16);
		$pdf->setLeftMargin(20);
		$pdf->setRightMargin(20);
		$pdf->image('images/bg/logo1.png',20,120,20,20); 
		$pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUAN AVICENA',0,1,'C');
        $pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,'KARTU TES TERTULIS',0,1,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(190,5,'Jl. Raya Rajeg - Mauk KM.1 Desa Sukamanah Kecamatan Rajeg Kabupaten Tangerang 15540',0,1,'C');
		$pdf->SetLineWidth(1);
        $pdf->Line(20,145,190,145);
        $pdf->SetLineWidth(0);
        $pdf->Line(20,146,190,146);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,6,'NO DAFTAR',1,0);
        $pdf->Cell(30,6,'NAMA SISWA',1,0);
        $pdf->Cell(50,6,'JURUSAN',1,0);
        $pdf->Cell(30,6,'TANGGAL TES',1,0);
        $pdf->Cell(30,6,'TTD PENGAWAS',1,1);
        $pdf->SetFont('Arial','',10);
		$data 	= $this->ppdb_mod->get_print($id);

        foreach ($data as $row){

			switch ($row->jurusan) {
				case '1':
					$ijurusan = 'Multimedia';
					break;
				case '2':
					$ijurusan = 'Administrasi Perkantoran';
					break;
				case '3':
					$ijurusan = 'Akuntansi';
					break;
				case '4':
					$ijurusan = 'Teknik Kendaraan Ringan (TKR)';
					break;
				case '5':
					$ijurusan = 'Teknik Sepeda Motor (TSM)';
					break;
				case '6':
					$ijurusan = 'Teknik Komputer dan Jaringan (TKJ)';
					break;
			}

            $pdf->Cell(30,15,$row->no_daftar,1,0);
            $pdf->Cell(30,15,$row->nama,1,0);
            $pdf->Cell(50,15,$ijurusan,1,0);
            $pdf->Cell(30,15,date('d-m-Y', strtotime($row->tgl_tes)),1,0); 
            $pdf->Cell(30,15,'',1,1); 
		}
		
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(33,7,'',0,1,'C');
        $pdf->Cell(33,7,'Syarat dan Ketentuan :',0,1,'C');
        $pdf->Cell(160,7,'1. Harap Memakai Pakaian Kemeja Putih dan Celana(Laki-Laki)/Rok(Perempuan) Panjang Berwarna Hitam.',0,1,'C');
        $pdf->Cell(35,7,'2. Membawa Alat Tulis.',0,1,'C');
        $pdf->Cell(66,7,'3. Membawa Kartu Tes yang Sudah Dicetak.',0,1,'C');
		$pdf->Cell(86,7,'4. Hadir 30 Menit Lebih Awal Sebelum Ujian Berlangsung.',0,1,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(33,7,'',0,1,'C');
		$pdf->Cell(86,7,'*Lembar Untuk Sekolah',0,1,'B');

        $pdf->Output('cetak-kartu'.$row->no_daftar.'.pdf','I');
	}

}