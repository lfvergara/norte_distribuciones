#!/bin/bash

##EJECUTO CONSULTA SQL Y LA GUARDO EN VARIABLE
#declare -a pedidos
#var=0
OIFS="$IFS" ; IFS=$'\n' ; oset="$-" ; set -f

while IFS=$OIFS read -a line 
do
#while IFS= read -r line; do
	#declare -A temp_pedidos
 	#temp_pedidos[pedido_id]="${line[0]}"
	#temp_pedidos[total]="${line[1]}"
	#temp_pedidos[ind1]="HOLA"
	#temp_pedidos[ind2]="MUNDO"

	#pedidos[$var]=$temp_pedidos
	#var=$((var+1))

	#pedidos+=([pedido_id]=${line[0]} [total]=${line[1]})
	#pedidos+=$temp_pedidos
 	#echo ${line[0]}

	pedido_id=${line[0]}
	#wget -q -O - "https://www.distribucionesnorte.com.ar/norte_distribuciones/pedidovendedor/consultar/4"
	php-cgi -f /srv/websites/norte_distribuciones/modules/scripting/FacturacionLote.php pedidovendedor=$pedido_id
	echo $pedido_id
done < <(mysql  -u Takodana -pn0rt3d15tr1buc10n35 dh.tordo.prod -h localhost -N < getPedidoVendedor.sql &)


#echo ${pedidos[0]}
#echo ${pedidos[*]}
exit



