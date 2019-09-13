<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_ecf_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	function insert_log_ecf_weight($data){
		$this->db->insert('log_indikator_ecf',$data);
		return $this->db->affected_rows() ? true : false;
	}
	//delete tcf value for update
	function deleteecf($id_aplikasi){
		$this->db->where('ID_APLIKASI', $id_aplikasi);
		$this->db->delete('log_indikator_ecf');
		return $this->db->affected_rows() ? true : false;
	}
	
	function countEf(){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from pembobotan_ecf ");
		return $query;
	}
	
	function sumLogEf($id_aplikasi){
		$query = $this->db->query("SELECT sum(lie.VALUE*pef.BOBOT) as VALUE  from log_indikator_ecf as lie
		INNER JOIN  pembobotan_ecf pef ON lie.ID_P_ECF=pef.ID_P_ECF
		WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	function get_data_log_ecf($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_indikator_ecf as ltw
		INNER JOIN pembobotan_ecf as tf ON ltw.ID_P_ECF= tf.ID_P_ECF
		WHERE ID_APLIKASI=".$id_aplikasi." ");
		return $query;
	}
	
}

?>