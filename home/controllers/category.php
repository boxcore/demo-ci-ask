<?php

/**
 * 分类
 */
class Category extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index($mark)
    {
        $data = array();
        $tpl = '';

    	$this->load->model('Category_model');
        $data['cat_info'] = $this->Category_model->getCatInfo($mark);

        // 判断是否有分类
        if(!$data['cat_info']){
            show_404();exit;
        }

        if(!$data['cat_info']['pid']){
            $tpl = 'category_top';
        }else{
            $tpl = 'category_child';
        }

        // echo '<!-- ';print_r($data);echo " -->";

//    	$this->load->library('layout');
//        $this->layout->view('category/'.$tpl, $data);
        $this->load->view('category/'.$tpl, $data);

    }




    public function child($mark)
    {
        $this->load->model('Cat_model');
        $data['info'] = $this->Question_model->get_question_attention();
        foreach( $data['info'] as &$v){
            $v['url'] = built_detail_url('ask', $v['id']);
        }

        $this->load->model('flink_model');
        $data['friend_links'] = $this->flink_model->getLinkByMark('index');

        $this->load->library('layout');
        $this->layout->view('index', $data);
    }

}