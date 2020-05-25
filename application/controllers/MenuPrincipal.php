<?php
class MenuPrincipal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');

	}

	public function index()
	{
		$this->session->sess_destroy();
		$this->afficherConnexion();
		$this->Connexion();

	}

	public function afficherConnexion()
	{
		$this->load->view('View_accueil');
	}

	public function deconnexion()
	{
		$this->session->sess_destroy();

		$this->load->helper('url');
		redirect(base_url());
	}

}
?>
