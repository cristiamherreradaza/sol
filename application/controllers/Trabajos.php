<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trabajos extends CI_Controller {

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

	public function __construct() {
		parent::__construct();
		// $this->load->helper('url_helper');
		// $this->load->database();
		$this->load->helper('vayes_helper');
	}

	public function index() {
		$this->load->view('welcome_message');
	}

	public function hola() {
		echo 'Holas desde code';

	}

	public function nuevo() {

		$modelos_varon_saco   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo'   => 'saco', 'genero'   => 'varon'))->result_array();
		$aberturas_varon_saco = $this->db->order_by('nombre', 'ASC')->get_where('aberturas', array('tipo' => 'saco', 'genero' => 'varon'))->result_array();
		$detalles_varon_saco  = $this->db->order_by('nombre', 'ASC')->get_where('detalles', array('tipo'  => 'saco', 'genero'  => 'varon'))->result_array();

		$modelos_varon_pantalon   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo'   => 'pantalon', 'genero'   => 'varon'))->result_array();
		$pinzas_varon_pantalon    = $this->db->order_by('nombre', 'ASC')->get_where('pinzas', array('tipo'    => 'pantalon', 'genero'    => 'varon'))->result_array();
		$bolsillos_varon_pantalon = $this->db->order_by('nombre', 'ASC')->get_where('bolsillos', array('tipo' => 'pantalon', 'genero' => 'varon'))->result_array();

		$modelos_varon_chalecos   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo'   => 'chaleco', 'genero'   => 'varon'))->result_array();

		$data['modelos_varon_saco']       = $modelos_varon_saco;
		$data['modelos_varon_pantalon']   = $modelos_varon_pantalon;
		$data['aberturas_varon_saco']     = $aberturas_varon_saco;
		$data['detalles_varon_saco']      = $detalles_varon_saco;
		$data['pinzas_varon_pantalon']    = $pinzas_varon_pantalon;
		$data['bolsillos_varon_pantalon'] = $bolsillos_varon_pantalon;
		// vdebug($modelos_varon_pantalon, true, false, true);
		// echo 'la vista desde trabajos';
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('trabajos/nuevo', $data);
		$this->load->view('template/footer');
	}

	public function guarda_trabajo() {

		vdebug($this->input->post(), true, false, true);
		$datos_cliente = array(
			'nombre'    => $this->input->post('nombre'),
			'ci'        => $this->input->post('ci'),
			'celulares' => $this->input->post('celulares'),
			'genero'    => $this->input->post('genero'),
		);
		$this->db->insert('clientes', $datos_cliente);
		$id_cliente = $this->db->insert_id();

		$datos_trabajo = array(
			'cliente_id' => $id_cliente,
			'fecha'      => $this->input->post('fecha'),
			'monto'      => $this->input->post('precio_total'),
		);
		$this->db->insert('trabajos', $datos_trabajo);
		$id_trabajo = $this->db->insert_id();

		// guardamos saco
		// fin guardamos saco

		// vdebug($id_cliente, true, false, true);
	}

	public function ajax_listado_clientes() {
		$listado_clientes = $this->db->get('Clientes')->result_array();

		// vdebug($listado_clientes, true, false, true);
		$data['clientes'] = $listado_clientes;
		$this->load->view('trabajos/ajax_listado_clientes', $data);
	}

}
