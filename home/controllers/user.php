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
    		$username = $this->input->post('username');
    		$password = $this->input->post('password');
    		
    		$this->load->model('User_model');
    		$res = $this->User_model->verify_login($username, $password);
    		
    		if ($res) {
    			$data = $res[0];
    			$this->session->set_userdata($data);
    			$this->load->helper('url');
				redirect('user/center', 'refresh');
    		} else {
    			$data = array('info' => '用户名或者密码错误', 'status' => 0);
    			$this->load->helper('url');
				redirect('user/login', 'refresh');
    		}
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
    	if ($_POST) {
    		$user 		= $this->input->post('username');
    		$nickname   = $this->input->post('nickname');
    		$password 	= $this->input->post('password');
    		$repassword = $this->input->post('repassword');
    		
//    		if (!$user) {
//    			$data = array('info' => '用户名不能为空!', 'status' => '0');
//    		}
//    		
//    		if (!$password) {
//    			$data = array('info' => '密码不能为空!', 'status' => '0');
//    		}
//    		
//    		if (!$repassword) {
//    			$data = array('info' => '重复密码不能为空!', 'status' => '0');
//    		}
//    		
//    		if ($password !== $repassword) {
//    			$data = array('info' => '两次输入的密码不一致!请重新输入', 'status' => '0');
//    		}
    	
    		$this->load->model('User_model');
    		$res = $this->User_model->verify_login($user, $password);
    		
    		if ($res) {
    			$data = $res[0];
    			$this->session->set_userdata($data);
    			$this->load->helper('url');
				redirect('user/center', 'refresh');
    		} else {
				$data = $this->User_model->add_user($user, $password);
				$this->session->set_userdata($data);
    			$this->load->helper('url');
				redirect('user/center', 'refresh');
    		}
    	}
    }
}