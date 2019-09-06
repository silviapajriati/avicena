<?php
class home_mod extends CI_Model{

    function login($user, $pass) {

        // session_cache_expire(0);
        $user = $this->db->escape($user);
        $pass  = $this->db->escape($pass);
  
        return $this->db->query("SELECT * FROM users WHERE username=$user AND pass=$pass ")->result();

              
            // return $result->row_array();
    
    }

    function get_privilege($username){

        
        return $this->db->query("SELECT priv FROM users WHERE username='$username' ")->result();

    }

    function cek_gelombang() {
        $date   = date('Y-m-d');
        $sql    = "SELECT * FROM tb_jadwal WHERE ((tgl_start >= '$date') AND (tgl_end <= '$date')) OR
        ((tgl_start <= '$date') AND (tgl_end >= '$date'))";

		return $this->db->query($sql)->result();
    
    }

    function insert_in($data){

		$this->db->insert('users',$data);
    }

    function cek_user($user){
        
        $user = $this->db->escape($user);
        return $this->db->query("SELECT * FROM users WHERE username=$user")->result();
    } 
}    
?>