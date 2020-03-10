<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trabajos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->helper('url_helper');
		// $this->load->database();
		// $this->load->library('encrypt');
		$this->load->helper('vayes_helper');
		$this->load->helper('tools_helper');
	}

	public function index() {
		$this->load->view('welcome_message');
	}

	public function nuevo() {

		// $valor = $this->encrypt->encode('123456');
		// vdebug($valor, true, false, true);
		$this->db->select('g.nombre, g.celulares, g.direccion, c.*');
		$this->db->from('contratos as c');
		$this->db->order_by('c.id', 'desc');
		$this->db->join('grupos as g', 'g.id = c.grupo_id', 'left');
		$this->db->where('c.borrado =', NULL);
		$this->db->where('c.terminado', 'No');
		// $this->db->limit(100);
		$data['contratos'] = $this->db->get()->result_array();
		// vdebug($data['contratos'], true, false, true);

		$modelos_varon_saco   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'saco', 'borrado ='=>NULL))->result_array();
		$aberturas_varon_saco = $this->db->order_by('nombre', 'ASC')->get_where('aberturas', array('tipo' => 'saco', 'borrado ='=>NULL))->result_array();
		$detalles_varon_saco  = $this->db->order_by('nombre', 'ASC')->get_where('detalles', array('tipo'  => 'saco', 'borrado ='=>NULL, 'genero'  => 'varon'))->result_array();
		
		$modelos_varon_pantalon   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo'   => 'pantalon', 'borrado ='=>NULL))->result_array();
		$pinzas_varon_pantalon    = $this->db->order_by('nombre', 'ASC')->get_where('pinzas', array('tipo'    => 'pantalon', 'borrado ='=>NULL, 'genero'    => 'varon'))->result_array();
		$bolsillos_varon_pantalon = $this->db->order_by('nombre', 'ASC')->get_where('bolsillos', array('tipo' => 'pantalon', 'borrado ='=>NULL))->result_array();
		
		$modelos_varon_chalecos   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'chaleco', 'borrado ='=>NULL))->result_array();
		$detalles_varon_chalecos  = $this->db->order_by('nombre', 'ASC')->get_where('detalles', array('tipo'  => 'chaleco', 'borrado ='=>NULL))->result_array();
		
		$modelos_faldas  = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'falda', 'borrado ='=>NULL))->result_array();
		$aberturas_falda = $this->db->order_by('nombre', 'ASC')->get_where('aberturas', array('tipo' => 'falda', 'borrado ='=>NULL))->result_array();
		
		$modelos_jumper   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'jumper', 'borrado ='=>NULL))->result_array();
		$aberturas_jumper = $this->db->order_by('nombre', 'ASC')->get_where('aberturas', array('tipo' => 'jumper', 'borrado ='=>NULL))->result_array();
		$bolsillos_jumper = $this->db->order_by('nombre', 'ASC')->get_where('bolsillos', array('tipo' => 'jumper', 'borrado ='=>NULL))->result_array();



		$data['modelos_varon_saco']       = $modelos_varon_saco;
		$data['modelos_varon_pantalon']   = $modelos_varon_pantalon;
		$data['modelos_varon_chalecos']   = $modelos_varon_chalecos;
		$data['aberturas_varon_saco']     = $aberturas_varon_saco;
		$data['detalles_varon_saco']      = $detalles_varon_saco;
		$data['detalles_varon_chalecos']  = $detalles_varon_chalecos;
		$data['pinzas_varon_pantalon']    = $pinzas_varon_pantalon;
		$data['bolsillos_varon_pantalon'] = $bolsillos_varon_pantalon;
		$data['modelos_faldas']           = $modelos_faldas;
		$data['aberturas_falda']           = $aberturas_falda;
		$data['modelos_jumper']            = $modelos_jumper;
		$data['aberturas_jumper']          = $aberturas_jumper;
		$data['bolsillos_jumper']          = $bolsillos_jumper;
		// vdebug($modelos_varon_pantalon, true, false, true);
		// echo 'la vista desde trabajos';
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('trabajos/nuevo', $data);
		$this->load->view('template/footer');
	}

	public function guarda_trabajo() 
	{
		$usuario_id = $this->session->id_usuario;

		if (!empty($this->input->post('cod_cliente'))) {
			$id_cliente = $this->input->post('cod_cliente');
		} else {
			$datos_cliente = array(
				'nombre'    => $this->input->post('nombre'),
				'ci'        => $this->input->post('ci'),
				'celulares' => $this->input->post('celulares'),
				'genero'    => $this->input->post('genero'),
			);
			$this->db->insert('clientes', $datos_cliente);
			$id_cliente = $this->db->insert_id();
		}

		$hora_registro = date('H:i:s');
		$fecha_hora_trabajo = $this->input->post('fecha').' '.$hora_registro;

		$fecha_hora_prueba = $this->input->post('fecha_prueba').' '.$this->input->post('hora_prueba');
		$fecha_hora_entrega = $this->input->post('fecha_entrega').' '.$this->input->post('hora_entrega');

		$datos_trabajo = array(
			'cliente_id'       => $id_cliente,
			'usuario_id'       => $usuario_id,
			'fecha'            => $fecha_hora_trabajo,
			'fecha_prueba'     => $fecha_hora_prueba,
			'fecha_entrega'    => $fecha_hora_entrega,
			'costo_tela'       => $this->input->post('costo_tela'),
			'costo_confeccion' => $this->input->post('costo_confeccion'),
			'total'            => $this->input->post('monto_total'),
			'saldo'            => $this->input->post('saldo'),
			'tela_propia'      => $this->input->post('tela_propia'),
			'marca_tela'       => $this->input->post('marca'),
			'rebaja'           => $this->input->post('rebaja'),
			'motivo_rebaja'    => $this->input->post('motivo_rebaja')
		);
		$this->db->insert('trabajos', $datos_trabajo);
		$id_trabajo = $this->db->insert_id();

		$datos_pago = array(
			'cliente_id' => $id_cliente,
			'trabajo_id' => $id_trabajo,
			'fecha'      => $fecha_hora_trabajo,
			'monto'      => $this->input->post('a_cuenta')
		);
		$this->db->insert('pagos', $datos_pago);

		if (!empty($this->input->post('s_pecho'))) {
			$datos_saco = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('sd_modelo'),
				'abertura_id'     => $this->input->post('sd_aberturas'),
				'detalle_id'      => $this->input->post('sd_detalle'),
				'color'           => $this->input->post('sd_color'),
				'color_ojal'      => $this->input->post('sd_color_ojal'),
				'ojal_puno'       => $this->input->post('sd_ojal'),
				'botones'         => $this->input->post('sd_botones'),
				'talla'           => $this->input->post('s_talla'),
				'largo'           => $this->input->post('s_largo'),
				'hombro'          => $this->input->post('s_hombro'),
				'espalda'         => $this->input->post('s_espalda'),
				'pecho'           => $this->input->post('s_pecho'),
				'estomago'        => $this->input->post('s_estomago'),
				'medio_brazo'     => $this->input->post('s_mbrazo'),
				'largo_manga'     => $this->input->post('s_lmanga'),
				'altura_busto'    => $this->input->post('s_abusto'),
				'precio_unitario' => $this->input->post('saco_pu'),
				'cantidad'        => $this->input->post('saco_cantidad'),
			);
			$this->db->insert('sacos', $datos_saco);
		}

		if (!empty($this->input->post('p_largo'))) {
			$datos_pantalon = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('pd_modelo'),
				'pinza_id'        => $this->input->post('pd_pinzas'),
				'bolsillo_id'     => $this->input->post('pd_batras'),
				'largo'           => $this->input->post('p_largo'),
				'entre_pierna'    => $this->input->post('p_entrepierna'),
				'cintura'         => $this->input->post('p_cintura'),
				'muslo'           => $this->input->post('p_muslo'),
				'rodilla'         => $this->input->post('p_rodilla'),
				'bota_pie'        => $this->input->post('p_bpie'),
				'tiro_delantero'  => $this->input->post('p_tdelantero'),
				'tiro_atras'      => $this->input->post('p_tatras'),
				'cadera'          => $this->input->post('p_cadera'),
				'bragueta'        => $this->input->post('pd_bragueta'),
				'bota_pie_des'    => $this->input->post('pd_bpie'),
				'pretina'         => $this->input->post('pd_pretina'),
				'precio_unitario' => $this->input->post('pantalon_pu'),
				'cantidad'        => $this->input->post('pantalon_cantidad'),
			);
			$this->db->insert('pantalones', $datos_pantalon);
		}

		if (!empty($this->input->post('ch_estomago'))) {
			$datos_chaleco = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('ch_modelo'),
				'detalle_id'      => $this->input->post('ch_detalle'),
				'largo'           => $this->input->post('ch_largo'),
				'pecho'           => $this->input->post('ch_pecho'),
				'estomago'        => $this->input->post('ch_estomago'),
				'botones'         => $this->input->post('ch_botones'),
				'color_ojales'    => $this->input->post('ch_color'),
				'altura_busto'    => $this->input->post('ch_abusto'),
				'precio_unitario' => $this->input->post('ch_pu'),
				'cantidad'        => $this->input->post('ch_cantidad'),
			);
			$this->db->insert('chalecos', $datos_chaleco);
		}

		if (!empty($this->input->post('cam_cuello'))) {
			$datos_camisa = array(
				'cliente_id'       => $id_cliente,
				'trabajo_id'       => $id_trabajo,
				'cuello'           => $this->input->post('cam_cuello'),
				'modelo_cuello'    => $this->input->post('cam_mcuello'),
				'cuello_combinado' => $this->input->post('cam_ccombinado'),
				'largo_manga'      => $this->input->post('cam_lmanga'),
				'ancho'            => $this->input->post('cam_ancho'),
				'color'            => $this->input->post('cam_color'),
				'precio_unitario'  => $this->input->post('cam_pu'),
				'cantidad'         => $this->input->post('cam_cantidad'),

			);
			$this->db->insert('camisas', $datos_camisa);
		}

		if (!empty($this->input->post('fa_largo'))) {
			$datos_falda = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('fa_modelo'),
				'abertura_id'     => $this->input->post('fa_abertura'),
				'largo'           => $this->input->post('fa_largo'),
				'cintura'         => $this->input->post('fa_cintura'),
				'cadera'          => $this->input->post('fa_cadera'),
				'vasta'           => $this->input->post('fa_vasta'),
				'pretina'         => $this->input->post('fa_pretina'),
				'precio_unitario' => $this->input->post('fa_pu'),
				'cantidad'        => $this->input->post('fa_cantidad'),
			);
			$this->db->insert('faldas', $datos_falda);
		}

		if (!empty($this->input->post('j_talle'))) {
			$datos_jumper = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('j_modelo'),
				'abertura_id'     => $this->input->post('j_abertura'),
				'bolsillo_id'     => $this->input->post('j_bolsillo'),
				'talle'           => $this->input->post('j_talle'),
				'largo'           => $this->input->post('j_largo'),
				'cintura'         => $this->input->post('j_cintura'),
				'cadera'          => $this->input->post('j_cadera'),
				'pecho'           => $this->input->post('j_pecho'),
				'estomago'        => $this->input->post('j_estomago'),
				'altura_busto'    => $this->input->post('j_abusto'),
				'precio_unitario' => $this->input->post('jam_pu'),
				'cantidad'        => $this->input->post('jam_cantidad'),
			);
			$this->db->insert('jumpers', $datos_jumper);
		}


		$sw = 0;
		if (!empty($this->input->post('corbaton_color')))
		{
			$corbaton_color = $this->input->post('corbaton_color');
			$sw = 1;
		}

		if (!empty($this->input->post('cg_color')))
		{
			$cg_color = $this->input->post('cg_color');
			$sw = 1;
		}

		if (!empty($this->input->post('faja_color')))
		{
			$faja_color = $this->input->post('faja_color');
			$sw = 1;
		}
		if($sw == 1){
			$datos_extras = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'corbaton'        => $corbaton_color,
				'corbata_gato'    => $cg_color,
				'faja'            => $faja_color,
				'precio_unitario' => $this->input->post('ext_pu'),
				'cantidad'        => $this->input->post('ext_cantidad'),
			);
			$this->db->insert('extras', $datos_extras);
		}

		redirect("Trabajos/detalle_trabajo/$id_trabajo");

	}

	public function detalle_trabajo($id_trabajo = null)
	{
		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.id', $id_trabajo);
		$data['trabajo'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ab.nombre as nombre_abertura, sa.*');
		$this->db->from('sacos as sa');
		$this->db->join('modelos as mo', 'mo.id = sa.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = sa.detalle_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = sa.abertura_id', 'left');
		$this->db->where('sa.trabajo_id', $id_trabajo);
		$data['saco'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, pi.nombre as pinzas_nombre, bo.nombre as bolsillo_nombre, pa.*');
		$this->db->from('pantalones as pa');
		$this->db->join('modelos as mo', 'mo.id = pa.modelo_id', 'left');
		$this->db->join('pinzas as pi', 'pi.id = pa.pinza_id', 'left');
		$this->db->join('bolsillos as bo', 'bo.id = pa.bolsillo_id', 'left');
		$this->db->where('pa.trabajo_id', $id_trabajo);
		$data['pantalon'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ch.*');
		$this->db->from('chalecos as ch');
		$this->db->join('modelos as mo', 'mo.id = ch.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = ch.detalle_id', 'left');
		$this->db->where('ch.trabajo_id', $id_trabajo);
		$data['chaleco'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, f.*');
		$this->db->from('faldas as f');
		$this->db->join('modelos as mo', 'mo.id = f.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = f.abertura_id', 'left');
		$this->db->where('f.trabajo_id', $id_trabajo);
		$data['falda'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, b.nombre as bolsillo_nombre, j.*');
		$this->db->from('jumpers as j');
		$this->db->join('modelos as mo', 'mo.id = j.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = j.abertura_id', 'left');
		$this->db->join('bolsillos as b', 'b.id = j.bolsillo_id', 'left');
		$this->db->where('j.trabajo_id', $id_trabajo);
		$data['jumper'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('camisas as ca');
		$this->db->where('ca.trabajo_id', $id_trabajo);
		$data['camisa'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('extras as ex');
		$this->db->where('ex.trabajo_id', $id_trabajo);
		$data['extras'] = $this->db->get()->row_array();

		// vdebug($data['chaleco'], false, false, true);

		// $data['trabajo'] = $this->db->get_where('trabajos', array('id'=>$id_trabajo))->row_array();
		$fecha = fechaEs($data['trabajo']['fecha']);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('trabajos/detalle_trabajo', $data);
		$this->load->view('template/footer');
	}

	public function ajax_listado_clientes() 
	{
		$listado_clientes = $this->db->get('Clientes')->result_array();
		// vdebug($d,);

		// vdebug($listado_clientes, true, false, true);
		$data['clientes'] = $listado_clientes;
		$this->load->view('trabajos/ajax_listado_clientes', $data);
	}

	public function listado_trabajos()
	{
		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->order_by('t.id', 'desc');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.borrado', NULL);
		$this->db->limit(100);
		$data['trabajos'] = $this->db->get()->result_array();
		// vdebug($data['trabajo'], true ,false, true);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('trabajos/listado_trabajos', $data);
		$this->load->view('template/footer');
	}

	public function ajax_busca_cliente($nombre_cliente = null)
	{
		// $nombre_cliente='juan';
		// $consulta_cliente = $this->db->get_where;
		$cliente_limpio = str_replace("%20"," ",$nombre_cliente);
		$consulta_cliente = $this->db->like('nombre', $cliente_limpio);		
		$this->db->limit(10);
		$data['clientes_encontrados'] = $this->db->get('clientes')->result_array();
		// vdebug($res, true, false, true);
		$this->load->view('trabajos/ajax_busca_cliente', $data);
		// return $nombre_cliente;
	}

	public function ajax_valida_cliente($nombre_cliente = null)
	{
		$cliente_limpio     = str_replace("%20"," ",$nombre_cliente);
		$consulta_cliente   = $this->db->like('nombre', $cliente_limpio);		
		$cliente_encontrado = $this->db->get('clientes')->result_array();
		if(!empty($cliente_encontrado)){
			$resultado = 1;
		}else{
			$resultado = 0;
		}
		echo json_encode($resultado);
		// $this->load->view('trabajos/ajax_busca_cliente', $data);
	}

	public function ajax_medidas_cliente($id_cliente = null)
	{
		// echo $id_cliente;
		$data['cliente'] = $this->db->get_where('clientes', array(
			'id'=>$id_cliente
		))->row_array();

		$data['sacos'] = $this->db->select('*')
			->order_by('id','desc')
			->where('cliente_id', $id_cliente)
			->limit(1)
			->get('sacos')->row_array();

		$data['pantalones'] = $this->db->select('*')
			->order_by('id','desc')
			->where('cliente_id', $id_cliente)
			->limit(1)
			->get('pantalones')->row_array();

		$data['chalecos'] = $this->db->select('*')
			->order_by('id','desc')
			->where('cliente_id', $id_cliente)
			->limit(1)
			->get('chalecos')->row_array();

		echo json_encode($data, JSON_PRETTY_PRINT);

		// vdebug($datos, false, false, true);
	}

	public function login()
	{
		$this->load->view('template/login');
	}

	public function registro_pagos($id_trabajo)
	{
		$this->db->select('c.id, c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.id', $id_trabajo);
		$data['trabajo'] = $this->db->get()->row_array();

		$this->db->select('u.nombre, p.*');
		$this->db->from('pagos as p');
		$this->db->join('usuarios as u', 'u.id = p.usuario_id', 'left');
		$this->db->where('p.trabajo_id', $id_trabajo);
		$this->db->where('p.borrado', NULL);
		$data['pagos'] = $this->db->get()->result_array();
		// vdebug($data['pagos'], true, false, true);

		// $data['pagos'] = $this->db->get_where('pagos', array('trabajo_id'=>$id_trabajo))->result_array();

		$fecha = fechaEs($data['trabajo']['fecha']);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('trabajos/registro_pagos', $data);
		$this->load->view('template/footer');
	}

	public function guarda_pago()
	{
		$usuario_id = $this->session->id_usuario;
		// vdebug($this->input->post(), true, false, true);
		$fecha_hora = $this->input->post('fecha').' '.date('H:i:s');
		$id_trabajo = $this->input->post('trabajo_id');
		$detalle_trabajo = $this->db->get_where('trabajos', array('id'=>$id_trabajo))->row_array();

		$datos_pago = array(
			'cliente_id' => $this->input->post('cliente_id'),
			'trabajo_id' => $this->input->post('trabajo_id'),
			'usuario_id' => $usuario_id,
			'fecha'      => $fecha_hora,
			'monto'      => $this->input->post('monto'),
		);

		$this->db->insert('pagos', $datos_pago);
		$this->db->select_sum('monto');
		$this->db->where('trabajo_id', $id_trabajo);
		$suma_pagos = $this->db->get('pagos')->row_array();
		$total_trabajo = $detalle_trabajo['total'];
		$saldo = $total_trabajo-$suma_pagos['monto'];

		$this->db->update('trabajos', array('saldo'=>$saldo), "id=$id_trabajo");
		
		if(!empty($this->input->post('entregado')))
		{
			$this->db->update('trabajos', array('entregado'=>'Si'), "id=$id_trabajo");
		}

		redirect("Trabajos/registro_pagos/$id_trabajo");
	}

	public function borra_pago($id_pago = null, $id_trabajo = null)
	{
		// $id_trabajo = $this->input->post('trabajo_id');
		$detalle_trabajo = $this->db->get_where('trabajos', array('id'=>$id_trabajo))->row_array();
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('pagos', array('borrado'=>$hoy), "id=$id_pago");
	
		$this->db->select_sum('monto');
		$this->db->where('trabajo_id', $id_trabajo);
		$suma_pagos = $this->db->get('pagos')->row_array();
		$total_trabajo = $detalle_trabajo['total'];
		$saldo = $total_trabajo-$suma_pagos['monto'];

		$this->db->update('trabajos', array('saldo'=>$saldo), "id=$id_trabajo");

		redirect("Trabajos/registro_pagos/$id_trabajo");
	}

	public function form_edicion($id_trabajo = null)
	{

		$modelos_varon_saco   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'saco', 'borrado ='=>NULL))->result_array();
		$aberturas_varon_saco = $this->db->order_by('nombre', 'ASC')->get_where('aberturas', array('tipo' => 'saco', 'borrado ='=>NULL))->result_array();
		$detalles_varon_saco  = $this->db->order_by('nombre', 'ASC')->get_where('detalles', array('tipo'  => 'saco', 'borrado ='=>NULL, 'genero'  => 'varon'))->result_array();
		
		$modelos_varon_pantalon   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo'   => 'pantalon', 'borrado ='=>NULL))->result_array();
		$pinzas_varon_pantalon    = $this->db->order_by('nombre', 'ASC')->get_where('pinzas', array('tipo'    => 'pantalon', 'borrado ='=>NULL, 'genero'    => 'varon'))->result_array();
		$bolsillos_varon_pantalon = $this->db->order_by('nombre', 'ASC')->get_where('bolsillos', array('tipo' => 'pantalon', 'borrado ='=>NULL))->result_array();
		
		$modelos_varon_chalecos   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'chaleco', 'borrado ='=>NULL))->result_array();
		$detalles_varon_chalecos  = $this->db->order_by('nombre', 'ASC')->get_where('detalles', array('tipo'  => 'chaleco', 'borrado ='=>NULL))->result_array();
		
		$modelos_faldas  = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'falda', 'borrado ='=>NULL))->result_array();
		$aberturas_falda = $this->db->order_by('nombre', 'ASC')->get_where('aberturas', array('tipo' => 'falda', 'borrado ='=>NULL))->result_array();
		
		$modelos_jumper   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'jumper', 'borrado ='=>NULL))->result_array();
		$aberturas_jumper = $this->db->order_by('nombre', 'ASC')->get_where('aberturas', array('tipo' => 'jumper', 'borrado ='=>NULL))->result_array();
		$bolsillos_jumper = $this->db->order_by('nombre', 'ASC')->get_where('bolsillos', array('tipo' => 'jumper', 'borrado ='=>NULL))->result_array();

		$data['modelos_varon_saco']       = $modelos_varon_saco;
		$data['modelos_varon_pantalon']   = $modelos_varon_pantalon;
		$data['modelos_varon_chalecos']   = $modelos_varon_chalecos;
		$data['aberturas_varon_saco']     = $aberturas_varon_saco;
		$data['detalles_varon_saco']      = $detalles_varon_saco;
		$data['detalles_varon_chalecos']  = $detalles_varon_chalecos;
		$data['pinzas_varon_pantalon']    = $pinzas_varon_pantalon;
		$data['bolsillos_varon_pantalon'] = $bolsillos_varon_pantalon;
		$data['modelos_faldas']           = $modelos_faldas;
		$data['aberturas_falda']          = $aberturas_falda;
		$data['modelos_jumper']           = $modelos_jumper;
		$data['aberturas_jumper']         = $aberturas_jumper;
		$data['bolsillos_jumper']         = $bolsillos_jumper;
		// vdebug($modelos_varon_pantalon, true, false, true);
		// echo 'la vista desde trabajos';

		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.id', $id_trabajo);
		$data['trabajo'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ab.nombre as nombre_abertura, sa.*');
		$this->db->from('sacos as sa');
		$this->db->join('modelos as mo', 'mo.id = sa.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = sa.detalle_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = sa.abertura_id', 'left');
		$this->db->where('sa.trabajo_id', $id_trabajo);
		$data['saco'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, pi.nombre as pinzas_nombre, bo.nombre as bolsillo_nombre, pa.*');
		$this->db->from('pantalones as pa');
		$this->db->join('modelos as mo', 'mo.id = pa.modelo_id', 'left');
		$this->db->join('pinzas as pi', 'pi.id = pa.pinza_id', 'left');
		$this->db->join('bolsillos as bo', 'bo.id = pa.bolsillo_id', 'left');
		$this->db->where('pa.trabajo_id', $id_trabajo);
		$data['pantalon'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ch.*');
		$this->db->from('chalecos as ch');
		$this->db->join('modelos as mo', 'mo.id = ch.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = ch.detalle_id', 'left');
		$this->db->where('ch.trabajo_id', $id_trabajo);
		$data['chaleco'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, f.*');
		$this->db->from('faldas as f');
		$this->db->join('modelos as mo', 'mo.id = f.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = f.abertura_id', 'left');
		$this->db->where('f.trabajo_id', $id_trabajo);
		$data['falda'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, b.nombre as bolsillo_nombre, j.*');
		$this->db->from('jumpers as j');
		$this->db->join('modelos as mo', 'mo.id = j.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = j.abertura_id', 'left');
		$this->db->join('bolsillos as b', 'b.id = j.bolsillo_id', 'left');
		$this->db->where('j.trabajo_id', $id_trabajo);
		$data['jumper'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('camisas as ca');
		$this->db->where('ca.trabajo_id', $id_trabajo);
		$data['camisa'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('extras as ex');
		$this->db->where('ex.trabajo_id', $id_trabajo);
		$data['extras'] = $this->db->get()->row_array();

		// vdebug($data['chaleco'], false, false, true);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('trabajos/form_edicion', $data);
		$this->load->view('template/footer');

	}

	public function impresion_cliente($id_trabajo)
	{
		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.id', $id_trabajo);
		$data['trabajo'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ab.nombre as nombre_abertura, sa.*');
		$this->db->from('sacos as sa');
		$this->db->join('modelos as mo', 'mo.id = sa.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = sa.detalle_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = sa.abertura_id', 'left');
		$this->db->where('sa.trabajo_id', $id_trabajo);
		$data['saco'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, pi.nombre as pinzas_nombre, bo.nombre as bolsillo_nombre, pa.*');
		$this->db->from('pantalones as pa');
		$this->db->join('modelos as mo', 'mo.id = pa.modelo_id', 'left');
		$this->db->join('pinzas as pi', 'pi.id = pa.pinza_id', 'left');
		$this->db->join('bolsillos as bo', 'bo.id = pa.bolsillo_id', 'left');
		$this->db->where('pa.trabajo_id', $id_trabajo);
		$data['pantalon'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ch.*');
		$this->db->from('chalecos as ch');
		$this->db->join('modelos as mo', 'mo.id = ch.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = ch.detalle_id', 'left');
		$this->db->where('ch.trabajo_id', $id_trabajo);
		$data['chaleco'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, f.*');
		$this->db->from('faldas as f');
		$this->db->join('modelos as mo', 'mo.id = f.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = f.abertura_id', 'left');
		$this->db->where('f.trabajo_id', $id_trabajo);
		$data['falda'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, b.nombre as bolsillo_nombre, j.*');
		$this->db->from('jumpers as j');
		$this->db->join('modelos as mo', 'mo.id = j.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = j.abertura_id', 'left');
		$this->db->join('bolsillos as b', 'b.id = j.bolsillo_id', 'left');
		$this->db->where('j.trabajo_id', $id_trabajo);
		$data['jumper'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('camisas as ca');
		$this->db->where('ca.trabajo_id', $id_trabajo);
		$data['camisa'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('extras as ex');
		$this->db->where('ex.trabajo_id', $id_trabajo);
		$data['extras'] = $this->db->get()->row_array();

		// vdebug($data['chaleco'], false, false, true);

		// $data['trabajo'] = $this->db->get_where('trabajos', array('id'=>$id_trabajo))->row_array();
		$fecha = fechaEs($data['trabajo']['fecha']);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('trabajos/impresion_cliente', $data);
		$this->load->view('template/footer');
	}

	public function impresion_recibo($id_trabajo = null)
	{
		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.id', $id_trabajo);
		$data['trabajo'] = $this->db->get()->row_array();

		$data['pagos'] = $this->db->get_where('pagos', array('trabajo_id'=>$id_trabajo))->result_array();
		// vdebug($data['pagos'], true, false, true);

		$fecha = fechaEs($data['trabajo']['fecha']);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('trabajos/impresion_recibo', $data);
		$this->load->view('template/footer');

	}

	public function edita() {

		if (!empty($this->input->post('cod_cliente'))) {
			$id_cliente = $this->input->post('cod_cliente');
		} else {
			$datos_cliente = array(
				'nombre'    => $this->input->post('nombre'),
				'ci'        => $this->input->post('ci'),
				'celulares' => $this->input->post('celulares'),
				'genero'    => $this->input->post('genero'),
			);
			$this->db->insert('clientes', $datos_cliente);
			$id_cliente = $this->db->insert_id();
		}

		$hora_registro = date('H:i:s');
		$fecha_hora_trabajo = $this->input->post('fecha').' '.$hora_registro;

		$fecha_hora_prueba = $this->input->post('fecha_prueba').' '.$this->input->post('hora_prueba');
		$fecha_hora_entrega = $this->input->post('fecha_entrega').' '.$this->input->post('hora_entrega');
		// $fecha_mas_dias = strtotime($this->input->post('fecha_prueba'));
		// $fecha_mas_dias = strtotime("+7 day", $fecha_mas_dias);
		// $fecha_mas_transformado = date('Y-m-d', $fecha_mas_dias);
		// $fh_entrega = $fecha_mas_transformado.' 16:00:00';

		$datos_trabajo = array(
			'cliente_id'       => $id_cliente,
			'fecha'            => $fecha_hora_trabajo,
			'fecha_prueba'     => $fecha_hora_prueba,
			'fecha_entrega'    => $fecha_hora_entrega,
			'costo_tela'       => $this->input->post('costo_tela'),
			'costo_confeccion' => $this->input->post('costo_confeccion'),
			'total'            => $this->input->post('monto_total'),
			'saldo'            => $this->input->post('saldo'),
			'tela_propia'      => $this->input->post('tela_propia'),
			'marca_tela'       => $this->input->post('marca')
		);
		$this->db->insert('trabajos', $datos_trabajo);
		$id_trabajo = $this->db->insert_id();

		$datos_pago = array(
			'cliente_id' => $id_cliente,
			'trabajo_id' => $id_trabajo,
			'fecha'      => $fecha_hora_trabajo,
			'monto'      => $this->input->post('a_cuenta')
		);
		$this->db->insert('pagos', $datos_pago);

		if (!empty($this->input->post('s_pecho'))) {
			$datos_saco = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('sd_modelo'),
				'abertura_id'     => $this->input->post('sd_aberturas'),
				'detalle_id'      => $this->input->post('sd_detalle'),
				'color'           => $this->input->post('sd_color'),
				'color_ojal'      => $this->input->post('sd_color_ojal'),
				'ojal_puno'       => $this->input->post('sd_ojal'),
				'botones'         => $this->input->post('sd_botones'),
				'talla'           => $this->input->post('s_talla'),
				'largo'           => $this->input->post('s_largo'),
				'hombro'          => $this->input->post('s_hombro'),
				'espalda'         => $this->input->post('s_espalda'),
				'pecho'           => $this->input->post('s_pecho'),
				'estomago'        => $this->input->post('s_estomago'),
				'medio_brazo'     => $this->input->post('s_mbrazo'),
				'largo_manga'     => $this->input->post('s_lmanga'),
				'altura_busto'    => $this->input->post('s_abusto'),
				'precio_unitario' => $this->input->post('saco_pu'),
				'cantidad'        => $this->input->post('saco_cantidad'),
			);
			$this->db->insert('sacos', $datos_saco);
		}

		if (!empty($this->input->post('p_largo'))) {
			$datos_pantalon = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('pd_modelo'),
				'pinza_id'        => $this->input->post('pd_pinzas'),
				'bolsillo_id'     => $this->input->post('pd_batras'),
				'largo'           => $this->input->post('p_largo'),
				'entre_pierna'    => $this->input->post('p_entrepierna'),
				'cintura'         => $this->input->post('p_cintura'),
				'muslo'           => $this->input->post('p_muslo'),
				'rodilla'         => $this->input->post('p_rodilla'),
				'bota_pie'        => $this->input->post('p_bpie'),
				'tiro_delantero'  => $this->input->post('p_tdelantero'),
				'tiro_atras'      => $this->input->post('p_tatras'),
				'cadera'          => $this->input->post('p_cadera'),
				'bragueta'        => $this->input->post('pd_bragueta'),
				'bota_pie_des'    => $this->input->post('pd_bpie'),
				'pretina'         => $this->input->post('pd_pretina'),
				'precio_unitario' => $this->input->post('pantalon_pu'),
				'cantidad'        => $this->input->post('pantalon_cantidad'),
			);
			$this->db->insert('pantalones', $datos_pantalon);
		}

		if (!empty($this->input->post('ch_estomago'))) {
			$datos_chaleco = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('ch_modelo'),
				'detalle_id'      => $this->input->post('ch_detalle'),
				'largo'           => $this->input->post('ch_largo'),
				'pecho'           => $this->input->post('ch_pecho'),
				'estomago'        => $this->input->post('ch_estomago'),
				'botones'         => $this->input->post('ch_botones'),
				'color_ojales'    => $this->input->post('ch_color'),
				'altura_busto'    => $this->input->post('ch_abusto'),
				'precio_unitario' => $this->input->post('ch_pu'),
				'cantidad'        => $this->input->post('ch_cantidad'),
			);
			$this->db->insert('chalecos', $datos_chaleco);
		}

		if (!empty($this->input->post('cam_cuello'))) {
			$datos_camisa = array(
				'cliente_id'       => $id_cliente,
				'trabajo_id'       => $id_trabajo,
				'cuello'           => $this->input->post('cam_cuello'),
				'modelo_cuello'    => $this->input->post('cam_mcuello'),
				'cuello_combinado' => $this->input->post('cam_ccombinado'),
				'largo_manga'      => $this->input->post('cam_lmanga'),
				'ancho'            => $this->input->post('cam_ancho'),
				'color'            => $this->input->post('cam_color'),
				'cantidad'         => $this->input->post('cam_cantidad'),
			);
			$this->db->insert('camisas', $datos_camisa);
		}

		if (!empty($this->input->post('fa_largo'))) {
			$datos_falda = array(
				'cliente_id'  => $id_cliente,
				'trabajo_id'  => $id_trabajo,
				'modelo_id'   => $this->input->post('fa_modelo'),
				'abertura_id' => $this->input->post('fa_abertura'),
				'largo'       => $this->input->post('fa_largo'),
				'cintura'     => $this->input->post('fa_cintura'),
				'cadera'      => $this->input->post('fa_cadera'),
				'vasta'       => $this->input->post('fa_vasta'),
				'pretina'     => $this->input->post('fa_pretina'),
			);
			$this->db->insert('faldas', $datos_falda);
		}

		if (!empty($this->input->post('fa_largo'))) {
			$datos_jumper = array(
				'cliente_id'  => $id_cliente,
				'trabajo_id'  => $id_trabajo,
				'modelo_id'   => $this->input->post('j_modelo'),
				'abertura_id' => $this->input->post('j_abertura'),
				'bolsillo_id' => $this->input->post('j_bolsillo'),
				'talle'       => $this->input->post('j_talle'),
				'largo'       => $this->input->post('j_largo'),
				'cintura'     => $this->input->post('j_cintura'),
				'cadera'      => $this->input->post('j_cadera'),
				'pecho'       => $this->input->post('j_pecho'),
				'estomago'     => $this->input->post('j_estomago'),
				'altura_busto'     => $this->input->post('j_abusto'),
			);
			$this->db->insert('jumpers', $datos_jumper);
		}


		$sw = 0;
		if (!empty($this->input->post('corbaton_color')))
		{
			$corbaton_color = $this->input->post('corbaton_color');
			$sw = 1;
		}

		if (!empty($this->input->post('cg_color')))
		{
			$cg_color = $this->input->post('cg_color');
			$sw = 1;
		}

		if (!empty($this->input->post('faja_color')))
		{
			$faja_color = $this->input->post('faja_color');
			$sw = 1;
		}
		if($sw == 1){
			$datos_extras = array(
				'cliente_id'   => $id_cliente,
				'trabajo_id'   => $id_trabajo,
				'corbaton'     => $corbaton_color,
				'corbata_gato' => $cg_color,
				'faja'         => $faja_color,
			);
			$this->db->insert('extras', $datos_extras);
		}

		redirect("Trabajos/detalle_trabajo/$id_trabajo");

	}

	public function guarda_edicion() 
	{
		// vdebug($this->input->post(), true, false, true);
		$id_cliente = $this->input->post('id_cliente');
		$id_trabajo = $this->input->post('id_trabajo');
		$fecha_hora_edicion = date('Y-m-d H:i:s');
		$hora_registro = date('H:i:s');
		$fecha_hora_trabajo = $this->input->post('fecha').' '.$hora_registro;

		$fecha_hora_prueba = $this->input->post('fecha_prueba').' '.$this->input->post('hora_prueba');
		$fecha_hora_entrega = $this->input->post('fecha_entrega').' '.$this->input->post('hora_entrega');

		$this->db->update('trabajos', ['modified_at'=>$fecha_hora_edicion], ['id'=>$id_trabajo]);

		if (!empty($this->input->post('saco_id'))) {
			$datos_saco = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('sd_modelo'),
				'abertura_id'     => $this->input->post('sd_aberturas'),
				'detalle_id'      => $this->input->post('sd_detalle'),
				'color'           => $this->input->post('sd_color'),
				'color_ojal'      => $this->input->post('sd_color_ojal'),
				'ojal_puno'       => $this->input->post('sd_ojal'),
				'botones'         => $this->input->post('sd_botones'),
				'talla'           => $this->input->post('s_talla'),
				'largo'           => $this->input->post('s_largo'),
				'hombro'          => $this->input->post('s_hombro'),
				'espalda'         => $this->input->post('s_espalda'),
				'pecho'           => $this->input->post('s_pecho'),
				'estomago'        => $this->input->post('s_estomago'),
				'medio_brazo'     => $this->input->post('s_mbrazo'),
				'largo_manga'     => $this->input->post('s_lmanga'),
				'altura_busto'    => $this->input->post('s_abusto'),
				'precio_unitario' => $this->input->post('saco_pu'),
				'cantidad'        => $this->input->post('saco_cantidad'),
			);
			// $this->db->insert('sacos', $datos_saco);
			$this->db->where('id', $this->input->post('saco_id'));
			$this->db->update('sacos', $datos_saco);

		}

		if (!empty($this->input->post('pantalon_id'))) {
			$datos_pantalon = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('pd_modelo'),
				'pinza_id'        => $this->input->post('pd_pinzas'),
				'bolsillo_id'     => $this->input->post('pd_batras'),
				'largo'           => $this->input->post('p_largo'),
				'entre_pierna'    => $this->input->post('p_entrepierna'),
				'cintura'         => $this->input->post('p_cintura'),
				'muslo'           => $this->input->post('p_muslo'),
				'rodilla'         => $this->input->post('p_rodilla'),
				'bota_pie'        => $this->input->post('p_bpie'),
				'tiro_delantero'  => $this->input->post('p_tdelantero'),
				'tiro_atras'      => $this->input->post('p_tatras'),
				'cadera'          => $this->input->post('p_cadera'),
				'bragueta'        => $this->input->post('pd_bragueta'),
				'bota_pie_des'    => $this->input->post('pd_bpie'),
				'pretina'         => $this->input->post('pd_pretina'),
				'precio_unitario' => $this->input->post('pantalon_pu'),
				'cantidad'        => $this->input->post('pantalon_cantidad'),
			);
			$this->db->where('id', $this->input->post('pantalon_id'));
			$this->db->update('pantalones', $datos_pantalon);
		}

		if (!empty($this->input->post('chaleco_id'))) {
			$datos_chaleco = array(
				'cliente_id'      => $id_cliente,
				'trabajo_id'      => $id_trabajo,
				'modelo_id'       => $this->input->post('ch_modelo'),
				'detalle_id'      => $this->input->post('ch_detalle'),
				'largo'           => $this->input->post('ch_largo'),
				'pecho'           => $this->input->post('ch_pecho'),
				'estomago'        => $this->input->post('ch_estomago'),
				'botones'         => $this->input->post('ch_botones'),
				'color_ojales'    => $this->input->post('ch_color'),
				'altura_busto'    => $this->input->post('ch_abusto'),
				'precio_unitario' => $this->input->post('ch_pu'),
				'cantidad'        => $this->input->post('ch_cantidad'),
			);
			$this->db->where('id', $this->input->post('chaleco_id'));
			$this->db->update('chalecos', $datos_chaleco);
		}

		if (!empty($this->input->post('camisa_id'))) {
			$datos_camisa = array(
				'cliente_id'       => $id_cliente,
				'trabajo_id'       => $id_trabajo,
				'cuello'           => $this->input->post('cam_cuello'),
				'modelo_cuello'    => $this->input->post('cam_mcuello'),
				'cuello_combinado' => $this->input->post('cam_ccombinado'),
				'largo_manga'      => $this->input->post('cam_lmanga'),
				'ancho'            => $this->input->post('cam_ancho'),
				'color'            => $this->input->post('cam_color'),
				'cantidad'         => $this->input->post('cam_cantidad'),
			);
			$this->db->where('id', $this->input->post('camisa_id'));
			$this->db->update('camisas', $datos_camisa);
		}

		if (!empty($this->input->post('falda_id'))) {
			$datos_falda = array(
				'cliente_id'  => $id_cliente,
				'trabajo_id'  => $id_trabajo,
				'modelo_id'   => $this->input->post('fa_modelo'),
				'abertura_id' => $this->input->post('fa_abertura'),
				'largo'       => $this->input->post('fa_largo'),
				'cintura'     => $this->input->post('fa_cintura'),
				'cadera'      => $this->input->post('fa_cadera'),
				'vasta'       => $this->input->post('fa_vasta'),
				'pretina'     => $this->input->post('fa_pretina'),
			);
			$this->db->where('id', $this->input->post('falda_id'));
			$this->db->update('faldas', $datos_falda);
		}

		if (!empty($this->input->post('j_talle'))) {
			$datos_jumper = array(
				'cliente_id'  => $id_cliente,
				'trabajo_id'  => $id_trabajo,
				'modelo_id'   => $this->input->post('j_modelo'),
				'abertura_id' => $this->input->post('j_abertura'),
				'bolsillo_id' => $this->input->post('j_bolsillo'),
				'talle'       => $this->input->post('j_talle'),
				'largo'       => $this->input->post('j_largo'),
				'cintura'     => $this->input->post('j_cintura'),
				'cadera'      => $this->input->post('j_cadera'),
				'pecho'       => $this->input->post('j_pecho'),
				'estomago'     => $this->input->post('j_estomago'),
				'altura_busto'     => $this->input->post('j_abusto'),
			);
			$this->db->where('id', $this->input->post('jumper_id'));
			$this->db->update('jumpers', $datos_jumper);
		}

		if(!empty($this->input->post('extras_id')))
		{
			$datos_extras = array(
				'cliente_id'   => $id_cliente,
				'trabajo_id'   => $id_trabajo,
				'corbaton'     => $this->input->post('corbaton_color'),
				'corbata_gato' => $this->input->post('cg_color'),
				'faja'         => $this->input->post('faja_color'),
			);
			$this->db->where('id', $this->input->post('extras_id'));
			$this->db->update('extras', $datos_extras);
		}

		redirect("Trabajos/detalle_trabajo/$id_trabajo");

	}	

	public function eliminar($id_trabajo = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('trabajos', array('borrado'=>$hoy), "id=$id_trabajo");
		redirect("trabajos/listado_trabajos");
	}

}