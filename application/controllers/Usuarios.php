<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		// $this->load->helper('vayes_helper');
		$this->load->helper('form');
		$this->load->library('user_agent');

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
		$pass_encriptado = sha1($password);
		// var_dump($usuario);
		// var_dump($pass_encriptado);
		// exit;
		if($this->Usuario_model->valida($usuario, $pass_encriptado))
		{
			redirect("Panel/home");
		}else{
			$data = $this->form_validation->set_message('verificar_usuario', 'Los datos son incorrectos.');
			// var_dump($data);
			// redirect(base_url());
			$this->load->view('usuarios/login',$data);  
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

	public function listado()
	{
		$data['usuarios'] = $this->db->get_where('usuarios', array('borrado ='=>NULL))->result_array();		
		// echo 'Holas desde listado';
		// vdebug($this->agent->referrer(), true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('usuarios/listado', $data);
		$this->load->view('template/footer');
	}

	public function guarda()
	{
		$id = $this->input->post('ida');
		$pass = $this->input->post('pass');
		if (!empty($pass)) {
			$pass_encriptado = sha1($pass);
			$datos = array(
				'nombre' => $this->input->post('nombre'),
				'celulares' => $this->input->post('celulares'),
				'direccion' => $this->input->post('direccion'),
				'email' => $this->input->post('email'),
				'rol'   => $this->input->post('rol'),
				'usuario' => $this->input->post('usuario'),
				'pass' => $pass_encriptado
			);
		} else {
			$datos = array(
				'nombre' => $this->input->post('nombre'),
				'celulares' => $this->input->post('celulares'),
				'direccion' => $this->input->post('direccion'),
				'email' => $this->input->post('email'),
				'rol'   => $this->input->post('rol'),
				'usuario' => $this->input->post('usuario')
			);
		}
				
		// vdebug($this->input->post('ida'), true, false, true);
		if (empty($id)) {
			$this->db->insert('usuarios', $datos);
		} else {
			$this->db->where('id', $id);
			$this->db->update('usuarios', $datos);
		}
		redirect($this->agent->referrer());
	}

	public function eliminar($id_abertura = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('usuarios', array('borrado'=>$hoy), "id=$id_abertura");
		redirect("usuarios/listado");
	}
	
}