<?php
require_once 'modules/proveedor/model.php';


class CreditoProveedorDetalle extends StandardObject {
	
	function __construct(Proveedor $proveedor=NULL) {
		$this->creditoproveedordetalle_id = 0;
		$this->numero = '';
		$this->importe = 0.00;
		$this->fecha = '';
		$this->proveedor = $proveedor;
	}
}
?>