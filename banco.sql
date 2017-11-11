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
    usuario_email           VARCHAR(50) NOT NULL DEFAULT "email@email.com",
    usuario_criacao         TIMESTAMP NOT NULL DEFAULT NOW(),
    usuario_senha           VARCHAR(255) NOT NULL,
    permissao_codigo          INTEGER,
    FOREIGN KEY (permissao_codigo) REFERENCES PERMISSAO(permissao_codigo)
);

CREATE TABLE IF NOT EXISTS PRODUTO(
    produto_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    produto_nome            VARCHAR(50) NOT NULL DEFAULT "Nome do produto",
    produto_descricao       TEXT NOT NULL,
    produto_img             TEXT NOT NULL,
    produto_preco           DOUBLE NOT NULL DEFAULT 0.0,
    produto_quantidade      INTEGER NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS GERENTE(
    gerente_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario_codigo          INTEGER NOT NULL,
    FOREIGN KEY (usuario_codigo) REFERENCES USUARIO(usuario_codigo)
);

CREATE TABLE IF NOT EXISTS PRODUTO_SAIDA(
    produto_codigo          INTEGER NOT NULL,
    produto_saida_data      DATETIME,
    FOREIGN KEY(produto_codigo) REFERENCES PRODUTO(produto_codigo)
);

CREATE TABLE IF NOT EXISTS PRODUTO_ENTRADA(
    produto_codigo          INTEGER NOT NULL,
    produto_entrada_data    DATETIME,
    FOREIGN KEY(produto_codigo) REFERENCES PRODUTO(produto_codigo)
);
