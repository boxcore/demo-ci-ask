<?php

/**
 * 广告控制类
 *
 */
class Demo extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        //$this->load->view('ad/index');
    }

    public function show(){
        $data = array();

        $data['test'] = 124114;

        $this->load->library('layout');
        $this->layout->view('demo/show', $data);
    }

    public function cat(){
        header("Content-Type: text/html; charset=UTF-8") ;
        $this->db->select('mark,name')->from('category');
        $query = $this->db->get();
        $data = $query->result_array();

        foreach($data as $v){
            echo '//'. $v['name']."\n";
            echo '$route[\''. $v['mark'] .'\'] = "category/index/'. $v['mark'] .'";';
            echo "\n";
        }
    }

    public function city(){
        header("Content-Type: text/html; charset=UTF-8") ;
        $this->db->select('city_id,name')->from('city')->where('pid', 0)->order_by('sort desc, city_id asc');
        $query = $this->db->get();
        $data = $query->result_array();

        foreach($data as $v){
            //echo '//'. $v['city_id']."\n";
            //echo '$route[\''. $v['city_id'] .'\'] = "category/index/'. $v['name'] .'";';
            echo '<option value="' . $v['city_id'] . '">' . $v['name'] . '</option>';
            echo "\n";
        }
    }

}