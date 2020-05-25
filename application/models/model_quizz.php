<?php
class model_quizz extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function getAllQuizzName($id)
	{
		$this->db->where('id', $id);
		$this->db->select('Nom');
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
	public function getAllQuizzDataByName($name){
		$this->db->where('Nom',$name);
		$this->db->select('Nom,question,reponse1,reponse2,reponse3,reponse4,image,clé');
		$query=$this->db->get('Quizz');
		$result=$query->result_array();
		$i=0;
		foreach ($result as $row)
		{
			foreach($row as $key=>$value){
				$data[$key][$i]=$value;
			}
		$i++;

		}
		return $data;
	}


}

