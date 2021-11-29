<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asistencia_model extends CI_Model {
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
        // $this->load->helper('vayes_helper');
        // $this->load->model("usuario_model");
    }

    public function contar_dias($mes, $year, $Cantidad_Dias_Mes)
    {
        $domingo = 0;
        $dia_habil = 0;

        for ($i=1; $i <= $Cantidad_Dias_Mes ; $i++) {
            
            $dia_con_cero = str_pad($i, 2, "0", STR_PAD_LEFT); 
            $hoy = $year.'-'.$mes.'-'.$dia_con_cero;
            $diasemana = date('w', strtotime($hoy));
            if($diasemana == '0'){
                $domingo += 1;
            } else {
                $dia_habil += 1;
            }

        }
        return $dia_habil;
    }

    public function contar_dias_feriados($mes, $year)
    {
       $datos = $this->db->query("SELECT *
                                    FROM feriados
                                    WHERE MONTH(fecha) = '$mes'
                                    AND YEAR(fecha) = '$year'
                                    AND borrado IS NULL")->result();
       $nro = 0;
       foreach ($datos as $valor) {
            if ($valor->tipo == 'dia') {
                $nro += 1;
            } else {
                $nro += 0.5;
            }
       }
       return $nro;
    }

    public function horas_ret_man_hi($hora_marcada)
    {
        $horario_hora = '08';
        $horario_min = '00';

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $marca_hor - $horario_hora;
        $resta_min = $marca_min - $horario_min;
        $hora_cero = str_pad($resta_hora, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($resta_min, 2, "0", STR_PAD_LEFT);
        $tiempo = $hora_cero.':'.$minuto_cero;
        return $tiempo;

    }

    public function horas_ret_man_hs($hora_marcada)
    {
        $horario_hora = '12';
        $horario_min = '30';
        if ($horario_min == '00') {
            $horario_hora -= 1;
            $horario_min = '60';
        }

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $horario_hora - $marca_hor;
        $resta_min = $horario_min - $marca_min;
        $hora_cero = str_pad($resta_hora, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($resta_min, 2, "0", STR_PAD_LEFT);
        $tiempo = $hora_cero.':'.$minuto_cero;
        return $tiempo;

    }

    public function horas_ret_tar_hi($hora_marcada)
    {
        $horario_hora = '14';
        $horario_min = '00';

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $marca_hor - $horario_hora;
        $resta_min = $marca_min - $horario_min;
        $hora_cero = str_pad($resta_hora, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($resta_min, 2, "0", STR_PAD_LEFT);
        $tiempo = $hora_cero.':'.$minuto_cero;
        return $tiempo;

    }

    public function horas_ret_tar_hs($hora_marcada)
    {
        $horario_hora = '20';
        $horario_min = '00';
        if ($horario_min == '00') {
            $horario_hora -= 1;
            $horario_min = '60';
        }

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $horario_hora - $marca_hor;
        $resta_min = $horario_min - $marca_min;
        $hora_cero = str_pad($resta_hora, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($resta_min, 2, "0", STR_PAD_LEFT);
        $tiempo = $hora_cero.':'.$minuto_cero;
        return $tiempo;

    }

    public function retraso($tiempo_retraso1, $tiempo_retraso2){

        $tie_ret_hor1 = substr($tiempo_retraso1, 0, 2);
        $tie_ret_min1 = substr($tiempo_retraso1, 3, 2);

        $tie_ret_hor2 = substr($tiempo_retraso2, 0, 2);
        $tie_ret_min2 = substr($tiempo_retraso2, 3, 2);

        $horas = (int)$tie_ret_hor1 + (int)$tie_ret_hor2;
        $minutos = (int)$tie_ret_min1 + (int)$tie_ret_min2;
        $horas += (int)($minutos / 60);
        $minutos = $minutos % 60;
        $hora_cero = str_pad($horas, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
        $tiempo_retraso = $hora_cero.':'.$minuto_cero;
        return $tiempo_retraso;

    }

    public function retraso_suma($tiempo_retraso, $tiempo_retraso_man, $tiempo_retraso_tar){

        $tie_ret_hor = substr($tiempo_retraso, 0, 2);
        $tie_ret_min = substr($tiempo_retraso, 3, 2);

        $tie_ret_man_hor = substr($tiempo_retraso_man, 0, 2);
        $tie_ret_man_min = substr($tiempo_retraso_man, 3, 2);

        $tie_ret_tar_hor = substr($tiempo_retraso_tar, 0, 2);
        $tie_ret_tar_min = substr($tiempo_retraso_tar, 3, 2);

        $horas = (int)$tie_ret_hor + (int)$tie_ret_man_hor + (int)$tie_ret_tar_hor;
        $minutos = (int)$tie_ret_min + (int)$tie_ret_man_min + (int)$tie_ret_tar_min;
        $horas += (int)($minutos / 60);
        $minutos = $minutos % 60;
        $hora_cero = str_pad($horas, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
        $tiempo_retraso = $hora_cero.':'.$minuto_cero;
        return $tiempo_retraso;

    }


    public function suma_horas_man_hi($tiempo_retraso, $hora_marcada)
    {
        $horario_hora = '08';
        $horario_min = '00';

        $tie_ret_hor = substr($tiempo_retraso, 0, 2);
        $tie_ret_min = substr($tiempo_retraso, 3, 2);

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $marca_hor - $horario_hora;
        $resta_min = $marca_min - $horario_min;


        $horas = (int)$tie_ret_hor + (int)$resta_hora;
        $minutos = (int)$tie_ret_min + (int)$resta_min;
        $horas += (int)($minutos / 60);
        $minutos = $minutos % 60;
        $hora_cero = str_pad($horas, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
        $tiempo_retraso = $hora_cero.':'.$minuto_cero;
        return $tiempo_retraso;

    }

    public function suma_horas_man_hs($tiempo_retraso, $hora_marcada)
    {
        $horario_hora = '12';
        $horario_min = '30';
        if ($horario_min == '00') {
            $horario_hora -= 1;
            $horario_min = '60';
        }

        $tie_ret_hor = substr($tiempo_retraso, 0, 2);
        $tie_ret_min = substr($tiempo_retraso, 3, 2);

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $horario_hora - $marca_hor;
        $resta_min = $horario_min - $marca_min;


        $horas = (int)$tie_ret_hor + (int)$resta_hora;
        $minutos = (int)$tie_ret_min + (int)$resta_min;
        $horas += (int)($minutos / 60);
        $minutos = $minutos % 60;
        $hora_cero = str_pad($horas, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
        $tiempo_retraso = $hora_cero.':'.$minuto_cero;
        return $tiempo_retraso;
    }

    public function suma_horas_tar_hi($tiempo_retraso, $hora_marcada)
    {
        $horario_hora = '14';
        $horario_min = '00';

        $tie_ret_hor = substr($tiempo_retraso, 0, 2);
        $tie_ret_min = substr($tiempo_retraso, 3, 2);

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $marca_hor - $horario_hora;
        $resta_min = $marca_min - $horario_min;


        $horas = (int)$tie_ret_hor + (int)$resta_hora;
        $minutos = (int)$tie_ret_min + (int)$resta_min;
        $horas += (int)($minutos / 60);
        $minutos = $minutos % 60;
        $hora_cero = str_pad($horas, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
        $tiempo_retraso = $hora_cero.':'.$minuto_cero;
        return $tiempo_retraso;
    }

    public function suma_horas_tar_hs($tiempo_retraso, $hora_marcada)
    {
        $horario_hora = '20';
        $horario_min = '00';
        if ($horario_min == '00') {
            $horario_hora -= 1;
            $horario_min = '60';
        }

        $tie_ret_hor = substr($tiempo_retraso, 0, 2);
        $tie_ret_min = substr($tiempo_retraso, 3, 2);

        $marca_hor = substr($hora_marcada, 0, 2);
        $marca_min = substr($hora_marcada, 3, 2);

        $resta_hora = $horario_hora - $marca_hor;
        $resta_min = $horario_min - $marca_min;
        $horas = (int)$tie_ret_hor + (int)$resta_hora;
        $minutos = (int)$tie_ret_min + (int)$resta_min;
        $horas += (int)($minutos / 60);
        $minutos = $minutos % 60;
        $hora_cero = str_pad($horas, 2, "0", STR_PAD_LEFT);
        $minuto_cero = str_pad($minutos, 2, "0", STR_PAD_LEFT);
        $tiempo_retraso = $hora_cero.':'.$minuto_cero;
        return $tiempo_retraso;
    }

    public function calcula_sueldo($personal_id, $mes, $year, $abandono_manana, $abandono_tarde, $numero_atrasos, $tiempo_retraso, $dias_trabajados, $nro_dias_habiles, 
$nro_dias_feriados, $descuento_hora, $falta_manana, $falta_tarde)
    {
        $dias_habiles = $nro_dias_habiles - $nro_dias_feriados;
        $persona = $this->db->get_where('personal', array('id' => $personal_id,'estado' => 1))->row();
        $sueldo = $persona->sueldo;
        //se calcula el valor del sueldo sin descuento
        $sueldo_dia = $sueldo / $dias_habiles;
        $sueldo_t = $dias_trabajados * $sueldo_dia;
        $sueldo_total = round($sueldo_t, 0);

        $hor = substr($tiempo_retraso, 0, 2);
        $min = substr($tiempo_retraso, 3, 2);
        $minu = '0.'.$min;


        //se calcula el descuento
        $des_min = $descuento_hora * $minu;
        $des_hor = $descuento_hora * $hor;
        $descuentos = $des_min + $des_hor;

        //se hace el descuento si lo tuviera
        $total = $sueldo_total - $descuentos;

        $datos = array(
                    'personal_id' => $personal_id,
                    'sueldo' => $sueldo_total,
                    'descuentos' => $descuentos,
                    'extras' => 0,
                    'total' => $total,
                    'mes' => $mes,
                    'anio' => $year,
                    'abandono_manana' => $abandono_manana,
                    'abandono_tarde' => $abandono_tarde,
                    'falta_manana' => $falta_manana,
                    'falta_tarde' => $falta_tarde,
                    'numero_atrasos' => $numero_atrasos,
                    'horas_retraso' => $tiempo_retraso,
                    'dias_habiles' => $dias_habiles,
                    'dias_trabajados' => $dias_trabajados,
                    'estado' => 'No'
                );
                $this->db->insert('sueldos', $datos);

        return $total;
    }

}