<?php

/**
 * 系统配置管理
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class XHR extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * 检测用户名是否存在
     */
    public function check_username()
    {
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : "";
        $data['flag'] = 0;
        if (!empty($username))
        {
            $this->load->model('user_model');
            if ($this->user_model->check_username($username))
            {
                $data['flag'] = 1;
            }
        }
        header('Content-type:text/json');
        echo json_encode($data);
    }

    public function check_email()
    {
        $data['email'] = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
        $data['flag'] = 0;
        if (!empty($data['email']))
        {
            $this->load->model('user_model');
            if ($this->user_model->check_email($data['email']))
            {
                $data['flag'] = 1;
            }
        }
        header('Content-type:text/json');
        echo json_encode($data);
    }

}