CREATE TABLE organizacao(
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    data_fundacao DATE NOT NULL,
    PRIMARY KEY(id)
);

INSERT INTO organizacao(nome, data_fundacao) VALUES ('empresa_1', '2020-07-01');
INSERT INTO organizacao(nome, data_fundacao) VALUES ('empresa_2', '1980-05-12');

CREATE TABLE colaborador(
    id INT UNSIGNED AUTO_INCREMENT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    organizacao_id INT UNSIGNED NOT NULL,
    data_nascimento DATE NOT NULL,
    salario DOUBLE(9,2),
    PRIMARY KEY(id),
    FOREIGN KEY (organizacao_id) REFERENCES organizacao (id)
);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Alessandra', '1998-02-06', 5000, 1);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Leandro', '1990-04-09', 1900, 2);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Bruno', '1987-12-08', 1800, 1);

INSERT INTO colaborador(nome, data_nascimento, salario, organizacao_id) 
VALUES('Gustavo', '1995-10-17', 2000, 2);