<?php
class BaseMemberPages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();				
		//libs
		$this->load->library('session');		
		$this->load->library('form_validation');		
		//helpers
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		//models
		$this->load->model('sayings_model');
		$this->load->model('users_model');
		$this->load->model('pages_model');
		$this->load->model('menuitems_model');
		//user session data
		$this->loadUserSessionData();
	}

	private function loadUserSessionData()
	{
		if ($this->session->userdata('logged_in') == false)
		{
			//redirect to public home
			redirect('home', $data);
		}
	}
}
?>