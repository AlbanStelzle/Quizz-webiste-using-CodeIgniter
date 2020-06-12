<?php
class MenuPrincipal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Model_quizz');

		if(!isset($this->session->id)) { //Si aucune session existe alors renvoie à l'accueil
			redirect('Accueil');
		}

	}

	public function index()
	{
		$this->home();

	}

	public function home() //Affiche le menu principal
	{
		$this->load->view('template/View_template');
		$this->load->view('View_home');

	}
	public function quizzHub(){ //Affiche la liste des quizz
		$id= $this->session->id;
		$name=$this->Model_quizz->getAllQuizzNameAndKey($id);
		$this->load->view('template/View_template');
		$this->load->view('View_list_of_quizz',$name);

	}
	public function modifyQuizz($key){ //Affiche la page qui permet de modifier un quizz
		if(($data=$this->Model_quizz->getAllQuizzDataByKeyAndId($key,$this->session->id)) != null){
			$this->load->view('template/View_template');
			$this->load->view('View_quizz',$data);

		}

	}
	public function addQuizzByTitle(){ //fonction qui ajoute un quizz
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
	public function deleteQuizzByKey($key){ //fonction qui supprime un quizz via sa cle
		$this->Model_quizz->deleteQuizzByKey($key);
		redirect('MenuPrincipal/quizzHub','refresh');
	}
	public function isReponseExist($data){

		for($i=0; $i< strlen($data); $i++) {
			$reponse3=$this->input->post('reponse3');
			$reponse4=$this->input->post('reponse4');
			if ($reponse3 == null && 3 == $data[$i]) {
				return false;
			}
			if ($reponse4 == null && 4 == $data[$i]) {
				return false;
			}
		}
		return true;
	}
	public function addQuestionToQuizz($key){ //fonction qui permet d'ajouter une question à un quizz

		$this->form_validation->set_rules('question', 'Question', 'required|htmlentities','Une question est nécessaire');
		$this->form_validation->set_rules('BonneReponse', 'Numéros réponses', 'required|htmlentities|less_than[5]|is_natural_no_zero|callback_isReponseExist','Une ou des bonnes réponses sont nécessaires');
		$this->form_validation->set_rules('reponse1', 'reponse1', 'required|htmlentities','2 réponses minimum sont nécessaires');
		$this->form_validation->set_rules('reponse2', 'reponse2', 'required|htmlentities','2 réponses minimum sont nécessaires');
		$this->form_validation->set_rules('reponse3', 'reponse3','htmlentities' );
		$this->form_validation->set_rules('reponse4', 'reponse4','htmlentities' );
		$this->form_validation->set_message('isReponseExist', '{field} ne correspond pas aux nombres de réponses.');

		$this->form_validation->set_rules('image', 'url d\'une image', 'strip_tags|valid_url');
		$timer= $this->Model_quizz->getTimerFromQuizzByKey($key);
		if ($this->form_validation->run()) {
			$data = array(
				'id'=> $this->session->id,
				'Nom'=> $this->Model_quizz->getNameByKey($key),
				'statut'=>'En préparation',
				'question'=>($this->input->post('question')),
				'reponse1'=>($this->input->post('reponse1')),
				'reponse2'=>($this->input->post('reponse2')),
				'reponse3'=>($this->input->post('reponse3')),
				'reponse4'=>($this->input->post('reponse4')),
				'image'=>($this->input->post('image')),
				'cle'=> $key,
				'temps'=> $timer,
				'BonneReponse'=>($this->input->post('BonneReponse'))
			);
			$this->Model_quizz->addQuestionToQuizz($data);
			sleep(1); //anti force brute

			redirect('MenuPrincipal/modifyQuizz/'.$key);
		} else {
			$data_base=$this->Model_quizz->getAllQuizzDataByKeyAndId($key,$this->session->id);
			$this->load->view('template/View_template');

			$this->load->view('View_quizz', $data_base);
		}

	}

	public function DelQuestion($idQuestion,$key){ //fonction qui supprime une question d'un quizz via son id

		$this->Model_quizz->delQuestionById($idQuestion);
		redirect('MenuPrincipal/modifyQuizz/'.$key);
	}

	public function ActiveQuizz($key){ //fonction qui permet d'activer le quizz via sa cle et le rend disponible pour les élèves
		$timer= $this->Model_quizz->getTimerFromQuizzByKey($key);
			if ($this->Model_quizz->getAllQuizzDataByKey($key)) {

				$this->Model_quizz->ActiveQuizzByKey($key);
				redirect('MenuPrincipal/quizzHub', 'refresh');

		}else{
			redirect('MenuPrincipal/quizzHub');
		}
	}

	public function ExpiredQuizz($key){ //fonction qui fait expirer un quizz, ce qui empêche aux élèves d'y répondre et permet de voir les résultats (élèves et prof)
		$this->Model_quizz->ExpiredQuizzByKey($key);
		redirect('MenuPrincipal/quizzHub','refresh');
	}
	public function CopyQuizz($key){ //fonction qui permet de copier un quizz afin de pouvoir le modifier
		$this->Model_quizz->CopyQuizzByData($key);
		redirect('MenuPrincipal/quizzHub','refresh');

	}
	public function checkResult($key){ //fonction qui affiche tous les résultats d'un quizz
		$this->load->model('Model_quizz_eleve');
		$dataquizz=$this->Model_quizz->getAllQuizzDataByKey($key);
		$dataResultQuizz= $this->Model_quizz_eleve->getAllReponseQuizzEleveByQuizzKey($key);
		$data['dataquizz']=$dataquizz;
		$data['dataResultQuizz']=$dataResultQuizz;
		$this->load->view('template/View_template');
		$this->load->view('View_all_result', $data);
	}
	public function modifyTimer($key){ //Ajoute ou modifie le timer d'un quizz
		$timer= $this->input->post('timer');
		$this->form_validation->set_rules('timer', 'Chrono', 'greater_than[0]|max_length[3]');
		if ($this->form_validation->run()) {
			$data['temps']=$timer;
			$data['cle']=$key;
			$this->Model_quizz->modifyTimerOnQuizzByKey($data);
			redirect('MenuPrincipal/modifyQuizz/'.$key);
		} else {
			redirect('MenuPrincipal/modifyQuizz/'.$key);

		}

	}

}
?>
