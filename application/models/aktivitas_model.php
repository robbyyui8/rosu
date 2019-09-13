<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class aktivitas_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('aktivitas',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_aktivitas($id_template){
		//Select table name
		$query = $this->db->query("SELECT * FROM aktivitas as a 
		INNER JOIN profesi as p on a.ID_PROFESI =p.ID_PROFESI
		WHERE a.TEMPLATE=".$id_template."
		ORDER BY a.ID_AKTIVITAS ASC ");
		return $query;
		
		
	}
	function get_data_aktivitas_all(){
		//Select table name
		$query = $this->db->query("SELECT * FROM aktivitas as a 
		INNER JOIN profesi as p on a.ID_PROFESI =p.ID_PROFESI
		ORDER BY a.NAMA_AKTIVITAS ASC ");
		return $query;
		
		
	}
	
	function select_max_ID_AKTIVITAS(){
		//Select table name
		$this->db->select_max("ID_AKTIVITAS");
		$this->db->from('aktivitas');
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_AKTIVITAS', $id);
		$this->db->delete('aktivitas');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('aktivitas');
		$this->db->where('ID_AKTIVITAS',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('ID_AKTIVITAS',$id);
		$this->db->update('aktivitas',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_aktivitas(){
		$this->db->select("*");
		$this->db->from('aktivitas');
		$query = $this->db->get();
		return $query;
	}
	
}

?>