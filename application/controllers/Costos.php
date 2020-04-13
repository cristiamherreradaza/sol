<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Costos extends CI_Controller {

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
		$this->load->helper('tools_helper');
	}

	public function index() 
	{
		// echo "Holas desde costos";

		// $this->load->view('welcome_message');
    }

    public function modifica()
    {
		$data['costos']=$this->db->get_where('costos', array('borrado'=>NULL))->result();
		$this->load->view('template/header');
		$this->load->view('template/menu');
		$this->load->view('costos/modifica', $data);
		$this->load->view('template/footer');
    }

    public function guarda()
    {
    	// vdebug($this->input->post(), true, false, true);
    	$this->db->update('costos', array('varon'=>$this->input->post('saco_varon'), 'mujer'=>$this->input->post('saco_mujer')), "id=1");
    	$this->db->update('costos', array('varon'=>$this->input->post('pantalon_varon'), 'mujer'=>$this->input->post('pantalon_mujer')), "id=2");
    	$this->db->update('costos', array('varon'=>$this->input->post('chaleco_varon'), 'mujer'=>$this->input->post('chaleco_mujer')), "id=3");
    	$this->db->update('costos', array('varon'=>$this->input->post('falda')), "id=4");
    	$this->db->update('costos', array('varon'=>$this->input->post('camisa')), "id=5");
    	$this->db->update('costos', array('varon'=>$this->input->post('corbaton')), "id=6");
    	$this->db->update('costos', array('varon'=>$this->input->post('gato')), "id=7");
    	$this->db->update('costos', array('varon'=>$this->input->post('faja')), "id=8");
    	$this->db->update('costos', array('varon'=>$this->input->post('jumper')), "id=9");
    	redirect("costos/modifica");
    }

}