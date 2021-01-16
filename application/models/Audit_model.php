<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#=========================================================================
# Author:      Zachary Campaner - Handsome Managing Director of Raksquad Design and Development.
# Description: Generic Fetch, Insert, Update, Get Total and Delete Script
# Version:     1.0
# Date:        February 28, 2018
#=========================================================================

class Audit_model extends CI_Model {
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

	public function log_audit($tableData)
	{
		$results = $this->db->insert('audit_trails', $tableData);

		return $results;
	}

}

