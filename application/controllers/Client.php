<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ .'/autoload.php';
require("./vendor/dompdf/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Client extends CI_Controller
{
	 public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');

		if(empty($_SESSION["key"])){
			$_SESSION["key"] = bin2hex(random_bytes(32));
		}
		if(isset($_SESSION["isLogged"]) && $_SESSION["isLogged"]){
			$_SESSION["session_path"] = "<a href='".base_url()."Client/signout' class='primary-btn'>Log Out</a>";
			$_SESSION["session_path_menu"] = "<a href='".base_url()."Client/signout'>Log Out</a>";
			$_SESSION["session_path_home"] = base_url()."Client/reservation/".$_SESSION["token"];
		}else{
			$_SESSION["session_path"] = "<a href='".base_url()."Client/signin' class='primary-btn'>Log In/Create Account</a>";
			$_SESSION["session_path_menu"] = "<a href='".base_url()."Client/signin'>Log In/Create Account</a>";
			$_SESSION["session_path_home"] = base_url()."Client/signin";
		}
	}

	function index(){

		$data['title'] = "Hoyoland Eco-Tropical Resort";
		$data['mode'] = 'main';

		// $this->session->unset_userdata('token');
		// $this->session->unset_userdata('key');

		$data['sectionA'] = $this->Admin_model->admin_read('client-page','Active','home_section_a');
		//$data['sectionB'] = $this->Admin_model->admin_read('client-page','Active','home_section_b');
		$data['sectionC'] = $this->Admin_model->admin_read('client-page','Active','home_section_c');
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');
		//old version
		// $where = "parent_id = '0' AND status = 'Active' AND Category_Id = 0";
		$where = "status = 'Active' AND Category_Id != '' AND mode = '0'";
		$allcategories = $this->Admin_model->admin_read('client-tools',
			$where ,'clientsideaccomodation_categories');

		if($allcategories){

		    $categories = [];
			$getcategories = [];

			$subcategories = [];
			$getsubcategories = [];

			$subcatfiles = [];
			$getsubcatfiles = [];

			foreach ($allcategories as $key) {
				 $where = array(
			 		'status' => 'Active',
			 		'parent_id' => $key->id
			      );
			 	$subcategory = $this->Admin_model->admin_read('client-tools',$where,'clientsideaccomodation_sub_categories');
			 	if($subcategory){

				 		$categories = array(
				 			'id' => $key->id, 
				 			'Category_title' => $key->Category_title, 
				 			'Category_desc' => $key->Category_desc
				 		);
				 		 array_push($getcategories, $categories);

			 		 foreach ($subcategory as $subcategorykey) {

				 		$subcategories = array(
				 			'id' => $subcategorykey->id,
				 		 	'parent_id' => $subcategorykey->parent_id, 
				 		 	'sub_category_id' => $subcategorykey->sub_category_id, 
				 		 	'Category_title' => $subcategorykey->Category_title, 
				 		 	'Category_desc' => $subcategorykey->Category_desc, 
				 		 	'price' => $subcategorykey->price, 
				 		 	'capacity' => $subcategorykey->capacity 
				 		  );
				 		    array_push($getsubcategories, $subcategories);

				 		$wheresubcat = array(
				 		   		'Subcategory_Id' => $subcategorykey->sub_category_id
				 		   );
				 		   $subcategoryfiles = $this->Admin_model->admin_read('client-tools', $wheresubcat,'clientsideaccomodation_sub_categories_file');
				 		   
				 		   foreach ($subcategoryfiles as $subcategoryfileskey) {
	                           $subcatfiles = array( 
	                           	 'Category_Id' => $subcategoryfileskey->Category_Id,
	                           	 'Subcategory_Id' => $subcategoryfileskey->Subcategory_Id,
	                           	 'imgfile_name' => $subcategoryfileskey->imgfile_name
	                           );
				 		   	   array_push($getsubcatfiles, $subcatfiles);
				 		   }
			 		}
			    }
			}

			$data['categories'] = $getcategories;
			$data['subcategories'] = $getsubcategories;
		    $data['subcatfiles'] =  $getsubcatfiles;
	   }
	   
		$this->load->view('client/template/header', $data);
		$this->load->view('client/home', $data);
		$this->load->view('client/template/footer');
	}

	function signin(){

		$data["title"] = "Hoyoland Eco-Tropical Resort | Sign In";
		$data["mode"] = "sign_in";
		$datetime = date('ymdhms');
		$csrf = hash_hmac('sha256',$datetime, $_SESSION["key"]);
		$data['token'] = $csrf;
		$_SESSION['token'] = $csrf;
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');

		$this->load->view('client/template/header', $data);
		$this->load->view('client/signin');
		$this->load->view('client/template/footer');

	}

	function signout(){
		$this->session->unset_userdata('token');
		$this->session->unset_userdata('key');
		$this->session->unset_userdata('customerId');
		$this->session->unset_userdata('fname');
		$this->session->unset_userdata('lname');
		$this->session->unset_userdata('reservation');
		$_SESSION["isLogged"] = false;
		redirect('Client/signin');
	}

	function sign_up(){
		
	 if(isset($_SESSION["token"])){

		$data["title"] = "Hoyoland Eco-Tropical Resort | Sign Up";
		$data["mode"] = "sign_up";
		$datetime = date('ymdhms');
		$csrf = hash_hmac('sha256',$datetime, $_SESSION["key"]);
		$data['token'] = $csrf;
		$_SESSION['token'] = $csrf;

		$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');
		$this->load->view('client/template/header', $data);
		$this->load->view('client/signup');
		$this->load->view('client/template/footer');
	  }else{
	  	redirect('Client/signin');
	  }
	}

	function success(){
		
		 $token = $this->uri->segment(3);
		if(isset($_SESSION["token"]) && $token == $_SESSION["token"]){

			$datetime = date('ymdhms');
			$csrf = hash_hmac('sha256',$datetime, $_SESSION["key"]);
			$data['token'] = $csrf;
			$_SESSION['token'] = $csrf;
			$data["title"] = "Hoyoland Eco-Tropical Resort | Success";
			$data["mode"] = "success";
			$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');

			$this->load->view('client/template/header', $data);
			$this->load->view('client/success');
			$this->load->view('client/template/footer');
		}else{
			redirect('Client/signin');
		}
	}

	function credentials_inquiry($e, $pass){
	    $result = $this->Admin_model->login_read($e, $pass);
        $msg = array('success' => false);
		if($result){
			$datetime = date('ymdhms');
		    $csrf = hash_hmac('sha256',$datetime, $_SESSION["key"]);
			$session_array = array(
				'customerId' => $result[0]->CustomerId,
				'fname' => $result[0]->Firstname,
				'lname' => $result[0]->Lastname,
				'token' => $csrf,
				'isLogged' => true,
				'isClient' => true
			    );
			$this->session->set_userdata($session_array);
			$msg = array('success' => true, 'token' => $csrf);
		}
		return $msg;
	}

	function welcome_mode($modeId, $id){
		$stringMsg = '';
		switch ($modeId) {
			case 0:
			    $CurrentDays = $this->Admin_model->get('tbldatetime', array('RCode' => $id), array(), '');

				$stringMsg .='<div class="contact-title d-flex justify-content-center">
		                     <div class="section-title">
		                         <h2>RE-SCHEDULE RESERVATION</h2>
		                    </div>
                    </div>
                   <div class="d-flex justify-content-center" style="padding-top: 50px;"><form id="rescheduleForm" class="contact-form" method="post" enctype="multipart/form-data" validate>
                        <div class="row">
                            <input type="hidden" name="token" id="token" value="'.$_SESSION["token"].'">
                             <div class="col-lg-12 col-sm-12 form-group">
                                  <label for="rs_code">Reservation Code:</label>
                                  <input class="form-control" type="text" id="rs_code" name="rs_code" value="'.$id.'" readonly>
                            </div>
                            <div class="col-lg-12 col-sm-12 form-group">
                                  <label for="rs_date">Reservation date:</label>
                                  <input class="form-control" type="text" id="rs_date" name="rs_date" placeholder="mm-dd-yyyy" required readonly>
                            </div>
                            <div class="col-lg-12 col-sm-12 form-group">
                                  <label for="rs_days">Number of Day(s):</label>
                                  <input class="form-control" type="number" id="rs_days" name="rs_days" placeholder="No. of Day(s)" min="1" max="'.$CurrentDays[0]->NDays.'"  value="'.$CurrentDays[0]->NDays.'" required>
                            </div>
                            <div class="col-lg-12 col-sm-12 form-group" style="padding-top: 50px;">
                              <button type="submit" class="primary-btn"> Re-Schedule </button>
                            </div>
                        </div>
                    </form> </div>';
				break;
			case 1:
				$stringMsg .='<div class="contact-title d-flex justify-content-center">
		                     <div class="section-title">
		                         <h2>CANCEL RESERVATION</h2>
		                         <span>NOTE: When you cancel this reservation. You will not allowed to reserve until the current date you reserve is not totally lapsed.</span>
		                    </div>
                    </div>
                   <div class="d-flex justify-content-center" style="padding-top: 50px;"><form id="cancelForm" class="contact-form" method="post" enctype="multipart/form-data" validate>
                        <div class="row">
                            <input type="hidden" name="token" id="token" value="'.$_SESSION["token"].'">
                             <div class="col-lg-12 col-sm-12 form-group">
                                  <label for="rs_code">Reservation Code:</label>
                                  <input class="form-control" type="text" id="rs_code" name="rs_code" value="'.$id.'" readonly>
                            </div>
                            <div class="d-flex justify-content-center" style="padding-top: 50px;">
                              <button type="submit" class="btn-primary"> Cancel my Reservation </button>
                            </div>
                        </div>
                    </form> </div>';
				break;
			case 2:

				$stringMsg .='<center><i class="fas fa-smile fa-3x"></i></center>
                   <div class="contact-title d-flex justify-content-center">
                     <div class="section-title">
                         <h2>WELCOME</h2>
                    </div>
                   </div>
                     <div class="d-flex justify-content-center">
                           <span class="welcome-msg">to Hoyoland Eco-Tropical Resort, '.$_SESSION["fname"].' '.$_SESSION["lname"].'</span>
                     </div> 
                   <div class="d-flex justify-content-center" style="padding-top: 50px;">
                   <a href="'.base_url().'Client/reservation/'.$_SESSION["token"].'" class="primary-btn">Make a Reservation</a></div>
                   <div class="d-flex justify-content-center" style="padding-top: 50px;">
                   <a href="'.base_url().'Client/view_my_reservation" class="text-info">View my Reservation</a></div>';
				break;
			default:
				# code...
				break;
		}
	  return $stringMsg;
	}

	function credentials(){

		$uriMode = $this->uri->segment(3);
		$entries = $this->uri->segment(4);

		if($uriMode == 'rsched'){
			$checkEntries = $this->Admin_model->resched_autoLog_in($entries);
			if($checkEntries){
				$msgReturn = $this->credentials_inquiry($checkEntries["Email"], $checkEntries["pass"]);
				   if($msgReturn["success"]){
				   	    $_SESSION["codeToReschedule"] = $this->uri->segment(5);
				   	    $_SESSION["welcomeMsgMode"] = $this->welcome_mode(0, $_SESSION["codeToReschedule"]);
				   	    $_SESSION["welcomeMode"] = 0;
					    redirect('Client/welcome/'.$msgReturn["token"]);
					}else{
						redirect('Client/signout');
					}
				}else{
				redirect('Client/signout');
			}
		}elseif($uriMode == 'cancel'){
			$checkEntries = $this->Admin_model->resched_autoLog_in($entries);
			if($checkEntries){
				$msgReturn = $this->credentials_inquiry($checkEntries["Email"], $checkEntries["pass"]);
				   if($msgReturn["success"]){
				   	    $_SESSION["codeToCancel"] = $this->uri->segment(5);
				   	    $_SESSION["welcomeMsgMode"] = $this->welcome_mode(1, $_SESSION["codeToCancel"]);
				   	    $_SESSION["welcomeMode"] = 1;
					    redirect('Client/welcome/'.$msgReturn["token"]);
					}else{
						redirect('Client/signout');
					}
			}else{
				redirect('Client/signout');
			}
		}elseif($uriMode == 'signin'){
			$email = $this->input->post('sign_email');
			$pass = $this->input->post('sign_pass');
	        $encrypass = hash_hmac('sha256', $email, $pass);
	        $msgReturn = $this->credentials_inquiry($email, $encrypass);
             if($msgReturn["success"]){
             	$_SESSION["welcomeMsgMode"] = $this->welcome_mode(2, '');
			    $_SESSION["welcomeMode"] = 2;
             }
			echo json_encode($msgReturn);
		}else{
			redirect('Client/signout');
		}
	}

	function view_my_reservation(){

		//$token = $this->uri->segment(3);
		if(isset($_SESSION["customerId"])){

			   	$id = $_SESSION["customerId"];
		       	$data["title"] = "Hoyoland Eco-Tropical Resort | Invoice";
				$data['mode'] = '';
				$data['section'] = '';
				$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
				$data["clientDetails"] = $this->Admin_model->admin_read('invoice-page', $id, 'clientDetails');
				//print_r();
				$data["res_details"] = $this->Admin_model->admin_read('invoice-page', $data["clientDetails"][0]->RCode, 'res_details');
				if($data["res_details"]){
					$data["invoice"] = $this->Admin_model->admin_read('invoice-page', $data["clientDetails"][0]->RCode, 'invoice-summary');
					$data["packagesDetails"] = $this->Admin_model->admin_read('invoice-page', $data["clientDetails"][0]->RCode, 'packages-details');
					
					$this->load->view('client/template/header', $data);
					$this->load->view('client/invoice');
					$this->load->view('client/template/footer');
				}else{
					
				$_SESSION["successMsg"] = '
					<center><i class="fas fa-sad-tear fa-3x"></i></center>
                   <div class="contact-title d-flex justify-content-center">
                     <div class="section-title">
                         <h2 style="text-align:center;">You have no reservation yet. Make a reservation now!</h2>
                    </div>
                   </div>
                     <div class="d-flex justify-content-center">
                          <a href="'.base_url().'Client/reservation/'.$_SESSION["token"].'" class="primary-btn">Make a Reservation</a>
                     </div>';

                    $data["title"] = "Hoyoland Eco-Tropical Resort | No Reservation";
					$data["mode"] = "success";
					$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');

					$this->load->view('client/template/header', $data);
					$this->load->view('client/success');
					$this->load->view('client/template/footer');
				}
		    }
			else{
			    redirect('Client/signout');
			}
		//echo json_encode($msg);
	}

	function reschedule_reservation(){

		$token = $this->uri->segment(3);
		if(isset($_SESSION["token"]) && isset($_SESSION["codeToReschedule"]) && $token == $_SESSION["token"]){

			   $id = $_SESSION["codeToReschedule"];
			   $CurrentStatus = $this->Admin_model->get('tbldatetime', array('RCode' => $id), array(), '');
			   if($CurrentStatus[0]->statusCode != 1){

		          $isResched = $this->Admin_model->update_reservation($id, 'tbldatetime', 'reschedule_reservation_data');
		          $msg = array('success' => false, 'mode' => 0);
			       if($isResched){
			       	  $msg = array('success' => true, 'mode' => 1);
			       	  $_SESSION["successMsg"] = '<div class="contact-title">
                        <center>
                            <i class="fas fa-check-circle fa-3x"></i>
                            <div class="section-title"><h2>Successfully re-schedule your reservation.</h2>
	                            <span>Please pay 50% downpayment immediately. For a big chance of approval.</span></div></center>
                            </div>';
	                  $mes = array(
						'customer_id' => $_SESSION["customerId"],
						'reservation_id' => $_SESSION["codeToReschedule"],
						'name' => $_SESSION["fname"].' '.$_SESSION["lname"],
						'subject' => 'New Re-Schedule reservation.',
						'message' => 'A new Re-Schedule reservation. Status: Pending',
						'is_read' => 0,
						'date_created' => date('D, d F Y, h:i A')
					  );
					 $this->Admin_model->create_notification($mes);
			       }
			   }else{
		       	  $msg = array('success' => true, 'mode' => 1);
		       	  $_SESSION["successMsg"] = '<div class="contact-title">
                        <center>
                            <i class="fas fa-check-circle fa-3x"></i>
                            <div class="section-title"><h2>Successfully re-schedule your reservation.</h2>
                            <span>Please pay 50% downpayment immediately. For a big chance of approval.</span></div></center>
                        </div>';
                  $mes = array(
					'customer_id' => $_SESSION["customerId"],
					'reservation_id' => $_SESSION["codeToReschedule"],
					'name' => $_SESSION["fname"].' '.$_SESSION["lname"],
					'subject' => 'New Re-Schedule reservation.',
					'message' => 'A new Re-Schedule reservation. Status: Pending',
					'is_read' => 0,
					'date_created' => date('D, d F Y, h:i A')
				  );
				 $this->Admin_model->create_notification($mes);

			   }
		          
		    }
			else{
			    $msg = array('success' => false, 'mode' => 2);
			}
		echo json_encode($msg);
	}

	function reschedule_my_reservation(){

		$id = $this->uri->segment(3);
		if(isset($_SESSION["customerId"])){

			 $_SESSION["codeToReschedule"] = $id;
			 $_SESSION["welcomeMsgMode"] = $this->welcome_mode(0, $id);
				   	    $_SESSION["welcomeMode"] = 0;
					    redirect('Client/welcome/'.$_SESSION["token"]);

		       // $isResched = $this->Admin_model->update_reservation($id, 'tbldatetime', 'reschedule_reservation_data');
		       //    $msg = array('success' => false, 'mode' => 0);
		       // if($isResched){
		       // 	  $msg = array('success' => true, 'mode' => 1);
		       // 	  $_SESSION["successMsg"] = '<h2>Successfully re-schedule your reservation.</h2>
         //                    <span>Please pay 50% downpayment immediately. For a big chance of approval.</span>';
		       // }else{
		       // 	  redirect('Client/signout');
		       // }
		     }else{
		    redirect('Client/signout');
		}
	}

	function cancel_my_reservation(){

		$id = $this->uri->segment(3);
		if(isset($_SESSION["customerId"])){
		    	$isCancelSuccess = $this->Admin_model->update_reservation($id, 'tbldatetime', 'cancel_reservation_data');
		    	 if($isCancelSuccess){
		       	  $_SESSION["successMsg"] = '<div class="contact-title">
                        <center>
                            <i class="fas fa-check-circle fa-3x"></i>
                            <div class="section-title"><h2>Successfully cancel your reservation.</h2>
                            <span>Thank you!</span></div></center>
                       </div>';
                    $data["title"] = "Hoyoland Eco-Tropical Resort | Success";
					$data["mode"] = "success";
					$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');

					  $mes = array(
						'customer_id' => $_SESSION["customerId"],
						'reservation_id' => $id,
						'name' => $_SESSION["fname"].' '.$_SESSION["lname"],
						'subject' => 'New cancel reservation.',
						'message' => 'A new cancel reservation. Status: Cancelled',
						'is_read' => 0,
						'date_created' => date('D, d F Y, h:i A')
					  );
					 $this->Admin_model->create_notification($mes);

					$this->load->view('client/template/header', $data);
					$this->load->view('client/success');
					$this->load->view('client/template/footer');
		       }else{
		       	  redirect('Client/signout');
		       }
		 }else{
		    redirect('Client/signout');
		}
	}

	function cancel_reservation(){

		$token = $this->uri->segment(3);
		  if(isset($_SESSION["token"]) && isset($_SESSION["codeToCancel"]) && $token == $_SESSION["token"]){

			   $id = $_SESSION["codeToCancel"];
		       $isCancelSuccess = $this->Admin_model->update_reservation($id, 'tbldatetime', 'cancel_reservation_data');
		          $msg = array('success' => false, 'mode' => 0);
		       if($isCancelSuccess){
		       	  $msg = array('success' => true, 'mode' => 1);
		       	  $_SESSION["successMsg"] = '<div class="contact-title">
                        <center>
                            <i class="fas fa-check-circle fa-3x"></i>
                            <div class="section-title"><h2>Successfully cancel your reservation.</h2>
                            <span>Thank you!</span></div></center>
                    </div>';

                  $mes = array(
						'customer_id' => $_SESSION["customerId"],
						'reservation_id' => $id,
						'name' => $_SESSION["fname"].' '.$_SESSION["lname"],
						'subject' => 'New cancel reservation.',
						'message' => 'A new cancel reservation. Status: Cancelled',
						'is_read' => 0,
						'date_created' => date('D, d F Y, h:i A')
					  );
					 $this->Admin_model->create_notification($mes);
		       }
		    }
			else{
			    $msg = array('success' => false, 'mode' => 2);
			}
		echo json_encode($msg);
	}

	function no_permission(){
		
		$data["title"] = "Hoyoland Eco-Tropical Resort | No Permission";
		$data["mode"] = "no_permission";
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');
		$this->load->view('client/template/header', $data);
		$this->load->view('client/no-permission');
		$this->load->view('client/template/footer');
	}

	function welcome(){
		
		$token = $this->uri->segment(3);
		if(isset($_SESSION["token"]) && $token == $_SESSION["token"]){

			$data["title"] = "Hoyoland Eco-Tropical Resort | Welcome";
			$data["mode"] = "welcome";

			$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');
			$this->load->view('client/template/header', $data);
			$this->load->view('client/welcome');
			$this->load->view('client/template/footer');
		}
		else{
		   redirect('Client/signout');
		}
	}

	function confirmation(){
		
		$entry_code = $this->uri->segment(3);
		$captcha = $this->uri->segment(4);

		$result = $this->Admin_model->client_read('tblcustomer', $entry_code, $captcha);

		if($result){
            $where =  "Entry_code = '".$entry_code."'";
			$update = $this->Admin_model->update_client($where,'tblcustomer');
			if($update){
			     
				$datetime = date('ymdhms');
		        $csrf = hash_hmac('sha256',$datetime, $_SESSION["key"]);
				$session_array = array(
				'customerId' => $result[0]->CustomerId,
				'fname' => $result[0]->Firstname,
				'lname' => $result[0]->Lastname,
				'token' => $csrf,
				'isLogged' => true
			    );
				$this->session->set_userdata($session_array);

				$mes = array(
					'customer_id' => $result[0]->CustomerId,
					'reservation_id' => 'RSID',
					'name' => $result[0]->Firstname.' '.$result[0]->Lastname,
					'subject' => 'New User',
					'message' => 'A new user is created.',
					'is_read' => 0,
					'date_created' => date('D, d F Y, h:i A')
				);
				$this->Admin_model->create_notification($mes);
			 
				redirect('Client/welcome/'.$csrf);
			  }else{
			  	redirect('Client/signout');
			  }
		}else{
		   redirect('Client/signout');
		}
	}

	function reservation(){

		$segment = $this->uri->segment(4);
  		$token = $this->uri->segment(3);
		if(isset($_SESSION["token"]) && $token == $_SESSION["token"]){

			$category;
			if($segment != 'additional'){ 
				$_SESSION["mode"] = 'accommodation'; 
				$category = 0; }else{ 
				$_SESSION["mode"] = 'additional'; 
				$category = 1;
			 }

			$data["title"] = "Hoyoland Eco-Tropical Resort | Reservation";
			$data['mode'] = 'B1';
			$data['section'] = 'B';
			$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');

		//old versions
	     // $where = "parent_id = '0' AND status = 'Active' AND Category_Id = ".$category."";
	    $where = "status = 'Active' AND Category_Id != '' AND mode = '0'";
		$allcategories = $this->Admin_model->admin_read('client-tools',
			$where ,'clientsideaccomodation_categories');
		if($allcategories){

		    $categories = [];
			$getcategories = [];

			$subcategories = [];
			$getsubcategories = [];

			$subcatfiles = [];
			$getsubcatfiles = [];

			foreach ($allcategories as $key) {
				 $where = array(
			 		'status' => 'Active',
			 		'parent_id' => $key->id
			      );
			 	$subcategory = $this->Admin_model->admin_read('client-tools',$where,'clientsideaccomodation_sub_categories');
			 	if($subcategory){

				 		$categories = array(
				 			'id' => $key->id, 
				 			'Category_title' => $key->Category_title, 
				 			'Category_desc' => $key->Category_desc
				 		);
				 		 array_push($getcategories, $categories);

			 		 foreach ($subcategory as $subcategorykey) {

				 		$subcategories = array(
				 			'id' => $subcategorykey->id,
				 		 	'parent_id' => $subcategorykey->parent_id, 
				 		 	'sub_category_id' => $subcategorykey->sub_category_id, 
				 		 	'Category_title' => $subcategorykey->Category_title, 
				 		 	'Category_desc' => $subcategorykey->Category_desc, 
				 		 	'price' => $subcategorykey->price, 
				 		 	'capacity' => $subcategorykey->capacity 
				 		  );
				 		    array_push($getsubcategories, $subcategories);

				 		$wheresubcat = array(
				 		   		'Subcategory_Id' => $subcategorykey->sub_category_id
				 		   );
				 		   $subcategoryfiles = $this->Admin_model->admin_read('client-tools', $wheresubcat,'clientsideaccomodation_sub_categories_file');
				 		   
				 		   foreach ($subcategoryfiles as $subcategoryfileskey) {
	                           $subcatfiles = array( 
	                           	 'Category_Id' => $subcategoryfileskey->Category_Id,
	                           	 'Subcategory_Id' => $subcategoryfileskey->Subcategory_Id,
	                           	 'imgfile_name' => $subcategoryfileskey->imgfile_name
	                           );
				 		   	   array_push($getsubcatfiles, $subcatfiles);
				 		   }
			 		}
			    }
			}

			$data['categories'] = $getcategories;
			$data['subcategories'] = $getsubcategories;
		    $data['subcatfiles'] =  $getsubcatfiles;
	    }
	   
    	$this->load->view('client/template/header', $data);
		$this->load->view('client/reservation');
		$this->load->view('client/template/footer');

	}else{
		redirect('Client/signout');
	}
}
    function accommodation(){

    	$seg1 = $this->uri->slash_segment(1);
    	$seg2 = $this->uri->slash_segment(2);
    	$seg3 = $this->uri->slash_segment(3);
    	$seg4 = $this->uri->slash_segment(4);
    	$seg5 = $this->uri->slash_segment(5);
    	$pathInfo = $seg1.$seg2.$seg3.$seg4.$seg5;

    	//print_r($pathInfo);

		if(isset($_SESSION["path"]) && $_SESSION["path"] == $pathInfo){

	    	$data["title"] = "Hoyoland Eco-Tropical Resort | Accommodation";
			$data['mode'] = 'B1';
			$data['section'] = 'B';

			$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
			$data['occasion'] = $this->Admin_model->admin_read('client-tools','Active','tbloccasion_type');
			$reservationdays = $this->Admin_model->get('settings', array('slug_name' => 'days_reservation'), array(), '');

		    $data["days_reservation"] = $reservationdays[0]->value;
			//$data['packages'] = $this->Admin_model->admin_read('client-tools','','clientsideaccomodation_packages');
			//$data['packagesfile'] = $this->Admin_model->admin_read('client-tools','','clientsideaccomodation_subpackages_file');
			$packageid = $this->uri->segment(4);
			$data['packagesInfo'] = $this->Admin_model->admin_read('client-tools',$packageid,'accomodation');
			$data['rs_id'] = $this->uri->segment(4);

			$getoccasionId = $this->Admin_model->get('accomodation', array('id' => $this->uri->segment(5)), array(), '');

			 $getoccasionType = $this->Admin_model->get('tbloccasion_type', array('occasion_id' => $getoccasionId[0]->parent_id), array(), '');

		      $data['occasionType'] = $getoccasionType[0]->type;

			$this->load->view('client/template/header', $data);
			$this->load->view('client/'.$_SESSION["mode"]);
			$this->load->view('client/template/footer');
		}else {
			redirect('Client/reservation/'.$_SESSION["token"]);
		}
    }

    function rates_and_packages(){
       
        $data["title"] = "Hoyoland Eco-Tropical Resort | Rates and Packages";
		$data['mode'] = 'rates_and_packages';
		$data['section'] = 'B';
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
		// $where = "status = 'Active'";
		$where = "status = 'Active' AND Category_Id != '' AND mode = '0'";
		$allcategories = $this->Admin_model->admin_read('client-tools',
			$where ,'clientsideaccomodation_categories');
		if($allcategories){

		    $categories = [];
			$getcategories = [];

			$subcategories = [];
			$getsubcategories = [];

			$subcatfiles = [];
			$getsubcatfiles = [];

			foreach ($allcategories as $key) {
				 $where = array(
			 		'status' => 'Active',
			 		'parent_id' => $key->id
			      );
			 	$subcategory = $this->Admin_model->admin_read('client-tools',$where,'clientsideaccomodation_sub_categories');
			 	if($subcategory){

				 		$categories = array(
				 			'id' => $key->id, 
				 			'Category_title' => $key->Category_title, 
				 			'Category_desc' => $key->Category_desc
				 		);
				 		 array_push($getcategories, $categories);

			 		 foreach ($subcategory as $subcategorykey) {

				 		$subcategories = array(
				 			'id' => $subcategorykey->id,
				 		 	'parent_id' => $subcategorykey->parent_id, 
				 		 	'sub_category_id' => $subcategorykey->sub_category_id, 
				 		 	'Category_title' => $subcategorykey->Category_title, 
				 		 	'Category_desc' => $subcategorykey->Category_desc, 
				 		 	'price' => $subcategorykey->price, 
				 		 	'capacity' => $subcategorykey->capacity 
				 		  );
				 		    array_push($getsubcategories, $subcategories);

				 		$wheresubcat = array(
				 		   		'Subcategory_Id' => $subcategorykey->sub_category_id
				 		   );
				 		   $subcategoryfiles = $this->Admin_model->admin_read('client-tools', $wheresubcat,'clientsideaccomodation_sub_categories_file');
				 		   
				 		   foreach ($subcategoryfiles as $subcategoryfileskey) {
	                           $subcatfiles = array( 
	                           	 'Category_Id' => $subcategoryfileskey->Category_Id,
	                           	 'Subcategory_Id' => $subcategoryfileskey->Subcategory_Id,
	                           	 'imgfile_name' => $subcategoryfileskey->imgfile_name
	                           );
				 		   	   array_push($getsubcatfiles, $subcatfiles);
				 		   }
			 		}
			    }
			}

			$data['categories'] = $getcategories;
			$data['subcategories'] = $getsubcategories;
		    $data['subcatfiles'] =  $getsubcatfiles;
	    }
	   
    	$this->load->view('client/template/header', $data);
		$this->load->view('client/rates-and-packages');
		$this->load->view('client/template/footer');

    }

    function view_reservations(){

    	$data["title"] = "Hoyoland Eco-Tropical Resort | Reservations";
		$data['mode'] = 'reservations';
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');

		 if(isset($_SESSION["customerId"])){
		 	$where = "CustomerId = '".$_SESSION["customerId"]."'";
		 	$currentRes = $this->Admin_model->admin_read('client-page', $where, 'client-view-reservation');

		 	$data['my_reservations'] = '';
		 	if($currentRes){
			 	foreach ($currentRes as $key => $value) {
			 		//print_r($value->RCode);
			 		 $in = DateTime::createFromFormat('m-d-Y', $value->CheckIn);
			         $newIn = $in->format('D, d F Y');

			         $out = date_add($in, date_interval_create_from_date_string("".$value->NDays." days"));
			         $out = $out->format('D, d F Y');

			 		$btndisabled = '';
			 		$didNotReschedDate = date('m-d-Y', strtotime("+8 days"));
	                  $dateCheckin = date($value->CheckIn);
	                  if(date($didNotReschedDate) >= date($dateCheckin)){
	                  	  $btndisabled = 'disabled';
	                  }

			        if($value->statusCode == 0){
			        	  
			        	$data['my_reservations'] .= '<div class="callout callout-info">
                          <h5>Pending Reservation</h5>
                          <p><strong>Reservation Code :</strong> '.$value->RCode.'</p>
                          <p><strong>Reserved Date :</strong> '.$newIn.' to '.$out.'</p>
                          <p><strong>Day(s) :</strong> '.$value->NDays.'</p>
                          <p><strong>Status :</strong> '.$value->Status.'</p>
                          <p><strong>Event :</strong> '.$value->RType.'</p>
                          <p><strong>Date created :</strong> '.$value->datetime.'</p>
                          <a href="'.base_url('Client/reschedule_my_reservation/').$value->RCode.'" class="btn btn-info text-white '.$btndisabled.'">Re-Schedule</a>
                           <a href="'.base_url('Client/cancel_my_reservation/').$value->RCode.'" class="btn btn-danger text-white">Cancel my Reservation</a>
                         </div>';
			        }elseif($value->statusCode == 1){
			        	 $data['my_reservations'] .= '<div class="callout callout-info">
                          <h5>Current Reservation</h5>
                          <p><strong>Reservation Code :</strong> '.$value->RCode.'</p>
                          <p><strong>Reserved Date :</strong> '.$newIn.' to '.$out.'</p>
                          <p><strong>Day(s) :</strong> '.$value->NDays.'</p>
                          <p><strong>Status :</strong> '.$value->Status.'</p>
                          <p><strong>Event :</strong> '.$value->RType.'</p>
                          <p><strong>Date created :</strong> '.$value->datetime.'</p>
                           <a href="'.base_url('Client/reschedule_my_reservation/').$value->RCode.'" class="btn btn-info text-white '.$btndisabled.'">Re-Schedule</a>
                           <a href="'.base_url('Client/cancel_my_reservation/').$value->RCode.'" class="btn btn-danger text-white '.$btndisabled.'">Cancel my Reservation</a>
                         </div>';
			        }elseif($value->statusCode == 2){
			        	 $data['my_reservations'] .= '<div class="callout callout-info">
                          <h5>Current Reservation</h5>
                          <p><strong>Reservation Code :</strong> '.$value->RCode.'</p>
                          <p><strong>Reserved Date :</strong> '.$newIn.' to '.$out.'</p>
                          <p><strong>Day(s) :</strong> '.$value->NDays.'</p>
                          <p><strong>Status :</strong> '.$value->Status.'</p>
                          <p><strong>Event :</strong> '.$value->RType.'</p>
                          <p><strong>Date created :</strong> '.$value->datetime.'</p>
                         </div>';
			        }elseif($value->statusCode == 3){
			        	 $data['my_reservations'] .= '<div class="callout callout-info">
                          <h5>Current Reservation</h5>
                          <p><strong>Reservation Code :</strong> '.$value->RCode.'</p>
                          <p><strong>Reserved Date :</strong> '.$newIn.' to '.$out.'</p>
                          <p><strong>Day(s) :</strong> '.$value->NDays.'</p>
                          <p><strong>Status :</strong> '.$value->Status.'</p>
                          <p><strong>Event :</strong> '.$value->RType.'</p>
                          <p><strong>Date created :</strong> '.$value->datetime.'</p>
                          <a href="'.base_url('Client/reschedule_my_reservation/').$value->RCode.'" class="btn btn-info text-white '.$btndisabled.'">Re-Schedule</a>
                           <a href="'.base_url('Client/cancel_my_reservation/').$value->RCode.'" class="btn btn-danger text-white '.$btndisabled.'">Cancel my Reservation</a>
                         </div>';
			        }elseif($value->statusCode == 4){
			        	 $data['my_reservations'] .= '<div class="callout callout-info">
                          <h5>Cancelled Reservation</h5>
                          <p><strong>Reservation Code :</strong> '.$value->RCode.'</p>
                          <p><strong>Reserved Date :</strong> '.$newIn.' to '.$out.'</p>
                          <p><strong>Day(s) :</strong> '.$value->NDays.'</p>
                          <p><strong>Status :</strong> '.$value->Status.'</p>
                          <p><strong>Event :</strong> '.$value->RType.'</p>
                          <p><strong>Date created :</strong> '.$value->datetime.'</p>
                         <a href="'.base_url('Client/reschedule_my_reservation/').$value->RCode.'" class="btn btn-info text-white '.$btndisabled.'">Re-Schedule</a>
                         </div>';
			        }elseif($value->statusCode == 5){
			        	 $data['my_reservations'] .= '<div class="callout callout-info">
                          <h5>Current Reservation</h5>
                          <p><strong>Reservation Code :</strong> '.$value->RCode.'</p>
                          <p><strong>Reserved Date :</strong> '.$newIn.' to '.$out.'</p>
                          <p><strong>Day(s) :</strong> '.$value->NDays.'</p>
                          <p><strong>Status :</strong> '.$value->Status.'</p>
                          <p><strong>Event :</strong> '.$value->RType.'</p>
                          <p><strong>Date created :</strong> '.$value->datetime.'</p>
                          <a href="'.base_url('Client/my_review/').$value->RCode.'" class="btn btn-info text-white">Review</a>
                         </div>';
			        }
			        
			       //print_r($newOut);                    
			 	}
			 }else{
			 	$data['my_reservations'] .= '<div class="callout callout-info">
                                            <h5>No reservation found.</h5>
                                   </div>';
             }
		 }else{
		 	redirect('Client/signout');
		 }
    	$this->load->view('client/template/header', $data);
		$this->load->view('client/view-reservation');
		$this->load->view('client/template/footer');
    }

    function schedule_of_events(){

    	$data["title"] = "Hoyoland Eco-Tropical Resort | Schedule of Events";
		$data['mode'] = 'schedule_of_events';
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
		$event_today = $this->Admin_model->admin_read('client-page', 2, 'todays_event');
        $upcoming_events = $this->Admin_model->admin_read('client-page', 1, 'upcoming_events'); 
        $data['event_today'] = '';
        $data['upcoming_events'] = '';
          if($event_today){
        	foreach ($event_today as $key) {
        	   $in = DateTime::createFromFormat('m-d-Y', $key->CheckIn);
		       $newIn = $in->format('l, d F Y');
        	   $data['event_today'] .= '<div class="callout callout-info">
                                            <h5>'.$newIn.'</h5>
                                  <p><strong>Event :</strong> '.$key->RType.'</p>
                                  <p><strong>Company :</strong> '.$key->Company.'</p>
                                </div>';
	        	}
	        }else{
	           $data['event_today'] .= '<div class="callout callout-info">
                                            <h5>No event today.</h5>
                                   </div>';
	        }

	      if($upcoming_events){
	      	foreach ($upcoming_events as $key) {
	    	   $in = DateTime::createFromFormat('m-d-Y', $key->CheckIn);
		       $newIn = $in->format('l, d F Y');
	    	   $data['upcoming_events'] .= '<div class="callout callout-info">
	                                        <h5>'.$newIn.'</h5>
	                              <p><strong>Event :</strong> '.$key->RType.'</p>
	                              <p><strong>Company :</strong> '.$key->Company.'</p>
	                            </div>';
	    	}
	      }else{
	           $data['upcoming_events'] .= '<div class="callout callout-info">
                                            <h5>No upcoming events.</h5>
                                   </div>';
	       }
    	$this->load->view('client/template/header', $data);
		$this->load->view('client/schedule-of-events');
		$this->load->view('client/template/footer');
    }

    function contact_us(){

    	$data["title"] = "Hoyoland Eco-Tropical Resort | Contact Us";
		$data['mode'] = 'contact_us';
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');

    	$this->load->view('client/template/header', $data);
		$this->load->view('client/contact-us');
		$this->load->view('client/template/footer');
    }

	function acc(){

        $token = $this->uri->segment(3);

        $validToReserve = '';

        $getCustomerReservation = $this->Admin_model->getCustomerReservation($_SESSION["customerId"]);
        if($getCustomerReservation){

		       $checkinDate = $getCustomerReservation[0]->CheckIn;
		       $isCheckout = $getCustomerReservation[0]->CheckOut;
		      
		       $now = date("Y-m-d");

		       $dateChekin = DateTime::createFromFormat('m-d-Y', $checkinDate);
		       $newChekin = $dateChekin->format('Y-m-d');
		        if($newChekin >= $now){
		        	$validToReserve = 'isNotvalidToReserve';
		        }else{

		        	if($isCheckout){
			       	  $dateCheckout = DateTime::createFromFormat('m-d-Y', $isCheckout);
			          $newCheckout = $dateCheckout->format('Y-m-d');
			          if($newCheckout >= $now){
			          	 $validToReserve = 'isNotvalidToReserve';
			          }else{
			          	$validToReserve = 'isvalidToReserve';
			          }
			       }else{
		        	 $validToReserve = 'isvalidToReserve';
			       }
		        }

          }

         if($validToReserve == 'isNotvalidToReserve'){

         	$data["title"] = "Hoyoland Eco-Tropical Resort | Can't Reserve Right Now";
         	$data['mode'] = 'existingreservation';
         	$_SESSION["reservation"] = $getCustomerReservation[0]->RCode;
         	$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
         	$this->load->view('client/template/header', $data);
			$this->load->view('client/existingreservation');
			$this->load->view('client/template/footer');
			return;
         }

     	if(isset($_SESSION["token"]) && $token == $_SESSION["token"]){
			if($_SESSION["mode"] == 'accommodation'){ $rs_Code = $this->Admin_model->generateRsID('tblcustomer', 'HETR'.date('Ymd'));
			    $_SESSION['reservation'] = $rs_Code;
		     }
			$id = $this->uri->segment(4);
			$parent = $this->uri->segment(5);
			$path = 'Client/accommodation/'.$_SESSION["token"].'/'.$id.'/'.$parent.'/';
			$_SESSION['path'] = $path;
			redirect($path);
		}else {
			redirect('Client/reservation/'.$_SESSION["token"]);
		}

	}

	function reservation_summary(){

		$token = $this->uri->segment(3);
        if(isset($_SESSION["token"]) && $token == $_SESSION["token"]){
			$data["title"] = "Hoyoland Eco-Tropical Resort | Reservation Summary";
			$data['mode'] = 'B1';
			$data['section'] = 'B';
			$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
			$_SESSION['days'] = $this->uri->segment(4);
			$this->load->view('client/template/header', $data);
			$this->load->view('client/reservation_summary');
			$this->load->view('client/template/footer');
		}else{
			redirect('Client/signout');
		}
	}

   function reserved(){
		$token = $this->uri->segment(3);
		if(isset($_SESSION["token"]) && $token == $_SESSION["token"]){

			$data["title"] = "Hoyoland Eco-Tropical Resort | Reserved";
			$data["mode"] = "no_permission";
			$data['sectionD'] = $this->Admin_model->admin_read('client-page','Active','home_section_d');

			$mes = array(
					'customer_id' => $_SESSION["customerId"],
					'reservation_id' => $_SESSION["reservation"],
					'name' => $_SESSION["fname"].' '.$_SESSION["lname"],
					'subject' => 'New Reservation',
					'message' => 'A new reservation is created. Status: Pending',
					'is_read' => 0,
					'date_created' => date('D, d F Y, h:i A')
			 );
			$this->Admin_model->create_notification($mes);

			$this->load->view('client/template/header', $data);
			$this->load->view('client/reserved');
			$this->load->view('client/template/footer');
		 }else{
		 	redirect('Client/signout');
		 }
	}

  function invoice(){

  	    $token = $this->uri->segment(3);
		if(isset($_SESSION["token"]) && $token == $_SESSION["token"]){

		$data["title"] = "Hoyoland Eco-Tropical Resort | Invoice";
		$data['mode'] = 'C1';
		$data['section'] = 'C';
		$data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
		$data["clientDetails"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["customerId"], 'clientDetails');
		$data["res_details"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["reservation"], 'res_details');
		$data["invoice"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["reservation"], 'invoice-summary');
		$data["packagesDetails"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["reservation"], 'packages-details');
		
		$this->load->view('client/template/header', $data);
		$this->load->view('client/invoice');
		$this->load->view('client/template/footer');
	}else{
		redirect('Client/signout');
	}
}

function crud_func($mode, $type){

	switch ($mode) {
		case 'client':
		  		if($type == 'create') {
		  			$captcha_response = trim($this->input->get('g-recaptcha-response'));
		  			if($captcha_response != ''){
		  				$secretkey = '6LfkEvYZAAAAAA7LL-5epDNnp-fPbwUOjDShXoFZ';
		  				$check = array(
		  					'secret' =>   $secretkey,
		  					'response' => $this->input->get('g-recaptcha-response')
		  				);
		  				$ch = curl_init();
		  				curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
		  				curl_setopt($ch, CURLOPT_POST, true);
		  				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($check));
		  				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		  				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		  				$return = curl_exec($ch);
		  				$response = json_decode($return, true);
		  				if($response['success']){

		  					$result = $this->Admin_model->create_account('tblcustomer','CSdata');
							 $msg = array('success' => false, 'errMsg' => $result);
							if($result){
								$msg = array('success' => true, 'errMsg' => $result);
								$_SESSION["successMsg"] = '<div class="contact-title">
                            <center>
                            <i class="fas fa-check-circle fa-3x"></i>
                            <div class="section-title"><h2>Successfully created your account.</h2>
                            <span>Please check your email to confirm your account registration!</span></div></center>
                              </div>';
							}
		  				    echo json_encode($msg);
		  				}else{
		  					$msg = array('success' => false, 'errMsg' => 'Having problem in validating re-captcha! Please try again.');
		  				    echo json_encode($msg);
		  				}
		  			}else{
		  				$msg = array('success' => false, 'errMsg' => 'Please check if you are not a robot!');  
		  				echo json_encode($msg);
		  			} 
				}
			  else if ($type == 'reservation') {

			  		 $id = $_SESSION["customerId"];
			  		 $where = array(
			  		 	'CustomerId' => $id
			  		 );
			  		 // $random = bin2hex(random_bytes(32));
			  	    //  $datetime = date('ymdhms');
			        //  $csrf = hash_hmac('sha256',$datetime, $random);

			  	     $result1 = $this->Admin_model->create('tbldatetime','reservationdatetime');
			  	     $result2 = $this->Admin_model->reserved_details('reserved_details', 'reserved_details');
			  	     $result3 = $this->Admin_model->create('tblpayment', 'payment_summary');
			  	     $result4 = $this->Admin_model->update_client_reservation($where,'tblcustomer', 'new_reservation_code');
					 $msg = array('success' => true);
					if($result1 && $result2 && $result3 &&  $result4){
						$msg = array('success' => true);
					}
					 echo json_encode($msg);
			  
			  }
			  else if ($type == 'province') {
			  	$result = $this->Admin_model->admin_read('client-tools','','refprovince');
					 $msg = array('success' => false, 'data' => $result);
					if($result){
						$msg = array('success' => true, 'data' => $result);
					}
					 echo json_encode($msg);
			  }
			  else if ($type == 'city') {

			  	$province = $this->uri->segment(5);
			  	$result = $this->Admin_model->admin_read('client-tools',$province,'refcitymun');
					 $msg = array('success' => false, 'data' => $result);
					if($result){
						$msg = array('success' => true, 'data' => $result);
					}
					 echo json_encode($msg);
			  }
			  else if ($type == 'barangay') {
			  	$city = $this->uri->segment(5);
			  	$result = $this->Admin_model->admin_read('client-tools', $city ,'refbrgy');
					 $msg = array('success' => false, 'data' => $result);
					if($result){
						$msg = array('success' => true, 'data' => $result);
					}
					 echo json_encode($msg);
			  }else if ($type == 'packages') {
			  	$packageid = $this->uri->segment(5);
			  	$result = $this->Admin_model->admin_read('client-tools',$packageid,'packages');
					 $msg = array('success' => false);
					if($result){
						$msg = array('success' => true, 'data' => $result);
					}
					 echo json_encode($msg);
			  }else if ($type == 'additional') {
			  	$id = $this->uri->segment(5);
			  	$result = $this->Admin_model->admin_read('client-tools',$id,'additional');
					 $msg = array('success' => false);
					if($result){
						$msg = array('success' => true, 'data' => $result);
					}
					 echo json_encode($msg);
			  }else if ($type == 'reserved_dates') {
			  	$result = $this->Admin_model->admin_read('client-tools','Confirmed','reserved_dates');
					 $msg = array('success' => false);
					if($result){
						$msg = array('success' => true, 'data' => $result);
					}
					 echo json_encode($msg);
			  }
			  // else if ($type == 'occasion') {
			  // 	$result = $this->Admin_model->admin_read('tbloccasion_type', '');
					//  $msg = array('success' => false, 'data' => $result);
					// if($result){
					// 	$msg = array('success' => true, 'data' => $result);
					// }
					//  echo json_encode($msg);
			  // }
			  else if ($type == 'email_check') {
			  	$result = $this->Admin_model->admin_read('client-tools','','email_check');
					 $msg = "true";
					if($result){
						$msg = 'This email is alreay exists! Please <a href="'.base_url().'Client/signin" class="text-info">sign in</a> or, if you forgot your password, <a href="'.base_url().'Client/reset" class="text-info">reset it.</a>';
					}
				   echo json_encode($msg);
			  }
		  	break;
		
		default:
			# code...
			break;
	}
}

