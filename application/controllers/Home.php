<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	private $data;
	
	public function __construct()
	{
		parent::__construct();
		$CI=&get_instance();
		$this->data['controller'] = $this->uri->segment("home");
		$this->data['pageTitle'] = "Home";
		$this->load->model('home_mod');
		$this->load->library("session");
		$this->load->helper('url');
	}
	
	public function index(){

		$vdata	= $this->home_mod->cek_gelombang();

			foreach($vdata as $r){

				$vdata['id']			= $r->id;
				$vdata['gelombang']		= $r->gelombang;
				$vdata['tgl_start']		= $r->tgl_start;
				$vdata['tgl_end']		= $r->tgl_end;
				$vdata['tgl_tes']		= $r->tgl_tes;
				$vdata['tgl_hasil']		= $r->tgl_hasil;
				$vdata['tgl_daftar']	= $r->tgl_daftar;

			}

		$data['content']    = $this->load->view('home',$vdata,TRUE);
		$data['title']      = "Home";
		$this->load->view('main',$data);
		
	}

	


}
