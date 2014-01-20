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
    		$pram['username'] = $this->input->post('username');
    		$pram['password'] = $this->input->post('password');
    		
    		$this->load->model('User_model');
    		$res = $this->User_model->verify_login($pram);
    		
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
    		$pram['username'] 	= $this->input->post('username');
    		$pram['nickname']   = $this->input->post('nickname');
    		$pram['password'] 	= $this->input->post('password');
    		$pram['repassword'] = $this->input->post('repassword');

    		$this->load->model('User_model');
			$this->User_model->add_user($pram);
			echo 1;
    	}
    }
}