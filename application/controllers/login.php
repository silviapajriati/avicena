<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	private $data;
	
	public function __construct()
	{
        parent::__construct();
		$CI=&get_instance();
		$this->data['controller'] = $this->uri->segment("home");
		$this->data['pageTitle'] = "User";
		$this->load->library("session");
		$this->load->helper('url');
	}
	
	public function index()
	{

		$data['session']	= $this->session->userdata();
		$data['content']    = $this->load->view('login','',TRUE);
		$data['title']      = "Login";
		$this->load->view('main',$data);

	}

	public function login(){

		$CI=&get_instance();
		$user = $this->input->post('txt_user', TRUE);
		$pass = $this->input->post('txt_pass', TRUE);
		$ceknum=$this->home_mod->login($user, $pass);

		if ($ceknum){

				foreach ($ceknum as $data){
					
					$datalogin = array(

						'username'	=> $data->username,
						'pass'		=> $data->pass,
						'email'		=> $data->email,
						'priv'		=> $data->priv
						

					);

					$this->session->set_userdata($datalogin);
					redirect('home/index');

					
				}		
				$result = true;

		}
		else {

			$this->session->set_flashdata('pesan1','Username dan Password Salah ');
            redirect('login');
		}

	}
	
	function logout(){
        $this->session->sess_destroy();
        redirect('home/index');
	}
	
	public function ceklogin(){
		if($this->session->set_userdata('username')){
			redirect('home');
		}
	}

	public function getuser(){
		$userdata = $this->session->set_userdata('username');

		return $userdata;
	}


	function save_user(){

		$CI=&get_instance();
		$user	= $this->input->post('txt_id');
		$email	= $this->input->post('txt_email');
		$pass	= $this->input->post('pass');

		// var_dump($user);
		// exit();


		$data	= $this->home_mod->cek_user($user);

		if($data==null){

			$data = array(

				'username'	=> $user,
				'pass'		=> $pass,
				'email'		=> $email,
				'priv'		=> '0'
	
			);

			if($user==null||$email==null||$pass==null){
				$this->session->set_flashdata('pesan1','Harap Input Data Dengan Lengkap ');
				$this->session->set_flashdata('pesan2','Harap Input Data Dengan Lengkap ');
				redirect('login');


			}else{

				$this->home_mod->insert_in($data);
				$this->session->set_flashdata('pesan1','Pendaftaran Berhasil');
				redirect('login');
			}

			
		}else{
			
			$this->session->set_flashdata('pesan1','Username Sudah Terdaftar ');
            redirect('login');
			

		}
	}
	
	

}