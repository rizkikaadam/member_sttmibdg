<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Awal extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
		$this->session->set_flashdata('message', '0');
			redirect('login');
		}
		$this->load->database();
		$this->load->library('session');
		$this->load->library('encryption');
		$this->load->model("pengajar_model"); //constructor yang dipanggil ketika memanggil profil.php untuk melakukan pemanggilan pada model : profil_model.php yang ada di folder models
		$this->load->model("mahasiswa_model");
	}

	public function index()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$member = $this->session->userdata('member');
		$username = $this->session->userdata('nama');
		if ($member=='dosen')
		{
			$data['profil'] = $this->pengajar_model->lihat_profil_member($username);
			$this->load->view('lihat_pengajar_member.php',$data);
		}
		else {
			$data['mahasiswa'] = $this->mahasiswa_model->lihat_profil_member($username);
			$this->load->view('lihat_mahasiswa_member.php',$data);	
		}
		$this->load->view('bawah.php');
	}

}
