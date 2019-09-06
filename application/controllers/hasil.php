<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hasil extends CI_Controller {

	private $data;
	
	public function __construct()
	{
        parent::__construct();
		$CI=&get_instance();
		$this->data['controller'] = $this->uri->segment("home");
		$this->data['pageTitle'] = "User";
		$this->load->model('hasil_mod');
		$this->load->library("session");
		$this->load->helper('url');
		$this->load->helper('flexigrid');
		$this->load->helper('text');
		parse_str($_SERVER['QUERY_STRING'],$_GET);
		$this->load->library('pdf');

	}
	
	public function index(){

		$user 			= $this->session->userdata('username');

		if($user==null){
			
			$this->session->set_flashdata('pesan1','Anda Harus Login Terlebih Dahulu!');
			$data['content']    = $this->load->view('login','',TRUE);
			$data['title']      = "Login";
			$this->load->view('main',$data);


		}else{
			$date 	= date('Y-m-d');
			$vdata	= $this->hasil_mod->cek_data($user);

			foreach($vdata as $r){

				$vdata['gelombang']		= $r->gelombang;
				$vdata['tgl_hasil']		= $r->tgl_hasil;

			}
			
			$vdata['priv']		= $this->session->userdata('priv');
			$data['content']    = $this->load->view('hasil',$vdata,TRUE);
			$data['title']      = "Hasil Seleksi";
			$this->load->view('main',$data);
		}

	}

	function data_hasil(){

		$param = '';
		
		$no_daftar 		= $this->input->post('no_daftar');
		$jurusan 		= $this->input->post('jurusan');

		
		if($no_daftar!=false){

			$param .= " no_daftar LIKE '%".$this->input->post('no_daftar')."%' ";
		}

		if($jurusan!=false){

			if($param!='') $param .= ' AND ';
		
			$param .= " jurusan = '".$this->input->post('jurusan')."' ";
		}


		$data 	= $this->hasil_mod->get_data($param);


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
	
				switch ($r->gelombang) {
	
					case '1':
					$igelombang	= 'Gelombang I';
					break;
					case '2':
					$igelombang	= 'Gelombang II';
					break;
	
				}
	
				switch ($r->hasil) {
	
					case '0':
					$ihasil	= 'BELUM DINILAI';
					break;
					case '1':
					$ihasil	= 'LOLOS';
					break;
					case '2':
					$ihasil	= 'TIDAK LOLOS';
					break;
	
				}

				$array_item[] = array(

					'id'			=> $r->id,
					'no_daftar'		=> $r->no_daftar,
					'jurusan'		=> $ijurusan,
					'nama'			=> $r->nama,
					'hasil'			=> $ihasil,
					'gelombang'		=> $igelombang
				);
			}

		}else{
			 
			$array_item = array();
		}

		echo json_encode($array_item);
	}

	function gelombang1(){

		$param = '';
		
		$no_daftar 		= $this->input->post('no_daftar');
		$jurusan 		= $this->input->post('jurusan');
		$gelombang 		= $this->input->post('gelombang');
		$user 			= $this->session->userdata('username');
	
	
		if($no_daftar!=false){

			$param .= " no_daftar LIKE '%".$this->input->post('no_daftar')."%' ";
		}

		if($jurusan!=false){

			if($param!='') $param .= ' AND ';
		
			$param .= " jurusan = '".$this->input->post('jurusan')."' ";
		}


		$data 	= $this->hasil_mod->get_gelombang1($param,$user);

		// var_dump($data);
		// exit();


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
	
				switch ($r->gelombang) {
	
					case '1':
					$igelombang	= 'Gelombang I';
					break;
					case '2':
					$igelombang	= 'Gelombang II';
					break;
	
				}

				switch ($r->hasil) {
	
					case '0':
					$ihasil	= 'BELUM DINILAI';
					break;
					case '1':
					$ihasil	= 'LOLOS';
					break;
					case '2':
					$ihasil	= 'TIDAK LOLOS';
					break;
	
				}

				$array_item[] = array(

					'id'			=> $r->id,
					'no_daftar'		=> $r->no_daftar,
					'jurusan'		=> $ijurusan,
					'nama'			=> $r->nama,
					'gelombang'		=> $igelombang,
					'hasil'			=> $ihasil,
				);
			}

		}else{
			 
			$array_item = array();
		}

		echo json_encode($array_item);
	}

	function gelombang2(){

		$param = '';
		
		$no_daftar 		= $this->input->post('no_daftar');
		$jurusan 		= $this->input->post('jurusan');

		
		if($no_daftar!=false){

			$param .= " no_daftar LIKE '%".$this->input->post('no_daftar')."%' ";
		}

		if($jurusan!=false){

			if($param!='') $param .= ' AND ';
		
			$param .= " jurusan = '".$this->input->post('jurusan')."' ";
		}


		$data 	= $this->hasil_mod->get_gelombang2($param);

		// var_dump($data);
		// exit();


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
	
				switch ($r->gelombang) {
	
					case '1':
					$igelombang	= 'Gelombang I';
					break;
					case '2':
					$igelombang	= 'Gelombang II';
					break;
	
				}

				switch ($r->hasil) {
	
					case '0':
					$ihasil	= 'BELUM DINILAI';
					break;
					case '1':
					$ihasil	= 'LOLOS';
					break;
					case '2':
					$ihasil	= 'TIDAK LOLOS';
					break;
	
				}

				$array_item[] = array(

					'id'			=> $r->id,
					'no_daftar'		=> $r->no_daftar,
					'jurusan'		=> $ijurusan,
					'nama'			=> $r->nama,
					'gelombang'		=> $igelombang,
					'hasil'			=> $ihasil,
				);
			}

		}else{
			 
			$array_item = array();
		}

		echo json_encode($array_item);
	}


	function lolos(){

		$id 		= $this->input->post('id');
		
		$data = array(

			'hasil' 		=> '1'
			
		);
		
		$result = $this->hasil_mod->lolos($id, $data);

	}
	
	function gagal(){

		$id 		= $this->input->post('id');
		
		$data = array(

			'hasil' 		=> '2'
			
		);
		
		$result = $this->hasil_mod->lolos($id, $data);

	}
	
	function to_excel(){

		$param = '';
		
		$no_daftar 		= $this->input->get('no_daftar');
		$jurusan 		= $this->input->get('jurusan');

		if($no_daftar!=false){

			$param .= " no_daftar LIKE '%".$this->input->get('no_daftar')."%' ";
		}

		if($jurusan!=false){

			if($param!='') $param .= ' AND ';
		
			$param .= " jurusan = '".$this->input->get('jurusan')."' ";
		}


	   $data 	= $this->hasil_mod->get_data($param);
	   $year 	= date('Y');

	   
	   //var_dump($data);
	   //exit();
   
	   //load our new PHPExcel library
	   $this->load->library('excel');
	   //activate worksheet number 1
	   $this->excel->setActiveSheetIndex(0);
	   //name the worksheet
	   $this->excel->getActiveSheet()->setTitle('Daftar PPDB SMK AVICENA');
	   //set cell A1 content with some text
	   $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar PPDB SMK AVICENA');
	   //change the font size
	   $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
	   //make the font become bold
	   $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
	   //merge cell A1 until D1
	   $this->excel->getActiveSheet()->mergeCells('A1:P1');
	   //set aligment to center for that merged cell (A1 to D1)
	   $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	   
	   //header

	   $this->excel->getActiveSheet()->setCellValue('A2', "No");
	   $this->excel->getActiveSheet()->setCellValue('B2', "No Daftar");
	   $this->excel->getActiveSheet()->setCellValue('C2', "Nama");
	   $this->excel->getActiveSheet()->setCellValue('D2', "Jurusan");
	   $this->excel->getActiveSheet()->setCellValue('E2', "Agama");
	   $this->excel->getActiveSheet()->setCellValue('F2', "Tempat Lahir");
	   $this->excel->getActiveSheet()->setCellValue('G2', "Tanggal Lahir");
	   $this->excel->getActiveSheet()->setCellValue('H2', "Jenis Kelamin");
	   $this->excel->getActiveSheet()->setCellValue('I2', "Alamat");
	   $this->excel->getActiveSheet()->setCellValue('J2', "Asal Sekolah");
	   $this->excel->getActiveSheet()->setCellValue('K2', "Nama Ayah");
	   $this->excel->getActiveSheet()->setCellValue('L2', "Nama Ibu");
	   $this->excel->getActiveSheet()->setCellValue('M2', "Pekerjaan Orang Tua");
	   $this->excel->getActiveSheet()->setCellValue('N2', "No Telp");
	   $this->excel->getActiveSheet()->setCellValue('O2', "Gelombang");
	   $this->excel->getActiveSheet()->setCellValue('P2', "Hasil");

	   
	   $j = 3;

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

			switch ($r->gelombang) {

				case '1':
				$igelombang	= 'Gelombang I';
				break;
				case '2':
				$igelombang	= 'Gelombang II';
				break;

			}

			switch ($r->hasil) {

				case '0':
				$ihasil	= 'BELUM DINILAI';
				break;
				case '1':
				$ihasil	= 'LOLOS';
				break;
				case '2':
				$ihasil	= 'TIDAK LOLOS';
				break;

			}
		   
		   $this->excel->getActiveSheet()->setCellValue('A'.$j, $j-2);		   
		   $this->excel->getActiveSheet()->setCellValue('B'.$j, $r->no_daftar);
		   $this->excel->getActiveSheet()->setCellValue('C'.$j, $r->nama);
		   $this->excel->getActiveSheet()->setCellValue('D'.$j, $ijurusan);
		   $this->excel->getActiveSheet()->setCellValue('E'.$j, $r->agama);
		   $this->excel->getActiveSheet()->setCellValue('F'.$j, $r->t_lahir);
		   $this->excel->getActiveSheet()->setCellValue('G'.$j, $r->tgl_lahir);
		   $this->excel->getActiveSheet()->setCellValue('H'.$j, $r->jk);
		   $this->excel->getActiveSheet()->setCellValue('I'.$j, $r->alamat);
		   $this->excel->getActiveSheet()->setCellValue('J'.$j, $r->asalsekolah);
		   $this->excel->getActiveSheet()->setCellValue('K'.$j, $r->n_ayah);
		   $this->excel->getActiveSheet()->setCellValue('L'.$j, $r->n_ibu);
		   $this->excel->getActiveSheet()->setCellValue('M'.$j, $r->k_ayah);
		   $this->excel->getActiveSheet()->setCellValue('N'.$j, $r->telp);
		   $this->excel->getActiveSheet()->setCellValue('O'.$j, $igelombang);
		   $this->excel->getActiveSheet()->setCellValue('P'.$j, $ihasil);

		   $j++;
		   
	   }
		   
	   foreach(range('A','P') as $columnID) {
		   $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
	   }


	   $styleArray = array(
		 'borders' => array(
		   'allborders' => array(
			 'style' => PHPExcel_Style_Border::BORDER_THIN
		   )
		 )
	   );
	   $j--;
	   $cell_to = "P".$j;
	   $this->excel->getActiveSheet()->getStyle('A2:'.$cell_to)->applyFromArray($styleArray);
	   $this->excel->getActiveSheet()->getStyle('A2:P2')->getFont()->setBold(true);
	   $this->excel->getActiveSheet()->getStyle('A2:P2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
	   $this->excel->getActiveSheet()->getStyle('A2:P2')->getFill()->getStartColor()->setRGB('BC8F8F');
	   
	   $filename='datasiswa.xls'; //save our workbook as this file name
	   header('Content-Type: application/vnd.ms-excel'); //mime type
	   header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
	   header('Cache-Control: max-age=0');//no cache
	   
	   //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
	   //if you want to save it as .XLSX Excel 2007 format
	   $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
	   //force user to download the Excel file without writing it to server's HD
	   $objWriter->save('php://output');
   }

   function printkrs($id){

		$data 	= $this->hasil_mod->get_print($id);

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
		$pdf->Cell(190,7,'PENGUMUMAN HASIL PPDB',0,1,'C');
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
		$pdf->Cell(50,6,'NAMA SISWA',1,0);
		$pdf->Cell(60,6,'JURUSAN',1,0);
		$pdf->Cell(30,6,'HASIL',1,1);
		$pdf->SetFont('Arial','',10);
		$data 	= $this->hasil_mod->get_print($id);

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

			switch ($row->hasil) {

				case '0':
				$ihasil	= 'BELUM DINILAI';
				break;
				case '1':
				$ihasil	= 'LOLOS';
				break;
				case '2':
				$ihasil	= 'TIDAK LOLOS';
				break;

			}

			$pdf->Cell(30,15,$row->no_daftar,1,0);
			$pdf->Cell(50,15,$row->nama,1,0);
			$pdf->Cell(60,15,$ijurusan,1,0);
			$pdf->Cell(30,15,$ihasil,1,1); 
		}
		
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(33,7,'',0,1,'C');
		$pdf->Cell(65,7,'Syarat dan Ketentuan Registrasi Ulang :',0,1,'C');
		$pdf->Cell(93,7,'1. Menyerahkan FC Ijazah SMP/Sederajat 2 Lembar Dilegalisir.',0,1,'C');
		$pdf->Cell(95,7,'2. Menyerahkan FC SKHUN SMP/Sederajat 2 Lembar Dilegalisir.',0,1,'C');
		$pdf->Cell(111,7,'3. Menyerahkan Pas Foto Background Merah , Memakai Seragam Sekolah.',0,1,'C');
		$pdf->Cell(82,7,'4. Menyerahkan FC Akte Kelahiran dan Kartu Keluarga.',0,1,'C');
		$pdf->Cell(52,7,'5. Menyerahkan FC KTP Orang Tua.',0,1,'C');
		$pdf->SetFont('Arial','B',8);
		$pdf->Cell(33,7,'',0,1,'C');
		// $pdf->SetLineWidth(0);
		// $pdf->Line(10,37,138,37);
		

		$pdf->Output('cetak-kartu'.$row->no_daftar.'.pdf','I');
	}
	
	

}