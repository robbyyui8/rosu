<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tcf_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('pembobotan_tcf',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_tcf(){
		//Select table name
		$this->db->select("*");
		$this->db->from('pembobotan_tcf');
		
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_TCF', $id);
		$this->db->delete('pembobotan_tcf');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('pembobotan_tcf');
		$this->db->where('ID_TCF',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('ID_TCF',$id);
		$this->db->update('pembobotan_tcf',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_uc_weight(){
		$this->db->select("*");
		$this->db->from('pembobotan_tcf');
		$query = $this->db->get();
		return $query;
	}
	
}

?>