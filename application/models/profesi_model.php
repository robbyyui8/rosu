<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profesi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('profesi',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//list flexy
	function get_data_profesi(){
		//Select table name
		$query = $this->db->query("SELECT * FROM profesi ");
		return $query;
		
		
	}
	function select_max_ID_profesi(){
		//Select table name
		$this->db->select_max("ID_profesi");
		$this->db->from('profesi');
		$query = $this->db->get();
		return $query;
		
		
	}
	
	
	
	
	function delete($id){
		$this->db->where('ID_profesi', $id);
		$this->db->delete('profesi');
		$this->db->trans_complete();

	if ($this->db->trans_status() === FALSE)
		{
    return "gagal";
		}
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('profesi');
		$this->db->where('ID_profesi',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('ID_profesi',$id);
		$this->db->update('profesi',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_profesi(){
		$this->db->select("*");
		$this->db->from('profesi');
		$query = $this->db->get();
		return $query;
	}
	
}

?>