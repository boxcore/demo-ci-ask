<?php

/**
 * 用户管理控制类
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class City extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('city_model');
    }


    /**
     * 城市列表页面
     *
     * @author chunze.huang
     */
    public function city_list()
    {
        $data = array();
        $config=array();

        $this->load->library('pagination');
        // 定义分页URL，根据参数分别显示
        $config['bash_url'] = site_url('city/city_list');
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
            'name'      => $this->input->post('name'),
            'mark' => $this->input->post('mark'),
            'pid'  => $this->input->post('pid'),
            'is_city'  => $this->input->post('city'),
        );

        // 总条数
        $config['total_rows'] = $this->city_model->get_city_list_count($where);

        $data['city_list'] = $this->city_model->get_city_list($where, $offset,$config['per_page']);
//        foreach( $data['city_list'] as &$v ){
//            if($v['lastlogin']){
//                $v['lastlogin'] = date('Y-m-d H:i:s', $v['lastlogin']);
//            }else{
//                $v['lastlogin'] = '未登录过';
//            }
//        }

        $data['param'] = $where;
        $data['page_info'] = $config;
        $data['page_info']['pageNum'] = $pageNum;
        // 配置分页
        $this->pagination->initialize($config);

        $this->load->view('city/city_list', $data);
    }

    public function city_add()
    {
        $data = array();

        $this->load->view('city/city_add', $data);
    }

    public function city_add_act()
    {
        $data = array();

        $this->load->view('city/city_add', $data);
    }

    public function city_cat()
    {
        $data = array();

        $this->load->view('city/city_cat', $data);
    }

}