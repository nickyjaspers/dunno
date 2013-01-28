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
		$this->load->model('menuitems_model');
		
		$this->loadUserSessionData();
	}

	public function view($page = 'home', $selectedMenuItem = 1)
	{		
		if ( ! file_exists('application/views/memberpages/'.$page.'.php'))
		{
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		$data['sayings'] = $this->sayings_model->get_sayings();
		$data['userLoggedIn'] = $this->session->userdata('logged_in');

		if ($selectedMenuItem != null)
		{
			$data['all_menu_items'] = $this->menuitems_model->getMenuItems();
			$data['selected_menu_item'] = $this->menuitems_model->getMenuItem($selectedMenuItem);
			if ($data['selected_menu_item'] == null)
			{
				show_404();
			}
			$key = array_search ($data['selected_menu_item'], $data['all_menu_items']);
			unset($data['all_menu_items'][$key]);
		}
		
		$this->load->view('templates/header', $data);
		$this->load->view('memberpages/'.$page, $data);
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