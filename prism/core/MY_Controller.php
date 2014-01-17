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
        $this->load->database();
        self::get_configs();
        $this->check_login();

    }

    protected function check_login()
    {
        if ( ! $this->session->userdata('logined_in'))
        {
            if(uri_string() != 'user/login'){
                redirect('user/login');
            }
        }

    }

    public function get_configs()
    {

        $query = $this->db->query('SELECT `id`, `key`, `value`, `type` FROM `xwd_configs`');
        foreach ($query->result_array() as $row)
        {
            $GLOBALS['configs'][$row['key']] = $row['value'];
        }

        // 设置后台个性选项
        $admin_page_num =   $this->session->userdata('admin_page_num');
        if(empty($admin_page_num)){
            $this->session->set_userdata('admin_page_num', $GLOBALS['configs']['admin_page_num']);
        }
        if($this->input->post('numPerPage')){
            $this->session->set_userdata('admin_page_num', $this->input->post('numPerPage'));
        }
    }

    /**
     * 给DWZ返回ajax查询成功状态
     * @param $status
     * @param $msg
     */
    protected function ajaxReturns($status,$msg){
        $result=array(
            "statusCode"   => $status, //在dwz 中，成功200 失败300
            "message"      => $msg,
            "navTabId"     => isset($_REQUEST['navTabId']) ? $_REQUEST['navTabId'] : '',
            "callbackType" => isset($_REQUEST['callbackType']) ? $_REQUEST['navTabId'] : '',
            "forwardUrl"   => isset($_REQUEST['forwardUrl']) ? $_REQUEST['navTabId'] : '',
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