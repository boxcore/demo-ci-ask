<?php
class User_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }
    
    public function verify_login($pram)
    {   
    	$username = $pram['username'];
    	$password = md5($pram['password']);
    	$sql = "SELECT * FROM `xwd_user` WHERE `username` = '".$username."' AND `password` = '".$password."'";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }
    
    public function add_user($parm)
    {	
      	$data = array(
    			'username' => $parm['username'],
    			'password' => md5($parm['password']),
      			'nick_name' => $parm['nickname'],
    			'lastlogin' => time(),
    			'regtime' => time()
    		);
    	$this->db->insert('xwd_user', $data);
    	return 1;
    }
    
    public function get_user_info($id)
    {
    	$sql = "SELECT * FROM `xwd_user` WHERE `uid` = ".$id;
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }
}
?>