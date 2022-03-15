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
}
?>