<?php
require_once "modules/pedidovendedor/model.php";


class FacturacionLote {
	function proceso_lote($arg) {
		$pedidovendedor_id = $arg;
		$pvm = new PedidoVendedor();
		$pvm->pedidovendedor_id = $pedidovendedor_id;
		$pvm->get();
		$pvm->estadopedido = 2;
		$pvm->save();
	}	
}

$temp_id = filter_input(INPUT_GET, 'pedidovendedor_id');
echo $temp_id;
$flc = new FacturacionLote();
$flc->proceso_lote($temp_id);
?>