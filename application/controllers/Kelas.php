<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	function __construct(){
		parent::__construct();
		date_default_timezone_set( 'Asia/Jakarta' );
		if($this->session->userdata('status') != "login"){
		$this->session->set_flashdata('message', '0');
			redirect('login');
		}
		$this->load->database();
		$this->load->helper('date');
		$this->load->library('session');
		$this->load->model("kelas_model");
		$this->load->model("pengajar_model"); //constructor yang dipanggil ketika memanggil profil.php untuk melakukan pemanggilan pada model : profil_model.php yang ada di folder models
	}

	public function index()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['kelas'] = $this->kelas_model->tampil_kelas(); //berisi dari return value pada function getAllProducts() di file models/products_model.php
		$this->load->view('kelas.php',$data);
		//$this->load->view('modal_kelas.php');
		$this->load->view('bawah.php');
	}

	public function index_kelas_dosen()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$username = $this->session->userdata('nama');
		$data['profil'] = $this->pengajar_model->lihat_profil_member($username);
		$data['kelas'] = $this->kelas_model->tampil_kelas_dosen($this->session->userdata('nama')); //berisi dari return value pada function getAllProducts() di file models/products_model.php
		$this->load->view('kelas_dosen.php',$data);
		$this->load->view('modal_kelas.php',$data);
		$this->load->view('bawah.php');
	}

	public function index_kelas_mahasiswa()
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$username = $this->session->userdata('nama');
		$data['kelas'] = $this->kelas_model->tampil_kelas_mahasiswa($username); //berisi dari return value pada function getAllProducts() di file models/products_model.php
		$this->load->view('kelas_mahasiswa.php',$data);
		//$this->load->view('modal_kelas.php');
		$this->load->view('bawah.php');
	}


	public function masuk_kelas($kelas_id){
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['kelas'] = $this->kelas_model->masuk_kelas($kelas_id);
		$data['tugas'] = $this->kelas_model->masukkelas_tugas($kelas_id);
		$data['materi'] = $this->kelas_model->masukkelas_materi($kelas_id);
		if($this->session->userdata('member')=="dosen"){
		$data['upload_mahasiswa'] = $this->kelas_model->upload_mahasiswa($kelas_id);
		}
		else{
		$data['upload_mahasiswa'] = $this->kelas_model->upload_member_mahasiswa($kelas_id,$this->session->userdata('nama'));
		}
		$this->load->view('masuk_kelas.php',$data);
		$this->load->view('modal_masuk_kelas.php');
		$this->load->view('bawah.php');
	}

	public function gabung_kelas($id_kelas){
		$data = array(
					'id_kelas' => $id_kelas ,
					'nim' => $this->session->userdata('nama') );
		$this->kelas_model->gabung_kelas($data);
		$this->session->set_flashdata('message','tambah');
		redirect('kelas/index_kelas_mahasiswa');
	}

	public function tambahkelas_proses()
	{
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$human= mdate($datestring, $time);
		$data = array(
					'nama_kelas' => $this->input->post('nama_kelas'),
					'deskripsi' => $this->input->post('deskripsi'),
					'dosen_id' => $this->input->post('id_dosen'),
					//'dosen_id' => $this->session->userdata('dosen_id'),
					'waktu' => $human
				);
			$this->kelas_model->tambahkelas_proses($data); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'tambah');
			redirect('kelas'); //redirect page ke halaman utama controller products

	}

	public function tambahfile_kelas()
	{
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$human= mdate($datestring, $time);
		$this->load->library('upload');
		$config['upload_path']          = '../admin_sttmibdg/assets/file'; //path folder
		$config['allowed_types'] = 'gif|jpg|png|pdf|rar|docx|xlsx|doc|xls|ppt|pptx|zip';
		//$config['max_size']     = '2048';
		//$config['max_width'] = '0';
		//$config['max_height'] = '0';
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_unduh')){
			$data = array(
					'nama_isi_kelas'=>$this->input->post('nama'),
					'deskripsi_isi_kelas'=>$this->input->post('deskripsi'),
					'jenis_isi_kelas'=>$this->input->post('jenis'),
					'waktu_isi_kelas'=>$human,
					'id_kelas'=>$this->input->post('id_kelas')
				);

			$this->kelas_model->tambahfile_proses($data); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'tambah');
			redirect('kelas/masuk_kelas/'.$this->input->post('id_kelas')); //redirect page ke halaman utama controller products
		}else{
			$gbr = $this->upload->data();
			$data = array(
						'file_isi_kelas' =>$gbr['file_name'],
						'nama_isi_kelas'=>$this->input->post('nama'),
						'deskripsi_isi_kelas'=>$this->input->post('deskripsi'),
						'jenis_isi_kelas'=>$this->input->post('jenis'),
						'waktu_isi_kelas'=>$human,
						'id_kelas'=>$this->input->post('id_kelas')
					);

				$this->kelas_model->tambahfile_proses($data); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'tambah');
				redirect('kelas/masuk_kelas/'.$this->input->post('id_kelas')); //redirect page ke halaman utama controller products
			}
	}

	public function uploadfile_mahasiswa()
	{
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$human= mdate($datestring, $time);
		$this->load->library('upload');
		$config['upload_path']          = '../admin_sttmibdg/assets/file';
		$config['allowed_types'] = 'gif|jpg|png|pdf|rar|docx|xlsx|doc|xls|ppt|pptx|zip';
		//$config['max_size']     = '2048';
		//$config['max_width'] = '0';
		//$config['max_height'] = '0';
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_unduh')){
			$data = array(
					'file_mahasiswa_kelas' =>$gbr['file_name'],
						'deskripsi_mahasiswa_kelas'=>$this->input->post('deskripsi'),
						'waktu_mahasiswa_kelas'=>$human,
						'nim' => $this->session->userdata('nama'),
					'id_kelas'=>$this->input->post('id_kelas')
				);

			$this->kelas_model->uploadfile_mahasiswa($data); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'tambah');
			redirect('kelas/masuk_kelas/'.$this->input->post('id_kelas')); //redirect page ke halaman utama controller products
		}else{
			$gbr = $this->upload->data();
			$data = array(
						'file_mahasiswa_kelas' =>$gbr['file_name'],
						'deskripsi_mahasiswa_kelas'=>$this->input->post('deskripsi'),
						'waktu_mahasiswa_kelas'=>$human,
						'nim' => $this->session->userdata('nama'),
						'id_kelas'=>$this->input->post('id_kelas')
					);

				$this->kelas_model->uploadfile_mahasiswa($data); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'tambah');
				redirect('kelas/masuk_kelas/'.$this->input->post('id_kelas')); //redirect page ke halaman utama controller products
			}
	}

	public function edit_kelas($kelas_id)
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['kelas'] = $this->kelas_model->edit_kelas($kelas_id);
		$this->load->view('edit_kelas.php',$data);
		$this->load->view('bawah.php');
	}

	public function kelasfile_edit($id_isi_kelas)
	{
		$this->load->view('header.php');
		$this->load->view('top.php');
		$this->load->view('left.php');
		$data['isi_kelas'] = $this->kelas_model->kelasfile_edit($id_isi_kelas);
		$this->load->view('kelasisi_edit.php',$data);
		$this->load->view('bawah.php');
	}

	public function editfile_kelas()
	{
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$human= mdate($datestring, $time);
		$this->load->library('upload');
		$config['upload_path']          = '../admin_sttmibdg/assets/file';
		$config['allowed_types'] = 'gif|jpg|png|pdf|rar|docx|xlsx|doc|xls|ppt|pptx|zip';
		//$config['max_size']     = '2048';
		//$config['max_width'] = '0';
		//$config['max_height'] = '0';
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('file_unduh')){
			$data = array(
					'nama_isi_kelas'=>$this->input->post('nama'),
					'deskripsi_isi_kelas'=>$this->input->post('deskripsi'),
					'jenis_isi_kelas'=>$this->input->post('jenis'),
					'waktu_isi_kelas'=>$human
				);

			$this->kelas_model->editfile_proses($data,$this->input->post('id_isi_kelas')); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'edit');
			redirect('kelas/masuk_kelas/'.$this->input->post('id_kelas')); //redirect page ke halaman utama controller products
		}else{
			$gbr = $this->upload->data();
			$data = array(
						'file_isi_kelas' =>$gbr['file_name'],
						'nama_isi_kelas'=>$this->input->post('nama'),
						'deskripsi_isi_kelas'=>$this->input->post('deskripsi'),
						'jenis_isi_kelas'=>$this->input->post('jenis'),
						'waktu_isi_kelas'=>$human
					);

				$this->kelas_model->editfile_proses($data,$this->input->post('id_isi_kelas')); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'edit');
				redirect('kelas/masuk_kelas/'.$this->input->post('id_kelas')); //redirect page ke halaman utama controller products
			}
	}


	public function editkelas_proses(){
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$human= mdate($datestring, $time);
		$kelas_id=$this->input->post('kelas_id');
		$data = array(
			'nama_kelas' => $this->input->post('nama_kelas'),
					'deskripsi' => $this->input->post('deskripsi'),
					//'dosen_id' => $this->session->userdata('dosen_id'),
					'waktu' => $human
		);

		$condition['kelas_id'] = $this->input->post('kelas_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

		$this->kelas_model->editkelas_proses($data, $this->input->post('kelas_id')); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'edit');
		redirect('kelas'); //redirect page ke halaman utama controller products

	}

	public function hapusfile_upload($id_mahasiswa_kelas,$id_kelas)
	{
		$this->kelas_model->hapusfile_upload($id_mahasiswa_kelas); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'hapus');
		redirect('kelas/masuk_kelas/'.$id_kelas);
	}

	public function hapuskelas_proses($id_kelas)
	{
		$this->kelas_model->hapuskelas_proses($id_kelas); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'hapus');
		redirect('kelas'); //redirect page ke halaman utama controller products
	}

	
	public function hapusfile_proses($id_isi_kelas,$id_kelas)
	{
				$this->kelas_model->hapusfile_proses($id_isi_kelas); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('kelas/masuk_kelas/'.$id_kelas);
	}

	public function download_file($nama_file){				
		force_download('./assets/file/'.$nama_file,NULL);
	}

	public function keluar_kelas($id_member_kelas)
	{
		$this->kelas_model->keluar_kelas($id_member_kelas); //passing variable $data ke products_model

		$this->session->set_flashdata('message', 'keluar');
		redirect('kelas/index_kelas_mahasiswa/');
	}	


	public function update_foto()
	{

		$this->load->library('upload');
		$config['upload_path']          = '../admin_sttmibdg/assets/gambar';
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		//$config['max_size']             = 2048;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
		$config['full_path']						= $nmfile; //nama yang terupload nantinya - See more at: http://fabernainggolan.net/upload-image-rename-codeigniter-dan-menyimpan-ke-database#sthash.6jwDptdx.dpuf
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('kelas_foto')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('profil', $error);
		}else{
			$gbr = $this->upload->data();
			$data = array('kelas_foto' =>$gbr['file_name'],
										'kelas_path' =>$gbr['file_path']);

			$condition['kelas_id'] = $this->input->post('kelas_id'); //Digunakan untuk melakukan validasi terhadap produk mana yang akan diupdate nantinya

			$this->kelas_model->editkelas_proses($data, $this->input->post('kelas_id')); //passing variable $data ke products_model

			$this->session->set_flashdata('message', 'edit');
			redirect('kelas'); //redirect page ke halaman utama controller products
		}
	}
