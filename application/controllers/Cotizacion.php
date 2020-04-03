<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		$this->load->helper('vayes_helper');
		$this->load->helper('form');
        $this->load->helper('url');
	}

	public function separados()
	{

		$data['telas'] = $this->db->get_where('telas', array('estado'=>1))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('cotizacion/listado', $data);
		$this->load->view('template/footer');	
	}

	public function guarda()
	{
		$datos = array(
		'nombre' => $this->input->post('nombre'),
		'tela_id_1'	=> $this->input->post('id1'),
		'tela_id_2'	=> $this->input->post('id2'),
		'tela_id_3'	=> $this->input->post('id3'),
		'prec_1' => $this->input->post('pre_1'),
		'prec_2' => $this->input->post('pre_2'),
		'prec_3' => $this->input->post('pre_3'),
		'prec_4' => $this->input->post('pre_4'),
		'prec_5' => $this->input->post('pre_5'),
		'prec_6' => $this->input->post('pre_6'),
		'tela_id_4'	=> $this->input->post('id4'),
		'tela_id_5'	=> $this->input->post('id5'),
		'tela_id_6'	=> $this->input->post('id6'),
		'prec_7' => $this->input->post('pre_7'),
		'prec_8' => $this->input->post('pre_8'),
		'prec_9' => $this->input->post('pre_9'),
		'precio_1' => $this->input->post('prec_1'),
		'precio_2' => $this->input->post('prec_2'),
		'precio_3' => $this->input->post('prec_3'),
		'estado'   => 1
		);
		$this->db->insert('cotizaciones1', $datos);
		$ultimo = $this->db->query("SELECT MAX(id) as nro
											FROM cotizaciones1")->row();
		$id = $ultimo->nro;
		redirect('Cotizacion/membrete/'.$id);
	}

	public function membrete($id = null)
	{
		$datos['fecha'] = date("Y-m-d H:i:s");
		$telass = $this->db->get_where('cotizaciones1', array('id'=>$id, 'estado'=>1))->row();
		$datos['cotiza'] = $this->db->get_where('cotizaciones1', array('id'=>$id, 'estado'=>1))->row();

		$datos['tela1'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_1, 'estado'=>1))->row();
		$datos['tela2'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_2, 'estado'=>1))->row();
		$datos['tela3'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_3, 'estado'=>1))->row();
		$datos['tela4'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_4, 'estado'=>1))->row();
		$datos['tela5'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_5, 'estado'=>1))->row();
		$datos['tela6'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_6, 'estado'=>1))->row();

		$this->load->view('cotizacion/membrete', $datos);
		$html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        // target="_blank"   PARA ABRIR EN UNA PESTAÑA  NUEVA
    }

	public function conjuntos()
	{
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('cotizacion/crea_personal');
		$this->load->view('template/footer');	
	}

	public function reporte($id = null)
	{
		$datos['fecha'] = date("Y-m-d H:i:s");
		$telass = $this->db->get_where('cotizaciones1', array('id'=>$id, 'estado'=>1))->row();
		$datos['cotiza'] = $this->db->get_where('cotizaciones1', array('id'=>$id, 'estado'=>1))->row();

		$datos['tela1'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_1, 'estado'=>1))->row();
		$datos['tela2'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_2, 'estado'=>1))->row();
		$datos['tela3'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_3, 'estado'=>1))->row();
		$datos['tela4'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_4, 'estado'=>1))->row();
		$datos['tela5'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_5, 'estado'=>1))->row();
		$datos['tela6'] = $this->db->get_where('telas', array('id'=>$telass->tela_id_6, 'estado'=>1))->row();


		$this->load->view('cotizacion/reporte', $datos);
		$html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        // target="_blank"   PARA ABRIR EN UNA PESTAÑA  NUEVA
    }

    public function prueba()
	{
		
		$this->load->view('cotizacion/prueba');
		$html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->set_option('isRemoteEnabled', TRUE);  
        $this->dompdf->setPaper('letter', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
        // target="_blank"   PARA ABRIR EN UNA PESTAÑA  NUEVA
    }

	
}
