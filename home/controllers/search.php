<?php

/**
 * 分类
 */
class Search extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }


    public function index()
    {
        $data = array();
        $data['keyword'] = isset($_REQUEST['k']) ? trim($_REQUEST['k']) : '';
        if($data['keyword']){
        }

        $this->load->library('layout');
        $this->layout->view('search', $data);
    }

}