<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Asistencia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		$this->load->helper('vayes_helper');
		$this->load->helper('form');
		$this->load->library('user_agent');

        // load url helper
        $this->load->helper('url');
		$this->load->model("Usuario_model");
	}


	public function index()
	{	


		$fecha = date("Y-m-d");
		// $fecha = ('2020-02-01');
		$diasemana = date('w', strtotime($fecha));

		$mes = date('m', strtotime($fecha));
		$anyo = date('Y', strtotime($fecha));

		$Cantidad_Dias_Mes = cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);	

		echo $fecha;
		echo '       ';
		echo $diasemana;
		echo '       ';
		echo $mes;
		echo '       ';
		echo $anyo;
		echo '       ';
		echo $Cantidad_Dias_Mes;
		echo '       ';

		if($diasemana == '0'){
			echo 'DOMINGO';
		}
		if($diasemana == '1'){
			echo 'LUNES';
		}
		if($diasemana == '2'){
			echo 'MARTES';
		}
		if($diasemana == '3'){
			echo 'MIERCOLES';
		}
		if($diasemana == '4'){
			echo 'JUEVES';
		}
		if($diasemana == '5'){
			echo 'VIERNES';
		}
		if($diasemana == '6'){
			echo 'SABADO';
		}
		
	}

	public function do(){
		$starDate = new DateTime('2020-03-01');
		$endDate = new DateTime('2020-03-31');
		$interval = $starDate->diff($endDate);
		$numberOfDays = $interval->format('%d days');
		$nro = 0;
		for($i = 1; $i <= $numberOfDays; $i++){
		     if($starDate->format('l')== 'Sunday'){
		            echo $starDate->format('y-m-d (D)')."<br/>";
		            $nro = $nro + 1;
		     }

		     $starDate->modify("+1 days");
		 }
		 echo $nro;
	}


	public function login()
	{
		$this->load->view('usuarios/login');	
	}

	public function valida()
	{
		// vdebug($this->input->post(), true, false, true);
		$usuario = $this->input->post('usuario');
		$password = $this->input->post('pass');
		$pass_encriptado = sha1($password);
		if($this->Usuario_model->valida($usuario, $pass_encriptado))
		{
			redirect("trabajos/nuevo");
		}else{
			// echo 'no';
			$this->form_validation->set_message('verificar_usuario', 'Los datos son incorrectos.');
			redirect(base_url());
		}
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
		// vdebug($this->agent->referrer(), true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('usuarios/listado', $data);
		$this->load->view('template/footer');
	}

	public function guarda()
	{
		$id = $this->input->post('ida');
		$pass = $this->input->post('pass');
		if (!empty($pass)) {
			$pass_encriptado = sha1($pass);
			$datos = array(
				'nombre' => $this->input->post('nombre'),
				'celulares' => $this->input->post('celulares'),
				'direccion' => $this->input->post('direccion'),
				'email' => $this->input->post('email'),
				'rol'   => $this->input->post('rol'),
				'usuario' => $this->input->post('usuario'),
				'pass' => $pass_encriptado
			);
		} else {
			$datos = array(
				'nombre' => $this->input->post('nombre'),
				'celulares' => $this->input->post('celulares'),
				'direccion' => $this->input->post('direccion'),
				'email' => $this->input->post('email'),
				'rol'   => $this->input->post('rol'),
				'usuario' => $this->input->post('usuario')
			);
		}
				
		// vdebug($this->input->post('ida'), true, false, true);
		if (empty($id)) {
			$this->db->insert('usuarios', $datos);
		} else {
			$this->db->where('id', $id);
			$this->db->update('usuarios', $datos);
		}
		redirect($this->agent->referrer());
	}

	public function eliminar($id_abertura = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('usuarios', array('borrado'=>$hoy), "id=$id_abertura");
		redirect("usuarios/listado");

	}
	
}