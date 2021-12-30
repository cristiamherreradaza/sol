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

		$file = $_FILES['archivo']['tmp_name'];

		$fileTmpPath = $_FILES['archivo']['tmp_name'];
		$fileName = $_FILES['archivo']['name'];
		$fileSize = $_FILES['archivo']['size'];
		$fileType = $_FILES['archivo']['type'];

		$fileNameCmps = explode(".", $fileName);

		$fileExtension = strtolower(end($fileNameCmps));

		$newFileName = $this->input->post('mes').date('Y-m-d').'.'.$fileExtension;

		$uploadFileDir = './archivos/';
		
		$dest_path = $uploadFileDir . $newFileName;

		if ( $xlsx = SimpleXLSX::parse($file) ) {

			move_uploaded_file($fileTmpPath, $dest_path);

			$verifica = $this->db->get_where('excels', array('mes' => $this->input->post('mes'),'gestion' => date('Y')))->row();

			if(empty($verifica)){

				$datos = array(
					'usuario_id'        => $usuario_id,
					'nombre_archivo'    => $newFileName,
					'nombre_sistema'    => $fileExtension,
					'mes'  			    => $this->input->post('mes'),
					'gestion'	        => date('Y'),
					'fecha'				=> date('Y-m-d H:i:s'),
				);
	
				$this->db->insert('excels', $datos);	
				
			}

			$id_reg_antiguo = $this->db->get_where('excels', array('mes' => $this->input->post('mes'),'gestion' => date('Y')))->row();

			$con_asis = $this->db->get_where('asistencias', array('excel_id' => $id_reg_antiguo->id))->row();

			if($con_asis){
				$this->db->set('borrado', date('Y-m-d H:i:s'));
				$this->db->where('excel_id', $id_reg_antiguo->id);
				$this->db->update('asistencias');
			}
			
			foreach ($xlsx->rows() as $key => $r) {
				if($key != 0){

					$verdad_fecha = explode('/',$r[2]);

					$datos = array(
						'excel_id' 				=> $id_reg_antiguo->id,
						'mes'					=> $this->input->post('mes'),
						'anio'					=> date('Y'),
						'carnet'        		=> $r[0],
						'nombre'	    		=> $r[1],
						'fecha'    				=> $verdad_fecha[2].'-'.$verdad_fecha[1].'-'.$verdad_fecha[0],
						'horario'  			    => $r[3],
						'horaEntrada'	        => $r[4],
						'horaSalida'	        => $r[5],
						'marcadoEntrada'	    => $r[6],
						'marcadoSalida'	        => $r[7],
						'normal'	        	=> $r[8],
						'tiempoReal'	        => $r[9],
						'tardanza'	        	=> $r[10],
						'salidaTemprano'	    => $r[11],
						'falta'	        		=> $r[12],
						'horaExtra'	        	=> $r[13],
						'tiempoTrabajado'	    => $r[14],
						'excepcion'	        	=> $r[15],
						'debeCin'	        	=> $r[16],
						'debeCsal'	        	=> $r[17],
						'departamento'	        => $r[18],
						'nDias'	        		=> $r[19],
						'finSemana'	        	=> $r[20],
						'feriado'	        	=> $r[21],
						'tiempoAsistencia'	    => $r[22],
						'nDias_ot'	        	=> $r[23],
						'finSemana_ot'	        => $r[24],
						'feriado_ot'	        => $r[25]
					);

					$this->db->insert('asistencias', $datos);

				}
			}
		} else {
			echo SimpleXLSX::parseError();
		}
		
		redirect("excels/sube_excel");

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
