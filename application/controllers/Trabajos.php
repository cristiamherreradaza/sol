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

		$hora_registro = date('H:i:s');
		$fecha_hora_trabajo = $this->input->post('fecha').' '.$hora_registro;

		$fecha_hora_prueba = $this->input->post('fecha_prueba').' '.$this->input->post('hora_prueba');
		$fecha_mas_dias = strtotime($this->input->post('fecha_prueba'));
		$fecha_mas_dias = strtotime("+7 day", $fecha_mas_dias);
		$fecha_mas_transformado = date('Y-m-d', $fecha_mas_dias);

		vdebug($fecha_mas_transformado, false, false, true);
		vdebug($fecha_hora_trabajo, false, false, true);
		vdebug($fecha_hora_prueba, true, false, true);

		$datos_cliente = array(
			'nombre'    => $this->input->post('nombre'),
			'ci'        => $this->input->post('ci'),
			'celulares' => $this->input->post('celulares'),
			'genero'    => $this->input->post('genero'),
		);
		$this->db->insert('clientes', $datos_cliente);
		$id_cliente = $this->db->insert_id();


		$datos_trabajo = array(
			'cliente_id'       => $id_cliente,
			'fecha'            => $fecha_hora,
			'costo_tela'       => $this->input->post('costo_tela'),
			'costo_confeccion' => $this->input->post('costo_confeccion'),
			'monto'            => $this->input->post('precio_total'),
		);
		$this->db->insert('trabajos', $datos_trabajo);
		$id_trabajo = $this->db->insert_id();

		$datos_pantalon = array(
			'cliente_id'  => $id_cliente,
			'trabajo_id'  => $id_trabajo,
			'modelo_id'   => $this->input->post('sd_modelo'),
			'abertura_id' => $this->input->post('sd_abertura'),
			'detalle_id'  => $this->input->post('sd_detalle'),
			'talla'       => $this->input->post('s_talla'),
			'largo'       => $this->input->post('s_largo'),
			'hombro'      => $this->input->post('s_hombro'),
			'espalda'     => $this->input->post('s_espalda'),
			'pecho'       => $this->input->post('s_pecho'),
			'estomago'    => $this->input->post('s_estomago'),
			'medio_brazo' => $this->input->post('s_mbrazo'),
			'largo_manga' => $this->input->post('s_lmanga'),
		);
		$this->db->insert('sacos', $datos_pantalon);

		// guardamos saco
		// fin guardamos saco

		// vdebug($id_cliente, true, false, true);
	}

	public function ajax_listado_clientes() {
		$listado_clientes = $this->db->get('Clientes')->result_array();
		// vdebug($d,);

		// vdebug($listado_clientes, true, false, true);
		$data['clientes'] = $listado_clientes;
		$this->load->view('trabajos/ajax_listado_clientes', $data);
	}

}
