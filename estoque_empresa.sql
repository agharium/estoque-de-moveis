SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `gerente` (
  `gerente_codigo` int(11) NOT NULL,
  `usuario_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `gerente` (`gerente_codigo`, `usuario_codigo`) VALUES
(1, 1);

CREATE TABLE `permissao` (
  `permissao_codigo` int(11) NOT NULL,
  `permissao_nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `permissao` (`permissao_codigo`, `permissao_nome`) VALUES
(1, 'admin'),
(2, 'acessar,inserir,editar,remover'),
(3, 'acessar,inserir');

CREATE TABLE `produto` (
  `produto_codigo` int(11) NOT NULL,
  `produto_nome` varchar(50) NOT NULL DEFAULT 'Nome do produto',
  `produto_descricao` text NOT NULL,
  `produto_img` text NOT NULL,
  `produto_preco` double NOT NULL DEFAULT '0',
  `produto_quantidade` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `produto` (`produto_codigo`, `produto_nome`, `produto_descricao`, `produto_img`, `produto_preco`, `produto_quantidade`) VALUES
(1, 'Mesa', 'mesa linda', '', 80, 3),
(2, 'Armario', 'armario lindao', '', 400, 3);

CREATE TABLE `produto_entrada` (
  `produto_codigo` int(11) NOT NULL,
  `produto_entrada_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `produto_saida` (
  `produto_codigo` int(11) NOT NULL,
  `produto_saida_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `usuario` (
  `usuario_codigo` int(11) NOT NULL,
  `usuario_nome` varchar(50) NOT NULL,
  `usuario_email` varchar(50) NOT NULL DEFAULT 'email@email.com',
  `usuario_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_senha` varchar(255) NOT NULL,
  `permissao_codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`usuario_codigo`, `usuario_nome`, `usuario_email`, `usuario_criacao`, `usuario_senha`, `permissao_codigo`) VALUES
(1, 'Lucas', 'email@email.com', '2017-11-11 14:29:12', '123', 2);


ALTER TABLE `gerente`
  ADD PRIMARY KEY (`gerente_codigo`),
  ADD KEY `usuario_codigo` (`usuario_codigo`);

ALTER TABLE `permissao`
  ADD PRIMARY KEY (`permissao_codigo`);

ALTER TABLE `produto`
  ADD PRIMARY KEY (`produto_codigo`);

ALTER TABLE `produto_entrada`
  ADD KEY `produto_codigo` (`produto_codigo`);

ALTER TABLE `produto_saida`
  ADD KEY `produto_codigo` (`produto_codigo`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_codigo`),
  ADD KEY `permissao_codigo` (`permissao_codigo`);


ALTER TABLE `gerente`
  MODIFY `gerente_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `permissao`
  MODIFY `permissao_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `produto`
  MODIFY `produto_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `usuario`
  MODIFY `usuario_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `gerente`
  ADD CONSTRAINT `gerente_ibfk_1` FOREIGN KEY (`usuario_codigo`) REFERENCES `usuario` (`usuario_codigo`);

ALTER TABLE `produto_entrada`
  ADD CONSTRAINT `produto_entrada_ibfk_1` FOREIGN KEY (`produto_codigo`) REFERENCES `produto` (`produto_codigo`);

ALTER TABLE `produto_saida`
  ADD CONSTRAINT `produto_saida_ibfk_1` FOREIGN KEY (`produto_codigo`) REFERENCES `produto` (`produto_codigo`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`permissao_codigo`) REFERENCES `permissao` (`permissao_codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
