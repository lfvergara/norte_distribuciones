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
    	$select = "chr.cierrehojaruta_id AS CHRID, CONCAT(date_format(chr.fecha, '%d/%m/%Y'), ' ', chr.hora) AS FECHA, chr.rendicion AS RENDICION, chr.hojaruta_id AS HOJARUTA, c.denominacion AS FLETE";
    	$from = "cierrehojaruta chr INNER JOIN cobrador c ON chr.cobrador = c.cobrador_id";
    	$where = "chr.fecha BETWEEN '{$desde}-01' AND '{$hasta}' ORDER BY chr.cierrehojaruta_id DESC";
    	$cierrehojaruta_collection = CollectorCondition()->get('CierreHojaRuta', $where, 4, $from, $select);
    	$this->view->panel($cierrehojaruta_collection);
	}

	function consultar($arg) {
    	SessionHandler()->check_session();
		$cierrehojaruta_id = $arg;
		$this->model->cierrehojaruta_id = $cierrehojaruta_id;
		$this->model->get();

		$select = "dchr.detallecierrehojaruta_id AS DCHRID, itp.denominacion AS TIPOPAGO, ee.denominacion AS ESTADOENTREGA, CASE WHEN eafip.egresoafip_id IS NULL THEN CONCAT((SELECT tf.nomenclatura FROM tipofactura tf WHERE e.tipofactura = tf.tipofactura_id), ' ', LPAD(e.punto_venta, 4, 0), '-', LPAD(e.numero_factura, 8, 0)) ELSE CONCAT((SELECT tf.nomenclatura FROM tipofactura tf WHERE eafip.tipofactura = tf.tipofactura_id), ' ', LPAD(eafip.punto_venta, 4, 0), '-', LPAD(eafip.numero_factura, 8, 0)) END AS FACTURA, dchr.importe AS IMPORTE";
    	$from = "detallecierrehojaruta dchr INNER JOIN ingresotipopago ON dchr.ingresotipopago = itp.ingresotipopago_id INNER JOIN estadoentrega ee ON dchr.estadoentrega = ee.estadoentrega_id INNER JOIN egreso e ON dchr.egreso_id = e.egreso_id LEFT JOIN egrosafip eafip ON e.egreso_id = eafip.egreso_id";
    	$where = "dchr.cierrehojaruta_id = {$cierrehojaruta_id}";
    	$detallecierrehojaruta_collection = CollectorCondition()->get('DetalleCierreHojaRuta', $where, 4, $from, $select);

    	$this->view->consultar($detallecierrehojaruta_collection, $this->model);
	}	
}
?>