<?php
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
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

}

?>