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
     * 获取网站基本配置信息 & 用户信息
     *
     * @author chunze.huang
     */
    public function get_configs()
    {
        $query = $this->db->query('SELECT `id`, `key`, `value`, `type` FROM `xwd_configs`');
        foreach ($query->result_array() as $row) {
            $GLOBALS['configs'][$row['key']] = $row['value'];
        }
        $GLOBALS['configs']['logined_in'] = $this->session->userdata('logined_in');

        // 判断用户登陆状态 设置默认session
        $login_stat = $this->session->userdata('logined_in') ? $this->session->userdata('logined_in') : false;
        if(!$login_stat){
            $this->session->set_userdata('role', 'guest');
            $this->session->set_userdata('group_id', 1);
        }
    }


    /**
     *
     * 获取分类信息
     */
    public function get_category_info()
    {
        $sql   = "SELECT `cat_id`,`cat_name`,`mark`,`highlight` FROM `xwd_category` WHERE `pid` = 0 ORDER BY sort ASC";
        $query = $this->db->query($sql);

        foreach ($query->result_array() as $key => $row) {
            $row['url']                     = app_url('ask/cat/'.$row['mark']);
            $GLOBALS['category_info'][$key] = $row;
            $sql                            = "SELECT `cat_id`,`cat_name`,`mark`,`highlight` FROM `xwd_category` WHERE `pid` = {$row['cat_id']} ORDER BY sort ASC ";
            $query                          = $this->db->query($sql);

            foreach ($query->result_array() as $k => $res) {
                $res['url']                                 = app_url('ask/cat/'.$res['mark']);
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


    /**
     * 登陆后执行存入session操作
     *
     * @param array $row
     * @param int   $autologin 2:退出登录； 1：记录7天； 0：浏览器进程
     */
    public function set_logined_cookie( $autologin = 0,$row = array()){
        if($autologin == 1){
            $cookie_time = time()+(3600*24*7);
        }else{
            $cookie_time = 0;
        }

        if($autologin ===2){
            $cookie_time = time()-3600;
        }

        $this->load->library('session');
        setcookie('logined_in', $this->session->userdata('logined_in'), $cookie_time, '/', '966069.com');
        setcookie('username', $this->session->userdata('username'), $cookie_time, '/', '966069.com');
        setcookie('uid', $this->session->userdata('uid'), $cookie_time, '/', '966069.com');
        setcookie('group_id', $this->session->userdata('group_id'), $cookie_time, '/', '966069.com');
    }


}