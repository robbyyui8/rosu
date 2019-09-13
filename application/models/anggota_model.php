<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class anggota_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function insert($data){
		$this->db->insert('anggota',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	//list flexy
	function get_data_anggota(){
		//Select table name
		$query = $this->db->query("SELECT * FROM  anggota as ag
		INNER JOIN profesi as p ON p.ID_PROFESI=ag.ID_PROFESI");
		return $query;
		
		
	}
	
	
	
	function delete_anggota(){
		$query = $this->db->query("DELETE FROM anggota  WHERE anggota.ID_ANGGOTA 
								   NOT IN(SELECT anggota_tim.ID_ANGGOTA 
								   FROM anggota_tim)");
		return $query;
	}
	
	
	function selectone($id){
		$query = $this->db->query("SELECT * FROM  anggota as ag 
									INNER JOIN profesi as p ON p.ID_PROFESI=ag.ID_PROFESI
									WHERE ID_ANGGOTA=".$id."");
		return $query;
	}
	
	function update_anggota($data,$id ){
		$this->db->where('ID_ANGGOTA',$id);
		$this->db->update('anggota',$data);
		return $this->db->affected_rows() ? true : false;
	}
	function update_anggota_tim($data,$id ){
		$this->db->where('ID_ANGGOTA_TIM',$id);
		$this->db->update('anggota_tim',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
        
	function get_anggota(){
		$this->db->select("*");
		$this->db->from('anggota');
		$query = $this->db->get();
		return $query;
	}
	
}

?>