<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller

	{
	/**
	 * Ini merupakan Sebuah controller untuk menghubungkan view user dan model user
	 * Semua CRUD yang berhubungan dengan user memanggil controller ini
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
		$this->load->model('user_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('user/daftar_pengguna');
		}

	// fungsi ini digunkan untuk menampilkan daftar user
	public function daftar_pengguna()
		{
		//$isi['pesan']="Load Data Berhasil";
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = $this->user_model->get_data_user();
		$isi['id_user']      = $this->session->userdata('id_user');
		$data['content'] = $this->load->view('backend/daftar_pengguna', $isi);
		$this->load->view('/backend/main', $data);
		}
		
		
		
	// fungsi ini digunakan untuk menampilkan form tambah user baru

	public function form_pengguna()
		{

		// $data['header']=$this->load->view('backend/header');
		//
		// $data['content']=$this->load->view('backend/form

		$isi['urlAction'] = "user/tambah";
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$isi['id_user']      = $this->session->userdata('id_user');
		$data['content'] = $this->load->view('backend/form_pengguna', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk menambahkan data user kedalam database

	public function tambah()
		{
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama')==""){
				$isi['errnama'] = true;
				$error=1;
			}
			if($this->input->post('username')==""){
				$isi['errusername'] = true;
				$error=1;
			}
			if($this->input->post('email')==""){
				$isi['erremail'] = true;
				$error=1;
			}
			if($this->input->post('password')==""){
				$isi['errpassword'] = true;
				$error=1;
			}
			if($this->input->post('peran')==""){
				$isi['errperan'] = true;
				$error=1;
			}
			
			
			if($error==1){
				
				$isi['urlAction'] = "user/tambah";
				$user['nama']    = $this->session->userdata('nama');
        $data['header']    = $this->load->view('backend/header',$user);
				$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
				$data['content'] = $this->load->view('backend/form_pengguna', $isi);
				$this->load->view('/backend/main', $data);
				return;
			
			}
			
		
		$data = array(
			'NAMA' => $this->input->post('nama') ,
			'USERNAME' => $this->input->post('username') ,
			'EMAIL' => $this->input->post('email') ,
			'PASSWORD' => md5($this->input->post('password')) ,
			'ROLE' => $this->input->post('peran') ,
		);
		$this->user_model->insert($data);
		$this->session->set_flashdata('pesan', 'Data Sudah tersimpan');
		redirect('user/daftar_pengguna');
		
		}

	// fungsi ini digunakan untuk melakukan pengubahan terhadap data user

	public function edit($id)
		{
		$hasil = $this->user_model->selectone($id);
		$isi['urlAction'] = "user/update/" . $id . "";
		$isi['nama_isi'] = "";
		$isi['username'] = "";
		$isi['password'] = "";
		$isi['role'] = "";
		$isi['url_foto'] = "";
		foreach($hasil->result() as $row)
			{
			$isi['nama_isi'] = $row->NAMA;
			$isi['username'] = $row->USERNAME;
			$isi['email'] = $row->EMAIL;
			
			$isi['role_isi'] = $row->ROLE;
			
			}

		$isi['edit'] = true;
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$isi['role']      = $this->session->userdata('role');
		$data['content'] = $this->load->view('backend/form_pengguna', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunakan untuk melakukan pengubahan data user yang ada di database

	public function update($id)
		{
			//validate recent password
			$isi['edit'] = true;
			$isi['role']      = $this->session->userdata('role');
			$hasil = $this->user_model->selectone($id);
			$error=0;
			//melakukan validasi form isian
			
			if($this->input->post('nama')==""){
				$isi['errnama'] = true;
				$error=1;
			}
			if($this->input->post('username')==""){
				$isi['errusername'] = true;
				$error=1;
			}
			if($this->input->post('email')==""){
				$isi['erremail'] = true;
				$error=1;
			}
			if($this->input->post('password')==""){
				$isi['errpassword'] = true;
				$error=1;
			}
			$found=false;
			if($this->session->userdata('role')>1){
			if($this->input->post('recpassword')==""){
				$isi['errrecpasswrod'] = true;
				$error=1;
			}
			
			
			
			foreach($hasil->result() as $row)
			{
						
			if(md5($this->input->post('recpassword'))==$row->PASSWORD){
			$found=true;
			break;
		 	
			}
									
			}
			if($found==false){
				$isi['urlAction'] = "user/update/" . $id . "";
			
			$isi['nama_isi'] = $hasil->row()->NAMA;
			$isi['username'] = $hasil->row()->USERNAME;
			$isi['email'] = $hasil->row()->EMAIL;
			$isi['role_isi'] = $hasil->row()->ROLE;
			$isi['pesan'] = "Password Tidak sesuai dengan yang sebelumnya";
			$error=1;
			}
			
			}
			if($this->input->post('peran')==""){
				$isi['errperan'] = true;
				$error=1;
			}
			
			
		
			
	if($error==0){
		$data = array(
			'NAMA' => $this->input->post('nama') ,
			'USERNAME' => $this->input->post('username') ,
			'EMAIL' => $this->input->post('email') ,
			'PASSWORD' => md5($this->input->post('password')) ,
			'ROLE' => $this->input->post('peran')
			
		);
		$this->user_model->update($data, $id);
		$this->session->set_flashdata('pesan', 'Data Berhasil diperbaharui');
		redirect('user/daftar_pengguna');
	}
	else{
		
		$isi['urlAction'] = "user/update/" . $id . "";
			$isi['nama_isi'] = $hasil->row()->NAMA;
			$isi['username'] = $hasil->row()->USERNAME;
			$isi['role_isi'] = $hasil->row()->ROLE;
			
			$user['nama']    = $this->session->userdata('nama');
			$user['id_user']    = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
			$role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
			$data['content'] = $this->load->view('backend/form_pengguna', $isi);
			$this->load->view('/backend/main', $data);
	}
		}

	// fungsi ini digunakan untuk melakukan penghapusan terhadap data user

	public function delete($id)
		{
		$this->user_model->delete($id);
		$this->session->set_flashdata('pesan', 'Data Berhasil Dihapus');
		redirect('user/daftar_pengguna');
		}
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */