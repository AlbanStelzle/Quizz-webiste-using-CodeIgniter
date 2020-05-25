<?php
class MenuPrincipal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		$this->home();

	}

	public function home()
	{

		$this->load->view('View_home');

	}
	public function quizzHub(){
		$this->load->model('model_quizz');
		$id= $this->session->id;
		$name=$this->model_quizz->getAllQuizzName($id);
		$this->load->view('View_list_of_quizz',$name);

	}
	public function modifyQuizz($name){
		$this->load->model('model_quizz');
		$id= $this->session->id;
		$data=$this->model_quizz->getAllQuizzDataByName($name);
		$this->load->view('View_quizz',$data);

	}



}
?>
