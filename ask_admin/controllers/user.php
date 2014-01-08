<?php

/**
 * 问题管理
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class user extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('question/index');

    }

    public function question_list()
    {
        $this->load->view('question/question_list');

    }

    public function question_add()
    {
        $this->load->view('question/question_add');

    }

    public function question_edit()
    {
        $this->load->view('question/question_edit');
    }

    public function question_recycle()
    {
        $this->load->view('question/question_recycle');

    }

    public function question_del()
    {
    }

}