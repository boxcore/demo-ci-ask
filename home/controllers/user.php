<?php

/**
 * 用户中心、用户登陆注册
 * 
 */
class User extends HM_Controller
{

    function __construct(){
        parent::__construct();
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
        $pram = array();
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


    /**
     * 用户中心首页
     */
    public function center(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_center',$data);
    }

    /**
     * 用户中心 - 资料管理
     */
    public function info(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_info',$data);
    }

    /**
     * 用户中心 - 个性设置
     */
    public function setting(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_setting',$data);
    }

    /**
     * 用户中心 - 修改密码
     */
    public function set_password(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_set_password',$data);
    }

    /**
     * 用户中心 - 问答管理列表
     */
    public function ask_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_ask_list',$data);
    }

    /**
     * 用户中心 - 我的回答列表
     */
    public function answer_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_answer_list',$data);
    }

    /**
     * 用户中心 - 我的留言列表
     */
    public function commit_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_commit_list',$data);
    }

    /**
     * 用户中心 - 我的文章列表
     */
    public function article_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_article_list',$data);
    }

    /**
     * 用户中心 - 我的足迹
     */
    public function tracks(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_tracks',$data);
    }

    /**
     * 用户中心 - 头像修改
     */
    public function avatar(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_avatar',$data);
    }


}