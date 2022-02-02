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
		// $this->load->helper('vayes_helper');
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

	public function fecha_centralizado()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/fecha_centralizado');
		$this->load->view('template/footer');
	}

	public function centralizado()
	{
		$fecha_hora_inicio = $this->input->post('fecha_inicio');
		$fecha_hora_fin    = $this->input->post('fecha_fin');
		
		$fecha_hora_inicio = $fecha_hora_inicio.' 00:00:00';
		$fecha_hora_fin    = $fecha_hora_fin.' 23:59:59';

		// var_dump($fecha_hora_fin);
		// exit;

		$data['inicio'] = $fecha_hora_inicio;
		$data['fin'] = $fecha_hora_fin;
		// Esto hace que las consultas GROUP BY se generen de manera normal
		$sql_mode = "set session sql_mode=''";
		$this->db->query($sql_mode);

		// suma total de trabajos
		$trabajos_totales = "SELECT SUM(total) as total
						FROM trabajos 
						WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND borrado IS NULL;";	
		$data['trabajos_totales'] = $this->db->query($trabajos_totales)->row_array();

		// total gastos ingresos caja chica
		$ingresos_gastos_cc = "SELECT SUM(salida) as gastos, SUM(ingreso) as ingreso
							FROM cajachica 
							WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
							AND borrado IS NULL;";	
		$data['ingresos_gastos_cc'] = $this->db->query($ingresos_gastos_cc)->row_array();

		// total y cantidad ingresos por contratos
		$ingresos_contratos = "SELECT SUM(cantidad*total) as total, COUNT(id) as cantidad
							FROM contratos 
							WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
							AND borrado IS NULL;";	
		$data['ingresos_contratos'] = $this->db->query($ingresos_contratos)->row_array();

		// cantidad total de trabajos
		$trabajos_cantidad = "SELECT COUNT(id) as total 
						FROM trabajos 
						WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND borrado IS NULL;";	
		$data['trabajos_cantidad'] = $this->db->query($trabajos_cantidad)->row_array();

		// cantidad total de deudores
		$cantidad_deudores = "SELECT COUNT(id) as total
						FROM trabajos 
						WHERE ultimo_pago BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND saldo <> 0
						AND borrado IS NULL;";	
		$data['cantidad_deudores'] = $this->db->query($cantidad_deudores)->row_array();

		// monto por deudores
		$monto_deudores = "SELECT SUM(saldo) as total
						FROM trabajos 
						WHERE ultimo_pago BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND saldo <> 0
						AND borrado IS NULL;";	
		$data['monto_deudores'] = $this->db->query($monto_deudores)->row_array();

		// cantidad de no entregados
		$trabajos_no_entregados = "SELECT COUNT(id) as total
						FROM trabajos 
						WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND entregado = 'No'
						AND borrado IS NULL;
						";	
		$data['trabajos_no_entregados'] = $this->db->query($trabajos_no_entregados)->row_array();

		// costos de operacion
		$costos_operacion = "SELECT costos.descripcion, costos.varon, COUNT(costos.id) as total
							FROM costos 
							LEFT JOIN costos_produccion ON costos_produccion.costo_id = costos.id 
							WHERE costos_produccion.created_at BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
							AND costos_produccion.borrado IS NULL
							GROUP BY costos.descripcion;
						";	
		$data['costos_operacion'] = $this->db->query($costos_operacion)->result_array();
		// vdebug($data['costos_operacion'], true, false, true);

		// CANTIDAD DE INEVTARIOS COMPRA Y VENTA MES ACTUAL
		$compra_inevtarios = "SELECT COUNT(id) as total
						FROM compras 
						WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND estado = 1;
						";	
		$data['cantidad_compra'] = $this->db->query($compra_inevtarios)->row_array();

		// monto por compra
		$valor_compra = "SELECT SUM(precio_total) as total
						FROM compras 
						WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND estado = 1;";	
		$data['valor_compra'] = $this->db->query($valor_compra)->row_array();

		// CANTIDAD DE INEVTARIOS COMPRA Y VENTA MES ACTUAL
		$venta_inventarios = "SELECT COUNT(id) as total
						FROM ventas 
						WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND estado = 1";	
		$data['venta_compra'] = $this->db->query($venta_inventarios)->row_array();

		// monto por compra
		$valor_venta = "SELECT SUM(precio_total) as total
						FROM ventas 
						WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
						AND estado = 1;";	
		$data['valor_venta'] = $this->db->query($valor_venta)->row_array();

		// CANTIDAD DE INEVTARIOS COMPRA Y VENTA MES ACTUAL
		$cantidad_empleados = "SELECT COUNT(id) as total
						FROM personal 
						WHERE borrado IS NULL";	
		$data['cantidad_empleados'] = $this->db->query($cantidad_empleados)->row_array();

		$mes_inicio = date('m', strtotime($fecha_hora_inicio));//MES ACTUAL
		$anio_inicio = date('Y', strtotime($fecha_hora_inicio));//AÑO ACTUAL

		$mes_fin = date('m', strtotime($fecha_hora_fin));//MES ACTUAL
		$anio_fin = date('Y', strtotime($fecha_hora_fin));//AÑO ACTUAL		
		// monto por compra
		$sueldo_empleados = "SELECT SUM(sueldo) as total
						FROM sueldos 
						WHERE mes BETWEEN '$mes_inicio' AND '$mes_fin'
						AND anio BETWEEN '$anio_inicio' AND '$anio_fin'
						AND borrado IS NULL;";	
		$data['sueldo_empleados'] = $this->db->query($sueldo_empleados)->row_array();

		// CANTIDAD DE INEVTARIOS COMPRA Y VENTA MES ACTUAL
		$cantidad_descuentos = "SELECT COUNT(id) as total
						FROM sueldos 
						WHERE mes BETWEEN '$mes_inicio' AND '$mes_fin'
						AND anio BETWEEN '$anio_inicio' AND '$anio_fin'
						AND descuentos > '0'
						AND borrado IS NULL";	
		$data['cantidad_descuentos'] = $this->db->query($cantidad_descuentos)->row_array();

		// monto por compra
		$descuento_empleados = "SELECT SUM(descuentos) as total
						FROM sueldos 
						WHERE mes BETWEEN '$mes_inicio' AND '$mes_fin'
						AND anio BETWEEN '$anio_inicio' AND '$anio_fin'
						AND borrado IS NULL;";	
		$data['descuento_empleados'] = $this->db->query($descuento_empleados)->row_array();

		// var_dump($data['venta_compra']);
		// COSTO Y PRODUCCION
		$fecha_hora_fin1 = $fecha_hora_fin.' 23:59:59' ;
		$costo_produccion = "SELECT SUM(cp.precio) as precio, COUNT(t.id) as cant_tra, c.id , c.descripcion as tipo
							FROM trabajos t INNER JOIN costos_produccion cp
								ON t.id = cp.trabajo_id	INNER JOIN costos c
									ON c.id = cp.costo_id
							WHERE t.fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin1' 
							GROUP by c.id";
							// -- WHERE t.fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin' ";


		$data['costo_produccion'] = $this->db->query($costo_produccion)->result();
		// $data['costo_produccion'] = $this->db->query($costo_produccion)->row_array();

		// $data['costo_produccion'] = $this->db->query($costo_produccion)->result();
		
		// var_dump($data['costo_produccion']);
		// exit;


		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/centralizado', $data);
		$this->load->view('template/footer');
	}

	public function fecha_inventario()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/fecha_inventario');
		$this->load->view('template/footer');
	}

	public function compra_venta_inventarios()
	{
		$fecha_hora_inicio = $this->input->post('fecha_inicio');
		$fecha_hora_fin    = $this->input->post('fecha_fin');

		$data['inicio'] = $fecha_hora_inicio;
		$data['fin'] = $fecha_hora_fin;

		// Esto hace que las consultas GROUP BY se generen de manera normal
		$sql_mode = "set session sql_mode=''";
		$this->db->query($sql_mode);

		$sql_detalle_compras = "SELECT cat.nombre, com.stock, com.precio_unidad, com.precio_total
								FROM categorias cat, compras com
								WHERE com.fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
								AND com.borrado IS NULL 
								AND com.categoria_id = cat.id
								ORDER BY com.fecha";

		$data['detalle_compras'] = $this->db->query($sql_detalle_compras)->result_array();
		// vdebug($data['deudores'], true, true, true);
		
		$sql_compras = "SELECT cat.nombre, tmp.total
						FROM categorias cat, (SELECT SUM(stock) as total, categoria_id
																	FROM compras
																	WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
																	GROUP BY categoria_id)tmp
						WHERE cat.id = tmp.categoria_id
						ORDER BY cat.id";
		$data['compras'] = $this->db->query($sql_compras)->result_array();

		$sql_ventas = "SELECT cat.nombre, tmp.total
						FROM categorias cat, (SELECT SUM(cantidad) as total, categoria_id
																	FROM ventas
																	WHERE fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
																	GROUP BY categoria_id)tmp
						WHERE cat.id = tmp.categoria_id
						ORDER BY cat.id";
		$data['ventas'] = $this->db->query($sql_ventas)->result_array();
		
		$sql_total = "SELECT COUNT(id) AS total 
					FROM trabajos 
					WHERE saldo > 0 
					AND borrado IS NULL";
		$data['total'] = $this->db->query($sql_total)->row_array();


		$sql_detalle_ventas = "SELECT cat.nombre, ven.cantidad, ven.precio_venta, ven.precio_total
								FROM categorias cat, ventas ven
								WHERE ven.fecha BETWEEN '$fecha_hora_inicio' AND '$fecha_hora_fin'
								AND ven.borrado IS NULL 
								AND ven.categoria_id = cat.id
								ORDER BY ven.fecha";

		$data['detalle_ventas'] = $this->db->query($sql_detalle_ventas)->result_array();
		// vdebug($deudores_clientes, true, false, true);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/compra_venta_inventarios', $data);
		$this->load->view('template/footer');

	}

	//REPORTES DEL CONTROL DEL PERSONAL
	public function fecha_rrhh()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/fecha_rrhh');
		$this->load->view('template/footer');
	}

	public function sueldos_control()
	{
		$fecha_hora_inicio = $this->input->post('fecha_inicio').' '.'00:00:00';
		$fecha_hora_fin    = $this->input->post('fecha_fin').' '.'23:59:00';

		$mes_inicio = date('m', strtotime($fecha_hora_inicio));//MES ACTUAL
		$anio_inicio = date('Y', strtotime($fecha_hora_inicio));//AÑO ACTUAL

		$mes_fin = date('m', strtotime($fecha_hora_fin));//MES ACTUAL
		$anio_fin = date('Y', strtotime($fecha_hora_fin));//AÑO ACTUAL	

		$data['inicio'] = $fecha_hora_inicio;
		$data['fin'] = $fecha_hora_fin;

		$this->input->post('name');
		

		$pagados_total = "SELECT SUM(total) as total
										FROM sueldos
										WHERE mes BETWEEN '$mes_inicio' AND '$mes_fin'
										AND anio BETWEEN '$anio_inicio' AND '$anio_fin'
										AND estado = 'Pagado'
										AND borrado IS NULL";
		$data['pagados_total'] = $this->db->query($pagados_total)->row_array();

		$sin_pagar = "SELECT SUM(total) as total
										FROM sueldos
										WHERE mes BETWEEN '$mes_inicio' AND '$mes_fin'
										AND anio BETWEEN '$anio_inicio' AND '$anio_fin'
										AND estado = 'No'
										AND borrado IS NULL";
		$data['sin_pagar'] = $this->db->query($sin_pagar)->row_array();
		//vdebug($data['total_ingresos_trabajos'], false, false, true);

		$listado_sin_pagar = "SELECT suel.*, per.nombre, per.carnet, per.sueldo as salario
								FROM sueldos suel, personal per
								WHERE suel.mes BETWEEN '$mes_inicio' AND '$mes_fin'
								AND suel.anio BETWEEN '$anio_inicio' AND '$anio_fin'
								AND suel.estado = 'No'
								AND suel.borrado IS NULL
								AND suel.personal_id = per.id";
		$data['listado_sin_pagar'] = $this->db->query($listado_sin_pagar)->result_array();

		$control_re_ab_fa = "SELECT SUM(numero_atrasos)as total_atrasos, SUM(abandono_manana) as total_aban_man, SUM(abandono_tarde) as total_aban_tar, SUM(falta_manana) as total_fal_man, SUM(falta_tarde) as total_fal_tar
							FROM sueldos
							WHERE mes BETWEEN '$mes_inicio' AND '$mes_fin'
							AND anio BETWEEN '$anio_inicio' AND '$anio_fin'
							AND borrado IS NULL";
		$data['control_re_ab_fa'] = $this->db->query($control_re_ab_fa)->row_array();

		$lista_detallada = "SELECT per.nombre, SUM(suel.numero_atrasos)as total_atrasos, SUM(suel.abandono_manana) as total_aban_man, SUM(suel.abandono_tarde) as total_aban_tar, SUM(suel.falta_manana) as total_fal_man, SUM(suel.falta_tarde) as total_fal_tar
							FROM sueldos suel, personal per
							WHERE suel.mes BETWEEN '$mes_inicio' AND '$mes_fin'
							AND suel.anio BETWEEN '$anio_inicio' AND '$anio_fin'
							AND suel.borrado IS NULL
							AND suel.personal_id = per.id
							GROUP BY suel.personal_id";
		$data['lista_detallada'] = $this->db->query($lista_detallada)->result_array();


		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('reportes/sueldos_control', $data);
		$this->load->view('template/footer');

	}

}