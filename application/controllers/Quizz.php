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

	public function joinQuizz()
	{
		$this->load->model('Model_quizz');
		$this->form_validation->set_rules('clé', 'clé', 'callback_is_active');
		$this->form_validation->set_message('is_active', '{field} est une clé incorrecte ou n\'est pas active.');
		if ($this->form_validation->run()) {
			$key = trim($this->input->post('clé'));
			$data = $this->Model_quizz->getAllQuizzDataByKey($key);
			$this->load->view('template/View_template');
			$this->load->view('View_fillQuizz', $data);
		} else {
			$this->load->view('template/View_template');
			$this->load->view('template/View_template_center');
			$this->load->view('View_join');
		}


		}

	public function is_active($key){
		$this->load->model('Model_quizz');
		return $this->Model_quizz->isQuizzActive($key);
	}
}

?>
