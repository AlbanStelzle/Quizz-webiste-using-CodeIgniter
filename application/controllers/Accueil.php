<?php
class Accueil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->library('form_validation');


	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->login();
	}

	public function login()
	{
		$this->load->helper('form');
		$this->load->model('model_connexion');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique');
		$this->form_validation->set_rules('Pwd', 'Mot de passe', 'required|trim');
		$this->form_validation->set_message('is_unique', '{field} existe pas dans la base.');

		if ($this->form_validation->run()) {
			$email = $this->input->post('Email');
			$password = $this->input->post('Pwd');

			$datadb=$this->model_connexion->getAll($email);

			if (password_verify($password,$datadb->password)) {
				echo "test";
					session_start();
					$session_data = array(
						'login' => $datadb->login,
						'email' => $email,
						'id' => $datadb->id
					);
					$this->session->set_userdata($session_data);
					redirect(MenuPrincipal);

			} else {
				redirect('', 'refresh');
			}
		} else {
			$this->load->view('View_accueil');

		}
	}

	public function register()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('model_connexion');

		$this->form_validation->set_rules('email', 'Email', 'valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('Pwd', 'Mot de passe', 'required|trim');
		$this->form_validation->set_message('is_unique', '{field} est déjà présent dans la base.');

		if ($this->form_validation->run()) {
			$login = $this->input->post('Login');
			$email = $this->input->post('Email');
			$password = $this->input->post('Pwd');
			$pwdhash=password_hash($password, PASSWORD_DEFAULT);

			$data = array(
				'login' => $login,
				'email' => $email,
				'password' => $pwdhash
			);

			if ($this->model_connexion->login($data)) {
				$session_data = array(
					'email' => $email
				);
				$this->session->set_userdata($session_data);

			} else {
				$this->model_connexion->register($data);
				redirect('', 'refresh');
			}
		} else {
	$this->load->view('View_register');
		}
	}
}

?>
