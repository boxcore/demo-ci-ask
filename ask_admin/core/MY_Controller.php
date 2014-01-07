<?php
/**
 * 应用核心扩展类
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class MY_Controller extends CI_Controller 
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

    /**
     * 给DWZ返回ajax查询成功状态
     * @param $status
     * @param $msg
     */
    protected function ajaxReturns($status,$msg){
        $result=array(
            "statusCode"=>$status, //在dwz 中，成功200 失败300
            "message"=>$msg,
            "navTabId"=> isset($_GET['navTabId']) ? $_GET['navTabId'] :'',
            "callbackType"=> isset( $_GET['callbackType'] ) ? $_GET['navTabId'] :'',
            "forwardUrl"=> isset( $_GET['forwardUrl'] ) ? $_GET['navTabId'] :'',
        );
        // 返回JSON数据格式到客户端 包含状态信息
        header("Content-Type:text/html; charset=utf-8");
        die(json_encode($result));
    }

    /**
     * 成功信息提醒
     * @param string $msg
     */
    function success_ajax($msg="操作成功"){
        $this->ajaxReturns(200,$msg);
    }

    /**
     * 失败信息提醒
     * @param string $msg
     */
    function error_ajax($msg="操作失败"){
        $this->ajaxReturns(300,$msg);
    }
}