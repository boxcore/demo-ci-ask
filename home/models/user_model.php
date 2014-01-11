<?php
class User_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    public function verify_login($user, $password)
    {
    	if (!$user) {
    		return false;
    	}
    	
    	if (!$password) {
    		return false;
    	}
    	
    	$sql = "SELECT * FROM `xwd_user` WHERE `username` = ".$this->db->escape($user)." AND `password` = '".md5($this->db->escape($password))."'";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }
    
    public function add_user($user, $password)
    {
    	if (!$user) {
    		return false;
    	}
    	
    	if (!$password) {
    		return false;
    	}
    	
      	$data = array(
    			'username' => $user,
    			'password' => $password,
    			'lastlogin' => time(),
    			'regtime' => time()
    		);
    	$id = $this->db->insert_id('xwd_user', $data);
    	$res = $this->get_user_info($id);
    	
    	if ($res) {
    		$data = $res[0];
    	}
    	
    	return $res;
    }
    
    public function get_user_info($id)
    {
    	$sql = "SELECT * FROM `xwd_user` WHERE `uid` = ".$id;
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }
}
?>