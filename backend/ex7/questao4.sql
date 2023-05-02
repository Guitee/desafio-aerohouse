-- 4) Escreva uma query que encontre a organização que tem o funcionário mais novo

SELECT o.nome as empresa, MAX(c.data_nascimento) as data_nascimento
FROM organizacao o
INNER JOIN colaborador c ON o.id = c.organizacao_id
GROUP BY o.nome
ORDER BY data_nascimento DESC
LIMIT 1