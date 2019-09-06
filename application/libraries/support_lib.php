<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class support_lib
{
    function support_lib()
    {
        $this->CI=& get_instance();

        $this->CI->load->library('session');
        $this->CI->load->library('nativesession');
        $this->CI->load->library('encrypt');
        $this->CI->load->helper('form');
        $this->CI->load->helper('url'); 
			
    }

    function check_login() {

        if ($this->CI->session->userdata('id_user')) {
			
            return true;

        }
        else{
            
            redirect('main','refresh');
            return false;
        }
    }
    
    function check_login_native(){ //function check login using native session from PHP not use CI session

        if($this->CI->nativesession->get('nid_user')){

            return true;
        }
        else{

            redirect('main/logout','refresh');
            return false;
        }
    }

    function get_grup_user() {
        return $this->CI->session->userdata('grup_user');
    }
	function get_id_user() {
        return $this->CI->session->userdata('id_user');
    }
  	function get_full_name() {
        return $this->CI->session->userdata('full_name');
    }

    function get_qs_encrypt(){

        $string     = $this->input->post('param');
        $encrypted  = $this->encrypt->encode($string);
        $base64     = base64_encode($encrypted);
        echo $base64;
    }
}