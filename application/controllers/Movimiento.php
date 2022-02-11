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

	public function nuevo(){
		$data['almacenes'] = $this->db->get_where('almacenes', array('borrado' => null))->result();
		// echo 'holas';
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('movimientos/nuevo', $data);
		$this->load->view('template/footer');
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
            // 'almacen_id'    => $this->session->almacen_id,
            'almacen_id'    => $this->input->post('almacen_id-agregar'),
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
            // 'almacen_id'     => $this->session->almacen_id,
            'almacen_id'     => $this->input->post('almacen_id'),
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

	public function ajaxBuscaProducto($fecha = null, $almacen_origen = null, $almacen_destino = null, $busca_producto = null){

		$producto = $this->input->get('busca_producto');
		$almacen = $this->input->get('almacen_origen');
		// $data['productos'] =  $this->db->get_where('productos', array('borrado' => null))->like('nombre',$producto)->result();

		$this->db->select('*');
		$this->db->from('productos');
		$this->db->where('borrado',null);
		$this->db->like('nombre', "$producto");

		if($producto == ''){
			$query = $this->db->limit(8);
		}

		$query = $this->db->get();


		$data['productos'] = $query->result();

		$data['almacen'] = $almacen;
		// var_dump($almacen);
		// exit;

		$this->load->view('movimientos/ajaxBuscaProducto', $data);

		// $this->db->like('nombre', $producto);
		// $query = $this->db->get('productos');

		// var_dump($query->result());
	}

	public function guardarMovimiento(){

		// var_dump($this->input->post('almacen_origen'));

		if($this->input->post('item')){
			$productos = $this->input->post('item');

			// var_dump($productos);
			// exit;

			if($this->input->post('almacen_origen')){
				$alamcen_origen = $this->input->post('almacen_origen');
			}else{
				$alamcen_origen = $this->session->almacen_id;
			}

			$ids = array_keys($this->input->post('item'));

			$numeroQuery = $this->db->query("SELECT max(numero_ingreso) as numero FROM movimientos WHERE borrado is null")->result();

			if(!empty($numeroQuery[0]->numero)){
				$numero = $numeroQuery[0]->numero + 1;
			}else{
				$numero = 1;
			}

			foreach($ids as $id){

				$user_id = $this->session->id_usuario;

				// sacamos de movimientos
				$datos1 = array(
					'usuarios_id'   => $user_id,
					'producto_id'  	=> $id,
					'almacen_id'    => $alamcen_origen,
					'salida'        => $productos[$id],
					'fecha'         => date("Y-m-d"),
					'numero_ingreso'=> $numero,
					'estado'        => 'Envio',
					// 'descripcion'   => $this->input->post('detalle-quitar'),
					'created_at'	 	=> 	date("Y-m-d H:i:s"),
				);
				$this->db->insert('movimientos', $datos1);
				

				// agregamos a los movimientos
				$datos1 = array(
					'usuarios_id'    	=> 	$user_id,
					'producto_id'    	=> 	$id,
					'almacen_origen_id'	=>	$alamcen_origen,
					'almacen_id'     	=> 	$this->input->post('almacen_destino'),
					// 'precio_compra'  	=>	$this->input->post('precio_unidad'),
					// 'precio_venta'   	=> 	$this->input->post('precio_venta'),
					// 'precio_total'   	=> 	$this->input->post('precio_total'),
					'ingreso'		 	=> 	$productos[$id],
					'fecha'          	=> 	date("Y-m-d H:i:s"),
					'numero_ingreso'=> $numero,
					'estado'        	=> 'Envio',
					// 'descripcion'    	=> 	$this->input->post('detalle'),
					'created_at'	 	=> 	date("Y-m-d H:i:s"),
				);
				$this->db->insert('movimientos', $datos1);
			}

			$numero = intval($numero);

			$data['detalle'] = $this->db->get_where('movimientos', array('numero_ingreso' => $numero, 'borrado' => null))->row_array();

			$data['productos'] = $this->db->query("SELECT * FROM movimientos WHERE numero_ingreso = $numero AND  almacen_origen_id IS NOT NULL AND borrado is NULL")->result();

			$this->load->view('movimientos/recibo_movimiento', $data);
			
		}
	}

}