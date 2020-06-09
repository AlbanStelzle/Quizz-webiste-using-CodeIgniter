<?php
class Quizz extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Model_quizz');

	}

	public function joinQuizz() //permet à un élève de lancer un quizz et d'y répondre
	{
		$this->form_validation->set_rules('clé', 'clé', 'callback_is_active');
		$this->form_validation->set_message('is_active', 'Votre clé est incorrecte ou n\'est pas active.');
		if ($this->form_validation->run()) {
			$session_data = array(
				'nom' => $this->input->post('nom'),
				'prenom' => $this->input->post('prenom'),
			);
			$this->session->set_userdata($session_data);

			$key = trim($this->input->post('clé'));
			$data = $this->Model_quizz->getAllQuizzDataByKey($key);
			$this->load->view('template/View_template');
			$this->load->view('View_fillQuizz', $data);
		} else {
			$this->load->view('template/View_template');
			$this->load->view('template/View_template_center');
			$this->load->view('errors/View_join_error');
		}
		}

	public function is_active($key){ //Permet de vérifier si le quizz est actif
		return $this->Model_quizz->isQuizzActive($key);
	}
	public function is_expired($key){ //Permet de vérifier si le quizz est inactif

		return $this->Model_quizz->isQuizzExpired($key);
	}

	public function is_active_eleve($key){ //permet de vérifier si la clé de l'élève est active
		$this->load->model('Model_quizz_eleve');
		return $this->Model_quizz_eleve->isResultActive($key);
	}
	public function finishQuizz($key){ // récupère toutes les données du quizz fait par un élève et affiche la page de fin avec la clé élève pour ses résultats
		$this->load->model('Model_quizz_eleve');

		$dataQuizz = $this->Model_quizz->getAllQuizzDataByKey($key);
		$i=0;
		$cléeleve=$this->Model_quizz_eleve->createKey();
		foreach($dataQuizz['idQuestion'] as $numQuestion) {
			if ($this->input->post('réponseéleve' . $numQuestion) != null) {
				if (is_array($this->input->post('réponseéleve' . $numQuestion))) {
					$data[$i] = implode('', $this->input->post('réponseéleve' . $numQuestion));
				} else {
					$data[$i] = $this->input->post('réponseéleve' . $numQuestion);

				}

				$dataall = array(
					'noméleve' => $this->session->nom,
					'prenoméleve' => $this->session->prenom,
					'cléduquizz' => $key,
					'idQuestion' => $numQuestion,
					'réponseséleve' => $data[$i],
					'clédurésultat' => $cléeleve
				);
				$this->Model_quizz_eleve->addReponseByEleve($dataall);

				$i++;


			}else{
				$dataall = array(
					'noméleve' => $this->session->nom,
					'prenoméleve' => $this->session->prenom,
					'cléduquizz' => $key,
					'idQuestion' => $numQuestion,
					'réponseséleve' => 'Pas répondu',
					'clédurésultat' => $cléeleve
				);
				$this->Model_quizz_eleve->addReponseByEleve($dataall);

				$i++;
			}
		}
		$this->load->view('template/View_template');

		$this->load->view('View_quizz_finished', $dataall);
	}

	public function resultPage(){ //affiche la page de résultat de l'élève
		$this->form_validation->set_rules('clédurésultat', 'clé', 'required|callback_is_active_eleve|callback_is_expired');
		$this->form_validation->set_message('is_active_eleve', 'La {field} n\'existe pas dans la base.');
		$this->form_validation->set_message('is_expired', 'La {field} n\'est pas encore prête pour accéder aux résultats.');

		if ($this->form_validation->run()) {
			$cléeleve=$this->input->post('clédurésultat');

			$this->load->model('Model_quizz_eleve');
			$cléquizz=$this->Model_quizz_eleve->getQuizzKeyByEleveKey($cléeleve);
			$dataquizz=$this->Model_quizz->getAllQuizzDataByKey($cléquizz);
			$dataResultQuizz= $this->Model_quizz_eleve->getAllReponseQuizzEleveByKey($cléeleve);

			$this->load->view('template/View_template');
			$data['dataquizz']=$dataquizz;
			$data['dataResultQuizz']=$dataResultQuizz;
			$this->load->view('View_result_eleve',$data);
		} else {
			$this->load->view('template/View_template');
			$this->load->view('View_resultPage');
		}
	}



}

?>
