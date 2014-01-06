<?php
class Ci extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	function show()
	{
		$this->load->view('ci_view');
	}
	function data()
	{
		$this->load->view('data');
	}
}


?>
