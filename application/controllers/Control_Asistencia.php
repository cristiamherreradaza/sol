<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control_Asistencia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		// $this->load->helper('vayes_helper');
		$this->load->helper('tools_helper');
		$this->load->helper('form');
		$this->load->library('user_agent');

        // load url helper
        $this->load->helper('url');
		$this->load->model("Usuario_model");
		$this->load->model("Asistencia_model");
	}

	public function inicio()
	{
		$data['clientes'] = $this->db->get('clientes')->result_array();		
		// echo 'Holas desde listado';
		// vdebug($clientes, true, false, true);
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('rrhh/inicio');
		$this->load->view('template/footer');
	}

	public function verifica_fecha()
	{
		$fecha = $this->input->get("param1");
		$mes = date('m', strtotime($fecha));//MES ACTUAL
		$anio = date('Y', strtotime($fecha));//AÑO ACTUAL	
		$consulta = $this->db->get_where('sueldos', array('mes' => $mes, 'anio' => $anio, 'borrado ='=>NULL))->result();
		if (!empty($consulta)) {
			$respuesta = array('estado'=>'Si');
		echo json_encode($respuesta);
		} else {
			$respuesta = array('estado'=>'No');
		echo json_encode($respuesta);
		}
	}

	public function verifica_genera()
	{
		$mes = $this->input->get("param1");

		$anio = date('Y');//AÑO ACTUAL	

		$consulta = $this->db->get_where('excels', array('mes' => $mes, 'gestion' => $anio, 'borrado ='=>NULL))->result();
		if (!empty($consulta)) {
			$respuesta = array('estado'=>'Si');
		echo json_encode($respuesta);
		} else {
			$respuesta = array('estado'=>'No');
		echo json_encode($respuesta);
		}

		// $fecha = $this->input->get("param1");
		// $mes = date('m', strtotime($fecha));//MES ACTUAL
		// $anio = date('Y', strtotime($fecha));//AÑO ACTUAL	
		// $mes = $this->input->get("param1");
		// $anio = date('Y');//AÑO ACTUAL	
		// $consulta = $this->db->get_where('sueldos', array('mes' => $mes, 'anio' => $anio, 'borrado ='=>NULL))->result();
		// if (!empty($consulta)) {
		// 	$respuesta = array('estado'=>'Si');
		// echo json_encode($respuesta);
		// } else {
		// 	$respuesta = array('estado'=>'No');
		// echo json_encode($respuesta);
		// }
	}

	public function consulta($fecha)
	{
		// $fecha = $this->input->post('fecha');
		// $mes = date('m', strtotime($fecha));//MES ACTUAL
		// $year = date('Y', strtotime($fecha));//AÑO ACTUAL
		$mes = $fecha;
		$year = date('Y');
		
		$data['fecha'] = date('Y-m-d', strtotime($fecha));//MES ACTUAL;
		// $data['mes'] = $mes;
		// $data['anio'] = $year;
		$data['consulta'] = $this->db->query("SELECT suel.*, per.nombre, per.carnet as ci, per.sueldo as salario
											FROM sueldos suel, personal per
											WHERE suel.mes = '$mes' 
											AND suel.anio = '$year'
											AND suel.personal_id = per.id
											AND suel.borrado IS NULL
											ORDER BY suel.id")->result();

		$data['totales'] = $this->db->query("SELECT SUM(total) as total
											FROM sueldos
											WHERE mes = '$mes'
											AND anio = '$year'
											AND borrado IS NULL")->row();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('rrhh/lista_pagos', $data);
		$this->load->view('template/footer');

	}

	public function lista_pagos($mostrar_fecha = null)
	{	
		$data['personal'] = $this->db->get_where('personal', array('borrado' => null))->result();

		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('rrhh/lista_pagos', $data);
		$this->load->view('template/footer');
		// $mes = date('m', strtotime($mostrar_fecha));//MES ACTUAL
		// $year = date('Y', strtotime($mostrar_fecha));//AÑO ACTUAL

		// switch ($mostrar_fecha) {
		// 	case 'Enero':
		// 		# code...
		// 		$mes = 1;
		// 		break;
			
		// 	case 'Febrero':
		// 		# code...
		// 		$mes = 2;
		// 		break;

		// 	case 'Marzo':
		// 		# code...
		// 		$mes = 3;
		// 		break;
			
		// 	case 'Abril':
		// 		# code...
		// 		$mes = 4;
		// 		break;
			
		// 	case 'Mayo':
		// 		# code...
		// 		$mes = 5;
		// 	break;
			
		// 	case 'Junio':
		// 		# code...
		// 		$mes = 6;
		// 		break;

		// 	case 'Julio':
		// 		# code...
		// 		$mes = 7;
		// 		break;
			
		// 	case 'Agosto':
		// 		# code...
		// 		$mes = 8;
		// 		break;
			
		// 	case 'Septiembre':
		// 		# code...
		// 		$mes = 9;
		// 	break;
			
		// 	case 'Octubre':
		// 		# code...
		// 		$mes = 10;
		// 		break;

		// 	case 'Noviembre':
		// 		# code...
		// 		$mes = 11;
		// 		break;
			
		// 	case 'Diciembre':
		// 		# code...
		// 		$mes = 12;
		// 		break;
		// }

		// $year = date('Y');

		// // echo strtotime($mes);
		// // exit;

		// $Cantidad_Dias_Mes = cal_days_in_month(CAL_GREGORIAN, $mes, $year);

		// //AQUI OBTENEMOS LOS DIAS HABILES QUE TIENE EL MES SELECCIONADO
		// $nro_dias_habiles = $this->Asistencia_model->contar_dias($mes, $year, $Cantidad_Dias_Mes);
		// //AQUI OBTENEMOS LOS DIAS FERIADOS QUE TIENE EL MES SELECCIONADO
		// $nro_dias_feriados = $this->Asistencia_model->contar_dias_feriados($mes, $year);

		// $personal = $this->db->get_where('personal', array('estado' => 1))->result();
		// $horario_vigente = $this->db->get_where('horarios', array('estado' => 1))->row();

		// foreach ($personal as $per) {
		// 	$mes_sin_cero = ltrim($mes, '0');
		// 	$mes_año = $mes_sin_cero.'/'.$year;
		// 	// $nro_dias_feriados = $this->Asistencia_model->contar_dias_feriados($mes, $year);
		// 	$asistencia = $this->db->query("SELECT *
		// 									FROM asistencias
		// 									WHERE carnet = '$per->carnet' 
		// 									AND fecha like '%$mes_año'
		// 									AND borrado IS NULL")->result();
		// 	$tiempo_retraso_man = '00:00';
		// 	$tiempo_retraso_tar = '00:00';
		// 	$tiempo_retraso = '00:00';
		// 	$dias_trabajados = 0;
		// 	$abandono_manana = 0;
		// 	$abandono_tarde = 0;
		// 	$numero_atrasos = 0;
		// 	$falta_manana = 0;
		// 	$falta_tarde = 0;

		// 	foreach ($asistencia as $asis) {
		// 		$tiempo_retraso1 = '00:00';
		// 		$tiempo_retraso2 = '00:00';
		// 		$tiempo_retraso3 = '00:00';
		// 		$tiempo_retraso4 = '00:00';
		// 		$manana = 0;
		// 		$tarde = 0;
		// 		$tiempo_retraso_man = 0;
		// 		$tiempo_retraso_tar = 0;
		// 		// verifica si llego a tiempo, por otro caso se retraso y por otro caso no marco el ingreso de la mañana
		// 		if ($asis->man_hi >= $horario_vigente->man_desde && $asis->man_hi <= $horario_vigente->man_hasta) {
		// 			$manana += 0.25;
		// 		} elseif ($asis->man_hi > $horario_vigente->man_hasta && $asis->man_hi <= $horario_vigente->man_max) {
		// 			$manana += 0.25;
		// 			$tiempo_retraso1 = $this->Asistencia_model->horas_ret_man_hi($asis->man_hi);
		// 			$numero_atrasos += 1;
		// 		}
		// 		//verifica si salio a tiempo, por otro caso se salio antes y por otro caso no marco su salida de la mañana
		// 		if ($asis->man_hs >= $horario_vigente->man_salida && $asis->man_hs <= $horario_vigente->man_salida_hasta) {
		// 			$manana += 0.25;
		// 		} elseif (($asis->man_hs) >= ($horario_vigente->man_salida_min) && ($asis->man_hs) < ($horario_vigente->man_salida)) {
		// 			$manana += 0.25;
		// 			$tiempo_retraso2 = $this->Asistencia_model->horas_ret_man_hs($asis->man_hs);
		// 			$numero_atrasos += 1;
		// 		}

		// 		if ($manana == 0.50) {
		// 			$dias_trabajados += $manana;
		// 			$tiempo_retraso_man = $this->Asistencia_model->retraso($tiempo_retraso1, $tiempo_retraso2);
		// 		} elseif ($manana == 0.25) {
		// 			$abandono_manana += 1;
		// 		} else {
		// 			$falta_manana += 1;
		// 		}

		// 		//verifica si llego a tiempo, por otro caso se retraso y por otro caso no marco el ingreso de la tarde
		// 		if ($asis->tar_hi >= $horario_vigente->tarde_desde && $asis->tar_hi <= $horario_vigente->tarde_hasta) {
		// 			$tarde += 0.25;
		// 		} elseif ($asis->tar_hi > $horario_vigente->tarde_hasta && $asis->tar_hi <= $horario_vigente->tarde_max) {
		// 			$tarde += 0.25;
		// 			$tiempo_retraso3 = $this->Asistencia_model->horas_ret_tar_hi($asis->tar_hi);
		// 			$numero_atrasos += 1;
		// 		}
		// 		//verifica si salio a tiempo, por otro caso se salio antes y por otro caso no marco su salida de la tarde
		// 		if ($asis->tar_hs >= $horario_vigente->tarde_salida && $asis->tar_hs <= $horario_vigente->tarde_salida_hasta) {
		// 			$tarde += 0.25;
		// 		} elseif ($asis->tar_hs >= $horario_vigente->tarde_salida_min && $asis->tar_hs < $horario_vigente->tarde_salida) {
		// 			$tarde += 0.25;
		// 			$tiempo_retraso4 = $this->Asistencia_model->horas_ret_tar_hs($asis->tar_hs);
		// 			$numero_atrasos += 1;
		// 		}

		// 		if ($tarde == 0.50) {
		// 			$dias_trabajados += $tarde;
		// 			$tiempo_retraso_tar = $this->Asistencia_model->retraso($tiempo_retraso3, $tiempo_retraso4);
		// 		} elseif ($tarde == 0.25) {
		// 			$abandono_tarde += 1;
		// 		} else {
		// 			$falta_tarde += 1;
		// 		}
				
		// 		$tiempo_retraso = $this->Asistencia_model->retraso_suma($tiempo_retraso, $tiempo_retraso_man, $tiempo_retraso_tar);
		// 	}
		// 	// exit;
		// 	$registra_sueldo = $this->Asistencia_model->calcula_sueldo($per->id, $mes, $year, $abandono_manana, $abandono_tarde, $numero_atrasos, $tiempo_retraso, $dias_trabajados, $nro_dias_habiles, 
		// $nro_dias_feriados, $horario_vigente->descuento_hora, $falta_manana, $falta_tarde);
		// }
		// redirect("Control_Asistencia/consulta/".$mostrar_fecha);
	}

	public function pagar()
	{
		$id = $this->input->get("param1");
		$hoy = date("Y-m-d H:i:s");
		// $mes_year = date('Y-m', strtotime($hoy));//MES Y AÑO ACTUAL
		$this->db->update('sueldos', array('estado'=> 'Pagado', 'fecha_pago'=> $hoy, 'modified_at'=> $hoy), "id = $id");

		$consulta = $this->db->get_where('sueldos', array('id' => $id))->row();
		$fecha = $consulta->anio.'-'.$consulta->mes.'-01';

		$respuesta = array('estado'=>'Pagado', 'fecha' => $fecha);
		echo json_encode($respuesta);

	}

	public function index()
	{	
		// HORAS ESTABLECIDAS PARA MARCAR SIN RETRASO
		$hora_i_man_1 = '07:00';
		$hora_i_man_2 = '08:10';
		$hora_s_man_1 = '12:30';
		$hora_s_man_2 = '13:30';
		$hora_i_tarde_1 = '13:40';
		$hora_i_tarde_2 = '14:10';
		$hora_s_tarde_1 = '20:00';
		$hora_s_tarde_2 = '22:00';

		
		// $fecha = date("Y-m-d");//FECHA ACTUAL
		$fecha = ('2020-03-29');//FECHA ACTUAL
		$mes = date('m', strtotime($fecha));//MES ACTUAL
		$year = date('Y', strtotime($fecha));//AÑO ACTUAL

		$mes_sin_cero = ltrim($mes, '0');

		$personal = $this->db->get_where('personal', array('estado' => 1))->result();
		foreach ($personal as $valor) {
				$estado_m = '0';
				$estado_t = '0';
				$Cantidad_Dias_Mes = cal_days_in_month(CAL_GREGORIAN, $mes, $year);	
			for ($i=1; $i <= $Cantidad_Dias_Mes ; $i++) { 
					$ver_fecha = $i.'/'.$mes_sin_cero.'/'.$year;
					$per_asistencia = $this->db->get_where('asistencias', array('personal_id' => $valor->id, 'fecha' => $ver_fecha))->row();
					// PREGUNTA SI TIENE REGISTRO EN UNA DETERMINADA FECHA
					if (!empty($per_asistencia)) {
						// PREGUNTAR POR LA MARCACION DE INGRESO DE LA MAÑANA
						if (!empty($per_asistencia->man_hi)) {
							if(strtotime($per_asistencia->man_hi) >= strtotime($hora_i_man_1) && strtotime($per_asistencia->man_hi) <= strtotime($hora_i_man_2)){
								echo 'si';
							}else{

							}
						}else{
							$estado = '1';
						}

						// PREGUNTAR POR LA MARCACION DE SALIDA DE LA MAÑANA
						if (!empty($per_asistencia->man_hs)) {
							if(strtotime($per_asistencia->man_hs) >= strtotime($hora_s_man_1) && strtotime($per_asistencia->man_hs) <= strtotime($hora_s_man_2)){
								echo 'si';
							}
						}else{
							$estado = '1';
						}

						// PREGUNTAR POR LA MARCACION DE INGRESO DE LA TARDE
						if (!empty($per_asistencia->man_hi)) {
							if(strtotime($per_asistencia->man_hi) >= strtotime($hora_i_man_1) && strtotime($per_asistencia->man_hi) <= strtotime($hora_i_man_2)){
								echo 'si';
							}
						}else{
							$estado = '1';
						}

						// PREGUNTAR POR LA MARCACION DE SALIDA DE LA TARDE
						if (!empty($per_asistencia->man_hi)) {
							if(strtotime($per_asistencia->man_hi) >= strtotime($hora_i_man_1) && strtotime($per_asistencia->man_hi) <= strtotime($hora_i_man_2)){
								echo 'si';
							}
						}else{
							$estado = '1';
						}
						
					}
					// echo $para_asistencia->id;
				}
			}
	}

	public function control()
	{	
		$fecha = date("Y-m-d");
		// $fecha = ('2020-02-01');
		// $diasemana = date('w', strtotime($fecha));

		$mes = date('m', strtotime($fecha));
		$mes_sin_cero = ltrim($mes, '0');
		$anyo = date('Y', strtotime($fecha));

		$Cantidad_Dias_Mes = cal_days_in_month(CAL_GREGORIAN, $mes, $anyo);	

		for ($i=1; $i <= $Cantidad_Dias_Mes ; $i++) { 
			$superfecha = $i.'/'.$mes_sin_cero.'/'.$anyo;

			$dia_con_cero = str_pad($i, 2, "0", STR_PAD_LEFT);
			$fechasss = $anyo.'-'.$mes.'-'.$dia_con_cero;
			$diasemana = date('w', strtotime($fechasss));

			// echo $superfecha;
			// echo '--';
			// echo $diasemana;
			// echo '-----';
			echo $fechasss;
			echo '-----';
			if($diasemana == '0'){
			echo 'DOMINGO';
			echo '------';
			}
			if($diasemana == '1'){
				echo 'LUNES';
				echo '------';
			}
			if($diasemana == '2'){
				echo 'MARTES';
				echo '------';
			}
			if($diasemana == '3'){
				echo 'MIERCOLES';
				echo '------';
			}
			if($diasemana == '4'){
				echo 'JUEVES';
				echo '------';
			}
			if($diasemana == '5'){
				echo 'VIERNES';
				echo '------';
			}
			if($diasemana == '6'){
				echo 'SABADO';
				echo '------';
			}
			
		}

		// echo $fecha;
		// echo '       ';
		// echo $diasemana;
		// echo '       ';
		// echo $mes;
		// echo '       ';
		// echo $mes_cero;
		// echo '       ';
		// echo $anyo;
		// echo '       ';
		// echo $Cantidad_Dias_Mes;
		// echo '       ';

		// if($diasemana == '0'){
		// 	echo 'DOMINGO';
		// }
		// if($diasemana == '1'){
		// 	echo 'LUNES';
		// }
		// if($diasemana == '2'){
		// 	echo 'MARTES';
		// }
		// if($diasemana == '3'){
		// 	echo 'MIERCOLES';
		// }
		// if($diasemana == '4'){
		// 	echo 'JUEVES';
		// }
		// if($diasemana == '5'){
		// 	echo 'VIERNES';
		// }
		// if($diasemana == '6'){
		// 	echo 'SABADO';
		// }
		
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