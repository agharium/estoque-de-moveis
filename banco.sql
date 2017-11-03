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
    usuario_criacao         DATE NOT NULL DEFAULT NOW(),
    usuario_senha           VARCHAR(255) NOT NULL,
    gerente_codigo          INTEGER,
    FOREIGN KEY (permissao_codigo) REFERENCES PERMISSAO(permissao_codigo),
    FOREIGN KEY (gerente_codigo) REFERENCES GERENTE(gerente_codigo)
);

CREATE TABLE IF NOT EXISTS PRODUTO(
    produto_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    produto_nome            VARCHAR(50) NOT NULL DEFAULT "Nome do produto",
    produto_descricao       TEXT NOT NULL DEFAULT "Descrição do produto",
    produto_img             TEXT NOT NULL DEFAULT "",
    produto_preco           DOUBLE NOT NULL DEFAULT 0.0,
    produto_quantidade      INTEGER NOT NULL DEFAULT 0,
    usuario_codigo          INTEGER,
    FOREIGN KEY (usuario_codigo) REFERENCES USUARIO(usuario_codigo)
);

CREATE TABLE IF NOT EXISTS GERENTE(){
    gerente_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    usuario_codigo          INTEGER NOT NULL,
    FOREIGN KEY (usuario_codigo) REFERENCES USUARIO(usuario_codigo)
}

/*
    TABELA REMOVIDA
CREATE TABLE IF NOT EXISTS ESTOQUE(
    estoque_codigo          INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    estoque_quantidade      INTEGER,
    estoque_comentario      TEXT,
    estoque_data            DATE,
    FOREIGN KEY(produto_codigo) REFERENCES PRODUTO(produto_codigo),
    FOREIGN KEY(usuario_codigo) REFERENCES USUARIO(usuario_codigo)
);
*/
