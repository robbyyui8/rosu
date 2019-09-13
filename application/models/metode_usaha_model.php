<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Metode_usaha_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('metode_usaha',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_metode_usaha(){
		//Select table name
		$query = $this->db->query("SELECT * FROM metode_usaha ");
		return $query;
		
		
	}
	function select_max_ID_metode_usaha(){
		//Select table name
		$this->db->select_max("ID_metode_usaha");
		$this->db->from('metode_usaha');
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_metode_usaha', $id);
		$this->db->delete('metode_usaha');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('metode_usaha');
		$this->db->where('ID_metode_usaha',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('ID_metode_usaha',$id);
		$this->db->update('metode_usaha',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_metode_usaha(){
		$this->db->select("*");
		$this->db->from('metode_usaha');
		$query = $this->db->get();
		return $query;
	}
	
}

?>