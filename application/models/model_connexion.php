<?php
class model_connexion extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function login($email,$password)
	{
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('user');
		//SELECT * FROM user WHERE email = '$data['email']' AND password = '$data['password']'
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
?>
