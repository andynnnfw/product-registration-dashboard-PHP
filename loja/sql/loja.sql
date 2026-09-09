CREATE DATABASE IF NOT EXISTS loja_etim;
USE loja_etim;

CREATE TABLE produto IF NOT EXISTS(
    id_produto int AUTO_INCREMENT PRIMARY KEY,
    nome_produto varchar(100),
    descricao text,
    valor double
);

CREATE TABLE imagem IF NOT EXISTS(
    id_imagem int AUTO_INCREMENT PRIMARY KEY,
    nome_img varchar(100), 
    fk_id_produto int,
    FOREIGN KEY(fk_id_produto) REFERENCES produto(id_produto)
);