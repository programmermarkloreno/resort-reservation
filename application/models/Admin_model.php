<?php  
class Admin_model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('email');
	}

	public function check_credentials($username = '', $password = '')
	{
		$query = $this->db->get_where('users', array('email' => $username, 'password' => $password));
		return $query->result();
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

	function create($table,$tabledata){

	     $data = $this->insert_mode($tabledata);
        if($data){
        	$this->db->insert($table, $data);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				return false;
			}
        }else{
        	return false;
        }
	}

	function create_account($table,$tabledata){

	    $result = $this->insert_mode($tabledata);
        if($result){
        	$this->db->insert($table, $result);
			if($this->db->affected_rows() > 0){
				return true;
			}else{
				$msg = "Having a problem in creating account. Please try again.";
				return $msg;
			}
        }else{
        	return $result;
        }
	}

	function client_read($tbl, $entry, $captcha){
		switch ($tbl) {
			case 'tblcustomer':
				$where = 'Entry_code = "'.$entry.'" AND Captcha_code = "'.$captcha.'" AND E_confirm = 0';
	 			$this->db->select('CustomerId, Firstname, Lastname');
	 			$this->db->where($where);
				$query = $this->db->get($tbl);
				if($query->num_rows() > 0){
					return $query->result();
				}else{
					return false;
				}
				break;
			
			default:
				# code...
				break;
		}
	}

	function login_read($email, $pass){

		$where = "Email = '".$email."' AND pass = '".$pass."' AND E_confirm = 1";
		$this->db->select('CustomerId, Firstname, Lastname');
		$this->db->where($where);
		$query = $this->db->get('tblcustomer');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function getCustomerReservation($id){

		$where = "CustomerId = '".$id."' AND CheckOut = '' ";
        $this->db->where($where);
		$query = $this->db->get('tbldatetime');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	function admin_read($mode, $status, $page){
	 	
	 	switch ($mode) {
	 		case 'admin-dashboard':
				if($page == 'company_profile') {
					$this->db->where('id', $status);
					$query = $this->db->get('home_section_d');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}elseif ($page == 'status_reserved') {
					$this->db->where('statusCode', $status);
					$query = $this->db->get('tbldatetime');
					if($query->num_rows() > 0){
						return $query->num_rows();
					}else{
						return 0;
					}
				}elseif ($page == 'reserved') {
					$query = $this->db->get('tbldatetime');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-reservation-tocreate') {
					$this->db->where($status);
					$query = $this->db->get('reserved_details');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-allData') {
					  $val = $this->uri->segment(6);
					 
					 if($status == 'search'){
					 	$status_code = 0;
					 	if($val != '' || $val != NULL){
							$this->db->like("tbldatetime.RCode", $val);
					    }
					 }elseif ($status == 'filter') {
					 	if($val != '' || $val != NULL){
							$this->db->like("tbldatetime.statusCode", $val);
					    }
					    if($val == 5){
					    	$status_code = 1;
					    }else{
					    	$status_code = 0;
					    }
					 }

					$this->db->select('tbldatetime.*, tbldatetime.CustomerId, tbldatetime.RCode, tbldatetime.datetime, tbldatetime.statusCode, tblcustomer.Lastname, tblcustomer.Firstname, tblcustomer.Middlename, tblcustomer.Mobile, tblcustomer.Email, tblcustomer.Company, tbldatetime.CheckIn, tbldatetime.TimeIn, tbldatetime.NDays, tbldatetime.RType, tblpayment.Totalbill, tblpayment.Balance');
			 		   $this->db->from('tbldatetime');
			 		   $this->db->join('tblcustomer', 'tbldatetime.RCode = tblcustomer.RCode'); 
			 		   $this->db->join('tblpayment', 'tblcustomer.RCode = tblpayment.RCode AND ispaid = '.$status_code.'');
			 		   $this->db->order_by("id", "ASC");
					$results = $this->db->get();
					if($results->num_rows() > 0){
						return $results->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-audit-logs') {
					  $val = $this->uri->segment(6);
					 if($status == 'search'){
					 	if($val != '' || $val != NULL){
							$this->db->like("user_id", $val);
					    }
					 }elseif ($status == 'filter') {
					 	if($val != '' || $val != NULL){
							$this->db->like("user_id", $val);
					     }
					 }
				  
			 		$this->db->order_by("audit_id", "desc");
					$results = $this->db->get('audit_trails');
					if($results->num_rows() > 0){
						return $results->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-customer-data') {
					  $val = $this->uri->segment(6);
					 if($status == 'search'){
					 	if($val != '' || $val != NULL){
							$this->db->like("CustomerId", $val);
					    }
					 }elseif ($status == 'filter') {
					 	if($val != '' || $val != NULL){
							$this->db->like("CustomerId", $val);
					     }
					 }
				  
			 		$this->db->order_by("id", "desc");
					$results = $this->db->get('tblcustomer');
					if($results->num_rows() > 0){
						return $results->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-reports-data') {

						$start = $this->uri->uri_to_assoc(5);

				      $this->db->select('tbldatetime.*, tbldatetime.RCode, tbldatetime.datetime, tblcustomer.Company, tblcustomer.CustomerId, tblpayment.Totalbill');
			 		   $this->db->from('tbldatetime');
			 		   $this->db->join('tblcustomer', 'tbldatetime.RCode = tblcustomer.RCode'); 
			 		   $this->db->join('tblpayment', 'tblcustomer.RCode = tblpayment.RCode AND ispaid = 0');

					$this->db->where("statusCode = 5 AND STR_TO_DATE(CheckIn, '%m-%d-%Y') BETWEEN STR_TO_DATE('".$start["strt"]."', '%m-%d-%Y') AND STR_TO_DATE('".$start["end"]."', '%m-%d-%Y')");
			 		$this->db->order_by("id", "desc");
					$results = $this->db->get();

					if($results->num_rows() > 0){
						return $results->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-user-mgmt') {
					  $val = $this->uri->segment(6);
					 if($status == 'search'){
					 	if($val != '' || $val != NULL){
							$this->db->like("acc_no", $val);
					    }
					 }elseif ($status == 'filter') {
					 	if($val != '' || $val != NULL){
							$this->db->like("acc_no", $val);
					     }
					 }
				  
			 		$this->db->order_by("users_id", "asc");
					$results = $this->db->get('users');
					if($results->num_rows() > 0){
						return $results->result();
					}else{
						return false;
					}
				}elseif ($page == 'reservation') {
					     $statusCode = '';

			 		 if($status == 'pending'){ 
					  	$statusCode = 0; 
					  	 $this->db->select('tbldatetime.*, tbldatetime.CustomerId, tbldatetime.RCode, tblcustomer.LastName, tblcustomer.FirstName, tblcustomer.Mobile, tblcustomer.Email, tblcustomer.Company, tbldatetime.CheckIn, tbldatetime.TimeIn, tbldatetime.NDays, tbldatetime.RType, tblpayment.Totalbill, tblpayment.Balance');
					 
			 		   $this->db->from('tbldatetime');
			 		   $this->db->join('tblcustomer', 'tbldatetime.RCode = tblcustomer.RCode'); 
					  	$this->db->join('tblpayment', 'tblcustomer.RCode = tblpayment.RCode AND ispaid = 0');
					  }
					  elseif ($status == 'confirmed'){ $statusCode = 1;
					     $this->db->select('tbldatetime.*, tbldatetime.CustomerId, tbldatetime.RCode, tblcustomer.LastName, tblcustomer.FirstName, tblcustomer.Mobile, tblcustomer.Email, tblcustomer.Company, tbldatetime.CheckIn, tbldatetime.TimeIn, tbldatetime.NDays, tbldatetime.RType, tblpayment.Totalbill, tblpayment.Balance');
					 
			 		   $this->db->from('tbldatetime');
			 		   $this->db->join('tblcustomer', 'tbldatetime.RCode = tblcustomer.RCode');  
					  	$this->db->join('tblpayment', 'tblcustomer.RCode = tblpayment.RCode AND ispaid = 0');
					  }  
			 		  elseif($status == 'check_in') { $statusCode = 2; 
			 		  	 $this->db->select('tbldatetime.*, tbldatetime.CustomerId, tbldatetime.RCode, tblcustomer.LastName, tblcustomer.FirstName, tblcustomer.Mobile, tblcustomer.Email, tblcustomer.Company, tbldatetime.CheckIn, tbldatetime.TimeIn, tbldatetime.NDays, tbldatetime.RType, tblpayment.Totalbill, tblpayment.Balance');
					 
			 		   $this->db->from('tbldatetime');
			 		   $this->db->join('tblcustomer', 'tbldatetime.RCode = tblcustomer.RCode'); 
			 		  	$this->db->join('tblpayment', 'tblcustomer.RCode = tblpayment.RCode AND ispaid = 0');
			 		  }
			 		  elseif ($status == 'finished'){ $statusCode = 5; 
			 		  	 $this->db->select('tbldatetime.*, tbldatetime.CustomerId, tbldatetime.RCode, tblcustomer.LastName, tblcustomer.FirstName, tblcustomer.Mobile, tblcustomer.Email, tblcustomer.Company, tbldatetime.CheckIn, tbldatetime.TimeIn, tbldatetime.NDays, tbldatetime.RType');
					 
			 		   $this->db->from('tbldatetime');
			 		   $this->db->join('tblcustomer', 'tbldatetime.RCode = tblcustomer.RCode'); 
			 		  	 // $this->db->join('tblpayment', 'tblcustomer.RCode = tblpayment.RCode', 'left');
			 		  	 //  $this->db->group_by('RCode');
			 		  	 //  //$this->db->order_by("tblpayment.id", "desc");
			 		  	 // $this->db->having('max(tblpayment.id)');
			 		  }  
			 		  elseif($status == 'cancelled') { $statusCode = 4; 
				 		   $this->db->select('tbldatetime.*, tbldatetime.CustomerId, tbldatetime.RCode, tblcustomer.LastName, tblcustomer.FirstName, tblcustomer.Mobile, tblcustomer.Email, tblcustomer.Company, tbldatetime.CheckIn, tbldatetime.TimeIn, tbldatetime.NDays, tbldatetime.RType, tblpayment.Totalbill, tblpayment.Balance');
						 
				 		   $this->db->from('tbldatetime');
				 		   $this->db->join('tblcustomer', 'tbldatetime.RCode = tblcustomer.RCode');  
			 		  	 $this->db->join('tblpayment', 'tblcustomer.RCode = tblpayment.RCode AND ispaid = 0');
			 		  }
			 		   
			 		  $this->db->where("statusCode",$statusCode);
			 		  $this->db->order_by("CheckIn", "ASC");
			 		   $results = $this->db->get();
						if($results->num_rows() > 0){
							return $results->result();
						}else{
							return false;
						}
				}elseif ($page == 'accomodation_categories') {
					$this->db->where($status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}
				elseif ($page == 'accomodation_sub_categories_id') {
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->num_rows() + 1;
					}else{
						return 1;
					}
				}elseif ($page == 'issue_invoice') {
					$this->db->where($status);
					$query = $this->db->get('tblpayment');
					if($query->num_rows() > 0){
						return $query->row_array();
					}else{
						return false;
					}
				}elseif ($page == 'read_res_details') {
					$this->db->where($status);
					$query = $this->db->get('reserved_details');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}elseif ($page == 'reservation_info') {

				    $this->db->select('CheckIn, TimeIn, Status, RType, NDays, NPerson, excess, datetime');
		 		    $this->db->where($status);
					$query = $this->db->get('tbldatetime');
					if($query->num_rows() > 0){
						return $query->row_array();
					}else{
						return false;
					}
				}elseif ($page == 'client_info') {
				    $this->db->select('Lastname, Firstname, Middlename, Company, Address, Mobile, TelNo, Email');
		 		    $this->db->where($status);
					$query = $this->db->get('tblcustomer');
					if($query->num_rows() > 0){
						return $query->row_array();
					}else{
						return false;
					}
				}elseif ($page == 'adminsideaccomodation_categories') {
		 		    $this->db->where($status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'adminsideaccomodation_categories_fetch') {
		 			$this->db->select('Category_Id, id, Category_title, Category_desc, status');
		 		    $this->db->where($status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'get_additional_pckgs') {
		 			// $this->db->select('Category_Id, id, Category_title, Category_desc, status');
		 		    $this->db->where($status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'send_notification_for_resched') {
		 		    $this->db->select('RCode, Lastname, Company, Address, Email, Entry_code');
		 		    $this->db->where($status);
					$query = $this->db->get('tblcustomer');
					if($query->num_rows() > 0){
						return $query->row_array();
					}else{
						return false;
					}
		 		}elseif ($page == 'read-settings') {
		 			$this->db->where($status);
					$query = $this->db->get('settings');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-notifications') {
					$this->db->where($status);
					$query = $this->db->get('notification');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}elseif ($page == 'read-notifications-all') {
					$this->db->order_by('id', 'desc');
					$query = $this->db->get('notification');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
				}
	 			break;
	 		case 'view-information':
	 			if($page == 'tblcustomer'){
	 				$this->db->select('CustomerId, RCode, Lastname, Firstname, Middlename, Company, Address, Email, Mobile, TelNo');
	 				$this->db->where($status);
	 				$query = $this->db->get('tblcustomer');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif($page == 'tbldatetime'){
	 				$this->db->select('RCode, CheckIn, TimeIn, CheckOut, TimeOut, NDays, NPerson, excess, RType, Note, datetime, updated_at');
	 				$this->db->where($status);
	 				$query = $this->db->get('tbldatetime');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif($page == 'tblpayment'){
	 				$this->db->where($status);
	 				$query = $this->db->get('tblpayment');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif($page == 'reserved_details'){
	 				$this->db->where($status);
	 				$query = $this->db->get('reserved_details');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}
	 			break;
	 		case 'invoice-page':
	 			if($page == 'clientDetails'){
	 				$this->db->where('CustomerId', $status);
	 				$query = $this->db->get('tblcustomer');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif($page == 'invoice-summary'){
	 				$this->db->where('RCode', $status);
	 				$query = $this->db->get('tblpayment');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif($page == 'packages-details'){
	 				$this->db->where('RCode', $status);
	 				$query = $this->db->get('reserved_details');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif ($page == 'res_details') {
		 			$this->db->select('CheckIn, TimeIn, Status, RType, NDays, NPerson, excess, datetime');
		 		    $this->db->where('RCode', $status);
					$query = $this->db->get('tbldatetime');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}
	 			break;
	 		case 'client-page':
	 			 if($page == 'home_section_a'){
	 				 $this->db->where('status', $status);
					$query = $this->db->get($page);
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif ($page == 'home_section_b') {
	 				$this->db->where('status', $status);
					$query = $this->db->get($page);
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif ($page == 'home_section_c') {
	 				$this->db->where('status', $status);
					$query = $this->db->get($page);
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif ($page == 'home_section_d') {
	 				$query = $this->db->get($page);
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif ($page == 'client-view-reservation') {
	 				$this->db->where($status);
	 				$this->db->order_by("CheckIn", "DESC");
	 				$query = $this->db->get('tbldatetime');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif ($page == 'todays_event') {
	 				$this->db->select('tbldatetime.CheckIn, tbldatetime.Status, tbldatetime.RType, tbldatetime.NDays, tblcustomer.Company');
		 		   $this->db->from('tbldatetime');
		 		   $this->db->join('tblcustomer', 'tblcustomer.RCode = tbldatetime.RCode');
	 				$this->db->where('statusCode', $status);
	 				$query = $this->db->get();
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}elseif ($page == 'upcoming_events') {
	 				$this->db->select('tbldatetime.CheckIn, tbldatetime.Status, tbldatetime.RType, tbldatetime.NDays, tblcustomer.Company');
		 		   $this->db->from('tbldatetime');
		 		   $this->db->join('tblcustomer', 'tblcustomer.RCode = tbldatetime.RCode');
	 				$this->db->where('statusCode', $status);
	 				$query = $this->db->get();
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
	 			}
	 			break;
	 		case 'client-tools':
		 		if($page == 'tbloccasion_type'){
		 		    $this->db->where('occasion_status', $status);
					$query = $this->db->get($page);
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'clientsideaccomodation_packages') {
		 			$where = "pcks_parent_id = '0' AND pcks_status = 'Active'";
		 		    $this->db->where($where);
					$query = $this->db->get('packages');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'clientsideaccomodation_subpackages_file') {
		 			$this->db->where('file_status', 'Active');
					$query = $this->db->get('packages_file');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'clientsideaccomodation_categories') {
		 		    $this->db->where($status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'clientsideaccomodation_sub_categories') {
		 			$this->db->select('id, parent_id, sub_category_id, Category_title, Category_desc, price, capacity');
		 		    $this->db->where($status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'clientsideaccomodation_sub_categories_file') {
		 		    $this->db->select('Category_Id ,Subcategory_Id, imgfile_name');
		 		    $this->db->where($status);
					$query = $this->db->get('categories_file');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'accomodation') {
		 			$this->db->where('sub_category_id', $status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'additional') {
		 			$this->db->where('sub_category_id', $status);
					$query = $this->db->get('accomodation');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'refprovince') {
		 			$where = "regCode = 04 OR regCode = 13";
		 			$this->db->where($where);
					$query = $this->db->get('refprovince');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'refcitymun') {
		 			$this->db->where('provCode', $status);
					$query = $this->db->get('refcitymun');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'refbrgy') {
		 			$this->db->where('citymunCode', $status);
					$query = $this->db->get('refbrgy');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}elseif ($page == 'email_check') {
		 			$email = $this->input->post("cs_email");
		 		    $this->db->where('Email', $email);
					$query = $this->db->get('tblcustomer');
					if($query->num_rows() > 0){
						return true;
					}else{
						return false;
					}
		 		}elseif ($page == 'reserved_dates') {
		 			$this->db->select('RCode, CheckIn, NDays, RType');
		 		    $this->db->where('Status', $status);
					$query = $this->db->get('tbldatetime');
					if($query->num_rows() > 0){
						return $query->result();
					}else{
						return false;
					}
		 		}
	 			break;
	 		// case 'accomodation':
				// $query = $this->db->get('tbltempaccomodation');
				// if($query->num_rows() > 0){
				// 	return $query->result();
				// }else{
				// 	return false;
				// }
	 		// 	break;
	 	
	 	}
	 }

	 function edit($id, $table){

		$this->db->where('id', $id);
	 	$query = $this->db->get($table);
	 	if($query->num_rows() > 0){
	 		return $query->result();
	 	}else{
	 		return false;
	 	}
	}

	function update_settings($where, $tbl, $data){

		$this->db->where($where);
	 	$this->db->update($tbl, $data);
	 	if($this->db->affected_rows() > 0){
	 		return true;
	 	}else{
	 		return false;
	 	}
	}

	function update($id, $table, $tabledata){

		$this->db->where('id', $id);
	 	$this->db->update($table, $this->insert_mode($tabledata));
	 	if($this->db->affected_rows() > 0){
	 		return true;
	 	}else{
	 		return false;
	 	}
	}

	function update_reservation($id, $table, $tabledata){

		$this->db->where('RCode', $id);
	 	$this->db->update($table, $this->insert_mode($tabledata));
	 	if($this->db->affected_rows() > 0){
	 		return true;
	 	}else{
	 		return false;
	 	}
	}

	 public function updateIcon($table,$data,$where){

	 	$this->db->where($where);
	 	$this->db->update($table, $data);
	 	if($this->db->affected_rows() > 0){
	 		return true;
	 	}else{
	 		return false;
	 	}

	 }

	function update_client($where, $table){

		$data = array('E_confirm' => 1);
		$this->db->where($where);
	 	$this->db->update($table, $data);
	 	if($this->db->affected_rows() > 0){
	  		return true;
	 	}else{
	 		return false;
	 	}
	}

	function update_client_reservation($where, $table, $tbldata){

		$this->db->where($where);
	 	$this->db->update($table, $this->insert_mode($tbldata));
	 	if($this->db->affected_rows() > 0){
	  		return true;
	 	}else{
	 		return false;
	 	}
	}

	function update_table($where, $table, $tbldata){
		
		$this->db->where($where);
	 	$this->db->update($table, $tbldata);
	 	if($this->db->affected_rows() > 0){
	  		return true;
	 	}else{
	 		return false;
	 	}
	}

	function update_user_mgmt($where, $table, $tbldata){

		$this->db->where($where);
	 	$this->db->update($table, $this->insert_mode($tbldata));
	 	if($this->db->affected_rows() > 0){
	  		return true;
	 	}else{
	 		return false;
	 	}
	}

	function uploadmultiplefile($table,$tabledata){

    	$this->db->insert($table, $tabledata);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function delete($id, $table){

	 	$this->db->where('id', $id);
	 	$this->db->delete($table);
	 	if($this->db->affected_rows() > 0){
	 		return true;
	 	}else{
	 		return false; 
	 	}
	}

	function reserved_details($table, $tbdata){

		$this->db->insert_batch($table, $this->insert_mode($tbdata));
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	function create_notification($mess){

		$this->db->insert('notification', $mess);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	private function insert_mode($tabledata){
      
	     switch ($tabledata) {
	     	case 'CSdata':
	     		$cs_Code = $this->generateID('tblcustomer', 'CS-');
	     		//$rs_Code = $this->generateRsID('tblcustomer', 'HETR'.date('ymd'));
	     		// $entry_code = $this->generateEntryCode();
	     		$entry_code = $this->input->get('token');
	     		$getcaptcha = trim($this->input->get('g-recaptcha-response'));
	     		$captcha = md5($getcaptcha);
	     		$brgy = $this->input->get('cs_brgy_txt');
	     		$city = $this->input->get('cs_city_txt');
	     		$province = $this->input->get('cs_province_txt');
	     		$address = 'Brgy. '.$brgy.', '.$city.' '.$province;
	     		$email = $this->input->get('cs_email');
	     		$pass = $this->input->get('cs_pass');
                $encrypass = hash_hmac('sha256', $email, $pass);

	     		$setdata = array(
					'CustomerId' => $cs_Code,
					'Firstname' => $this->input->get('cs_fname'),
					'LastName' => $this->input->get('cs_lname'),
					'Middlename' => $this->input->get('cs_mname'),
					'Company' => $this->input->get('cs_company_name'),
					'Address' => $address,
					'Brgy' => $this->input->get('cs_brgy'),
					'City' => $this->input->get('cs_city'),
					'Province' => $this->input->get('cs_province'),
					'Provicial_code' => $this->input->get('cs_province_code'),
					'Entry_code' => $entry_code,
					'Captcha_code' => $captcha,
					'Mobile' => $this->input->get('cs_company_mobile'),
					'TelNo' => $this->input->get('cs_company_tel'),
					'Email' => $email,
					'pass' => $encrypass,
					'E_confirm' => 0,
					'date_created' => date('D, d F Y, h:i A')
					);

				  $sendMail = $this->send_email($entry_code, $captcha);
				  if($sendMail){
					  // 	 $rs_data = array(
							// 'RCode' => $rs_Code,
							// 'EntryCode' => $entry_code,
							// 'CustomerId' => $cs_Code
						 //  );
				   //    $this->db->insert('tbldatetime', $rs_data);
			         return $setdata;
				  }else{
				  	$msg = "Having problem in sending email verification. Please try again.";
				  	return $msg;
				  }
	     		break;
	     	case 'update_payment_balance':
	     	     $modeOfPayments = $this->input->get('pay_modeofpayment');
	     	     if($modeOfPayments == 0){
	     	     	$setdata = array(
	     	     	  'invoice' => $this->input->get('Or_pay'),
	     	     	  'RCode' => $this->input->get('rs-down-id'),
	     	     	  'Totalbill' => $this->input->get('rs-down-totalbill'),
	     	     	  'Balance' => $this->input->get('rs-down-newbal'),
	     	     	  'Cash' => $this->input->get('pay_payment'),
	     	     	  '_Change' => $this->input->get('pay_change'),
	     	     	  'mop' => $this->input->get('pay_modeofpayment'),
	     	     	  'dueDate' => date('D, d F Y, h:i A'),
	     	     	  'date_created' => date('D, d F Y, h:i A'),
					  'CustomerID' => $this->input->get('rs-down-csid')
				    );
				    return $setdata;
	     	     }else{
	     	     	$setdata = array(
	     	     	  'invoice' => $this->input->get('Or_pay'),
	     	     	  'RCode' => $this->input->get('rs-down-id'),
	     	     	  'Totalbill' => $this->input->get('rs-down-totalbill'),
	     	     	  'Balance' => $this->input->get('rs-down-newbal'),
	     	     	  'dueDate' => date('D, d F Y, h:i A'),
	     	     	  'date_created' => date('D, d F Y, h:i A'),
	     	     	  'Cash' => $this->input->get('pay_payment'),
	     	     	  '_Change' => $this->input->get('pay_change'),
	     	     	  'mop' => $this->input->get('pay_modeofpayment'),
					  'CustomerID' => $this->input->get('rs-down-csid'),
					  'bank_name' => $this->input->get('pay_bank_name'),
					  'acc_number' => $this->input->get('cc_number'),
					  'acc_name' => $this->input->get('pay_acc_name')
				   );
				    return $setdata;
	     	     }
	     		break;
	     	case 'reschedule_reservation_data':
	     		 $setdata = array(
					'CheckIn' => $this->input->post('rs_date'),
					'NDays' => $this->input->post('rs_days'),
					'Status' => 'Pending',
					'statusCode' => 0,
					'updated_at' => date('D, d F Y, h:i A')
				 );
				 return $setdata;
	     		break;
	     	case 'cancel_reservation_data':
	     		 $setdata = array(
					'Status' => 'Cancelled',
					'statusCode' => 4,
					'updated_at' => date('D, d F Y, h:i A')
				 );
				 return $setdata;
	     		break;
	     	case 'update_payment_ispaid':
	     		 $setdata = array(
					'ispaid' => 1,
					'updated_at' => date('D, d F Y, h:i A')
				 );
				 return $setdata;
	     		break;
	     	case 'update_reservation_status':
	     		 $setdata = array(
					'Status' => $this->input->get('status'),
					'statusCode' => 1,
					'updated_at' => date('D, d F Y, h:i A')
				 );
				 return $setdata;
	     		break;
	     	case 'update_confirmed_reservation':
	     		 $setdata = array(
	     		 	'statusCode' => 2,
	     		 	'Status' => $this->input->get('status'),
					'TimeIn' => $this->input->get('confirmed_time')
				 );
				 return $setdata;
	     		break;
	     	case 'cancel-accomodation':
	     		 $setdata = array(
					'Status' => 'Re-Schedule',
					'statusCode' => 3
				 );
				 return $setdata;
	     		break;
	     	case 'update-user-mgmt-data':
	     		 $setdata = array(
	     		 	'first_name' => $this->input->post("user_fname"),
	     		 	'last_name' => $this->input->post("user_lname"),
	     		 	'middle_name' => $this->input->post("user_mname"),
	     		 	'email' => $this->input->post("user_email"),
					'password' => md5($this->input->post("user_confirm_pass")),
					'account_type' => $this->input->post("user_role"),
					'updated_at' => date('D, d F Y, h:i A')
				 );
				 return $setdata;
	     		break;
	     	case 'resched-reservation':
	     		 $setdata = array(
					'CheckIn' => $this->input->get('rs_date'),
					'NDays' => $this->input->get('rs_days')
				 );
				 return $setdata;
	     		break;
	     	case 'checkout_update_status':
	     	        $statCode = 2;
	     	          if($_POST["chkout_status"] == 'Finished'){
	     	          	  $statCode = 5;
	     	          }
				  	  $setdata = array(
							'Status' => $_POST["chkout_status"],
							'statusCode' => $statCode,
							'updated_at' => date('D, d F Y, h:i A')
					  );
			  		return $setdata;
	     		break;
	     	case 'checkout_date_time':
				  	  $setdata = array(
							'CheckOut' => date('m-d-Y'),
							'TimeOut' => date('H:i'),
							'Status' => $_POST["chkout_status"],
							'statusCode' => 5,
							'updated_at' => date('D, d F Y, h:i A')
					  );
			  		return $setdata;
	     		break;
	     	case 'checkout_reservation_payment':
	     			$invoice = $this->generateID('tblpayment','');

	     		    $createReservedDetails = $this->create_reserved_details($_POST["RCode"], $invoice);
	     		    if($createReservedDetails){
	     		    	$totalbill = $this->computeTotalbill($_POST["RCode"]);
		     			$_SESSION["invoice_for_checkout"] = $invoice;
				  		$setdata = array(
		     	     	  'invoice' => $invoice,
		     	     	  'RCode' => $_POST["RCode"],
		     	     	  'Totalbill' => $totalbill,
		     	     	  'Balance' => 0,
		     	     	  'date_created' => date('D, d F Y, h:i A'),
		     	     	  'dueDate' => date('D, d F Y, h:i A'),
		     	     	  'Cash' => $_POST["chkout_cash"],
		     	     	  '_Change' => $_POST["chkout_change"],
		     	     	  'mop' => $_POST["pay_MOP_chkout"],
		     	     	  'ispaid' => 0,
						  'CustomerID' => $_POST["CustomerId"],
						  'bank_name' => $_POST["pay_bank_name_chkout"],
						  'acc_number' => $_POST["cc_number_chkout"],
						  'acc_name' => $_POST["pay_acc_name_chkout"]
					   );
					    return $setdata;
	     		    }else{
	     		    	return false;
	     		    }
	     		break;
	     	case 'reservation-create-reserved':
			  		$dataArr = array(
			  			  'invoice' => $_POST["invoice"],
			  			  'RCode' => $_POST["RCode"],
			  			  'CsCode' => $_POST["CsCode"],
			  			  'rs_days' => $_POST["rs_days"],
			  			  'rs_id' => $_POST["rs_id"],
			  			  'rs_package' => $_POST["rs_package"],
			  			  'rs_description' => $_POST["rs_description"],
			  			  'rs_price' => $_POST["rs_price"],
			  			  'rs_status' => 'Active',
			  			  'date_created' => date('D, d F Y, h:i A')
			  		   );
			  		return $dataArr;
	     		break;
	     	case 'additional_reserved_details':
	     	        $invoice = $this->generateID('tblpayment','');
	     			$_SESSION["invoice_for_checkout"] = $invoice;
			  		$dataArr = array(
			  			  'invoice' => $invoice,
			  			  'RCode' => $_POST["RCode"],
			  			  'CsCode' => $_POST["CustomerId"],
			  			  'rs_days' => $_POST["rs_days"],
			  			  'rs_id' => $_POST["rs_id"],
			  			  'rs_package' => $_POST["rs_package"],
			  			  'rs_description' => $_POST["rs_description"],
			  			  'rs_price' => $_POST["rs_price"],
			  			  'rs_status' => 'Active',
			  			  'date_created' => date('D, d F Y, h:i A')
			  		   );
			  		return $dataArr;
	     		break;
	     	case 'additional_reservation_payment':
	     			$totalbill = $this->computeTotalbill($_POST["RCode"]);
			  		$setdata = array(
	     	     	  'invoice' => $_SESSION["invoice_for_checkout"],
	     	     	  'RCode' => $_POST["RCode"],
	     	     	  'Totalbill' => $totalbill + $_POST["additional-amount"],
	     	     	  'Balance' => 0,
	     	     	  'date_created' => date('D, d F Y, h:i A'),
	     	     	  'dueDate' => $_POST["date_created"],
	     	     	  'Cash' => $_POST["additional-pckgs-payment"],
	     	     	  '_Change' => $_POST["additional-pckgs-change"],
	     	     	  'mop' => $_POST["pay_modeofpayment"],
	     	     	  'ispaid' => 0,
					  'CustomerID' => $_POST["CustomerId"],
					  'bank_name' => $_POST["pay_bank_name"],
					  'acc_number' => $_POST["cc_number"],
					  'acc_name' => $_POST["pay_acc_name"]
				   );
				    return $setdata;
	     		break;
	     	case 'reservationdatetime':
		     	  $formdata = $_GET["dataA"];
				  	foreach ($formdata as $key => $value) {
				  		if($value["name"] == 'rs_date'){
				  		   $rs_date = $value["value"];
				  		}elseif ($value["name"] == 'rs_time') {
				  		   $rs_time = $value["value"];
				  		}elseif ($value["name"] == 'rs_guest') {
				  		   $rs_guest = $value["value"];
				  		}elseif ($value["name"] == 'rs_excess') {
				  		   $rs_excess = $value["value"];
				  		}elseif ($value["name"] == 'rs_occasion') {
				  		   $rs_occasion = $value["value"];
				  		}elseif ($value["name"] == 'rs_message') {
				  		   $rs_message = $value["value"];
				  		}elseif ($value["name"] == 'rs_days') {
				  		   $rs_ndays = $value["value"];
				  		}
				  	}
	     		$setdata = array(
	     			'RCode' => $_SESSION["reservation"],
					'EntryCode' => $_SESSION["token"],
					'CustomerId' => $_SESSION["customerId"],
					'CheckIn' => $rs_date,
					'TimeIn' => $rs_time,
					'NPerson' => $rs_guest,
					'NDays' => $rs_ndays,
					'excess' => $rs_excess,
					'RType' => $rs_occasion,
					'Note' => $rs_message,
					'datetime' => date('D, d F Y, h:i A'),
					'modeofpayment' => $_GET["modeOfPay"],
					'Status' => 'Pending',
					'statusCode' => 0
					);
				   return $setdata;
	     		break;
	     	case 'reserved_details':

				  	$invoice = $this->generateID('tblpayment','');
				  	$_SESSION["payment_summary_invoice"] = $invoice;

	     		    $JSONdata = $_GET["dataB"];
			  		$arrObj = json_decode($JSONdata, true);

			  		foreach ($arrObj as $key => $value) {
			  			$dataArr[] = array(
			  			  'invoice' => $invoice,
			  			  'RCode' => $_SESSION["reservation"],
			  			  'CsCode' => $_SESSION["customerId"],
			  			  'rs_days' => $value["days"],
			  			  'rs_id' => $value["id"],
			  			  'rs_package' => $value["package"],
			  			  'rs_description' => $value["desc"],
			  			  'rs_price' => $value["price"],
			  			  'rs_status' => 'Active',
			  			  'date_created' => date('D, d F Y, h:i A')
			  			);
			  		}
			  		return $dataArr;
	     		break;
	     	case 'payment_summary':
				  	$amount = $_GET["amount"];
		  			$dataArr = array(
					  'invoice' => $_SESSION["payment_summary_invoice"],
		  			  'RCode' => $_SESSION["reservation"],
		  			  'Totalbill' => $amount,
		  			  'Balance' => $amount,
		  			  'dueDate' => $_GET["date"],
		  			  'CustomerID' => $_SESSION["customerId"],
		  			  'date_created' => date('D, d F Y, h:i A')
		  			);
			  		return $dataArr;
	     		break;
	     	case 'emailconfirm':
	     		$setdata = array(
					'E_confirm' => 1
					);
				   return $setdata;
	     		break;
	     	case 'new_reservation_code':
	     		$setdata = array(
					'RCode' => $_SESSION["reservation"]
					);
				   return $setdata;
	     		break;
	     	case 'maintenance':
		     	     $mode = $this->uri->segment(5);
		     	     if($mode == 'company_name'){
		     	     	$setdata = array(
						'company_name' => $this->input->get('company_name')
						);
					   return $setdata;
					}elseif($mode == 'company_mission'){
		     	     	$setdata = array(
						'company_mission' => $this->input->get('company_mission')
						);
					   return $setdata;
					}elseif($mode == 'company_vision'){
		     	     	$setdata = array(
						'company_vision' => $this->input->get('compose_vision')
						);
					   return $setdata;
					}elseif($mode == 'company_about'){
		     	     	$setdata = array(
						'company_about' => $this->input->get('company_about')
						);
					   return $setdata;
					}elseif($mode == 'company_history'){
		     	     	$setdata = array(
						'company_history' => $this->input->get('company_history')
						);
					   return $setdata;
					}elseif($mode == 'company_footertxt'){
		     	     	$setdata = array(
						'company_footertxt' => $this->input->get('company_footertxt')
						);
					   return $setdata;
					}elseif($mode == 'company_address'){
		     	     	$setdata = array(
						'company_address' => $this->input->get('company_address')
						);
					   return $setdata;
					}elseif($mode == 'terms_and_conditions'){
		     	     	$setdata = array(
						'company_termsAndconditions' => $this->input->get('company_terms_conditions')
						);
					   return $setdata;
					}elseif($mode == 'company_no'){
		     	     	$setdata = array(
						'company_no' => $this->input->get('company_no')
						);
					   return $setdata;
					}elseif($mode == 'company_tel'){
		     	     	$setdata = array(
						'company_tel' => $this->input->get('company_tel')
						);
					   return $setdata;
					}elseif($mode == 'company_email'){
		     	     	$setdata = array(
						'company_email' => $this->input->get('company_email')
						);
					   return $setdata;
					}elseif($mode == 'company_fbpage'){
		     	     	$setdata = array(
						'company_fbpage' => $this->input->get('company_fbpage')
						);
					   return $setdata;
					}elseif($mode == 'company_fb'){
		     	     	$setdata = array(
						'company_fb' => $this->input->get('company_fb')
						);
					   return $setdata;
					}

	     		break;
	     	case 'create-category':
	     			$setdata = array(
	     			'mode' => $this->input->get('company_cat_mode'),
					'Category_Id' => $this->input->get('category_id'),
					'parent_id' => $this->input->get('category_id'),
					'Category_title' => $this->input->get('company_cat_title'),
					'Category_desc' => $this->input->get('company_cat_desc'),
					'status' => 'Active'
					);
				   return $setdata;
	     		break;
	     	case 'create-sub-category':
	     			$setdata = array(
					'parent_id' => $this->input->post('category_id'),
					'Category_title' => $this->input->post('company_sub_cat_title'),
					'sub_category_id' => $this->input->post('sub_cat_id'),
					'price' => $this->input->post('company_sub_cat_price'),
					'capacity' => $this->input->post('company_sub_cat_cap'),
					'Category_desc' => $this->input->post('company_sub_cat_desc'),
					'status' => 'Active'
					);
				   return $setdata;
	     		break;
	     	case 'edit_category_data':
	     			$setdata = array(
	     			'Category_Id' => $this->input->get('category_id'),
					'Category_title' => $this->input->get('company_cat_title'),
					'Category_desc' => $this->input->get('company_cat_desc'),
					'status' => $this->input->get('category_status')
					);
				   return $setdata;
	     		break;
	      }	
	}

	function create_reserved_details($code, $or){

		$query = "SELECT * FROM `reserved_details` WHERE RCode = '".$code."' GROUP BY RCode";
		$res = $this->db->query($query);
		if($res->num_rows() > 0){
			$data = $res->result();

			$getdata = array(
				'invoice' => $or,
				'RCode' => $code,
				'CsCode' => $data[0]->CsCode,
				'rs_days' => $data[0]->rs_days,
				'rs_id' => $data[0]->rs_id,
				'rs_package' => $data[0]->rs_package,
				'rs_description' => $data[0]->rs_description,
				'rs_price' => $data[0]->rs_price,
				'rs_status' => $data[0]->rs_status,
				'date_created' => date('D, d F Y, h:i A') 
			);

			$this->db->insert('reserved_details', $getdata);
			if($this->db->affected_rows() > 0){
				return true;
			}else{        
				return false;
			}
		}else{
			return false;
		}
	}

	function resched_autoLog_in($entry){
		$where = "Entry_code = '".$entry."'";
		$this->db->select('Email, pass');
		$this->db->where($where);
		$query = $this->db->get('tblcustomer');
		if($query->num_rows() > 0){
			return $query->row_array();
		}else{
			return false;
		}
	}

	function computeTotalbill($rsid){

		$q = "SELECT `Totalbill`, `Balance` FROM `tblpayment` WHERE `RCode` = '".$rsid."'";
		$query = $this->db->query($q);

		if($query->num_rows() > 0){
			
			$data = $query->result();

			$comp = 0;
			foreach ($data as $key => $value) {
				
				if($value->Totalbill != $value->Balance){
                   $comp = $value->Totalbill + $comp;
				}
			}
			return $comp;
		}else{
			return 0;
		}
	}

	function generateID($tbl,$type){

		$query = $this->db->get($tbl);
		$count = $query->num_rows() + 1;
		if($count <= 9 ){
			return $type.'000000'.$count;
		}else if($count <= 99){
			return $type.'00000'.$count;
		}else if($count <= 999){
			return $type.'0000'.$count;
		}else if($count <= 9999){
			return $type.'000'.$count;
		}else if($count <= 99999){
			return $type.'00'.$count;
		}else if($count <= 999999){
			return $type.'0'.$count;
		}else if($count <= 9999999){
			return $type.$count;
		}else{
			return $type.'-'.'0000001';
		}
	}

	function generateRsID($tbl,$type){

		$query = $this->db->get($tbl);
		$rand = $this->generateRandomString();
		$count = $query->num_rows();
			return $type.$count.$rand;
	}

	function generateRandomString($length=5) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	     return $randomString;
	}

	function generateEntryCode($length=10) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	     return $randomString;
	}

	function send_email($entry_code, $captcha_code){

		$email = $this->input->get('cs_email');
		$message = '<p>You`re on your way! Let`s confirm your email address</p><br><p><h5>By clicking the confirm button below, you are confirming your email address.</h5></p><br>
			<table width="100%" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table cellspacing="0" cellpadding="0">
							<tr>
								<td bgcolor="#ED2939" style="border-radius: 2px;">
								  <a class="link" href="'.base_url().'Client/confirmation/'.$entry_code.'/'.$captcha_code.'" target="_blank" style="
								        padding: 8px 12px;
										border: 1px solid #ED2939;
										border-radius: 2px;
										font-family: Helvetica, Arial, sans-serif;
										font-size: 14px;
										color: #ffffff;
										text-decoration: none;
										font-weight: bold;
										display: inline-block;
								       ">
								  	 Confirm this email address
								  </a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table><br>
			 If this button doesn`t work, click or copy this link:<br>
			 '.base_url().'Client/confirmation/'.$entry_code.'/'.$captcha_code.'
			';
		$this->email->set_mailtype("html");
		$this->email->from('hoyoecoresort@gmail.com', 'Hoyoland Eco-Tropical Resort');
		$this->email->to($email);
		$this->email->subject('Confirm your email address.');
		$emailContent = '<!DOCTYPE><html><head></head><body>';
	    $emailContent .= $message;
	    $emailContent .= '</body></html>';
	    
	    $this->email->message($emailContent);
        $result = $this->email->send();
		if($result){
			return true; 
		}
		return false;
	}

}
?>