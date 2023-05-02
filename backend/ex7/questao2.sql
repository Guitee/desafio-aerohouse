--  2) Escreva uma query que encontre a organização que paga o maior salário

SELECT organizacao.nome AS empresa, MAX(colaborador.salario) AS maior_salario
FROM colaborador 
INNER JOIN organizacao ON colaborador.organizacao_id = organizacao.id
WHERE colaborador.salario = (SELECT MAX(salario) FROM colaborador)
GROUP BY organizacao.nome;