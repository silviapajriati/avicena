<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profil extends CI_Controller {

	private $data;
	
	public function __construct()
	{
        parent::__construct();
        $this->data['controller'] = $this->uri->segment("profil");
		$this->data['pageTitle'] = "Profil";
	}
	
	public function index()
	{


		$data['content']    = $this->load->view('profil','',TRUE);
		$data['title']      = "Profil";

		$this->load->view('main',$data);


	}
	

}