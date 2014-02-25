<?php
class Question_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function getQuestionList($where = array(), $offset=0, $limit = 10 )
    {
        $sql =  'select `a`.* from `xwd_question` as `a` '.
                $this->_where($where).
                ' order by id desc lIMIT '.$offset.', '.$limit;

        $query = $this->db->query($sql );
        return $query->result_array();
    }

    public function getQuestionListCount($where)
    {
        $sql =  'select count(1) as total from `xwd_question` as `a` '.$this->_where($where);
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['total'];
    }

    /**
     * 获取分类的名称
     *
     * @param int $cat_id
     * @return string
     */
    public function getCatNameById($cat_id = 0){

        $cat_id = intval($cat_id);
        $data = array();

        if($cat_id){
            $this->db->select('cat_name')->from('category')->where('cat_id', $cat_id);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $data = $query->row_array();
                return $data['cat_name'];
            }
        }
        return '';
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
        if(!empty($configs['id']))
        {
            $where[] = 'a.id = '.$configs['id'];
        }

        if(!empty($configs['province_id']))
        {
            $where[] = 'a.province_id = '.$configs['province_id'];
        }

        if(!empty($configs['city_id']))
        {
            $where[] = 'a.city_id = '.$configs['city_id'];
        }

        if(!empty($configs['region_id']))
        {
            $where[] = 'a.region_id = '.$configs['region_id'];
        }

        if(!empty($configs['cat_id']))
        {
            $where[] = 'a.cat_id = '.$configs['cat_id'];
        }

        if(!empty($configs['cat_sub']))
        {
            $where[] = 'a.cat_sub = '.$configs['cat_sub'];
        }

        if(!empty($configs['author_id']))
        {
            $where[] = 'a.author_id = '.$configs['author_id'];
        }

        if(!empty($configs['status']))
        {
            $where[] = 'a.status = '.$configs['status'];
        }

        if(!empty($configs['title']))
        {
            $where[] = "a.`title` like '{$configs['title']}%'";
        }

        return (!empty($where)) ? ' where '.join('AND ', $where) : '';
    }


    /**
     * 根据ID获取问题
     *
     * @param $id
     * @return array
     */
    public function getQuestionById($id)
    {
        $data = array();
        $id = intval($id);

        if($id){
            $query = $this->db->select("*")->from('question')->where('id',$id)->limit(1)->get();
            $data = $query->row();
        }

        return $data;
    }



}

?>