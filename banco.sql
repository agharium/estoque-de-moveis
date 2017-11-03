-- Sistema de Estoque
-- Código compatível com MySQL Community 5.7.20

CREATE DATABASE IF NOT EXISTS ESTOQUE_EMPRESA;
USE ESTOQUE_EMPRESA;

CREATE TABLE IF NOT EXISTS PERMISSAO(
    permissao_codigo        INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    permissao_nome          VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS USUARIO(
    usuario_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario_nome            VARCHAR(50) NOT NULL,
    usuario_email           VARCHAR(50),
    usuario_criacao         DATE NOT NULL,
    usuario_senha           VARCHAR(255) NOT NULL,
    FOREIGN KEY (permissao_codigo) REFERENCES PERMISSAO(permissao_codigo)
);

CREATE TABLE IF NOT EXISTS PRODUTO(
    produto_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    produto_nome            VARCHAR(50) NOT NULL,
    produto_descricao       TEXT,
    produto_img             TEXT,
    produto_preco           DOUBLE,
    usuario_codigo          INTEGER,
    FOREIGN KEY (usuario_codigo) REFERENCES USUARIO(usuario_codigo)
);

CREATE TABLE IF NOT EXISTS ESTOQUE(
    estoque_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    estoque_quantidade      INTEGER,
    estoque_comentario      TEXT,
    estoque_data            DATE,
    FOREIGN KEY(produto_codigo) REFERENCES PRODUTO(produto_codigo),
    FOREIGN KEY(usuario_codigo) REFERENCES USUARIO(usuario_codigo)
);