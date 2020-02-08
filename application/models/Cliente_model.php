<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cliente_model extends CI_Model {
    public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->helper('vayes_helper');
        // $this->load->model("persona_model");
    }
}