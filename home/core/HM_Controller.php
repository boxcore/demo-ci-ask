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
        $this->load->library('session');
        self::get_configs();
        self::get_category_info();
    }

    /**
     * 获取网站基本配置信息
     *
     * @author chunze.huang
     */
    public function get_configs()
    {
        $query = $this->db->query('SELECT `id`, `key`, `value`, `type` FROM `xwd_configs`');
        foreach ($query->result_array() as $row) {
            $GLOBALS['configs'][$row['key']] = $row['value'];
        }
    }


    /**
     *
     * 获取分类信息
     */
    public function get_category_info()
    {
        $sql   = "SELECT `id`,`name`,`mark`,`highlight` FROM `xwd_category` WHERE `pid` = 0 ORDER BY sort ASC";
        $query = $this->db->query($sql);

        foreach ($query->result_array() as $key => $row) {
            $row['url']                     = built_cat_url('www', $row['mark']);
            $GLOBALS['category_info'][$key] = $row;
            $sql                            = "SELECT `id`,`name`,`mark`,`highlight` FROM `xwd_category` WHERE `pid` = {$row['id']} ORDER BY sort ASC ";
            $query                          = $this->db->query($sql);

            foreach ($query->result_array() as $k => $res) {
                $res['url']                                 = built_cat_url('www', $res['mark']);
                $GLOBALS['category_info'][$key]['sort'][$k] = $res;
            }
        }
    }

    /**
     * 获取当前所在城市
     * @
     */
    public function cookie_city()
    {
        $CI = &get_instance();
        $host = $_SERVER['HTTP_HOST'];
        $ex = explode('.', $host);
        $ex_tot = count($ex);
        if( $ex_tot > 4 )
        {
            return false;
        }
        else
        {
            $CI->db->where('py', $ex[0]);
            $CI->db->where('check', 1);
            $query = $CI->db->get('region',1,0);

            if($query->num_rows() <= 0)
            {
                return false;
            }
            else
            {
                return $query->row_array();
            }
        }
    }
}