<?php

/**
 * 文章控制类
 *
 */
class Article extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $this->load->view('article/index');
    }

}