<?php
class User_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 取用户信息
     *
     * @param $pram 用户名和密码的数组
     * @return array
     */
    public function verify_login($pram)
    {
        $data = array();
    	$username = $pram['username'];
    	$password = md5($pram['password']);

        if( $this->verify_username($username) ){
            $sql = "SELECT * FROM `xwd_user` WHERE `username` = '".$username."' AND `password` = '".$password."'";
            $query = $this->db->query($sql);
            $data = $query->result_array();
        }
        return $data;

    }

    /**
     * 验证用户名
     *
     * @param string $pram
     * @return bool
     */
    public function verify_username($pram = '')
    {
        $username = trim($pram);
        if($username)
        {
            $this->db->select('username')->from('user')->where('username', $username);
            if( $this->db->count_all_results() ) return true ;
        }
        return false;

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