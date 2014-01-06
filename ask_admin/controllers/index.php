<?php

/**
 * 后台首页
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class Index extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('index');

        //$this->load->config('app');

        //print_r($GLOBALS['app']['test']);
        //echo '<hr>'.site_url().'<hr>';
    }
}