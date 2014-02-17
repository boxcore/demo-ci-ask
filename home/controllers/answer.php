<?php

/**
 * 回答控制类
 * 
 */
class Answer extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    	$this->load->library('layout');
        $this->layout->view('answer/index');
    }

}