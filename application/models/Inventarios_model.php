<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventarios_model extends CI_Model {
    public function __construct()
    {
		parent::__construct();
        $this->load->database();
        $this->load->helper('vayes_helper');
    }

    // MODELOS PARA VARON
    public function insertar_material_saco_varon($trabajo_id, $fecha, $etsv, $fsv, $psv, $hsv, $pesv, $tfsv, $bgsv, $bpsv)
    {
        // ENTRE TELA CON EL id = 9
        $idet = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 9')->row();
        $entre_tela_saco_varon = $this->db->get_where('compras', array('id' => $idet->id, 'estado' => 1))->row();
        $datos1 = array(
            'categoria_id' => '9',
            'cantidad'   => $etsv,
            'precio_venta'   => $entre_tela_saco_varon->precio_venta,
            'precio_total' => $etsv*$entre_tela_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos1);

        // FORRO CON EL id = 1
        $idfo = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 1')->row();
        $forro_saco_varon = $this->db->get_where('compras', array('id' => $idfo->id, 'estado' => 1))->row();
        $datos2 = array(
            'categoria_id' => '1',
            'cantidad'   => $fsv,
            'precio_venta'   => $forro_saco_varon->precio_venta,
            'precio_total' => $fsv*$forro_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos2);

        // PLASTON CON EL id = 8
        $idpl = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 8')->row();
        $plaston_saco_varon = $this->db->get_where('compras', array('id' => $idpl->id, 'estado' => 1))->row();
        $datos3 = array(
            'categoria_id' => '8',
            'cantidad'   => $psv,
            'precio_venta'   => $plaston_saco_varon->precio_venta,
            'precio_total' => $psv*$plaston_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos3);

        // HOMBRERA CON EL id = 15
        $idho = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 15')->row();
        $hombrera_saco_varon = $this->db->get_where('compras', array('id' => $idho->id, 'estado' => 1))->row();
        $datos4 = array(
            'categoria_id' => '15',
            'cantidad'   => $hsv,
            'precio_venta'   => $hombrera_saco_varon->precio_venta,
            'precio_total' => $hsv*$hombrera_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos4);

        // PELLON BLANCO CON EL id = 45
        $idpb = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 45')->row();
        $pellon_blanco_saco_varon = $this->db->get_where('compras', array('id' => $idpb->id, 'estado' => 1))->row();
        $datos5 = array(
            'categoria_id' => '45',
            'cantidad'   => $pesv,
            'precio_venta'   => $pellon_blanco_saco_varon->precio_venta,
            'precio_total' => $pesv*$pellon_blanco_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos5);

        // TELA FUSIONABLE CON EL id = 7
        $idtf = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 7')->row();
        $tela_fusionable_saco_varon = $this->db->get_where('compras', array('id' => $idtf->id, 'estado' => 1))->row();
        $datos6 = array(
            'categoria_id' => '7',
            'cantidad'   => $tfsv,
            'precio_venta'   => $tela_fusionable_saco_varon->precio_venta,
            'precio_total' => $tfsv*$tela_fusionable_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos6);

        // BOTON GRANDE CON EL id = 13
        $idbg = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 13')->row();
        $boton_grande_saco_varon = $this->db->get_where('compras', array('id' => $idbg->id, 'estado' => 1))->row();
        $datos7 = array(
            'categoria_id' => '13',
            'cantidad'   => $bgsv,
            'precio_venta'   => $boton_grande_saco_varon->precio_venta,
            'precio_total' => $bgsv*$boton_grande_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos7);

        // BOTON PEQUEÑO CON EL id = 12
        $idbp = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 12')->row();
        $boton_peque_saco_varon = $this->db->get_where('compras', array('id' => $idbp->id, 'estado' => 1))->row();
        $datos8 = array(
            'categoria_id' => '12',
            'cantidad'   => $bpsv,
            'precio_venta'   => $boton_peque_saco_varon->precio_venta,
            'precio_total' => $bpsv*$boton_peque_saco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos8);
    }

    public function insertar_material_pantalon_varon($trabajo_id, $fecha, $bpv, $cpv, $pbpv, $bppv, $bropv, $ppv, $lpv)
    {
        // BONYE CON EL id = 3
        $idbo = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 3')->row();
        $bonye_pantalon_varon = $this->db->get_where('compras', array('id' => $idbo->id, 'estado' => 1))->row();
        $datos1 = array(
            'categoria_id' => '3',
            'cantidad'   => $bpv,
            'precio_venta'   => $bonye_pantalon_varon->precio_venta,
            'precio_total' => $bpv*$bonye_pantalon_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos1);

        // CIERRE CON EL id = 33
        $idci = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 33')->row();
        $cierre_pantalon_varon = $this->db->get_where('compras', array('id' => $idci->id, 'estado' => 1))->row();
        $datos2 = array(
            'categoria_id' => '33',
            'cantidad'   => $cpv,
            'precio_venta'   => $cierre_pantalon_varon->precio_venta,
            'precio_total' => $cpv*$cierre_pantalon_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos2);

        // PELLON BLANCO CON EL id = 45
        $idpb = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 45')->row();
        $pellon_blanco_pantalon_varon = $this->db->get_where('compras', array('id' => $idpb->id, 'estado' => 1))->row();
        $datos3 = array(
            'categoria_id' => '45',
            'cantidad'   => $pbpv,
            'precio_venta'   => $pellon_blanco_pantalon_varon->precio_venta,
            'precio_total' => $pbpv*$pellon_blanco_pantalon_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos3);
        

        // BOTON PEQUEÑO CON EL id = 12
        $idbpe = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 12')->row();
        $boton_peque_pantalon_varon = $this->db->get_where('compras', array('id' => $idbpe->id, 'estado' => 1))->row();
        $datos4 = array(
            'categoria_id' => '12',
            'cantidad'   => $bppv,
            'precio_venta'   => $boton_peque_pantalon_varon->precio_venta,
            'precio_total' => $bppv*$boton_peque_pantalon_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos4);

        // BROCHE CON EL id = 14
        $idbro = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 14')->row();
        $broche_pantalon_varon = $this->db->get_where('compras', array('id' => $idbro->id, 'estado' => 1))->row();
        $datos5 = array(
            'categoria_id' => '14',
            'cantidad'   => $bropv,
            'precio_venta'   => $broche_pantalon_varon->precio_venta,
            'precio_total' => $bropv*$broche_pantalon_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos5);

        // PLASTON CON EL id = 8
        $idpla = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 8')->row();
        $plaston_pantalon_varon = $this->db->get_where('compras', array('id' => $idpla->id, 'estado' => 1))->row();
        $datos6 = array(
            'categoria_id' => '8',
            'cantidad'   => $ppv,
            'precio_venta'   => $plaston_pantalon_varon->precio_venta,
            'precio_total' => $ppv*$plaston_pantalon_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos6);

        // LIGA CON EL id = 10
        $idli = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 10')->row();
        $liga_pantalon_varon = $this->db->get_where('compras', array('id' => $idli->id, 'estado' => 1))->row();
        $datos7 = array(
            'categoria_id' => '10',
            'cantidad'   => $lpv,
            'precio_venta'   => $liga_pantalon_varon->precio_venta,
            'precio_total' => $lpv*$liga_pantalon_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos7);
    }

    public function insertar_material_chaleco_varon($trabajo_id, $fecha, $fcv, $pcv, $hcv, $bgcv, $bpcv)
    {
        // FORRO CON EL id = 1
        $idfo = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 1')->row();
        $forro_chaleco_varon = $this->db->get_where('compras', array('id' => $idfo->id, 'estado' => 1))->row();
        $datos1 = array(
            'categoria_id' => '1',
            'cantidad'   => $fcv,
            'precio_venta'   => $forro_chaleco_varon->precio_venta,
            'precio_total' => $fcv*$forro_chaleco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos1);

        // PELLON BLANCO CON EL id = 45
        $idpb = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 45')->row();
        $pellon_b_chaleco_varon = $this->db->get_where('compras', array('id' => $idpb->id, 'estado' => 1))->row();
        $datos2 = array(
            'categoria_id' => '45',
            'cantidad'   => $pcv,
            'precio_venta'   => $pellon_b_chaleco_varon->precio_venta,
            'precio_total' => $pcv*$pellon_b_chaleco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos2);

        // HEVILLA CHALECO CON EL id = 37
        $idhe = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 37')->row();
        $hevilla_chaleco_varon = $this->db->get_where('compras', array('id' => $idhe->id, 'estado' => 1))->row();
        $datos3 = array(
            'categoria_id' => '37',
            'cantidad'   => $hcv,
            'precio_venta'   => $hevilla_chaleco_varon->precio_venta,
            'precio_total' => $hcv*$hevilla_chaleco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos3);
        

        // BOTON GRANDE CON EL id = 13
        $idbbog = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 13')->row();
        $boton_grande_chaleco_varon = $this->db->get_where('compras', array('id' => $idbbog->id, 'estado' => 1))->row();
        $datos4 = array(
            'categoria_id' => '13',
            'cantidad'   => $bgcv,
            'precio_venta'   => $boton_grande_chaleco_varon->precio_venta,
            'precio_total' => $bgcv*$boton_grande_chaleco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos4);

        // BOTON PEQUEÑO CON EL id = 12
        $idbop = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 12')->row();
        $boton_peque_chaleco_varon = $this->db->get_where('compras', array('id' => $idbop->id, 'estado' => 1))->row();
        $datos5 = array(
            'categoria_id' => '12',
            'cantidad'   => $bpcv,
            'precio_venta'   => $boton_peque_chaleco_varon->precio_venta,
            'precio_total' => $bpcv*$boton_peque_chaleco_varon->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos5);
    }

    // MODELOS PARA MUJER

    public function insertar_material_saco_mujer($trabajo_id, $fecha, $fsm, $fusm, $psm, $tsm, $hmsm, $bgsm, $bpsm)
    {
        // FORRO CON EL id = 1
        $idfo = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 1')->row();
        $forro_saco_mujer = $this->db->get_where('compras', array('id' => $idfo->id, 'estado' => 1))->row();
        $datos1 = array(
            'categoria_id' => '1',
            'cantidad'   => $fsm,
            'precio_venta'   => $forro_saco_mujer->precio_venta,
            'precio_total' => $fsm*$forro_saco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos1);

        // TELA FUSIONABLE CON EL id = 7
        $idtf = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 7')->row();
        $tela_f_saco_mujer = $this->db->get_where('compras', array('id' => $idtf->id, 'estado' => 1))->row();
        $datos2 = array(
            'categoria_id' => '7',
            'cantidad'   => $fusm,
            'precio_venta'   => $tela_f_saco_mujer->precio_venta,
            'precio_total' => $fusm*$tela_f_saco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos2);

        // PELLON BLANCO CON EL id = 45
        $idpbl = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 45')->row();
        $pellon_b_saco_mujer = $this->db->get_where('compras', array('id' => $idpbl->id, 'estado' => 1))->row();
        $datos3 = array(
            'categoria_id' => '45',
            'cantidad'   => $psm,
            'precio_venta'   => $pellon_b_saco_mujer->precio_venta,
            'precio_total' => $psm*$pellon_b_saco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos3);

        // TAFETA CON EL id = 2
        $idtaf = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 2')->row();
        $tafeta_saco_mujer = $this->db->get_where('compras', array('id' => $idtaf->id, 'estado' => 1))->row();
        $datos4 = array(
            'categoria_id' => '2',
            'cantidad'   => $tsm,
            'precio_venta'   => $tafeta_saco_mujer->precio_venta,
            'precio_total' => $tsm*$tafeta_saco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos4);

        // HOMBRERA MUJER CON EL id = 16
        $idhm = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 16')->row();
        $hombrera_saco_mujer = $this->db->get_where('compras', array('id' => $idhm->id, 'estado' => 1))->row();
        $datos5 = array(
            'categoria_id' => '16',
            'cantidad'   => $hmsm,
            'precio_venta'   => $hombrera_saco_mujer->precio_venta,
            'precio_total' => $hmsm*$hombrera_saco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos5);

        // BOTON GRANDE CON EL id = 13
        $idbogr = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 13')->row();
        $boton_g_saco_mujer = $this->db->get_where('compras', array('id' => $idbogr->id, 'estado' => 1))->row();
        $datos6 = array(
            'categoria_id' => '13',
            'cantidad'   => $bgsm,
            'precio_venta'   => $boton_g_saco_mujer->precio_venta,
            'precio_total' => $bgsm*$boton_g_saco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos6);

        // BOTON PEQUEÑO CON EL id = 12
        $idbop = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 12')->row();
        $boton_p_saco_mujer = $this->db->get_where('compras', array('id' => $idbop->id, 'estado' => 1))->row();
        $datos7 = array(
            'categoria_id' => '12',
            'cantidad'   => $bpsm,
            'precio_venta'   => $boton_p_saco_mujer->precio_venta,
            'precio_total' => $bpsm*$boton_p_saco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos7);
    }

    public function insertar_material_pantalon_mujer($trabajo_id, $fecha, $cpm, $pppm)
    {
        // CIERRE CON EL id = 33
        $idci = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 33')->row();
        $cierre_pantalon_mujer = $this->db->get_where('compras', array('id' => $idci->id, 'estado' => 1))->row();
        $datos1 = array(
            'categoria_id' => '33',
            'cantidad'   => $cpm,
            'precio_venta'   => $cierre_pantalon_mujer->precio_venta,
            'precio_total' => $cpm*$cierre_pantalon_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos1);

        // PELLON PARA PRETINA CON EL id = 4
        $idpell = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 4')->row();
        $pellon_pretina_pantalon_mujer = $this->db->get_where('compras', array('id' => $idpell->id, 'estado' => 1))->row();
        $datos2 = array(
            'categoria_id' => '4',
            'cantidad'   => $pppm,
            'precio_venta'   => $pellon_pretina_pantalon_mujer->precio_venta,
            'precio_total' => $pppm*$pellon_pretina_pantalon_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos2);
    }

    public function insertar_material_falda_mujer($trabajo_id, $fecha, $cfm, $tfm, $ppfm)
    {
        // CIERRE CON EL id = 33
        $idci = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 33')->row();
        $cierre_falda_mujer = $this->db->get_where('compras', array('id' => $idci->id, 'estado' => 1))->row();
        $datos1 = array(
            'categoria_id' => '33',
            'cantidad'   => $cfm,
            'precio_venta'   => $cierre_falda_mujer->precio_venta,
            'precio_total' => $cfm*$cierre_falda_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos1);

        // TAFETA CON EL id = 2
        $idta = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 2')->row();
        $tafeta_falda_mujer = $this->db->get_where('compras', array('id' => $idta->id, 'estado' => 1))->row();
        $datos2 = array(
            'categoria_id' => '2',
            'cantidad'   => $tfm,
            'precio_venta'   => $tafeta_falda_mujer->precio_venta,
            'precio_total' => $tfm*$tafeta_falda_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos2);

        // PELLON PARA PRETINA CON EL id = 4
        $idppre = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 4')->row();
        $pellon_pretina_falda_mujer = $this->db->get_where('compras', array('id' => $idppre->id, 'estado' => 1))->row();
        $datos3 = array(
            'categoria_id' => '4',
            'cantidad'   => $ppfm,
            'precio_venta'   => $pellon_pretina_falda_mujer->precio_venta,
            'precio_total' => $ppfm*$pellon_pretina_falda_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos3);
    }

    public function insertar_material_cheleco_mujer($trabajo_id, $fecha, $fcm, $pbcm, $bpcm)
    {
        // FORRO CON EL id = 1
        $idfo = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 1')->row();
        $forro_chaleco_mujer = $this->db->get_where('compras', array('id' => $idfo->id, 'estado' => 1))->row();
        $datos1 = array(
            'categoria_id' => '1',
            'cantidad'   => $fcm,
            'precio_venta'   => $forro_chaleco_mujer->precio_venta,
            'precio_total' => $fcm*$forro_chaleco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos1);

        // PELLON BLANCO CON EL id = 45
        $idpb = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 45')->row();
        $pellon_b_chaleco_mujer = $this->db->get_where('compras', array('id' => $idpb->id, 'estado' => 1))->row();
        $datos2 = array(
            'categoria_id' => '45',
            'cantidad'   => $pbcm,
            'precio_venta'   => $pellon_b_chaleco_mujer->precio_venta,
            'precio_total' => $pbcm*$pellon_b_chaleco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos2);

        // BOTON GRANDE CON EL id = 13
        $idbog = $this->db->query('SELECT MAX(id) as id
                                FROM compras
                                WHERE categoria_id = 13')->row();
        $boton_g_chaleco_mujer = $this->db->get_where('compras', array('id' => $idbog->id, 'estado' => 1))->row();
        $datos3 = array(
            'categoria_id' => '13',
            'cantidad'   => $bpcm,
            'precio_venta'   => $boton_g_chaleco_mujer->precio_venta,
            'precio_total' => $bpcm*$boton_g_chaleco_mujer->precio_venta,
            'fecha'   => $fecha,
            'trabajo_id'   => $trabajo_id,
            'estado'   => 1
        );
        $this->db->insert('ventas', $datos3);
    }
}

