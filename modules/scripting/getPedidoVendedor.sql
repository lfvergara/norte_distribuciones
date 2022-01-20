SELECT
	pv.pedidovendedor_id,
	pv.importe_total
FROM
	pedidovendedor pv
WHERE
	pv.estadopedido IN (1,4) AND
	pv.vendedor_id = 2
