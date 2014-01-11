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
    	return $sql;
    }
}
?>