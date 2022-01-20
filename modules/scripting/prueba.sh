#!/bin/bash

##EJECUTO CONSULTA SQL Y LA GUARDO EN VARIABLE
OIFS="$IFS" ; IFS=$'\n' ; oset="$-" ; set -f
while IFS=$OIFS read -a line 
do
	pedido_id=${line[0]}
	#wget -q -O - "https://www.distribucionesnorte.com.ar/norte_distribuciones/pedidovendedor/proceso_lote/$pedido_id"
	echo "$pedido_id"
done < <(mysql -u Takodana -pn0rt3d15tr1buc10n35 dh.tordo.prod -h localhost -N < getPedidoVendedor.sql &)

exit