<?php
//File products_model.php

class kelas_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function tampil_kelas()
	{
		//select semua data yang ada pada table kelas
		$this->db->select("*");
		$this->db->from("tbl_kelas");

		return $this->db->get();
	}

	function tampil_kelas_mahasiswa($nim)
	{
		//select semua data yang ada pada table kelas
		$this->db->select("*");
		$this->db->from("tbl_member_kelas");
		$this->db->join('tbl_kelas', 'tbl_member_kelas.id_kelas = tbl_kelas.id_kelas');
		$this->db->where('tbl_member_kelas.nim',$nim);
		return $this->db->get();
	}

	function tampil_kelas_dosen($username)
	{
		//select semua data yang ada pada table kelas
		$this->db->select("*");
		$this->db->from("tbl_kelas");
		$this->db->join('tbl_dosen', 'tbl_dosen.dosen_id = tbl_kelas.dosen_id');
		$this->db->where('username',$username);
		return $this->db->get();
	}

	function tambahkelas_proses($data)
	{
		$this->db->insert('tbl_kelas', $data);
	}

	function tambahfile_proses($data)
	{
		$this->db->insert('tbl_isi_kelas', $data);
	}

	function uploadfile_mahasiswa($data)
	{
		$this->db->insert('tbl_mahasiswa_kelas', $data);
	}

	public function keluar_kelas($id_member_kelas)
	{
		$this->db->where('id_member_kelas', $id_member_kelas);
   		$this->db->delete('tbl_member_kelas');
	}

	function edit_kelas($kelas_id)
	{
		$this->db->where('id_kelas', $kelas_id); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
    $this->db->select("*");
    $this->db->from("tbl_kelas");

		return $this->db->get();
	}

	function gabung_kelas($data)
	{
		$this->db->insert('tbl_member_kelas',$data);
	}

	function masuk_kelas($kelas_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_kelas');
		$this->db->join('tbl_dosen', 'tbl_dosen.dosen_id = tbl_kelas.dosen_id');
		$this->db->where('id_kelas', $kelas_id);
		return $this->db->get();
	}

	function masukkelas_tugas($kelas_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_isi_kelas');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_isi_kelas.id_kelas');
		$this->db->where('tbl_isi_kelas.id_kelas', $kelas_id);
		$this->db->where('tbl_isi_kelas.jenis_isi_kelas', "tugas");
		return $this->db->get();
	}

	function masukkelas_materi($kelas_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_isi_kelas');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_isi_kelas.id_kelas');
		$this->db->where('tbl_isi_kelas.id_kelas', $kelas_id);
		$this->db->where('tbl_isi_kelas.jenis_isi_kelas', "materi");
		return $this->db->get();
	}

	function upload_mahasiswa($kelas_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_mahasiswa_kelas');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mahasiswa_kelas.id_kelas');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_mahasiswa_kelas.nim');
		$this->db->where('tbl_mahasiswa_kelas.id_kelas', $kelas_id);
		return $this->db->get();
	}

	function upload_member_mahasiswa($id_kelas,$nim)
	{
		$this->db->select('*');
		$this->db->from('tbl_mahasiswa_kelas');
		$this->db->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_mahasiswa_kelas.id_kelas');
		$this->db->join('tbl_mahasiswa', 'tbl_mahasiswa.nim = tbl_mahasiswa_kelas.nim');
		$this->db->where('tbl_mahasiswa_kelas.id_kelas', $id_kelas);
		$this->db->where('tbl_mahasiswa_kelas.nim', $nim);
		return $this->db->get();
	}

	function editfile_proses($data,$id_isi_kelas)
	{
		$this->db->where('id_isi_kelas', $id_isi_kelas);
    	$this->db->update('tbl_isi_kelas', $data);
	}	

	function editkelas_proses($data,$kelas_id)
	{
		$this->db->where('id_kelas', $kelas_id);
    	$this->db->update('tbl_kelas', $data);
	}

	function tambahfoto_proses($data)
	{
		$this->db->insert('tbl_foto', $data);
	}

	function hapuskelas_proses($id_kelas)
	{
		//delete produk berdasarkan id
    $this->db->where('id_kelas', $id_kelas);
    $this->db->delete('tbl_kelas');
	}

	function hapusfile_upload($id_mahasiswa_kelas)
	{
		$this->db->where('id_mahasiswa_kelas', $id_mahasiswa_kelas);
    	$this->db->delete('tbl_mahasiswa_kelas');
	}

	function kelasfile_edit($id_isi_kelas)
	{
		$this->db->where('id_isi_kelas', $id_isi_kelas); //Akan melakukan select terhadap row yang memiliki productId sesuai dengan productId yang telah dipilih
    	$this->db->select("*");
    	$this->db->from("tbl_isi_kelas");

		return $this->db->get();
	}

	function hapusfile_proses($id_isi_kelas)
	{
		//delete produk berdasarkan id
    $this->db->where('id_isi_kelas', $id_isi_kelas);
    $this->db->delete('tbl_isi_kelas');
	}

	function hapusfoto_proses($foto_id)
	{
		//delete produk berdasarkan id
    $this->db->where('foto_id', $foto_id);
    $this->db->delete('tbl_foto');
	}
}
