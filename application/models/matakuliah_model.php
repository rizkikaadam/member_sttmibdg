<?php
//File products_model.php

class matakuliah_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function tampil_matakuliah()
	{
    $this->db->select("*");
    $this->db->from("tbl_matakuliah");
    $this->db->order_by("nama_mk", "asc");

		return $this->db->get();
	}

	function tambah_proses($data)
	{
		$this->db->insert('tbl_matakuliah', $data);
	}

	function hapus_matakuliah($kode_mk)
	{
		//delete produk berdasarkan id
    $this->db->where('kode_mk', $kode_mk);
    $this->db->delete('tbl_matakuliah');
	}

	function edit_matakuliah($kode_mk){
		//select semua data yang ada pada table pengajar
		$this->db->where('kode_mk', $kode_mk); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
    $this->db->select("*");
    $this->db->from("tbl_matakuliah");
		return $this->db->get();
	}

	function editmatakuliah_proses($data, $kode_mk)
	{
		//update produk
    $this->db->where('kode_mk', $kode_mk);
    $this->db->update('tbl_matakuliah', $data); //Melakukan update terhadap table msProduct sesuai dengan data yang telah diterima dari controller
	}
	/*
	function lihat_pengajar($dosen_id)
	{
		$this->db->where('dosen_id', $dosen_id); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
    $this->db->select("*");
    $this->db->from("tbl_dosen");

		return $this->db->get();
	}

	function editpengajar_proses($data, $condition)
	{
		//update produk
    $this->db->where($condition); //Hanya akan melakukan update sesuai dengan condition yang sudah ditentukan
    $this->db->update('tbl_dosen', $data); //Melakukan update terhadap table msProduct sesuai dengan data yang telah diterima dari controller
	}

	function deleteProduct($id)
	{
		//delete produk berdasarkan id
	}*/
}
