<?php
class model_quizz extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
		$this->load->helper('string');

	}

	public function getAllQuizzNameAndKey($id)
	{
		$this->db->where('id', $id);
		$this->db->select('Nom,cle,statut');
		$this->db->distinct();
		$query = $this->db->get('Quizz');
		$result = $query->result_array();
		$i = 0;
		if ($result != Null) {
			foreach ($result as $row) {
				foreach ($row as $key => $value) {

					$data[$key][$i] = $value;
				}
				$i++;
			}
			return $data;
		}
	}

	public function getAllQuizzDataByKeyAndId($key, $id)
	{
		$this->db->where('cle', $key);
		$this->db->where('id', $id);
		if ($id === null) {
			return false;
		}
		$query = $this->db->get('Quizz');
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

	public function getTimerFromQuizzByKey($key){
		$this->db->select('temps');
		$this->db->where('cle', $key);
		$this->db->where('question', null);
		$query=$this->db->get('Quizz');
		foreach ($query->result() as $row) {
		}
		return $row->temps;

	}

	public function getAllQuizzDataByKey($key)
	{
		$this->db->where('cle', $key);
		$this->db->where('question!=', null);
		$query = $this->db->get('Quizz');
			$result = $query->result_array();
			if($result!=null){
				$i = 0;
				foreach ($result as $row) {
					foreach ($row as $key2 => $value) {
						$data[$key2][$i] = $value;

					}
					$i++;
				}
				return $data;
			}else{
				return false;
			}


	}

	public function createKey()
	{
		$key = random_string('numeric', 12);
		$this->db->where('cle', $key);
		$query = $this->db->get('Quizz');
		if ($arg = $query->num_rows() > 0) {
			$this->createKey();
		} else {
			return $key;
		}
	}

	public function addQuizzByTitle($title, $key)
	{

		$data = array(
			'id' => $this->session->id,
			'question' => null,
			'Nom' => trim($title),
			'cle' => $key,
			'statut' => 'En préparation'
		);
		$this->db->insert('Quizz', $data);
		return $data;
	}

	public function getNameByKey($key)
	{
		$this->db->where('cle', $key);
		$this->db->select('Nom');
		$query = $this->db->get('Quizz');
		foreach ($query->result() as $row) {
		}
		return $row->Nom;

	}

	public function deleteQuizzByKey($key)
	{
		$this->db->where('cle', $key);
		$this->db->delete('Quizz');

	}

	public function addQuestionToQuizz($data)
	{

		$this->db->insert('Quizz', $data);


	}

	public function delQuestionById($id)
	{
		$this->db->where('idQuestion', $id);
		$this->db->delete('Quizz');
	}

	public function ActiveQuizzByKey($key)
	{

		$data = array('statut' => 'Actif');
		$this->db->where('cle', $key);
		$this->db->update('Quizz', $data);
	}

	public function ExpiredQuizzByKey($key)
	{
		$data = array('statut' => 'Expiré');
		$this->db->where('cle', $key);
		$this->db->update('Quizz', $data);
	}

	public function isQuizzActive($key)
	{
		$this->db->select('statut');
		$this->db->where('cle', $key);
		$query = $this->db->get('Quizz');
		$row = $query->row();
		if($row !== null) {
			if ($row->statut === "Actif") {
				return True;
			} else {
				return False;
			}
		}else{
			return false;
		}
	}
	public function isQuizzExpired($key)
	{
		$this->db->select('statut');
		$this->db->where('cleduresultat', $key);
		$this->db->from('ResultQuizz');
		$this->db->join('Quizz', 'Quizz.cle = ResultQuizz.cleduquizz');
		$query = $this->db->get();
		$row = $query->row();
		if($row !== null) {
			if ($row->statut === "Expiré") {
				return True;
			} else {
				return False;
			}
		}else{
			return false;
		}
	}
	public function CopyQuizzByData($key){
		$newKey=$this->createKey();
		$this->db->where('cle', $key);
		$query = $this->db->get('Quizz');
		$result = $query->result_array();
		foreach ($result as $row) {
			foreach ($row as $key2 => $value) {
				$data[$key2] = $value;
				$data['cle']=$newKey;
				$data['statut']="En préparation";
				$data['idQuestion']=null;

			}

			$this->db->insert('Quizz',$data);

		}
	}
	public function modifyTimerOnQuizzByKey($data){
		$this->db->where('cle', $data['cle']);
		$this->db->update('Quizz', $data);
	}

}

