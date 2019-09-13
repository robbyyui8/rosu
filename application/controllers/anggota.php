<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Anggota extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view anggota dan model anggota
	 * Semua CRUD yang berhubungan dengan anggota memanggil controller ini
	 * Created by Mukhamad Faiz Fanani 
	 * V.1.0
	 */
	public function __construct()
		{
		parent::__construct();
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->model('tim_model');
		$this->load->model('profesi_model');
		$this->load->model('anggota_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('anggota/daftar_anggota');
		}

	// fungsi ini digunkan untuk menampilkan daftar anggota

	public function daftar_anggota()
		{
		//$isi['pesan']="Load Data Berhasil";
		$user['nama']    = $this->session->userdata('nama');
		
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->anggota_model->get_data_anggota();
		$data['content'] = $this->load->view('backend/daftar_anggota', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah anggota baru

	public function form_anggota()
		{

		$isi['tim'] = $this->tim_model->get_data_tim();
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['urlAction'] = "anggota/tambah";
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$data['content'] = $this->load->view('backend/form_anggota', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data anggota kedalam database

	public function tambah()
		{
			$error=0;
			$nip_anggota=$this->input->post('nip_anggota');
			$nama_anggota=$this->input->post('nama_anggota');
			$profesi= $this->input->post('profesi');
			$kategori_anggota	=$this->input->post('kategori_anggota');
			$pengalaman= $this->input->post('pengalaman');
			//melakukan validasi form isian
			/*
			if($nama_anggota==""){
				$isi['errnip_anggota'] = true;
				$error=1;
			}
			*/
			if($nama_anggota==""){
				$isi['errnama_anggota'] = true;
				$error=1;
			}
			if($profesi==0){
				$isi['errprofesi'] = true;
				$error=1;
			}
			
			
			if($pengalaman==""){
				$isi['errpengalaman'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				//$isi['tim'] = $this->tim_model->get_data_tim();
				$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();
				$isi['urlAction'] = "anggota/tambah";
				$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
				$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
				$data['content'] = $this->load->view('backend/form_anggota', $isi);
				$this->load->view('/backend/main', $data);
				
			
			}
			
						
			else{
				
			}
			$dataanggota = array(
			'NAMA_ANGGOTA' => $nama_anggota,
			//'NIP' => $nip_anggota,
			'ID_PROFESI' => $profesi ,
			'PENGALAMAN' => $pengalaman
			
			);
		$this->anggota_model->insert($dataanggota);
		//$get_id_anggota=$this->anggota_model->select_max_ID_anggota()->row()->ID_ANGGOTA;
		
		
		
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('anggota/daftar_anggota');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data anggota

	public function edit($id)
		{
		$hasil = $this->anggota_model->selectone($id);
		$isi['urlAction'] = "anggota/update/" . $id . "";
		$isi['nama_anggota'] = "";
		$isi['tim'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
		//	$isi['nip_anggota'] = $row->NIP;
			$isi['nama_anggota'] = $row->NAMA_ANGGOTA;
			$isi['id_profesi'] = $row->ID_PROFESI;
			//$isi['id_tim'] = $row->ID_TIM;
			$isi['pengalaman'] = $row->PENGALAMAN;
			
			
			}
		$isi['tim'] = $this->tim_model->get_data_tim();
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['edit'] = true;
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$data['content'] = $this->load->view('backend/form_anggota', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data anggota yang ada di database

	public function update($id)
		{
		$error=0;
			$nip_anggota=$this->input->post('nip_anggota');
			$nama_anggota=$this->input->post('nama_anggota');
			$profesi= $this->input->post('profesi');
			$kategori_anggota	=$this->input->post('kategori_anggota');
			$pengalaman= $this->input->post('pengalaman');
			//melakukan validasi form isian
			/*
			if($nama_anggota==""){
				$isi['errnip_anggota'] = true;
				$error=1;
			}
			*/
			if($nama_anggota==""){
				$isi['errnama_anggota'] = true;
				$error=1;
			}
			if($profesi==0){
				$isi['errprofesi'] = true;
				$error=1;
			}
			/*
			if($kategori_anggota==0){
				$isi['errkategori_anggota'] = true;
				$error=1;
			}
			*/
			
			if($pengalaman==""){
				$isi['errpengalaman'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				$hasil = $this->anggota_model->selectone($id);
		$isi['urlAction'] = "anggota/update/" . $id . "";
		$isi['nama_anggota'] = "";
		$isi['tim'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
		//	$isi['nip_anggota'] = $row->NIP;
			$isi['nama_anggota'] = $row->NAMA_ANGGOTA;
			$isi['id_profesi'] = $row->ID_PROFESI;
			//$isi['id_tim'] = $row->ID_TIM;
			$isi['pengalaman'] = $row->PENGALAMAN;
			
			
			}
			
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();
		$isi['edit'] = true;
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$data['content'] = $this->load->view('backend/form_anggota', $isi);
		$this->load->view('/backend/main', $data);
				
			
			}
			
			else{
				//get id anggota yang akan diupdate
		$id_anggota= $this->anggota_model->selectone($id)->row()->ID_ANGGOTA; 
			
			$dataanggota = array(
			'NAMA_ANGGOTA' => $nama_anggota,
			'ID_PROFESI' => $profesi ,
			'PENGALAMAN' => $pengalaman
			
			);
		$this->anggota_model->update_anggota($dataanggota,$id_anggota);
		$this->session->set_flashdata('pesan', 'Data Sudah Diperbaharui');
		redirect('anggota/daftar_anggota');
			}
		
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data anggota

	public function delete($id)
		{
		//$this->anggota_model->delete_anggota_tim($id);
		$this->anggota_model->delete_anggota($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('anggota/daftar_anggota');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */