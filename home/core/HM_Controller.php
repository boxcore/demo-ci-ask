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

    public function get_configs()
    {

        $query = $this->db->query('SELECT `id`, `key`, `value`, `type` FROM `xwd_configs`');
        foreach ($query->result_array() as $row)
        {
            $GLOBALS['configs'][$row['key']] = $row['value'];
        }

    }

    /**
     * 
     * 获取分类信息
     */
    public function get_category_info()
    {
    	$sql = "SELECT `id`,`name`,`mark`,`highlight` FROM `xwd_category` WHERE `pid` = 0 ORDER BY sort ASC";
    	$query = $this->db->query($sql);
    	
    	foreach ($query->result_array() as $key => $row)
    	{
    		$GLOBALS['category_info'][$key] = $row;
    		$sql = "SELECT `id`,`name`,`mark`,`highlight` FROM `xwd_category` WHERE `pid` = {$row['id']} ORDER BY sort ASC ";
    		$query = $this->db->query($sql);
    		
    		foreach ($query->result_array() as $k => $res) 
    		{
    			$GLOBALS['category_info'][$key]['sort'][$k] = $res;
    		}
    	}
    }

}