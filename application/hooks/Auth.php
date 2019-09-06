<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	private $data;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
	}
	
	public function check()
	{
		$userid = $this->session->userdata("userid");
		//you will need to set this $userid after authenticating the user
		$controller = $this->uri->segment(1);
		$method = $this->uri->segment(2);
		if(empty($userid)) {
			if( ($controller <> "home") || ($method <> "index") ) {
				redirect( base_url("home/index") );
			}
		}
		
	}
}
