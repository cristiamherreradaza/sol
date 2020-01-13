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

		$modelos_varon_chalecos   = $this->db->order_by('nombre', 'ASC')->get_where('modelos', array('tipo' => 'chaleco', 'genero'   => 'varon'))->result_array();
		$detalles_varon_chalecos  = $this->db->order_by('nombre', 'ASC')->get_where('detalles', array('tipo'  => 'chaleco', 'genero'  => 'varon'))->result_array();

		$data['modelos_varon_saco']       = $modelos_varon_saco;
		$data['modelos_varon_pantalon']   = $modelos_varon_pantalon;
		$data['modelos_varon_chalecos']   = $modelos_varon_chalecos;
		$data['aberturas_varon_saco']     = $aberturas_varon_saco;
		$data['detalles_varon_saco']      = $detalles_varon_saco;
		$data['detalles_varon_chalecos']  = $detalles_varon_chalecos;
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


		$datos_cliente = array(
			'nombre'    => $this->input->post('nombre'),
			'ci'        => $this->input->post('ci'),
			'celulares' => $this->input->post('celulares'),
			'genero'    => $this->input->post('genero'),
		);
		$this->db->insert('clientes', $datos_cliente);
		$id_cliente = $this->db->insert_id();

		$hora_registro = date('H:i:s');
		$fecha_hora_trabajo = $this->input->post('fecha').' '.$hora_registro;

		$fecha_hora_prueba = $this->input->post('fecha_prueba').' '.$this->input->post('hora_prueba');
		$fecha_mas_dias = strtotime($this->input->post('fecha_prueba'));
		$fecha_mas_dias = strtotime("+7 day", $fecha_mas_dias);
		$fecha_mas_transformado = date('Y-m-d', $fecha_mas_dias);
		$fh_entrega = $fecha_mas_transformado.' 16:00:00';

		$datos_trabajo = array(
			'cliente_id'       => $id_cliente,
			'fecha'            => $fecha_hora_trabajo,
			'fecha_prueba'     => $this->input->post('fecha_prueba'),
			'fecha_entrega'    => $fh_entrega,
			'costo_tela'       => $this->input->post('costo_tela'),
			'costo_confeccion' => $this->input->post('costo_confeccion'),
			'total'            => $this->input->post('monto_total'),
			'saldo'            => $this->input->post('saldo'),
			'estado'           => 'Oficina',
			'tela_propia'      => $this->input->post('tela_propia'),
			'marca_tela'            => $this->input->post('marca')
		);
		$this->db->insert('trabajos', $datos_trabajo);
		$id_trabajo = $this->db->insert_id();

		$datos_pago = array(
			'cliente_id'       => $id_cliente,
			'trabajo_id'=>$id_trabajo,
			'fecha'=>$fecha_hora_trabajo,
			'monto'=>$this->input->post('a_cuenta')
		);
		$this->db->insert('pagos', $datos_pago);

		$datos_saco = array(
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
		$this->db->insert('sacos', $datos_saco);

		$datos_pantalon = array(
			'cliente_id'     => $id_cliente,
			'trabajo_id'     => $id_trabajo,
			'modelo_id'      => $this->input->post('pd_modelo'),
			'pinza_id'       => $this->input->post('pd_pinzas'),
			'bolsillo_id'    => $this->input->post('pd_batras'),
			'largo'          => $this->input->post('p_largo'),
			'entre_pierna'   => $this->input->post('p_entrepierna'),
			'cintura'        => $this->input->post('p_cintura'),
			'muslo'          => $this->input->post('p_muslo'),
			'rodilla'        => $this->input->post('p_rodilla'),
			'bota_pie'       => $this->input->post('p_bpie'),
			'tiro_delantero' => $this->input->post('p_tdelantero'),
			'tiro_atras'     => $this->input->post('p_tatras'),
			'bragueta'       => $this->input->post('pd_bragueta'),
			'bota_pie_des'   => $this->input->post('pd_bpie'),
		);
		$this->db->insert('pantalones', $datos_pantalon);

		$datos_chaleco = array(
			'cliente_id'   => $id_cliente,
			'trabajo_id'   => $id_trabajo,
			'modelo_id'    => $this->input->post('ch_modelo'),
			'detalle_id'   => $this->input->post('ch_detalle'),
			'largo'        => $this->input->post('ch_largo'),
			'pecho'        => $this->input->post('ch_pecho'),
			'estomago'     => $this->input->post('ch_estomago'),
			'botones'      => $this->input->post('ch_botones'),
			'color_ojales' => $this->input->post('ch_color'),
		);
		$this->db->insert('chalecos', $datos_chaleco);

		// vdebug($datos_chaleco, true, false, true);

		// guardamos saco
		// fin guardamos saco

		// vdebug($id_cliente, true, false, true);
	}

	public function detalle_trabajo($id_trabajo = null)
	{
		$data = '';
		$trabajo = $this->db->get_where('trabajos', array('id'=>$id_trabajo))->row_array();
		// vdebug($trabajo, false, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('trabajos/detalle_trabajo');
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

}
