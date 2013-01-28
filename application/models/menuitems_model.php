<?php
class MenuItems_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function getMenuItem($id)
	{
		if (empty($id))
		{
			return null;
		}			

		$menuItem = null;
		
		$query = $this->db->get_where('menuitem', array('id' => $id));
		if ($query->num_rows() > 0)
		{
			$menuItem = $query->result()[0];			
		}
			
		return $menuItem;
	}

	public function getMenuItems()
	{
		return $this->db->get('menuitem')->result();
	}
}
?>