-- 3 - Escreva uma query que encontre a média de salários pagos por cada empresa

SELECT o.nome AS empresa, AVG(c.salario) AS media_salario
FROM colaborador c
JOIN organizacao o ON c.organizacao_id = o.id
GROUP BY c.organizacao_id;