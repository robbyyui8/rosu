<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_biaya_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function delete_current_log_biaya($id_aplikasi){
		$this->db->where('ID_APLIKASI', $id_aplikasi);
		$this->db->delete('log_biaya');
		return $this->db->affected_rows() ? true : false;
	}
	
	//insert log estimasi
	function insert_log_biaya($data){
		$this->db->insert('log_biaya',$data);
		return $this->db->affected_rows() ? true : false;
	}
	//get_log_biaya
	
	function get_log_biaya($id_aplikasi){
		$query = $this->db->query("SELECT * from log_biaya as lb
		INNER JOIN  aktivitas as m ON lb.ID_AKTIVITAS =m.ID_AKTIVITAS
        INNER JOIN profesi as p ON p.ID_PROFESI=m.ID_PROFESI 
		WHERE ID_APLIKASI=".$id_aplikasi."
		ORDER BY m.ID_AKTIVITAS ASC");
		return $query;
	}
	
	
	
	function check_log_biaya_edit($id_aplikasi){
		$query = $this->db->query("SELECT * from log_biaya as lb
		INNER JOIN  aktivitas as m ON lb.ID_AKTIVITAS =m.ID_AKTIVITAS
        INNER JOIN profesi as p ON p.ID_PROFESI=m.ID_PROFESI 
		WHERE ID_APLIKASI=".$id_aplikasi." AND lb.EDIT_BIAYA=1
		ORDER BY m.ID_AKTIVITAS ASC");
		return $query;
	}
	
	
	function update_log_biaya($id_log_biaya,$data){
		$this->db->where('ID_LOG_BIAYA', $id_log_biaya);
		$this->db->update('log_biaya',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	//insert log estimasi
	function insert_biaya_op($data){
		
		$this->db->insert('biaya_op',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	function update_biaya_op($id_bop,$data){
		$this->db->where('ID_OP', $id_bop);
		$this->db->update('biaya_op',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	function delete_biaya_op($id_op){
		$this->db->where('ID_OP', $id_op);
		$this->db->delete('biaya_op');
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function get_biaya_op($id_aplikasi){
		$query = $this->db->query( "SELECT * from biaya_op as bop
		INNER JOIN  aplikasi as ap ON ap.ID_APLIKASI=bop.ID_APLIKASI
		WHERE bop.ID_APLIKASI=".$id_aplikasi."
		ORDER BY bop.ID_OP ASC" );
		return $query;
	}
	function get_sum_biaya_op($id_aplikasi){
		$query = $this->db->query( "SELECT SUM(bop.NILAI) as JUMLAH_TOTAL from biaya_op as bop
		INNER JOIN  aplikasi as ap ON ap.ID_APLIKASI=bop.ID_APLIKASI
		WHERE bop.ID_APLIKASI=".$id_aplikasi."
		ORDER BY bop.ID_OP ASC" );
		return $query;
	}
	
	
	
	
}

?>