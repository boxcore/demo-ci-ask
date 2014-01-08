<?php

/**
 * 项目控制类
 *
 */
class Item extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('item/index');
    }

}