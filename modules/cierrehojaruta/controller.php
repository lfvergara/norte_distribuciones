<?php
require_once "modules/cierrehojaruta/model.php";
require_once "modules/cierrehojaruta/view.php";
require_once "modules/detallecierrehojaruta/model.php";
require_once "modules/hojaruta/model.php";


class CierreHojaRutaController {

	function __construct() {
		$this->model = new CierreHojaRuta();
		$this->view = new CierreHojaRutaView();
	}

	function panel() {
    	SessionHandler()->check_session();
    	$desde = date('Y-m');
    	$hasta = date('Y-m-d');
    	$select = "chr.cierrehojaruta_id AS CHRID, chr.fecha AS FECHA, chr.rendicion AS RENDICION, chr.hojaruta_id AS HOJARUTA, c.denominacion AS FLETE";
    	$from = "cierrehojaruta chr INNER JOIN cobrador c ON chr.cobrador = c.cobrador_id";
    	$where = "chr.fecha BETWEEN '{$desde}-01' AND '{$hasta}' ORDER BY chr.cierrehojaruta_id DESC";
    	$cierrehojaruta_collection = CollectorCondition()->get('CierreHojaRuta', $where, 4, $from, $select);

    	$this->view->panel($cierrehojaruta_collection);
	}	
}
?>