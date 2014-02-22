<?php

/**
 * 问题管理
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class Question extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
    }

    public function index()
    {
        $this->load->view('question/index');

    }

    public function question_list()
    {

        $data = array();
        $config = array();

        $this->load->library('pagination');
        // 定义分页URL，根据参数分别显示
        $config['bash_url'] = site_url('question/question_list');
        // 每页显示多少数据
        $config['per_page'] = $this->input->post('numPerPage') ? $this->input->post('numPerPage') :
            $this->session->userdata('admin_page_num');
        $config['uri_segment'] = 1;
        // 获取分页
        $pageNum = $this->input->post('pageNum') ? $this->input->post('pageNum') :1;
        if ($pageNum < 1) {
            $offset = 0;
        } else {
            $offset = $config['per_page']*($pageNum-1);
        }

        // 获取查询条件
        $where = array(
            'id'          => $this->input->post('id'),
            'province_id' => $this->input->post('province_id'),
            'city_id'     => $this->input->post('city_id'),
            'region_id'   => $this->input->post('region_id'),
            'sort_id'     => $this->input->post('sort_id'),
            'sub_id'      => $this->input->post('sub_id'),
            'author_id'   => $this->input->post('author_id'),
            'status'      => $this->input->post('status'),
            'title'       => $this->input->post('title'),
        );

        // 总条数
        $config['total_rows'] = $this->question_model->getQuestionListCount($where);

        $data['question_list'] = $this->question_model->getQuestionList($where, $offset,$config['per_page']);
        foreach( $data['question_list'] as &$v ){
            $v['cat_name'] = $this->question_model->getCatNameById($v['id']);
            if(empty($v['cat_name'])) {
                $v['cat_name'] = '未选择分类';
            }
            $v['region_name'] = $this->common_model->getCityNameById($v['region_id']);
        }

        $data['param'] = $where;
        $data['page_info'] = $config;
        $data['page_info']['pageNum'] = $pageNum;

        // 配置分页
        $this->pagination->initialize($config);

        $this->load->view('question/question_list',$data);

    }

    public function question_add()
    {
        $this->load->view('question/question_add');

    }

    public function question_edit()
    {
        $this->load->view('question/question_edit');
    }

    public function question_recycle()
    {
        $this->load->view('question/question_recycle');

    }

    public function question_del()
    {
    }

}