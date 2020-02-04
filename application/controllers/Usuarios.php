<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		$this->load->helper('vayes_helper');
		$this->load->helper('form');

        // load url helper
        $this->load->helper('url');
		$this->load->model("Usuario_model");
	}

	public function login()
	{
		$this->load->view('usuarios/login');	
	}

	public function valida()
	{
		// vdebug($this->input->post(), true, false, true);
		$usuario = $this->input->post('usuario');
		$password = $this->input->post('pass');
		if($this->Usuario_model->valida($usuario, $password))
		{
			redirect("trabajos/nuevo");
		}else{
			// echo 'no';
			$this->form_validation->set_message('verificar_usuario', 'Los datos son incorrectos.');
			redirect(base_url());
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		/*$ultimo = $this->db->query("SELECT MAX(logacceso_id) FROM logacceso")->row();
		$logacceso_id = $ultimo->max;
		$acceso_fin = date("Y-m-d H:i:s");
		$actualizar = $this->Logacceso_model->fecha_salida($logacceso_id, $acceso_fin);*/
		redirect(base_url());
	}

	public function algo()
	{
		$this->Logacceso_model->inactividad();
	}

	
}
