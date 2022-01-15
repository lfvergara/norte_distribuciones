SELECT
	pv.pedidovendedor_id,
	pv.importe_total
FROM
	pedidovendedor pv
WHERE
	pv.estadopedido = 4
