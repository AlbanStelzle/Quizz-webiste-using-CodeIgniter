<?php
class model_connexion extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function getAll($email){
		$this->db->where('email',$email);
		$query=$this->db->get('user');
		foreach ($query->result() as $row)
		{

		}
		return $row;

	}
	public function getCount($email){
		$this->db->where('email',$email);
		$this->db->from('user');
		$count= $this->db->count_all_results();
		return $count;
	}
	public function check($data)
	{
		$this->db->where($data);
		$query = $this->db->get('user');

		if($arg=$query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function register($data){
		$this->db->insert('user',$data);
	}

}

