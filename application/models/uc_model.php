<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class uc_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('pembobotan_use_case',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_uc(){
		//Select table name
		$this->db->select("*");
		$this->db->from('pembobotan_use_case');
		
		$query = $this->db->get();
		return $query;
		
		
	}
	function select_max_id_uc(){
		//Select table name
		$this->db->select_max("ID_UC_WEIGHT");
		$this->db->from('pembobotan_use_case');
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_pembobotan_use_case', $id);
		$this->db->delete('pembobotan_use_case');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('pembobotan_use_case');
		$this->db->where('ID_pembobotan_use_case',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('id_pembobotan_use_case',$id);
		$this->db->update('pembobotan_use_case',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_pembobotan_use_case(){
		$this->db->select("*");
		$this->db->from('pembobotan_use_case');
		$query = $this->db->get();
		return $query;
	}
	
}

?>