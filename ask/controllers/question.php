<?php

/**
 * 问答控制类
 * 
 */
class Question extends HM_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->cat();
    }

    public function cat($mark = '')
    {
        $data = array();

        $this->load->model('Question_model');
        $id = $this->Question_model->get_id_by_mark($mark);

        if(!$id){
            show_404();exit;
        }else{
            $data['info'] = $this->Question_model->get_list_by_id($id);
            foreach($data['info'] as &$v){
                $v['url'] = built_detail_url('ask',$v['id']);
            }


            $this->load->library('layout');
            $this->layout->view('question/question_list', $data);
        }

    }

    /**
     * 
     * 显示问答列表
     */
    public function listAll()
    {
    	$pram['sort'] = $this->input->get('sort');
    	$pram['sub']  = $this->input->get('sub');
    	
    	$this->load->model('Question_model');
    	$data['info'] = $this->Question_model->get_list($pram);
        foreach($data['info'] as &$v){
            $v['url'] = built_detail_url('ask',$v['id']);
        }
    	$this->load->library('layout');
        $this->layout->view('question/question_list', $data);
    }
    
    /**
     * 
     * 显示问答详情
     */
	public function detail($qid = 0)
    {
    	$qid = $this->input->get('qid') ? $this->input->get('qid') : $qid;
    	$this->load->model('Question_model');
    	
    	$res = $this->Question_model->get_question_by_id($qid);          //获取详细
    	$data['info'] 	= $res;
    	$data['answer'] = $this->Question_model->get_answer_by_id($qid); //回答列表
    	$data['relate'] = $this->Question_model->relative_question($res);//相关问题
    	$data['static'] = $this->sort_static();
    	$this->load->library('layout');
        $this->layout->view('question/question_detail', $data);
    }

    function sort_static()
    {
	    $sort = array(
			'2' => array('id'=>'2','name'=>'服饰鞋包','mark'=>'fushixiebao'),
			'3' => array('id'=>'3','name'=>'餐饮美食','mark'=>'canyinyule'),
			'58' => array('id'=>'58','name'=>'饰品玩具','mark'=>'shipinwanju'),
			'10' => array('id'=>'10','name'=>'母婴用品','mark'=>'muyingyongpin'),
			'4' => array('id'=>'4','name'=>'美容养生','mark'=>'meirongyangsheng'),
			'56' => array('id'=>'56','name'=>'教育培训','mark'=>'jiaoyupeixun'),
			'9' => array('id'=>'9','name'=>'网络创业','mark'=>'wangluochuangye'),
			'12' => array('id'=>'12','name'=>'家居建材','mark'=>'jiajijiancai'),
			'5' => array('id'=>'5','name'=>'机械环保','mark'=>'jixiehuanbao'),
			'96' => array('id'=>'96','name'=>'汽车服务','mark'=>'qichefuwu'),
			'15' => array('id'=>'15','name'=>'其它项目','mark'=>'qitaxiangmu')
		);
		
		return $sort;
    }
    
    /**
     * 
     * 添加
     */
    public function add()
    {
    	$this->load->model('Question_model');
    	$data['sort'] = $this->Question_model->get_sort_info();
    	$this->load->library('layout');
        $this->layout->view('question/question_add', $data);
    }
    
    public function answer_add() 
    {

    	if ($_POST) {
    		$content = $this->input->post('content');
    		$qid 	 = $this->input->post('qid'); 
    		$this->load->model('Question_model');
    		$this->Question_model->insert_answer($content, $qid);
    		echo 1;
    	}
    }
    
    public function check_add() 
    {
    	$sort = $this->input->post('sort') ? $this->input->post('sort') : '';
    	$sub  = $this->input->post('sub') ? $this->input->post('sub') : '';
    	$question = $this->input->post('question');
    	$content  = $this->input->post('content');
    	
    	if (empty($question)) {
    		$res = 0;
    	}
    	
    	if (empty($content)) {
    		$res = 0;
    	}
    	
    	$arr['sort'] = $sort;
    	$arr['sub']  = $sub;
    	$arr['question'] = $question;
    	$arr['content']  = $content;

    	$this->load->model('Question_model');
    	$res = $this->Question_model->insert_question($arr);
    	
    	echo $res;
    } 
    
    public function get_sub_info()
    {
    	if ($_POST) {
    		$id = $this->input->post('id');
    		$this->load->model('Question_model');
    		$data['sub'] = $this->Question_model->get_sub_info($id);
    		$this->load->view('question/question_sub', $data);
    	}
    }
}