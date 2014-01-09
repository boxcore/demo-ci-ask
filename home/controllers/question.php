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

    public function listAll()
    {
        $this->load->view('question/question_list');
    }
    
	public function detail()
    {
        $this->load->view('question/question_detail');
    }

    public function add()
    {
        $this->load->view('question/question_add');
    }
}