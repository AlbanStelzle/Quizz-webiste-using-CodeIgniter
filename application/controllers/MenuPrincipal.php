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
		$this->home();

	}

	public function home()
	{

		$this->load->view('View_home');

	}
	public function list(){
		$this->load->view('View_list_of_quizz');

	}

	public function deconnexion()
	{
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect(base_url());
	}

}
?>
