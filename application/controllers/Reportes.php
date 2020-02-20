<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

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
		// $this->load->view('welcome_message');
	}

	public function prueba()
	{
		echo 'Holas desde reportes';
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

	public function inicio()
	{
		$data['clientes'] = $this->db->get('clientes')->result_array();		
		// echo 'Holas desde listado';
		// vdebug($clientes, true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('reportes/inicio');
		$this->load->view('template/footer');
	}

	public function genera_ingresos()
	{
		$fecha_hora_inicio = $this->input->post('fecha_inicio').' '.'00:00:00';
		$fecha_hora_fin    = $this->input->post('fecha_fin').' '.'23:59:00';
		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.fecha >=', $fecha_hora_inicio);
		$this->db->where('t.fecha <=', $fecha_hora_fin);
		$this->db->where('t.borrado =', NULL);

		$sql_totales = "SELECT SUM(total) as total, SUM(saldo) as saldo 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						";
		$data['totales'] = $this->db->query($sql_totales, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();

		$sql_tela_confeccion = "SELECT SUM(costo_tela) as tela, SUM(costo_confeccion) as confeccion 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						";
		$data['tela_confeccion'] = $this->db->query($sql_tela_confeccion, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();

		$sql_entregados = "SELECT COUNT(id) as cantidad 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						AND entregado = 'Si'
						";
		$data['entregados'] = $this->db->query($sql_entregados, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();

		$sql_no_entregados = "SELECT COUNT(id) as cantidad 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						AND entregado = 'No'
						";
		$data['no_entregados'] = $this->db->query($sql_no_entregados, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();



		// vdebug($consulta_totales, true, false, true);
		$data['inicio'] = $fecha_hora_inicio;
		$data['fin'] = $fecha_hora_fin;
		$data['trabajos'] = $this->db->get()->result_array();

		
		// vdebug($data['trabajo'], true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('reportes/genera_ingresos', $data);
		$this->load->view('template/footer');
	}
}