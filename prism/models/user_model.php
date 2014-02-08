<?php
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

    public function get_user_list($where = array(), $offset=0, $limit = 10 )
    {
        $sql =  'select `a`.*,`b`.`grouptitle` from `xwd_user` as `a` '.
                'left join `xwd_usergroup` as `b` on `a`.`groupid` =`b`.`groupid` '.
                $this->_where($where).
                ' order by uid desc lIMIT '.$offset.', '.$limit;

        $query = $this->db->query($sql );
        return $query->result_array();
    }

    public function get_user_list_count($where)
    {
        $sql =  'select count(1) as total from `xwd_user` as `a` '.$this->_where($where);
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['total'];
    }

    /**
     * 组装where条件
     *
     * @param array $configs
     * @return string
     */
    private function _where($configs = array())
    {
        array_filter($configs);

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

        return (!empty($where)) ? ' where '.join('AND ', $where) : '';
    }



    /**
     * 添加用户session数据，设置用户在线状态
     * @param $username
     */
    public function login($username = '', $password = '')
    {
        $query = $this->db->select('uid,username,password, groupid')->from('user')->where('username', $username)->limit(1)->get();
        $row = $query->row_array();
        if(!empty($row) && ($row['password'] == $password) && ($row['groupid'] ==1) ){
            $data = array(
                'uid'=>$row['uid'],
                'username'=>$username,
                'logined_in'=>true,
                'groupid' => 1,
            );
            $this->session->set_userdata($data);
        }
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
     * 检测用户组
     *
     * @param $username
     * @return bool
     */
    public function check_usergroup($username)
    {

        $data = array();
        if($username){
            $query = $this->db->select('groupid')->from('user')->where('username',$username)->limit(1)->get();
            $data =  $query->row_array();
            return $data['groupid'];
        }
        return '';
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

    /**
     * 返回用户基本信息
     * @param int $uid
     * @return array
     */
    public function get_user_info($uid = 0){
        $data = array();
        if($uid){
            $query = $this->db->select('*')->from('user')->where('uid',$uid)->limit(1)->get();
            $data =  $query->row_array();
        }
       return $data;
    }

}

?>