<?php
class hasil_mod extends CI_Model{

    function cek_data($user) {

        $sql = "SELECT a.gelombang, b.tgl_hasil FROM tb_daftar a inner join tb_jadwal b on a.gelombang=b.id where a.uploader='$user' ";

		return $this->db->query($sql)->result();
    
    }
    function cek_data2() {

        $sql = "SELECT * FROM tb_jadwal where id=2 ";

		return $this->db->query($sql)->result();
    
    }

    function cek_gelombang() {
        $date   = date('Y-m-d');
        $sql    = "SELECT * FROM tb_jadwal WHERE ((tgl_start > '$date') AND (tgl_end < '$date')) OR
        ((tgl_start < '$date') AND (tgl_end > '$date'))";

		return $this->db->query($sql)->result();
    
    }

    function get_data($param){
	    $this->db->select('*');
        $this->db->from('tb_daftar');
		if($param != ''){
		   $this->db->where($param,null,false);
		}
		$this->db->order_by("no_daftar", "DESC");
		return $this->db->get()->result();

    }

    function get_gelombang1($param,$user){
	    $this->db->select('*');
        $this->db->from('tb_daftar');
        $this->db->where('uploader',$user);
		// if($param != ''){
        //     $this->db->where('gelombang','1');
		//     $this->db->where($param,null,false);
		// }
		// $this->db->order_by("no_daftar", "DESC");
        return $this->db->get()->result();
        
        // echo $this->db->last_query();
        // $this->db->query($sql);


    }

    function get_gelombang2($param){
	    $this->db->select('*');
        $this->db->from('tb_daftar');
        $this->db->where('gelombang','2');
		if($param != ''){
            $this->db->where('gelombang','2');
		    $this->db->where($param,null,false);
		}
		$this->db->order_by("no_daftar", "DESC");
        return $this->db->get()->result();
        
        // echo $this->db->last_query();
        // $this->db->query($sql);


    }

    function lolos($id,$data){

        $this->db->where('id',$id);
        $this->db->update('tb_daftar',$data);

        // echo $this->db->last_query();

    //$this->db->query($sql);
        
    }

    function get_print($id) {

        $sql = "SELECT * from tb_daftar where id='$id' ";

		return $this->db->query($sql)->result();
    
    }


    
      
}    
?>