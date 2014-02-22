<?php

/**
 * Class Common_model：公共类
 */

class Common_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}


    /**
     * 获取地区名称
     *
     * @param int $city_id
     * @return string
     */
    public function getCityNameById($city_id = 0){

        $city_id = intval($city_id);
        $data = '';

        if($city_id){
            $this->db->select('name')->from('city')->where('city_id', $city_id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = $query->row_array();
                return $data['name'];
            }
        }
        return $data;
    }



}
