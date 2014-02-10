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

}