<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_aktor_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	function get_log_aktor_weight($id_aplikasi){
		$query = $this->db->query("SELECT * FROM log_aktor as la
		INNER JOIN  pembobotan_aktor as aw ON la.ID_P_A=aw.ID_P_A
		WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	
	
	
	function insert_log_actor_weight($data){
		$this->db->insert('log_aktor',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//data actor weight
	
	function get_data_aw(){
		//Select table name
		$this->db->select("*");
		$this->db->from('pembobotan_aktor');
		
		$query = $this->db->get();
		return $query;
	}
	
	function countCatAW($id_aplikasi,$id_categori){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from log_aktor where ID_APLIKASI=".$id_aplikasi." AND ID_P_A=".$id_categori."");
		
		return $query;
	}
	
	
	function get_bobotAW($id_categori){
		$query = $this->db->query("SELECT BOBOT  from pembobotan_aktor where  ID_P_A=".$id_categori."");
		
		return $query;
	}
	
	function get_nilaiUAW($id_aplikasi){
		$query = $this->db->query("SELECT sum(BOBOT) as HASIL  from log_aktor  as la
		INNER JOIN pembobotan_aktor as pa ON pa.ID_P_A=la.ID_P_A
		where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
	}
	
	function get_data_log_aw($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_aktor as log
		 INNER JOIN pembobotan_aktor as aw ON log.ID_P_A=aw.ID_P_A
		 where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
		
	}
	
	function selectone_log_aw($id_log_aw){
		$query = $this->db->query("SELECT *  from log_aktor log
		 where log.ID_LOG_A=".$id_log_aw."");
		return $query;
	}
	
	function update_log_actor_weight($data,$id_log_aw){
		$this->db->where('ID_LOG_A',$id_log_aw);
		$this->db->update('log_aktor',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function delete_log_actor_weight($id_log_ucw){
		$this->db->where('ID_LOG_A', $id_log_ucw);
		$this->db->delete('log_aktor');
		return $this->db->affected_rows() ? true : false;
	}
	
}

?>