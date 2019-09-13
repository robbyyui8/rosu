<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tim_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('tim',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_tim(){
		//Select table name
		$query = $this->db->query("SELECT * FROM tim ");
		return $query;
		
		
	}
	
	// get data tim by id aplikasi
	
	
	function select_max_ID_tim(){
		//Select table name
		$this->db->select_max("ID_TIM");
		$this->db->from('tim');
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_tim', $id);
		$this->db->delete('tim');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('tim');
		$this->db->where('ID_tim',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('ID_tim',$id);
		$this->db->update('tim',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_tim(){
		$this->db->select("*");
		$this->db->from('tim');
		$query = $this->db->get();
		return $query;
	}
	
}

?>