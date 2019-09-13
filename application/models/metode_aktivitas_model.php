<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class metode_aktivitas_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('metode_aktivitas',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_metode_aktivitas(){
		//Select table name
		$query = $this->db->query("SELECT * FROM metode_aktivitas ");
		return $query;
		
		
	}
	function select_max_ID_metode_aktivitas(){
		//Select table name
		$this->db->select_max("ID_metode_aktivitas");
		$this->db->from('metode_aktivitas');
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_metode_aktivitas', $id);
		$this->db->delete('metode_aktivitas');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('metode_aktivitas');
		$this->db->where('ID_metode_aktivitas',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('ID_metode_aktivitas',$id);
		$this->db->update('metode_aktivitas',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_metode_aktivitas(){
		$this->db->select("*");
		$this->db->from('metode_aktivitas');
		$query = $this->db->get();
		return $query;
	}
	
}

?>