<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratos extends CI_Controller {

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

	public function guarda() 
	{
		$usuario_id = $this->session->id_usuario;
		// vdebug($usuario_id, true, false, true);
		$id_grupo = $this->input->post('ida');
		if(empty($id_grupo)){

			$datos_grupo = array(
				'nombre'    => $this->input->post('nombre'),
				'celulares' => $this->input->post('celulares'),
				'direccion' => $this->input->post('direccion'),
			);
			$this->db->insert('grupos', $datos_grupo);
			$grupo_id = $this->db->insert_id();

			$datos_contrato = array(
				'grupo_id'         => $grupo_id,
				'usuario_id'       => $usuario_id,
				'fecha'            => $this->input->post('fecha'),
				'cantidad'         => $this->input->post('cantidad'),
				'descripcion'      => $this->input->post('descripcion'),
				'costo_saco'       => $this->input->post('costo_saco'),
				'costo_pantalon'   => $this->input->post('costo_pantalon'),
				'costo_chaleco'    => $this->input->post('costo_chaleco'),
				'costo_falda'      => $this->input->post('costo_falda'),
				'tela_propia'      => $this->input->post('tela_propia'),
				'marca'            => $this->input->post('marca'),
				'costo_tela'       => $this->input->post('costo_tela'),
				'costo_confeccion' => $this->input->post('costo_confeccion'),
				'total'            => $this->input->post('total'),
			);
			$this->db->insert('contratos', $datos_contrato);

		}else{
			$datos_contrato = array(
				'grupo_id'         => $this->input->post('ida'),
				'usuario_id'       => $usuario_id,
				'fecha'            => $this->input->post('fecha'),
				'cantidad'         => $this->input->post('cantidad'),
				'descripcion'      => $this->input->post('descripcion'),
				'costo_saco'       => $this->input->post('costo_saco'),
				'costo_pantalon'   => $this->input->post('costo_pantalon'),
				'costo_chaleco'    => $this->input->post('costo_chaleco'),
				'costo_falda'      => $this->input->post('costo_falda'),
				'tela_propia'      => $this->input->post('tela_propia'),
				'marca'            => $this->input->post('marca'),
				'costo_tela'       => $this->input->post('costo_tela'),
				'costo_confeccion' => $this->input->post('costo_confeccion'),
				'total'            => $this->input->post('total'),
			);
			$this->db->insert('contratos', $datos_contrato);
		}
		redirect("contratos/listado");
	}

	public function listado()
	{
		$this->db->select('g.nombre, g.celulares, g.direccion, c.*');
		$this->db->from('contratos as c');
		$this->db->order_by('c.id', 'desc');
		$this->db->join('grupos as g', 'g.id = c.grupo_id', 'left');
		$this->db->where('c.borrado =', NULL);
		$this->db->where('c.terminado', 'No');
		$this->db->limit(100);
		$data['contratos'] = $this->db->get()->result_array();

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('contratos/listado', $data);
		$this->load->view('template/footer');
	}

	public function ajax_busca_grupo($nombre_grupo = null)
	{
		$grupo_limpio = str_replace("%20"," ",$nombre_grupo);
		$consulta_grupo = $this->db->like('nombre', $grupo_limpio);		
		$this->db->limit(10);
		$data['grupos'] = $this->db->get('grupos')->result_array();
		// vdebug($res, true, false, true);
		$this->load->view('contratos/ajax_muestra_grupos', $data);
		// return $nombre_cliente;
	}

	public function ajax_extrae_modelos($id_contrato =null)
	{
		$data['contrato'] = $this->db->get_where('contratos', array(
			'id'=>$id_contrato
		))->row_array();

		$data['sacos'] = $this->db->select('*')
			->order_by('id','desc')
			->where('contrato_id', $id_contrato)
			->limit(1)
			->get('sacos')->row_array();

		$data['pantalones'] = $this->db->select('*')
			->order_by('id','desc')
			->where('contrato_id', $id_contrato)
			->limit(1)
			->get('pantalones')->row_array();

		$data['chalecos'] = $this->db->select('*')
			->order_by('id','desc')
			->where('contrato_id', $id_contrato)
			->limit(1)
			->get('chalecos')->row_array();

		$data['faldas'] = $this->db->select('*')
			->order_by('id','desc')
			->where('contrato_id', $id_contrato)
			->limit(1)
			->get('faldas')->row_array();

		echo json_encode($data, JSON_PRETTY_PRINT);
	}

	public function ajax_valida_cliente($cliente_id = null, $contrato_id = null)
	{
		// echo ('cliente: '.$cliente_id.' contrato :'.$contrato_id);
		$sw = 0;
		$consulta_trabajos = $this->db->get_where('trabajos', ['cliente_id'=>$cliente_id, 'contrato_id'=>$contrato_id])->row_array();
		if(!empty($consulta_trabajos)) $sw = 1;
		echo $sw;

	}

	public function detalle($contrato_id = null)
	{

		$this->db->select('g.nombre, g.celulares, c.*');
		$this->db->from('contratos as c');
		$this->db->join('grupos as g', 'g.id = c.grupo_id', 'left');
		$this->db->where('c.borrado', NULL);
		$this->db->where('c.id', $contrato_id);
		$data['contrato'] = $this->db->get()->row_array();
		// vdebug($data['contrato'], false, false, true);

		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->order_by('t.id', 'desc');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.borrado', NULL);
		$this->db->where('t.contrato_id', $contrato_id);
		$data['trabajos'] = $this->db->get()->result_array();
		// vdebug($data['trabajos'], true, false, true);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('contratos/detalle', $data);
		$this->load->view('template/footer');


	}

}