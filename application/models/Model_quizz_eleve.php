<?php
class Model_quizz_eleve extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');

	}

	public function checkAllKeys($key){ //Verifie si la clé n'existe pas dans aucune BD
		$this->db->where('cleduresultat', $key);
		$query = $this->db->get('ResultQuizz');
		if ($arg = $query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	public function createKey() //Creer une clé
	{
		$key = random_string('numeric', 12);
		$this->db->where('cle', $key);
		$query = $this->db->get('Quizz');
		if ($arg = $query->num_rows() > 0) {
			$this->createKey();
		} else {
			if($this->checkAllKeys($key)){
				return $key;
			}else{
				$this->createKey();
			}
		}
	}

	public function addReponseByEleve($data){ //Ajoute une réponse à une question par un élève

		$this->db->insert('ResultQuizz', $data);

	}
	public function getQuizzKeyByEleveKey($keyeleve){ //récupère la cléduquizz originel provenant de la clé élève
		$this->db->where('cleduresultat', $keyeleve);
		$this->db->select('cleduquizz');
		$query=$this->db->get('ResultQuizz');
		$result= $query->row();
		return $result->cleduquizz;
	}

	public function getAllReponseQuizzEleveByKey($cleeleve){

			$this->db->where('cleduresultat', $cleeleve);
			$query = $this->db->get('ResultQuizz');
			$result = $query->result_array();
			$i = 0;
			foreach ($result as $row) {
				foreach ($row as $key2 => $value) {
					$data[$key2][$i] = $value;

				}
				$i++;
			}
			return $data;

	}
	public function getAllReponseQuizzEleveByQuizzKey($cle){

		$this->db->where('cleduquizz', $cle);
		$query = $this->db->get('ResultQuizz');
		$result = $query->result_array();
		$i = 0;
		foreach ($result as $row) {
			foreach ($row as $key2 => $value) {
				$data[$key2][$i] = $value;

			}
			$i++;
		}
		return $data;

	}
	public function isResultActive($key)
	{
		$this->db->select('cleduresultat');
		$this->db->where('cleduresultat', $key);
		$query = $this->db->get('ResultQuizz');
		$row = $query->row();
		if($row !== null) {
			return true;
		}else{
			return false;
		}
	}

}

