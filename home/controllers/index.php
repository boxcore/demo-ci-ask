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

    	$this->load->model('QuestionModel');
    	$data['info'] = $this->QuestionModel->get_question_attention();
        foreach( $data['info'] as &$v){
            $v['url'] = built_detail_url('ask', $v['id']);
        }

        $this->load->model('flink_model');
        $data['friend_links'] = $this->flink_model->getLinkByMark('index');

        $data['page_name'] = 'index';

    	$this->load->library('layout');
        $this->layout->view('index', $data);
    }

    public function main()
    {
        $this->load->view('main');
    }

    public function changecity()
    {
        $data = array();
        $this->load->view('changecity', $data);
    }

    public function city_index()
    {
        $data = array();
        $this->load->view('city_index', $data);
    }

    public function city_list()
    {
        $data = array();
        $this->load->view('city_list', $data);
    }

    public function city_zixun()
    {
        $data = array();
        $this->load->view('city_zixun', $data);
    }

    public function info()
    {
        $data = array();
        $this->load->view('info', $data);
    }
}