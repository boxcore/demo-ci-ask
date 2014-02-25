<?php
class CityModel extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 取用户信息
     *
     * @param $pram 用户名和密码的数组
     * @return array
     */
    public function getInfoById($id = 0)
    {

        $id = intval($id);

    	$this->db->select('city_id,name,sname,mark,pinyin,pid,level')->from('city')->where( 'city_id', $id );
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->row_array();
        } else {
            return array();
        }

    }

    /**
     * 获取指定id的下一级数据
     *
     */
    public function getChildById( $id = 0 )
    {

        $id = intval($id);

        $city_info = self::getInfoById($id);

        if( isset($city_info['level']) && ($city_info['level'] < 3)){
            $this->db->select('city_id, name, sname, mark, pinyin, pid, level, sort')->from('city')->where( 'pid',
                $id)->order_by('sort DESC');
            $query = $this->db->get();
            if($query->num_rows()>0){
                return $query->result_array();
            }
        } else {
            return array();
        }

    }

    /**
     * 获取同级地区列表
     *
     */
    public function getSameLevelById( $id = 0 )
    {

        $id = intval($id);

        $city_info = self::getInfoById($id);

        if($city_info){
            $this->db->select('id, name, sname, mark, pinyin, pid, level, sort')->from('city')->where( 'pid',
                $city_info['pid'])->order_by('sort DESC');
            $query = $this->db->get();
            if($query->num_rows()>0){
                return $query->result_array();
            }
        } else {
            return array();
        }

    }


    /**
     * 获取省份列表
     *
     */
    public function getProvince( )
    {
        $this->db->select('city_id, name, sname, mark, pinyin, pid, level, sort')->from('city')->where( 'level',
            1)->order_by('sort DESC');
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }
    }

}