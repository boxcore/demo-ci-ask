<?php
class Question_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    public function get_sort_info()
    {
		$sql = "SELECT `id`,`name`,`mark` FROM `xwd_category` WHERE `pid` =0 ORDER BY `sort` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
    }
    
	public function get_sub_info($id)
    {
		$sql = "SELECT `id`,`name`,`mark` FROM `xwd_category` WHERE `pid` ={$id} ORDER BY `sort` ASC";
		$query = $this->db->query($sql);
		return $query->result_array();
    }
    
    public function insert_question($arr)
    {
    	$data = array(
    		'sort_id' => $arr['sort'],
    		'sub_id' => $arr['sub'], 
    		'title' => $arr['question'], 
    		'description' => $arr['content'], 
    		'author_id' => 11, 
    		'author' => '张三'
    	);
    	
    	$this->db->insert('xwd_question', $data);
    	return 1;
    }
    
    public function get_question_attention()
    {
    	$sql = "SELECT * FROM `xwd_question` LIMIT 5";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    	
    }
}
?>