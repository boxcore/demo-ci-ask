<?php
class Question_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	function item_select_limit($start,$end)
	{
		$this->db->select('*');
		$this->db->limit($end,$start);
		$query = $this->db->get('item');
		return $query->result();
	}

	function item_insert($arr)
	{
		return $this->db->insert('item',$arr);
	}

	function item_select_all()
	{
		$this->db->select('*');
		$query = $this->db->get('item');
		return $query->result();
	}

	function item_delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('item');
	}
}

?>