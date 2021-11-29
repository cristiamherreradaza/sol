<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH.'/application/libraries/SimpleXLSX.php';

class Excels extends CI_Controller {

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

	public function sube_excel()
	{
		$data['excels_subidos'] = $this->db->order_by('id', 'DESC')->get_where('excels', array('borrado' => NULL))->result();
		// vdebug($excels_subidos, true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('excels/sube_excel', $data);
		$this->load->view('template/footer');
	}

	public function guarda_excel()
	{
		$usuario_id = $this->session->id_usuario;

		$config['upload_path']   = './archivos/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']      = 5000;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('archivo')) {

			$error = array('error' => $this->upload->display_errors());

			// $this->load->view('upload_form', $error);
		} else {
			$gestion = date('Y');
			$hoy = date("Y-m-d H:i:s");
			$data = array('upload_data' => $this->upload->data());
			$datos_archivo = $this->upload->data();
			$nombre_archivo = $this->upload->data('file_name');

			$datos_excel = array(
				'usuario_id'     => $usuario_id,
				'nombre_archivo' => $nombre_archivo,
				'mes'            => $this->input->post('mes'),
				'gestion'        => $gestion,
				'fecha'          => $hoy
			);
			$this->db->insert('excels', $datos_excel);

			if ($xlsx = SimpleXLSX::parse("./archivos/$nombre_archivo")) {
				foreach ($xlsx->rows() as $key => $r) {
					if ($key > 0) {
						if ($key == 1) {
							if ($r[3] == 'mañana') {
								$datos_marcaciones = array(
									'excel_id' => 1,
									'carnet'   => $r[0],
									'fecha'    => $r[2],
									'man_hi'   => $r[6],
									'man_hs'   => $r[7],
								);
							} else {
								$datos_marcaciones = array(
									'excel_id' => 1,
									'carnet'   => $r[0],
									'fecha'    => $r[2],
									'tar_hi'   => $r[6],
									'tar_hs'   => $r[7],
								);
							}
							$this->db->insert('asistencias', $datos_marcaciones);
						} else {
							$consulta_persona  = $this->db->order_by('id', 'DESC')->get_where('asistencias', array('carnet' => $r[0], 'borrado =' => NULL, 'fecha' => $r[2]))->row_array();
							if ($consulta_persona) {
								// vdebug($consulta_persona, true, false, true);
								if ($r[3] == 'mañana') {
									// echo $r[3];
									$datos_marcaciones = array(
										'excel_id' => 1,
										'carnet'   => $r[0],
										'fecha'    => $r[2],
										'man_hi'   => $r[6],
										'man_hs'   => $r[7],
									);
								} else {
									$datos_marcaciones = array(
										'excel_id' => 1,
										'carnet'   => $r[0],
										'fecha'    => $r[2],
										'tar_hi'   => $r[6],
										'tar_hs'   => $r[7],
									);
								}
								$this->db->where('id', $consulta_persona['id']);
								$this->db->update('asistencias', $datos_marcaciones);
							} else {
								if ($r[3] == 'mañana') {
									$datos_marcaciones = array(
										'excel_id' => 1,
										'carnet'   => $r[0],
										'fecha'    => $r[2],
										'man_hi'   => $r[6],
										'man_hs'   => $r[7],
									);
								} else {
									$datos_marcaciones = array(
										'excel_id' => 1,
										'carnet'   => $r[0],
										'fecha'    => $r[2],
										'tar_hi'   => $r[6],
										'tar_hs'   => $r[7],
									);
								}
								$this->db->insert('asistencias', $datos_marcaciones);
							}
						}
					}
				}
			} else {
				echo SimpleXLSX::parseError();
			}
			redirect("Excels/sube_excel");


			// redirect("excels/sube_excel");

			// $id_cliente = $this->db->insert_id();

			// vdebug($datos_archivo['file_name'], true, false, false);
			// vdebug($this->upload->data(), true, false, false);
			// echo 'si subio';

			// $this->load->view('upload_success', $data);
		}
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function prueba()
	{
		// echo '<h1>Parse books.xslx</h1><pre>';
		if ($xlsx = SimpleXLSX::parse("./archivos/abril_2020.xlsx")) {
			// print_r($xlsx->rows());
			foreach ($xlsx->rows() as $key => $r) {
				if($key > 0){
					if ($key == 1 ) {
						if ($r[3] == 'mañana') {
							$datos_marcaciones = array(
								'excel_id' => 1,
								'carnet'   => $r[0],
								'fecha'    => $r[2],
								'man_hi'   => $r[6],
								'man_hs'   => $r[7],
							);
						} else {
							$datos_marcaciones = array(
								'excel_id' => 1,
								'carnet'   => $r[0],
								'fecha'    => $r[2],
								'tar_hi'   => $r[6],
								'tar_hs'   => $r[7],
							);
						}
						$this->db->insert('asistencias', $datos_marcaciones);
					}else{
						$consulta_persona  = $this->db->order_by('id', 'DESC')->get_where('asistencias', array('carnet' => $r[0], 'borrado =' => NULL, 'fecha'=>$r[2]))->row_array();
						if ($consulta_persona) {
							// vdebug($consulta_persona, true, false, true);
							if ($r[3] == 'mañana') {
								// echo $r[3];
								$datos_marcaciones = array(
									'excel_id' => 1,
									'carnet'   => $r[0],
									'fecha'    => $r[2],
									'man_hi'   => $r[6],
									'man_hs'   => $r[7],
								);
							} else {
								$datos_marcaciones = array(
									'excel_id' => 1,
									'carnet'   => $r[0],
									'fecha'    => $r[2],
									'tar_hi'   => $r[6],
									'tar_hs'   => $r[7],
								);
							}
							$this->db->where('id', $consulta_persona['id']);
							$this->db->update('asistencias', $datos_marcaciones);
						}else{
							if ($r[3] == 'mañana') {
								$datos_marcaciones = array(
									'excel_id' => 1,
									'carnet'   => $r[0],
									'fecha'    => $r[2],
									'man_hi'   => $r[6],
									'man_hs'   => $r[7],
								);
							} else {
								$datos_marcaciones = array(
									'excel_id' => 1,
									'carnet'   => $r[0],
									'fecha'    => $r[2],
									'tar_hi'   => $r[6],
									'tar_hs'   => $r[7],
								);
							}
							$this->db->insert('asistencias', $datos_marcaciones);
						}
					}

				}
			}
		} else {
			echo SimpleXLSX::parseError();
		}
		// output worsheet 1
		// $xlsx = SimpleXLSX::parse("./archivos/abril_20206.xlsx");

		// $dim = $xlsx->dimension();
		// $num_cols = $dim[0];
		// $num_rows = $dim[1];

		/*echo '<table border=1>';
		foreach ($xlsx->rows() as $r) {
			echo '<tr>';
			for ($i = 0; $i < $num_cols; $i++) {
				echo '<td>' . (!empty($r[$i]) ? $r[$i] : '&nbsp;') . '</td>';
			}
			echo '</tr>';
		}
		echo '</table>';*/

		/*foreach ($xlsx->rows() as $r) {
			for ($i = 0; $i < $num_cols; $i++) {
				// echo '<td>' . (!empty($r[$i]) ? $r[$i] : '&nbsp;') . '</td>';
				echo 'nombre: '.$r[$i]. '<br />';
			}
		}*/

	}

	public function detalle($excel_id = null)
	{
		// $data['datos_excel'] = $this->db->get_where('asistencias', array('excel_id' => $excel_id))->row_array();

		$this->db->select('p.nombre, a.*');
		$this->db->from('asistencias as a');
		$this->db->join('personal as p', 'p.carnet = a.carnet', 'left');
		$this->db->where('a.excel_id', $excel_id);
		$data['datos_excel'] = $this->db->get()->result_array();
		// vdebug($data['datos_excel'], true, false, true);

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('excels/detalle', $data);
		$this->load->view('template/footer');
	}

	public function elimina($excel_id = null)
	{
		$this->db->where('id', $excel_id);
		$this->db->delete('excels');

		$this->db->where('excel_id', $excel_id);
		$this->db->delete('asistencias');
		redirect("Excels/sube_excel");

	}

}
