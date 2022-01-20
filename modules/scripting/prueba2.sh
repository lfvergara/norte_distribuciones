#!/bin/bash

##EJECUTO CONSULTA SQL Y LA GUARDO EN VARIABLE
pedidos_ids=$(mysql  -u Takodana -pn0rt3d15tr1buc10n35 dh.tordo.prod -h localhost -N < getPedidoVendedor.sql &)
for id in "$pedidos_ids"
do
	echo "$id"
done

exit