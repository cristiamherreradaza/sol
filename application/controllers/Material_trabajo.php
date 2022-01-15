<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_trabajo extends CI_Controller {

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


	public function listado(){
        $data['trabajo_material'] = $this->db->get_where('material_trabajos', array('borrado' => null))->result();
		
        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('material_trabajo/listado', $data);
		$this->load->view('template/footer');
    }

    public function guarda(){

        $id =  $this->input->post('material_id');

        $user_id = $this->session->id_usuario;

        $datos = array(
            'usuario_id' => $user_id,
            'detalle' => $this->input->post('detalle'),
            'precio' => $this->input->post('precio'),
            'cantidad' => $this->input->post('cantidad'),
            'genero' => $this->input->post('genero'),
            'pieza' => $this->input->post('pieza'),
            'tipo' => $this->input->post('tipo')
        );

        if($id == 0){

    		$this->db->insert('material_trabajos', $datos);

        }else{

            $this->db->where('id', $id);
            $this->db->update('material_trabajos', $datos);
        }

        redirect("Material_trabajo/listado");
    }

    public function eliminar($id = null){

		$hoy = date("Y-m-d H:i:s");

		$this->db->update('material_trabajos', array('borrado'=>$hoy), "id=$id");

		redirect("Material_trabajo/listado");

    }

}