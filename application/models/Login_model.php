<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#=========================================================================
# Author:      Zachary Campaner - Handsome Managing Director of Raksquad Design and Development.
# Description: Generic Fetch, Insert, Update, Get Total and Delete Script
# Version:     1.0
# Date:        February 28, 2018
#=========================================================================

class Login_model extends CI_Model {
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function check_user($data){
	   
	   	$this->db->where($data);
	   	$query = $this->db->get('users');
	    
		return ($query->num_rows() > 0);
	}

	public function get_user($data){
	   
	   	$this->db->where($data);
	   	$query = $this->db->get('users');
	      
		return ($query->result());
	}
	
	public function check_credentials($username = '', $password = '')
	{
		$query = $this->db->get_where('users', array('email' => $username, 'password' => $password));
		return $query->result();
	} 

	public function check_credentials_admin($username = '', $password = '')
	{
		$query = $this->db->get_where('admin', array('email' => $username, 'password' => $password));
		return $query->result();
	}

	public function get_customer_data_email($email){
	   
	   	$this->db->where("email_address",$email);
	   	$query = $this->db->get('users');
	      
		return ($query->num_rows() > 0) ? $query->result() : false;
	}

	public function check_email($email){
		$this->db->where("email_address",$email);
		$query = $this->db->get('users');

		return ($query->num_rows() > 0) ? $query->result() : false;
	}

	

	
}