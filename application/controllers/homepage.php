<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Homepage extends CI_Controller

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

			redirect('login');

			}
		}

	public function index()
		{
		//$isi['pesan']="Load Data Berhasil";
		$user['nama']    = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header',$user);
		$role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		$isi['pesan']=$this->session->flashdata('pesan');
		$isi['isi'] = "";
		$isi['nama']    = $this->session->userdata('nama');
		$data['content'] = $this->load->view('backend/homepage', $isi);
		$this->load->view('/backend/main', $data);
		}

	// fungsi ini digunkan untuk menampilkan daftar aktivitas

	
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */