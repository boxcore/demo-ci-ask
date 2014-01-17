<?php

/**
 * 问题管理
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class answer extends
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
        $this->load->view('answer/index');

    }

    public function answer_list()
    {
        $this->load->view('answer/answer_list');

    }

    public function answer_verify()
    {
        $this->load->view('answer/answer_verify');

    }

    public function answer_edit()
    {
        $this->load->view('answer/answer_edit');
    }

    public function answer_recycle()
    {
        $this->load->view('answer/answer_recycle');

    }

    public function answer_del()
    {
    }

}