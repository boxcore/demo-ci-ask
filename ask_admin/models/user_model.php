<?php
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

    public function get_user_list($configs = array(), $limit = '')
    {
        $sql =  'select `a`.*,`b`.`grouptitle` from `xwd_user` as `a` '.
                'left join `xwd_usergroup` as `b` on `a`.`groupid` =`b`.`groupid` '.
                $this->_where($configs).
                ' order by uid desc '.$limit;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_user_list_count($configs)
    {
        $sql =  'select count(*) from `xwd_user` as `a` '.$this->_where($configs);
        $query = $this->db->query($sql);
        return $query->result();
    }

    private function _where($configs = array())
    {
        if (empty($configs)) return '';

        $where = array();
        if(!empty($configs['uid']))
        {
            $where[] = 'a.uid = '.$configs['uid'];
        }
        if(!empty($configs['groupid']))
        {
            $where[] = 'a.groupid = '.$configs['groupid'];
        }
        if(!empty($configs['status']))
        {
            $where[] = 'a.status = '.$configs['status'];
        }
        if(!empty($configs['username']))
        {
            $where[] = "a.`username` like '{$configs['username']}%'";
        }



        return ' where '.join('and ', $where);
    }



    /**
     * 添加用户session数据，设置用户在线状态
     * @param $username
     */
    public function login($username)
    {
        $data = array(
            'username'=>$username,
            'logined_in'=>true,
        );
        $this->session->set_userdata($data);
    }

    /**
     * 检测用户名是否存在
     *
     * @param $username
     * @return bool
     */
    public function check_username($username)
    {

        $this->db->where('username', $username);
        $query = $this->db->get('user');
        if ($query->num_rows() == 1)
        {
            return $query->row();
        }
        return false;
    }

    /**
     * 验证用户名和密码
     *
     * @param $username
     * @param $password
     * @return bool
     */
    public function check_password ($username, $password)
    {
        if ($user = $this->check_username($username))
        {
            return ($user->password == $password) ? true : false;
        }

        return false;
    }

    /**
     * 检测邮箱是否存在
     *
     * @param $username
     * @return bool
     */
    public function check_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if ($query->num_rows() == 1)
        {
            return $query->row();
        }
        return false;
    }

}

?>