<?php

/**
 * 广告控制类
 *
 */
class Ad extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('ad/index');
    }

}