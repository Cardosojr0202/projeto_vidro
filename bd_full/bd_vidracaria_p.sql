-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/06/2022 às 23:58
-- Versão do servidor: 10.4.22-MariaDB
-- Versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_vidracaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL,
  `sigla_categoria` varchar(4) NOT NULL,
  `rotulo_categoria` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `sigla_categoria`, `rotulo_categoria`) VALUES
(4, 'BXCT', 'BOX CANTO'),
(5, 'BXF1', 'BOX 2FOLHAS'),
(9, 'BXF2', 'BOX 3FOLHAS'),
(10, 'BXF3', 'BOX 4FOLHAS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_colaborador`
--

CREATE TABLE `tb_colaborador` (
  `id_colaborador` int(11) NOT NULL,
  `login_colaborador` varchar(30) NOT NULL,
  `senha_colaborador` varchar(10) NOT NULL,
  `nivel_colaborador` enum('adm','comum') NOT NULL,
  `imagem_colaborador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_colaborador`
--

INSERT INTO `tb_colaborador` (`id_colaborador`, `login_colaborador`, `senha_colaborador`, `nivel_colaborador`, `imagem_colaborador`) VALUES
(1, 'claudio milton', '123', 'adm', 'perfil-1.jpeg'),
(2, 'aline silva', '123', 'comum', 'perfil-2.jpg'),
(3, 'gabriel', '123', 'adm', 'perfil-2.jpg'),
(4, 'Anderson', '123', 'adm', 'perfil-3.png'),
(5, 'maria', '123', 'comum', 'perfil-1.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id_produto` int(11) NOT NULL,
  `codigo_produto` varchar(15) NOT NULL,
  `legenda_produto` varchar(100) NOT NULL,
  `descri_produto` varchar(300) NOT NULL,
  `unidade_produto` varchar(100) NOT NULL,
  `espessura_produto` varchar(100) NOT NULL,
  `cor_produto` varchar(100) NOT NULL,
  `id_categoria_produto` int(11) NOT NULL,
  `venda_produto` decimal(9,2) NOT NULL,
  `imagem_produto` varchar(50) NOT NULL,
  `promo_produto` enum('Sim','Não') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id_produto`, `codigo_produto`, `legenda_produto`, `descri_produto`, `unidade_produto`, `espessura_produto`, `cor_produto`, `id_categoria_produto`, `venda_produto`, `imagem_produto`, `promo_produto`) VALUES
(1, 'BX F2-1800 BCO', 'Box Vidro Incolor, medidas de vão largura 1800mm (milímetros)', 'Box Frontal, modelo padrão 3folhas, sendo 2fixo e 1móvel. Vidro Temperado de Segurança cor Verde , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 1800mm (milímetros).', 'ml', '8mm', 'Verde', 9, '986.18', 'box 3f.jpg', 'Sim'),
(2, 'BX F3 2000 BCO', 'Box Vidro Incolor, medidas de vão largura 2000mm (milímetros)', 'Box Frontal, modelo padrão 3folhas, sendo 2fixo e 2móvel. Vidro Temperado de Segurança cor Incolor , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 2000mm (milímetros).', 'ml', '8mm', 'incolor', 10, '990.00', 'box 4folhas.jpg', 'Sim'),
(3, 'BX F3 2000 BCO', 'Box Vidro Fumê, medidas de vão largura 2000mm (milímetros)', 'Box Frontal, modelo padrão 3folhas, sendo 2fixo e 2móvel. Vidro Temperado de Segurança cor Fumê , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 2000mm (milímetros).', 'br', '8mm', 'Fumê', 10, '1240.00', 'box-vidro-fumê-4-folhas-min.jpg', 'Sim'),
(4, 'BX F3 2000 BCO', 'Box Vidro Verde, medidas de vão largura 2000mm (milímetros)', 'Box Frontal, modelo padrão 3folhas, sendo 2fixo e 2móvel. Vidro Temperado de Segurança cor Verde , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 2000mm (milímetros).', '1', '8mm', 'Verde', 10, '1240.00', 'box 4 folhas.jpg', 'Sim'),
(6, 'BX F1-1500 BCO', 'Box Vidro Pontilhado, medidas de vão largura 1500mm (milímetros)', 'Box Frontal, modelo padrão 2folhas, sendo 1fixo e 1móvel. Vidro Temperado de Segurança cor Pontilhado , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 1500mm (milímetros).', 'un', '8mm', 'Pontilhado ', 5, '1589.08', 'BXF1PONT.jpg', 'Sim'),
(7, 'BX F2-1500 BCO', 'Box Vidro Verde, medidas de vão largura 1800mm (milímetros)', 'Box Frontal, modelo padrão 3folhas, sendo 2fixo e 1móvel. Vidro Temperado de Segurança cor Verde , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 1800mm (milímetros).', 'un', '8mm', 'Verde', 9, '986.18', 'box-de-3-folhas-verde-2.jpg', 'Sim'),
(8, 'BX F2-1500 BCO', 'Box Vidro Incolor, medidas de vão largura 1800mm (milímetros)', 'Box Frontal, modelo padrão 3folhas, sendo 2fixo e 1móvel. Vidro Temperado de Segurança cor Incolor , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 1800mm (milímetros).', 'un', '8mm', 'incolor', 9, '795.57', 'box 3 folhas.jpg', 'Sim'),
(9, 'BX F1-1500 BCO', 'Box Vidro Incolor, medidas de vão largura 1500mm (milímetros)', 'Box Frontal, modelo padrão 2folhas, sendo 1fixo e 1móvel. Vidro Temperado de Segurança cor Incolor , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 1500mm (milímetros).', 'un', '8mm', 'incolor', 5, '685.59', 'BXF1INC.jpeg', 'Não'),
(10, 'BX F1-1500 BCO', 'Box Vidro Verde, medidas de vão largura 1500mm (milímetros)', 'Box Frontal, modelo padrão 2folhas, sendo 1fixo e 1móvel. Vidro Temperado de Segurança cor Verde , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 1500mm (milímetros).', 'UN', '8mm', 'Verde', 5, '846.10', 'BXF1VD.jpg', 'Sim'),
(11, 'BX F1-1500 BCO', 'Box Vidro Fumê, medidas de vão largura 1500mm (milímetros)', 'Box Frontal, modelo padrão 2folhas, sendo 1fixo e 1móvel. Vidro Temperado de Segurança cor Fumê , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 1500mm (milímetros).', 'UN', '8mm', 'brancoFumê', 5, '846.10', 'BXF1PT.jpeg', 'Sim'),
(12, 'BX F2-2000', 'Box Vidro Pontilhado, medidas de vão largura 2000mm (milímetros)', 'Box Frontal, modelo padrão 3folhas, sendo 2fixo e 2móvel. Vidro Temperado de Segurança cor Pontilhado , estrutura de alumínio opcional nas cores branco, preto ou cinza fosco. Altura padrão sendo 1900mm e ideal para vão com largura de 2000mm (milímetros).', 'UN', '8mm', 'Pontilhado', 10, '1690.00', 'box-de-vidro-jateado-frontal.jpg', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vw_tbprodutos`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vw_tbprodutos` (
`id_produto` int(11)
,`codigo_produto` varchar(15)
,`legenda_produto` varchar(100)
,`descri_produto` varchar(300)
,`unidade_produto` varchar(100)
,`espessura_produto` varchar(100)
,`cor_produto` varchar(100)
,`id_categoria_produto` int(11)
,`sigla_categoria` varchar(4)
,`rotulo_categoria` varchar(15)
,`imagem_produto` varchar(50)
,`venda_produto` decimal(9,2)
,`promo_produto` enum('Sim','Não')
);

-- --------------------------------------------------------

--
-- Estrutura para view `vw_tbprodutos`
--
DROP TABLE IF EXISTS `vw_tbprodutos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`iwane047_ti12`@`localhost` SQL SECURITY DEFINER VIEW `vw_tbprodutos`  AS SELECT `p`.`id_produto` AS `id_produto`, `p`.`codigo_produto` AS `codigo_produto`, `p`.`legenda_produto` AS `legenda_produto`, `p`.`descri_produto` AS `descri_produto`, `p`.`unidade_produto` AS `unidade_produto`, `p`.`espessura_produto` AS `espessura_produto`, `p`.`cor_produto` AS `cor_produto`, `p`.`id_categoria_produto` AS `id_categoria_produto`, `c`.`sigla_categoria` AS `sigla_categoria`, `c`.`rotulo_categoria` AS `rotulo_categoria`, `p`.`imagem_produto` AS `imagem_produto`, `p`.`venda_produto` AS `venda_produto`, `p`.`promo_produto` AS `promo_produto` FROM (`tb_produtos` `p` join `tb_categoria` `c` on(`p`.`id_categoria_produto` = `c`.`id_categoria`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Índices de tabela `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  ADD PRIMARY KEY (`id_colaborador`),
  ADD UNIQUE KEY `login_colaborador_uniq` (`login_colaborador`);

--
-- Índices de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_categoria_produto_fk` (`id_categoria_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_colaborador`
--
ALTER TABLE `tb_colaborador`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD CONSTRAINT `id_categoria_produto_fk` FOREIGN KEY (`id_categoria_produto`) REFERENCES `tb_categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
