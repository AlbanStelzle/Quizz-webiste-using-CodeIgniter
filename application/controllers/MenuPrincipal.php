<?php
class MenuPrincipal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
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
		$this->load->helper('form');

		$this->load->model('model_quizz');
		$id= $this->session->id;
		$name=$this->model_quizz->getAllQuizzNameAndKey($id);
		$this->load->view('View_list_of_quizz',$name);

	}
	public function modifyQuizz($key){
		$this->load->model('model_quizz');
		if(($data=$this->model_quizz->getAllQuizzDataByKey($key,$this->session->id) )!= null){
			$this->load->view('View_quizz',$data);

		}

	}
	public function addQuizzByTitle(){
		$this->load->model('model_quizz');
		$title=$this->input->post('QuizzName');
		$this->model_quizz->addQuizzByTitle($title);
		redirect('MenuPrincipal/QuizzHub');

	}
	public function deleteQuizzByKey($key){
		$this->load->model('model_quizz');
		$this->model_quizz->deleteQuizzByKey($key);
		redirect('MenuPrincipal/QuizzHub');
	}
	public function addQuestionToQuizz($key){
		$this->load->model('model_quizz');
		$data = array(
			'id'=> $this->session->id,
			'Nom'=> $this->model_quizz->getNameByKey($key),
			'question'=>$this->input->post('question'),
			'reponse1'=>$this->input->post('reponse1'),
			'reponse2'=>$this->input->post('reponse2'),
			'reponse3'=>$this->input->post('reponse3'),
			'reponse4'=>$this->input->post('reponse4'),
			'image'=>$this->input->post('image'),
			'clé'=> $key
		);
		$this->model_quizz->addQuestionToQuizz($data);

		redirect('MenuPrincipal/modifyQuizz/'.$key);
	}
	public function DelQuestion($question,$key){
		$this->load->model('model_quizz');

		$quest=str_replace('%20',' ',$question);
		$this->model_quizz->delQuestionByName($quest);
		redirect('MenuPrincipal/modifyQuizz/'.$key);

	}

}
?>
