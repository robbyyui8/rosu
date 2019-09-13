<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_use_case_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}

	function get_log_use_case($id_aplikasi){
		$query = $this->db->query("SELECT *,luc.JUMLAH_TRANSAKSI from log_use_case luc  
		INNER JOIN pembobotan_use_case as puc ON puc.ID_P_UC =luc.ID_P_UC
		where ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	function delete_log_uc_weight($id_log_ucw){
		$this->db->where('ID_LOG_UC', $id_log_ucw);
		$this->db->delete('log_use_case');
		return $this->db->affected_rows() ? true : false;
	}
			
	function get_data_ucw(){
		//Select table name
		$this->db->select("*");
		$this->db->from('pembobotan_use_case');
		
		$query = $this->db->get();
		return $query;
	}
	
	function get_nilaiUUCW($id_aplikasi){
		$query = $this->db->query("SELECT sum(puc.BOBOT) as HASIL  from log_use_case luc  
		INNER JOIN pembobotan_use_case as puc ON puc.ID_P_UC =luc.ID_P_UC
		where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
	}
	
	function insert_log_use_case($data){
		$this->db->insert('log_use_case',$data);
		return $this->db->affected_rows() ? true : false;
	}
	function selectone_log_ucw($id_log_ucw){
		$query = $this->db->query("SELECT *  from log_use_case log
		 where log.ID_LOG_UC=".$id_log_ucw."");
		return $query;
	}
	
	function update_log_uc_weight($data,$id_log_ucw){
		$this->db->where('ID_LOG_UC',$id_log_ucw);
		$this->db->update('log_use_case',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	
	function delete_log_use_case($id_log_ucw){
		$this->db->where('ID_LOG_UC', $id_log_ucw);
		$this->db->delete('log_use_case');
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function get_data_log_ucw($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_use_case log
		 INNER JOIN pembobotan_use_case as uw ON log.ID_P_UC=uw.ID_P_UC
		 where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
	}
	
	
	
	
	
	function countCatUW($id_aplikasi,$id_categori){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from log_use_case where ID_APLIKASI=".$id_aplikasi." AND ID_P_UC=".$id_categori."");
		
		return $query;
	}
	
	function hasilUW($id_aplikasi){
		$query = $this->db->query("SELECT sum(BOBOT) as HASIL  from log_use_case where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
	}
		
	/* seharunya ini tidak dipakai */
	function get_bobotUW($id_categori){
		$query = $this->db->query("SELECT BOBOT  from pembobotan_use_case where  ID_P_UC=".$id_categori."");
		
		return $query;
	}
	
	
	
}

?>