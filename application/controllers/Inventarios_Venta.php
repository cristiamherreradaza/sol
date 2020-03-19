<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventarios_Venta extends CI_Controller {

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
		$this->load->helper('vayes_helper');
	}


	public function index()
	{
		$data['categorias'] = $this->db->get_where('categorias', array('estado' => 1))->result();
		$data['ventas'] = $this->db->get_where('ventas', array('estado' => 1))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('inventarios/venta', $data);
		$this->load->view('template/footer');
    }

    public function retira_material($id_trabajo = null)
	{
		$this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.id', $id_trabajo);
		$data['trabajo'] = $this->db->get()->row_array();


		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ab.nombre as nombre_abertura, sa.*');
		$this->db->from('sacos as sa');
		$this->db->join('modelos as mo', 'mo.id = sa.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = sa.detalle_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = sa.abertura_id', 'left');
		$this->db->where('sa.trabajo_id', $id_trabajo);
		$data['saco'] = $this->db->get()->row_array();


		$this->db->select('mo.nombre as modelo_nombre, pi.nombre as pinzas_nombre, bo.nombre as bolsillo_nombre, pa.*');
		$this->db->from('pantalones as pa');
		$this->db->join('modelos as mo', 'mo.id = pa.modelo_id', 'left');
		$this->db->join('pinzas as pi', 'pi.id = pa.pinza_id', 'left');
		$this->db->join('bolsillos as bo', 'bo.id = pa.bolsillo_id', 'left');
		$this->db->where('pa.trabajo_id', $id_trabajo);
		$data['pantalon'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, de.nombre as detalle_nombre, ch.*');
		$this->db->from('chalecos as ch');
		$this->db->join('modelos as mo', 'mo.id = ch.modelo_id', 'left');
		$this->db->join('detalles as de', 'de.id = ch.detalle_id', 'left');
		$this->db->where('ch.trabajo_id', $id_trabajo);
		$data['chaleco'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, f.*');
		$this->db->from('faldas as f');
		$this->db->join('modelos as mo', 'mo.id = f.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = f.abertura_id', 'left');
		$this->db->where('f.trabajo_id', $id_trabajo);
		$data['falda'] = $this->db->get()->row_array();

		$this->db->select('mo.nombre as modelo_nombre, ab.nombre as abertura_nombre, b.nombre as bolsillo_nombre, j.*');
		$this->db->from('jumpers as j');
		$this->db->join('modelos as mo', 'mo.id = j.modelo_id', 'left');
		$this->db->join('aberturas as ab', 'ab.id = j.abertura_id', 'left');
		$this->db->join('bolsillos as b', 'b.id = j.bolsillo_id', 'left');
		$this->db->where('j.trabajo_id', $id_trabajo);
		$data['jumper'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('camisas as ca');
		$this->db->where('ca.trabajo_id', $id_trabajo);
		$data['camisa'] = $this->db->get()->row_array();

		$this->db->select('*');
		$this->db->from('extras as ex');
		$this->db->where('ex.trabajo_id', $id_trabajo);
		$data['extras'] = $this->db->get()->row_array();

		// vdebug($data['chaleco'], false, false, true);

		// $data['trabajo'] = $this->db->get_where('trabajos', array('id'=>$id_trabajo))->row_array();
		// $fecha = fechaEs($data['trabajo']['fecha']);

		// DATOS PARA EL SACO
		$data['entre_tela'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'ENTRE TELA'")->row();
		$data['forro'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'FORRO'")->row();
		$data['plaston'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'PLASTON'")->row();
		$data['hombrera_v'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'HOMBRERA (VARON)'")->row();
		$data['pellon'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'PELLON (BLANCO)'")->row();

		$data['fusionable'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'TELA FUSIONABLE'")->row();
		$data['boton_g'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'BOTON GRANDE'")->row();
		$data['boton_p'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'BOTON PEQUEÑO'")->row();

		// DATOS PARA EL PANTALON
		$data['bonye'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'BONYE'")->row();

		$data['cierre'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'CIERRE'")->row();
		$data['bocha'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'BOCHA'")->row();

		$data['liga'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'LIGA (PARA PRETINA)'")->row();

		// DATOS PARA EL CHALECO

		$data['hebilla'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'HEVILLA (CHALECO)'")->row();

		// DATOS PANTALON DAMAS
		$data['bolsillo'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'BOLSILLO'")->row();
		$data['hombrera_d'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.nombre like 'HOMBRERA (DAMA)'")->row();


		// var_dump($data);
		// exit();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('inventarios/retira_material', $data);
		$this->load->view('template/footer');
	
    }


     public function ajax_verifica_categoria(){

		$id = $this->input->get("param1");
		$nom1 = $this->db->get_where('categorias', array('id' => $id, 'estado' => 1))->row();
		$nombre = $nom1->nombre;
		$nom = $this->db->get_where('compras', array('categoria_id' => $id, 'estado' => 1))->row();
		$tipo = $nom1->tipo;
		// var_dump($nom);
		// exit();

		if ($nom) {
			$respuesta = array('estado'=>'registrado', 'nombre' => $nombre, 'tipo' => $tipo);
			echo json_encode($respuesta);
		}
		else{
			$respuesta = array('estado'=>'no', 'nombre' => $nombre, 'tipo' => $tipo);
			echo json_encode($respuesta);
		}
		
	}

	public function ajax_verifica_cantidad(){

		$cantidad = $this->input->get("param1");
		$categoria_id = $this->input->get("param2");
		$nom1 = $this->db->get_where('categorias', array('id' => $categoria_id, 'estado' => 1))->row();
		$tipo = $nom1->tipo;
		$compra = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras
																							WHERE categoria_id = $categoria_id
																							AND estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id")->row();
		$pre_vent = $compra->precio_venta;
		$pr_total = $cantidad * $pre_vent;

		$venta = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(cantidad) as suma
																							FROM ventas
																							WHERE categoria_id = $categoria_id
																							AND estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id")->row();

		if (!empty($venta)){
			$valor = $compra->suma - $venta->suma;
			if ($valor >= $cantidad) {
				$respuesta = array('estado'=>'si', 'precio_venta' => $pre_vent, 'precio_total' => $pr_total);
				echo json_encode($respuesta);
			}
			else{
				$respuesta = array('estado'=>'no', 'valor' => $valor, 'tipo' => $tipo);
				echo json_encode($respuesta);
			}
			

		}
		else{
			if($compra->stock >= $cantidad){
				$respuesta = array('estado'=>'si', 'precio_venta' => $pre_vent, 'precio_total' => $pr_total);
				echo json_encode($respuesta);
			}
			else{
				$respuesta = array('estado'=>'no', 'valor' => $compra->stock, 'tipo' => $tipo);
				echo json_encode($respuesta);
			}
			
		}
	}

	public function ajax_datos(){

		$data = $this->db->get_where('compras', array('estado' => 1))->result();
		echo json_encode($data);
		
	}


    public function guarda()
	{
		// $abc = $this->input->post('param1');
		// var_dump($abc);
		// exit();

		$datos = array(
			'categoria_id' => $this->input->get('param1'),
			'cantidad'   => $this->input->get('param2'),
			'precio_venta'   => $this->input->get('param3'),
			'precio_total' => $this->input->get('param4'),
			'fecha'   => $this->input->get('param5'),
			'detalle'   => $this->input->get('param6'),
			'estado'   => 1
		);
		$this->db->insert('ventas', $datos);

		$respuesta = array('estado'=>'registrado');
		echo json_encode($respuesta);
    }


    public function registra()
	{
		foreach (array_keys($_POST['Schoolname']) as $key) {
		  $Schoolname = $_POST['Schoolname'][$key];
		  $Major = $_POST['Major'][$key];
		  $Degree = $_POST['Degree'][$key];
		  $educationDate = $_POST['educationDate'][$key];

		  echo "Nombre: $Schoolname"."<br>"."Tipo: $Major"."<br>"."Accion: $Degree"."<br>"."Otros: $educationDate"."<br>";
		}
    }

     public function prueba()
	{
		$data['categorias'] = $this->db->get_where('categorias', array('estado' => 1))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('inventarios/compra', $data);
		$this->load->view('template/footer');
    }

    

    public function categorias()
    {
    	$this->db->from("categorias");
    	$this->db->where("estado", 1);
		$this->db->order_by("id", "asc");
		$query = $this->db->get(); 
		$data['categorias'] = $query->result();

        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('materiales/categorias', $data);
		$this->load->view('template/footer');
	}


	public function editar1(){

		$id = $this->input->get("param1");
		$data = array(
			'categoria_id' => $this->input->get("param2"),
			'cantidad'   => $this->input->get("param3"),
			'precio_venta'   => $this->input->get("param4"),
			'precio_total' => $this->input->get("param5"),
			'fecha'   => $this->input->get("param6"),
			'detalle' => $this->input->get("param7"),
			'estado'   => 1
		);
        $this->db->where('id', $id);
        $this->db->update('ventas', $data);

		$respuesta = array('estado'=>'editado');
		echo json_encode($respuesta);
				
	}
	
	
	public function eliminar($id = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$this->db->update('ventas', array('borrado'=>$hoy, 'estado' => 0), "id=$id");
		redirect("Inventarios_Venta");
	}

	public function membrete()
	{
		
		$this->load->view('inventarios/membrete');
		$html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        // target="_blank"   PARA ABRIR EN UNA PESTAÑA  NUEVA
    }

    public function reporte()
	{
		
		$this->load->view('inventarios/reporte');
		$html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        // target="_blank"   PARA ABRIR EN UNA PESTAÑA  NUEVA
    }


    public function lista()
    {
  //   	$this->db->from("categorias");
  //   	$this->db->where("estado", 1);
		// $this->db->order_by("id", "asc");
		// $query = $this->db->get(); 
		// $data['categorias'] = $query->result();

        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('inventarios/lista_inventarios');
		$this->load->view('template/footer');
	}

}