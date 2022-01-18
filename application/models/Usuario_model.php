<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model {
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
        // $this->load->helper('vayes_helper');
        $this->load->model("usuario_model");
    }

    public function valida($usuario, $pass)
    {
        $this->db->select('id, nombre, usuario, rol, almacenes_id');
        $this->db->from('usuarios');
        $this->db->where('usuario', $usuario);
        $this->db->where('pass', $pass);
        $this->db->where('borrado =', NULL);
        $consulta = $this->db->get();
        $resultado = $consulta->row_array();
        if($resultado){
            $datos_sesion = array(
                'id_usuario'=>$resultado['id'],
                'nombre'    =>$resultado['nombre'],
                'usuario'   =>$resultado['usuario'],
                'almacen_id'=>$resultado['almacenes_id'],
                // 'celulares' =>$resultado['celulares'],
                // 'email'     =>$resultado['email'],
                // 'direccion' =>$resultado['direccion'],
                'rol'       =>$resultado['rol'],
            );
            $this->session->set_userdata($datos_sesion);
            return $resultado;
        }else{
            return $resultado =  false;
        }
        
    }

}