<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tim extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view tim dan model tim
	 * Semua CRUD yang berhubungan dengan tim memanggil controller ini
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
		$this->load->model('tim_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('tim/daftar_tim');
		}

	// fungsi ini digunkan untuk menampilkan daftar tim

	public function daftar_tim()
		{
		//$isi['pesan']="Load Data Berhasil";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->tim_model->get_data_tim();
		$data['content'] = $this->load->view('backend/daftar_tim', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		

	// fungsi ini digunakan untuk menampilkan form tambah tim baru

	public function form_tim()
		{

		$isi['tim'] = $this->tim_model->get_data_tim();
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['urlAction'] = "tim/tambah";
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_tim', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data tim kedalam database

	public function tambah()
		{
			$error=0;
			$nama_tim=$this->input->post('nama_tim');
			$deskripsi_tim= $this->input->post('desc_tim');
			//melakukan validasi form isian
			
			
			
			if($nama_tim==""){
				$isi['errnama_tim'] = true;
				$error=1;
			}
		
			if($deskripsi_tim==""){
				$isi['errdesc_tim'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				$isi['urlAction'] = "tim/tambah";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_tim', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
						
			else{
				
			}
			$datatim = array(
			'NAMA_TIM' => $nama_tim,
			'DESKRIPSI_TIM' => $deskripsi_tim,
			'DATE_CREATED' => DATE('d-m-Y')
			
			);
		$this->tim_model->insert($datatim);
		
		
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('tim/daftar_tim');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data tim

	public function edit($id)
		{
		$hasil = $this->tim_model->selectone($id);
		$isi['urlAction'] = "tim/update/" . $id . "";
		$isi['nama_tim'] = "";
		$isi['tim'] = "";
		$isi['bobot'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_tim'] = $row->NAMA_TIM;
			$isi['desc_tim'] = $row->DESKRIPSI_TIM;
			
			
			}
		$isi['tim'] = $this->tim_model->get_data_tim();
		$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();

		$isi['edit'] = true;
		$data['header'] = $this->load->view('backend/header');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
		$data['content'] = $this->load->view('backend/form_tim', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data tim yang ada di database

	public function update($id)
		{
		$error=0;
			$nip_tim=$this->input->post('nip_tim');
			$nama_tim=$this->input->post('nama_tim');
			$profesi= $this->input->post('profesi');
			$kategori_tim	=$this->input->post('kategori_tim');
			$pengalaman= $this->input->post('pengalaman');
			//melakukan validasi form isian
			
			if($nama_tim==""){
				$isi['errnip_tim'] = true;
				$error=1;
			}
			
			if($nama_tim==""){
				$isi['errnama_tim'] = true;
				$error=1;
			}
			if($profesi==0){
				$isi['errprofesi'] = true;
				$error=1;
			}
			
			if($kategori_tim==0){
				$isi['errkategori_tim'] = true;
				$error=1;
			}
			
			if($pengalaman==""){
				$isi['errpengalaman'] = true;
				$error=1;
			}
			
			
			
			if($error==1){
				
				$isi['tim'] = $this->tim_model->get_data_tim();
				$isi['profesi'] 		 = $this->profesi_model->get_data_profesi();
				$isi['urlAction'] = "tim/edit/".$id."";
				$data['header'] = $this->load->view('backend/header');
				$data['menu_kiri'] = $this->load->view('backend/menu_kiri');
				$data['content'] = $this->load->view('backend/form_tim', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
			$datatim = array(
			'ID_TIM' => $kategori_tim
			
		);
		$this->tim_model->update_tim_tim($datatim,$id);
		
		//get id tim yang akan diupdate
		$id_tim= $this->tim_model->selectone($id)->row()->ID_tim; 
			
			$datatim = array(
			'NAMA' => $nama_tim,
			'NIP' => $nip_tim,
			'ID_PROFESI' => $profesi ,
			'PENGALAMAN' => $pengalaman
			
			);
		$this->tim_model->update_tim($datatim,$id_tim);
		$this->session->set_flashdata('pesan', 'Data Sudah Diperbaharui');
		redirect('tim/daftar_tim');
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data tim

	public function delete($id)
		{
		$this->tim_model->delete_tim_tim($id);
		$this->tim_model->delete_tim();
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('tim/daftar_tim');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */