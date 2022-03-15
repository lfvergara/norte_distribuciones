<?php


class CierreHojaRutaView extends View {

	function panel($cierrehojaruta_collection) {
		$gui = file_get_contents("static/modules/cierrehojaruta/panel.html");
		$gui_tbl_cierrehojaruta = file_get_contents("static/modules/cierrehojaruta/tbl_cierrehojaruta.html");
		$gui_tbl_cierrehojaruta = $this->render_regex_dict('TBL_CIERREHOJARUTA', $gui_tbl_cierrehojaruta, $cierrehojaruta_collection);

		$render = str_replace('{tbl_cierrehojaruta}', $gui_tbl_cierrehojaruta, $gui);
		$render = $this->render_breadcrumb($render);
		$template = $this->render_template($render);
		print $template;
	}

	function consultar($detallecierrehojaruta_collection, $obj_cierrehojaruta) {
		$gui = file_get_contents("static/modules/cierrehojaruta/consultar.html");
		$gui_tbl_detallecierrehojaruta = file_get_contents("static/modules/cierrehojaruta/tbl_detallecierrehojaruta.html");
		$gui_tbl_detallecierrehojaruta = $this->render_regex_dict('TBL_DETALLECIERREHOJARUTA', $gui_tbl_detallecierrehojaruta, $detallecierrehojaruta_collection);

		$obj_cierrehojaruta->rendicion = number_format($obj_cierrehojaruta->rendicion, 2, ',', '.');
		$obj_cierrehojaruta = $this->set_dict($obj_cierrehojaruta);

		$render = str_replace('{tbl_detallecierrehojaruta}', $gui_tbl_detallecierrehojaruta, $gui);
		$render = $this->render($obj_cierrehojaruta, $render);
		$render = $this->render_breadcrumb($render);
		$template = $this->render_template($render);
		print $template;
	}	
}
?>