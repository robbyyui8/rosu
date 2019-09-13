<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_tcf_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	
	
	function insert_log_tcf_weight($data){
		$this->db->insert('log_indikator_tcf',$data);
		//return $this->db->affected_rows() ? true : false;
	}
	//delete tcf value for update
	function deletetcf($id_aplikasi){
		$this->db->where('ID_APLIKASI', $id_aplikasi);
		$this->db->delete('log_indikator_tcf');
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function update_log_indikator_tcf($data){
		$this->db->where('ID_APLIKASI',$id);
		$this->db->update('log_indikator_tcf',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function countTf(){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from pembobotan_tcf ");
		return $query;
	}
	
	function sumLogTf($id_aplikasi){
		$query = $this->db->query("SELECT sum(lpt.VALUE*pt.BOBOT) as VALUE  from log_indikator_tcf lpt
INNER JOIN pembobotan_tcf as pt ON lpt.ID_P_TCF=pt.ID_P_TCF
		WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	
	function get_data_log_tcf($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_indikator_tcf as ltw
		INNER JOIN pembobotan_tcf as tf ON ltw.ID_P_TCF= tf.ID_P_TCF
		WHERE ID_APLIKASI=".$id_aplikasi." ");
		return $query;
	}
	
	
	
}

?>