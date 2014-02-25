<?php

/**
 * 问答控制类
 *
 * @author chunze.huang
 */
class Question extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('QuestionModel');
    }


    /**
     * 问题分类显示
     *
     * @param string $mark 分类标记
     */
    public function cat($mark = '')
    {
        $data = array();
        $cat_id = $this->QuestionModel->getIdByMark($mark);

        if (!$cat_id) {
            show_404();
            exit;
        } else {
            $data['info'] = $this->QuestionModel->get_list_by_id($cat_id);
            foreach ($data['info'] as &$v) {
                $v['url'] = built_detail_url('ask', $v['id']);
            }

            $this->load->library('layout');
            $this->layout->view('question/question_list', $data);
        }
    }


    /**
     * 问题详情页面
     */
    public function detail($qid = 0)
    {
        $data = array();
        $qid = $this->input->get('qid') ? $this->input->get('qid') : $qid;

        //更新问题总数
        $this->QuestionModel->syncAnswerNum($qid);

        $question_info = $this->QuestionModel->getQuestionById($qid); //问题详细
        if (!$question_info) {
            show_404();exit;
        }else{
            $this->load->model('CatModel');

            $question_info['cat_info'] = $this->CatModel->getCatURL($question_info['cat_id']);
            $question_info['sub_info'] = $this->CatModel->getCatURL($question_info['cat_sub']);

        }

        $data['question_info'] = $question_info;
        $data['answer_list'] = $this->QuestionModel->getAnswerList($qid); //回答列表
        $data['relate'] = $this->QuestionModel->relative_question($question_info); //相关问题

        echo '<!--'; print_r($data); echo '-->';
        $this->load->library('layout');
        $this->layout->view('question/question_detail', $data);
    }


    /**
     *
     * 添加
     */
    public function add()
    {
        $this->load->model('QuestionModel');
        $data['sort'] = $this->QuestionModel->get_sort_info();
        $this->load->library('layout');
        $this->layout->view('question/question_add', $data);
    }

    /**
     * 执行添加答案的ajax
     *
     *
     */
    public function answer_add()
    {
        $data = array();
        $msg = array(
            'flag' => 0, // 通信成功标志
            'message' => '登陆出错', //提醒信息
            'field' => '', // 报错字段或区域
        );

        $data['author'] = $this->session->userdata('username');
        $data['author_id'] = $this->session->userdata('uid');

        if ($this->session->userdata('logined_in') && $_POST) {
            $data['content'] = $this->input->post('content');
            $data['is_anonymous'] = $this->input->post('is_anonymous') ? $this->input->post('is_anonymous') : 0;
            $data['qid']     = $this->input->post('qid');
            $data['modified_time'] = time();



            // 判断是否用户是否已经回答过该问题
            if( $this->QuestionModel->checkHaveAnswer($data['qid'], $data['author_id']) ){
                $msg['message'] = '你已经答过该问题，不能重复回答！';
                echo json_encode($msg);exit;
            }

            // 判断问题状态
            $question =  $this->QuestionModel->getQuestionByQid($data['qid']);
            if( $question ){
                if(!$question['status']){
                    $msg['message'] = '该问题已经被关闭，不能进行回答！';
                    echo json_encode($msg);exit;
                }
            }

            $answer_id = $this->QuestionModel->insertAnswer($data, $data['qid']);
            if( $answer_id ){
                $msg['flag'] = 1;
                $msg['answer_id']=$answer_id;
                $msg['message']='评论成功！';
                echo json_encode($msg);exit;
            }

        }

        echo json_encode($msg);exit;
    }


    public function check_add()
    {
        $sort     = $this->input->post('sort') ? $this->input->post('sort') : '';
        $sub      = $this->input->post('sub') ? $this->input->post('sub') : '';
        $question = $this->input->post('question');
        $content  = $this->input->post('content');

        if (empty($question)) {
            $res = 0;
        }

        if (empty($content)) {
            $res = 0;
        }

        $arr['sort']     = $sort;
        $arr['sub']      = $sub;
        $arr['question'] = $question;
        $arr['content']  = $content;

        $this->load->model('QuestionModel');
        $res = $this->QuestionModel->insert_question($arr);

        echo $res;
    }

    public function get_sub_info()
    {
        if ($_POST) {
            $id = $this->input->post('id');
            $this->load->model('QuestionModel');
            $data['sub'] = $this->QuestionModel->get_sub_info($id);
            $this->load->view('question/question_sub', $data);
        }
    }
}