<?php

class MemberPages extends CI_Controller
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
		$this->load->model('pages_model');
		
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

		$data['all_menu_items'] = array(1,2,3,4,5,6);
		$data['selected_menu_item'] = 2;
		
		$data['page'] = $this->pages_model->getPage(1);
		
		unset($data['all_menu_items'][$data['selected_menu_item']]);
		
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