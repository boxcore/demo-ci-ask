<?php

/**
 * 问答分类模型
 *
 * @author chunze.huang
 */
class CatModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getCatInfo($mark = ''){
        $mark = trim($mark);
        $data = array();
        if($mark){
            $this->db->select('cat_id,name,mark,pid,sort')->from('category')->where('mark', $mark)->limit(1);
            $query = $this->db->get();
            $data = $query->row_array();

            // 获取子分类数据
            if(!$data['pid']){
                $this->db->select('cat_id,name,mark,pid,sort')->from('category')->where('pid', $data['id'])->order_by('sort','DESC');
                $query = $this->db->get();
                $data['child'] = $query->result_array();
            }
        }
        return $data;
    }

    /**
     * 根据分类ID获取单条
     *
     * @param int $cat_id
     * @return string
     */
    public function getCatRow($cat_id = 0)
    {
        $data = array();
        $cat_id = intval($cat_id);
        if($cat_id){
            $this->db->select('cat_id,mark,cat_name')->from('category')->where('cat_id', $cat_id);
            $query = $this->db->get();
            if($query->num_rows()>0){
                return $query->row_array();
            }
        }
        return $data;
    }

    /**
     * 获取分类URL和名称
     *
     * @param int $cat_id
     * @return string
     */
    public function getCatURL($cat_id = 0)
    {
        $data = array();
        $cat_id = intval($cat_id);
        if($cat_id){
            $row = $this->getCatRow($cat_id);
            if($row){
                $data = array(
                    'cat_name' => $row['cat_name'],
                    'cat_url' => site_url('cat/'.$row['mark'].'/'),
                );
            }
        }
        return $data;
    }

}