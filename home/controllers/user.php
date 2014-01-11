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
    	if ($_POST){
    		$user_name 	  = $this->input->post('user');
    		$password = $this->input->post('password');
    		
    		$this->load->model('User_model');
    		$res = $this->User_model->verify_login($user_name, $password);
    		var_dump($res);
    	}
    }
    
    
    /**
     * 用户注册
     */
    public function register()
    {
        $this->load->view('user/user_register');
    }
    
	/**
	 * 
	 * 添加用户
	 */
    public function add_user()
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
    	$this->db->insert('xwd_user', $data);
    	
    	//$this->session->set_userdata($data);

    	//$temp = $this->session->all_userdata();
//    	var_dump($this->session->all_userdata());
    }
}