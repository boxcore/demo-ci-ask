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

    public function user_list()
    {
        //获取当前分页设置
        $numPerPage = (isset($this->input->post('numPerPage')) && !empty($this->input->post('numPerPage')))
                    ? $this->input->post('numPerPage') : 5;


//        $_GET['page'] = $this->input->post('pageNum');


        $config['bash_url'] = site_url('user/user_list');
        $config['total_rows'] = $this->db->count_all('user');
        $config['per_page'] = 5;

        $data = array(
            'currentPage' => $info['page'],
            'totalCount'  => $totle,
            'pagesize'    => $pagesize,
            'user_list'   => $query->result(),
        );

        $sql =  'select `a`.*, `b`.`grouptitle` from `xwd_user` as `a` '.
                'left join `xwd_usergroup` as `b` on `a`.`groupid` =`b`.`groupid`';
        $query = $this->db->query($sql);
        $data['user_list'] = $query->result();

        $this->load->view('user/user_list', $data);
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
        $username = $this->session->userdata('username');
        $old_password = md5( trim( $this->input->post('old_password') ) );
        $new_password = md5( trim( $this->input->post('new_password') ) ) ;

        if( $old_password == $new_password )
        {
            $this->error_ajax('新密码不能跟原来的密码相同！');die();
        }

        if ( $this->user_model->check_password( $username, $old_password ) )
        {
            $data = array('password' => $new_password,);
            $this->db->where( 'username', $username );
            if($this->db->update('xwd_user', $data)) $this->success_ajax('操作成功');
        }
        else
        {
            $this->error_ajax('密码错误');
        }
    }

    public function user_add ()
    {
        $this->load->view('user/user_add');
    }

    public function user_add_act ()
    {
        if ( !empty($_POST) )
        {
            $password = md5(trim($this->input->post('password')));
            $re_password = md5(trim($this->input->post('re_password')));
            if ( $password === $re_password )
            {
                $data = array(
                    'username' => trim($this->input->post('username')),
                    'password' => $password,
                    'groupid' => intval($this->input->post('groupid')),
                    'email' => trim($this->input->post('email')),
                    'regtime' => time(),
                );
                if($this->db->insert('user', $data))
                {
                    $this->success_ajax('用户添加成功');
                }
            }
        }
        $this->error_ajax();
    }


    public function user_delete()
    {
        $uid = $this->input->get('uid');
        if ($this->db->delete('xwd_user', array('uid' => $uid)))
        {
            $this->success_ajax( '删除成功' );
        }
        else
        {
            $this->error_ajax();
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