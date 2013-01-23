<?php

class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();				
		$this->load->library('session');		
		$this->load->library('form_validation');		
		
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('sayings_model');
		$this->load->model('users_model');
		
		$this->loadUserSessionData();
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
			$newdata = array('username'  => '',						 
							 'logged_in' => false
							);				
			$this->session->set_userdata($newdata);
		}
	}
	
	public function logon()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_userdata('logged_in', false);
			$this->view();
		}
		else
		{
			$user = $this->users_model->get_user($this->input->post('username'), $this->input->post('password'));
			if ($user != null)
			{
				$this->session->set_userdata('username', $user->username);						
				$this->session->set_userdata('logged_in', true);
			}			
			//redirect to member area
			redirect('member/home', $data);
		}
	}	

	public function logoff()
	{
		$this->session->set_userdata('logged_in', false);
		$this->view();
	}
}

?>