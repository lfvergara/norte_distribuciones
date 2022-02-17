<?php
require_once "modules/creditoproveedordetalle/model.php";
require_once "modules/creditoproveedordetalle/view.php";
require_once "modules/proveedor/model.php";


class CreditoProveedorDetalleController {

	function __construct() {
		$this->model = new CreditoProveedorDetalle();
		$this->view = new CreditoProveedorDetalleView();
	}

	function panel() {
    	SessionHandler()->check_session();
		$creditoproveedordetalle_collection = Collector()->get('CreditoProveedorDetalle');
		$proveedor_collection = Collector()->get('Proveedor');
    	$this->view->panel($creditoproveedordetalle_collection, $proveedor_collection);
	}

	function guardar() {
		SessionHandler()->check_session();		
		foreach ($_POST as $clave=>$valor) $this->model->$clave = $valor;
        $this->model->save();
		header("Location: " . URL_APP . "/creditoproveedordetalle/panel");
	}

	function editar($arg) {
		SessionHandler()->check_session();		
		$this->model->creditoproveedordetalle_id = $arg;
		$this->model->get();
		$creditoproveedordetalle_collection = Collector()->get('CreditoProveedorDetalle');
		$proveedor_collection = Collector()->get('Proveedor');
		$this->view->editar($creditoproveedordetalle_collection, $proveedor_collection, $this->model);
	}

	function eliminar($arg) {
		SessionHandler()->check_session();		
		$this->model->creditoproveedordetalle_id = $arg;
		$this->model->delete();
		header("Location: " . URL_APP . "/creditoproveedordetalle/panel");
	}
}
?>