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

	public function is_active($key){
		$this->load->model('Model_quizz');
		return $this->Model_quizz->isQuizzActive($key);
	}

	public function is_active_eleve($key){
		$this->load->model('Model_quizz_eleve');
		return $this->Model_quizz_eleve->isResultActive($key);
	}
	public function finishQuizz($key){
		$this->load->model('Model_quizz_eleve');
		$this->load->model('Model_quizz');
		$dataQuizz = $this->Model_quizz->getAllQuizzDataByKey($key);
		$i=0;
		$cléeleve=$this->Model_quizz_eleve->createKey();
		foreach($dataQuizz['idQuestion'] as $numQuestion) {
			if ($this->input->post('réponseéleve' . $numQuestion) != null) {
				if (is_array($this->input->post('réponseéleve' . $numQuestion))) {
					$data[$i] = implode(',', $this->input->post('réponseéleve' . $numQuestion));
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


			}
		}
		$this->load->view('template/View_template');

		$this->load->view('View_quizz_finished', $dataall);
	}

	public function resultPage(){
		$this->form_validation->set_rules('clédurésultat', 'clé', 'required|callback_is_active_eleve');
		$this->form_validation->set_message('is_active_eleve', 'La {field} n\'existe pas dans la base.');

		if ($this->form_validation->run()) {
			$cléeleve=$this->input->post('clédurésultat');
			$this->load->model('Model_quizz');
			$this->load->model('Model_quizz_eleve');
			$cléquizz=$this->Model_quizz_eleve->getQuizzKeyByEleveKey($cléeleve);
			$dataquizz=$this->Model_quizz->getAllQuizzDataByKey($cléquizz);
			$dataResultQuizz= $this->Model_quizz_eleve->getAllReponseQuizzEleveByKey(($cléeleve));

			$this->load->view('template/View_template');
			$data['dataquizz']=$dataquizz;
			$data['dataResultQuizz']=$dataResultQuizz;
			$this->load->view('View_result_eleve',$data);
			//print_r($data['dataquizz']['Nom']);
		} else {
			$this->load->view('template/View_template');
			$this->load->view('View_resultPage');
		}
	}



}

?>
