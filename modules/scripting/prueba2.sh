#!/bin/bash

##EJECUTO CONSULTA SQL Y LA GUARDO EN VARIABLE
echo "Hola"

pedidos_ids=$(mysql --user="root" --password="Dandoran$16" --database="dh.tordo.prod" --execute="SELECT pv.pedidovendedor_id FROM pedidovendedor pv WHERE pv.estadopedido IN (1,4) AND pv.vendedor_id = 2;")
for id in "$pedidos_ids"
do
	echo "$id"
done

exit