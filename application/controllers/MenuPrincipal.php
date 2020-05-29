<?php
class MenuPrincipal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
		if(!isset($this->session->id)) {
			redirect('Accueil');
		}

	}

	public function index()
	{
		$this->home();

	}

	public function home()
	{
		$this->load->view('template/View_template');
		$this->load->view('View_home');

	}
	public function quizzHub(){
		$this->load->helper('form');

		$this->load->model('Model_quizz');
		$id= $this->session->id;
		$name=$this->Model_quizz->getAllQuizzNameAndKey($id);
		$this->load->view('template/View_template');
		$this->load->view('View_list_of_quizz',$name);

	}
	public function modifyQuizz($key){
		$this->load->model('Model_quizz');
		if(($data=$this->Model_quizz->getAllQuizzDataByKeyAndId($key,$this->session->id)) != null){
			$this->load->view('template/View_template');
			$this->load->view('View_quizz',$data);

		}

	}
	public function addQuizzByTitle(){
		$this->load->model('Model_quizz');
		$this->form_validation->set_rules('QuizzName', 'QuizzName', 'required|htmlentities');
		$key=$this->Model_quizz->createKey();
		if ($this->form_validation->run()) {
			$title=$this->input->post('QuizzName');
			$this->Model_quizz->addQuizzByTitle($title,$key);
			redirect('MenuPrincipal/QuizzHub');
		} else {
			$this->load->view('template/View_template');
			$name=$this->Model_quizz->getAllQuizzNameAndKey($this->session->id);
			$this->load->view('View_list_of_quizz',$name);
		}


	}
	public function deleteQuizzByKey($key){
		$this->load->model('Model_quizz');
		$this->Model_quizz->deleteQuizzByKey($key);
		redirect('MenuPrincipal/quizzHub','refresh');
	}
	public function addQuestionToQuizz($key){

		$this->load->model('Model_quizz');
		$this->form_validation->set_rules('question', 'Question', 'required|htmlentities','Une question est nécessaire');
		$this->form_validation->set_rules('BonneRéponse', 'Numéros réponses', 'required|htmlentities','Une ou des bonnes réponses sont nécessaires');
		$this->form_validation->set_rules('reponse1', 'reponse1', 'required|htmlentities','2 réponses minimum sont nécessaires');
		$this->form_validation->set_rules('reponse2', 'reponse2', 'required|htmlentities','2 réponses minimum sont nécessaires');
		$this->form_validation->set_rules('reponse3', 'reponse3','htmlentities' );
		$this->form_validation->set_rules('reponse4', 'reponse4','htmlentities' );
		$this->form_validation->set_rules('image', 'url d\'une image', 'strip_tags');

		if ($this->form_validation->run()) {
			$data = array(
				'id'=> $this->session->id,
				'Nom'=> $this->Model_quizz->getNameByKey($key),
				'question'=>($this->input->post('question')),
				'reponse1'=>($this->input->post('reponse1')),
				'reponse2'=>($this->input->post('reponse2')),
				'reponse3'=>($this->input->post('reponse3')),
				'reponse4'=>($this->input->post('reponse4')),
				'image'=>($this->input->post('image')),
				'clé'=> $key,
				'BonneRéponse'=>($this->input->post('BonneRéponse'))
			);
			$this->Model_quizz->addQuestionToQuizz($data);

			redirect('MenuPrincipal/modifyQuizz/'.$key);
		} else {
			$data_base=$this->Model_quizz->getAllQuizzDataByKeyAndId($key,$this->session->id);
			$this->load->view('template/View_template');

			$this->load->view('View_quizz', $data_base);
		}

	}

	public function DelQuestion($idQuestion){
		$this->load->model('Model_quizz');

		$this->Model_quizz->delQuestionById($idQuestion);
		redirect('MenuPrincipal/quizzHub','refresh');

	}

	public function ActiveQuizz($key){
		$this->load->model('Model_quizz');
		$this->Model_quizz->ActiveQuizzByKey($key);
		redirect('MenuPrincipal/quizzHub','refresh');

	}

	public function ExpiredQuizz($key){
		$this->load->model('Model_quizz');
		$this->Model_quizz->ExpiredQuizzByKey($key);
		redirect('MenuPrincipal/quizzHub','refresh');
	}

}
?>
