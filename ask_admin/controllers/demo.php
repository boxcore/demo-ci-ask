<?php

/**
 * 系统配置管理
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class demo extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        echo 'index<hr>';
        $this->get_configs();

        $query = $this->db->query('SELECT `id`, `key`, `value` FROM `xwd_configs`');
        foreach ($query->result_array() as $row)
        {
            echo $row['id'];
            echo $row['key'];
            echo $row['value'];
        }
//        print_r($query);
        print_r( $query->result_object() );

    }

}