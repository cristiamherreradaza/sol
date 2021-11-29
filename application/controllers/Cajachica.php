<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cajachica extends CI_Controller {

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
		$this->load->helper('tools_helper');
	}

	public function inicio()
	{
		// echo 'Desde caja chica';
		$hoy_inicio = date('Y-m-d').' '.'00:00:00';
		$hoy_final = date('Y-m-d').' '.'23:59:59';;
		$data['caja']=$this->db->get_where('cajachica', array('fecha >='=>$hoy_inicio, 'fecha <='=>$hoy_final, 'borrado ='=>NULL))->result_array();
		// vdebug($data['caja'], true, true, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('cajachica/inicio', $data);
		$this->load->view('template/footer');
	}

	public function guarda()
	{
		// $id = $this->input->post('ida');
		// vdebug($this->input->post(), true, false, true);
		// vdebug($this->session->id_usuario, true, false, true);
		$hora = date('H:i:s');
		$fecha_hora = $this->input->post('fecha').' '.$hora; 
		$tipo = $this->input->post('tipo');
		if ($tipo == 'Gasto') {
			$datos = array(
				'salida'     => $this->input->post('monto'),
				'fecha'      => $fecha_hora,
				'descripcion'=> $this->input->post('descripcion'),
				'usuario_id' => $this->session->id_usuario,
			);
		} else {
			$datos = array(
				'ingreso'       => $this->input->post('monto'),
				'fecha'         => $fecha_hora,
				'descripcion'   => $this->input->post('descripcion'),
				'usuario_id'    => $this->session->id_usuario,
			);
		}
		
		if (empty($id)) {
			$this->db->insert('cajachica', $datos);
		} else {
			$this->db->where('id', $id);
			$this->db->update('detalles', $datos);
		}
		redirect("cajachica/inicio");
	}

	public function eliminar($id_caja = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('cajachica', array('borrado'=>$hoy), "id=$id_caja");
		redirect("cajachica/inicio");
	}

}