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
				'grupo_id'=>$grupo_id,
				'usuario_id'=>$usuario_id,
				'fecha'=>$this->input->post('fecha'),
				'cantidad'=>$this->input->post('cantidad'),
				'descripcion'=>$this->input->post('descripcion'),
			);
			$this->db->insert('contratos', $datos_contrato);

		}else{
			$datos_contrato = array(
				'grupo_id'   => $this->input->post('ida'),
				'usuario_id' => $usuario_id,
				'fecha'      => $this->input->post('fecha'),
				'cantidad'   => $this->input->post('cantidad'),
				'descripcion'   => $this->input->post('descripcion'),
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

}