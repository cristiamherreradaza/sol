<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

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

    // function __construct()
    // {
    //    parent::__construct();
    // }

	public function __construct() 
	{
		parent::__construct();
		// // $this->load->helper('url_helper');
		// // $this->load->database();
		// // $this->load->helper('vayes_helper');
		$this->load->helper('tools_helper');
	}

    public function home(){
        // cantidad totasl de clientes
        $this->db->from('clientes')->where(array('borrado'=>NULL));
        
        $data['cant_total_clientes'] = $this->db->count_all_results(); 

        // cantidad todal de trabajos del mes actual
        $anio = date('Y');
        $mes = date('m');
        $day = cal_days_in_month(CAL_GREGORIAN, $mes, $anio); // 31
        $fecha_ini = $anio."-".$mes."-01";
        $fecha_fin = $anio."-".$mes."-".$day;

        $cat_tot_trab_mes = "SELECT *
                            FROM trabajos 
                            WHERE (fecha BETWEEN '".$fecha_ini."' AND '".$fecha_fin."') AND borrado IS NULL;";

        $data['cant_total_trabajos_esteMes'] = count($this->db->query($cat_tot_trab_mes)->result());


        // cantidad todal de trabajos del mes actual
        $anio = date('Y');
        $mes = date('m');
        $day = cal_days_in_month(CAL_GREGORIAN, $mes, $anio); // 31
        $fecha_ini = $anio."-".$mes."-01";
        $fecha_fin = $anio."-".$mes."-".$day;

        $cat_tot_trab_mes_mo_entregados = "SELECT *
                                            FROM trabajos 
                                            WHERE entregado = 'No' AND (fecha BETWEEN '".$fecha_ini."' AND '".$fecha_fin."') AND borrado IS NULL;";

        $data['cat_tot_trab_mes_mo_entregados'] = count($this->db->query($cat_tot_trab_mes_mo_entregados)->result());


        // cantidad de trabajos por mes
        for ($i = 1 ; $i <= 12 ; $i++ ){
            $anio = date('Y');
            $day = cal_days_in_month(CAL_GREGORIAN, $i, $anio); // 31
            $fecha_ini = $anio."-".(($i < 10)? "0".$i:$i )."-01";
            $fecha_fin = $anio."-".(($i < 10)? "0".$i:$i )."-".$day;
            
            $cant_mes = "SELECT *
                            FROM trabajos 
                            WHERE (fecha BETWEEN '".$fecha_ini."' AND '".$fecha_fin."') AND borrado IS NULL;";
            
            $data[$this->mes($i)] = count($this->db->query($cant_mes)->result());

        }


        // cantidad de no pagados y pagados
        $tra_deuda = "SELECT *
                        FROM trabajos 
                        WHERE saldo <> 0 AND borrado IS NULL";

        $tra_pagado = "SELECT *
                        FROM trabajos 
                        WHERE saldo = 0 AND borrado IS NULL";

        $data['tra_deuda'] = count($this->db->query($tra_deuda)->result());
        $data['tra_pagado'] = count($this->db->query($tra_pagado)->result());

        $cantidad_mujeres  = "SELECT * 
                                FROM trabajos t INNER JOIN clientes c
                                    ON t.cliente_id =  c.id
                                    WHERE genero = 'Mujer' AND t.borrado IS NULL";

        $data['cantidad_mujeres'] = count($this->db->query($cantidad_mujeres)->result());
        
        $cantidad_varones  = "SELECT * 
                                FROM trabajos t INNER JOIN clientes c
                                    ON t.cliente_id =  c.id
                                    WHERE genero = 'Varon' AND t.borrado IS NULL";

        $data['cantidad_varones'] = count($this->db->query($cantidad_varones)->result());
                                    


        $this->load->view('template/header');
		$this->load->view('template/menu');

		$this->load->view('home/inicio',$data);

		$this->load->view('template/footer');
    }

    protected function mes($mes){

        $mesLiteral = '';

        switch ($mes){
            case 1: 
                $mesLiteral = "Enero";
                break;
            case 2: 
                $mesLiteral = "Febrero";
                break;
            case 3: 
                $mesLiteral = "Marzo";
                break;
            case 4: 
                $mesLiteral = "Abril";
                break;
            case 5: 
                $mesLiteral = "Mayo";
                break;
            case 6: 
                $mesLiteral = "Junio";
                break;
            case 7: 
                $mesLiteral = "Julio";
                break;
            case 8: 
                $mesLiteral = "Agosto";
                break;
            case 9: 
                $mesLiteral = "Septiembre";
                break;
            case 10: 
                $mesLiteral = "Octubre";
                break;
            case 11: 
                $mesLiteral = "Noviembre";
                break;
            case 12: 
                $mesLiteral = "Diciembre";
                break;
            default:
                $mesLiteral = "";
                break;
        }

        return $mesLiteral;
    }


}