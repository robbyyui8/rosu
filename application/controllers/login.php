<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
       // $this->load->model('periode_model');
    }

    function index() {
        $this->load->view('form_login');
		 $this->session->sess_destroy();
    }
	
	function auth_false() {
        $this->load->view('form_login2');
    }

    function auth() {
       
        $valid = false;
        $users = $this->user_model->get_user();
		
        $name = $this->input->post('username');// mengambil user nama dari text field yang ada di form login
		
        $password = $this->input->post('password');// mengambil password dari text field yang ada di form login
		
		
   //echo $name;
   // echo $password;
	
        //kondisi pengecekan apakah username dan password yang dimasukkan telah sesuai dengan benar atau tidak
        foreach ($users->result() as $row) {
			// echo $row->PASSWORD;
			 //echo '<br> </br>';
            if ($name == $row->USERNAME && md5($password) == $row->PASSWORD) {
                $valid = true;

                //setting session terhadap data user
                $newdata = array(
                    'username' => $name,
					 'nama' => $row->NAMA,
                    'password' => $password,
                    'id_user' => $row->ID_USER,
					'role' => $row->ROLE
                    
                );
				//mengcreate session baru
				//$this->session->sess_create();
                $this->session->set_userdata($newdata);
				
                break;
				 
            }
			
        }
		//echo "password input : ";
			//echo md5($password);
			//return;
			//end foreach
        //apabila login telah sesuai dengan username dan password maka user akan masuk halaman utama
        if ($valid) {
							
				//$this->session->set_userdata('id_periode_aktif', $id_periode);
                redirect('homepage');
        }
        //apabila login tidak sesuai dengan username dan password maka user akan masuk halaman login
        else {
            redirect('login/auth_false');
        }
    }

//end if

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file deabakery.php */
/* Location: ./application/controllers/deabakery.php */