<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Estimasi_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->CI = get_instance();
	}
	
	
	//insert log estimasi
	function insert_data_aplikasi($data){
		$this->db->insert('aplikasi',$data);
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
		INNER JOIN  tim as tm ON tm.ID_TIM=a.ID_TIM
		INNER JOIN client as c ON. c.ID_CLIENT=a.ID_CLIENT
		ORDER BY a.ID_APLIKASI DESC
		");
		return $query;
		
	}
	
	function get_log_use_case($id_aplikasi){
		$query = $this->db->query("SELECT *,l.BOBOT as LOG_BOBOT FROM log_uc_weight as l
		INNER JOIN  uc_weight as uw ON l.ID_KATEGORI=uw.ID_UC_WEIGHT
		WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	
		
	// get all use case estimate
	function get_nilai_ucp($id_transaction){
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
	
	function get_data_log_tcf($id_aplikasi){
		$query = $this->db->query("SELECT *  from log_tcf_weight as log
		 LEFT JOIN tecnical_factor as tf ON log.ID_TCF=tf.ID_TCF
		 where ID_APLIKASI=".$id_aplikasi."");
		
		return $query;
		
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
	
	function hasilUAW($id_aplikasi){
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
	
	
	function countTf(){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from tecnical_factor ");
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
	
	function countEf(){
		$query = $this->db->query("SELECT count(*) as JUMLAH  from environment_factor ");
		return $query;
	}
	
	function sumLogEf($id_aplikasi){
		$query = $this->db->query("SELECT sum(VALUE*BOBOT) as VALUE  from log_ecf_weight WHERE ID_APLIKASI=".$id_aplikasi."");
		return $query;
	}
	
	function delete_current_log_biaya($id_aplikasi){
		$this->db->where('ID_APLIKASI', $id_aplikasi);
		$this->db->delete('log_biaya');
		return $this->db->affected_rows() ? true : false;
	}
	
	//insert log estimasi
	function insert_log_biaya($data){
		$this->db->insert('log_biaya',$data);
		return $this->db->affected_rows() ? true : false;
	}
	//get_log_biaya
	
	function get_log_biaya($id_aplikasi){
		$query = $this->db->query("SELECT * from log_biaya as lb
		INNER JOIN  aktivitas as m ON lb.ID_AKTIVITAS =m.ID_AKTIVITAS
        INNER JOIN profesi as p ON p.ID_PROFESI=m.ID_PROFESI 
		WHERE ID_APLIKASI=".$id_aplikasi."
		ORDER BY m.ID_AKTIVITAS ASC");
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