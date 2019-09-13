<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_konstanta_effort_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function get_konstanta_effort($templete){
		$query = $this->db->query("SELECT AVG(NILAI_EFFORT) as RATA_EFFORT FROM log_konstanta_effort

			WHERE TEMPLATE =".$templete."");
		
		return $query;
	}
	
	function insert_konstanta_effort($data){
		$this->db->insert('log_konstanta_effort',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	
}

?>