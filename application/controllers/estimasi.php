<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Estimasi extends CI_Controller
{
    /**
     * Ini merupakan Sebuah controller untuk menghubungkan view uc dan model uc
     * Semua CRUD yang berhubungan dengan uc memanggil controller ini
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
        // $this->load->library('../controllers/mailler');
        require_once(APPPATH . 'controllers/mailler.php');
        $this->load->model('uc_model');
        $this->load->model('aw_model');
        $this->load->model('tcf_model');
        $this->load->model('ecf_model');
        $this->load->model('tim_model');
        $this->load->model('anggota_model');
        $this->load->model('aplikasi_model');
        $this->load->model('client_model');
        $this->load->model('fitur_model');
        $this->load->model('log_use_case_model');
        $this->load->model('log_aktor_model');
        $this->load->model('log_tcf_model');
        $this->load->model('log_ecf_model');
        $this->load->model('log_konstanta_effort_model');
        $this->load->model('log_biaya_model');
        $this->load->model('aktivitas_model');
		$this->load->model('user_model');
        
        
        //$this->load->library('session');
        if ($this->session->userdata('id_user') == NULL) {
            
            redirect('login');
            
        }
		
		 
		
		
        
    }
    
    public function index()
    {
        redirect('form_client');
    }
    function current_step($get_value)
    {
        $inputSplit  = explode("-", $get_value);
        $id_aplikasi = $inputSplit[0];
        // error handling
        $step        = isset($inputSplit[1]) ? $inputSplit[1] : 0;
        
        
        if ($step == 1) {
            $this->session->set_userdata('step', $step);
            $this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/form_aplikasi/' . $id_aplikasi);
        }
        
        if ($step == 2) {
            //$this->session->set_userdata('step', $step);
            $this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/form_edit_aplikasi/' . $id_aplikasi);
        }
        
        else if ($step == 3) {
           // $this->session->set_userdata('step', $step);
            $this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/form_uucw');
        }
        
        else if ($step == 4) {
           // $this->session->set_userdata('step', $step);
            $this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/form_uaw');
        }
        
        else if ($step == 5) {
            //$this->session->set_userdata('step', $step);
            $this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/edit_log_tcf/' . $id_aplikasi);
        }
        
        else if ($step == 6) {
            //$this->session->set_userdata('step', $step);
            $this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/edit_log_ecf/' . $id_aplikasi);
        } else if ($step == 7) {
            //$this->session->set_userdata('step', $step);
            $this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/result');
        }
		else if ($step == 8) {
			$this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/result');
			
            //$this->session->set_userdata('step', $step);
           // $this->session->set_userdata('id_aplikasi', $id_aplikasi);
           // redirect('log_estimasi/form_effort');
        }
		
		else if ($step == 9) {
			$this->session->set_userdata('id_aplikasi', $id_aplikasi);
            redirect('estimasi/result');
			
            //$this->session->set_userdata('step', $step);
           // $this->session->set_userdata('id_aplikasi', $id_aplikasi);
           // redirect('log_estimasi/form_effort');
        }
		
        
    }
	
	public function lihat_tim($id_aplikasi){
		
		$this->session->set_userdata('id_aplikasi',$id_aplikasi);
		redirect('estimasi/form_edit_aplikasi/' . $id_aplikasi);

	}
    

    public function form_client()
    {
		$this->session->set_userdata('id_aplikasi',null);
        $isi['anggota']     = $this->anggota_model->get_data_anggota();
        $isi['anggota_tim'] = $this->aplikasi_model->get_anggota_tim(0);
        $isi['pesan_error'] = "";
        
       
       
		
		
        $isi['step'] = 0;
        
        if ($this->session->flashdata('pesan') != "") {
            $isi['kirim'] = $this->session->flashdata('pesan');
        }
        
        
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
		$role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
		
        $data['content']   = $this->load->view('frontend/form_client', $isi);
        
        $this->load->view('/backend/main', $data);
    }
    
    public function form_edit_client($id)
    {
        $id_aplikasi=$this->session->userdata('id_aplikasi');
        $isi['id_aplikasi'] = 
        //$this->session->set_userdata('ubah_ucp',true);
        $isi['nama_client'] = $this->client_model->get_client($id)->row()->NAMA;
        $isi['alamat']      = $this->client_model->get_client($id)->row()->ALAMAT;
        $isi['tanggal']     = $this->client_model->get_client($id)->row()->TANGGAL_PENGAJUAN;
        $isi['id_client']   = $this->client_model->get_client($id)->row()->ID_CLIENT;
        $isi['edit']        = true;
        
        
        if ($this->session->flashdata('pesan') != "") {
            $isi['kirim'] = $this->session->flashdata('pesan');
        }
        
        if ($this->session->flashdata('pesan_error') != "") {
            $isi['pesan_error'] = $this->session->flashdata('pesan_error');
        } else {
            $isi['pesan_error'] = "";
        }
        
        $isi['step']       = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_client', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function add_client()
    {
        $nama_client = $this->input->post('nama_client');
        $alamat      = $this->input->post('alamat');
        $tanggal     = $this->input->post('tanggal');
        
        
        $valid = true;
        
        if ($nama_client == "") {
            $valid            = true;
            $isi['errclient'] = "Nama Client belum dimasukan";
            
        }
        if ($alamat == "") {
            $valid            = false;
            $isi['erralamat'] = "Alamat  belum dimasukan";
            
        }
        
        if ($tanggal == "") {
            $valid             = false;
            $isi['errtanggal'] = "Tanggal belum   dimasukan";
        }
        
        if ($valid) {
            
            
            $dataclient = array(
                'NAMA' => $nama_client,
                'ALAMAT' => $alamat,
                'TANGGAL_PENGAJUAN' => $tanggal
            );
            
            $this->client_model->insert_data_client($dataclient);
            $id_client    = $this->client_model->select_max_id_client()->row()->ID_CLIENT;
            // insert for initial aplikasi
            $dataaplikasi = array(
                'ID_CLIENT' => $id_client,
                'STEP' => 1,
				'DATE_CREATED' => DATE('d-m-Y')
            );
            
            $this->aplikasi_model->insert_data_aplikasi($dataaplikasi);
            
            // get id max aplikasi and store in the session
            $this->session->set_userdata('id_aplikasi', $this->aplikasi_model->get_max_id()->row()->ID_APLIKASI);
            $id_aplikasi = $this->session->userdata('id_aplikasi');
            
            $this->session->set_flashdata('pesan', "Data client berhasil disimpan");
            redirect('estimasi/form_aplikasi/' . $id_aplikasi);
            
        } else {
            
            $isi['step'] = 0;
            
            $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
            $data['header']    = $this->load->view('backend/header', $user);
            $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
            $data['content']   = $this->load->view('frontend/form_client', $isi);
            $this->load->view('/backend/main', $data);
            
            
            
        }
        
        
        
    }
    
    public function update_client()
    {
        $nama_client = $this->input->post('nama_client');
        $id_client   = $this->input->post('id_client');
        $alamat      = $this->input->post('alamat');
        $tanggal     = $this->input->post('tanggal');
        
        
        $valid = true;
        
        if ($nama_client == "") {
            $valid            = true;
            $isi['errclient'] = "Nama Client belum dimasukan";
            
        }
        if ($alamat == "") {
            $valid            = false;
            $isi['erralamat'] = "Alamat  belum dimasukan";
            
        }
        
        if ($tanggal == "") {
            $valid             = false;
            $isi['errtanggal'] = "Tanggal belum   dimasukan";
        }
        
        if ($valid) {
            
            
            $dataclient = array(
                'NAMA' => $nama_client,
                'ALAMAT' => $alamat,
                'TANGGAL_PENGAJUAN' => $tanggal
            );
            
            $this->client_model->update_client($dataclient, $id_client);
            
            // get id max aplikasi and store in the session
            
            $id_aplikasi = $this->session->userdata('id_aplikasi');
            
            $this->session->set_flashdata('pesan', "Data client berhasil disimpan");
            redirect('estimasi/form_edit_client/' . $id_aplikasi);
            
        } else {
            
            $isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
            
            $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
            $data['header']    = $this->load->view('backend/header', $user);
            $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
            $data['content']   = $this->load->view('frontend/form_client', $isi);
            $this->load->view('/backend/main', $data);
            
            
            
        }
        
        
        
    }
    
    
    public function form_aplikasi($id_aplikasi)
    {
        
        $isi['anggota']     = $this->anggota_model->get_data_anggota();
        $isi['anggota_tim'] = $this->aplikasi_model->get_anggota_tim(0);
        $isi['pesan_error'] = "";
        
        $isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        
        if ($this->session->flashdata('pesan') != "") {
            $isi['kirim'] = $this->session->flashdata('pesan');
        }
        
        
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_aplikasi', $isi);
        
        $this->load->view('/backend/main', $data);
    }
    
    public function add_aplikasi()
    {
        $nama_aplikasi  = $this->input->post('nama_aplikasi');
        $templete       = $this->input->post('templete');
        $tim_pengembang = $this->input->post('tim_pengembang');
        $id_aplikasi    = $this->session->userdata('id_aplikasi');
        
        $valid = true;
        
        if ($nama_aplikasi == "") {
            $valid              = true;
            $isi['erraplikasi'] = "Nama aplikasi belum dimasukan";
            
        }
        if ($templete == "") {
            $valid              = false;
            $isi['errtemplete'] = "Template aplikasi belum dimasukan";
            
        }
        
        if ($tim_pengembang == 0) {
            $valid         = false;
            $isi['errtim'] = "Tim Pengembang belum  dimasukan";
        }
        
        if ($valid) {
            
            // Menambah tim baru
            $nama_tim = "Tim " . $nama_aplikasi;
            $datatim  = array(
                
                'NAMA_TIM' => $nama_tim
            );
            $this->aplikasi_model->insert_tim($datatim);
            // get maksimal ID Tim
            $id_tim = $this->aplikasi_model->select_max_id_tim()->row()->ID_TIM;
            
            foreach ($tim_pengembang as $data) {
                $dataanggota = array(
                    
                    'ID_TIM' => $id_tim,
                    'ID_ANGGOTA' => $data
                );
                
                $this->aplikasi_model->insert_anggota_tim($dataanggota);
                //echo $row;
                //echo '<br>';
                
            }
            
            $dataaplikasi = array(
                'NAMA_APLIKASI' => $nama_aplikasi,
                'TEMPLATE' => $templete,
                'ID_TIM' => $id_tim,
                'STATUS' => 0,
               // 'DATE_CREATED' => DATE('d-m-Y'),
				'STEP' => 2,
            );
                       
            $this->aplikasi_model->update_aplikasi($dataaplikasi, $id_aplikasi);
          
            // $this->aplikasi_model->insert_data_aplikasi($dataaplikasi);
            // get id max aplikasi and store in the session
            //$this->session->set_userdata('id_aplikasi', $this->aplikasi_model->get_max_id()->row()->ID_APLIKASI);
            
            $this->session->set_flashdata('pesan', "Deskripsi aplikasi berhasil disimpan");
            redirect('estimasi/form_edit_aplikasi/' . $id_aplikasi);
            
        } else {
             $isi['anggota']     = $this->anggota_model->get_data_anggota();
        $isi['anggota_tim'] = $this->aplikasi_model->get_anggota_tim(0);
        $isi['pesan_error'] = "";
        
        $isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        
       
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_aplikasi', $isi);
		
            $this->load->view('/backend/main', $data);
            
            
            
        }
        
        
        
    }
    
    public function form_edit_aplikasi($id)
    {
        // check deskripsi apps udah dimasukan atau belum
        $check = $this->aplikasi_model->edit_log_aplikasi($id)->num_rows;
        if ($check == 0) {
            redirect('estimasi/form_aplikasi');
        }
        
        $isi['id_aplikasi']   = $id;
        //$this->session->set_userdata('ubah_ucp',true);
        $isi['nama_aplikasi'] = $this->aplikasi_model->edit_log_aplikasi($id)->row()->NAMA_APLIKASI;
        $isi['id_tim']        = $this->aplikasi_model->edit_log_aplikasi($id)->row()->ID_TIM;
        $isi['edit']          = true;
        $isi['visible']       = true;
        $isi['templete']      = $this->aplikasi_model->edit_log_aplikasi($id)->row()->TEMPLATE;
        $isi['anggota']       = $this->anggota_model->get_data_anggota();
        $isi['anggota_tim']   = $this->aplikasi_model->get_anggota_tim($id);
        $isi['fitur']         = $this->fitur_model->get_fitur($id);
        $isi['id']            = $id;
        
        if ($this->session->flashdata('pesan') != "") {
            $isi['kirim'] = $this->session->flashdata('pesan');
        }
        
        if ($this->session->flashdata('pesan_error') != "") {
            $isi['pesan_error'] = $this->session->flashdata('pesan_error');
        } else {
            $isi['pesan_error'] = "";
        }
        
        
        $isi['step']       = $this->aplikasi_model->edit_log_aplikasi($id)->row()->STEP;
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_aplikasi', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function add_fitur()
    {
        
        $nama_fitur  = $this->input->post('nama_fitur');
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        
        $datafitur = array(
            'NAMA_FITUR' => $nama_fitur,
            'ID_APLIKASI' => $id_aplikasi
            
        );
        $validasi  = strtolower(str_replace(' ', '', $nama_fitur));
        
        
        if (strlen($validasi) == 0) {
            $this->session->set_flashdata('pesan_error', "Nama Fitur kosong");
            
        } else {
            $exsist = false;
            // get current fitur name
            $hasil  = $this->fitur_model->get_fitur($id_aplikasi);
			if($hasil->num_rows !=0){
				 foreach ($hasil->result() as $row) {
                
                if (strtolower(str_replace(' ', '', $row->NAMA_FITUR)) == $nama_fitur) {
                    
                    $this->session->set_flashdata('pesan_error', "Nama fitur sudah ada");
                    $exsist = true;
                    
                }
            }
			}
           
            
            if ($exsist == false) {
                $this->fitur_model->insert_data_fitur($datafitur);
                $isi['kirim'] = $this->session->set_flashdata('pesan', "Nama fitur berhasil disimpan");
                
            }
        }
        
        
        redirect('estimasi/form_edit_aplikasi/' . $id_aplikasi);
        
        
    }
       
    public function delete_fitur($id_fitur)
    {
        $this->fitur_model->delete_fitur($id_fitur);
        
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        $this->session->set_flashdata('pesan', "Fitur berhasil dihapus");
        $isi['kirim'] = $this->session->flashdata('pesan');
        redirect('estimasi/form_edit_aplikasi/' . $id_aplikasi);
        
    }
    public function update_aplikasi()
    {
        $id_aplikasi    = $this->session->userdata('id_aplikasi');
        $nama_aplikasi  = $this->input->post('nama_aplikasi');
        $templete       = $this->input->post('templete');
        $tim_pengembang = $this->input->post('tim_pengembang');
        $biaya_real     = $this->input->post('biaya_real');
        $id_tim         = $this->input->post('id_tim');
        
        $valid = true;
        
        if ($nama_aplikasi == "") {
            $valid              = true;
            $isi['erraplikasi'] = "Nama Aplikasi belum dimasukan";
            
        }
		/*
        if ($templete == "") {
            $valid              = false;
            $isi['errtemplete'] = " Template apliaksi belum  dimasukan";
            
        }
		*/
        
        if ($tim_pengembang == "") {
            $valid         = false;
            $isi['errtim'] = "Tim Pengembang belum  dimasukan";
        }
        
        if ($valid) {
            
            //update_anggota
            $this->aplikasi_model->delete_anggota_tim($id_tim);
           
            foreach ($tim_pengembang as $data) {
                $dataanggota = array(
                    
                    'ID_TIM' => $id_tim,
                    'ID_ANGGOTA' => $data
                );
                
                $this->aplikasi_model->insert_anggota_tim($dataanggota);
            }
            //update data aplikasi
            $dataaplikasi = array(
                'NAMA_APLIKASI' => $nama_aplikasi,
                'TEMPLATE' => $templete
            );
        //    echo var_dump($dataaplikasi);
			//return;
            $this->aplikasi_model->update_aplikasi($dataaplikasi, $id_aplikasi);
            
            $this->session->set_flashdata('pesan', "Deskripsi aplikasi berhasil diperbaharui");
            
            redirect('estimasi/form_edit_aplikasi/' . $id_aplikasi . '');
        } else {
            
            $isi['errtim']        = "Tim Pengembang belum  dimasukan";
            $isi['id_aplikasi']   = $id_aplikasi;
            $isi['nama_aplikasi'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->NAMA_APLIKASI;
            $isi['id_tim']        = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->ID_TIM;
            $isi['edit']          = true;
            $isi['templete']      = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->TEMPLATE;
            $isi['anggota']       = $this->anggota_model->get_data_anggota();
            $isi['anggota_tim']   = $this->aplikasi_model->get_anggota_tim($id_aplikasi);
            $isi['id']            = $id_aplikasi;
            
            if ($this->session->flashdata('pesan') != "") {
                $isi['kirim'] = $this->session->flashdata('pesan');
            }
            
            $isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP; 
            
            $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
            $data['header']    = $this->load->view('backend/header', $user);
            $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
            $data['content']   = $this->load->view('frontend/form_aplikasi', $isi);
            $this->load->view('/backend/main', $data);
            
        }
    }
    
    
    // fungsi ini digunakan untuk menampilkan form tambah uc baru
    public function form_uucw()
    {
        
        
        $this->session->set_userdata('ubah_ucp', true);
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        $jum_simple  = $this->log_use_case_model->countCatUW($id_aplikasi, 1)->row()->JUMLAH;
        $jum_average = $this->log_use_case_model->countCatUW($id_aplikasi, 2)->row()->JUMLAH;
        $jum_complex = $this->log_use_case_model->countCatUW($id_aplikasi, 3)->row()->JUMLAH;
       
        $isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        
        
        
        $isi['jum_simple']  = $jum_simple;
        $isi['jum_average'] = $jum_average;
        $isi['jum_complex'] = $jum_complex;
        
        $isi['hasil']       = $this->log_use_case_model->get_nilaiUUCW($id_aplikasi)->row()->HASIL;
        $isi['id_aplikasi'] = $id_aplikasi;
        $isi['baris']       = $this->log_use_case_model->get_log_use_case($id_aplikasi)->num_rows();
        $isi['isi']         = $this->uc_model->get_data_uc();
        
        $isi['log'] = $this->log_use_case_model->get_log_use_case($id_aplikasi);
        if ($this->session->flashdata('pesan') != "") {
            $isi['kirim'] = $this->session->flashdata('pesan');
        }
        
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_uucw', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function add_uucw()
    {
        
        
        // melakukan penyimpanan use case dan jumlah transaksi serta melakukan pengkategorian use case
        $namaUseCase                = $this->input->post('nama_uc');
        $inputtransaksi             = $this->input->post('jum_transaksi');
        $status["errnama_uc"]       = "";
        $status["errjum_transaksi"] = "";
        //get session id_aplikasi
        $id_aplikasi                = $this->session->userdata('id_aplikasi');
        if ($namaUseCase == "") {
            $status["errnama_uc"] = "  Nama Use Case belum dimasukan";
            
        }
        if ($inputtransaksi == 0) {
            $status["errjum_transaksi"] = " Jumlah transaksi belum dimasukan";
            
        }
        
        
        if ( is_numeric($inputtransaksi) == false  ) {
            $status["errjum_transaksi"] = " Jumlah transaksi harus Angka ";
            
        }
        if ($inputtransaksi < 0 ) {
            $status["errjum_transaksi"] = " Jumlah transaksi harus bilangan positif ";
            
        }
		if(is_numeric($inputtransaksi) && strpos($inputtransaksi, ".") !== false){
			 $status["errjum_transaksi"] = " Jumlah transaksi harus bilangan bulat positif ";
		}
        
        $ada      = false;
        // get data use case yang sudah ada.
        $get_data = $this->log_use_case_model->get_log_use_case($id_aplikasi);
        
        foreach ($get_data->result() as $row) {
            $nama_use_case = $row->NAMA_USE_CASE;
            
            
            $existing_use_case = strtolower(str_replace(' ', '', $nama_use_case));
            
            $potential_use_case = strtolower(str_replace(' ', '', $namaUseCase));
            
            if ($existing_use_case == $potential_use_case) {
                $ada = true;
                break;
                
            }
            
            
        }
        
        if ($ada) {
            
            $status["errnama_uc"] = " Nama Use case  sudah dimasukan";
        }
        
        else {
            
            //checking klasifikasi categori berdasarkan use case
            // get all catgory
            $result = $this->uc_model->get_data_uc();
            
            foreach ($result->result() as $row) {
                
                $id_category      = $row->ID_P_UC;
                $jumlah_transaksi = $row->JUMLAH_TRANSAKSI;
                $bobot            = $row->BOBOT;
                
                // checking characteristic of character
                if (substr($row->JUMLAH_TRANSAKSI, 0, 2) == "<=") {
                    
                    //conversi  mix string to int
                    $number = (float) filter_var($jumlah_transaksi, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    
                    if ($number <= $inputtransaksi) {
                        $datauc = array(
                            'ID_APLIKASI' => $id_aplikasi,
                            'NAMA_USE_CASE' => $namaUseCase,
                            'JUMLAH_TRANSAKSI' => $inputtransaksi,
                            'ID_P_UC' => $id_category
                        );
                        $this->log_use_case_model->insert_log_use_case($datauc);
                        break;
                    }
                } elseif (substr($row->JUMLAH_TRANSAKSI, 0, 2) == ">=") {
                    
                    //conversi  mix string to int
                    $number = (float) filter_var($row->JUMLAH_TRANSAKSI, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    
                    if ($number <= $inputtransaksi) {
                        $datauc = array(
                            'ID_APLIKASI' => $id_aplikasi,
                            'NAMA_USE_CASE' => $namaUseCase,
                            'JUMLAH_TRANSAKSI' => $inputtransaksi,
                            'ID_P_UC' => $id_category
                        );
                        $this->log_use_case_model->insert_log_use_case($datauc);
                        break;
                    }
                    
                } else {
                    $inputRangeSplit = explode("-", $jumlah_transaksi);
                    $awal            = $inputRangeSplit[0];
                    // error handling
                    $akhir           = isset($inputRangeSplit[1]) ? $inputRangeSplit[1] : 0;
                    
                    
                    if (($awal <= $inputtransaksi) && ($inputtransaksi <= $akhir)) {
                        $datauc = array(
                            'ID_APLIKASI' => $id_aplikasi,
                            'NAMA_USE_CASE' => $namaUseCase,
                            'JUMLAH_TRANSAKSI' => $inputtransaksi,
                            'ID_P_UC' => $id_category
                        );
                        
                        $this->log_use_case_model->insert_log_use_case($datauc);
                        break;
                        
                    }
                    
                }
                
                
            }
            $status["STATUS"]  = " Nama use case dan aplikasi sudah disimpan, silahkan masukan use case yang lain";
            $status["diasble"] = true;
        }
        
        
        $hasil = $this->log_use_case_model->get_nilaiUUCW($this->session->userdata('id_aplikasi'))->row()->HASIL;
        
        // insert data from Use Case Weight in log transaction
        $id_aplikasi = $this->session->userdata('id_aplikasi');
		
		
		$step=$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
		if($step<3){
			$step=3;
		}
		
        $dataucw     = array(
            'UUCW' => $hasil,
			'STEP' => $step,
        );
       
        $this->aplikasi_model->update_aplikasi($dataucw, $id_aplikasi);
        
        echo json_encode($status);
        
        
    }
    
    public function form_edit_uucw($id_log_uc)
    {
        // setting session null
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        
        $jum_simple           = $this->log_use_case_model->countCatUW($id_aplikasi, 1)->row()->JUMLAH;
        $jum_average          = $this->log_use_case_model->countCatUW($id_aplikasi, 2)->row()->JUMLAH;
        $jum_complex          = $this->log_use_case_model->countCatUW($id_aplikasi, 3)->row()->JUMLAH;
        $isi['jum_simple']    = $jum_simple;
        $isi['jum_average']   = $jum_average;
        $isi['jum_complex']   = $jum_complex;
        $isi['id_log_uc']     = $id_log_uc;
        $isi['baris']         = $this->log_use_case_model->get_log_use_case($id_aplikasi)->num_rows();
        $isi['nama_use_case'] = $this->log_use_case_model->selectone_log_ucw($id_log_uc)->row()->NAMA_USE_CASE;
        $isi['jum_transaksi'] = $this->log_use_case_model->selectone_log_ucw($id_log_uc)->row()->JUMLAH_TRANSAKSI;
        $isi['hasil']         = $this->log_use_case_model->get_nilaiUUCW($id_aplikasi)->row()->HASIL;
        $isi['id_aplikasi']   = $id_aplikasi;
        $isi['isi']           = $this->uc_model->get_data_uc();
       
        
		$isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $isi['log']        = $this->log_use_case_model->get_log_use_case($id_aplikasi);
        //$isi['kirim']      = $this->session->flashdata('pesan');
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_uucw', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function update_log_ucw($id_log_ucw)
    {
        
        // initial value
        $jum_simple                 = 0;
        $jum_average                = 0;
        $jum_complex                = 0;
        $status["errjum_transaksi"] = 0;
        $status["errnama_uc"]       = "";
        // melakukan penyimpanan use case dan jumlah transaksi serta melakukan pengkategorian use case
        $namaUseCase                = $this->input->post('nama_uc');
        $inputtransaksi             = $this->input->post('jum_transaksi');
        $id_aplikasi                = $this->session->userdata('id_aplikasi');
        
        if ($namaUseCase == "") {
            $status["errnama_uc"] = " Anda belum memasukan Nama Use Case";
            
        }
        if ($inputtransaksi == 0) {
            $status["errjum_transaksi"] = " Anda belum memsukan transaksi";
            
        }
        
        
        
        
        
        
        else {
            
            //checking klasifikasi categori berdasarkan use case
            // get all catgory
            $result = $this->uc_model->get_data_uc();
            
            foreach ($result->result() as $row) {
                
                $id_category      = $row->ID_P_UC;
                $jumlah_transaksi = $row->JUMLAH_TRANSAKSI;
                $bobot            = $row->BOBOT;
                
                // checking characteristic of character
                if (substr($row->JUMLAH_TRANSAKSI, 0, 2) == "<=") {
                    
                    //conversi  mix string to int
                    $number = (float) filter_var($jumlah_transaksi, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    
                    if ($number <= $inputtransaksi) {
                        $datauc = array(
                            'ID_APLIKASI' => $id_aplikasi,
                            'NAMA_USE_CASE' => $namaUseCase,
                            'JUMLAH_TRANSAKSI' => $inputtransaksi,
                            'ID_P_UC' => $id_category
                        );
                        
                        $this->log_use_case_model->update_log_uc_weight($datauc, $id_log_ucw);
                        break;
                    }
                } elseif (substr($row->JUMLAH_TRANSAKSI, 0, 2) == ">=") {
                    
                    //conversi  mix string to int
                    $number = (float) filter_var($row->JUMLAH_TRANSAKSI, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                    
                    if ($number <= $inputtransaksi) {
                        $datauc = array(
                            'ID_APLIKASI' => $id_aplikasi,
                            'NAMA_USE_CASE' => $namaUseCase,
                            'JUMLAH_TRANSAKSI' => $inputtransaksi,
                            'ID_P_UC' => $id_category
                        );
                        
                        $this->log_use_case_model->update_log_uc_weight($datauc, $id_log_ucw);
                        break;
                    }
                    
                } else {
                    $inputRangeSplit = explode("-", $jumlah_transaksi);
                    $awal            = $inputRangeSplit[0];
                    // error handling
                    $akhir           = isset($inputRangeSplit[1]) ? $inputRangeSplit[1] : 0;
                    
                    
                    if (($awal <= $inputtransaksi) && ($inputtransaksi <= $akhir)) {
                        $datauc = array(
                            'ID_APLIKASI' => $id_aplikasi,
                            'NAMA_USE_CASE' => $namaUseCase,
                            'JUMLAH_TRANSAKSI' => $inputtransaksi,
                            'ID_P_UC' => $id_category
                        );
                        
                        $this->log_use_case_model->update_log_uc_weight($datauc, $id_log_ucw);
                        break;
                        
                    }
                    
                }
            }
            $status["STATUS"] = " Nama use case dan aplikasi sudah Diperbaharui";
        }
        
        
        
        // kalkulasi hasil akhir perhitungan
        $hasil = $hasil = $this->log_use_case_model->get_nilaiUUCW($id_aplikasi)->row()->HASIL;
        
        $dataucw = array(
            'UUCW' => $hasil
        );
        
        $this->aplikasi_model->update_aplikasi($dataucw, $id_aplikasi);
        
        
        echo json_encode($status);
        
        
        
        
    }
    
    public function delete_log_ucw($get_value)
    {
        
        $inputSplit  = explode("-", $get_value);
        $id_ucw      = $inputSplit[0];
        // error handling
        $id_aplikasi = isset($inputSplit[1]) ? $inputSplit[1] : 0;
        
        $this->log_use_case_model->delete_log_uc_weight($id_ucw);
        // rekalkulasi hasil akhir perhitungan
        $hasil   = $this->log_use_case_model->get_nilaiUUCW($id_aplikasi)->row()->HASIL;
        $dataucw = array(
            'UUCW' => $hasil
        );
        
        $this->aplikasi_model->update_aplikasi($dataucw, $id_aplikasi);
        
        $this->session->set_flashdata('pesan', "Data berhasil dihapus");
        redirect('estimasi/form_uucw');
        
    }
    
    public function form_uaw()
    {
        
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        $this->session->set_userdata('ubah_ucp', true);
        
        $jum_simple         = $this->log_aktor_model->countCatAW($id_aplikasi, 1)->row()->JUMLAH;
        $jum_average        = $this->log_aktor_model->countCatAW($id_aplikasi, 2)->row()->JUMLAH;
        $jum_complex        = $this->log_aktor_model->countCatAW($id_aplikasi, 3)->row()->JUMLAH;
        $isi['log_aw']      = $this->log_aktor_model->get_log_aktor_weight($id_aplikasi);
        $hasil              = $this->log_aktor_model->get_nilaiUAW($id_aplikasi)->row()->HASIL;
        $isi['id_aplikasi'] = $id_aplikasi;
        if ($this->session->flashdata('pesan') != "") {
            $isi['kirim'] = $this->session->flashdata('pesan');
        }
       
        $isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        
        $isi['baris']       = $this->log_aktor_model->get_log_aktor_weight($id_aplikasi)->num_rows();
        $isi['jum_simple']  = $jum_simple;
        $isi['jum_average'] = $jum_average;
        $isi['jum_complex'] = $jum_complex;
        $isi['hasil']       = $hasil;
        $isi['isi']         = $this->aw_model->get_data_aw();
        $isi['log_aw']      = $this->log_aktor_model->get_log_aktor_weight($id_aplikasi);
        $isi['id_aplikasi'] = $id_aplikasi;
        $user['nama']       = $this->session->userdata('nama');
        $data['header']     = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']    = $this->load->view('frontend/form_uaw', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function add_uaw()
    {
        
        // initial value
        $jum_simple       = 0;
        $jum_average      = 0;
        $jum_complex      = 0;
        $status["STATUS"] = "";
        $nama_aktor       = $this->input->post('nama_aktor');
        $kategori         = $this->input->post('kategori');
        // log transaksi
        
        
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        
        $status["STATUS"]        = "";
        $status["errnama_aktor"] = "";
        $status["errkategori"]   = "";
        
        if ($nama_aktor == "") {
            
            $status["errnama_aktor"] = "Nama Aktor belum dimasukan";
            
            
            
        }
        if ($kategori == "") {
            $status["errkategori"] = " Kategori aktor belum dimasukan";
        }
        
        $ada       = false;
        // get data use case yang sudah ada.
        $log_aktor = $this->log_aktor_model->get_log_aktor_weight($id_aplikasi);
        
        foreach ($log_aktor->result() as $row) {
            $nama_adaktor = $row->NAMA_AKTOR;
            
            
            $existing_aktor = strtolower(str_replace(' ', '', $nama_adaktor));
            
            $potential_aktor = strtolower(str_replace(' ', '', $nama_aktor));
            
            if ($existing_aktor == $potential_aktor) {
                $ada = true;
                break;
                
            }
            
            
        }
        
        if ($ada) {
            
            $status["errnama_aktor"] = " Nama Aktor sudah sudah ada";
        }
        
        if ($ada == false && $kategori != "" && $nama_aktor != "") {
            
            //get bobot berdasarkan category
            $dataaw = array(
                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                'NAMA_AKTOR' => $nama_aktor,
                'ID_P_A' => $kategori
                
            );
            
            $this->log_aktor_model->insert_log_actor_weight($dataaw);
            $status["STATUS"] = "Data Actor Sudah Dimasukan";
            
            
            $jum_simple  = $this->log_aktor_model->countCatAW($id_aplikasi, 1)->row()->JUMLAH;
            $jum_average = $this->log_aktor_model->countCatAW($id_aplikasi, 2)->row()->JUMLAH;
            $jum_complex = $this->log_aktor_model->countCatAW($id_aplikasi, 3)->row()->JUMLAH;
        }
        // menghitung perumusan UAW
        //$bobot_simple	=$this->estimasi_model->get_bobotAW( 1)->row()->BOBOT;
        //$bobot_average	=$this->estimasi_model->get_bobotAW( 2)->row()->BOBOT;
        //$bobot_complex	=$this->estimasi_model->get_bobotAW( 3)->row()->BOBOT;
        
        //$hasil=($jum_simple*$bobot_simple) +($jum_average*$bobot_average)+($jum_complex*$bobot_complex);
        $hasil = $this->log_aktor_model->get_nilaiUAW($id_aplikasi)->row()->HASIL;
        
        //update log transaction by insert value of AW
        
        $step=$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
		if($step<4){
			$step=4;
		}
		
        $datauaw = array(
            'UAW' => $hasil,
			'STEP'=>$step
        );
        
        $this->aplikasi_model->update_aplikasi($datauaw, $id_aplikasi);
		
        
        // sending value to view by Json
        $status["Simple"]  = $jum_simple;
        $status["Average"] = $jum_average;
        $status["Complex"] = $jum_complex;
        $status["hasil"]   = $hasil;
        //$status["hasil2"] = $hasil2;
        
        echo json_encode($status);
        
        
    }
    
    public function edit_log_aw($id_log_uaw)
    {
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        
        $jum_simple    = $this->log_aktor_model->countCatAW($id_aplikasi, 1)->row()->JUMLAH;
        $jum_average   = $this->log_aktor_model->countCatAW($id_aplikasi, 2)->row()->JUMLAH;
        $jum_complex   = $this->log_aktor_model->countCatAW($id_aplikasi, 3)->row()->JUMLAH;
        $isi['log_aw'] = $this->log_aktor_model->get_log_aktor_weight($id_aplikasi);
        $hasil         = $this->log_aktor_model->get_nilaiUAW($id_aplikasi)->row()->HASIL;
        
        $isi['step']        = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $isi['id_aplikasi'] = $id_aplikasi;
        $isi['id_log_uaw']  = $id_log_uaw;
        $isi['nama_aktor']  = $this->log_aktor_model->selectone_log_aw($id_log_uaw)->row()->NAMA_AKTOR;
        $isi['id_kategori'] = $this->log_aktor_model->selectone_log_aw($id_log_uaw)->row()->ID_P_A;
        $isi['jum_simple']  = $jum_simple;
        $isi['jum_average'] = $jum_average;
        $isi['jum_complex'] = $jum_complex;
        $isi['hasil']       = $hasil;
        $isi['baris']       = $this->log_aktor_model->get_log_aktor_weight($id_aplikasi)->num_rows();
        
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_uaw', $isi);
        $this->load->view('/backend/main', $data);
        
    }
    public function update_log_uaw($id_log_uaw)
    {
        
        // initial value
        $jum_simple              = 0;
        $jum_average             = 0;
        $jum_complex             = 0;
        $status["STATUS"]        = "";
        $status["errnama_aktor"] = "";
        $status["errkategori"]   = "";
        $nama_aktor              = $this->input->post('nama_aktor');
        $kategori                = $this->input->post('kategori');
        $id_aplikasi             = $this->session->userdata('id_aplikasi');
        // log transaksi
        
        
        
        $status["STATUS"] = $jum_simple;
        if ($nama_aktor == "") {
            
            $status["errnama_aktor"] = "Nama Aktor belum dimasukan";
            
            
            
        }
        if ($kategori == "") {
            $status["errkategori"] = "Nama kategori belum dimasukan";
        } else {
            
            //get bobot berdasarkan category
            $bobot  = $this->log_aktor_model->get_bobotAW($kategori)->row()->BOBOT;
            $dataaw = array(
                'NAMA_AKTOR' => $nama_aktor,
                'ID_P_A' => $kategori
            );
            
            $this->log_aktor_model->update_log_actor_weight($dataaw, $id_log_uaw);
            $status["STATUS"] = "Data Actor Sudah Diperbaharui";
            
            
            $jum_simple  = $this->log_aktor_model->countCatAW($id_aplikasi, 1)->row()->JUMLAH;
            $jum_average = $this->log_aktor_model->countCatAW($id_aplikasi, 2)->row()->JUMLAH;
            $jum_complex = $this->log_aktor_model->countCatAW($id_aplikasi, 3)->row()->JUMLAH;
        }
        // menghitung perumusan UAW
        //$bobot_simple	=$this->log_estimasi_model->get_bobotAW( 1)->row()->BOBOT;
        //$bobot_average	=$this->log_estimasi_model->get_bobotAW( 2)->row()->BOBOT;
        //$bobot_complex	=$this->log_estimasi_model->get_bobotAW( 3)->row()->BOBOT;
        
        //$hasil=($jum_simple*$bobot_simple) +($jum_average*$bobot_average)+($jum_complex*$bobot_complex);
        $hasil = $this->log_aktor_model->get_nilaiUAW($id_aplikasi)->row()->HASIL;
        
        //update log transaction by insert value of AW
        
        $id_aplikasi = $id_aplikasi;
        $datauaw     = array(
            'UAW' => $hasil
        );
        
        $this->aplikasi_model->update_aplikasi($datauaw, $id_aplikasi);
        
        // display the result
        $status["Simple"]  = $jum_simple;
        $status["Average"] = $jum_average;
        $status["Complex"] = $jum_complex;
        $status["hasil"]   = $hasil;
        echo json_encode($status);
        
        
    }
    
    public function delete_log_aw($get_value)
    {
        
        $inputSplit  = explode("-", $get_value);
        $id_aw       = $inputSplit[0];
        // error handling
        $id_aplikasi = isset($inputSplit[1]) ? $inputSplit[1] : 0;
        
        $this->log_aktor_model->delete_log_actor_weight($id_aw);
        // rekalkulasi hasil akhir perhitungan
        $hasil  = $this->log_aktor_model->get_nilaiUAW($id_aplikasi)->row()->HASIL;
        $dataaw = array(
            'UAW' => $hasil
        );
        
        $this->aplikasi_model->update_aplikasi($dataaw, $id_aplikasi);
        
        $this->session->set_flashdata('pesan', "Data berhasil dihapus");
        redirect('estimasi/form_uaw/');
        
    }
    
    public function form_tcf()
    {
        
        // $data['header']=$this->load->view('backend/header');
        
        // $data['content']=$this->load->view('backend/form
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        $berisi      = $this->log_tcf_model->get_data_log_tcf($id_aplikasi)->num_rows();
        if ($berisi != 0) {
            redirect('estimasi/edit_log_tcf/' . $id_aplikasi);
            
        }
        
        $this->load->model('tcf_model');
        $isi['isi']  = $this->tcf_model->get_data_tcf();
        $isi['edit'] = false;
        
        
       
        
        $isi['step'] = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $isi['urlAction']  = "uc/tambah";
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_tcf', $isi);
        $this->load->view('/backend/main', $data);
    }
    public function add_tcf()
    {
        // get session id aplikasi
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        // melakukan penghapusan untuk melakukan pembaharuan log jika sudah ada sebelumnya
        $this->log_tcf_model->deletetcf($id_aplikasi);
        // get count indikator tcf untuk pengulangan
        $jumlah             = $this->log_tcf_model->countTf()->row()->JUMLAH;
        //echo var_dump($jumlah);
        $index              = 1;
        $status["variable"] = "";
        $status["errpesan"] = "";
        $status["size"]     = $jumlah;
        $data[]             = "";
        $pesan[]            = "";
        $valid              = true;
        while ($index <= $jumlah) {
            
            $var1   = 'idtcf' . $index . '';
            $var2   = 'bobot' . $index . '';
            $var3   = 'surveytcf' . $index . '';
            $id_tcf = $this->input->post($var1);
            $bobot  = $this->input->post($var2);
            $survey = $this->input->post($var3);
            
            $data[$index] = "errkategori" . $index . "";
            
            $datatcf = array(
                'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
                'ID_P_TCF' => $id_tcf,
                'VALUE' => $survey
                
            );
            //echo var_dump($datatcf);
            
            if ($survey == "") {
                
                $pesan[$index] = "Belum diisi";
                $valid         = false;
                
            } else {
                $pesan[$index] = "";
                $this->log_tcf_model->insert_log_tcf_weight($datatcf);
            }
            
            
            $index++;
            
        }
        
        
        //echo var_dump($index);
        //count using sum untuk mendapatkan nilai tcf
        //mendapatkan jumlah seluruh nilai survey yang dilaikan dengan tcf
        if ($valid) {
            $tf       = $this->log_tcf_model->sumLogTf($id_aplikasi)->row()->VALUE;
            $nilaitcf = 0.6 + (0.01 * $tf);
            
            $status["hasil"] = $nilaitcf;
            
            // melakukan update log_transaction dengan memasukan nilai negatif TCF
            $id_aplikasi = $this->session->userdata('id_aplikasi');
			 $step=$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
		if($step<5){
			$step=5;
		}
		
            $datatcf     = array(
                'TCF' => $nilaitcf,
				'STEP'=>$step
            );
            
            $this->aplikasi_model->update_aplikasi($datatcf, $id_aplikasi);
            $status["variable"] = $data;
            
            $status["STATUS"] = "Data Sudah tersimpan";
            
            
            echo json_encode($status);
            
        } else {
            
            $status["variable"] = $data;
            $status["errpesan"] = $pesan;
            echo json_encode($status);
        }
        
    }
    
    public function edit_log_tcf($id_aplikasi)
    {
        
        
        
        $this->session->set_userdata('ubah_ucp', true);
        //checking value if exist
        $berisi = $this->log_tcf_model->get_data_log_tcf($id_aplikasi)->num_rows();
        if ($berisi == 0) {
            redirect('estimasi/form_tcf');
            
        }
        //echo var_dump($index);
        //count using sum untuk mendapatkan nilai tcf
        //mendapatkan jumlah seluruh nilai survey yang dilaikan dengan tcf
        $tf                 = $this->log_tcf_model->sumLogTf($id_aplikasi)->row()->VALUE;
        $isi['edit']        = true;
        $nilaitcf           = 0.6 + (0.01 * $tf);
        $isi['isi']         = $this->log_tcf_model->get_data_log_tcf($id_aplikasi);
        $isi['step']        = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $isi['id_aplikasi'] = $id_aplikasi;
        $isi['nilai_tcf']   = $nilaitcf;
        $isi['edit']        = true;
        $user['nama']       = $this->session->userdata('nama');
        $data['header']     = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']    = $this->load->view('frontend/form_tcf', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function form_ecf()
    {
        
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        $berisi      = $this->log_ecf_model->get_data_log_ecf($id_aplikasi)->num_rows();
        if ($berisi != 0) {
            redirect('estimasi/edit_log_ecf/' . $id_aplikasi);
            
        }
        
        $isi['isi'] = $this->ecf_model->get_data_tcf();
      
        $isi['step']       = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $isi['urlAction']  = "uc/tambah";
        $isi['edit']       = false;
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/form_ecf', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function add_ecf()
    {
        // get session id aplikasi
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        // untuk melakukan penghapusan terlebih dahulu jika ada pembaharuan
        $jumlah      = $this->log_ecf_model->deleteecf($id_aplikasi);
        // get count indikator tcf untuk pengulangan
        $jumlah      = $this->log_ecf_model->countEf()->row()->JUMLAH;
        $index       = 1;
        
        $status["variable"] = "";
        $status["errpesan"] = "";
        $status["size"]     = $jumlah;
        $data[]             = "";
        $pesan[]            = "";
        $valid              = true;
        while ($index <= $jumlah) {
            
            $var1   = 'idef' . $index . '';
            $var2   = 'bobot' . $index . '';
            $var3   = 'surveyef' . $index . '';
            $id_ecf = $this->input->post($var1);
            $bobot  = $this->input->post($var2);
            $survey = $this->input->post($var3);
            
            $data[$index] = "errkategori" . $index . "";
            $dataecf      = array(
                'ID_APLIKASI' => $id_aplikasi,
                'ID_P_ECF' => $id_ecf,
                'VALUE' => $survey
            );
            if ($survey == "") {
                
                $pesan[$index] = "Belum diisi";
                $valid         = false;
                
            } else {
                $pesan[$index] = "";
                $this->log_ecf_model->insert_log_ecf_weight($dataecf);
            }
            
            
            
            $index++;
            
        }
        
        if ($valid) {
            
            //count using sum untuk mendapatkan nilai tcf
            //mendapatkan jumlah seluruh nilai survey yang dilaikan dengan tcf
            $ef      = $this->log_ecf_model->sumLogEf($id_aplikasi)->row()->VALUE;
            $nilaief = 1.4+ (-0.03 * $ef);
            
            // melakukan update log_transaction dengan memasukan nilai negatif TCF
            $step=$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
		if($step<6){
			$step=6;
		}
		
            $dataecf = array(
                'ECF' => $nilaief,
				'STEP'=>$step
            );
            
            $this->aplikasi_model->update_aplikasi($dataecf, $id_aplikasi);
            
            $status["variable"] = $data;
            $status["hasil"]    = $nilaief;
            $status["STATUS"]   = "Data Sudah tersimpan";
           
            echo json_encode($status);
        } else {
            
            
            $status["variable"] = $data;
            $status["errpesan"] = $pesan;
            echo json_encode($status);
        }
    }
    
    public function edit_log_ecf($id_aplikasi)
    {
        
        
        $this->session->set_userdata('ubah_ucp', true);
        // get count indikator tcf untuk pengulangan
        $jumlah = $this->log_ecf_model->countEf($id_aplikasi)->row()->JUMLAH;
        $index  = 1;
        
        //checking if exist
        $berisi = $this->log_ecf_model->get_data_log_ecf($id_aplikasi)->num_rows();
        if ($berisi == 0) {
            redirect('estimasi/form_ecf');
            
        }
        
        //echo var_dump($index);
        //count using sum untuk mendapatkan nilai tcf
        //mendapatkan jumlah seluruh nilai survey yang dilaikan dengan tcf
        $ef      = $this->log_ecf_model->sumLogEf($id_aplikasi)->row()->VALUE;
        $nilaief = 1.4+ (-0.03 * $ef);
        
        $isi['edit']        = true;
        $isi['isi']         = $this->log_ecf_model->get_data_log_ecf($id_aplikasi);
        $isi['id_aplikasi'] = $id_aplikasi;
        $isi['step']        = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $isi['edit']        = true;
        $isi['nilai_ecf']   = $nilaief;
        $user['nama']       = $this->session->userdata('nama');
        $data['header']     = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']    = $this->load->view('frontend/form_ecf', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    
    public function result()
    {
        // get data log application
        // get session id aplikasi
        $id_aplikasi   = $this->session->userdata('id_aplikasi');
        $get_data      = $this->aplikasi_model->get_nilai_ucp($id_aplikasi);
        $uaw           = $get_data->row()->UAW;
        $ucw           = $get_data->row()->UUCW;
        $ecf           = $get_data->row()->ECF;
        $tcf           = $get_data->row()->TCF;
		$template           = $get_data->row()->TEMPLATE;
		$er           = $get_data->row()->ER;
		
        // mengecek status persetujuan estimasi
        $isi['status'] = $get_data->row()->STATUS;
        // inserting step
       $step=$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
	   if($step<7){
			$step=7;
		}
		
            $step = array(
                'STEP' => $step
            );
            $this->aplikasi_model->update_aplikasi($step, $id_aplikasi);
       
        $nilai_ucp = ($uaw + $ucw) * $ecf * $tcf;
        
        //echo var_dump($nilai_ucp);
        //return;
        // for show into view
        $isi['uaw']       = $uaw;
        $isi['ucw']       = $ucw;
        $isi['ecf']       = $ecf;
        $isi['tcf']       = $tcf;
        $isi['nilai_ucp'] = $nilai_ucp;
        
        $ubah_ucp = $this->session->userdata('ubah_ucp');
        
        $isi['id_aplikasi'] = $id_aplikasi;
        
        // nilai hour effort
        // jika effort rate belum didapatkan, maka akan diambilkan effort rate yang berasal dari effort rata2
		$konstanta_murni =0;
        $isi['nama_metode_usaha'] = "Effort Rata-Rata";
		if($er==0){
			$konstanta_murni          = $this->log_konstanta_effort_model->get_konstanta_effort($template)->row()->RATA_EFFORT;
			$koma_dua=round($konstanta_murni, 2);
			$data_er = array(
                'ER' => $koma_dua
            );
			
		 
		 $this->aplikasi_model->update_aplikasi($data_er, $id_aplikasi);
		}
		else{
			$konstanta_murni =$er;
		}
        
        $konstanta                = round($konstanta_murni, 2);
        $nilai_hour_effort        = $konstanta * $nilai_ucp;
        $isi['nilai_hour_effort'] = $nilai_hour_effort;
		
		// updating hour effort
		
		$hour_effort = array(
                'EFFORT_ESTIMATE' => $nilai_hour_effort
            );
			
		 
		 $this->aplikasi_model->update_aplikasi($hour_effort, $id_aplikasi);
		 
        $isi['effort_rate']       = $konstanta;
        // nilai estimasi usaha
        $distribusi_usaha         = $this->aktivitas_model->get_data_aktivitas($template);
        
        
        //error handling agar tidak error pada saat input biaya pertama kali
		//$check_table = $this->log_biaya_model->get_log_biaya($id_aplikasi)->num_rows;
		// $tabel_kosong=true;
		 
		// melakukan pengecekan apakah sudah dilakukan pengubahan biaya atau belum
        $check_edit = $this->log_biaya_model->check_log_biaya_edit($id_aplikasi)->num_rows;
       $edit=false;
        if ($check_edit > 1) {
           // $tabel_kosong=false;
			// checking apakah kolom sudah di edit atau belum, jika sudah diedit,maka pakai table isi satunya
			$isi['edit']=true;
			$edit=true;
			
        }
	 
        if ($edit==false) {
            //delete previous biaya if exist
            
            $this->log_biaya_model->delete_current_log_biaya($id_aplikasi);
            foreach ($distribusi_usaha->result() as $row) {
                
                $nilai_usaha_aktivitas = round(($row->PRESENTASE_USAHA / 100) * $nilai_hour_effort, 2);
                $gaji_per_jam          = round($row->GAJI_PER_BULAN / 160, 2);
                $biaya_aktivitas       = round($nilai_usaha_aktivitas * $gaji_per_jam, 2);
                
                
                
                $databiaya = array(
                    'ID_APLIKASI' => $id_aplikasi,
                    'ID_AKTIVITAS' => $row->ID_AKTIVITAS,
                    //'PRESENTASE_USAHA' => $row->PRESENTASE,
                    'NILAI_USAHA' => $nilai_usaha_aktivitas,
                    'GAJI_PER_JAM' => $gaji_per_jam,
                    'BIAYA_AKTIVITAS' => $biaya_aktivitas
                    
                    
                );
                
                
                $this->log_biaya_model->insert_log_biaya($databiaya);
            }
        }
        //$this->session->set_userdata('ubah_ucp', "");
       // $distribusi_usaha        = $this->aktivitas_model->get_data_aktivitas();
        $isi['distribusi_usaha'] = $distribusi_usaha;
        
        $get_log_biaya = $this->log_biaya_model->get_log_biaya($id_aplikasi);
        
        $subBiayaSD      = 0;
        $subPresentaseSD = 0;
        $subUsahaSD      = 0;
        
        
        $subBiayaOGA      = 0;
        $subPresentaseOGA = 0;
        $subUsahaOGA      = 0;
        
        $subBiayaQT      = 0;
        $subPresentaseQT = 0;
        $subUsahaQT      = 0;
        $total_biaya     = 0;
        
        
        foreach ($get_log_biaya->result() as $row) {
            
            //1 software development (SD), 2 OnGoingActivity, 3 Quality and testing
            if ($row->KATEGORI_AKTIVITAS == 1) {
                
                $subPresentaseSD = $subPresentaseSD + $row->PRESENTASE_USAHA;
                $subBiayaSD      = $subBiayaSD + $row->BIAYA_AKTIVITAS;
                $subUsahaSD      = $subUsahaSD + $row->NILAI_USAHA;
                
            }
            if ($row->KATEGORI_AKTIVITAS == 2) {
                $subPresentaseOGA = $subPresentaseOGA + $row->PRESENTASE_USAHA;
                $subUsahaOGA      = $subUsahaOGA + $row->NILAI_USAHA;
                $subBiayaOGA      = $subBiayaOGA + $row->BIAYA_AKTIVITAS;
            }
            if ($row->KATEGORI_AKTIVITAS == 3) {
                $subPresentaseQT = $subPresentaseQT + $row->PRESENTASE_USAHA;
                $subUsahaQT      = $subUsahaQT + $row->NILAI_USAHA;
                $subBiayaQT      = $subBiayaQT + $row->BIAYA_AKTIVITAS;
            }
            
            
        }
        
        $total_biaya = $subBiayaSD + $subBiayaOGA + $subBiayaQT;
        
        $isi['get_log_biaya'] = $get_log_biaya;
        
        $isi['subPresentaseSD'] = $subPresentaseSD;
        $isi['subUsahaSD']      = $subUsahaSD;
        $isi['subBiayaSD']      = $subBiayaSD;
        
        $isi['subPresentaseOGA'] = $subPresentaseOGA;
        $isi['subUsahaOGA']      = $subUsahaOGA;
        $isi['subBiayaOGA']      = $subBiayaOGA;
        
        $isi['subPresentaseQT'] = $subPresentaseQT;
        $isi['subUsahaQT']      = $subUsahaQT;
        $isi['subBiayaQT']      = $subBiayaQT;
     
        $isi['step']        =  $step;
        $isi['role']        = $this->session->userdata('role');
        $isi['total_biaya'] = $total_biaya;
        $isi['biaya_op']    = $this->log_biaya_model->get_biaya_op($id_aplikasi);
		$total_biaya_op=$this->log_biaya_model->get_sum_biaya_op($id_aplikasi)->row()->JUMLAH_TOTAL;
		
		
		
        if ($this->session->flashdata('pesan_biaya') != "") {
            $isi['pesan_biaya'] = $this->session->flashdata('pesan_biaya');
        }
        
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		// melakukan pembaharuan  biaya estimasi dalam log aplikasi
		
		// update aplikasi untuk nilai usaha dan nilai biaya
		$biaya_estimasi = array(
                'BIAYA_ESTIMASI' => ($total_biaya+$total_biaya_op)
            );
			
		 
		 $this->aplikasi_model->update_aplikasi($biaya_estimasi, $id_aplikasi);
		 
		$isi['status'] =$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STATUS;
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']   = $this->load->view('frontend/hasil', $isi);
        $this->load->view('/backend/main', $data);
        
        
    }
    
    
    
    public function update_biaya()
    {
        
        $index = 1;
        while ($index <= 11) {
            
            $nilai_biaya  = $this->input->post('biaya_aktivitas' . $index);
            $id_log_biaya = $this->input->post('id_log_biaya' . $index);
            
            $data_biaya = array(
                'BIAYA_AKTIVITAS' => $nilai_biaya,
				'GAJI_PER_JAM' => 0,
                'EDIT_BIAYA' => 1
            );
            $this->log_biaya_model->update_log_biaya($id_log_biaya, $data_biaya);
            
            $index++;
            
        }
        $this->session->set_flashdata('pesan_biaya', "Perubahan berhasil disimpan");
       
		
        redirect('estimasi/result');
    }
    public function submit()
    {
        
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        $step		=$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        // update untuk field biaya estimasi
        
		$nilai           = $this->input->post('biaya_estimasi');
        $effort_estimate = $this->input->post('effort_estimate');
        
        
        
        $data = array(
            'BIAYA_ESTIMASI' => $nilai,
            'EFFORT_ESTIMATE' => $effort_estimate,
			 'STATUS' => 1,
        );
		
        $this->aplikasi_model->update_aplikasi($data, $id_aplikasi);
        //get data for email
        $data_email = array(
            'subject' => "request validasi penawaran aplikasi",
			'email'	  =>$this->user_model->selectonrole(2)->row()->EMAIL,
            'pesan' => 'Tim anda melakukan estimasi harga. Silahkan klik pada url dibawah ini <br> 
			</br>
			
			<a href="' . base_url() . 'log_estimasi/request_validasi/'.$id_aplikasi.'" >Lihat Detail Request  </a>
			  '
        );
        //sending email
        $mail       = new Mailler();
       $result= $mail->send_mail($data_email);
      $tambahan=" Anda akan diarahkan ke halaman log estimasi";
	$gabung=$result.$tambahan;
        $status["STATUS"] = $gabung;
        echo json_encode($status);
        
        
    }
    
    
    
    public function popUCW()
    {
        
        //$isi['pesan']="Load Data Berhasil";
        $data['header']    = "";
        $data['menu_kiri'] = "";
        $isi['pesan']      = $this->session->flashdata('pesan');
        $isi['isi']        = $this->uc_model->get_data_uc();
        $data['content']   = $this->load->view('frontend/popup/daftar_ucw', $isi);
        $this->load->view('/backend/main', $data);
        
    }
    public function popAW()
    {
        //$isi['pesan']="Load Data Berhasil";
        $data['header']    = "";
        $data['menu_kiri'] = "";
        $isi['pesan']      = $this->session->flashdata('pesan');
        $isi['isi']        = $this->aw_model->get_data_aw();
        $data['content']   = $this->load->view('frontend/popup/daftar_aw', $isi);
        $this->load->view('/backend/main', $data);
        
    }
    public function popTCF()
    {
        //$isi['pesan']="Load Data Berhasil";
        $data['header']    = "";
        $data['menu_kiri'] = "";
        $isi['pesan']      = $this->session->flashdata('pesan');
        $isi['isi']        = $this->tcf_model->get_data_tcf();
        $data['content']   = $this->load->view('frontend/popup/daftar_tcf', $isi);
        $this->load->view('/backend/main', $data);
        
    }
    public function popECF()
    {
        //$isi['pesan']="Load Data Berhasil";
        $data['header']    = "";
        $data['menu_kiri'] = "";
        $isi['pesan']      = $this->session->flashdata('pesan');
        $isi['isi']        = $this->ecf_model->get_data_tcf();
        $data['content']   = $this->load->view('frontend/popup/daftar_ecf', $isi);
        $this->load->view('/backend/main', $data);
        
        
    }
    function tambah_op()
    {
        
        $diisi=true;
		$status["errdeskripsi"]="";
		$status["errnilai"]="";
        $deskripsi = $this->input->post('deskripsi');
		if($deskripsi==""){
		$status["errdeskripsi"] = 'Belum diisi';
		$diisi=false;
		}
		
        $nilai     = $this->input->post('nilai');
		
        if($nilai==0 || $nilai==""){
			
		$status["errnilai"] = 'Belum diisi';
		$diisi=false;
			
		}
		if(is_numeric($nilai)==false && $nilai<0){
			$status["errnilai"] = 'harus angka positif';
		$diisi=false;
		}
		
		if($diisi==true){
			 $databop = array(
            'ID_APLIKASI' => $this->session->userdata('id_aplikasi'),
            'NILAI' => $nilai,
            'DESKRIPSI' => $deskripsi
        );
        $this->log_biaya_model->insert_biaya_op($databop);
        
        $status["STATUS"] = 'Data biaya berhasil disimpan';
		}
		else{
			$status["STATUS"] = 'Data biaya Gagal disimpan disimpan';
		}
       
        //$status["pesan"]	='Data berhasil disimpan';
        
        echo json_encode($status);
        
    }
    
    function edit_op($id_op)
    {
        $status["DESKRIPSI"] = $this->log_biaya_model->get_biaya_op($id_op)->ROW()->DESKRIPSI;
        $status["NILAI"]     = $this->log_biaya_model->get_biaya_op($id_op)->ROW()->NILAI;
        $status["ID_OP"]     = $id_op;
        //$status["pesan"]	='Data berhasil disimpan';
        
        //echo json_encode($status);
        
    }
    
    public function update_bop($index)
    {
        
        $deskripsi = $this->input->post('deskripsi' . $index . '');
        $nilai     = $this->input->post('nilai' . $index . '');
        $id_bop    = $this->input->post('id_op' . $index . '');
        
        $databop = array(
            'NILAI' => $nilai,
            'DESKRIPSI' => $deskripsi
        );
        $this->log_biaya_model->update_biaya_op($id_bop, $databop);
        
        $status["STATUS"] = 'Data berhasil diperbaharui';
        //$status["pesan"]	='Data berhasil disimpan';
        
        echo json_encode($status);
    }
    
    function delete_bop($id_bop)
    {
        
        $this->log_biaya_model->delete_biaya_op($id_bop);
        
        redirect('estimasi/result');
        $this->session->set_flashdata('pesan', "Data berhasil dihapus");
        
        
    }
    
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */