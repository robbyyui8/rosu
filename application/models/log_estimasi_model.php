<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_estimasi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	
	//update value UCW/UAW/TCF/ECF transaction log
	function update_transaction_log($data,$id ){
		$this->db->where('ID_APLIKASI',$id);
		$this->db->update('aplikasi',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	// get log estimation
	function get_log_estimasi(){
		$query = $this->db->query("SELECT *,a.DATE_CREATED FROM aplikasi a
		LEFT JOIN  tim as tm ON tm.ID_TIM=a.ID_TIM
INNER JOIN client as c ON c.ID_CLIENT =a.ID_CLIENT 
ORDER BY a.ID_APLIKASI DESC		");
		return $query;
		
	}
	function get_request_validasi($id_aplikasi){
		$query = $this->db->query("SELECT *,a.DATE_CREATED FROM aplikasi a
		INNER JOIN  tim as tm ON tm.ID_TIM=a.ID_TIM
INNER JOIN client as c ON c.ID_CLIENT =a.ID_CLIENT 
WHERE a.ID_APLIKASI=".$id_aplikasi."
ORDER BY a.ID_APLIKASI DESC		");
		return $query;
		
	}
	
	function get_effort_real($id){
		$query = $this->db->query("SELECT * FROM aplikasi a
		 WHERE a.ID_APLIKASI=".$id."");
		return $query;
		
	}
	
	
	function edit_log_aplikasi($id){
		$query = $this->db->query("SELECT *,a.DATE_CREATED FROM aplikasi a
		INNER JOIN  tim as tm ON tm.ID_TIM=a.ID_TIM
		WHERE a.ID_APLIKASI=".$id."	");
		return $query;
		
	}
	
	function update_log_aplikasi($data,$id){
		$this->db->where('ID_APLIKASI',$id);
		$this->db->update('aplikasi',$data);
		return $this->db->affected_rows() ? true : false;
		
	}
	
	
	
	function get_log_use_case($id_aplikasi){
		$query = $this->db->query("SELECT *,l.BOBOT as LOG_BOBOT FROM log_uc_weight as l
		INNER JOIN  uc_weight as uw ON l.ID_KATEGORI=uw.ID_UC_WEIGHT
		WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	function get_log_aktor_weight($id_aplikasi){
		$query = $this->db->query("SELECT *,la.BOBOT as LOG_BOBOT FROM log_actor_weight as la
		INNER JOIN  actor_weight as aw ON la.ID_KATEGORI=aw.ID_ACTOR_WEIGHT
		WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	
	
		
	// get all use case estimate
	function spesific_transaction($id_transaction){
		$query = $this->db->query("SELECT * FROM aplikasi WHERE ID_APLIKASI=".$id_transaction."");
		
		return $query;
	}
	
	function get_konstanta_effort(){
		$query = $this->db->query("SELECT * FROM metode_usaha WHERE STATUS=1");
		
		return $query;
	}
	
	function get_distribusi_usaha(){
		$query = $this->db->query("SELECT * FROM aktivitas as a 
		INNER JOIN metode_aktivitas as ma ON ma.ID_METODE_AKTIVITAS= a.ID_METODE_AKTIVITAS 
		INNER JOIN profesi as p ON a.ID_PROFESI =p.ID_PROFESI
		WHERE ma.STATUS=1
		ORDER BY ID_AKTIVITAS ASC ");
		
		return $query;
	}
	
	
	// get max id transaction
	function getMaxID(){
		$query = $this->db->query("SELECT MAX(ID_APLIKASI) as ID_APLIKASI FROM aplikasi");
		
		return $query;
	}
	
	
	function insert_log_actor_weight($data){
		$this->db->insert('log_actor_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	//data actor weight
	
	function get_data_aw(){
		//Select table name
		$this->db->select("*");
		$this->db->from('actor_weight');
		
		$query = $this->db->get();
		return $query;
	}
	
	function countCatAW($id_aplikasi,$id_categori){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from log_actor_weight where ID_APLIKASI=".$id_aplikasi." AND ID_KATEGORI=".$id_categori."");
		
		return $query;
	}
	
	
	function get_bobotAW($id_categori){
		$query = $this->db->query("SELECT BOBOT  from actor_weight where  ID_ACTOR_WEIGHT=".$id_categori."");
		
		return $query;
	}
	
	function hasilAW($id_aplikasi){
		$query = $this->db->query("SELECT sum(BOBOT) as HASIL  from log_actor_weight where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
	}
	//data uc weight
	
	function get_data_ucw(){
		//Select table name
		$this->db->select("*");
		$this->db->from('uc_weight');
		
		$query = $this->db->get();
		return $query;
	}
	
	function insert_log_uc_weight($data){
		$this->db->insert('log_uc_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	function selectone_log_ucw($id_log_ucw){
		$query = $this->db->query("SELECT *  from log_uc_weight log
		 where log.ID=".$id_log_ucw."");
		return $query;
	}
	
	function update_log_uc_weight($data,$id_log_ucw){
		$this->db->where('ID',$id_log_ucw);
		$this->db->update('log_uc_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	function delete_log_uc_weight($id_log_ucw){
		$this->db->where('ID', $id_log_ucw);
		$this->db->delete('log_uc_weight');
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function get_data_log_ucw($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_uc_weight log
		 INNER JOIN uc_weight as uw ON log.ID_KATEGORI=uw.ID_UC_WEIGHT
		 where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
	}
	
	
	function get_data_log_aw($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_actor_weight as log
		 INNER JOIN actor_weight as aw ON log.ID_KATEGORI=aw.ID_ACTOR_WEIGHT
		 where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
		
	}
	
	function selectone_log_aw($id_log_aw){
		$query = $this->db->query("SELECT *  from log_actor_weight log
		 where log.ID=".$id_log_aw."");
		return $query;
	}
	
	function update_log_actor_weight($data,$id_log_aw){
		$this->db->where('ID',$id_log_aw);
		$this->db->update('log_actor_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function delete_log_actor_weight($id_log_ucw){
		$this->db->where('ID', $id_log_ucw);
		$this->db->delete('log_actor_weight');
		return $this->db->affected_rows() ? true : false;
	}
	
	
	
	function get_data_log_ecf($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_ecf_weight as log
		 INNER JOIN environment_factor as ef ON log.ID_ECF=ef.ID_ECF
		 where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
		
	}
	
	
	
	
	function countCatUW($id_aplikasi,$id_categori){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from log_uc_weight where ID_APLIKASI=".$id_aplikasi." AND ID_KATEGORI=".$id_categori."");
		
		return $query;
	}
	
	function hasilUW($id_aplikasi){
		$query = $this->db->query("SELECT sum(BOBOT) as HASIL  from log_uc_weight where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
	}
		
	/* seharunya ini tidak dipakai */
	function get_bobotUW($id_categori){
		$query = $this->db->query("SELECT BOBOT  from uc_weight where  ID_UC_WEIGHT=".$id_categori."");
		
		return $query;
	}
	
	function insert_log_tcf_weight($data){
		$this->db->insert('log_tcf_weight',$data);
		//return $this->db->affected_rows() ? true : false;
	}
	//delete tcf value for update
	function deletetcf($id_aplikasi){
		$this->db->where('ID_APLIKASI', $id_aplikasi);
		$this->db->delete('log_tcf_weight');
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function update_log_tcf_weight($data){
		$this->db->where('ID_APLIKASI',$id);
		$this->db->update('log_tcf_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	
	function countTf($id_aplikasi){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from log_tcf_weight where ID_APLIKASI=".$id_aplikasi." ");
		return $query;
	}
	function get_data_log_tcf($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_tcf_weight as ltw
		INNER JOIN tecnical_factor as tf ON ltw.ID_TCF= tf.ID_TCF
		WHERE ID_APLIKASI=".$id_aplikasi." ");
		return $query;
	}
	
	
	function sumLogTf($id_aplikasi){
		$query = $this->db->query("SELECT sum(VALUE*BOBOT) as VALUE  from log_tcf_weight WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	
	function insert_log_ecf_weight($data){
		$this->db->insert('log_ecf_weight',$data);
		return $this->db->affected_rows() ? true : false;
	}
	//delete tcf value for update
	function deleteecf($id_aplikasi){
		$this->db->where('ID_APLIKASI', $id_aplikasi);
		$this->db->delete('log_ecf_weight');
		return $this->db->affected_rows() ? true : false;
	}
	
	function countEf($id_aplikasi){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from log_ecf_weight  WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	function sumLogEf($id_aplikasi){
		$query = $this->db->query("SELECT sum(VALUE*BOBOT) as VALUE  from log_ecf_weight WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	function update_log_biaya($data,$id_log_biaya,$id_aplikasi ){
		$this->db->where('ID_LOG_BIAYA',$id_log_biaya);
		$this->db->where('ID_APLIKASI',$id_aplikasi);
		$this->db->update('log_biaya',$data);
		return $this->db->affected_rows() ? true : false;
	}
	
	function rekal_log_biaya($id_aplikasi){
		$query = $this->db->query("SELECT sum(BIAYA_AKTIVITAS) as TOTAL  from log_biaya WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	
	
	//list flexy
	function get_data_user(){
		//Select table name
		$this->db->select("*");
		$this->db->from('user');
		
		$query = $this->db->get();
		return $query;
		
		
	}
	function get_desc_pel_lunak($id_aplikasi){
		
		$query = $this->db->query("SELECT *,a.DATE_CREATED FROM aplikasi a
		INNER JOIN  tim as tm ON tm.ID_TIM=a.ID_TIM
		WHERE a.ID_APLIKASI=".$id_aplikasi."
		");
		return $query;
		
	}
	
	
	
	function delete($id){
		$this->db->where('ID_user', $id);
		$this->db->delete('user');
		return $this->db->affected_rows() ? true : false;
	}
	
	function selectone($id){
		$this->db->select("*");
		$this->db->from('user');
		$this->db->where('ID_user',$id);
		$query = $this->db->get();
		return $query;
	}
	
	function update($data,$id ){
		$this->db->where('id_user',$id);
		$this->db->update('user',$data);
		return $this->db->affected_rows() ? true : false;
	}
        
	function get_user(){
		$this->db->select("*");
		$this->db->from('user');
		$query = $this->db->get();
		return $query;
	}
	
}

?>