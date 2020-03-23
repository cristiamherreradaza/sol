<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Trabajo_model extends CI_Model 
{
    var $table = "trabajos";
    var $select_column = array("id", "nombre", "ci", "celulares");
    var $order_column = array(null, "nombre", "ci", null, null);

    public function __construct(){

    	parent::__construct();
        $this->load->database();
        $this->load->helper('vayes_helper');
        // $this->load->model("persona_model");
    }

    function make_query()  
    {  
        $this->db->select('c.nombre, c.ci, c.celulares, c.genero, t.*');
		$this->db->from('trabajos as t');
		$this->db->order_by('t.id', 'desc');
		$this->db->join('clientes as c', 'c.id = t.cliente_id', 'left');
		$this->db->where('t.borrado', NULL);
		// $this->db->limit(100);
        
        // $this->db->select($this->select_column);  
        // $this->db->from($this->table);  
        if(isset($_POST["search"]["value"]))  
        {  
            $this->db->like("c.nombre", $_POST["search"]["value"]);  
            $this->db->or_like("c.ci", $_POST["search"]["value"]);  
        }  
        if(isset($_POST["order"]))  
        {  
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
        }  
        else  
        {  
            $this->db->order_by('nombre', 'DESC');  
        }  
    }  
    function make_datatables(){  
        $this->make_query();  
        if($_POST["length"] != -1)  
        {  
            $this->db->limit($_POST['length'], $_POST['start']);  
        }  
        $query = $this->db->get();  
        // vdebug($query->result(), true, false, true);
        return $query->result();  
    }  

    function get_filtered_data(){  
        $this->make_query();  
        $query = $this->db->get();  
        return $query->num_rows();  
    }       

    function get_all_data()  
    {  
        $this->db->select("*");  
        $this->db->from($this->table);  
        return $this->db->count_all_results();  
    }  

}