<?php
class Quizz extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function joinQuizz(){
		$this->load->model('Model_quizz');
		$key=$this->input->post('clé');
		$data=$this->Model_quizz->getAllQuizzDataByKey($key);
		$this->load->view('template/View_template');
		$this->load->view('template/View_template_center');

		$this->load->view('View_fillQuizz',$data);
	}

}

?>
