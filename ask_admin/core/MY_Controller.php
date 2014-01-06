<?php
/**
 * 应用核心扩展类
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class MY_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('app');
    }

}