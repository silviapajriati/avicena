<?php
class ppdb_mod extends CI_Model{

    function get_jadwal() {

        $sql = "SELECT * FROM tb_jadwal ";

		return $this->db->query($sql)->result();
    
    }

    function get_kuota() {

        $sql = "SELECT * FROM tb_kuota ";

		return $this->db->query($sql)->result();
    
    }

    function get_daftar($user) {

        $sql = "SELECT * FROM tb_daftar where uploader='$user' ";

		return $this->db->query($sql)->result();
    
    }

    function cek_gelombang() {
        $date   = date('Y-m-d');
        $sql    = "SELECT * FROM tb_jadwal WHERE ((tgl_start >= '$date') AND (tgl_end <= '$date')) OR
        ((tgl_start <= '$date') AND (tgl_end >= '$date'))";

		return $this->db->query($sql)->result();
    
    }

    function get_print($str_data) {

        $sql = "SELECT a.id,a.no_daftar,a.jurusan,a.nama,b.tgl_tes FROM tb_daftar as a inner join tb_jadwal as b
        on a.gelombang=b.id where a.id='$str_data' ";

		return $this->db->query($sql)->result();
    
    }

    
    function update($id,$data){

        $this->db->where('id',$id);
        $this->db->update('tb_jadwal',$data);

        // echo $this->db->last_query();

        //$this->db->query($sql);

    }

    function updatekuota($id,$data){

        $this->db->where('id',$id);
        $this->db->update('tb_kuota',$data);


    }

    function insert_in($data){

		$this->db->insert('tb_daftar',$data);
    }
    
    function get_no(){

        $this->db->where('sfield','daftar_no');
        return $this->db->get('seqno')->row()->lastno;
    }

    function update_get_no($data){

        $this->db->where('sfield','daftar_no');
        $this->db->update('seqno',$data);

        // echo $this->db->last_query();

        // $this->db->query($sql);

    }

    function update_user($user, $no_daftar){

    //   $sql = "update users set daftar_no='$no_daftar' where username='$user'";
    //   return $this->db->affected_rows();

        $this->db->where('username','no_daftar');
        $this->db->update('users',$user);

    }
      
}    
?>