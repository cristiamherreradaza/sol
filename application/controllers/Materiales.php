<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materiales extends CI_Controller {

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
	}


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('materiales/dashboard');
		$this->load->view('template/footer');
    }

    public function categorias()
    {
    	$this->db->from("categorias");
    	$this->db->where("estado", 1);
		$this->db->order_by("id", "asc");
		$query = $this->db->get(); 
		$data['categorias'] = $query->result();

        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('materiales/categorias', $data);
		$this->load->view('template/footer');
	}

	public function ajax_verifica(){

		$nombre = $this->input->get("param1");
		$nom = $this->db->get_where('categorias', array('nombre' => $nombre, 'estado' => 1))->row();

		if ($nom) {
			$respuesta = array('estado'=>'registrado');
			echo json_encode($respuesta);
		}
		else {
			$respuesta = array('estado'=>'no');
			echo json_encode($respuesta);
		}
	}

	public function guarda(){

		$datos = array(
			'nombre' => $this->input->post('nombre'),
			'tipo'   => $this->input->post('tipo'),
			'estado'   => 1
		);
		$this->db->insert('categorias', $datos);
		redirect("Materiales/categorias");
				
	}


	public function editar1(){

		$id = $this->input->get("param1");

		$data = array(
			'nombre' => $this->input->get("param2"),
			'tipo'   => $this->input->get("param3"),
			'estado'   => 1
		);
        $this->db->where('id', $id);
        $this->db->update('categorias', $data);

		$respuesta = array('estado'=>'editado');
		echo json_encode($respuesta);
				
	}
	
	
	public function eliminar($id = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('categorias', array('borrado'=>$hoy, 'estado' => 0), "id=$id");
		redirect("Materiales/categorias");
	}

}