<?php

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('encryption');

	}

	function index(){
		$this->load->view('login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$member = $this->input->post('member');
		$encript =  md5($password);


		$where = array(
			'username' => $username,
      		//'user_status' => "1",
			'password' => $encript
			);
		$where2 = array(
			'nim' => $username,
      		'user_status' => "1",
			'password' => $encript
			);
		if ($member == "dosen") {
			$cek = $this->login_model->cek_login("tbl_dosen",$where)->num_rows();
			$data['profil'] = $this->login_model->cek_login("tbl_dosen",$where);
		}
		else {
			$cek = $this->login_model->cek_login("tbl_mahasiswa",$where2)->num_rows();
		}
		
		if($cek > 0){

			$data_session = array(
				'nama' => $username,
				'member' => $member,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(awal);

		}else{
			echo "Username dan password salah !";
		}
	}

	function daftar(){
		$data = array(
			'nim' => $this->input->post('nim'),
			'nama_mahasiswa' => $this->input->post('nama_mahasiswa'),
			'password' => md5($this->input->post('password')),
			'email' => $this->input->post('email')
		);
			$this->login_model->tambahmahasiswa_proses($data); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'berhasil');
			redirect('login'); //redirect page ke halaman utama controller products
		}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
