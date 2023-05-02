/* 1 - Escreva uma query que retorne:
 a) O nome da organização que foi fundada por ultimo
*/

SELECT o.nome
FROM organizacao o
WHERE o.data_fundacao = (SELECT MAX(data_fundacao) FROM organizacao)

/* 1 - Escreva uma query que retorne:
 b) O nome do colaborador com salário maior
*/

SELECT c.nome
FROM colaborador c
WHERE c.salario = (SELECT MAX(salario) FROM colaborador)

/* 1 - Escreva uma query que retorne:
  c) O nome e data de nascimento dos colaboradores ordenada por salário, do maior para o menor.
*/
SELECT c.nome,  c.data_nascimento
FROM colaborador c
ORDER BY salario DESC

/* 1 - Escreva uma query que retorne:
  d) A idade dos colaboradoes
*/

SELECT c.nome, YEAR(CURDATE()) - YEAR(c.data_nascimento) - 
    CASE WHEN MONTH(CURDATE()) < MONTH(c.data_nascimento) OR 
              (MONTH(CURDATE()) = MONTH(c.data_nascimento) AND 
              DAY(CURDATE()) < DAY(c.data_nascimento)) 
        THEN 1 
        ELSE 0 
    END AS idade 
FROM colaborador c;