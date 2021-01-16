<?php  
class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		// if(!$this->session->islogged){
		// 	redirect('login');
		// }else if($this->session->user_lvl==2){
		// 	redirect('home');
		// }
		date_default_timezone_set('Asia/Manila');
		if($this->session->userdata('user_type') != 1 && $this->session->userdata('user_type') != 2){
            redirect('login/logout');
        }
        // $this->load->model('Audit_model', 'audit_trail');
	}
	function index(){

		$data['title'] = 'Hoyoland Resort | Dashboard';

		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['pending'] = $this->Admin_model->admin_read('admin-dashboard','0','status_reserved');
		$data['approved'] = $this->Admin_model->admin_read('admin-dashboard','1','status_reserved');
		$data['check_in'] = $this->Admin_model->admin_read('admin-dashboard','2','status_reserved');
		$data['finished'] = $this->Admin_model->admin_read('admin-dashboard','5','status_reserved');
		$data['cancelled'] = $this->Admin_model->admin_read('admin-dashboard','4','status_reserved');

		$data['dataArr'] = array('drpActv' => 1.0, 'actv'  => 1);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/home', $data);
		$this->load->view('admin/template/footer');
	}

	// function reservation($mode){

	// 	switch ($mode) {
	// 		case 'walk-in':
	// 		    $data['title'] = 'Reservation | Walk-In';
	// 		    $data['dataArr'] = array('drpActv' => 2.0,'actv'  => 2.1);
	// 			$this->load->view('admin/template/header', $data);
	// 			$this->load->view('admin/template/navbar');
	// 			$this->load->view('admin/template/aside');
	// 			$this->load->view('admin/reservation/walk-in');
	// 			$this->load->view('admin/template/footer');
	// 			break;
	// 		case 'family':
	// 			$data['title'] = "Reservation | Family";
	// 			 $data['dataArr'] = array('drpActv' => 2.0,'actv'  => 2.2);
	// 			$this->load->view('admin/template/header', $data);
	// 			$this->load->view('admin/template/navbar');
	// 			$this->load->view('admin/template/aside');
	// 			$this->load->view('admin/reservation/family');
	// 			$this->load->view('admin/template/footer');
	// 			break;
	// 		case 'group':
	// 			$data['title'] = "Reservation | Group";
	// 			 $data['dataArr'] = array('drpActv' => 2.0,'actv'  => 2.3);
	// 			$this->load->view('admin/template/header', $data);
	// 			$this->load->view('admin/template/navbar');
	// 			$this->load->view('admin/template/aside');
	// 			$this->load->view('admin/reservation/group');
	// 			$this->load->view('admin/template/footer');
	// 			break;
	// 		default:
	// 			$data['title'] = "Hoyoland Resort | Home";
	// 			$data['dataArr'] = array('drpActv' => 1.0, 'actv'  => 1);
	// 			$this->load->view('admin/template/header', $data);
	// 			$this->load->view('admin/template/navbar');
	// 			$this->load->view('admin/template/aside');
	// 			$this->load->view('admin/home');
	// 			$this->load->view('admin/template/footer');
	// 			break;
	// 	}
	// }

	function reservation($mode){
			$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');

		switch ($mode) {

			case 'pending':
				$data['title'] = "Reservation | Pending";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.1);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/pending');
				$this->load->view('admin/template/footer');
				break;
			case 'confirmed':
				$data['title'] = "Reservation | Confirmed";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.2);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/approved');
				$this->load->view('admin/template/footer');
				break;
			case 'check-in':
				$data['title'] = "Reservation | Check-In";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.3);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/check-in');
				$this->load->view('admin/template/footer');
				break;
			case 'finished':
				$data['title'] = "Reservation | Finished";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.4);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/finished');
				$this->load->view('admin/template/footer');
				break;
			case 'cancelled':
				$data['title'] = "Reservation | Cancelled";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.5);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/cancelled');
				$this->load->view('admin/template/footer');
				break;
			case 'all':
				$data['title'] = "Reservation | All";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.6);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/all');
				$this->load->view('admin/template/footer');
				break;
			case 'invoice':
				$data['title'] = "Reservation | Invoice";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 0);

				$arr = $this->uri->uri_to_assoc(3);
				$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');

				if(isset($arr["invoice"]) && isset($arr["or"]) && isset($arr["pending"]) && $arr["pending"]){

					$RSID = "RCode = '".$arr["invoice"]."'";
					$whereRes = "RCode = '".$arr["invoice"]."' AND invoice = '".$arr["or"]."'";
					$OR = "invoice = '".$arr["or"]."' AND ispaid = 0";

					$data['issue_invoice'] = $this->Admin_model->admin_read('admin-dashboard', $OR ,'issue_invoice');
					$data['res_details'] = $this->Admin_model->admin_read('admin-dashboard', $whereRes ,'read_res_details');
					$data['reservation_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'reservation_info');
					$data['client_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'client_info');

				    $this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/lists/invoice');
					$this->load->view('admin/template/footer');

				}elseif (isset($arr["invoice"]) && isset($_SESSION["invoice_for_checkout"]) && isset($arr["additional"]) && $arr["additional"]) {

					$RSID = "RCode = '".$arr["invoice"]."'";
					$whereRes = "RCode = '".$arr["invoice"]."' AND invoice = '".$_SESSION["invoice_for_checkout"]."'";
					$OR = "invoice = '".$_SESSION["invoice_for_checkout"]."'";

					$data['issue_invoice'] = $this->Admin_model->admin_read('admin-dashboard', $OR ,'issue_invoice');
					$data['res_details'] = $this->Admin_model->admin_read('admin-dashboard', $whereRes ,'read_res_details');
					$data['reservation_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'reservation_info');
					$data['client_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'client_info');

				    $this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/lists/invoice');
					$this->load->view('admin/template/footer');

				}elseif (isset($arr["invoice"]) && isset($arr["checkout"]) && $arr["checkout"]) {

					$RSID = "RCode = '".$arr["invoice"]."'";

					$getPaymentInfo = $this->Admin_model->admin_read('view-information', $RSID, 'tblpayment');
		                     //print_r($getResInfo);
		                     if($getPaymentInfo){
		                     	   $data["invoiceDetails"] = '';

		                     	foreach ($getPaymentInfo as $key => $value) {
		                     	 $whereInvoice = "invoice = '".$value->invoice."'";
		                     		$getReservationInfo = $this->Admin_model->admin_read('view-information', $whereInvoice, 'reserved_details');
		                     		 if($getReservationInfo){

		                     		 	$details = '';
		                     		 	$payment = '<div class="callout callout-info col-lg-6 invoice-col">
						                            <h5>Payment Details</h5>
						                            <p><strong>Total due:&nbsp; PHP </strong>'.number_format($value->Totalbill, 2).'</p>
						                            <p><strong>Cash:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHP </strong>'.number_format($value->Cash, 2).'</p>
						                            <p><strong>Change:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHP </strong>'.number_format($value->_Change, 2).'</p>
						                            <p><strong>Balance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHP </strong>'.number_format($value->Balance, 2).'</p>
						                            <p><strong>Date Generated: </strong>'.$value->date_created.'</p>
						                        </div>';

		                     		 	   foreach ($getReservationInfo as $key => $val) {
		                     		 	      $details .= '<p><strong>Package: </strong>&nbsp;&nbsp;'.$val->rs_package.'</p>
						                            <p><strong>Price:&nbsp; PHP </strong>'.number_format($val->rs_price, 2).'</p>
						                            <p><strong>Day(s): </strong>&nbsp;&nbsp;'.$val->rs_days.'</p>';
		                     		 	   }

		                     		 	$data["invoiceDetails"] .= '<div class="card card-default">
						                      <div class="card-header">
						                         <div class="alert" style="background-color: #40b6f9;color: white">
                                                      <p>&nbsp;&nbsp; Invoice No: '.$value->invoice.'</p> 
                                                  </div>
						                      </div>
						                      <div class="card-body">
						                        <div class="row">
							                      	<div class="callout callout-info col-lg-6">
							                            <h5>Package Details</h5>
							                        '.$details.'
							                        </div>
							                        '.$payment.'
							                        </div>
						                       </div>
						                  </div>';
		                     		 }else{

		                     		$data["invoiceDetails"] .= '<div class="card card-default">
						                    <div class="card-body">
		                     		 	   <div class="callout callout-info">
                                             <h5>No Invoice Found.</h5>
                                         </div>
                                        </div>
                                      </div>';
		                     		 	
		                     		 }
		                     	}
		                     }
						// }else{
						// 	redirect('home/index');
						// }

					//$data['issue_invoice'] = $this->Admin_model->admin_read('admin-dashboard', $OR ,'issue_invoice');
					//$data['res_details'] = $this->Admin_model->admin_read('admin-dashboard', $whereRes ,'read_res_details');
					$data['reservation_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'reservation_info');
					$data['client_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'client_info');

				    $this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/lists/checkout-invoice');
					$this->load->view('admin/template/footer');

				}elseif (isset($arr["invoice"]) && isset($arr["or"]) && isset($arr["view"]) && $arr["view"]) {

					$RSID = "RCode = '".$arr["invoice"]."'";
					$whereRes = "RCode = '".$arr["invoice"]."' AND invoice = '".$arr["or"]."'";
					$OR = "invoice = '".$arr["or"]."'";

					$data['issue_invoice'] = $this->Admin_model->admin_read('admin-dashboard', $OR ,'issue_invoice');
					$data['res_details'] = $this->Admin_model->admin_read('admin-dashboard', $whereRes ,'read_res_details');
					$data['reservation_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'reservation_info');
					$data['client_info'] = $this->Admin_model->admin_read('admin-dashboard', $RSID ,'client_info');

				    $this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/lists/invoice');
					$this->load->view('admin/template/footer');
				}
				// if(isset($arr["invoice"]) && isset($arr["or"]) && isset($arr["payment"]) && $arr["payment"]){
				

				

				// }elseif (isset($arr["invoice"]) && isset($_SESSION["invoice_for_checkout"]) && isset($arr["additional"]) && $arr["additional"]) {
				// 	$RSID = "RCode = '".$arr["invoice"]."'";
				//     $OR = "invoice = '".$_SESSION["invoice_for_checkout"]."' AND ispaid = 0";
				// }elseif (isset($arr["invoice"]) && isset($arr["checkout"]) && $arr["checkout"]) {
				// 	$RSID = "RCode = '".$arr["invoice"]."'";
				// 	$OR = "invoice = '".$arr["invoice"]."' AND ispaid = 0";
				// }elseif(isset($arr["invoice"]) && isset($arr["or"]) && isset($arr["view"]) && $arr["view"]){
				// 	$RSID = "RCode = '".$arr["invoice"]."'";
				// 	$OR = "invoice = '".$arr["or"]."'";
				// }else{
				// 	//redirect('home/index');
				// }

			  
			    //$getPaymentInfo = $this->Admin_model->admin_read('view-information', $RSID, 'tblpayment');
 			    
                 
				

				 //print_r($getPaymentInfo);
				
				break;
			case 'view-info':
				$data['title'] = "Reservation | View Page";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 0);

				$csID = $this->uri->segment(4);
				
				if($csID != NULL){

				    $whereCSid = "CustomerId = '".$csID."'";
					$getClientInfo = $this->Admin_model->admin_read('view-information', $whereCSid, 'tblcustomer');
					if($getClientInfo){
						$data["csinfo"] = $getClientInfo;

						$whereRSid = "RCode = '".$getClientInfo[0]->RCode."'";
						$getResInfo = $this->Admin_model->admin_read('view-information', $whereRSid, 'tbldatetime');
						if($getResInfo){
							//print_r($getResInfo[0]->CheckIn);
							 $data["resInfo"] = $getResInfo;
							 $in = DateTime::createFromFormat('m-d-Y H:i', $getResInfo[0]->CheckIn.' '.$getResInfo[0]->TimeIn);
		                       $data["formatCheckin"] = $in->format('D, d F Y, h:i A');
		                     if($getResInfo[0]->CheckOut != NULL){
		                     	$out = DateTime::createFromFormat('m-d-Y H:i', $getResInfo[0]->CheckOut.' '.$getResInfo[0]->TimeOut);
		                        $data["formatCheckOut"] = $out->format('D, d F Y, h:i A');
		                     }

		                     $getPaymentInfo = $this->Admin_model->admin_read('view-information', $whereRSid, 'tblpayment');
		                     //print_r($getResInfo);
		                     if($getPaymentInfo){
		                     	   $data["invoiceDetails"] = '';

		                     	foreach ($getPaymentInfo as $key => $value) {
		                     	 $whereInvoice = "invoice = '".$value->invoice."'";
		                     		$getReservationInfo = $this->Admin_model->admin_read('view-information', $whereInvoice, 'reserved_details');
		                     		 if($getReservationInfo){

		                     		 	$details = '';
		                     		 	$payment = '<div class="callout callout-info col-lg-6">
						                            <h5>Payment Details</h5>
						                            <p><strong>Total due:&nbsp; PHP </strong>'.number_format($value->Totalbill, 2).'</p>
						                            <p><strong>Cash:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHP </strong>'.number_format($value->Cash, 2).'</p>
						                            <p><strong>Change:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHP </strong>'.number_format($value->_Change, 2).'</p>
						                            <p><strong>Balance:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PHP </strong>'.number_format($value->Balance, 2).'</p>
						                            <p><strong>Date Generated: </strong>'.$value->date_created.'</p>
						                        </div>';

		                     		 	   foreach ($getReservationInfo as $key => $val) {
		                     		 	      $details .= '<p><strong>Package: </strong>&nbsp;&nbsp;'.$val->rs_package.'</p>
						                            <p><strong>Price:&nbsp; PHP </strong>'.number_format($val->rs_price, 2).'</p>
						                            <p><strong>Day(s): </strong>&nbsp;&nbsp;'.$val->rs_days.'</p>';
		                     		 	   }

		                     		 	$data["invoiceDetails"] .= '<div class="card card-default">
						                      <div class="card-header">
						                         <div class="alert" style="background-color: #40b6f9;color: white">
                                                      <p>&nbsp;&nbsp; Invoice No: '.$value->invoice.'</p> 
                                                  </div>
						                      </div>
						                      <div class="card-body">
						                        <div class="row">
							                      	<div class="callout callout-info col-lg-6">
							                            <h5>Package Details</h5>
							                        '.$details.'
							                        </div>
							                        '.$payment.'
							                        </div>
						                       </div>
						                       <div class="card-footer">
						                         <a href="'.base_url().'home/reservation/invoice/'.$getClientInfo[0]->RCode.'/or/'.$value->invoice.'/view/true" class="btn btn-success float-right"><i class="fas fa-print"></i></a>
						                       </div>
						                  </div>';
		                     		 }else{

		                     		$data["invoiceDetails"] .= '<div class="card card-default">
						                    <div class="card-body">
		                     		 	   <div class="callout callout-info">
                                             <h5>No Invoice Found.</h5>
                                         </div>
                                        </div>
                                      </div>';
		                     		 	
		                     		 }
		                     	}
		                     }
						}else{
							redirect('home/index');
						}
					}else{
					   redirect('home/index');
					}
				}else{
					redirect('home/index');
				}
				
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/view-page');
				$this->load->view('admin/template/footer');
				break;
			default:
				redirect('Home/index');
				break;
		}
	}

	function cottages(){

		$data['title'] = "Hoyoland Resort | Cottages";

		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 4.0, 'actv'  => 4);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/cottages');
		$this->load->view('admin/template/footer');
    }

	function amenities(){

		$data['title'] = "Hoyoland Resort | Amenities";
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 5.0, 'actv'  => 5);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/amenities');
		$this->load->view('admin/template/footer');
	}

	function packages($mode){

		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');

		switch ($mode) {
			case 'tour-packages':
				$data['title'] = "Packages | Tour-Packages";
				$data['dataArr'] = array('drpActv' => 6.0, 'actv'  => 6.1);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/packages/tour-packages');
				$this->load->view('admin/template/footer');
				break;
			case 'day-tour':
				$data['title'] = "Packages | Day-Tour";
				$data['dataArr'] = array('drpActv' => 6.0, 'actv'  => 6.2);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/packages/day-tour');
				$this->load->view('admin/template/footer');
				break;
			case 'overnight':
				$data['title'] = "Packages | Over Night";
				$data['dataArr'] = array('drpActv' => 6.0, 'actv'  => 6.3);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/packages/overnight');
				$this->load->view('admin/template/footer');
				break;
			default:
				redirect('Home/index');
				break;
		}
	}

	function customer(){
		$data['title'] = "Hoyoland Resort | Customer";
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 7.0, 'actv'  => 7.0);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/customer');
		$this->load->view('admin/template/footer');
	}

	function billing(){
		$data['title'] = "Hoyoland Resort | Billing";
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 8.0, 'actv'  => 8.0);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/billing');
		$this->load->view('admin/template/footer');
	}

	function reports(){
		$data['title'] = "Hoyoland Resort | Reports";
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 9.0, 'actv'  => 9.0);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/reports');
		$this->load->view('admin/template/footer');
	}

	function audit_logs(){
		$data['title'] = "Hoyoland Resort | Audit Logs";
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 11.0, 'actv'  => 11.0);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/audit-logs');
		$this->load->view('admin/template/footer');
	}

	function notifications(){
		$data['title'] = "Hoyoland Resort | Notifications";
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 13.0, 'actv'  => 13.0);

		$tbldata = array('is_read' => 1);
		$where = array('is_read' => 0);

		$this->Admin_model->update_table($where, 'notification', $tbldata);

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/notifications');
		$this->load->view('admin/template/footer');
	}

	function user_management(){
		$data['title'] = "Hoyoland Resort | User Management";
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['dataArr'] = array('drpActv' => 12.0, 'actv'  => 12.0);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/navbar');
		$this->load->view('admin/template/aside');
		$this->load->view('admin/user_management');
		$this->load->view('admin/template/footer');
	}

	function maintenance($mode){
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		switch ($mode) {
			case 'index':
					$data['title'] = "Hoyoland Resort | Maintenance";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 1, 'mode' => '');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
			break;
			case 'company-logo':
			        $data['title'] = "Maintenance | Company Logo";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2A');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-icon':
			        $data['title'] = "Maintenance | Company Icon";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2B');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-name':
			        $data['title'] = "Maintenance | Company Name";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2C');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-mission':
			        $data['title'] = "Maintenance | Company Mission";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2D');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-vision':
			        $data['title'] = "Maintenance | Company Vision";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2E');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-about':
			        $data['title'] = "Maintenance | About Company";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2F');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-history':
			        $data['title'] = "Maintenance | Company History";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2G');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-footertext':
			        $data['title'] = "Maintenance | Company Footer Text";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2H');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-address':
			        $data['title'] = "Maintenance | Address";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2I');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-terms-and-conditions':
			        $data['title'] = "Maintenance | Payment Terms and Conditions";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 2, 'mode' => '2J');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
		    // MESSAGES 		
			case 'company-mobile':
			        $data['title'] = "Maintenance | Mobile Number";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 3, 'mode' => '3A');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-telephone':
			        $data['title'] = "Maintenance | Telephone Number";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 3, 'mode' => '3B');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-email':
			        $data['title'] = "Maintenance | Email Address";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 3, 'mode' => '3C');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-fbpage':
			        $data['title'] = "Maintenance | Facebook Page";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 3, 'mode' => '3D');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-fbaccount':
			        $data['title'] = "Maintenance | Facebook Account";
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 3, 'mode' => '3E');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
		///Accomodations 
			case 'company-create-category':
			        $data['title'] = "Maintenance | Category";
			        //$data['category_id'] = $this->Admin_model->generateRsID('accomodation', 'HETR-');
			        $getCategories = $this->Admin_model->get('tbloccasion_type', array('occasion_status' => 'Active'), array(), '');

					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 4, 'mode' => '4A');
					$uri = $this->uri->segment(4);
					if($uri == 'create'){

						$data["categ_actions"] = 'create';
						$data["categ_mode"] = 'Create Category';
						$data["footershow"] = '';
						$data['statement'] = 
						"<div class='form-group row'>".
                                  "<label for='category_id'>Category Type:</label>".
                                  "<select class='form-control' name='category_id' required>".
                                     "<option disabled>Select Category Type..</option>";
                                    foreach ($getCategories as $key => $value) {

                                      $data['statement'] .=	"<option value='".$value->occasion_id."'>".$value->type."</option>";
                                    }
                       
                       $data['statement'] .=
                                  "</select>".
                                "</div>".
                                "<div class='form-group row'>".
                                   "<label for='company_cat_mode'>Category for:</label>".
                                 "<select class='form-control' name='company_cat_mode' required>".
                                     "<option disabled>--Select--</option>".
                                     "<option value='0'>Package</option>".
                                     "<option value='1'>Additional</option>".
                                    "</select>".
                                "</div>".
                                 "<div class='form-group row'>".
                                   "<label for='company_cat_title'>Category Name:</label>".
                                  "<input type='text' class='form-control' name='company_cat_title' placeholder='Category Name'required>".
                                "</div>".
                                "<div class='form-group'>".
                                   "<label for='compose'>Description:</label>".
                                  "<textarea id='compose' class='form-control' name='company_cat_desc' style='height: 300px' required>".
                                    "</textarea>".
                                "</div>";
					}elseif ($uri == 'edit') {

						$data["categ_actions"] = 'edit';
						$data["categ_mode"] = 'Edit Category';
						$uriGetId = $this->uri->segment(5);
						$selectA = '';
						$selectB = '';
						$statusA = '';
						$statusB = '';

						if($uriGetId != ''){
							$where =  array('id' => $uriGetId);
			                $getcategInfo = $this->Admin_model->admin_read('admin-dashboard', $where ,'adminsideaccomodation_categories_fetch');
			                
                            if($getcategInfo){
                            	if($getcategInfo[0]->Category_Id == 0){ $selectA = 'selected'; }
				                if($getcategInfo[0]->Category_Id == 1){ $selectB = 'selected'; }
				                if($getcategInfo[0]->status == 'Active'){ $statusA = 'selected'; }
				                if($getcategInfo[0]->status == 'Inactive'){ $statusB = 'selected'; }

							    $data["footershow"] = '';
								$data['statement'] =
								    "<input type='hidden' name='edit_category_id' id='edit_category_id' value='".$getcategInfo[0]->id."'>". 
								    "<div class='form-group row'>".
			                           "<label for='category_status'>Status:</label>".
			                           "<select class='form-control' name='category_status' required>".
			                             "<option value='Active' ".$statusA.">Active</option>".
			                             "<option value='Inactive' ".$statusB.">Inactive</option>".
			                          "</select>".
			                        "</div>".
								    "<div class='form-group row'>".
	                                  "<label for='category_id'>Category Type:</label>".
		                                  "<select class='form-control' name='category_id' required>";

		                          foreach ($getCategories as $key => $value) {
                                      $data['statement'] .=	"<option value='".$value->occasion_id."'>".$value->type."</option>";
                                    }

		            $data['statement'] .=  "</select>".
	                                "</div>".
	                                "<div class='form-group row'>".
	                                   "<label for='company_cat_title'>Category Name:</label>".
	                                  "<input type='text' class='form-control' name='company_cat_title' placeholder='Category Name' value='".$getcategInfo[0]->Category_title."' required>".
	                                "</div>".
	                                "<div class='form-group'>".
	                                   "<label for='compose'>Description:</label>".
	                                  "<textarea id='compose' class='form-control' name='company_cat_desc' style='height: 300px' required>".$getcategInfo[0]->Category_desc.
	                                    "</textarea>".
	                               "</div>";
	                           }elseif ($uriGetId) {
	                           		$data["footershow"] = 'd-none';
									$where = "parent_id = '0'";
					                $getcateg = $this->Admin_model->admin_read('admin-dashboard', $where ,'adminsideaccomodation_categories');

									$options = "";
									  foreach ($getcateg as $key) {
									  	$bg = 'bg-danger';
									  	if($key->status == 'Active'){ $bg = 'bg-success'; }
									  		
									  	$options .= "<option class='".$bg."' value='".$key->id."'>".$key->Category_title."</option>";
									  }
									$data['statement'] = 
								       "<div class='form-group row'>".
		                                  "<label for='category_id'>Category Name:</label>".
		                                  "<select class='form-control' id='edit_category' name='edit_category' required>".
		                                     "<option selected disabled>Select Category Name..</option>".
		                                     $options.
		                                  "</select>".
		                               "</div>";
	                           }
	                           else{
	                           	redirect('home/maintenance/company-create-category/edit');
	                           }
						}else{
						    $data["footershow"] = 'd-none';
							$where = "Category_Id != '' AND status = 'Active'";
			                $getcateg = $this->Admin_model->admin_read('admin-dashboard', $where ,'adminsideaccomodation_categories');
			                if($getcateg){

									$options = "";
									  foreach ($getcateg as $key) {
									  	$bg = 'bg-danger';
									  	if($key->status == 'Active'){ $bg = 'bg-success'; }
									  		
									  	$options .= "<option class='".$bg."' value='".$key->id."'>".$key->Category_title."</option>";
									  }
									$data['statement'] = 
								       "<div class='form-group row'>".
		                                  "<label for='category_id'>Category Name:</label>".
		                                  "<select class='form-control form-control-lg select-tags' id='edit_category' name='edit_category' required>".
		                                    "<option></option>".
		                                     $options.
		                                  "</select>".
		                                "</div>";
		                     }else{
		                     	$data['statement'] = '';
		                     }
						}
						
					}else{
						$data["categ_actions"] = '';
                        $data["footershow"] = 'd-none';
						$data["categ_mode"] = 'Category';
						$data['statement'] = 
						"<div class='form-group row justify-content-center'>".
						    "<div class='dropdown'>".
						       "<a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dpdMlink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> Select Action ".
						       "</a>".
                               "<div class='dropdown-menu' aria-labelledby='dpdMlink'>".
                                 "<a class='dropdown-item' href='company-create-category/create'>Create Category</a>".
                                 "<a class='dropdown-item' href='company-create-category/edit'>Edit Category</a>".
                                "</div>".
                             "</div>".
                           "</div>";
					}
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-create-sub-category':
			        $data['title'] = "Maintenance | Create Sub-Category";
			        $where = "Category_Id != '' AND status = 'Active'";

			        $data['categories'] = $this->Admin_model->admin_read('admin-dashboard', $where,'accomodation_categories');
			         $data['subcategories'] = $this->Admin_model->admin_read('admin-dashboard','','accomodation_sub_categories_id');
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 4, 'mode' => '4B');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			//Settings
				case 'company-reservation-days':
			        $data['title'] = "Maintenance | Reservation Days";
			        // $where = "parent_id = '0' AND status = 'Active'";

			        // $data['categories'] = $this->Admin_model->admin_read('admin-dashboard', $where,'accomodation_categories');
			        //  $data['subcategories'] = $this->Admin_model->admin_read('admin-dashboard','','accomodation_sub_categories_id');
			        $reservationdays = $this->Admin_model->get('settings', array('slug_name' => 'days_reservation'), array(), '');

			        $data["days_reservation"] = $reservationdays[0]->value;

					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 5, 'mode' => '5A');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			case 'company-event-types':
			        $data['title'] = "Maintenance | Events";
			        // $where = "parent_id = '0' AND status = 'Active'";

			        // $data['categories'] = $this->Admin_model->admin_read('admin-dashboard', $where,'accomodation_categories');
			        //  $data['subcategories'] = $this->Admin_model->admin_read('admin-dashboard','','accomodation_sub_categories_id');
			        $data["events"] = $this->Admin_model->get('tbloccasion_type', array(), array(), '');
			        
					$data['dataArr'] = array('drpActv' => 10.0, 'actv'  => 10.0, 'navTab' => 5, 'mode' => '5B');
					$this->load->view('admin/template/header', $data);
					$this->load->view('admin/template/navbar');
					$this->load->view('admin/template/aside');
					$this->load->view('admin/maintenance');
					$this->load->view('admin/template/footer');
				break;
			default:
				redirect('home/maintenance/index');
				break;
		}
	}

	function edit($mode){
		$data['profile'] = $this->Admin_model->admin_read('company_profile', '1');

		switch ($mode) {
			case 'pending':
				$data['title'] = "Pending | Edit";
				$data['mode'] = "Pending";
				// $data['edit'] = $this->Admin_model->admin_read('edit_read', $this->uri->segment())
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.1);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/edit-page', $data);
				$this->load->view('admin/lists/footer');
				break;
			case 'approved':
				$data['title'] = "Approved | Edit";
				$data['mode'] = "Approved";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.2);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/edit-page',$data);
				$this->load->view('admin/template/footer');
				break;
			case 'check-in':
				$data['title'] = "Check-In | Edit";
				$data['mode'] = "Check-In";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.3);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/edit-page', $data);
				$this->load->view('admin/template/footer');
				break;
			case 'finished':
				$data['title'] = "Finished | Edit";
				$data['mode'] = "Finished";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.4);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/edit-page', $data);
				$this->load->view('admin/template/footer');
				break;
			case 'cancelled':
				$data['title'] = "Cancelled | Edit";
				$data['mode'] = "Cancelled";
				$data['dataArr'] = array('drpActv' => 3.0,'actv'  => 3.5);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/lists/edit-page', $data);
				$this->load->view('admin/template/footer');
				break;
			default:
				$data['title'] = "Hoyoland Resort | Home";
				$data['dataArr'] = array('drpActv' => 1.0, 'actv'  => 1);
				$this->load->view('admin/template/header', $data);
				$this->load->view('admin/template/navbar');
				$this->load->view('admin/template/aside');
				$this->load->view('admin/home');
				$this->load->view('admin/template/footer');
				break;
		}
	}

	function logs($action, $module, $desc){
		$logData = array(
					'audit_action' => $action,
					'audit_module' => $module,
					'audit_description' => $desc,
					'user_id' => $_SESSION["id"],
					'ip' => $this->input->ip_address(),
					'audit_date' => date('D, d F Y, h:i A')
				);
		$this->Admin_model->log_audit($logData);
	}
}

?>