/*
	public function tambahfoto_proses()
	{
		$datestring = '%Y-%m-%d %h:%i:%s';
		$time = time();
		$human= mdate($datestring, $time);
			$kelas_id=$this->input->post('kelas_id');
		$this->load->library('upload');
		$config['upload_path']          = './assets/gambar/'; //path folder
		$config['allowed_types']        = 'gif|jpg|png|jpeg|bmp';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		//$config['full_path']						= $nmfile; //nama yang terupload nantinya - See more at: http://fabernainggolan.net/upload-image-rename-codeigniter-dan-menyimpan-ke-database#sthash.6jwDptdx.dpuf
		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('foto_nama')){
			$error = array('error' => $this->upload->display_errors());
			redirect('kelas/lihat_kelas/'.$dosen_id);
		}else{
			$gbr = $this->upload->data();
			$data = array(
										'foto_nama' =>$gbr['full_path'],
										'foto_tanggal'=>$human,
										'kelas_id'=>$kelas_id
									);
			$this->kelas_model->tambahfoto_proses($data); //passing variable $data ke products_model

			$this->session->set_flashdata('message', '1');
			redirect('kelas/lihat_kelas/'.$kelas_id); //redirect page ke halaman utama controller products
		}

	}

	public function hapusfoto_proses($foto_id,$kelas_id)
	{
				$this->kelas_model->hapusfoto_proses($foto_id); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('kelas/lihat_kelas/'.$kelas_id); //redirect page ke halaman utama controller products
	}

	public function hapuskelas_proses($kelas_id)
	{
				$this->kelas_model->hapuskelas_proses($kelas_id); //passing variable $data ke products_model

				$this->session->set_flashdata('message', 'hapus');
				redirect('kelas'); //redirect page ke halaman utama controller products
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
