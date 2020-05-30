<?php
class Model_quizz_eleve extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');

	}

	public function checkAllKeys($key){
		$this->db->where('clédurésultat', $key);
		$query = $this->db->get('ResultQuizz');
		if ($arg = $query->num_rows() > 0) {
			return false;
		} else {
			return true;
		}
	}
	public function createKey()
	{
		$key = random_string('numeric', 12);
		$this->db->where('clé', $key);
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

	public function addReponseByEleve($data){

		$this->db->insert('ResultQuizz', $data);

	}
	public function getQuizzKeyByEleveKey($keyeleve){
		$this->db->where('clédurésultat', $keyeleve);
		$this->db->select('cléduquizz');
		$query=$this->db->get('ResultQuizz');
		$result= $query->row();
		return $result->cléduquizz;
	}

	public function getAllReponseQuizzEleveByKey($cléeleve){

			$this->db->where('clédurésultat', $cléeleve);
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
		$this->db->select('clédurésultat');
		$this->db->where('clédurésultat', $key);
		$query = $this->db->get('ResultQuizz');
		$row = $query->row();
		if($row !== null) {
			return true;
		}else{
			return false;
		}
	}

}

