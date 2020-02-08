<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model {
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
        $this->load->helper('vayes_helper');
        $this->load->model("usuario_model");
    }

    public function valida($usuario, $pass){
    	
         $this->db->select('id, nombre, usuario, rol');
         $this->db->from('usuarios');
         $this->db->where('usuario', $usuario);
         $this->db->where('pass', $pass);
         $consulta = $this->db->get();
         $resultado = $consulta->row_array();
         $datos_sesion = array(
         	'id_usuario'=>$resultado['id'],
         	'nombre'=>$resultado['nombre'],
         	'usuario'=>$resultado['usuario'],
         	'rol'=>$resultado['rol'],
         );
         $this->session->set_userdata($datos_sesion);
         return $resultado;

      }

}