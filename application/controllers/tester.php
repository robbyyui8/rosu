<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tester extends CI_Controller

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
		$this->load->model('log_konstanta_effort_model');
		$this->load->library('session');
		if ($this->session->userdata('username') == NULL)
			{

			// redirect('login');

			}
		}

	public function index()
		{
		redirect('tester/get_log_er');
		}

	// fungsi ini digunkan untuk menampilkan daftar user
	public function get_log_er()
		{
			$query = $this->db->query('SELECT * FROM log_konstanta_effort');

			echo "<table>";
			echo "<tr>";
	echo "<td>";
    echo "Nilai Effort";
	echo "</td>";
	echo "<td>";
    echo "Tanggal Input";
	echo "</td>";
	echo "<td>";
   echo "Jenis ER";
	echo "/<td>";
	echo "</tr>";
foreach ($query->result() as $row)
{
	echo "<tr>";
	echo "<td>";
    echo $row->NILAI_EFFORT;
	echo "</td>";
	echo "<td>";
    echo $row->DATE_CREATED;
	echo "</td>";
	echo "<td>";
    if($row->TEMPLATE==1){
		echo "CMS";
	}else{
		echo "Framework CI";
	}
	echo "/<td>";
	echo "</tr>";
	
}
echo "</table>";

		$rata_rata_template          = $this->log_konstanta_effort_model->get_konstanta_effort(1)->row()->RATA_EFFORT;
		$rata_rata_framework         = $this->log_konstanta_effort_model->get_konstanta_effort(0)->row()->RATA_EFFORT;
		
		echo "Nilai Rata-Rata ER dengan CMS : ".round($rata_rata_template,2);
		echo "<br>";
		echo "Nilai Rata-Rata ER dengan Framework CI: ".round($rata_rata_framework,2);
		}
		
		
		
	
	}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */