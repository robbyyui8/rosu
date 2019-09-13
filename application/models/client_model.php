<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	
	//insert anggota client
	function insert_data_client($data){
		$this->db->insert('client',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	function select_max_ID_CLIENT(){
		//Select table name
		$query = $this->db->query("SELECT MAX(ID_CLIENT) as ID_CLIENT FROM client ");
		return $query;
		
		
	}
	
	
	
	//update value UCW/UAW/TCF/ECF transaction log
	function update_client($data,$id ){
		$this->db->where('ID_CLIENT',$id);
		$this->db->update('client',$data);
		
	}
	
	
	function get_client($id){
		$query = $this->db->query("SELECT * FROM aplikasi a
		INNER JOIN  client as c ON c.ID_CLIENT=a.ID_CLIENT
		WHERE a.ID_APLIKASI=".$id."	");
		return $query;
		
	}
	
	
	
	
	
	
}

?>