<?php
class UserModel extends CI_Model {
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
    	$password = $pram['password'];

        if( $this->verify_username($username) ){
            $sql = "SELECT * FROM `xwd_user` WHERE `username` = '".$username."' AND `password` = '".$password."'";
            $query = $this->db->query($sql);
            $data = $query->row_array();
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

    /**
     * 注册用户
     *
     * @param $parm 创建用户的数据
     * @return bool
     */
    public function add_user($parm)
    {	
      	$data = array(
    			'username' => $parm['username'],
    			'password' => $parm['password'],
      			'nick_name' => $parm['nickname'],
    			'lastlogin' => time(),
    			'regtime' => time()
    		);
    	if($this->db->insert('xwd_user', $data)){
            return true;
        } else {
            return false;
        }
    }

    /**
     * 获取一条用户信息
     *
     * @param $user_id
     * @return mixed
     */
    public function get_user_info($user_id=0)
    {

    	$this->db->select("*")->from('user')->where('uid', $user_id);
    	$query = $this->db->get();
    	return $query->row_array();
    }

    /**
     * 返回用户别名
     *
     * @param int $user_id
     * @return string
     */
    public function getNicknameById($user_id=0)
    {
        if($user_id){
            $this->db->select('nick_name')->from('user')->where('uid', $user_id);
            $query = $this->db->get();
            if($query->num_rows()>0){
                return $query->row_array('nick_name');
            }
        }
        return '';
    }
}