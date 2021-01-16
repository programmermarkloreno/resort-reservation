<?php
class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Manila');
		// $this->load->model('Crud_model', 'crud');
		// $this->load->model('Login_model', 'login');
		// $this->load->model('Audit_model', 'audit_trail');
	}

	public function index(){

		$data['title'] = 'Hoyoland Resort | Log In';
		//$this->load->view('template/header', $data);
		$data['profile'] = $this->Admin_model->admin_read('admin-dashboard','1','company_profile');
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('admin/credentials/login', $data);
		$this->load->view('template/footer');
	}

	public function loginproc()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$results = $this->Admin_model->check_credentials($email, md5($password));
	
		if ($results != false || $results != '' ) {
			$accountType = $results[0]->account_type;
			
			if ($accountType == '1' || $accountType == '2') {

				$adminCurrentInfo = $this->Admin_model->get('users', array('acc_no' => $results[0]->acc_no), array(), '');
				$email = $adminCurrentInfo[0]->email;
				$fname = $adminCurrentInfo[0]->first_name;
				$lname = $adminCurrentInfo[0]->last_name;
				$photo = $adminCurrentInfo[0]->photo_path;
				$userId = $adminCurrentInfo[0]->acc_no;

				//$userscope = $this->crud->get('user_scope', array('user_type_id' => $adminCurrentInfo[0]->account_type), array(), '');

				$sessionArray = array(
				 	'user_email' => $email,
				 	'user_fname' => $fname, 
				 	'user_lname' => $lname,
					'user_id' => $userId,
					'user_type' => $accountType,
					'user_photo' => $photo,
					'islogged' => true,
					'isAdmin' => true
				);

				$this->session->set_userdata($sessionArray);

				//log login event to database for audit trail purposes
				$logData = array(
					'audit_action' => 'Login',
					'audit_module' => 'Access Module',
					'audit_description' => 'User logged in',
					'user_id' => $userId,
					'ip' => $this->input->ip_address(),
					'audit_date' => date('D, d F Y, h:i A')
				);
				$this->Admin_model->log_audit($logData);

				$this->notif_admin();

				echo 'successfully login '.json_encode($sessionArray);
				redirect('home/index');
				
			} elseif ($accountType == 3 || $accountType == 4) {
				//customer dashboard

			} elseif ($accountType == 5 || $accountType == 6) {
				//COD User and  Customer Service Dashoard

			} else {
				$error = 'Invalid login information';
				$this->session->set_flashdata('error', $error);
				redirect('login');
			}
		} else {
			$error = 'invalid login information';
			$this->session->set_flashdata('error', $error);
			redirect('login');
		}
	}

	function notif_admin(){

		$events = $this->Admin_model->get('tbldatetime', array('statusCode' => 1), array(), '');

		foreach ($events as $key => $value) {
			$in = date($value->CheckIn);
			$tommorow = date('m-d-Y', strtotime('+1 days'));
			$week = date('m-d-Y', strtotime('+7 days'));
			$needtopay = date('m-d-Y', strtotime('+8 days'));
			$client = $this->Admin_model->get('tblcustomer', array('CustomerId' => $value->CustomerId), array(), '');

			$reservaton = $this->Admin_model->get('tbldatetime', array('CustomerId' => $value->CustomerId), array(), '');

			if($in == $tommorow){
				 $mes = array(
						'customer_id' => $value->CustomerId,
						'reservation_id' => $value->RCode,
						'name' => $client[0]->Firstname.' '.$client[0]->Lastname,
						'subject' => 'We have expected guests tommorow.',
						'message' => 'Customer Id: '.$value->CustomerId.'/Reservation Code: '.$value->RCode.' Status: Confirmed /Event: '.$reservaton[0]->RType,
						'is_read' => 0,
						'date_created' => date('D, d F Y, h:i A')
					  );
				  $this->Admin_model->create_notification($mes);

			}elseif($in <= $week){
				  $mes = array(
						'customer_id' => $value->CustomerId,
						'reservation_id' => $value->RCode,
						'name' => $client[0]->Firstname.' '.$client[0]->Lastname,
						'subject' => 'We have upcoming events this week.',
						'message' => 'Customer Id: '.$value->CustomerId.'/Reservation Code: '.$value->RCode.'/Reserved date: '.$value->CheckIn.' Status: Confirmed /Event: '.$reservaton[0]->RType,
						'is_read' => 0,
						'date_created' => date('D, d F Y, h:i A')
					  );
				   $this->Admin_model->create_notification($mes);
			}elseif($in <= $needtopay){
				$mes = array(
						'customer_id' => $value->CustomerId,
						'reservation_id' => $value->RCode,
						'name' => $client[0]->Firstname.' '.$client[0]->Lastname,
						'subject' => 'This day is the deadline of there 50% downpayment. We need to inform customer that they are need to pay immediately.',
						'message' => 'Customer Id: '.$value->CustomerId.'/Reservation Code: '.$value->RCode.'/Reserved date: '.$value->CheckIn.' Status: Confirmed /Event: '.$reservaton[0]->RType,
						'is_read' => 0,
						'date_created' => date('D, d F Y, h:i A')
					  );
				   $this->Admin_model->create_notification($mes);
			}
		}
		return true;
	}

	public function logout(){

		// $logData = array(
		// 			'audit_action' => 'LogOut',
		// 			'audit_module' => 'LogOut Module',
		// 			'audit_description' => 'User logged out',
		// 			'user_id' => $_SESSION["user_id"],
		// 			'ip' => $this->input->ip_address(),
		// 			'audit_date' => date('D, d F Y, h:i A')
		// 		);
		// $this->audit_trail->log_audit($logData);

        $this->session->sess_destroy();
        redirect("login");
    }

	public function forgotPass(){

		$data['title'] = 'Hoyoland Resort | Forgot Password';
		$this->load->view('template/header', $data);
		$this->load->view('forgot-password');
		$this->load->view('template/footer');
	}

	public function register(){

		$data['title'] = 'Hoyoland Resort | Register';
		$this->load->view('template/header', $data);
		$this->load->view('register-new');
		$this->load->view('template/footer');
	}

	public function recover_password(){

		$data['title'] = 'Hoyoland Resort | Recover Password';
		$this->load->view('template/header', $data);
		$this->load->view('recover-password');
		$this->load->view('template/footer');
	}

	// public function verify(){
	//     $this->load->library('form_validation');
	// 	$this->form_validation->set_rules('txtuser', 'Username', 'required');
	// 	$this->form_validation->set_rules('txtpass', 'Password', 'required|callback_check_user');

	// 	if($this->form_validation->run()=== TRUE){
	// 		if($this->session->user_lvl == 1){
	// 			redirect('admin/home');
	// 		}else{
	// 			redirect('home');
	// 		}
	// 	}else{
	// 		$this->index();
	// 	}
	// }

	// public function check_user(){

	// 	$username = $this->input->post('txtuser');
	// 	$password = $this->input->post('txtpass');

	// 	$this->load->model('login_model');
	// 	$login = $this->login_model->login($username, $password);

	// 	if($login){
	// 		$sess_data = array(
	// 			'account_name' => $login['user_accountname'],
	// 			'user_lvl' => $login['user_lvl'],
	// 			'islogged' => TRUE);
	// 		$this->session->set_userdata($sess_data);
	// 		return true;
	// 	}else{
	// 		$this->form_validation->set_message('check_user', 'Invalid Username/password');
	// 		return false;
	// 	}
	// }

	// public function signup(){
		 
	// }
}
?>