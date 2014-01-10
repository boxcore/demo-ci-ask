<?php

/**
 * 用户管理控制类
 * User: chunze.huang
 * Date: 14-1-6 上午10:49
 */
class User extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /**
     * 登陆页面
     */
    public function login()
    {
        if($this->session->userdata('logined_in'))
        {
            redirect('index');
        }

        // 初始化函数
        $this->load->helper('form');
        $this->load->library('form_validation');

        // 设置验证规则
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $this->form_validation->set_rules('username', '用户名', 'trim|required|min_length[5]|max_length[12]|xss_clean|callback_username_check');
        $this->form_validation->set_rules('password', '密码', 'trim|required|callback_password_check'); //|matches[passconf]
        //$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
        //$this->form_validation->set_rules('email', 'Email', 'required');

        $this->_username = $this->input->post('username');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('user/login');
        }
        else
        {
            $this->user_model->login($this->_username);
            $data['reffer'] = site_url().'index';
            $data['message'] = '您已经登陆，请返回操作面板';
            redirect('index');
        }
    }

    /**
     * 验证用户名
     * @param $username
     * @return bool
     */
    public function username_check($username)
    {
        if ($this->user_model->check_username($username) )
        {
            return true;

        }
        $this->form_validation->set_message('username_check', '用户名不存在！');
        return false;
    }


    /**
     * 验证密码
     * @param $password
     * @return bool
     */
    public function password_check($password)
    {
        if ( $this->user_model->check_password( $this->_username, md5($password) ) )
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('password_check', '用户名或密码不正确');
            return false;
        }

    }

    public function set_password()
    {
        $this->load->view('user/set_password');
    }

    public function set_password_save()
    {
        if ( $this->user_model->check_password( $this->session->userdata('username'), md5($password)) )
        {
            $data = array(
                'password' = $_POST['new_password'];
            );
            $where = "`username` = '$this->session->userdata('username')'";
            $flag = $this->db->update_string('xwd_user')
        }

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
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        $data = array('username' => '', 'logined_in' =>false);
        $this->session->unset_userdata($data);
        redirect('user/login');
    }




}