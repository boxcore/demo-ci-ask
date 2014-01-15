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

        print_r( $query->result_object() );
    }

    /**
     * sql 练习
     */
    public function sql()
    {
        /** 多行结果查询 */
//        $this->db->select('uid, groupid')->from('user')->where('username', 'admin');
//        $query = $this->db->get();
//        print_r($query->result_array()); //输出最后执行的sql语句

         /* 单行结果查询 */
//        $query = $this->db->select('uid, groupid')->from('user')->where('username', 'admin')->limit(1)->get();
//        print_r($query->result_array());

        /* 单结果查询 */
        $query = $this->db->select('uid,username,groupid')->from('user')->where('username', 'admin')->limit(1)->get();
        echo $query->num_rows();  // 查看由多少个结果集

        $row = $query->row(); //对象类型
        $row_array = $query->row_array(); // 数组类型
        print_r($row_array);

        echo '<hr/>'.$this->db->last_query();
    }

}