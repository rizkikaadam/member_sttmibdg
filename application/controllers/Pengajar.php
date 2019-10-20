<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
		$this->session->set_flashdata('message', '0');
			redirect('login');
		}
		$this->load->database();
		$this->load->library('session');
		$this->load->model("pengajar_model"); //constructor yang dipanggil ketika memanggil profil.php untuk melakukan pemanggilan pada model : profil_model.php yang ada di folder models
	}

	public function index()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['dosen'] = $this->pengajar_model->tampil_pengajar(); //berisi dari return value pada function getAllProducts() di file models/products_model.php
		$this->load->view('pengajar.php',$data);
		$this->load->view('modal_pengajar.php');
		$this->load->view('bawah.php');
	}

	public function tambah_proses()
	{
		$this->load->library('upload');
		$config['upload_path']          = './assets/gambar/'; //path folder
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		//$config['max_size']             = 2048;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		//$config['full_path']						= $nmfile; //nama yang terupload nantinya - See more at: http://fabernainggolan.net/upload-image-rename-codeigniter-dan-menyimpan-ke-database#sthash.6jwDptdx.dpuf
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('pengajar', $error);
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'foto' =>$gbr['file_name'],
											'path' =>$gbr['file_path'],
				'dosen_nama' => $this->input->post('dosen_name'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'tmpt_lahir' => $this->input->post('tmpt_lahir'),
				'pendidikan' => $this->input->post('pendidikan'),
				'mengajar' => $this->input->post('mengajar'),
				'status' => $this->input->post('status'),
				//'password' => $this->input->post('password'),
				'email' => $this->input->post('email')
			);
				$this->pengajar_model->tambahpengajar_proses($data); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'tambah');
				redirect('pengajar'); //redirect page ke halaman utama controller products
		}
	}

	public function lihat_pengajar($dosen_id)
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['profil'] = $this->pengajar_model->lihat_pengajar($dosen_id);
		$this->load->view('lihat_pengajar.php',$data);
		$this->load->view('bawah.php');
	}

	public function ubah_password_proses()
	{
		$encPassword = $this->input->post('password');
		//$encript =  $this->encryption->encrypt($encPassword);
		$encript =  md5($encPassword);
		$data = array(
			'password' => $encript,
			'epass' => $encPassword
		);

		$condition['dosen_id'] = $this->input->post('dosen_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

		$this->pengajar_model->editpengajar_proses($data, $condition); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'edit');
		redirect(awal);
	}

	public function edit_pengajar($dosen_id)
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['dosen'] = $this->pengajar_model->lihat_pengajar($dosen_id);
		$this->load->view('edit_pengajar.php',$data);
		$this->load->view('modal_password_dosen.php',$data);
		$this->load->view('bawah.php');
	}

	public function editpengajar_proses(){
		$dosen_id=$this->input->post('dosen_id');
		$data = array(
			'dosen_nama' => $this->input->post('dosen_name'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'tmpt_lahir' => $this->input->post('tmpt_lahir'),
			'pendidikan' => $this->input->post('pendidikan'),
			'mengajar' => $this->input->post('mengajar'),
			'status' => $this->input->post('status'),
			//'password' => $this->input->post('password'),
			'email' => $this->input->post('email')
		);

		$condition['dosen_id'] = $this->input->post('dosen_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

		$this->pengajar_model->editpengajar_proses($data, $condition); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'edit');
		//redirect('Pengajar/lihat_pengajar/'.$dosen_id); //redirect page ke halaman utama controller products
		redirect(awal);

	}

	public function update_foto()
	{

			$dosen_id=$this->input->post('dosen_id');
		$this->load->library('upload');
		$config['upload_path']          = '../admin_sttmibdg/assets/gambar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		//$config['max_size']             = 2048;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		//$config['full_path']						= $nmfile; //nama yang terupload nantinya - See more at: http://fabernainggolan.net/upload-image-rename-codeigniter-dan-menyimpan-ke-database#sthash.6jwDptdx.dpuf
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
			redirect('Pengajar/lihat_pengajar/'.$dosen_id);
		}else{
			$gbr = $this->upload->data();
			$data = array('foto' =>$gbr['file_name'],
										'path' =>$gbr['file_path']);
			$condition['dosen_id'] = $this->input->post('dosen_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

			$this->pengajar_model->editpengajar_proses($data, $condition); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'edit');
			redirect('Pengajar/lihat_pengajar/'.$dosen_id); //redirect page ke halaman utama controller products
		}

	}

	public function hapus_pengajar($dosen_id)
	{
				$this->pengajar_model->hapus_proses($dosen_id); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('Pengajar'); //redirect page ke halaman utama controller products
	}
}
