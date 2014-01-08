<?php

/**
 * 问答控制类
 * 
 */
class Question extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->cat();
    }

    public function cat()
    {
        $this->load->view('question/question_list');
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
    public function detail()
    {
        $this->load->view('question/question_detail');
    }

}