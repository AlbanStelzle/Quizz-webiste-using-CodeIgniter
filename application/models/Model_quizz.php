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
		$this->db->select('Nom,clé,statut');
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
	public function getAllQuizzDataByKeyAndId($key,$id){
		$this->db->where('clé',$key);
		$this->db->where('id',$id);
		if($id === null){
			return false;
		}
		$query=$this->db->get('Quizz');
		$result=$query->result_array();
		$i=0;
		foreach ($result as $row)
		{
			foreach($row as $key2=>$value){
				$data[$key2][$i]=$value;
			}
		$i++;

		}
		return $data;
	}
	public function getAllQuizzDataByKey($key){
		$this->db->where('clé',$key);
		$query=$this->db->get('Quizz');
		$result=$query->result_array();
		$i=0;
		foreach ($result as $row)
		{
			foreach($row as $key2=>$value){
				$data[$key2][$i]=$value;
			}
			$i++;

		}
		return $data;
	}
	public function createKey(){
		$key = random_string('numeric', 12);
		$this->db->where('clé',$key);
		$query = $this->db->get('Quizz');
		if($arg=$query->num_rows() > 0) {
			$this->createKey();
		}else {
			return $key;
		}
	}
	public function addQuizzByTitle($title,$key){

		$data = array(
			'id'=> $this->session->id,
			'question'=>null,
			'Nom'=> trim($title),
			'clé'=>$key,
			'statut'=>'En préparation'
		);
	$this->db->insert('Quizz',$data);
	return $data;
	}
	public function getNameByKey($key){
		$this->db->where('clé', $key);
		$this->db->select('Nom');
		$query=$this->db->get('Quizz');
		foreach ($query->result() as $row)
		{
		}
		return $row->Nom;

	}
	public function deleteQuizzByKey($key){
		$this->db->where('clé',$key);
		$this->db->delete('Quizz');

	}

	public function addQuestionToQuizz($data){

			$this->db->insert('Quizz', $data);



	}
	public function delQuestionById($id){
		$this->db->where('idQuestion',$id);
		$this->db->delete('Quizz');
	}

}

