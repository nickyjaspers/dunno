<?php
class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_user($username, $password)
	{
		if (empty($username) || empty($password))
		{
			return null;
		}			

		$user = null;
		
		$query = $this->db->get_where('user', array('username' => $username, 'password' => $password));
		if ($query->num_rows() > 0)
		{
			$user = $query->result()[0];			
		}
			
		return $user;
	}
}
?>