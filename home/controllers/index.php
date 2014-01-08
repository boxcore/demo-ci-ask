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
        $this->load->view('index');
    }

    public function main()
    {
        $this->load->view('main');
    }
}