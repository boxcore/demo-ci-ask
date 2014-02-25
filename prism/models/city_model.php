<?php
class City_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

    public function get_city_list($where = array(), $offset=0, $limit = 10 )
    {
        $sql =  'select `a`.* from `xwd_city` as `a` '.
                $this->_where($where).
                ' order by city_id asc lIMIT '.$offset.', '.$limit;

        $query = $this->db->query($sql );
        return $query->result_array();
    }

    public function get_city_list_count($where)
    {
        $sql =  'select count(1) as total from `xwd_city` as `a` '.$this->_where($where);
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
        if(!empty($configs['city_id']))
        {
            $where[] = 'a.`city_id` = '.$configs['id'];
        }
        if(!empty($configs['pid']))
        {
            $where[] = 'a.`pid` = '.$configs['pid'];
        }
        if(!empty($configs['is_show']))
        {
            $where[] = 'a.`is_show` = '.$configs['is_show'];
        }
        if(!empty($configs['name']))
        {
            $where[] = "a.`name` like '{$configs['name']}%'";
        }
        if(!empty($configs['mark']))
        {
            $where[] = "a.`mark` like '{$configs['mark']}%'";
        }

        return (!empty($where)) ? ' where '.join('AND ', $where) : '';
    }



    /**
     * 添加用户session数据，设置用户在线状态
     * @param $username
     */
    public function login($username = '', $password = '')
    {
        $query = $this->db->select('uid,username,password, group_id')->from('user')->where('username', $username)->limit(1)->get();
        $row = $query->row_array();
        if(!empty($row) && ($row['password'] == $password) && ($row['group_id'] ==1) ){
            $data = array(
                'uid'=>$row['uid'],
                'username'=>$username,
                'logined_in'=>true,
                'group_id' => 1,
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
            $query = $this->db->select('group_id')->from('user')->where('username',$username)->limit(1)->get();
            $data =  $query->row_array();
            return $data['group_id'];
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