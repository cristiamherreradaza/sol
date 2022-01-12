<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventarios_Compra extends CI_Controller {

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
	}


	public function index()
	{
		$data['categorias'] = $this->db->get_where('productos', array('estado' => 1))->result();
		$data['compras'] = $this->db->get_where('compras', array('estado' => 1))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('inventarios/compra', $data);
		$this->load->view('template/footer');
    }


     public function ajax_verifica(){

		$id = $this->input->get("param1");
		$nom = $this->db->get_where('categorias', array('id' => $id, 'estado' => 1))->row();
		$tipo = $nom->tipo;

		if ($nom) {
			$respuesta = array('estado'=>'registrado', 'tipo'=>$tipo);
			echo json_encode($respuesta);
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
			'stock'   => $this->input->get('param2'),
			'precio_unidad' => $this->input->get('param3'),
			'precio_venta'   => $this->input->get('param4'),
			'precio_total' => $this->input->get('param5'),
			'fecha'   => $this->input->get('param6'),
			'detalle'   => $this->input->get('param7'),
			'estado'   => 1
		);
		$this->db->insert('compras', $datos);

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
			'stock'   => $this->input->get("param3"),
			'precio_unidad' => $this->input->get("param4"),
			'precio_venta'   => $this->input->get("param5"),
			'precio_total' => $this->input->get("param6"),
			'fecha'   => $this->input->get("param7"),
			'detalle' => $this->input->get("param8"),
			'estado'   => 1
		);
        $this->db->where('id', $id);
        $this->db->update('compras', $data);

		$respuesta = array('estado'=>'editado');
		echo json_encode($respuesta);
				
	}
	
	
	public function eliminar($id = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$data = array(
            'estado' => 0,
            'borrado' => $hoy
        );
        $this->db->where('id', $id);
        $this->db->update('compras', $data);
        redirect("Inventarios_Compra");
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
		// $sql_productos = $this->db->query("SELECT * FROM productos")->result_array(); // este devuleve array recuperacion es ['0']
		$sql_productos = $this->db->query("SELECT * FROM productos")->result(); // este no devuleve array recuperacion es ->

		$data['productos'] = $sql_productos;
		
		// var_dump($sql_productos);
		// $data['compra'] = $this->db->query("SELECT cate.*, com.*
		// 									FROM categorias cate, (SELECT categoria_id, SUM(stock) as suma
		// 																					FROM compras
		// 																					WHERE estado = 1
		// 																					GROUP BY (categoria_id))com
		// 									WHERE cate.id = com.categoria_id
		// 									AND cate.estado = 1")->result();
		// $sql_compras = "SELECT cat.nombre, tmp.total
		// 				FROM categorias cat, (SELECT SUM(stock) as total, categoria_id
		// 									FROM compras
		// 									GROUP BY categoria_id)tmp
		// 				WHERE cat.id = tmp.categoria_id
		// 				ORDER BY cat.id";
		// $data['compras'] = $this->db->query($sql_compras)->result_array();

		// $sql_detalle_compras = "SELECT cat.nombre, com.stock, com.precio_unidad, com.precio_total
		// 						FROM categorias cat, compras com
		// 						WHERE com.borrado IS NULL 
		// 						AND com.categoria_id = cat.id
		// 						ORDER BY com.fecha";

		


		// $data['detalle_compras'] = $this->db->query($sql_detalle_compras)->result_array();

        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('inventarios/lista_inventarios', $data);
		$this->load->view('template/footer');
	}

	public function verMaterial($id = null){

		// var_dump($id);
		
		$data['productos'] = $this->db->get_where('movimientos', array('producto_id' => $id, 'borrado' => NULL))->result();

		// $data['compras'] = $this->db->get_where('compras', array('estado' => 1, 'categoria_id' => $id))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('inventarios/verMaterial', $data);
		$this->load->view('template/footer');
	}

	public function guardarProducto(){
		
		$id = $this->input->post("producto-edita");

		$data = array(
            'nombre' => $this->input->post("nombre-producto"),
            'tipo' => $this->input->post("tipo-producto")
        );
        $this->db->where('id', $id);
        $this->db->update('categorias', $data);

        redirect("Inventarios_Compra/lista");
	}

}