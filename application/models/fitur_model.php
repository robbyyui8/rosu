<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fitur_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	//insert log estimasi
	function insert_data_fitur($data){
		$this->db->insert('fitur',$data);
	}
	
	//update value UCW/UAW/TCF/ECF transaction log
	function update_fitur($data,$id ){
		$this->db->where('ID_FITUR',$id);
		$this->db->update('fitur',$data);
		
	}
	
	function delete_fitur($id ){
		$this->db->where('ID_FITUR',$id);
		$this->db->delete('fitur');
		
	}

	
	function edit_log_fitur($id){
		$query = $this->db->query("SELECT * FROM fitur a
		WHERE a.ID_FITUR=".$id."	");
		return $query;
		
	}
	
	function get_fitur($id_aplikasi){
		$query = $this->db->query("SELECT * FROM fitur f
		INNER JOIN  aplikasi as a ON a.ID_APLIKASI=f.ID_APLIKASI
		WHERE a.ID_APLIKASI=".$id_aplikasi."	");
		return $query;
		
	}
	

	
	
}

?>