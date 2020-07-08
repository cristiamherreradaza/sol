<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizacion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 // load Session Library
		$this->load->library('form_validation');
		$this->load->helper('vayes_helper');
		$this->load->helper('tools_helper');
		$this->load->helper('form');
        $this->load->helper('url');
	}

	public function unidos()
	{
		$data['telas'] = $this->db->get_where('telas', array('estado'=>1))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('cotizacion/unidos', $data);
		$this->load->view('template/footer');	
	}

	public function separados()
	{
		$data['telas'] = $this->db->get_where('telas', array('estado'=>1))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		// $this->load->view('trabajos/nuevo', $data);
		$this->load->view('cotizacion/separados', $data);
		$this->load->view('template/footer');	
	}

	public function guarda()
	{
		$fecha= date("Y-m-d");
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
		'fecha' => $fecha,
		'estado'   => 1
		);
		$this->db->insert('cotizaciones1', $datos);
		$ultimo = $this->db->query("SELECT MAX(id) as nro
											FROM cotizaciones1")->row();
		$id = $ultimo->nro;
		redirect('Cotizacion/membrete/'.$id);
	}

	public function guarda_separado()
	{
		$fecha= date("Y-m-d");
		// var_dump($fecha);
		// exit;
		$datos = array(
		'nombre' => $this->input->post('nombre'),
		'costo_real_v_1'	=> $this->input->post('costo_real_v_1'),
		'costo_mayor_v_1'	=> $this->input->post('costo_mayor_v_1'),
		'costo_real_v_2'	=> $this->input->post('costo_real_v_2'),
		'costo_mayor_v_2' => $this->input->post('costo_mayor_v_2'),
		'costo_real_v_3' => $this->input->post('costo_real_v_3'),
		'costo_mayor_v_3' => $this->input->post('costo_mayor_v_3'),
		'costo_real_m_1' => $this->input->post('costo_real_m_1'),
		'costo_mayor_m_1' => $this->input->post('costo_mayor_m_1'),
		'costo_real_m_2' => $this->input->post('costo_real_m_2'),
		'costo_mayor_m_2'	=> $this->input->post('costo_mayor_m_2'),
		'costo_real_m_3'	=> $this->input->post('costo_real_m_3'),
		'costo_mayor_m_3'	=> $this->input->post('costo_mayor_m_3'),
		'costo_real_m_4' => $this->input->post('costo_real_m_4'),
		'costo_mayor_m_4' => $this->input->post('costo_mayor_m_4'),
		'id_tela_1' => $this->input->post('id_tela_1'),
		'costo_real_tela_1' => $this->input->post('costo_real_tela_1'),
		'costo_mayor_tela_1' => $this->input->post('costo_mayor_tela_1'),
		'id_tela_2' => $this->input->post('id_tela_2'),
		'costo_real_tela_2' => $this->input->post('costo_real_tela_2'),
		'costo_mayor_tela_2' => $this->input->post('costo_mayor_tela_2'),
		'id_tela_3' => $this->input->post('id_tela_3'),
		'costo_real_tela_3' => $this->input->post('costo_real_tela_3'),
		'costo_mayor_tela_3' => $this->input->post('costo_mayor_tela_3'),
		'fecha' => $fecha,
		'estado'   => 1
		);
		$this->db->insert('cotizaciones2', $datos);
		$ultimo = $this->db->query("SELECT MAX(id) as nro
											FROM cotizaciones2")->row();
		$id = $ultimo->nro;
		redirect('Cotizacion/reporte/'.$id);
	}

	public function membrete($id = null)
	{
		$telass = $this->db->get_where('cotizaciones1', array('id'=>$id, 'estado'=>1))->row();
		$datos['fecha'] = fechaEs($telass->fecha);
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
		$telass = $this->db->get_where('cotizaciones2', array('id'=>$id, 'estado'=>1))->row();
		$datos['fecha'] = fechaEs($telass->fecha);
		$datos['cotiza'] = $telass;

		$datos['tela1'] = $this->db->get_where('telas', array('id'=>$telass->id_tela_1, 'estado'=>1))->row();
		$datos['tela2'] = $this->db->get_where('telas', array('id'=>$telass->id_tela_2, 'estado'=>1))->row();
		$datos['tela3'] = $this->db->get_where('telas', array('id'=>$telass->id_tela_3, 'estado'=>1))->row();


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

    public function lista_unida()
    {
		$data['cotizacion'] = $this->db->query("SELECT cot1.id, cot1.nombre, tel.nombre as nom_tela1, cot1.prec_1, cot1.fecha 
												FROM cotizaciones1 cot1, telas tel
												WHERE cot1.tela_id_1 = tel.id
												AND cot1.estado = 1")->result();
        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('cotizacion/lista_unida', $data);
		$this->load->view('template/footer');
	}

	public function lista_separada()
    {
		$data['cotizacion'] = $this->db->query("SELECT cot2.id, cot2.nombre, tel.nombre as nom_tela1, cot2.costo_real_tela_1, cot2.fecha 
												FROM cotizaciones2 cot2, telas tel
												WHERE cot2.id_tela_1 = tel.id
												AND cot2.estado = 1")->result();
        $this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('cotizacion/lista_separada', $data);
		$this->load->view('template/footer');
	}

	public function eliminar_unido($id = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$data = array(
            'estado' => 0,
            'borrado' => $hoy
        );
        $this->db->where('id', $id);
        $this->db->update('cotizaciones1', $data);
        redirect("Cotizacion/lista_unida");
	}

	public function eliminar_separado($id = null)
	{
		$hoy = date("Y-m-d H:i:s");
		$data = array(
            'estado' => 0,
            'borrado' => $hoy
        );
        $this->db->where('id', $id);
        $this->db->update('cotizaciones2', $data);
        redirect("Cotizacion/lista_separada");
	}

	
}
