<?php   
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ .'/autoload.php';
require("./vendor/dompdf/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
use Dompdf\Options; 

class Admin extends CI_Controller
{
	 public function __construct(){
		parent::__construct(); 
    	$this->load->library('email');
    	date_default_timezone_set('Asia/Manila');
    	if($this->session->userdata('user_type') != 1 && $this->session->userdata('user_type') != 2){
            redirect('login/logout');
        }
	}

	public function CRUD($mode, $type){

		switch ($mode) {
			case 'reservation':
				if($type == 'read-allData') {
					$URImode = $this->uri->segment(5);
					$result = $this->Admin_model->admin_read('admin-dashboard', $URImode ,'read-allData');

						  if($result){
							$dataFetch = [];
							  foreach ($result as $key => $value) {
							  	 $name = $value->Lastname.', '.$value->Firstname.' '.$value->Middlename;
							  	   $Obj = array(
							  	   		'CustomerId' => $value->CustomerId,
							  	   		'RCode' => $value->RCode, 
										'Status' => $value->Status,
										'statusCode' => $value->statusCode,
										'name' => $name,
										'Company' => $value->Company,
										'Mobile' => $value->Mobile,
										'Email' => $value->Email,
										'CheckIn' => $value->CheckIn,
										'RType' => $value->RType,
										'Totalbill' => $value->Totalbill,
										'Balance' => $value->Balance,
										'dateCreated' => $value->datetime
							  	   );
							  	 array_push($dataFetch, $Obj);
							  } 

						 $returnData = array(
								"total" => count($result),
								"totalNotFiltered" => count($result),
		    					"rows" => $dataFetch
							);
						}else{
							$returnData = array(
								"total" => 0,
								"totalNotFiltered" => 0,
		    					"rows" => array()
							);
						}
					echo json_encode($returnData);

				}elseif($type == 'read-audit-logs') {
					$URImode = $this->uri->segment(5);
					$result = $this->Admin_model->admin_read('admin-dashboard', $URImode ,'read-audit-logs');

						  if($result){
							$dataFetch = [];
							  foreach ($result as $key => $value) {
							  	   $Obj = array(
							  	   		'audit_id' => $value->audit_id,
							  	   		'audit_action' => $value->audit_action, 
										'audit_module' => $value->audit_module,
										'audit_description' => $value->audit_description,
										'user_id' => $value->user_id,
										'ip' => $value->ip,
										'audit_date' => $value->audit_date
							  	   );
							  	 array_push($dataFetch, $Obj);
							  } 

						 $returnData = array(
								"total" => count($result),
								"totalNotFiltered" => count($result),
		    					"rows" => $dataFetch
							);
						}else{
							$returnData = array(
								"total" => 0,
								"totalNotFiltered" => 0,
		    					"rows" => array()
							);
						}
					echo json_encode($returnData);

				}elseif($type == 'read-customer-data') {
					$URImode = $this->uri->segment(5);
					$result = $this->Admin_model->admin_read('admin-dashboard', $URImode ,'read-customer-data');

						  if($result){
							$dataFetch = [];
							  foreach ($result as $key => $value) {
							  	   $name = $value->Lastname.', '.$value->Firstname.' '.$value->Middlename;
							  	   $Obj = array(
							  	   		'cus_id' => $value->CustomerId,
							  	   		'cus_name' =>  $name, 
										'cus_company' => $value->Company,
										'cus_add' => $value->Address,
										'cus_mob' => $value->Mobile,
										'cus_email' => $value->Email,
										'cus_date' => $value->date_created
							  	   );
							  	 array_push($dataFetch, $Obj);
							  } 

						 $returnData = array(
								"total" => count($result),
								"totalNotFiltered" => count($result),
		    					"rows" => $dataFetch
							);
						}else{
							$returnData = array(
								"total" => 0,
								"totalNotFiltered" => 0,
		    					"rows" => array()
							);
						}
					echo json_encode($returnData);

				}elseif($type == 'read-reports-data') {
					
					$result = $this->Admin_model->admin_read('admin-dashboard', '','read-reports-data');
						  if($result){
							$dataFetch = [];
							  foreach ($result as $key => $value) {
							  	   $Obj = array(
							  	   		'cus_id' => $value->CustomerId,
							  	   		'cus_rs' => $value->RCode, 
										'cus_company' => $value->Company,
										'cus_bill' => $value->Totalbill,
										'cus_date' => $value->datetime
							  	   );
							  	 array_push($dataFetch, $Obj);
							  } 

						 $returnData = array(
								"total" => count($result),
								"totalNotFiltered" => count($result),
		    					"rows" => $dataFetch
							);
						}else{
							$returnData = array(
								"total" => 0,
								"totalNotFiltered" => 0,
		    					"rows" => array()
							);
						}
					echo json_encode($returnData);

				}elseif($type == 'read-user-mgmt') {
					$URImode = $this->uri->segment(5);
					$result = $this->Admin_model->admin_read('admin-dashboard', $URImode ,'read-user-mgmt');

						  if($result){
							$dataFetch = [];
							  foreach ($result as $key => $value) {
							  	  $name = $value->last_name.', '.$value->first_name.' '.$value->middle_name;
							  	  if($value->account_type == 1){
							  	  	$role = 'Administrator';
							  	  }elseif($value->account_type == 2){
							  	  	$role = 'User';
							  	  }
							  	   $Obj = array(
							  	   		'acc_no' => $value->acc_no,
							  	   		'name' => $name,
							  	   		'fname' => $value->first_name,
							  	   		'lname' => $value->last_name,
							  	   		'mname' => $value->middle_name,
							  	   		'role' => $value->account_type,
										'email' => $value->email,
										'acc_type' => $role,
										'status' => $value->status,
										'date_created' => $value->created_at,
										'date_updated' => $value->updated_at
							  	   );
							  	 array_push($dataFetch, $Obj);
							  } 

						 $returnData = array(
								"total" => count($result),
								"totalNotFiltered" => count($result),
		    					"rows" => $dataFetch
							);
						}else{
							$returnData = array(
								"total" => 0,
								"totalNotFiltered" => 0,
		    					"rows" => array()
							);
						}
					echo json_encode($returnData);

				}else if($type == 'update-user-mgmt') {
					$where = "account_type = '1'";
					$result = $this->Admin_model->update_user_mgmt($where, 'users', 'update-user-mgmt-data');
					$msg = array('success' => false, 'message' => 'Update failed!');
					if($result){
						$msg = array('success' => true, 'message' => 'Successfully updated your profile.'); 
					}
					echo json_encode($msg);
				}else if($type == 'read') {
					$status = $this->uri->segment(5);
					$result = $this->Admin_model->admin_read('admin-dashboard',$status,$mode);
					$msg = array('success' => false);
					if($result){
						$msg = array('success' => true, 'data' => $result); 
					}
					echo json_encode($msg);
				}
				else if($type == 'update') {
					$id = $this->uri->segment(5);
					// $resultA = $this->Admin_model->update_reservation($id, 'tbldatetime', 'update_reservation_status');
					// $resultC = $this->Admin_model->update_reservation($id, 'tblpayment', 'update_payment_ispaid');

					
					$isPaid = $this->Admin_model->update_reservation($id, 'tblpayment', 'update_payment_ispaid');
					 if($isPaid){
					 	$isCreateInvoice = $this->Admin_model->create('tblpayment', 'update_payment_balance');
					 	if($isCreateInvoice){
					 		$isUpdateStatus = $this->Admin_model->update_reservation($id, 'tbldatetime', 'update_reservation_status');
					 		if($isUpdateStatus){
					 			$msg = array('success' => true);
					 		}else{
					 			$msg = array('success' => false, 'data' => "Can`t update status reservation. Please try again.");
					 		}
					 	}else{
					 	   $msg = array('success' => false, 'data' => "Can`t create invoice. Please try again.");
					 	}
					 }else{
					 	$msg = array('success' => false, 'data' => "Can`t update isPaid Mode.");
					 }
					// $msg['success'] = false;
					// if($resultA || $resultB || $resultC){
					// 	$msg['success'] = true;
					// }
					 echo json_encode($msg);
				}else if($type == 'reservation-read-reserved') {
					$getId = $this->uri->segment(5);
					$whereId = "RCode = '".$getId."'";
					$readReservationDetails = $this->Admin_model->admin_read('admin-dashboard', $whereId, 'read-reservation-tocreate');
					$msg = array('success' => false);
					if($readReservationDetails){
						$msg = array('success' => true, 'data' => $readReservationDetails); 
					}
					echo json_encode($msg);
				}else if($type == 'reservation-create-reserved') {

				    $result = $this->Admin_model->create('reserved_details', 'reservation-create-reserved');
				    $msg = array('success' => false);
					if($result){
						$msg = array('success' => true, 'data' => $result); 
					}
					echo json_encode($msg);
				}
				else if($type == 'checkout') {
					$id = $this->uri->segment(5);
					$resultA = $this->Admin_model->update_reservation($id, 'tbldatetime', 'update_reservation_status');
					$resultC = $this->Admin_model->update_reservation($id, 'tblpayment', 'update_payment_ispaid');
					$resultB = $this->Admin_model->create('tblpayment', 'update_payment_balance');
					$msg['success'] = false;
					if($resultA || $resultB || $resultC){
						$msg['success'] = true;
					}
					echo json_encode($msg);
				}
				else if($type == 'confirmed-update') {
					$id = $this->uri->segment(5);
					$result = $this->Admin_model->update_reservation($id, 'tbldatetime', 'update_confirmed_reservation');
					$msg['success'] = false;
					if($result){
						$msg['success'] = true;
					}
					echo json_encode($msg);
				}
				else if($type == 'cancel-accomodation') {
					$id = $this->uri->segment(5);
					$resultA = $this->Admin_model->update_reservation($id, 'tbldatetime', 'cancel-accomodation');
					$msg['success'] = false;
					 if($resultA){
						$msg['success'] = true;
				     }
					echo json_encode($msg);
				}
				else if($type == 'refund-payment') {
					$where = "RCode = '".$_POST["rID"]."' AND ispaid = 0";
					$data = array('Balance' => $_POST["totbill"]);
					$resultA = $this->Admin_model->update_settings($where, 'tblpayment', $data);
					$msg['success'] = false;
					 if($resultA){
						$msg['success'] = true;
				     }
					echo json_encode($where);
				}
				else if($type == 'resched-reservation') {
					$id = $this->uri->segment(5);
					$resultA = $this->Admin_model->update_reservation($id, 'tbldatetime', 'resched-reservation');
					$msg['success'] = false;
					 if($resultA){
						$msg['success'] = true;
				     }
					echo json_encode($msg);
				}else if($type == 'ornumber') {
					$result = $this->Admin_model->generateID('tblpayment', '');

					$msg = array('success' => true, 'data' => $result);
					echo json_encode($msg);
				}
				else if($type == 'delete') {
					// $id = $this->uri->segment(5);
					// $result = $this->Crud_model->delete($id, 'repair');
					// $msg['success'] = false;
					// if($result){
					// 	$msg['success'] = true;
					// }
					// echo json_encode($msg);
				}
				else if($type == 'edit') {
					// $id = $this->uri->segment(5);
				 //    $result = $this->Crud_model->edit($id, 'repair');
				 //    $msg = array('success' => false, 'data' => $result);
					// if($result){
					// 	$msg = array('success' => true, 'data' => $result); 
					// }
					// echo json_encode($msg);
				}else if($type == 'read-additional') {
					// $additionalMode = $this->uri->segment(5);
					// //$where = "sub_category_id != '0' AND status = 'Active'";
					// $where = "parent_id = '0' AND status = 'Active' AND Category_Id = '1'";
				 //    $result = $this->Admin_model->admin_read('admin-dashboard', $where , $additionalMode);
				 //    $msg = array('success' => false, 'data' => $result);
					// if($result){
					// 	$msg = array('success' => true, 'data' => $result); 
					// }
					// echo json_encode($msg);

					$additionalMode = $this->uri->segment(5);
					//$where = "sub_category_id != '0' AND status = 'Active'";
					$where = "Category_Id != '' AND status = 'Active' AND mode = '1'";
				    $allcategories = $this->Admin_model->admin_read('admin-dashboard', $where , $additionalMode);
				   
					if($allcategories){

						$subcategories = [];
						$getsubcategories = [];

						foreach ($allcategories as $key) {
							 $where = array(
						 		'status' => 'Active',
						 		'parent_id' => $key->id
						      );
						 	$subcategory = $this->Admin_model->admin_read('client-tools',$where,'clientsideaccomodation_sub_categories');
						 	if($subcategory){

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
						 		}
						    }else{
						     $msg = array('success' => false, 'data' => $getsubcategories);
						    }
						}

					 $msg = array('success' => true, 'data' => $getsubcategories); 
				    }else{
				       $msg = array('success' => false, 'data' => $allcategories);
				    }
				    echo json_encode($msg);

				}else if($type == 'send_notification_for_resched') {
					
					$getData = [];
					$customers = $_GET["data"];
					$arrObj = json_decode($customers, true);
			  		foreach ($arrObj as $key => $value) {

			  			$where = "CustomerId = '".$value["CustomerId"]."'";
			  			$getCustomerData = $this->Admin_model->admin_read('admin-dashboard', $where , 'send_notification_for_resched');
			  		   
			  		    $lname = $getCustomerData["Lastname"];
			  		    $Rscode = $getCustomerData["RCode"];
			  		    $email = $getCustomerData["Email"];
			  		    $entryCode = $getCustomerData["Entry_code"];
			  		    $dateCheckIn = $value["CheckIn"];
			  		    $Rtype = $value["RType"];

			  		  	$subjectForReSched = $this->Admin_model->update_reservation($Rscode, 'tbldatetime', 'cancel-accomodation');
			  		  	if($subjectForReSched){

				  		   $sendResult = $this->send_email_notification_for_resched($lname, $Rscode, $email, $entryCode, $dateCheckIn, $Rtype);
				  		   array_push($getData, array(
				  		   		'isSend' => $sendResult,
				  		   		'CustomerId' => $value["CustomerId"],
				  		   		'RCode' => $Rscode
				  		   ));
			  		  	}
			  		}

			  		$customerApproved = $_GET["approved"];
			  		$approved = json_decode($customerApproved, true);
			  		$approvedlname = $approved[0]["LastName"];
			  		$approvedRscode = $approved[0]["RCode"];
			  	    $approvedemail = $approved[0]["Email"];
			  	    $approveddateCheckIn = $approved[0]["CheckIn"];
			  	    $approvedRtype = $approved[0]["RType"];

				    $this->send_email_notification_for_approved($approvedlname, $approvedRscode, $approvedemail, $approveddateCheckIn, $approvedRtype);

				    $msg = array('success' => true, 'data' => $getData); 
					echo json_encode($msg);

				}else if($type == 'checkin-additional-pckgs') {

					$RCodeId = $_POST["RCode"];

				    $isCreatedReservedDetails = $this->Admin_model->create('reserved_details', 'additional_reserved_details');

				    $msg = array('success' => false, 'message' => '');
					if($isCreatedReservedDetails){
					      $isPaid = $this->Admin_model->update_reservation($RCodeId, 'tblpayment', 'update_payment_ispaid');

					      if($isPaid){
					      	 $isCreatedInvoice = $this->Admin_model->create('tblpayment', 'additional_reservation_payment');

						      	 if($isCreatedInvoice){
						      	 	$msg = array('success' => true, 'message' => 'You`ve successfully add item.', 'or' => $_SESSION["invoice_for_checkout"]);
						      	 }else{
						      	 	$msg = array('success' => false, 'message' => 'Can`t create invoice.');
						      	 }
					      }else{
					      	$msg = array('success' => false, 'message' => 'Can`t update payment.');
					      }
					 }else{
					 	$msg = array('success' => false, 'message' => 'Can`t create reservation details in tblreservation_details.');
					 }
					echo json_encode($msg);
				}else if($type == 'reservation-checkout') {

					$RCodeId = $_POST["RCode"];
				       $msg = array('success' => false, 'message' => '');

			      	     	if($_POST["Balance"] == 0.00){
			      	     		if($_POST["chkout_status"] == 'Finished'){
			      	     			$isUpdateCheckout = $this->Admin_model->update_reservation($RCodeId, 'tbldatetime', 'checkout_date_time');
			      	     			if($isUpdateCheckout){
			      	     				$msg = array('success' => true, 'message' => 'You`ve successfully checkout.');
			      	     			}else{
			      	     				$msg = array('success' => false, 'message' => 'Failed to checkout. Please try again');
			      	     			}
			      	     		}else{
			      	     			$msg = array('success' => false, 'message' => 'Already checkin!');
			      	     		}
			      	     		
			      	     	}else{
			      	     		
			      	     		 $isUpdateStatus = $this->Admin_model->update_reservation($RCodeId, 'tbldatetime', 'checkout_update_status');
			      	     		 if($isUpdateStatus){

			      	     		 	  $isPaid = $this->Admin_model->update_reservation($RCodeId, 'tblpayment', 'update_payment_ispaid');
			                          if($isPaid){
			                          	
				      	     		     $isCreatedInvoice = $this->Admin_model->create('tblpayment', 'checkout_reservation_payment');

									      	 if($isCreatedInvoice){
									      	 	$msg = array('success' => true, 'message' => 'You`ve successfully update payment and check-out');
							      	     }else{
							      	 	    $msg = array('success' => false, 'message' => 'Can`t create invoice.');
									   }
								  }else{
							      	$msg = array('success' => false, 'message' => 'Can`t update tblpayment. Try again.');
							    }  
				         }else{
	      	     	     $msg = array('success' => false, 'message' => 'Can`t update reservation status.');
	      	           }
				      	        
		      	    }
		    echo json_encode($msg);
				}
				else {
					 $msg['success'] = false;
					 echo json_encode($msg);
				}
			 break;
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
								$_SESSION["successMsg"] = '<h2>Successfully created your account.</h2>
                            <span>Please check your email to confirm your account registration!</span>';
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
		  case 'reserved':
		  		if($type == 'read') {
					$result = $this->Admin_model->admin_read('admin-dashboard','','reserved');
					 $msg = array('success' => false, 'data' => $result);
					if($result){
						$msg = array('success' => true, 'data' => $result);
					}
					 echo json_encode($msg);
				}
		  	break;

		   case 'maintenance':
		   		if($type == 'create') {
				    $tbl = $this->uri->segment(5);
					$tbl_data = $this->uri->segment(6);
					$result = $this->Admin_model->create($tbl,$tbl_data);
					$msg['success'] = false;
					if($result){
						$msg['success'] = true; 
					}
					echo json_encode($msg);
				}elseif($type == 'create-sub-category') {

					$count = count($_FILES['file_upload']['name']);
					$input = 'file_upload';
					$folder = 'acommodationfile';
					$uploadfile = $this->updloadMultiplefile($count,$input, $folder);

					$tbl = $this->uri->segment(5);
					$tbl_data = $this->uri->segment(4);
					 $resultCreate = $this->Admin_model->create($tbl, $tbl_data);
					$msg = array('success' => false);
					if($uploadfile || $resultCreate){
						$msg = array('success' => true);
					}
					echo json_encode($msg);
				}elseif($type == 'update') {
				    $id = $this->uri->segment(6);
					$result = $this->Admin_model->update($id, 'home_section_d', 'maintenance');
					$msg = array('success' => false);
					if($result){
						$msg = array('success' => true);
					}
					echo json_encode($msg);
				}elseif($type == 'update_settings') {
				    $value = $this->uri->segment(5);
				    $where = array('slug_name' => 'days_reservation');
				    $data = array('value' => $_POST["reservationDaysRange"]);
					$result = $this->Admin_model->update_settings($where, 'settings', $data);
					$msg = array('success' => false);
					if($result){
						$msg = array('success' => true);
					}
					echo json_encode($msg);
				}elseif($type == 'update_events') {
				    $where = array('occasion_id' => $_POST["eventId"]);
				    $data = array('occasion_status' => $_POST["stat"]);
					$result = $this->Admin_model->update_settings($where, 'tbloccasion_type', $data);
					$msg = array('success' => false);
					if($result){
						$msg = array('success' => true);
					}
					echo json_encode($msg);
				}elseif($type == 'updateIcon'){

					$config['upload_path'] = './assets/img/icon';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 1000;
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("attachment")){
						$msg = array('success' => false);
						echo json_encode($msg);
					}else{ 
						$data = $this->upload->data();
					   	$update = array('company_icon' => $data["file_name"]);
				    	$where = array('id' => $this->uri->segment(6));
				    	$result = $this->Admin_model->updateIcon('home_section_d', $update, $where);
				    	$msg = array('success' => false);
				    	if($result){
			               $msg = array('success' => true);
				    	}
				    	echo json_encode($msg);
					}
			
				}elseif($type == 'updatelogo'){

					$config['upload_path'] = './assets/img/logo';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = 1000;
					$config['encrypt_name'] = TRUE;

					$this->load->library('upload', $config);

					if(!$this->upload->do_upload("attachment1")){
						$msg = array('success' => false);
						echo json_encode($msg);
					}else{ 
						$data = $this->upload->data();
					   	$update = array('company_logo' => $data["file_name"]);
				    	$where = array('id' => $this->uri->segment(6));
				    	$result = $this->Admin_model->updateIcon('home_section_d', $update, $where);
				    	$msg = array('success' => false);
				    	if($result){
			               $msg = array('success' => true);
				    	}
				    	echo json_encode($msg);
					}
			
				 }elseif($type == 'update-category') {
				 	$tbl = $this->uri->segment(5);
				    $id = $this->uri->segment(6);
				    $tbldata = $this->uri->segment(7);
					$result = $this->Admin_model->update($id, $tbl, $tbldata);
					$msg = array('success' => false);
					if($result){
						$msg = array('success' => true);
					}
					echo json_encode($msg);
				}
				 //elseif($type == 'read') {
				// 	$where =  array('id' => $this->uri->segment(6));
				// 	$result = $this->Admin_model->admin_read('admin-dashboard', $where,'adminsideaccomodation_categories_fetch');
				// 	 $msg = array('success' => false);
				// 	if($result){
				// 		$msg = array('success' => true, 'data' => $result);
				// 	}
				// 	 echo json_encode($msg);
				// }
		  	break;
		  	case 'read-settings':
		  		$this_slug = $this->uri->segment(4);
				$where = "slug_name = '".$this_slug."'";
				$result = $this->Admin_model->admin_read('admin-dashboard', $where, 'read-settings');
				$msg = array('success' => false);
				if($result){
					$msg = array('success' => true, 'data' => $result); 
				}
				echo json_encode($msg);
		  		break;
		}
	}

	function notifications(){

		$where = $this->uri->uri_to_assoc(3);

		$result = $this->Admin_model->admin_read('admin-dashboard', $where, 'read-notifications');
		$msg = array('success' => false);
		if($result){
			$msg = array('success' => true, 'data' => $result); 
		}
		echo json_encode($msg);
	}

	function notifications_read(){

		$result = $this->Admin_model->admin_read('admin-dashboard', '', 'read-notifications-all');
		$msg = array('success' => false);
		if($result){
			$msg = array('success' => true, 'data' => $result); 
		}
		echo json_encode($msg);
	}

	function updloadMultiplefile($count, $inputfile, $folder){

		for($i = 0; $i < $count; $i++){

			if(!empty($_FILES[$inputfile]['name'][$i])){

			$_FILES['file']['name'] = $_FILES[$inputfile]['name'][$i];
			$_FILES['file']['type'] = $_FILES[$inputfile]['type'][$i];
			$_FILES['file']['tmp_name'] = $_FILES[$inputfile]['tmp_name'][$i];
			$_FILES['file']['error'] = $_FILES[$inputfile]['error'][$i];
			$_FILES['file']['size'] = $_FILES[$inputfile]['size'][$i];

				$config['upload_path'] = './assets/img/'.$folder;
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size'] = 1000;
				$config['encrypt_name'] = TRUE;

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload("file")){
					return false;
				}else{ 
					$data = $this->upload->data();
					$catID = $this->uri->segment(6);
					$dataArr = array(
						'Category_Id' => $catID,
						'Subcategory_Id' => $this->input->post('sub_cat_id'),
						'imgfile_name' => $data["file_name"]);
			    	$result = $this->Admin_model->uploadmultiplefile('categories_file', $dataArr);
					if($i > $count && $result && $data){
						return true;
					}
				}
			}else{
				return false;
			}
		}
		return true;
	}

	function generateRandomString($length=10) {
	    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

 function generatepdf(){


     	$data["title"] = "Hoyoland Eco-Tropical Resort | Invoice";
     	$OR = $this->uri->segment(3);
     	//old version
     	// $whereOR = "invoice = '".$OR."' AND ispaid = 0";
     	$whereOR = "invoice = '".$OR."'";

        $data['sectionD'] = $this->Admin_model->admin_read('client-page','','home_section_d');
		$data['issue_invoice'] = $this->Admin_model->admin_read('admin-dashboard', $whereOR ,'issue_invoice');
		$RCode = "RCode = '".$data["issue_invoice"]["RCode"]."'";
		$data['reservation_info'] = $this->Admin_model->admin_read('admin-dashboard', $RCode ,'reservation_info');
		$data['client_info'] = $this->Admin_model->admin_read('admin-dashboard', $RCode ,'client_info');

        $data['res_details'] = $this->Admin_model->admin_read('admin-dashboard', array('invoice' => $OR) ,'read_res_details');

        $client_email = $data['client_info']["Email"];
	    $html2 = $this->load->view('admin/send-invoice', $data, true);
	    $filename = 'Hoyoland-'.$RCode;
	    $create_file = $this->createPDF($html2, $filename, false);
	    if($create_file){
	    	$sendEmail = $this->send_email_notif($create_file, $client_email);
	    	if($sendEmail){
	    		redirect('home/reservation/pending/sendEmail/true');
	    	}else{
	    		redirect('home/reservation/pending/sendEmail/false');
	    	}
	    }else{
	    	redirect('home/reservation/pending/creatingpdffile/false');
	    }
 }

  function createPDF($html, $filename='', $download=TRUE , $paper='A4', $orientation='portrait'){ 

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
        $path = './assets/file/send-invoice-file/'.$filename.'.pdf';
        $file = $dompdf->output();
        if(!file_put_contents($path, $file)){
        	return false;
        }else{
        	return $path;
        }
        //$this->send_email_notif($file, $email);
        // if($download)
        //     $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        // else
        //     $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }

    function send_email_notif($file, $email){
        
        $message = "Thank you for paying your bill. Please see the details in PDF attach file.";
    	$this->email->set_mailtype("html");
		$this->email->from('hoyoecoresort@gmail.com', 'Hoyoland Eco-Tropical Resort');
		$this->email->to($email);
		$this->email->subject('Hoyland Resort | Invoice');
		$emailContent = '<!DOCTYPE><html><head></head><body>';
	    $emailContent .= $message;
	    $emailContent .= '</body></html>';
	    $this->email->attach($file);
	    $this->email->message($emailContent);
        $result = $this->email->send();
		if($result){
			unlink($file);
			return true; 
		}
		return false;
    }

    function send_email_notification_for_resched($lname, $code, $email, $entryCode, $dateCheckIn, $Rtype){
        
        $message = "<p>Good day Mr/Ms. ".$lname.":</p><br><br>
        			 <p>We regret to inform you that your reservation you have made has been given to another customer who was able to pay first the 50% downpayment.<br> Hoyoland Eco-Tropical Resort is happy to serve and work with you on another date/s available in case you are still interested to pursue the said event.</p><br><br>
        			 <p>Reservation Code: ".$code." </p>
        			 <p>Reserved Date: ".$dateCheckIn."</p>
        			 <p>Type: ".$Rtype."</p><
        			 <p>Status: For Re-schedule</p><br>
        			 <p>Would you like to re-schedule your reservation?.</p>
        			 <h6><a href=".base_url()."Client/credentials/rsched/".$entryCode."/".$code.">Yes</a></h6><br><br>
        			 <h6><a href=".base_url()."Client/credentials/cancel/".$entryCode."/".$code.">No</a></h6>";
    	$this->email->set_mailtype("html");
		$this->email->from('hoyoecoresort@gmail.com', 'Hoyoland Eco-Tropical Resort');
		$this->email->to($email);
		$this->email->subject('For Re-Schedule.');
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

    function send_email_notification_for_approved($lname, $code, $email, $dateCheckIn, $Rtype){

    	$message = "<p>Good day Mr/Ms. ".$lname.":</p><br><br>
        			 <p>Your reservation is now confimed.</p><br><br>
        			 <p>Reservation Code: ".$code." </p><br>
        			 <p>Reserved Date: ".$dateCheckIn."</p><br>
        			 <p>Type: ".$Rtype."</p><br>
        			 <p>Status: Confirmed</p><br>";
    	$this->email->set_mailtype("html");
		$this->email->from('hoyoecoresort@gmail.com', 'Hoyoland Eco-Tropical Resort');
		$this->email->to($email);
		$this->email->subject('Reservation was confirmed');
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

    // function test($id){
    // 	$result = $this->Admin_model->computeTotalbill($id);
    // 	print_r($result);
    // }

}

?>