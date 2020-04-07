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
						AND borrado IS NULL
						";
		$data['totales'] = $this->db->query($sql_totales, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();

		$sql_tela_confeccion = "SELECT SUM(costo_tela) as tela, SUM(costo_confeccion) as confeccion 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						AND borrado IS NULL
						";
		$data['tela_confeccion'] = $this->db->query($sql_tela_confeccion, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();

		$sql_entregados = "SELECT COUNT(id) as cantidad 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						AND borrado IS NULL
						AND entregado = 'Si'
						";
		$data['entregados'] = $this->db->query($sql_entregados, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();

		$sql_no_entregados = "SELECT COUNT(id) as cantidad 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						AND borrado IS NULL
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

	public function reporte_deudas()
	{
		// Esto hace que las consultas GROUP BY se generen de manera normal
		$sql_mode = "set session sql_mode=''";
		$this->db->query($sql_mode);

		$sql_deudores = "SELECT t.id, c.nombre, t.fecha, t.saldo, t.entregado, DATEDIFF(CURDATE(), t.fecha) AS dias 
						FROM trabajos as t
						LEFT JOIN clientes as c ON t.cliente_id = c.id
						WHERE t.saldo > 0 
						AND t.borrado IS NULL
						ORDER BY dias DESC";

		$data['deudores'] = $this->db->query($sql_deudores)->result_array();
		// vdebug($data['deudores'], true, true, true);
		
		$sql_clientes = "SELECT t.id, c.nombre, t.fecha, SUM(t.saldo) AS saldo_total
						FROM trabajos as t
						LEFT JOIN clientes as c ON t.cliente_id = c.id
						WHERE t.saldo > 0
						AND t.borrado IS NULL 
						GROUP BY c.nombre
						ORDER BY saldo_total DESC";
		$data['clientes'] = $this->db->query($sql_clientes)->result_array();
		
		$sql_total = "SELECT COUNT(id) AS total 
					FROM trabajos 
					WHERE saldo > 0 
					AND borrado IS NULL";
		$data['total'] = $this->db->query($sql_total)->row_array();


		$sql_total_entregados = "SELECT COUNT(id) AS total 
								FROM trabajos 
								WHERE saldo > 0 
								AND borrado IS NULL 
								AND entregado = 'SI'";
		$data['total_entregados'] = $this->db->query($sql_total_entregados)->row_array();
		$data['total_sin_entregar'] = $data['total']['total']-$data['total_entregados']['total'];
		// vdebug($deudores_clientes, true, false, true);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/genera_deudores', $data);
		$this->load->view('template/footer');
	}

	public function ingresos_gastos()
	{
		$fecha_hora_inicio = $this->input->post('fecha_inicio').' '.'00:00:00';
		$fecha_hora_fin    = $this->input->post('fecha_fin').' '.'23:59:00';

		$data['inicio'] = $fecha_hora_inicio;
		$data['fin'] = $fecha_hora_fin;

		$this->input->post('name');

		$sql_total_ingreso_trabajos = "SELECT SUM(total) as total, SUM(saldo) as saldo 
						FROM trabajos
						WHERE fecha >= ?
						AND fecha <= ?
						AND borrado IS NULL
						";
		$data['total_ingresos_trabajos'] = $this->db->query($sql_total_ingreso_trabajos, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();
		//vdebug($data['total_ingresos_trabajos'], false, false, true);

		$sql_total_gastos = "SELECT SUM(salida) as total
						FROM cajachica
						WHERE fecha >= ?
						AND fecha <= ?
						AND borrado IS NULL
						";
		$data['total_gastos'] = $this->db->query($sql_total_gastos, array($fecha_hora_inicio, $fecha_hora_fin))->row_array();
		// vdebug($data['total_gastos'], true, false, true);

		$this->db->select('p.id, c.nombre as cliente, u.nombre, t.id as trabajo, p.fecha, p.monto');
		$this->db->from('pagos as p');
		$this->db->join('clientes as c', 'c.id = p.cliente_id', 'left');
		$this->db->join('trabajos as t', 't.id = p.trabajo_id', 'left');
		$this->db->join('usuarios as u', 'u.id = p.usuario_id', 'left');
		$this->db->where('t.fecha >=', $fecha_hora_inicio);
		$this->db->where('t.fecha <=', $fecha_hora_fin);
		$this->db->where('t.borrado =', NULL);
		$data['listado_pagos'] = $this->db->get()->result();
		//vdebug($data['pagos'], false, false, true);
		
		$this->db->select('c.id, u.nombre, c.descripcion, c.fecha, c.salida');
		$this->db->from('cajachica as c');
		$this->db->join('usuarios as u', 'u.id = c.usuario_id', 'left');
		$this->db->where('c.fecha >=', $fecha_hora_inicio);
		$this->db->where('c.fecha <=', $fecha_hora_fin);
		$this->db->where('c.borrado =', NULL);
		$data['listado_cajachica'] = $this->db->get()->result();

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/ingresos_gastos', $data);
		$this->load->view('template/footer');

	}

	public function centralizado()
	{

	}
}