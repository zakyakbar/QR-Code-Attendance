<?php  

/**
* 
*/
class login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model("m_login");
	}

	function index(){
		if (!empty($this->session->userdata("email")))
			redirect(base_url("mahasiswa"));

		$this->load->view("v_login");
	}

	function login_proses(){
		$email=$this->input->post("email");
		$password=md5($this->input->post("password"));
		$user=$this->m_login->login($email,$password);
		
		if ($user) {
			$this->session->set_userdata((array)$user);
			redirect(site_url("mahasiswa"));
		}else{
			redirect($this->index("login"));
		}
	}

	function logout(){
		$array_items = array('id','username','password','nama','email','photo');
		$this->session->unset_userdata($array_items);
		redirect($this->index('login'));
	}
}
