<?php

/**
 * 门户首页
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class Index extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index()
    {
    	$this->load->model('Question_model');
    	$data['info'] = $this->Question_model->get_question_attention();

        $this->load->model('flink_model');
        $data['friend_links'] = $this->flink_model->getLinkByMark('index');

    	$this->load->library('layout');
        $this->layout->view('index', $data);
    }

    public function main()
    {
        $this->load->view('main');
    }
}