<?php
class Category_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getCatInfo($mark = ''){
        $mark = trim($mark);
        $data = array();
        if($mark){
            $this->db->select('id,name,mark,pid,sort')->from('category')->where('mark', $mark)->limit(1);
            $query = $this->db->get();
            $data = $query->row_array();

            // 获取子分类数据
            if(!$data['pid']){
                $this->db->select('id,name,mark,pid,sort')->from('category')->where('pid', $data['id'])->order_by('sort','DESC');
                $query = $this->db->get();
                $data['child'] = $query->result_array();
            }
        }
        return $data;
    }

}