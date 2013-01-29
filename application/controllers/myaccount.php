<?php
require_once 'basememberpages.php';

class MyAccount extends BaseMemberPages
{
	public function __construct()
	{
		parent::__construct();				
	}
	
	public function view()
	{
		$data['moeha'] = 'dus';		
		$this->load->view('memberpages/myaccount', $data);
	}
}
?>