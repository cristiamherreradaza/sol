<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() 
	{
		parent::__construct();
		// $this->load->helper('url_helper');
		// $this->load->database();
		// $this->load->helper('vayes_helper');
		$this->load->helper('tools_helper');
	}

	public function index() 
	{
		$this->load->view('welcome_message');
	}

	public function listado()
	{
		$data['clientes'] = $this->db->get('clientes')->result_array();		
		// echo 'Holas desde listado';
		// vdebug($clientes, true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('clientes/listado', $data);
		$this->load->view('template/footer');

	}

	public function guarda()
	{
		$id = $this->input->post('ida');
		// vdebug($this->input->post('ida'), true, false, true);
		$datos = array(
			'nombre'    => $this->input->post('nombre'),
			'ci'    => $this->input->post('carnet'),
			'celulares' => $this->input->post('celulares'),
			'genero'    => $this->input->post('genero'),
			'email'     => $this->input->post('email'),
			'direccion' => $this->input->post('direccion'),
		);
		if (empty($id)) {
			$this->db->insert('clientes', $datos);
		} else {
			$this->db->where('id', $id);
			$this->db->update('clientes', $datos);
		}
		redirect("clientes/listado");
	}

	public function eliminar($id_cliente = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('clientes', array('borrado'=>$hoy), "id=$id_cliente");
		redirect("clientes/listado");
	}

}