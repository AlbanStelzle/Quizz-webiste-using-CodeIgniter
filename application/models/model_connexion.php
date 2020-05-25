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
			echo $row->login;
			echo $row->email;
			echo $row->password;
		}
		return $row;
	}
	public function login($data)
	{
		$this->db->where($data);
		$query = $this->db->get('user');
		//SELECT * FROM user WHERE email = '$data['email']' AND password = '$data['password']'
		if($arg=$query->num_rows() > 0)
		{
			$data = array(
				'login' => $arg[0],
				'email' => $arg[1],
				'password' => $arg[2]
			);
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

