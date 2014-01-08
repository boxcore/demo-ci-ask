<?php
/**
 * 应用核心扩展类
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class HM_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('app');
        $this->load->database();
        self::get_configs();
    }

    public function get_configs()
    {

        $query = $this->db->query('SELECT `id`, `key`, `value`, `type` FROM `xwd_configs`');
        foreach ($query->result_array() as $row)
        {
            $GLOBALS['configs'][$row['key']] = $row['value'];
        }

    }

    public function test()
    {
        echo 'i testing';
    }

}