<?php


class CreditoProveedorDetalleView extends View {

	function panel($creditoproveedordetalle_collection, $proveedor_collection) {
		$gui = file_get_contents("static/modules/creditoproveedordetalle/panel.html");
		$gui_slt_proveedor = file_get_contents("static/common/slt_proveedor.html");

		foreach ($creditoproveedordetalle_collection as $clave=>$valor) {
			unset($creditoproveedordetalle_collection[$clave]->proveedor->infocontactocollection);
		}

		foreach ($proveedor_collection as $clave=>$valor) {
			if ($valor->oculto != 0) {
				unset($proveedor_collection[$clave]);
			} else {
				unset($proveedor_collection[$clave]->infocontacto_collection);
			}
		}		
		
		$gui_slt_proveedor = $this->render_regex('SLT_PROVEEDOR', $gui_slt_proveedor, $proveedor_collection);
		$render = $this->render_regex('TBL_CREDITOPROVEEDORDETALLE', $gui, $creditoproveedordetalle_collection);
		$render = str_replace('{slt_proveedor}', $gui_slt_proveedor, $render);
		$render = str_replace('{fecha_sys}', date('Y-m-d'), $render);
		$render = $this->render_breadcrumb($render);
		$template = $this->render_template($render);
		print $template;
	}

	function editar($creditoproveedordetalle_collection, $proveedor_collection, $obj_creditoproveedordetalle) {
		$gui = file_get_contents("static/modules/creditoproveedordetalle/editar.html");
		$gui_slt_proveedor = file_get_contents("static/common/slt_proveedor.html");

		foreach ($creditoproveedordetalle_collection as $clave=>$valor) {
			unset($creditoproveedordetalle_collection[$clave]->proveedor->infocontactocollection);
		}

		foreach ($proveedor_collection as $clave=>$valor) {
			if ($valor->oculto != 0) {
				unset($proveedor_collection[$clave]);
			} else {
				unset($proveedor_collection[$clave]->infocontacto_collection);
			}
		}

		unset($obj_creditoproveedordetalle->proveedor->infocontactocollection);
		$obj_creditoproveedordetalle = $this->set_dict($obj_creditoproveedordetalle);
		$gui_slt_proveedor = $this->render_regex('SLT_PROVEEDOR', $gui_slt_proveedor, $proveedor_collection);
		$render = $this->render_regex('TBL_CREDITOPROVEEDORDETALLE', $gui, $creditoproveedordetalle_collection);
		$render = str_replace('{slt_proveedor}', $gui_slt_proveedor, $render);
		$render = $this->render($obj_creditoproveedordetalle, $render);
		$render = $this->render_breadcrumb($render);
		$template = $this->render_template($render);
		print $template;
	}
}
?>