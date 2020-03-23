<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Telas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		$this->load->helper('vayes_helper');
		$this->load->helper('form');
        $this->load->helper('url');
	}

	public function listado()
	{

		$data['telas'] = $this->db->get_where('telas', array('estado'=>1))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('telas/listado', $data);
		$this->load->view('template/footer');	
	}

	public function guarda()
	{
		// vdebug($this->input->post('ida'), true, false, true);
		$datos = array(
			'nombre' => $this->input->post('nombre'),
			'precio' => $this->input->post('precio'),
			'estado' => 1
		);
			$this->db->insert('telas', $datos);
		redirect("Telas/listado");
	}

	public function editar(){
		$hoy = date("Y-m-d H:i:s");
		$id = $this->input->post("idedit");
		$data = array(
			'nombre' => $this->input->post("nombreedit"),
			'precio'   => $this->input->post("precioedit"),
			'updated_at' => $hoy,
			'estado'   => 1
		);
        $this->db->where('id', $id);
        $this->db->update('telas', $data);
		redirect("Telas/listado");
	}

	public function eliminar($id = null){
		$hoy = date("Y-m-d H:i:s");
		$data = array(
			'borrado' => $hoy,
			'estado'   => 0
		);
        $this->db->where('id', $id);
        $this->db->update('telas', $data);
		redirect("Telas/listado");
				
	}
	
}
