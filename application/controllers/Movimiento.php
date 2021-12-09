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

        $datos = array(
			'categoria_id'  => $this->input->post('categoria_id'),
			'cantidad'      => $this->input->post('cantidad-sacado'),
            'fecha'         => date("Y-m-d"),
			'detalle'       => $this->input->post('detalle-quitar'),
			'estado'        => 1
		);
		$this->db->insert('ventas', $datos);

        $user_id = $this->session->id_usuario;
        $datos1 = array(
            'usuarios_id'    => $user_id,
            'categoria_id'  => $this->input->post('categoria_id'),
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

        $datos = array(
			'categoria_id'  => $this->input->post('categoria_id-agregar'),
			'stock'      	=> $this->input->post('cantidad-agregar'),
            'fecha'         => date("Y-m-d"),
			'detalle'       => $this->input->post('detalle-agregar'),
			'estado'        => 1
		);
		$this->db->insert('compras', $datos);


        $user_id = $this->session->id_usuario;
        $datos1 = array(
            'usuarios_id'    => $user_id,
            'categoria_id'  => $this->input->post('categoria_id-agregar'),
            'almacen_id'    => $this->session->almacen_id,
			'ingreso'        => $this->input->post('cantidad-agregar'),
            'fecha'         => date("Y-m-d"),
			'estado'        => 'Regularizacion',
			'descripcion'   => $this->input->post('detalle-agregar'),
		);
		$this->db->insert('movimientos', $datos1);

        redirect ("Inventarios_Compra/lista");
    }

}