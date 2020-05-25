<?php
class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');

	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->afficherConnexion();
	}

	public function afficherConnexion()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_connexion');

		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('Pwd', 'Mot de passe', 'required|trim');
		$this->form_validation->set_message('is_unique', '{field} est déjà présent dans la base.');

		if ($this->form_validation->run()) {
			$email = $this->input->post('Email');
			$password = $this->input->post('Pwd');

			$data = array(
				'email' => $email,
				'password' => $password
			);

			if ($this->model_connexion->login($email,$password)) {
				$session_data = array(
					'email'     =>     $email
				);
				$this->session->set_userdata($session_data);

				redirect(MenuPrincipal);
			}else{
				redirect();
			}
		}else{
			$this->load->view('View_accueil');

		}
	}
}
?>
