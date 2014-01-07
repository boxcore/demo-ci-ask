<?php

/**
 * 系统配置管理
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class configs extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('configs/index');

    }

    public function configs_list()
    {
        $query = $this->db->query('SELECT `id`, `key`, `value`, `type` FROM `xwd_configs`');
        foreach ($query->result_array() as $row)
        {
            $cfgs[$row['key']] = $row['value'];
        }
        $data = array(
            'cfgs' => $cfgs,
        );

        $this->load->view('configs/configs_list', $data);

    }

    /**
     * 保存网站配置信息
     */
    public function configs_save()
    {
        //print_r($GLOBALS['configs']);
        $cfgs = isset($_POST['cfgs']) ? $_POST['cfgs'] : array();
        if ($cfgs){

            $symbo = 0;
            if ( count($cfgs) )
            {
                foreach( $_POST['cfgs'] as $key=>$value)
                {
                    $data = array('value' => $value);
                    $this->db->where('key', $key);
                    $symbo += $this->db->update('xwd_configs', $data );
                }
            }

            if($symbo)
            {
                $this->success_ajax('操作成功');
            }
            else
            {
                $this->error_ajax();
            }
        }




//        print_r($_REQUEST);
//        $data = array('value' => $_GET['value']);
//        $where = "`key` = '{$_GET['key']}'";
//        $str = $this->db->update_string('xwd_configs', $data, $where );//直接打sql 语句
//        echo '<hr>'.$str;
//        exit;
    }

    public function configs_add()
    {
        $this->load->view('configs/configs_add');

    }

    public function answer_del()
    {
    }

}