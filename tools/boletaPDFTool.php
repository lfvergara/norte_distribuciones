<?php
use Dompdf\Dompdf;
require_once 'common/libs/dompdf/autoload.inc.php';


class BoletaPDF extends View {

    public function boleta_testigo($ingresodetalle_collection, $obj_ingreso) {
        $gui_html = file_get_contents("static/common/plantillas_facturas/boleta_testigo.html");

        $obj_proveedor = $obj_ingreso->proveedor;
        unset($obj_ingreso->proveedor, $obj_proveedor->infocontacto_collection);

        $ingreso_id = $obj_ingreso->ingreso_id;
        $obj_proveedor->condicioniva = $obj_proveedor->condicioniva->denominacion;

        $obj_ingreso->punto_venta = str_pad($obj_ingreso->punto_venta, 4, '0', STR_PAD_LEFT);
        $obj_ingreso->numero_factura = str_pad($obj_ingreso->numero_factura, 8, '0', STR_PAD_LEFT);
        $obj_ingreso = $this->set_dict($obj_ingreso);
        $obj_proveedor = $this->set_dict($obj_proveedor);

        $new_array = array_chunk($ingresodetalle_collection, 14);
        $contenido = '';
        foreach ($new_array as $ingresodetalle_array) {
            $gui_notacreditoNC = file_get_contents("static/common/plantillas_facturas/boleta.html");
            $gui_tbl_notacreditoNC = file_get_contents("static/common/plantillas_facturas/tbl_notacreditoNC.html");
            $gui_tbl_notacreditoNC = $this->render_regex_dict('TBL_NOTACREDITODETALLE', $gui_tbl_notacreditoNC, $ingresodetalle_collection);

            $gui_notacreditoNC = $this->render($obj_ingreso, $gui_notacreditoNC);
            $gui_notacreditoNC = $this->render($obj_proveedor, $gui_notacreditoNC);
            $gui_notacreditoNC = str_replace('{tbl_notacreditodetalle}', $gui_tbl_notacreditoNC, $gui_notacreditoNC);

            $contenido .= $gui_notacreditoNC;
        }

        $gui_html = str_replace('{contenido}', $contenido, $gui_html);
        $dompdf = new Dompdf();
        $dompdf->set_paper("A4", "portrait");
        $dompdf->load_html($gui_html);
        $dompdf->render();
        $dompdf->stream("NotaCredito.pdf");
        exit;
    }
}
?>