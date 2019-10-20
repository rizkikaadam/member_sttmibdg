<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
		$this->session->set_flashdata('message', '0');
			redirect('login');
		}
		$this->load->database();
		$this->load->library('session');
		$this->load->model("mahasiswa_model"); //constructor yang dipanggil ketika memanggil profil.php untuk melakukan pemanggilan pada model : profil_model.php yang ada di folder models
	}

	public function index()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['mahasiswa'] = $this->mahasiswa_model->tampil_mahasiswa(); //berisi dari return value pada function getAllProducts() di file models/products_model.php
		$this->load->view('mahasiswa.php',$data);
		$this->load->view('modal_mahasiswa.php');
		$this->load->view('bawah.php');
	}

	public function nilai()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$nim = $this->session->userdata('nama');
		$data['nilai'] = $this->mahasiswa_model->tampil_nilai($nim);
		$this->load->view('nilai.php',$data);
		$this->load->view('bawah.php');
	}

	public function tambah_proses()
	{
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
			$this->load->view('mahasiswa', $error);
		}else{
			$gbr = $this->upload->data();
			$data = array(
				'foto' =>$gbr['file_name'],
											'path' =>$gbr['file_path'],
				'mahasiswa_nama' => $this->input->post('mahasiswa_name'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'tmpt_lahir' => $this->input->post('tmpt_lahir'),
				'pendidikan' => $this->input->post('pendidikan'),
				'mengajar' => $this->input->post('mengajar'),
				'status' => $this->input->post('status'),
				//'password' => $this->input->post('password'),
				'email' => $this->input->post('email')
			);
				$this->mahasiswa_model->tambahmahasiswa_proses($data); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'tambah');
				redirect('mahasiswa'); //redirect page ke halaman utama controller products
		}
	}

	public function lihat_mahasiswa()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$username = $this->session->userdata('nama');
		$data['mahasiswa'] = $this->mahasiswa_model->lihat_profil_member($username);
		$this->load->view('lihat_mahasiswa_member.php',$data);	
		$this->load->view('bawah.php');
	}

	public function edit_mahasiswa($nim)
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['mahasiswa'] = $this->mahasiswa_model->lihat_profil_member($nim);
		$this->load->view('edit_mahasiswa.php',$data);
		$this->load->view('modal_password_mahasiswa.php',$data);
		$this->load->view('bawah.php');
	}

	public function editmahasiswa_proses(){
		$nim=$this->input->post('nim');
		$data = array(
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'tanggal_lahir' => $this->input->post('tgl_lahir'),
			'tempat_lahir' => $this->input->post('tmpt_lahir'),
			'email' => $this->input->post('email'),
			'prodi' => $this->input->post('prodi'),
			'no_hp' => $this->input->post('no_hp')
		);

		$condition['nim'] = $this->input->post('nim'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

		$this->mahasiswa_model->editmahasiswa_proses($data, $condition); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'edit');
		//redirect('mahasiswa/lihat_mahasiswa/'.$nim); //redirect page ke halaman utama controller products
		redirect(awal);

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

		$condition['nim'] = $this->input->post('nim'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

		$this->mahasiswa_model->editmahasiswa_proses($data, $condition); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'edit');
		//redirect('mahasiswa/lihat_mahasiswa/'.$nim); //redirect page ke halaman utama controller products
		redirect(awal);
	}

	public function update_foto()
	{

		$nim=$this->input->post('nim');
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
			redirect('mahasiswa/lihat_mahasiswa/'.$nim);
		}else{
			$gbr = $this->upload->data();
			$data = array('foto' =>$gbr['file_name']);
			$condition['nim'] = $this->input->post('nim'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

			$this->mahasiswa_model->editmahasiswa_proses($data, $condition); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'edit');
			redirect('mahasiswa/lihat_mahasiswa/'.$nim); //redirect page ke halaman utama controller products
		}

	}

	public function hapus_mahasiswa($nim)
	{
				$this->mahasiswa_model->hapus_proses($nim); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('mahasiswa'); //redirect page ke halaman utama controller products
	}
	/*

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
