<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Aktivitas extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view aktivitas dan model aktivitas
	 * Semua CRUD yang berhubungan dengan aktivitas memanggil controller ini
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
		$this->load->model('aktivitas_model');
		$this->load->model('metode_aktivitas_model');
		$this->load->model('profesi_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('aktivitas/daftar_aktivitas');
		}

	// fungsi ini digunkan untuk menampilkan daftar aktivitas

	public function daftar_aktivitas()
		{
		//$isi['pesan']="Load Data Berhasil";
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->aktivitas_model->get_data_aktivitas_all();
		$data['content'] = $this->load->view('backend/daftar_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah aktivitas baru

	

	
	// fungsi ini digunakan untuk melakukan pengubahan terhadap data aktivitas

	public function edit($id)
		{
		$hasil = $this->aktivitas_model->selectone($id);
		$isi['urlAction'] = "aktivitas/update/" . $id . "";
		$isi['nama_aktivitas'] = "";
		$isi['metode_aktivitas'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_aktivitas'] = $row->NAMA_AKTIVITAS;
			$isi['id_profesi'] = $row->ID_PROFESI;
			$isi['id_kategori_aktivitas'] = $row->KATEGORI_AKTIVITAS;
			$isi['presentase'] = $row->PRESENTASE_USAHA;
			
			
			}
			
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['edit'] = true;
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$data['content'] = $this->load->view('backend/form_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data aktivitas yang ada di database

	public function update($id)
		{
			
			$error=0;
			//melakukan validasi form isian
			
		
	
			if($this->input->post('profesi')==0){
				$isi['errprofesi'] = true;
				$error=1;
			}
			
			
			
			
			if($error==1){
				$hasil = $this->aktivitas_model->selectone($id);
		$isi['urlAction'] = "aktivitas/update/" . $id . "";
		$isi['nama_aktivitas'] = "";
		$isi['metode_aktivitas'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_aktivitas'] = $row->NAMA_AKTIVITAS;
			$isi['id_profesi'] = $row->ID_PROFESI;
			$isi['id_kategori_aktivitas'] = $row->KATEGORI_AKTIVITAS;
			$isi['presentase'] = $row->PRESENTASE_USAHA;
			
			
			}
			
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['edit'] = true;
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$data['content'] = $this->load->view('backend/form_aktivitas', $isi);
		$this->load->view('/backend/main', $data);
				
			
			}
		
		else{
			
			$data = array(
			
			'ID_PROFESI' => $this->input->post('profesi')
			
			
		);
		$this->aktivitas_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('aktivitas/daftar_aktivitas');
		}
			
			
		
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data aktivitas

	public function delete($id)
		{
		$this->aktivitas_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('aktivitas/daftar_aktivitas');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */