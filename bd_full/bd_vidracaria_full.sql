-- Criacao do Banco De dados--------------------------
CREATE DATABASE IF NOT EXISTS `bd_vidracaria`
	DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `bd_vidracaria`;
   
-- Criação da Estrutura da tabela cor-----------
CREATE TABLE `tb_cor`(
 `id_cor` INT(11) NOT NULL,
 `sigla_cor` VARCHAR(4) NOT NULL,
 `rotulo_cor` VARCHAR(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    
-- Inserindo dados na Tabela cor--------------
INSERT INTO `tb_cor`(`id_cor`,`sigla_cor`,`rotulo_cor`)	
   VALUES
	(1,'BC','Branco'),
	(2,'FC','Fosco'),
    (3,'PT','Preto'),
    (4,'CR','Cromado'),
    (5,'BZ','Bronze'),
    (6,'INC','Incolor'),
    (7,'VD','Verde'),
    (8,'FU','Fumê');
        
  
  -- Estrutura da tabela espessura--------------------------
CREATE TABLE IF NOT EXISTS `tb_espessura`(
	`id_espessura` INT(11) NOT NULL,
    `sigla_espessura` VARCHAR(8) NOT NULL,
    `rotulo_espessura` VARCHAR(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;
    
-- Inserindo dados na Tabela espessura-----------------------
INSERT INTO `tb_espessura`(`id_espessura`,`sigla_espessura`,`rotulo_espessura`)
  VALUES
	(1,'3/4','3mm'),
	(2,'3/4','6mm'),
    (3,'3/4','8mm'),
    (4,'3/4','10mm'),
    (5,'3/4','19mm'),
    (6,'5x5','50mm'),
    (7,'10x10','100mm');
       
   
-- Criação da Estrutura da tabela unidades-------------------
CREATE TABLE IF NOT EXISTS `tb_unidade`(
  `id_unidade` INT(11) NOT NULL,
  `sigla_unidade` VARCHAR(4) NOT NULL,
  `rotulo_unidade` VARCHAR(15) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;
    
-- Inserindo dados na Tabela unidades------------------------
INSERT INTO `tb_unidade`(`id_unidade`,`sigla_unidade`,`rotulo_unidade`)	
   VALUES
	(1,'M²','metro quadrado'),
	(2,'ML','metro linear'),
    (3,'BR','barra'),
    (4,'UN','unidade');
        

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
CREATE TABLE  IF NOT EXISTS `tb_colaborador` ( 
	`id_colaborador` INT(11) NOT NULL,
    `nome_colaborador` VARCHAR(80) NOT NULL,
    `tel_cel_colaborador` VARCHAR(14) NOT NULL,
    `tel_fixo_colaborador` VARCHAR(14) NOT NULL,
    `email_colaborador` VARCHAR(80) NOT NULL,
    `rg_colaborador` VARCHAR(9) NOT NULL,
    `cpf_colaborador` VARCHAR(11) NOT NULL,
    `rua_colaborador` VARCHAR(80) NOT NULL,
	`numero_casa_colaborador` VARCHAR(10) NOT NULL,
	`bairro_colaborador` VARCHAR(80) NOT NULL,
	`ref_colaborador` VARCHAR(80) NOT NULL,
	`cidade_colaborador` VARCHAR(80) NOT NULL,
	`uf_colaborador` VARCHAR(2) NOT NULL,
    `data_nasci_colaborador` DATETIME,
    `data_admissao_colaborador` DATETIME,
	`login_colaborador` VARCHAR(30) NOT NULL, 
	`senha_colaborador` VARCHAR(10) NOT NULL, 
	`nivel_colaborador` enum('adm','comum') NOT NULL,
    `status_colaborador`enum('Ativo','Desativado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

-- Inserindo Dados na Tabela colaborador------------------------
INSERT INTO `tb_colaborador` 
	(`id_colaborador`,`nome_colaborador`,`tel_cel_colaborador`,`tel_fixo_colaborador`,`email_colaborador`,`rg_colaborador`,`cpf_colaborador`,`rua_colaborador`,`numero_casa_colaborador`,`bairro_colaborador`,`ref_colaborador`,`cidade_colaborador`,`uf_colaborador`,`data_nasci_colaborador`,`data_admissao_colaborador`,`login_colaborador`,`senha_colaborador`,`nivel_colaborador`,`status_colaborador`) 
VALUES
	(1,'claudio Milton da Silva','15991628233','1535371625','claudioalinefilhos@gmail.com','430000000','3100000000','major da fonserca campos taubate','1500','jardim Leonel','proximo ao mercado do balão','itapetininga','sp',23121984,04122022,'claudiomilton',123,'adm','Ativo'),
	(2,'aline de fatima da cruz almeida','15996484601','1535371625','claudioalinefilhos@gmail.com','430000000','3100000000','major da fonserca campos taubate','1500','jardim Leonel','proximo ao mercado do balão','itapetininga','sp',23121984,04122022,'alinesilva',123,'adm','Ativo');
		
	
-- Adicionar Chave Primária-----------------------------------
ALTER TABLE `tb_categoria`
	ADD PRIMARY KEY (`id_categoria`),
	MODIFY `id_categoria` INT(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;  

ALTER TABLE `tb_colaborador`
	ADD PRIMARY KEY `id_colaborador_pk`(`id_colaborador`),
	ADD UNIQUE KEY `login_colaborador_uniq`(`login_colaborador`),
	MODIFY `id_colaborador` INT(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
    
ALTER TABLE `tb_cor`
	ADD PRIMARY KEY (`id_cor`),
	MODIFY `id_cor` INT(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;  
    
ALTER TABLE `tb_unidade`
	ADD PRIMARY KEY (`id_unidade`),
	MODIFY `id_unidade` INT(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;  
    
ALTER TABLE `tb_espessura`
	ADD PRIMARY KEY (`id_espessura`),
	MODIFY `id_espessura` INT(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8; 
    
-- Criacao da Estrutura tabela produtos------------------------------------
CREATE TABLE IF NOT EXISTS `tb_produtos` (
  	`id_produto` INT(11) NOT NULL,
	`id_unidade_produto` INT(11) NOT NULL,
    `id_espessura_produto` INT(11) NOT NULL,
	`id_cor_produto` INT(11) NOT NULL,
	`id_categoria_produto` INT(11) NOT NULL,
    `codigo_produto` VARCHAR(15) NOT NULL, 
    `descri_produto` VARCHAR(100) NOT NULL, 
    `fabricante_produto` VARCHAR (20) NOT NULL,
    `custo_produto` DECIMAL(9,2) NOT NULL,
    `venda_produto` DECIMAL(9,2) NOT NULL,
    `fornecedor_produto` VARCHAR (20) NOT NULL,
    `imagem_produto` VARCHAR(50) NOT NULL, 
    `destaque_produto` ENUM('Sim','Não') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
     
ALTER TABLE `tb_produtos`
	ADD PRIMARY KEY (`id_produto`),
	MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,
	ADD CONSTRAINT `id_unidade_produto_fk` FOREIGN KEY (`id_unidade_produto`)
		REFERENCES `tb_unidade` (`id_unidade`)
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
	ADD CONSTRAINT `id_espessura_produto_fk` FOREIGN KEY (`id_espessura_produto`)
		REFERENCES `tb_espessura` (`id_espessura`)
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
	ADD CONSTRAINT `id_cor_produto_fk` FOREIGN KEY (`id_cor_produto`)
		REFERENCES `tbcor` (`id_cor`)
			ON DELETE NO ACTION
			ON UPDATE NO ACTION,
	ADD CONSTRAINT `id_categoria_produto_fk` FOREIGN KEY (`id_categoria_produto`)
		REFERENCES `tb_categoria` (`id_categoria`)
			ON DELETE NO ACTION
			ON UPDATE NO ACTION; 
        
-- Inserindo dados na Tabela produtos---------------
 INSERT INTO `tb_produtos` (`id_produto`,`id_unidade_produto`,`id_espessura_produto`,`id_cor_produto`,`id_categoria_produto`,`codigo_produto`,`descri_produto`,`fabricante_produto`,`custo_produto`,`venda_produto`,`fornecedor_produto`,`imagem_produto`,`destaque_produto`)
 VALUES
    ('VTI4','Vidro temperado incolor 4mm','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('VTV4','Vidro temperado VERDE 4mm','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('VTI6','Vidro temperado incolor 6mm','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('VTV6','Vidro temperado VERDE 6mm','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('AL1523','TRINCO SUPERIOR PARA BASCULANTE','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('AL1335','TRINCP PARA PORTA PIVOTANTE','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('CG-25','CORRRIMÃO PANORAMICO','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('BCC-02','TRILHO SUPERIOR','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	('GUA-00','BARRACHA PARA VIDRO FIXO','real temper','105.00','150.00','fast vidros','incolor.jpg','Sim');
    

-- Criando a view `vw_tbprodutos`-----------------------------
CREATE VIEW `vw_tbprodutos` AS
	SELECT	p.codigo_produto,
			p.descri_produto,
            cor.rotulo_cor,
            e.rotulo_espessura,
            u.sigla_unidade,
            c.rotulo_categoria,
            p.fabricante_produto,
            p.custo_produto,
            p.venda_produto,
            p.fornecedor_produto,
            p.imagem_produto,
            p.destaque_produto
	FROM 	tb_produtos p 
    INNER join tb_cor cor ON p.id_cor_produto = cor.id_cor
    INNER JOIN tb_categoria c ON P.id_categoria_produto = c.id_categoria
    INNER join tb_unidade u ON p.id_unidade_produto = u.id_unidade
    INNER join tb_espessura e ON p.id_unidade_produto = e.id_espessura; 