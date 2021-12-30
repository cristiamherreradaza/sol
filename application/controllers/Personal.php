<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		// $this->load->helper('vayes_helper');
		$this->load->helper('form');

        // load url helper
        $this->load->helper('url');
		$this->load->model("Usuario_model");
	}

	public function lista()
	{

		$data['personal'] = $this->db->get_where('personal', array('borrado='=>NULL))->result();

		$data['horarios'] = $this->db->get_where('horarios', array('borrado='=>NULL))->result();

		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('personal/lista', $data);
		$this->load->view('template/footer');	
	}

	public function registra()
	{
		$data['horarios'] = $this->db->get_where('horarios', array('borrado='=>NULL))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('personal/crea_personal', $data);
		$this->load->view('template/footer');	
	}

	public function guarda()
	{
		// vdebug($this->input->post('ida'), true, false, true);
		$datos = array(
			'horario_id' => $this->input->post('horario'),
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
			'horario_id' 	=> $this->input->post('horario'),
			'nombre' 		=> $this->input->post("nombre"),
			'carnet'   		=> $this->input->post("carnet"),
			'direccion' 	=> $this->input->post("direccion"),
			'celulares'   	=> $this->input->post("celulares"),
			'fecha_ingreso' => $this->input->post("fecha_ingreso"),
			'sueldo'   		=> $this->input->post("sueldo"),
			'modified_at' 	=> $hoy,
			'estado'   		=> 1
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

	public function horarios()
	{
		// echo 'hola';
		$data['horarios'] = $this->db->get_where('horarios', array('estado' =>1))->row();
		// $data['horarioss'] = $this->db->get_where('horarios', array('estado' =>1))->result();		
		$data['horarioss'] = $this->db->get_where('horarios', array('borrado' => null))->result();		
		// // echo 'Holas desde listado';
		// // vdebug($clientes, true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('horarios/horarios', $data);
		$this->load->view('template/footer');
	}

	public function descuentos(){
		$data['descuentos'] = $this->db->get_where('descuentos',  array('borrado' => null))->result();

		$this->load->view('template/header');
		$this->load->view('template/menu');
		
		$this->load->view('rrhh/descuentos', $data);
		$this->load->view('template/footer');
	}

	public function guarda_descuento(){

		$datos = array(
			'descripcion' => $this->input->post('descripcion'),
			'minutos' => $this->input->post('minutos'),
			'descuento' => $this->input->post('descuento')
		);

		if($this->input->post('descuento_id') == 0 ){

			$this->db->insert('descuentos', $datos);

		}else{
			$id = $this->input->post('descuento_id');

			$this->db->where('id', $id);
			$this->db->update('descuentos', $datos);

			$datos =  array(
				'modified_at' => date('Y-m-d H:i:s')
			);
			
			$this->db->where('id', $id);
			$this->db->update('descuentos', $datos);
		}

		redirect("Personal/descuentos");
	}

	public function eliminar_descuento($id = null){

		$datos = array(
			'borrado' => date('Y-m-d H:i:s')
		);

		
		$this->db->where('id', $id);
		$this->db->update('descuentos', $datos);

		redirect("Personal/descuentos");

	}

	public function guarda_horario(){

		$datos = array(
			'descripcion'	=> $this->input->post('descripcion'),
			'man_ingreso' 	=> $this->input->post('entrada_maniana'),
			'man_salida'	=> $this->input->post('salida_maniana'),
			'tarde_ingreso' => $this->input->post('entrada_tarde'),
			'tarde_salida' 	=> $this->input->post('salida_tarde'),
			'estado'		=> 1
		);

		if($this->input->post('horario_id') == 0){

			$this->db->insert('horarios', $datos);

		}else{

			$id = $this->input->post('horario_id');

			$this->db->where('id', $id);
			$this->db->update('horarios', $datos);

			$datos =  array(
				'modified_at' => date('Y-m-d H:i:s')
			);
			
			$this->db->where('id', $id);
			$this->db->update('horarios', $datos);
			
		}

		redirect("Personal/horarios");

	}

	public function eliminar_horario($id = null){
		
		$datos = array(
			'borrado' => date('Y-m-d H:i:s')
		);

		
		$this->db->where('id', $id);
		$this->db->update('horarios', $datos);

		redirect("Personal/horarios");
	}
	
}
