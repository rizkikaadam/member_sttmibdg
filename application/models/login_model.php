<?php

class login_model extends CI_Model{	
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	function tambahmahasiswa_proses($data){
		$this->db->insert('tbl_mahasiswa',$data);
	}
}

?>