<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movimiento extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url_helper');
		// $this->load->database();
		// $this->load->helper('vayes_helper');
	}

    public function sacaProducto(){

        $user_id = $this->session->id_usuario;
        $datos1 = array(
            'usuarios_id'    => $user_id,
            'producto_id'  => $this->input->post('producto_id'),
            'almacen_id'    => $this->session->almacen_id,
			'salida'        => $this->input->post('cantidad-sacado'),
            'fecha'         => date("Y-m-d"),
			'estado'        => 'Regularizacion',
			'descripcion'   => $this->input->post('detalle-quitar'),
		);
		$this->db->insert('movimientos', $datos1);

        redirect ("Inventarios_Compra/lista");
    }

	public function agregarProducto(){

        $user_id = $this->session->id_usuario;
        $datos1 = array(
            'usuarios_id'    => $user_id,
            'producto_id'  => $this->input->post('producto_id-agregar'),
            'almacen_id'    => $this->session->almacen_id,
			'ingreso'        => $this->input->post('cantidad-agregar'),
            'fecha'         => date("Y-m-d"),
			'estado'        => 'Regularizacion',
			'descripcion'   => $this->input->post('detalle-agregar'),
		);

		$this->db->insert('movimientos', $datos1);

        redirect ("Inventarios_Compra/lista");
    }

	public function agregarProductoLegal(){
		$user_id = $this->session->id_usuario;
        $datos1 = array(
            'usuarios_id'    => $user_id,
            'producto_id'    => $this->input->post('producto_id'),
            'almacen_id'     => $this->session->almacen_id,
			'precio_compra'  =>	$this->input->post('precio_unidad'),
			'precio_venta'   => $this->input->post('precio_venta'),
			'precio_total'   => $this->input->post('precio_total'),
			'ingreso'		 => $this->input->post('stock'),
            'fecha'          => $this->input->post('fecha'),
			'descripcion'    => $this->input->post('detalle'),
			'created_at'	 => date("Y-m-d H:i:s"),
		);

		$this->db->insert('movimientos', $datos1);

        redirect ("Inventarios_Compra/lista");
	}

}