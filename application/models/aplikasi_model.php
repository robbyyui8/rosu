<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Aplikasi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	
	//insert anggota tim
	function insert_tim($data){
		$this->db->insert('tim',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	function select_max_id_tim(){
		//Select table name
		$query = $this->db->query("SELECT MAX(ID_TIM) as ID_TIM FROM tim ");
		return $query;
		
		
	}
	
	
	function insert_anggota_tim($data){
		$this->db->insert('anggota_tim',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	function delete_anggota_tim($id){
		$this->db->where('ID_TIM', $id);
		$this->db->delete('anggota_tim');
		return $this->db->affected_rows() ? true : false;
	}
	
	//insert log estimasi
	function insert_data_aplikasi($data){
		$this->db->insert('aplikasi',$data);
	}
	
	//update value UCW/UAW/TCF/ECF transaction log
	function update_aplikasi($data,$id ){
		$this->db->where('ID_APLIKASI',$id);
		$this->db->update('aplikasi',$data);
		
	}
	
	function get_anggota_tim($id){
	$query = $this->db->query("SELECT * FROM anggota_tim as at 
	INNER JOIN tim as t ON at.ID_TIM =t.ID_TIM
INNER JOIN aplikasi as a ON a.ID_TIM=t.ID_TIM
INNER JOIN anggota as ag ON ag.ID_ANGGOTA=at.ID_ANGGOTA
INNER JOIN profesi as p ON p.ID_PROFESI=ag.ID_PROFESI
WHERE ID_APLIKASI=".$id."");
		return $query;
	}
	
	function get_anggota_tim_by_profesi($id){
	$query = $this->db->query("SELECT * FROM anggota_tim as at 
	INNER JOIN tim as t ON at.ID_TIM =t.ID_TIM
INNER JOIN aplikasi as a ON a.ID_TIM=t.ID_TIM
INNER JOIN anggota as ag ON ag.ID_ANGGOTA=at.ID_ANGGOTA
INNER JOIN profesi as p ON p.ID_PROFESI=ag.ID_PROFESI
WHERE ID_APLIKASI=".$id."");
		return $query;
	}
	
	function get_biaya_estimasi_by_profesi($id_aplikasi){
		
		$query = $this->db->query("SELECT p.NAMA_PROFESI,count(*) as jumlah_tim,SUM(lb.BIAYA_AKTIVITAS) as biaya_aktivitas FROM aplikasi as ap 
INNER JOIN log_biaya as lb ON ap.ID_APLIKASI=lb.ID_APLIKASI
INNER JOIN aktivitas as ak ON lb.ID_AKTIVITAS=ak.ID_AKTIVITAS 
INNER JOIN profesi as p ON p.ID_PROFESI=ak.ID_PROFESI
INNER JOIN anggota as a ON a.ID_PROFESI=p.ID_PROFESI -- left karena ada kemungkinan nama anggota yang null
WHERE lb.ID_APLIKASI=".$id_aplikasi."
GROUP BY p.NAMA_PROFESI");
		return $query;
		
	}
	
	function get_max_id(){
		//Select table name
		$query = $this->db->query("SELECT MAX(ID_APLIKASI) as ID_APLIKASI FROM aplikasi ");
		return $query;
		
		
	}
	
	function edit_log_aplikasi($id){
		$query = $this->db->query("SELECT *,a.DATE_CREATED FROM aplikasi a
		LEFT JOIN  tim as tm ON tm.ID_TIM=a.ID_TIM
		INNER JOIN  client as c ON c.ID_CLIENT=a.ID_CLIENT
		WHERE a.ID_APLIKASI=".$id."	");
		return $query;
		
	}
	
	function get_nilai_ucp($id){
		$query = $this->db->query("SELECT * FROM aplikasi a
		INNER JOIN  tim as tm ON tm.ID_TIM=a.ID_TIM
		WHERE a.ID_APLIKASI=".$id."	");
		return $query;
		
	}
	
	
	
	
	
	function change_status($id ){
		$data =array( 'STATUS'=>1
		);
		$this->db->where('ID_APLIKASI',$id);
		$this->db->update('aplikasi',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
}

?>