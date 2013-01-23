<?php

class Sayings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('sayings_model');
	}

	public function get_sayings()
	{
		$data['sayings'] = $this->sayings_model->get_sayings();		
		print_r($data['sayings']);
	}
	
	public function get_saying($id)
	{
		$data['sayings'] = $this->sayings_model->get_sayings($id);
		print_r($data['sayings']);
	}
	
	public function get_random_saying()
	{	
		echo $this->sayings_model->get_random_saying()['saying'];
	}
}

?>