<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class info extends CI_Controller {

	private $data;
	
	public function __construct()
	{
        parent::__construct();
        $this->data['controller'] = $this->uri->segment("Info");
		$this->data['pageTitle'] = "Info";
	}
	
	public function index()
	{


		$data['content']    = $this->load->view('info','',TRUE);
		$data['title']      = "Info";

		$this->load->view('main',$data);


	}
	

}