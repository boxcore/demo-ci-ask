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

    /**
     * 文章控制器默认入口
     */
    public function index()
    {
        $this->load->view('article/index');
    }

    /**
     * 文章分类页面
     */
    public function cat($mark = '')
   	{
    	echo $mark;
        $this->load->view('article/article_cat');
    }

    /**
     * 文章详情页面
     */
    public function detail($article_id = 0)
    {
    	echo $article_id;
        $this->load->view('article/article_detail');
    }

}