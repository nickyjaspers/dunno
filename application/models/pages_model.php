<?php
class Pages_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getPage($id)
	{
		if (empty($id))
		{
			return null;
		}			

		$page = null;
		
		$query = $this->db->get_where('page', array('id' => $id));
		if ($query->num_rows() > 0)
		{
			$page = $query->result()[0];			
		}
			
		return $page;
	}
}
?>