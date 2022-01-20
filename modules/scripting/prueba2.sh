#!/bin/bash

##EJECUTO CONSULTA SQL Y LA GUARDO EN VARIABLE
echo "Hola"
pedidos_ids=$(mysql  -u root -pDandoran$16 dh.tordo.prod -h localhost -N < getPedidoVendedor.sql &)
for id in "$pedidos_ids"
do
	echo "$id"
done

exit