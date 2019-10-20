<?php
//File products_model.php

class mahasiswa_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function tampil_mahasiswa()
	{
		//select semua data yang ada pada table mahasiswa
		$this->db->select("*");
    	$this->db->from("tbl_mahasiswa");
    	$this->db->order_by("mahasiswa_nama", "asc");

		return $this->db->get();
	}

	function tambahmahasiswa_proses($data)
	{
		$this->db->insert('tbl_mahasiswa', $data);
	}

	function lihat_profil_member($nim)
	{
		$this->db->where('nim', $nim); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
    	$this->db->select("*");
   		$this->db->from("tbl_mahasiswa");

		return $this->db->get();
	}

	function tampil_nilai($nim)
	{
		//select semua data yang ada pada table kelas
		$this->db->select("*");
		$this->db->from("tbl_nilai");
		$this->db->join('tbl_matakuliah', 'tbl_nilai.kode_mk = tbl_matakuliah.kode_mk');
		$this->db->where('nim',$nim);
		$this->db->order_by("tbl_nilai.kode_mk", "asc");
		return $this->db->get();
	}

	function editmahasiswa_proses($data, $condition)
	{
		//update produk
    $this->db->where($condition); //Hanya akan melakukan update sesuai dengan condition yang sudah ditentukan
    $this->db->update('tbl_mahasiswa', $data); //Melakukan update terhadap table msProduct sesuai dengan data yang telah diterima dari controller
	}

	function hapus_proses($mahasiswa_id)
	{
		//delete produk berdasarkan id
    $this->db->where('mahasiswa_id', $mahasiswa_id);
    $this->db->delete('tbl_mahasiswa');
	}
}
