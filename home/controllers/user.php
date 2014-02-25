<?php

/**
 * 用户中心、用户登陆注册
 *
 * @author chunze.huang
 * 
 */
class User extends HM_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->model('UserModel');
    }

    /**
     * 退出登录
     */
    public function logout()
    {
        $ses = array('username' => '', 'logined_in' =>false,'group_id'=>0, 'uid'=>0 );
        $this->session->unset_userdata($ses);
        $this->set_logined_cookie(2); // 2为清除登陆记录的cookie

        // redirect('user/login', 'refresh'); // 系统默认跳转方法

        // 跳转方法二
        $data = array();
        $data['url'] = isset($_REQUEST['rel']) ? $_REQUEST['rel'] : base_url('');
        $this->load->view('refresh', $data);

    }

    /**
     * 用户登陆
     */
    public function login()
    {
//        print_r($_COOKIE); //debug
        if($this->session->userdata('logined_in')){
            redirect('user/center', 'refresh');
        }
        $this->load->view('user/user_login');
    }

    /**
     * 用户窗口
     */
    public function login_frame()
    {
        if($this->session->userdata('logined_in')){

        }
        $this->load->view('user/user_login_frame');
    }

    /**
     * **
     * 验证登录
     */
    public function verify_login()
    {
        if ($_POST){
            $pram['username'] = $this->input->post('username');
            $pram['password'] = $this->input->post('password');

            $res = $this->UserModel->verify_login($pram);

            if ($res) {
                $data = $res[0];
                $this->session->set_userdata($data);
                $this->load->helper('url');
                redirect('user/center', 'refresh');
            } else {
                $data = array('info' => '用户名或者密码错误', 'status' => 0);
                $this->load->helper('url');
                redirect('user/login', 'refresh');
            }
        }
    }

    /**
     * Ajax验证登陆
     */
    public function ajax_verify_login()
    {
        header('Content-type:text/json');

        // 设置登陆次数cookie
        if( isset($_COOKIE['login_times']) && !empty($_COOKIE['login_times']) ){
            setcookie("login_times",$_COOKIE['login_times']+1,time()+3600*2);
        }else{
            setcookie("login_times",1,time()+3600*2);
        }

        $msg = array(
            'flag' => 0, // 通信成功标志
            'message' => '登陆出错', //提醒信息
            'field' => '', // 报错字段或区域
            'login_times' =>  isset($_COOKIE['login_times']) ? $_COOKIE['login_times'] : 0, // 返回的登陆次数
        );

        if($_REQUEST){
            $pram['username'] = $_REQUEST['username'];
            $pram['password'] = md5(trim($_REQUEST['password']));
            $autologin = isset($_REQUEST['autologin']) ? $_REQUEST['autologin'] : 0;

            if($pram['username'] && $pram['password'])
            {

                if( $this->UserModel->verify_username($pram['username']) )
                {
                    $row = $this->UserModel->verify_login($pram);
                    if($row)
                    {
                        $data = array(
                            'uid'        => $row['uid'],
                            'username'   => $row['username'],
                            'logined_in' => true,
                            'group_id'    => $row['group_id'],
                        );
                        $this->session->set_userdata($data);
                        setcookie("login_times",0,time()-1);//登陆成功，删除登陆次数的记录

                        // 同步登陆session到cookie
                        $this->set_logined_cookie($autologin);


                        $msg['flag'] = 1;
                        $msg['message'] = '登陆成功';

                    }
                    else
                    {
                        $msg['message'] = '密码不正确';
                        $msg['field'] = 'password';
                    }
                }
                else
                {
                    $msg['message'] = '用户名不存在';
                    $msg['field'] = 'username';
                }
            }
        }

        echo json_encode($msg, true);
    }


    
    /**
     * 用户注册
     */
    public function register()
    {
    	$this->load->view('user/user_register');
    }


    /**
     * AJAX添加用户
     *
     * @author chunze.huang
     */
    public function ajax_add_user()
    {
        $data['flag'] = 0;
        $data['message'] = '';

        $pram = array();
        if ($_POST) {
            $pram['username'] 	= $this->input->post('username');
            $pram['nickname']   = $this->input->post('nickname');
            $pram['password'] 	= md5(trim($this->input->post('password')));
            $pram['repassword'] = md5(trim($this->input->post('repassword')));

            if($pram['password'] !== $pram['repassword']){
                $data['message'] = '两次输入密码不正确！';
                $data['field'] = 'password';
                echo json_encode($data);exit;
            }


            if( $this->UserModel->verify_username($pram['username']) ){
                $data['message'] = '用户名已经被使用，请换个试试！';
                $data['field'] = 'username';
                echo json_encode($data);exit;
            }

            if($this->UserModel->add_user($pram)){


                // 设置为登陆状态
                $user_info['username'] = $pram['username'];
                $user_info['password'] = $pram['password'];
                $row = $this->UserModel->verify_login($user_info);
                if($row)
                {
                    $data['message'] = '注册成功！';
                    $data['flag'] = 1;
                    $tmp = array(
                        'uid'        => $row['uid'],
                        'username'   => $row['username'],
                        'logined_in' => true,
                        'group_id'    => $row['group_id'],
                    );
                    $this->session->set_userdata($tmp);

                    // 同步登陆session到cookie
                    $this->set_logined_cookie(0);

                    echo json_encode($data);exit;
                }

            }
        }
    }


    /**
     * 用户中心首页
     */
    public function center(){
        $data = array();
//        print_r($_COOKIE);// debug

//        echo $this->session->userdata('logined_in');
        $this->load->library('layout');
        $this->layout->view('user/user_center',$data);
    }

    /**
     * 用户中心 - 资料管理
     */
    public function info(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_info',$data);
    }

    /**
     * 用户中心 - 个性设置
     */
    public function setting(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_setting',$data);
    }

    /**
     * 用户中心 - 修改密码
     */
    public function set_password(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_set_password',$data);
    }

    /**
     * 用户中心 - 问答管理列表
     */
    public function ask_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_ask_list',$data);
    }

    /**
     * 用户中心 - 我的回答列表
     */
    public function answer_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_answer_list',$data);
    }

    /**
     * 用户中心 - 我的留言列表
     */
    public function commit_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_commit_list',$data);
    }

    /**
     * 用户中心 - 我的文章列表
     */
    public function article_list(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_article_list',$data);
    }

    /**
     * 用户中心 - 我的足迹
     */
    public function tracks(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_tracks',$data);
    }

    /**
     * 用户中心 - 头像修改
     */
    public function avatar(){
        $data = array();

        $this->load->library('layout');
        $this->layout->view('user/user_avatar',$data);
    }


}