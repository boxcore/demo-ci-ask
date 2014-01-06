<?php
class Html extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	function item()
	{
		$this->load->view('w_dialog');
	}
	function dialog()
	{
		//取数据  item
		$this->load->model('db_item');
		$result = $this->db_item->item_select_all();
		$data['item'] = $result;
		$this->load->view('demo_page1.php',$data);
	}
	//添加数据测试
	function showadd()
	{
		$this->load->view('showadd_view');
	}
	function add()
	{
		$this->load->model('db_item');
		$arr = array(
			'clientName' => $this->input->post('clientName'),
			'clientItem' => $this->input->post('clientItem'),
			'clientDo' => $this->input->post('clientDo'),
			'clientLev' => $this->input->post('clientLev')
		);
		$result = $this->db_item->item_insert($arr);
		$json = array(
			'statusCode' => 200,
			'message' => '操作成功',
			'navTabId' => 'item', //返回一个分类ID(rel) ajax自动刷新
			'forwardUrl' => '',
			'callbackType' => null
		);
		$json = json_encode($json);
		echo $json;
	}
	function delete($id = 0)
	{
		$this->load->model('db_item');
		$result = $this->db_item->item_delete($id);
		$json = array(
			"statusCode" => 200,
      		"message" => "删除成功",
      		"navTabId" => "item",
			"rel" => "",
      		"callbackType" => "",
      		"forwardUrl" => ""
		);
		$json = json_encode($json);
		echo $json;
	}

}
?>

