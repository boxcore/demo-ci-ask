<?php

/**
 * 问题操作模型
 */
class QuestionModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取分类ID
     *
     * @param string $mark
     * @return int
     */
    public function getIdByMark($mark = '')
    {
        $id   = 0;
        $mark = trim($mark);
        if ($mark) {
            $this->db->select('cat_id')->from('category')->where('mark', $mark);
            $query = $this->db->get();
            $arr   = $query->row_array();
            $id    = $arr['cat_id'];
        }
        return $id;
    }


    /**
     * 获取单条字段中内容
     *
     * @param string $table
     * @param string $field
     * @param array  $param
     * @return mixed
     */
    private function get_field($table = '', $field = '', $param = array())
    {
        $field = trim($field);
        $table = trim($table);

        if ($field && $param && $table) {

            $this->db->select($field)->from($table)->where($param[0], $param[1]);
            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                $arr = $query->row_array();
                return $arr[$field];
            }

        }

        return false;
    }

    public function get_list_by_id($id = 0)
    {
        $id   = intval($id);
        $data = array();


        if ($this->get_field('category', 'cat_id', array('cat_id', $id))) {
            $pid = $this->get_field('category', 'pid', array('cat_id', $id));

            if (!$pid) {
                $this->db->select()->from('question')->where('cat_id', $id)->limit('15');
                $query = $this->db->get();
                $data  = $query->result_array();
            } else {
                $this->db->select()->from('question')->where('cat_sub', $id)->limit('15');
                $query = $this->db->get();
                $data  = $query->result_array();

            }
        }
        return $data;

    }

    public function get_child_ids($pid = 0)
    {
        $pid = intval($pid);

    }

    public function get_list($parm)
    {
        $where = '';
        if ($parm['sort']) {
            $where .= ' and `cat_id` = ' . $parm['sort'];
        }

        if ($parm['sub']) {
            $where .= ' and `cat_sub` = ' . $parm['sub'];
        }

        $sql   = "SELECT `id`, `title`, `answer_num` FROM `xwd_question` WHERE 1=1" . $where . " LIMIT 15";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_sort_info()
    {
        $sql   = "SELECT `cat_id`,`name`,`mark` FROM `xwd_category` WHERE `pid` =0 ORDER BY `sort` ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_sub_info($id)
    {
        $sql   = "SELECT `cat_id`,`name`,`mark` FROM `xwd_category` WHERE `pid` ={$id} ORDER BY `sort` ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert_question($arr)
    {
        $data = array(
            'cat_id'     => $arr['sort'],
            'cat_sub'      => $arr['sub'],
            'title'       => $arr['question'],
            'description' => $arr['content'],
            'author_id'   => 11,
            'author'      => '张三',
            'create'      => time()
        );

        $this->db->insert('xwd_question', $data);
        return 1;
    }

    public function get_question_attention()
    {
        $sql   = "SELECT `id`, `title`, `created_time`, `answer_num`, `preview_num` FROM `xwd_question` LIMIT 5";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * 获取问题详情
     *
     * @param $id
     * @return array()
     */
    public function getQuestionById($question_id)
    {
        // 问题浏览数量自增1
        $this->db->where('id', $question_id);
        $this->db->set('preview_num', 'preview_num+1', false);
        $this->db->update('question');

        $this->db->select()->from('question')->where('id', $question_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    /**
     * 获取问题列表
     *
     * @param $question_id
     * @return array
     */
    public function getAnswerList($question_id)
    {
        $this->db->select()->from('answer')->where('qid', $question_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function relative_question($data)
    {
        if ($data) {
            $where = '';
            if ($data['province_id']) {
                $where .= ' and `province_id` = ' . $data['province_id'];
            }

            if ($data['city_id']) {
                $where .= ' and `city_id` = ' . $data['city_id'];
            }

            if ($data['area_id']) {
                $where .= ' and `area_id` = ' . $data['area_id'];
            }

            if ($data['cat_id']) {
                $where .= ' and `cat_id` = ' . $data['cat_id'];
            }

            if ($data['cat_sub']) {
                $where .= ' and `cat_sub` = ' . $data['cat_sub'];
            }

            if ($data['title']) {
                $where .= " and `title` like '%{$data['title']}%'";
            }

            $sql   = "SELECT * FROM `xwd_question` WHERE 1=1 " . $where . ' LIMIT 3';
            $query = $this->db->query($sql);
            return $query->result_array();
        }


    }

    public function insert_answer($content, $qid)
    {
        $sql = "UPDATE `xwd_question` SET `answer_num` = `answer_num` + 1 WHERE `id` ={$qid}";
        $this->db->query($sql);

        $data = array(
            'qid'      => $qid,
            'content'  => $content,
            'author'   => '张三',
            'authorid' => 1,
            'time'     => time()
        );

        $this->db->insert('xwd_answer', $data);
    }

    /**
     * 判断用户是否回答过该问题
     *
     * @param int $qid
     * @param int $uid
     * @return bool
     */
    public function checkHaveAnswer($qid=0, $uid = 0)
    {
        $data['qid'] = intval($qid);
        $data['author_id'] = intval($uid);

        if($qid && $uid){
            $this->db->select("id")->from('answer')->where($data);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }

    }


    /**
     * 取指定ID的问题
     *
     * @param int $qid
     * @return array
     */
    public function getQuestionByQid($qid = 0)
    {
        $data = array();
        $qid = intval($qid);
        if($qid){
            $this->db->select('*')->from('question')->where('id', $qid);
            $query = $this->db->get();
            if( $query->num_rows() > 0 ){
                $data = $query->row_array();
            }
        }

        return $data;
    }


    /**
     * 添加答案
     *
     * @param array $data
     * @param int   $qid
     * @return mixed
     */
    public function insertAnswer( $data = array(), $qid = 0 )
    {
        if($data && $qid){
            $this->db->where('id', $qid);
            $this->db->set('answer_num', 'answer_num+1', false);
            if($this->db->update('question')){

                if( $this->db->insert('xwd_answer', $data) ){
                    return $this->db->insert_id();
                }
            }
        }

        return false;
    }


    public function syncAnswerNum($quetion_id)
    {
        $this->db->select('COUNT(*) as count')->from('answer')->where('qid', $quetion_id);
        $query = $this->db->get();
        $res = $query->row_array();


        $this->db->where('id', $quetion_id);
        $this->db->set('answer_num', $res['count'], false);
        return $this->db->update('question');
    }
}

?>