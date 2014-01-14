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

    /**
     * 
     * 添加
     */
    public function add()
    {
    	$this->load->model('Question_model');
    	$data['sort'] = $this->Question_model->get_sort_info();
    	$this->load->library('layout');
        $this->layout->view('question/question_add', $data);
    }
    
    public function check_add() 
    {
    	$sort = $this->input->post('sort') ? $this->input->post('sort') : '';
    	$sub  = $this->input->post('sub') ? $this->input->post('sub') : '';
    	$question = $this->input->post('question');
    	$content  = $this->input->post('content');
    	
    	if (empty($question)) {
    		$res = 0;
    	}
    	
    	if (empty($content)) {
    		$res = 0;
    	}
    	
    	$arr['sort'] = $sort;
    	$arr['sub']  = $sub;
    	$arr['question'] = $question;
    	$arr['content']  = $content;
    	
    	$this->load->model('Question_model');
    	$res = $this->Question_model->insert_question($arr);
    	
    	echo $res;
    } 
    
    public function get_sub_info()
    {
    	if ($_POST) {
    		$id = $this->input->post('id');
    		$this->load->model('Question_model');
    		$data['sub'] = $this->Question_model->get_sub_info($id);
    		$data['title'] = '信息发布';
    		$this->load->view('question/question_sub', $data);
    	}
    }
}