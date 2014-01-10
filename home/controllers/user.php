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
     * 用户注册
     */
    public function register()
    {
        $this->load->view('user/register');
    }

}