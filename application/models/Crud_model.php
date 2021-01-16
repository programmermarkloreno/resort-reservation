<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#=========================================================================
# Author:      Zachary Campaner - Handsome Managing Director of Raksquad Design and Development.
# Description: Generic Fetch, Insert, Update, Get Total and Delete Script
# Version:     1.0
# Date:        February 28, 2018
#=========================================================================

class Crud_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get($tableName, $whereArray = array(), $limit = array(), $order="")
	{
		if (! empty($limit)) {
			$this->db->limit($limit[0], $limit[1]);
		}

		if(!empty($order))
			$this->db->order_by($order, 'DESC');

		if (empty($whereArray)) {
			$query = $this->db->get($tableName);
		} else {
			$query = $this->db->get_where($tableName, $whereArray);
		}
		
		// die($this->db->last_query());

		return $query->result();
	}
    
    public function get101($tableName, $whereArray = array(), $limit = array(), $order="",$order_by)
	{
		if (! empty($limit)) {
			$this->db->limit($limit[0], $limit[1]);
		}

		if(!empty($order))
			$this->db->order_by($order, $order_by);

		if (empty($whereArray)) {
			$query = $this->db->get($tableName);
		} else {
			$query = $this->db->get_where($tableName, $whereArray);
		}

		return $query->result();
	}

	public function userslists(){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('users_id', 'ASC');
		$results = $this->db->get();

		return $results->result();
	}

	public function getResultArray($tableName, $whereArray = array()) {
		if (empty($whereArray)) {
			$query = $this->db->get($tableName);
		} else {
			$query = $this->db->get_where($tableName, $whereArray);
		}
		
		return $query->result_array();
	}

	public function getArray($tableName, $whereArray = array())
	{
		if (empty($whereArray)) {
			$query = $this->db->get($tableName);
		} else {
			$query = $this->db->get_where($tableName, $whereArray);
		}

		return $query->row_array();
	}

	 public function updateImage($table,$data,$where){

	 	$this->db->where($where);
	 	$this->db->update($table, $data);
	 	if($this->db->affected_rows() > 0){
	 		return true;
	 	}else{
	 		return false;
	 	}

	 }

	public function update_batch($tableName = '', $data = array(), $id = ''){

		$res = $this->db->update_batch($tableName, $data, $id);

		return $res;
	}

	public function brgylists(){

		$this->db->select('*');
		$this->db->from('area');
		$this->db->join('brgy', 'brgy.area_id = area.area_id');
		$this->db->order_by('area_name ASC, brgy_name ASC');
		$results = $this->db->get();

		return $results->result(); 
	}

	public function codlists($status){


		$this->db->select('cod_info.* , ewaybill.pickup_date, ewaybill.cod_sf_amount, ewaybill.paid_cod_sf, ewaybill.sender_name');
		$this->db->from('cod_info');
	    $this->db->join('ewaybill', 'ewaybill.ewaybill_id = cod_info.waybill_id');
        $this->db->where("cod_info.cod_status",$status);
	    $this->db->order_by("cod_id", "desc");
	    $results = $this->db->get();

		return $results->result();

	}

	public function ewaybillstatus($limit, $start, $mode){

	    $this->db->limit($limit, $start);
	   	$this->db->where("status",$mode);
        $this->db->order_by("ewaybill_id", "desc");
   		$query = $this->db->get("ewaybill");
       if ($query->num_rows() > 0) {
           return $query->result();
       }else{
           return false;
       }
	}

	// public function getRecent(
	// 	string $tableName, 
	// 	string $orderByColumn, 
	// 	int $limit = 5,
	// 	array $where = array()
	// ) {

	// 	if (! empty($where)) {
	// 		$this->db->where($where);
	// 	}

	// 	$this->db->order_by($orderByColumn, 'DESC');
	// 	$this->db->limit($limit);
	// 	$query = $this->db->get($tableName);

	// 	return $query->result();
	// }
	public function countWhere($tableName, $whereArray)	{
		if($whereArray!='' || $whereArray == NULL){
			$this->db->where($whereArray);
			$this->db->from($tableName);
			return $this->db->count_all_results();
	   }else{
			return $this->db->count_all($tableName);
	   }
	}
	public function insert_data($tableName, $tableData)
	{
		$results = $this->db->insert($tableName, $tableData);
		
		return $results;
	}

	public function insert_data_batch($tableName, $tableData) {
		return $this->db->insert_batch($tableName, $tableData);
	}
	
	public function update_data($tableName, $tableData, $whereArray)
	{
		
		$this->db->where($whereArray);
		$results = $this->db->update($tableName, $tableData);
		// echo "<pre>";
		// var_dump($this->db->last_query());		
		return $results;
	}

	public function update_projects_photo($projectId, $filename)
	{
		$sql = "UPDATE projects SET photo_path = '$filename' WHERE project_id ='$projectId'";
		$results = $this->db->query($sql);

		return $results;
	}

	public function update_about_photo($aboutUsID, $filename)
	{
		$sql = "UPDATE aboutus SET photo_path = '$filename' WHERE aboutus_id ='$aboutUsID'";
		$results = $this->db->query($sql);

		return $results;
	}

	public function countAll($tableName, $id = null, $idValue = null, $where = array())
	{	
		if (! (empty($id) && empty($value)) ) {
			$this->db->where($id, $idValue);
		}

		if (empty($where)) {
			$query = $this->db->get($tableName);
		} else {
			$query = $this->db->get_where($tableName, $where);
		}
		
		return $this->db->count_all_results();
	}

	public function delete($tableName, $id) {
		return $this->db->delete($tableName, $id);
	}

	public function delete_data($tableName, $where = array()) {
		$this->db->where($where);
		$result = $this->db->delete($tableName);
		return $result;
	}

	// public function getResultWhere(string $tableName, array $where) : array {
	// 	for ($i = 0, $ilen = count($where); $i < $ilen; $i++) { 
	// 		$this->db->where($where[$i]['column'], $where[$i]['value']);
	// 	}

	// 	$this->db->select('*');

	// 	$query = $this->db->get($tableName);

	// 	return $query->result_array() ?? [];
	// }

	public function get_team()
	{
		$sql = "SELECT * FROM aboutus";
		$results = $this->db->query($sql);
		// die($this->db->last_query());
		return $results->result();
	}

	public function joinAreaBrgy()
	{
		$this->db->select('*');
		$this->db->from('area');
		$this->db->join('brgy', 'brgy.area_id = area.area_id');
		$this->db->order_by('area_name ASC, brgy_name ASC');
		$results = $this->db->get();

		return $results->result();
	}

	
	public function joinSPS()
	{
		$this->db->select('*');
		$this->db->from('schedule_pickup');
		$this->db->join('users', 'users.acc_no = schedule_pickup.acc_no');
		$this->db->order_by('schedule_id DESC');
		$results = $this->db->get();

		return $results->result();
	}

	// public function joinCOD($status)
	// {

	// 	$this->db->select('cod_info.* , ewaybill.pickup_date, ewaybill.cod_sf_amount, ewaybill.paid_cod_sf, ewaybill.sender_name');
	// 	$this->db->from('cod_info');
	//     $this->db->join('ewaybill', 'ewaybill.ewaybill_id = cod_info.waybill_id');
 //        $this->db->where("cod_info.cod_status",$status);
	//     $this->db->order_by("cod_id", "desc");
	//     $results = $this->db->get();

	// 	return $results->result();

	// }

	public function countData($tableName)
	 {   
	// 	if($search != '' || $search != NULL){
	// 		$this->db->like($like,$search);
	// 		$this->db->from($tableName);
	// 		return $this->db->count_all_results();
 //          }else{
          	return $this->db->count_all($tableName);
         // }
		// $this->db->like($tableName,$search);
		// return $this->db->count_all($tableName);
	}

	// public function getAddressData()
	// {
	// 	$sql = "
	// 	SELECT address.address1, address.address2, address.address_type,address.contact_person,
	// 		address.barangay,
	// 		address.area,
	// 		address.address_id,
	// 		address.contact_no,
	// 		area.area_name as area_name,
	// 		brgy.brgy_name as brgy_name
	// 	   FROM address 
	// 	   INNER JOIN area ON area.area_id = address.area
	// 	   INNER JOIN brgy ON area.area_id = brgy.area_id";
	// 	$results = $this->db->query($sql);

	// 	return $results->result();
	// }

	public function getPickupData()
	{
		$this->db->select('schedule_pickup.pickup_address as pickup_address, schedule_pickup.pickup_count as pickup_count, schedule_pickup.special_instructions as special_instructions, schedule_pickup.pickup_date as pickup_date, schedule_pickup.pickup_time as pickup_time, schedule_pickup.acc_no as acc_no, schedule_pickup.tracking_no as tracking_no, schedule_pickup.status as status, schedule_pickup.rider_name as rider_name, schedule_pickup.schedule_id as schedule_id, users.first_name as first_name, users.last_name as last_name, users.mobile_no as mobile_no');
		$this->db->from('schedule_pickup');
		$this->db->join('users', 'users.acc_no = schedule_pickup.acc_no');
		// $this->db->group_by('schedule_pickup.acc_no');

		$results = $this->db->get();
		// var_dump($results->result());
		return $results->result();
	}

	public function getReportData($tableName, $whereArray = array(), $from, $to)
	{
			if($tableName == 'ewaybill'){
				$this->db->select('waybill_no, recepient_name, status, waybill_type, delivery_date, person_received, sender_name');
				$this->db->where(' record_timestamp >= date("'.$from.'")');
				$this->db->where( 'record_timestamp <= date("'.$to.'") + 1');
			}else{
				$this->db->select('cod_id, waybill_no,  waybill_id, cod_amount, cod_status, rider_name, date_received, deposit_date');
				$this->db->where(' time_stamp >= date("'.$from.'")');
				$this->db->where( 'time_stamp <= date("'.$to.'") + 1');
			}
			
			

			$this->db->where($whereArray);
			$this->db->from($tableName);

		$results = $this->db->get();
		// var_dump($results->result());
		return $results->result();
	}

	public function getTrackStatus($waybillNo){
		$this->db->select('ewaybill.*, waybill_history.waybill_no, waybill_history.processing_date, waybill_history.pending_date, waybill_history.out_for_del_date, waybill_history.delivered_date, waybill_history.rts_date, waybill_history.picked_by, waybill_history.delivered_by');
		$this->db->where('ewaybill.waybill_no', $waybillNo);
		$this->db->from('ewaybill');
		$this->db->group_by('ewaybill.waybill_no');
		$this->db->join('waybill_history', 'ewaybill.waybill_no = waybill_history.waybill_no');
		// $this->db->group_by('schedule_pickup.acc_no');

		$results = $this->db->get();
		// var_dump($results->result());
		return $results->result();
	}	

	public function getTrackStatusNoHistory($waybillNo){
		$this->db->select('*');

		$this->db->where('waybill_no', $waybillNo);
		$this->db->from('ewaybill');
		$this->db->group_by('waybill_no');
		// $this->db->group_by('schedule_pickup.acc_no');

		$results = $this->db->get();
		// var_dump($results->result());
		return $results->result();
	}	

	public function scopeList($where){

		$this->db->select('*');
		$this->db->from('user_role');
		$this->db->join('user_scope', 'user_role.id = user_scope.role_id');
	 	$this->db->where($where);

		$results = $this->db->get();

		return $results->result();
	}

	public function permissionList(){

		$this->db->select('*');
		$this->db->from('user_role');
		$this->db->join('user_scope', 'user_role.id = user_scope.role_id', 'right');
		$this->db->join('user_types', 'user_types.user_type_id = user_scope.user_type_id');
		$this->db->order_by('user_scope.user_type_id ASC');
		$results = $this->db->get();

		return $results->result();
	}
}

