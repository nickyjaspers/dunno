<?php

class MemberPages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();				
		$this->load->library('session');		
		$this->load->library('form_validation');		
		
		$this->loadUserSessionData();
		
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('sayings_model');
		$this->load->model('users_model');
	}

	public function view($page = 'home')
	{		
		if ( ! file_exists('application/views/pages/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['sayings'] = $this->sayings_model->get_sayings();
		$data['userLoggedIn'] = $this->session->userdata('logged_in');
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
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