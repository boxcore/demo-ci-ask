<?php

/**
 * 信息提醒
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class Message extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('message');
    }

}