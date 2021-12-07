<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Almacen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		// $this->load->helper('vayes_helper');
		$this->load->helper('form');
        $this->load->helper('url');
	}

	public function listado()
	{

		$data['almacenes'] = $this->db->get_where('almacenes', array('borrado'=>null))->result_array();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('almacenes/listado', $data);
		$this->load->view('template/footer');	
	}

    public function guarda(){
        // echo "holas desde la funcion de guardar del controlador";
		$id = $this->input->post('ida');
		// vdebug($this->input->post('ida'), true, false, true);
		$datos = array(
			'usuario_id'   	=> $this->session->id,
			'nombre' 		=> $this->input->post('nombre'),
			'direccion'   	=> $this->input->post('direccion'),
			'telefonos' 	=> $this->input->post('telefonos'),
		);
		if (empty($id)) {
			$this->db->insert('almacenes', $datos);
		} else {
			$this->db->where('id', $id);
			$this->db->update('almacenes', $datos);
		}

		redirect("Almacen/listado");
    }

	public function eliminar($id_almacen = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('almacenes', array('borrado'=>$hoy), "id=$id_almacen");
		redirect("Almacen/listado");
	}
}
