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

    public function center()
    {
        $this->load->view('center');
    }

    /**
     * 用户登陆页
     */
    public function login()
    {
        $this->load->view('user/login');
    }

    /**
     * 用户注册页
     */
    public function register()
    {
        $this->load->view('user/user_register');
    }

}