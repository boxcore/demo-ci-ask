<?php

/**
 * 用户中心、用户登陆注册
 * 
 */
class User extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * 
     * 用户中心
     */
    public function center()
    {
        $this->load->view('user/user_center');
    }

    /**
     * 用户登陆
     */
    public function login()
    {
        $this->load->view('user/user_login');
    }

    /**
     * 
     * 验证登录
     */
    public function verify_login()
    {
    	var_dump($_POST);
    	if ($_POST){
    		$user 	  = $_POST['user'];
    		$password = $_POST['user'];
    		
    	}
    }
    
    
    /**
     * 用户注册
     */
    public function register()
    {
        $this->load->view('user/register');
    }
    
	/**
	 * 
	 * 添加用户
	 */
    public function addUser()
    {
    	$user = $_POST['user'];
    	$password = md5($_POST['password']);
    	
    	$query = $this->db->query('SELECT `username`,`password` FROM `xwd_user` WHERE 1=1');
    	$data1 = $query->result_array();
    	
    	$data = array(
    				'username' => $user,
    				'password' => $password,
    				'lastlogin' => time(),
    				'regtime' => time()
    			);
    	//$this->db->insert('xwd_user', $data);
    	
    	$this->session->set_userdata($data);

    	//$temp = $this->session->all_userdata();
//    	var_dump($this->session->all_userdata());
    }
}