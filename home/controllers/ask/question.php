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
    	$pram['sort'] = $this->input->get('sort');
    	$pram['sub']  = $this->input->get('sub');
    	
    	$this->load->model('Question_model');
    	$data['info'] = $this->Question_model->get_list($pram);
    	$this->load->library('layout');
        $this->layout->view('question/question_list', $data);
    }
    
    /**
     * 
     * 显示问答详情
     */
	public function detail()
    {
    	$qid = $this->input->get('qid');
    	$this->load->model('Question_model');
    	$res = $this->Question_model->get_question_by_id($qid);
    	$data['info'] 	= $res;
    	$data['answer'] = $this->Question_model->get_answer_by_id($qid);
    	$data['relate'] = $this->Question_model->relative_question($res);
    	$this->load->library('layout');
        $this->layout->view('question/question_detail', $data);
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
    
    public function answer_add() 
    {
    	if ($_POST) {
    		$content = $this->input->post('content');
    		$qid 	 = $this->input->post('qid'); 
    		$this->load->model('Question_model');
    		$this->Question_model->insert_answer($content, $qid);
    		echo 1;
    	}
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
    		$this->load->view('question/question_sub', $data);
    	}
    }
}