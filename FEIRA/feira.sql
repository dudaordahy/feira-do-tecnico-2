
-- criando o banco connect --
CREATE DATABASE Connect;

SHOW DATABASES;
USE connect;

-- criando a tabela usuários -- 
CREATE TABLE usuários (id_usuario INT PRIMARY KEY AUTO_INCREMENT, nome VARCHAR(60),
sobrenome VARCHAR(60),  gmail VARCHAR(60), idade INT NOT NULL, id_cep INT NOT NULL);

-- populando a tabela usuários --
INSERT INTO usuários (nome, sobrenome, gmail, idade, id_cep) VALUES ('Maria H', 'Cafarate', 'malenaa2905@gmail.com', '16', '90660570');
INSERT INTO usuários (nome, sobrenome, gmail, idade, id_cep) VALUES ('Valentina', 'Farias', 'valenborbafarias@gmail.com', '17', '90840600');
INSERT INTO usuários (nome, sobrenome, gmail, idade, id_cep) VALUES ('Thaise', 'Souza', 'thaisevillasouza@gmail.com', '17', '90660370');

SHOW tables;
SELECT * FROM usuários;

-- criando a tabela login -- 
CREATE TABLE login (id_user INT PRIMARY KEY AUTO_INCREMENT, user VARCHAR(60), senha VARCHAR(60) NOT NULL);

SELECT * FROM login;

-- criando a tabela preferências -- 
CREATE TABLE preferencias (pf1 VARCHAR(30), pf2 VARCHAR(30), pf3 VARCHAR(30), pf4 VARCHAR(30), pf5 VARCHAR(30), 
pf6 VARCHAR(30),  pf7 VARCHAR(30),  pf8 VARCHAR(30),  pf9 VARCHAR(30),  pf10 VARCHAR(30),  pf11 VARCHAR(30), 
pf12 VARCHAR(30),  pf13 VARCHAR(30),  pf14 VARCHAR(30),  pf15 VARCHAR(30));

SELECT * FROM preferencias;
DROP TABLE preferencias;

-- populando a tabela preferências -- 
INSERT INTO preferencias (pf1, pf2, pf3, pf4, pf5, pf6, pf7, pf8, pf9, pf10, pf11, pf12, pf13, pf14, pf15) VALUES 
('estilo musical', 'esporte', 'cinema', 'gastronomia', 'literatura', 'artesanato', 'trabalho', 'moda', 'jogos online', 'viagem',
 'pets', 'jardinagem', 'tecnologia', 'aventura', 'fotografia');

-- criando a tabela distância -- 
 CREATE TABLE distancia (id_cep INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
 p1 INT NOT NULL, p2 INT NOT NULL, p3 INT NOT NULL, d1 INT NOT NULL, d2 INT NOT NULL, d3 INT NOT NULL);

-- populando a tabela distância -- 
INSERT INTO distancia (p1, p2, p3, d1, d2, d3) VALUES ('5', '10', '15', '20', '25', '30');

SELECT * FROM distancia;
