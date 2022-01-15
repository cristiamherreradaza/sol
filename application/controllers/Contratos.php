<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contratos extends CI_Controller {

	public function __construct() {
		parent::__construct();
		// $this->load->helper('url_helper');
		// $this->load->database();
		// $this->load->library('encrypt');
		// $this->load->helper('vayes_helper');
		$this->load->helper('tools_helper');
	}

	public function index() {
		$this->load->view('welcome_message');
	}

	public function guarda() 
	{
		/*echo '<pre>';
		var_dump($this->input->post());
		echo '</pre>';
		die();*/
		$usuario_id = $this->session->id_usuario;
		$grupo_id = $this->input->post('grupo_id');

		if($grupo_id == 0){

			$datos_grupo = array(
				'nombre'    => $this->input->post('nombre'),
				'celulares' => $this->input->post('celulares'),
				'direccion' => $this->input->post('direccion'),
			);
			$this->db->insert('grupos', $datos_grupo);
			$grupoId = $this->db->insert_id();
		}else{
			$grupoId = $this->input->post('grupo_id');
		}

		// preguntamos si hay varones en el contrato
		if($this->input->post('cantidad_varones') != 0){

			$datos_contrato = array(
				'grupo_id'         => $grupoId,
				'usuario_id'       => $usuario_id,
				'genero'           => 'Varon',
				'fecha'            => $this->input->post('fecha'),
				'cantidad'         => $this->input->post('cantidad'),
				'cantidad_varones' => $this->input->post('cantidad_varones'),
				'descripcion'      => $this->input->post('descripcion'),
				'costo_saco'       => $this->input->post('costo_saco_varon'),
				'costo_pantalon'   => $this->input->post('costo_pantalon_varon'),
				'costo_chaleco'    => $this->input->post('costo_chaleco_varon'),
				// 'costo_falda'      => $this->input->post('costo_falda'),
				'tela_propia'      => $this->input->post('tela_propia_varon'),
				'marca'            => $this->input->post('marca_tela_varon'),
				'costo_tela'       => $this->input->post('costo_tela_varon'),
				'costo_confeccion' => $this->input->post('costo_confeccion_varon'),
				'total'            => $this->input->post('subtotal_varones'),
			);

			$this->db->insert('contratos', $datos_contrato);
		}

		// preguntamos si hay mujeres en el contrato
		if($this->input->post('cantidad_mujeres') != 0){

			$datos_contrato = array(
				'grupo_id'         => $grupoId,
				'usuario_id'       => $usuario_id,
				'genero'           => 'Mujer',
				'fecha'            => $this->input->post('fecha'),
				'cantidad'         => $this->input->post('cantidad'),
				'cantidad_mujeres' => $this->input->post('cantidad_mujeres'),
				'descripcion'      => $this->input->post('descripcion'),
				'costo_saco'       => $this->input->post('costo_saco_mujer'),
				'costo_pantalon'   => $this->input->post('costo_pantalon_mujer'),
				'costo_chaleco'    => $this->input->post('costo_chaleco_mujer'),
				'costo_falda'      => $this->input->post('costo_falda_mujer'),
				'tela_propia'      => $this->input->post('tela_propia_mujer'),
				'marca'            => $this->input->post('marca_tela_mujer'),
				'costo_tela'       => $this->input->post('costo_tela_mujer'),
				'costo_confeccion' => $this->input->post('costo_confeccion_mujer'),
				'total'            => $this->input->post('subtotal_mujeres'),
			);

			$this->db->insert('contratos', $datos_contrato);
		}


		redirect("contratos/listado");
	}

	public function listado()
	{
		$this->db->query("SET sql_mode=(SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''));");
		$this->db->select('g.nombre, g.celulares, g.direccion, c.*');
		$this->db->from('contratos as c');
		$this->db->order_by('c.id', 'desc');
		$this->db->join('grupos as g', 'g.id = c.grupo_id', 'right');
		$this->db->where('c.borrado =', NULL);
		$this->db->where('c.terminado', 'No');
		$this->db->group_by('c.grupo_id');
		$this->db->limit(100);
		// $this->db->select('*');
		// $this->db->from('grupos');
		// $this->db->where('borrado', NULL);
		// $this->db->limit(100);
		$data['contratos'] = $this->db->get()->result_array();
		// vdebug($data['contratos'], true, false, true);

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

	public function detalle($grupo_id = null)
	{
		// $this->db->select('g.nombre, g.celulares, c.*');
		// $this->db->from('contratos as c');
		// $this->db->join('grupos as g', 'g.id = c.grupo_id', 'left');
		// $this->db->where('c.borrado', NULL);
		// $this->db->where('c.id', $contrato_id);
		// $data['contrato'] = $this->db->get()->row_array();		
		$data['contratos'] = $this->db->get_where('contratos', array('grupo_id'=>$grupo_id, 'borrado'=>NULL))->result_array();
		
		$contrato_id = $data['contratos'][0]['id'];
		$grupo_id = $data['contratos'][0]['grupo_id'];
		$data['grupo'] = $this->db->get_where('grupos', array('id'=>$grupo_id, 'borrado'=>NULL))->row_array();;
		// vdebug($data['grupo'], true, false, true);

		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->order_by('t.id', 'desc');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.borrado', NULL);
		$this->db->where('t.grupo_id', $grupo_id);
		$data['trabajos'] = $this->db->get()->result_array();
		// vdebug($data['trabajos'], true, false, true);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('contratos/detalle', $data);
		$this->load->view('template/footer');

	}

	public function edita_grupo()
	{
		// vdebug($this->input->post(), true, false, true);
		$grupo_id = $this->input->post('grupo_id');
		$datos_grupo = array(
			'nombre'=>$this->input->post('nombre'),
			'celulares'=>$this->input->post('celulares'),
			'direccion'=>$this->input->post('direccion')
		);
		$this->db->where('id', $grupo_id);
		$this->db->update('grupos', $datos_grupo);
		redirect("contratos/detalle/$grupo_id");
	}

	public function edita_contrato()
	{
		$grupo_id = $this->input->post('contrato_grupo_id');
		$contrato_id = $this->input->post('contrato_id');
		$contrato = $this->db->get_where('contratos', array('id'=>$contrato_id))->row_array();
		// echo '<pre>';
		// print_r($contrato);
		// echo '</pre>';
		// die;
		// if($contrato['genero'])
		$datos_contrato = array(
			'fecha'            => $this->input->post('fecha'),
			// 'cantidad'         => $this->input->post('cantidad'),
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
		$this->db->where('id', $contrato_id);
		$this->db->update('contratos', $datos_contrato);
		redirect("contratos/detalle/$grupo_id");
	}

	public function elimina_persona_contrato($id = null, $grupo_id = null)
	{
		$datos_trabajo = array(
			'contrato_id'=>NULL,
			'grupo_id'=>NULL,
		);
		$this->db->where('id', $id);
		$this->db->update('trabajos', $datos_trabajo);
		redirect("contratos/detalle/$grupo_id");
	}

	public function elimina($contrato_id = null, $grupo_id = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('contratos', array('borrado'=>$hoy), "id=$contrato_id");
		$this->db->update('trabajos', array('contrato_id'=>NULL, 'grupo_id'=>NULL), "contrato_id=$contrato_id");
		redirect("contratos/detalle/$grupo_id");
	}

	public function nuevo()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('contratos/nuevo');
		$this->load->view('template/footer');
	}

}