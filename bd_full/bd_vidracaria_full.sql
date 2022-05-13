-- Criacao do Banco De dados--------------------------
CREATE DATABASE IF NOT EXISTS `bd_vidracaria`
	DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `bd_vidracaria`;

-- Criação da Estrutura  tabela categoria-------------------
CREATE TABLE IF NOT EXISTS `tb_categoria`(
  `id_categoria` INT NOT NULL,
  `sigla_categoria` VARCHAR(4) NOT NULL,
  `rotulo_categoria` VARCHAR(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

-- Inserindo dados na Tabela categoria----------------------
INSERT INTO `tb_categoria`(`id_categoria`,`sigla_categoria`,`rotulo_categoria`)
    VALUES
	(1,'VD','Vidro'),
	(2,'AL','Aluminio'),
    (3,'FR','Ferragens'),
    (4,'ACES','Acessorios');


-- Criação da Estrutura da Tabela colaboradores------------------
CREATE TABLE IF NOT EXISTS `tb_colaborador` ( 
	`id_colaborador` INT(11) NOT NULL,
	`login_colaborador` VARCHAR(30) NOT NULL, 
	`senha_colaborador` VARCHAR(10) NOT NULL, 
	`nivel_colaborador` enum('adm','comum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

-- Inserindo Dados na Tabela colaborador------------------------
INSERT INTO `tb_colaborador` 
	(`id_colaborador`,`login_colaborador`,`senha_colaborador`,`nivel_colaborador`) 
VALUES
	(1,'claudiomilton',123,'adm'),
	(2,'alinesilva',123,'adm');
		
	
-- Adicionar Chave Primária-----------------------------------
ALTER TABLE `tb_categoria`
	ADD PRIMARY KEY (`id_categoria`),
	MODIFY `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;  

ALTER TABLE `tb_colaborador`
	ADD PRIMARY KEY (`id_colaborador`),
	ADD UNIQUE KEY `login_colaborador_uniq`(`login_colaborador`),
	MODIFY `id_colaborador` INT(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
    
-- Criacao da Estrutura tabela produtos------------------------------------
CREATE TABLE `tb_produtos` (
  	`id_produto` INT(11) NOT NULL,
    `id_categoria_produto` INT(11) NOT NULL,
    `codigo_produto` VARCHAR(15) NOT NULL,
	`unidade_produto` VARCHAR(15) NOT NULL,
    `espessura_produto` VARCHAR(15) NOT NULL,
	`cor_produto` VARCHAR(15) NOT NULL,
    `descri_produto` VARCHAR(100) NOT NULL, 
    `venda_produto` DECIMAL(9,2) NOT NULL,
    `imagem_produto` VARCHAR(50) NOT NULL, 
    `promo_produto` ENUM('Sim','Não') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     
ALTER TABLE `tb_produtos`
	ADD PRIMARY KEY (`id_produto`),
	MODIFY  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
	ADD CONSTRAINT `id_categoria_produto_fk` FOREIGN KEY (`id_categoria_produto`)
		REFERENCES `tb_categoria` (`id_categoria`)
			ON DELETE NO ACTION
			ON UPDATE NO ACTION; 
        
-- Inserindo dados na Tabela produtos---------------
 INSERT INTO `tb_produtos` (`id_categoria_produto`,`codigo_produto`,`unidade_produto`,`espessura_produto`,`cor_produto`,`descri_produto`,`venda_produto`,`imagem_produto`,`promo_produto`)
 VALUES
    (1,'VTI4','ml','8ml','branco','Vidro temperado incolor 4mm','150.00','incolor.jpg','Sim'),
	(2,'VTV4','ml','8ml','branco','Vidro temperado VERDE 4mm','150.00','incolor.jpg','Sim'),
	(3,'VTI6','ml','8ml','branco','Vidro temperado incolor 6mm','150.00','incolor.jpg','Sim'),
	(4,'VTV6','ml','8ml','branco','Vidro temperado VERDE 6mm','150.00','incolor.jpg','Sim'),
	(1,'AL1523','ml','8ml','branco','TRINCO SUPERIOR PARA BASCULANTE','150.00','incolor.jpg','Sim'),
	(2,'AL1335','ml','8ml','branco','TRINCP PARA PORTA PIVOTANTE','150.00','incolor.jpg','Sim'),
	(3,'CG-25','ml','8ml','branco','CORRRIMÃO PANORAMICO','150.00','incolor.jpg','Sim'),
	(4,'BCC-02','ml','8ml','branco','TRILHO SUPERIOR','150.00','incolor.jpg','Sim'),
	(1,'GUA-00','ml','8ml','branco','BARRACHA PARA VIDRO FIXO','150.00','incolor.jpg','Sim');
    

-- Criando a view `vw_tbprodutos`-----------------------------
CREATE VIEW `vw_tbprodutos` AS
	SELECT	p.codigo_produto,
			p.descri_produto,
            c.rotulo_categoria,
            p.venda_produto,
            p.imagem_produto,
            p.promo_produto
	FROM 	tb_produtos p 
    INNER JOIN tb_categoria c ON P.id_categoria_produto = c.id_categoria