<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		$this->load->helper('vayes_helper');
		$this->load->helper('form');

        // load url helper
        $this->load->helper('url');
		$this->load->model("Usuario_model");
	}

	public function lista()
	{

		$data['personal'] = $this->db->get_where('personal', array('borrado='=>NULL))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('personal/lista', $data);
		$this->load->view('template/footer');	
	}

	public function registra()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('personal/crea_personal');
		$this->load->view('template/footer');	
	}

	public function guarda()
	{
		// vdebug($this->input->post('ida'), true, false, true);
		$datos = array(
			'nombre' => $this->input->post('nombre'),
			'carnet' => $this->input->post('carnet'),
			'direccion' => $this->input->post('direccion'),
			'celulares' => $this->input->post('celulares'),
			'fecha_ingreso' => $this->input->post('fecha_ingreso'),
			'sueldo' => $this->input->post('sueldo'),
			'estado' => 1
		);
			$this->db->insert('personal', $datos);
		redirect("Personal/lista");
	}

	public function editar(){
		$hoy = date("Y-m-d H:i:s");
		$id = $this->input->post("id");
		$data = array(
			'nombre' => $this->input->post("nombre"),
			'carnet'   => $this->input->post("carnet"),
			'direccion' => $this->input->post("direccion"),
			'celulares'   => $this->input->post("celulares"),
			'fecha_ingreso' => $this->input->post("fecha_ingreso"),
			'sueldo'   => $this->input->post("sueldo"),
			'modified_at' => $hoy,
			'estado'   => 1
		);
        $this->db->where('id', $id);
        $this->db->update('personal', $data);

		$respuesta = array('estado'=>'editado');
		redirect("Personal/lista");
				
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		/*$ultimo = $this->db->query("SELECT MAX(logacceso_id) FROM logacceso")->row();
		$logacceso_id = $ultimo->max;
		$acceso_fin = date("Y-m-d H:i:s");
		$actualizar = $this->Logacceso_model->fecha_salida($logacceso_id, $acceso_fin);*/
		redirect(base_url());
	}

	public function algo()
	{
		$this->Logacceso_model->inactividad();
	}

	public function listado()
	{
		$data['usuarios'] = $this->db->get_where('usuarios', array('borrado ='=>NULL))->result_array();		
		// echo 'Holas desde listado';
		// vdebug($clientes, true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('usuarios/listado', $data);
		$this->load->view('template/footer');
	}

	public function baja($id = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('personal', array('fecha_retiro'=> $hoy, 'estado'=>0), "id=$id");
		redirect("Personal/lista");
	}

	public function alta($id = null)
	{
		$hoy = '';
		$this->db->update('personal', array('fecha_retiro'=> $hoy,'estado'=> 1), "id=$id");
		redirect("Personal/lista");
	}
	
}
