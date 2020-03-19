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
		$this->load->helper('vayes_helper');
	}


	public function index()
	{
		$data['categorias'] = $this->db->get_where('categorias', array('estado' => 1))->result();
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

		$id = $this->input->post("param1");
		$data = array(
			'categoria_id' => $this->input->post("param2"),
			'stock'   => $this->input->post("param3"),
			'precio_unidad' => $this->input->post("param4"),
			'precio_venta'   => $this->input->post("param5"),
			'precio_total' => $this->input->post("param6"),
			'fecha'   => $this->input->post("param7"),
			'detalle' => $this->input->post("param8"),
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
  //   	$this->db->from("categorias");
  //   	$this->db->where("estado", 1);
		// $this->db->order_by("id", "asc");
		// $query = $this->db->get(); 
		// $data['categorias'] = $query->result();

		// $data['categorias'] = $this->db->get_where('compras', array('estado' => 1))->result();
		// $data['compras'] = $this->db->get_where('compras', array('estado' => 1))->result();
		$data['compra'] = $this->db->query("SELECT cate.*, com.*
											FROM categorias cate, (SELECT *, SUM(stock) as suma
																							FROM compras com
																							WHERE estado = 1
																							GROUP BY (categoria_id))com
											WHERE cate.id = com.categoria_id
											AND cate.estado = 1")->result();
		// $data['venta'] = $this->db->query("SELECT categoria_id, SUM(cantidad) as suma
		// 									FROM ventas
		// 									WHERE estado = 1
		// 									GROUP BY (categoria_id)")->result();

        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('inventarios/lista_inventarios', $data);
		$this->load->view('template/footer');
	}

}