function generatepdf(){


    	$data["title"] = "Hoyoland Eco-Tropical Resort | Invoice";
        $data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
		$data["clientDetails"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["customerId"], 'clientDetails');
		$data["res_details"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["reservation"], 'res_details');
		$data["invoice"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["reservation"], 'invoice-summary');
		$data["packagesDetails"] = $this->Admin_model->admin_read('invoice-page', $_SESSION["reservation"], 'packages-details');
   
    $html2 = $this->load->view('invoice', $data, true);
    $filename = 'Hoyoland-'.$_SESSION["reservation"];
    $this->createPDF($html2, $filename, true);

 }

 public function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){ 

        $options = new Options();
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $context = stream_context_create([
                'ssl' => [
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                    'allow_self_signed' => TRUE
                ]
        ]);
        $dompdf->setHttpContext($context);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }


    function settings(){

       $reservationdays = $this->Admin_model->get('settings', array('slug_name' => 'days_reservation'), array(), '');
        $msg = array('data' => 15);
		if($reservationdays){
			$msg = array('data' => $reservationdays[0]->value);
		}
		 echo json_encode($msg);
    }


	
	// function smtp(){

	// 	$email = $this->input->get('email');
	// 	$message = $this->input->get('message');
	// 	$this->email->set_mailtype("html");
	// 	$this->email->from('hoyoecoresort@gmail.com', 'Hoyoland Eco-Tropical Resort');
	// 	$this->email->to($email);
	// 	$this->email->subject('Successfully send reservation!');
	// 	$emailContent = '<!DOCTYPE><html><head></head><body>';
	//     $emailContent .= $message;
	//     $emailContent .= "</body></html>";
	    
	//     $this->email->message($emailContent);
 //        $result = $this->email->send();
	// 	$msg['success'] = false;
	// 	if($result){
	// 		$msg['success'] = true; 
	// 	}
	// 	echo json_encode($msg);
	// }

}?>