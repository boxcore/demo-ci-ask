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


    /**
     * 项目控制器默认入口
     */
    public function index()
    {
        $data = array();
        $this->load->library('layout');
        $this->layout->view('item/item_index', $data);
    }

    /**
     * 项目分类页面
     */
    public function cat($mark = '')
   	{
    	echo $mark;
    }

    /**
     * 项目详情页面
     */
    public function detail($item_id = 0)
    {
    	echo $item_id;
    }

}