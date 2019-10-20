<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			$this->session->set_flashdata('message', '0');
			redirect('login');
		}
		$this->load->database();
		$this->load->library('session');
		$this->load->model("matakuliah_model"); //constructor yang dipanggil ketika memanggil profil.php untuk melakukan pemanggilan pada model : profil_model.php yang ada di folder models
	}

	public function index()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['matakuliah'] = $this->matakuliah_model->tampil_matakuliah(); //berisi dari return value pada function getAllProducts() di file models/products_model.php
		$this->load->view('matakuliah.php',$data);
		$this->load->view('modal_matakuliah.php');
		$this->load->view('bawah.php');
	}

	public function tambah_proses()
	{

			$data = array(
									'matakuliah_judul'=>$this->input->post('matakuliah_judul'),
									'matakuliah_deskripsi'=>$this->input->post('matakuliah_deskripsi'),
									'matakuliah_tempat'=>$this->input->post('matakuliah_tempat'),
									'matakuliah_prodi'=>$this->input->post('matakuliah_prodi'),
									'matakuliah_tanggal'=>$this->input->post('matakuliah_tanggal')
								);

				$this->matakuliah_model->tambah_proses($data); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'tambah');
				redirect('matakuliah'); //redirect page ke halaman utama controller products
	}

	public function hapus_matakuliah($matakuliah_id)
	{
				$this->matakuliah_model->hapus_matakuliah($matakuliah_id); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('matakuliah'); //redirect page ke halaman utama controller products
	}

	public function edit_matakuliah($matakuliah_id){
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['matakuliah'] = $this->matakuliah_model->edit_matakuliah($matakuliah_id); //berisi dari return value pada function getAllProducts() di file models/products_model.php
		$this->load->view('edit_matakuliah.php',$data);
		$this->load->view('bawah.php');
	}

	public function editmatakuliah_proses()
	{
		$data = array(
			'matakuliah_judul'=>$this->input->post('matakuliah_judul'),
			'matakuliah_deskripsi'=>$this->input->post('matakuliah_deskripsi'),
			'matakuliah_tempat'=>$this->input->post('matakuliah_tempat'),
			'matakuliah_prodi'=>$this->input->post('matakuliah_prodi'),
			'matakuliah_tanggal'=>$this->input->post('matakuliah_tanggal')
							);

		$matakuliah_id=$this->input->post('matakuliah_id');
		$this->matakuliah_model->editmatakuliah_proses($data,$matakuliah_id); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'edit');
		redirect('matakuliah'); //redirect page ke halaman utama controller products
	}

	/*
	public function edit_profil()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		 $data['profil'] = $this->profil_model->edit();
		$this->load->view('edit_profil.php',$data);
	}

	public function update_foto()
	{

		$this->load->library('upload');
		$config['upload_path']          = './assets/gambar/'; //path folder
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['file_name']						= $nmfile; //nama yang terupload nantinya - See more at: http://fabernainggolan.net/upload-image-rename-codeigniter-dan-menyimpan-ke-database#sthash.6jwDptdx.dpuf
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto_ketua')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('profil', $error);
		}else{
			$gbr = $this->upload->data();
			$data = array('foto_ketua' =>$gbr['file_name']);
				$condition['profil_id'] = $this->input->post('profil_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

				$this->profil_model->editprofil_proses($data, $condition); //passing variable $data ke products_model

				$this->session->set_flashdata('message', '1');
				redirect('profil'); //redirect page ke halaman utama controller products
		}

	}

	public function editprofil_proses()
	{
			$gbr = $this->upload->data();
			$data = array(
					'visi' => $this->input->post('visi'),
					'misi' => $this->input->post('misi'),
					'sejarah' => $this->input->post('sejarah'),
					'tujuan' => $this->input->post('tujuan'),
					'sasaran' => $this->input->post('sasaran'),
					'banyak_staf' => $this->input->post('banyak_staf'),
					'banyak_mahasiswa' => $this->input->post('banyak_mahasiswa')
				);
				$condition['profil_id'] = $this->input->post('profil_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

				$this->profil_model->editprofil_proses($data, $condition); //passing variable $data ke products_model

				$this->session->set_flashdata('message', '1');
				redirect('profil'); //redirect page ke halaman utama controller products


	}*/
}
