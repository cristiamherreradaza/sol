<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aberturas extends CI_Controller {

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
		$this->load->helper('vayes_helper');
		$this->load->helper('tools_helper');
	}

	public function index() 
	{
		$this->load->view('welcome_message');
	}

	public function listado()
	{
		$data['aberturas'] = $this->db->get_where('aberturas', array('borrado ='=>NULL))->result_array();		
		// echo 'Holas desde listado';
		// vdebug($clientes, true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('aberturas/listado', $data);
		$this->load->view('template/footer');
	}

	public function guarda()
	{
		// vdebug($this->input->post(), true, false, true);
		$datos = array(
			'nombre' => $this->input->post('nombre'),
			'tipo'   => $this->input->post('tipo'),
			'genero' => $this->input->post('genero'),
		);
		$this->db->insert('aberturas', $datos);
		redirect("aberturas/listado");
	}

	public function eliminar($id_abertura = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('aberturas', array('borrado'=>$hoy), "id=$id_abertura");
		redirect("aberturas/listado");
	}
}