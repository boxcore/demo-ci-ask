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

    /**
     * 
     * 显示问答列表
     */
    public function listAll()
    {
    	$this->load->library('layout');
        $this->layout->view('question/question_list');
    }
    
    /**
     * 
     * 显示问答详情
     */
	public function detail()
    {
    	$this->load->library('layout');
        $this->layout->view('question/question_detail');
    }

    public function add()
    {
        $this->load->view('question/question_add');
    }
}