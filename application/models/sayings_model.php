<?php
class Sayings_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_sayings($id = FALSE)
	{
		if ($id === FALSE)
		{
			$query = $this->db->get('saying');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('saying', array('id' => $id));		
		return $query->row_array();
	}
	
	public function get_random_saying()
	{			
		$sayings = $this->get_sayings();
		return $sayings[array_rand($sayings, 1)];
	}
}
?>