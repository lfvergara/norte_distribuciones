<?php


class CreditoProveedorDetalle extends StandardObject {
	
	function __construct() {
		$this->creditoproveedordetalle_id = 0;
		$this->numero = '';
		$this->importe = 0.00;
		$this->fecha = '';
		$this->proveedor_id = 0;
	}
}
?>