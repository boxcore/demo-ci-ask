<?php
class Question_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    public function get_list($parm)
    {
    	$where = '';
    	if($parm['sort']) {
    		$where .= ' and `sort_id` = '.$parm['sort'];
    	}
    	
    	if($parm['sub']) {
    		$where .= ' and `sub_id` = '.$parm['sub'];
    	}
    	
    	$sql = "SELECT `id`, `title`, `answer_num` FROM `xwd_question` WHERE 1=1".$where." LIMIT 15";
    	$query = $this->db->query($sql);
		return $query->result_array();
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
    		'author' => '张三',
    		'create' => time()
    	);
    	
    	$this->db->insert('xwd_question', $data);
    	return 1;
    }
    
    public function get_question_attention()
    {
    	$sql = "SELECT `id`, `title`, `create`, `answer_num`, `preview_num` FROM `xwd_question` LIMIT 5";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }
    
    public function get_question_by_id($id)
    {
    	$sql = "UPDATE `xwd_question` SET `preview_num` = `preview_num` + 1 WHERE `id` ={$id}";
    	$this->db->query($sql);
    	
    	$sql = "SELECT * FROM `xwd_question` WHERE `id`={$id}";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }
    
    public function get_answer_by_id($id)
    {
    	$sql = "SELECT * FROM `xwd_answer` WHERE `qid`={$id}";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }
    
    public function relative_question($data){
    	if ($data[0]) {
    		$data = $data[0];
    		$where = '';
    		if ($data['province_id']) {
    			$where .= ' and `province_id` = '.$data['province_id'];
    		}
    		
    		if ($data['city_id']) {
    			$where .= ' and `city_id` = '.$data['city_id'];
    		}
    		
    		if ($data['region_id']) {
    			$where .= ' and `region_id` = '.$data['region_id'];
    		}
    			
    		if ($data['sort_id']) {
    			$where .= ' and `sort_id` = '.$data['sort_id'];
    		}
    		
    		if ($data['sub_id']) {
    			$where .= ' and `sub_id` = '.$data['sub_id'];
    		}
    		
    		if ($data['title']) {
    			$where .= " and `title` like '%{$data['title']}%'";
    		}
    		
	    	$sql = "SELECT * FROM `xwd_question` WHERE 1=1 ".$where.' LIMIT 3';
	    	$query = $this->db->query($sql);
	    	return $query->result_array();
    	}
    	
    	
    }
    
    public function insert_answer($content, $qid)
    {
    	$sql = "UPDATE `xwd_question` SET `answer_num` = `answer_num` + 1 WHERE `id` ={$qid}";
    	$this->db->query($sql);
    	
    	$data = array(
			'qid' => $qid,
    		'content' => $content,
    		'author' => '张三',
    		'authorid' => 1,
    		'time' => time()
    	);
    	
    	$this->db->insert('xwd_answer', $data);
    }
}
?>