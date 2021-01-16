<?php 
/**
 * 
 */
class Error extends CI_Controller
{
	public function __construct(){
		parent::__construct();
	}

	function index(){
		$data["title"] = "Error";
		$this->load->view('errors/html/error_404');
	}
}

?>