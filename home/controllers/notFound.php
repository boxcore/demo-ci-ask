<?php

/**
 * 门户首页
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class NotFound extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
    	$this->load->model('QuestionModel');
    	$data['info'] = $this->QuestionModel->get_question_attention();
//    	$this->load->library('layout');
        $this->load->view('404', $data);
    }

}