CREATE DATABASE IF NOT EXISTS store;
USE store;

CREATE TABLE IF NOT EXISTS produto(
    id_produto int AUTO_INCREMENT PRIMARY KEY,
    nome_produto varchar(100),
    descricao text,
    valor double
);

CREATE TABLE IF NOT EXISTS imagem(
    id_imagem int AUTO_INCREMENT PRIMARY KEY,
    nome_img varchar(100), 
    fk_id_produto int,
    FOREIGN KEY(fk_id_produto) REFERENCES produto(id_produto)
);