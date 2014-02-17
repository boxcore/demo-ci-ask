<?php
class Flink_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 通过标记获取友情链接
     * @param string $mark
     * @param bool   $type
     * @return array
     */
    public function getLinkByMark($mark='',$type=false){
        $mark = trim($mark);
        $data = array();
        $config = array(
            'mark'=>$mark,
            'is_show'=>1,
        );

        if($type){
            $config = array_filter($config);
        }

        if(!empty($config)){
            $query = $this->db->select('name,link')->from('flink')->where($config)->order_by('sort desc')->get();
            $data = $query->result_array();
        }
        //echo $this->db->last_query();
        return $data;
    }

}
?>