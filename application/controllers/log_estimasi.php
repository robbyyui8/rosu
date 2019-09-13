<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Log_estimasi extends CI_Controller
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
        
        $this->load->model('aplikasi_model');
        
        $this->load->model('log_estimasi_model');
        $this->load->model('log_biaya_model');
        $this->load->model('fitur_model');
        $this->load->model('aktivitas_model');
		$this->load->model('user_model');
		$this->load->model('log_konstanta_effort_model');
		
        
        
        
        $this->load->library('session');
       
    }
    
    public function index()
    {
		
		 if ($this->session->userdata('username') == NULL) {
            
             redirect('login');
            
        }
		
        redirect('log_estimasi/daftar_log_estimasi');
    }
    
    // fungsi ini digunkan untuk menampilkan daftar uc
    
    public function daftar_log_estimasi()
    {
		 if ($this->session->userdata('username') == NULL) {
            
             redirect('login');
            
        }
		
        // setting session null
		
		$this->session->set_userdata('id_aplikasi',null);
		
        $user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        if ($this->session->flashdata('psan') != "") {
            $isi['pesan'] = $this->session->flashdata('psan');
        }
        
        $isi['isi']      = $this->log_estimasi_model->get_log_estimasi();
		$isi['role']      = $this->session->userdata('role');
        $data['content'] = $this->load->view('frontend/daftar_log_estimasi', $isi);
        $this->load->view('/backend/main', $data);
    }
    
    public function form_effort2()
    {
		 if ($this->session->userdata('username') == NULL) {
            
             redirect('login');
            
        }
		
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        if ($this->session->userdata('step') < 6) {
            $this->session->set_userdata('step', 6);
        }
		$get_data      = $this->aplikasi_model->get_nilai_ucp($id_aplikasi);
		$template      = $get_data->row()->TEMPLATE;
		
        $distribusi_usaha        = $this->aktivitas_model->get_data_aktivitas($template);
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
        if ($this->session->userdata('step') < 6) {
            $this->session->set_userdata('step', 6);
        }
        $isi['step']        = $this->session->userdata('step');
        $isi['role']        = $this->session->userdata('role');
        $isi['total_biaya'] = $total_biaya;
        $isi['biaya_op']    = $this->log_biaya_model->get_biaya_op($id_aplikasi);
        $isi['step']        = $this->session->userdata('step');
        $user['nama']       = $this->session->userdata('nama');
         $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']    = $this->load->view('frontend/form_effort', $isi);
        
        $this->load->view('/backend/main', $data);
    }
   

   public function form_effort($id_aplikasi)
    {
		
		  // form effort actual ini didasarkan atas tim yang mengembangkan aplikasi 
		$this->session->set_userdata('id_aplikasi',$id_aplikasi);
		$id_aplikasi = $this->session->userdata('id_aplikasi');
		$isi['anggota_tim']   = $this->aplikasi_model->get_anggota_tim_by_profesi($id_aplikasi);
        $isi['step']        = $step=$this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->STEP;
        $isi['role']        = $this->session->userdata('role');
        $isi['biaya_op']    = $this->log_biaya_model->get_biaya_op($id_aplikasi);
        $isi['step']        = $this->session->userdata('step');
        $user['nama']       = $this->session->userdata('nama');
         $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
        $data['content']    = $this->load->view('frontend/form_effort2', $isi);
        
        $this->load->view('/backend/main', $data);
    }
   
     public function add_effort_real()
    {
        
        // update untuk field biaya estimasi
        $id_aplikasi = $this->session->userdata('id_aplikasi');
        $isi_kosongtim=false;
		$isi_kosongwaktu=false;
		$isi_kosonghari=false;
		
		$index=1;
		$effort_real=0;
		//$errtim= array();
		$errwaktu=array();
		$errhari=array();
		$lenght=$this->aplikasi_model->get_anggota_tim_by_profesi($id_aplikasi)->num_rows;
		 $status["jumlah_profesi"]      	= $lenght;
		while($index<=$lenght){
			/*
			 $tim  = $this->input->post('tim'.$index);
			 if(is_numeric($tim)==false){
				 $isi_kosongtim=true;
				 $errtim [$index]=$index;
				 $status["pesantim".$index.""]      	= "Belum diisi";
			 }
			 
			 else if($tim<0){
				 $isi_kosongtim=true;
				$errtim [$index]=$index;
				  $status["pesantim".$index.""]      	= "Harus bil.positif";
			 }
			 */
			 $waktu = $this->input->post('waktu'.$index);
			 if(is_numeric($waktu)==false){
				 $isi_kosongwaktu=true;
				 $errwaktu [$index]=$index;
				 $status["pesanwaktu".$index.""]      	= "Belum diisi";
			 }
			 
			  else if($waktu<0){
				  $isi_kosongwaktu=true;
				 $errwaktu [$index]=$index;
				 $status["pesanwaktu".$index.""]      	= "Harus bil.positif";
			 }
			 
			 
			 $hari = $this->input->post('hari'.$index);
			  if(is_numeric($hari)==false){
				 $isi_kosonghari=true;
				  $errhari [$index]=$index;
				  $status["pesanhari".$index.""]      	= "Belum diisi";
			 }
			 
			 else if($hari<0){
				 $isi_kosonghari=true;
				  $errhari [$index]=$index;
				 $status["pesanhari".$index.""]      	= "Harus bil.positif";
			 }
			 
			$effort_real =$effort_real +($hari * $waktu) ;
			
			$index++;
			
		}
        
			
        if( $isi_kosongtim==false && $isi_kosongwaktu==false && $isi_kosonghari==false ){
			
			$data_biaya = array(
		
            'EFFORT_REAL' => $effort_real,
			'STEP' => 9,
			'STATUS' =>5
			
        );
		$get_data      = $this->aplikasi_model->get_nilai_ucp($id_aplikasi);
        $uaw           = $get_data->row()->UAW;
        $ucw           = $get_data->row()->UUCW;
        $ecf           = $get_data->row()->ECF;
        $tcf           = $get_data->row()->TCF;
		$template       = $get_data->row()->TEMPLATE;
		$nilai_ucp = ($uaw + $ucw) * $ecf * $tcf;
		
		 $nilai_er=$effort_real/$nilai_ucp;
		$dataeffort = array(
            'TEMPLATE' =>$template,
			'DATE_CREATED' =>date('d-m-Y'),
			'NILAI_EFFORT' =>$nilai_er,
        );
	$this->log_konstanta_effort_model->insert_konstanta_effort($dataeffort);
        $this->aplikasi_model->update_aplikasi($data_biaya, $id_aplikasi);
        
        $status["effort_real"] = $this->log_estimasi_model->get_effort_real($id_aplikasi)->row()->EFFORT_REAL;
        $status["STATUS"]      = "Data berhasil disimpan";
        $status["pesan"]      	= "";
		$status["effort_real"] =$effort_real;
		 //$status["tim"]      	= $errtim;
		 $status["waktu"]      	= $errwaktu;
	     $status["hari"]      	= $errhari;
      
			
		}
		else{
			 $status["STATUS"]      = "Data Gagal disimpan";
			 
			// $status["tim"]      	= $errtim;
			 $status["waktu"]      	= $errwaktu;
			 $status["hari"]      	= $errhari;
			 $status["effort_real"] =0;
		}
		
		  echo json_encode($status);
		 
		//$this->log_konstanta_effort_model->insert_konstanta_effort($dataeffort);
        //$this->aplikasi_model->update_aplikasi($data_biaya, $id_aplikasi);
		
        
    }
    
	

   
    public function add_effort_real2()
    {
        
        // update untuk field biaya estimasi
        $id_aplikasi = $this->session->userdata('id_aplikasi');
		$get_data      = $this->aplikasi_model->get_nilai_ucp($id_aplikasi);
		$template      = $get_data->row()->TEMPLATE;
		
        $jumlah_aktivitas        = $this->aktivitas_model->get_data_aktivitas($template)->num_rows;
		$status["jumlah_aktivitas"]      	= $jumlah_aktivitas; 
		
		
        $isi_kosongtim=false;
		$isi_kosongwaktu=false;
		$isi_kosonghari=false;
		$index=1;
		$effort_real=0;
		$errtim= array();
		$errwaktu=array();
		$errhari=array();
		
		
		while($index<=$jumlah_aktivitas){
			 $tim  = $this->input->post('tim'.$index);
			 if(is_numeric($tim)==false){
				 $isi_kosongtim=true;
				 $errtim [$index]=$index;
				 $status["pesantim".$index.""]      	= "Belum diisi";
			 }
			 
			 else if($tim<0){
				 $isi_kosongtim=true;
				 $errtim [$index]=$index;
				  $status["pesantim".$index.""]      	= "Harus bil.positif";
			 }
			 $waktu = $this->input->post('waktu'.$index);
			 if(is_numeric($waktu)==false){
				 $isi_kosongwaktu=true;
				 $errwaktu [$index]=$index;
				 $status["pesanwaktu".$index.""]      	= "Belum diisi";
			 }
			 
			  else if($waktu<0){
				  $isi_kosongwaktu=true;
				 $errwaktu [$index]=$index;
				 $status["pesanwaktu".$index.""]      	= "Harus bil.positif";
			 }
			 
			 
			 $hari = $this->input->post('hari'.$index);
			  if(is_numeric($hari)==false){
				 $isi_kosonghari=true;
				  $errhari [$index]=$index;
				  $status["pesanhari".$index.""]      	= "Belum diisi";
			 }
			 
			 else if($hari<0){
				 $isi_kosonghari=true;
				  $errhari [$index]=$index;
				 $status["pesanhari".$index.""]      	= "Harus bil.positif";
			 }
			 
			$effort_real =$effort_real +($hari * $tim * $waktu) ;
			
			$index++;
		}
        
			
        if( $isi_kosongtim==false && $isi_kosongwaktu==false && $isi_kosonghari==false ){
			
			$data_biaya = array(
		
            'EFFORT_REAL' => $effort_real,
			'STATUS' =>5
			
        );
		$get_data      = $this->aplikasi_model->get_nilai_ucp($id_aplikasi);
        $uaw           = $get_data->row()->UAW;
        $ucw           = $get_data->row()->UUCW;
        $ecf           = $get_data->row()->ECF;
        $tcf           = $get_data->row()->TCF;
		$template       = $get_data->row()->TEMPLATE;
		$nilai_ucp = ($uaw + $ucw) * $ecf * $tcf;
		
		 $nilai_er=$effort_real/$nilai_ucp;
		$dataeffort = array(
            'TEMPLATE' =>$template,
			'DATE_CREATED' =>date('d-m-Y'),
			'NILAI_EFFORT' =>$nilai_er,
			
        );
		$this->log_konstanta_effort_model->insert_konstanta_effort($dataeffort);
        $this->aplikasi_model->update_aplikasi($data_biaya, $id_aplikasi);
        
        $status["effort_real"] = $this->log_estimasi_model->get_effort_real($id_aplikasi)->row()->EFFORT_REAL;
        $status["STATUS"]      = "Data berhasil disimpan";
        $status["pesan"]      	= "";
		$status["effort_real"] =$effort_real;
		 $status["tim"]      	= $errtim;
		 $status["waktu"]      	= $errwaktu;
	     $status["hari"]      	= $errhari;
      
			
		}
		else{
			 $status["STATUS"]      = "Data Gagal disimpan";
			 
			 $status["tim"]      	= $errtim;
			 $status["waktu"]      	= $errwaktu;
			 $status["hari"]      	= $errhari;
			 $status["effort_real"] =0;
		}
		
		  echo json_encode($status);
        
    }
    
    public function goal($id_aplikasi)
    {
        //$validasi=$this->input->post('validasi');
        $dataaplikasi = array(
            'STATUS' => 4,
			'STEP' => 8
        );
		/*$dataeffort = array(
            'TEMPLATE' =>$template,
			'DATE_CREATED' =>date('d-m-Y'),
			'NILAI_EFFORT' =>$nilai_er,
        );
		*/
        
        $this->aplikasi_model->update_aplikasi($dataaplikasi, $id_aplikasi);
		//$this->log_konstanta_effort_model->insert_konstanta_effort($dataeffort);
        
         $this->session->set_flashdata('psan', "Project goal");
        redirect('log_estimasi/daftar_log_estimasi');
    }
	
	 public function validate($id_aplikasi)
    {
        //$validasi=$this->input->post('validasi');
		$nilai           = $this->input->post('biaya_estimasi');
        $effort_estimate = $this->input->post('effort_estimate');
		
        $dataaplikasi = array(
            'STATUS' => 2,
			'BIAYA_ESTIMASI'=>$nilai,
			'EFFORT_ESTIMATE'=>$effort_estimate,
			
			
        );
		/*$dataeffort = array(
            'TEMPLATE' =>$template,
			'DATE_CREATED' =>date('d-m-Y'),
			'NILAI_EFFORT' =>$nilai_er,
        );
		*/
        
        $this->aplikasi_model->update_aplikasi($dataaplikasi, $id_aplikasi);
		//$this->log_konstanta_effort_model->insert_konstanta_effort($dataeffort);
        
         $this->session->set_flashdata('psan', "Validasi berhasil dilakukan");
        redirect('log_estimasi/daftar_log_estimasi');
    }
	
    
    
    public function print_penawaran($id_aplikasi)
    {
        
		//get client description
		$isi['nama_client']= $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->NAMA;
		$isi['alamat']= $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->ALAMAT;
		$isi['tanggal_pengajuan']= $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->TANGGAL_PENGAJUAN;
		$isi['nama_aplikasi']= $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->NAMA_APLIKASI;
        // get effort estimasi
        $estimate_effort = $this->aplikasi_model->edit_log_aplikasi($id_aplikasi)->row()->EFFORT_ESTIMATE;
		
        
        //get count_tim
        $jumlah_tim = $this->aplikasi_model->get_anggota_tim($id_aplikasi)->num_rows();
        
        // get time in day
        $time = intval($estimate_effort / $jumlah_tim);
        
        
        //get anggota tim
        $isi['anggota_tim'] = $this->aplikasi_model->get_anggota_tim($id_aplikasi);
        $isi['tanggal']     = DATE('d');
        $isi['tahun']       = DATE('Y');
        $isi['bulan']       = "";
        $bulan              = DATE('m');
        if ($bulan == 1) {
            $isi['bulan'] = "Januari";
        } else if ($bulan == 2) {
            $isi['bulan'] = "Febuari";
            
        } else if ($bulan == 3) {
            $isi['bulan'] = "Maret";
            
        } else if ($bulan == 4) {
            $isi['bulan'] = "April";
            
        } else if ($bulan == 5) {
            $isi['bulan'] = "Mei";
            
        } else if ($bulan == 6) {
            $isi['bulan'] = "Juni";
            
        } else if ($bulan == 7) {
            $isi['bulan'] = "Juli";
            
        } else if ($bulan == 8) {
            $isi['bulan'] = "Agustus";
            
        } else if ($bulan == 9) {
            $isi['bulan'] = "September";
            
        } else if ($bulan == 10) {
            $isi['bulan'] = "Oktober";
            
        } else if ($bulan == 11) {
            $isi['bulan'] = "November";
            
        } else if ($bulan == 12) {
            $isi['bulan'] = "Desember";
            
        }
        $dataaplikasi = array(
            'STATUS' => 3
        );
        
        $this->aplikasi_model->update_aplikasi($dataaplikasi, $id_aplikasi);
		
        // get count people,biaya by profesi
        $isi['anggota_profesi'] = $this->aplikasi_model->get_biaya_estimasi_by_profesi($id_aplikasi);
        //get biaya total hpp
        
        //get biaya op
        $isi['biaya_op'] = $this->log_biaya_model->get_biaya_op($id_aplikasi);
        // get biaya total op
        /* calculate in system view */
        // get total biaya
        
        $isi['get_log_biaya'] = $this->log_biaya_model->get_log_biaya($id_aplikasi);
        
        /* calculate in system view */
        // get llist fitur
        $isi['list_fitur'] = $this->fitur_model->get_fitur($id_aplikasi);
        $this->load->view('print/dok_penawaran_pdf', $isi);
		
    }
    
    
    
	public function request_validasi($id_aplikasi){
		
		
		$newdata = array(
                    'username' => $this->user_model->selectone(7)->row()->USERNAME,
					 'nama' => $this->user_model->selectone(7)->row()->NAMA,
                    
                    'id_user' => $this->user_model->selectone(7)->row()->ID_USER,
					'role' => $this->user_model->selectone(7)->row()->ROLE
                    
                );
				//mengcreate session baru
				//$this->session->sess_create();
                $this->session->set_userdata($newdata);
				
		$user['nama']      = $this->session->userdata('nama');
		$user['id_user']      = $this->session->userdata('id_user');
        $data['header']    = $this->load->view('backend/header', $user);
        $role['role']      = $this->session->userdata('role');
		$data['menu_kiri'] = $this->load->view('backend/menu_kiri',$role);
       
            $isi['pesan'] = "Request Validasi";
        
        
        $isi['isi']      = $this->log_estimasi_model->get_request_validasi($id_aplikasi);
		$isi['role']      = $this->session->userdata('role');
        $data['content'] = $this->load->view('frontend/request_validasi', $isi);
        $this->load->view('/backend/main', $data);
		
		
	}
    
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */