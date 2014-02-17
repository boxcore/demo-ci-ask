<?php

/**
 * 处理返回json数据
 *
 * -------------------------------------
 * flag: bool 处理成功状态
 * field： 相应处理字段
 * message: 客户端提醒信息
 * dada: 返回的数组
 * 
 */
class Xhr extends HM_Controller
{

    function __construct(){
        parent::__construct();
    }


    /**
     * Ajax验证登陆
     */
    public function ajax_verify_login()
    {
        header('Content-type:text/json');

        if( isset($_COOKIE['login_times']) && !empty($_COOKIE['login_times']) ){
            setcookie("login_times",$_COOKIE['login_times']+1,time()+3600*2);
        }else{
            setcookie("login_times",1,time()+3600*2);
        }

        $msg = array(
            'flag' => 0,
            'message' => '登陆出错',
            'field' => '',
            'login_times' =>  isset($_COOKIE['login_times']) ? $_COOKIE['login_times'] : 0,
        );

        if($_REQUEST){
//            $pram['username'] = $this->input->post('username');
            $pram['username'] = $_REQUEST['username'];
            $pram['password'] = md5(trim($_REQUEST['password']));

            if($pram['username'] && $pram['password'])
            {
                $this->load->model('User_model');
                if( $this->User_model->verify_username($pram['username']) )
                {
                    $row = $this->User_model->verify_login($pram);
                    if($row)
                    {
                        $data = array(
                            'uid'        => $row['uid'],
                            'username'   => $row['username'],
                            'logined_in' => true,
                            'groupid'    => $row['groupid'],
                        );
                        $this->session->set_userdata($data);
                        setcookie("login_times",0,time()-1);

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



}