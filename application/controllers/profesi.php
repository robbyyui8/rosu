<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Profesi extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view profesi dan model profesi
	 * Semua CRUD yang berhubungan dengan profesi memanggil controller ini
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
		$this->load->model('profesi_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('profesi/daftar_profesi');
		}

	// fungsi ini digunkan untuk menampilkan daftar profesi

	public function daftar_profesi()
		{
		//$isi['pesan']="Load Data Berhasil";
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']    = $this->session->userdata('id_user');
		$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$pesan=$this->session->flashdata('pesan');
		$pesan_error=$this->session->flashdata('pesan_error');
		if($pesan !=""){
			$isi['pesan']=$pesan;
			
		}
		if($pesan_error!=""){
			$isi['pesan_error']=$pesan_error;
		}
		
		$isi['isi'] = $this->profesi_model->get_data_profesi();
		$data['content'] = $this->load->view('backend/daftar_profesi', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah profesi baru

	public function form_profesi()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "profesi/tambah";
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$data['content'] = $this->load->view('backend/form_profesi', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data profesi kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama_profesi')==""){
				$isi['errnama_profesi'] = true;
				$error=1;
			}
			if($this->input->post('gaji')==""){
				$isi['errgaji'] = true;
				$error=1;
			}
			
			if($error==1){
				
				$isi['urlAction'] = "profesi/tambah";
				$user['nama']    = $this->session->userdata('nama');
		$user['id_user']    = $this->session->userdata('id_user');
		$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
				$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
				$data['content'] = $this->load->view('backend/form_profesi', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
						
			
			$data = array(
			'NAMA_PROFESI' => $this->input->post('nama_profesi') ,
			'GAJI_PER_BULAN' => $this->input->post('gaji')
		);
			
		$this->profesi_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('profesi/daftar_profesi');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data profesi

	public function edit($id)
		{
		$hasil = $this->profesi_model->selectone($id);
		$isi['urlAction'] = "profesi/update/" . $id . "";
		$isi['nama_profesi'] = "";
		$isi['gaji'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_profesi'] = $row->NAMA_PROFESI;
			$isi['gaji'] = $row->GAJI_PER_BULAN;
					
			}

		$isi['edit'] = true;
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']    = $this->session->userdata('id_user');
		$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$data['content'] = $this->load->view('backend/form_profesi', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data profesi yang ada di database

	public function update($id)
		{
					
			$data = array(
			'NAMA_PROFESI' => $this->input->post('nama_profesi') ,
			'GAJI_PER_BULAN' => $this->input->post('gaji')
		);
		$this->profesi_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('profesi/daftar_profesi');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data profesi

	public function delete($id)
		{
			
      if($this->profesi_model->delete($id)=="gagal" ){
		  $this->session->set_flashdata('pesan_error', 'Data Gagal Dihapus. Data profesi digunakan untuk perhitungan');
	  }
	  else{
		  $this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
	  }
  
   
		
		
		redirect('profesi/daftar_profesi');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */