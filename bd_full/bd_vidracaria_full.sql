-- Criacao do Banco De dados----------------------------------------------------------------
	CREATE DATABASE IF NOT EXISTS bd_vidracaria DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Chamando o Banco de dados-----------------------------------------------------------------
	USE bd_vidracaria;
   
-- Criacao da Estrutura tabela produtos-----------------------------------------------------
	CREATE TABLE IF NOT EXISTS`bd_vidracaria`.`tb_produtos` (
     `id_produto` INT NOT NULL AUTO_INCREMENT, 
     `codigo_produto` VARCHAR(15) NOT NULL , 
     `descri_produto` VARCHAR(100) NOT NULL , 
     `id_unidade_produto` INT NOT NULL,
     `id_espessura_produto` INT NOT NULL,
	 `id_cor_produto` INT NOT NULL,
	 `id_categoria_produto` INT NOT NULL,
     `fabricante_produto` VARCHAR (20) 	NOT NULL,
     `custo_produto` DECIMAL(9,2) NOT NULL ,
     `venda_produto` DECIMAL(9,2) NOT NULL ,
     `fornecedor_produto` VARCHAR (20) NOT NULL,
     `imagem_produto` VARCHAR(50) NOT NULL , 
     `destaque_produto` ENUM('Sim','Não') NOT NULL , 
     PRIMARY KEY (`id_produto`)) ENGINE = InnoDB;
     
      DESCRIBE tb_produtos;
     
-- Inserindo dados na Tabela produtos---------------------------------------------------------
     INSERT INTO `tb_produtos` ( `codigo_produto`,`descri_produto`,`id_unidade_produto`,`id_espessura_produto`,`id_cor_produto`,
     `id_categoria_produto`,`fabricante_produto`,`custo_produto`,`venda_produto`,`fornecedor_produto`,`imagem_produto`, `destaque_produto`)
     VALUES
     ('VTI4','Vidro temperado incolor 4mm',1,1,1,1,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('VTV4','Vidro temperado VERDE 4mm',2,2,2,2,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('VTI6','Vidro temperado incolor 6mm',3,3,3,3,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('VTV6','Vidro temperado VERDE 6mm',4,4,4,4,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('AL1523','TRINCO SUPERIOR PARA BASCULANTE',1,1,1,1,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('AL1335','TRINCP PARA PORTA PIVOTANTE',2,2,2,2,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('CG-25','CORRRIMÃO PANORAMICO',3,3,3,3,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('BCC-02','TRILHO SUPERIOR',1,1,1,1,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim'),
	 ('GUA-00','BARRACHA PARA VIDRO FIXO',2,2,2,4,'real temper','105.00','150.00','fast vidros','incolor.jpg','Sim');
    
SELECT*
FROM tb_produtos;

-- Criação da Estrutura da tabela cor----------------------------------------------------------
	CREATE TABLE IF NOT EXISTS`bd_vidracaria`.`tb_cor`(
	`id_cor` INT NOT NULL AUTO_INCREMENT,
    `sigla_cor` VARCHAR(4) NOT NULL,
    `rotulo_cor` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id_cor`))ENGINE = InnoDB DEFAULT CHARSET=utf8;
    
    DESCRIBE tb_cor;
    
-- Inserindo dados na Tabela cor--------------------------------------------------------------
	INSERT INTO `tb_cor`(`sigla_cor`,`rotulo_cor`)	
    VALUES
		('BC','Branco'),
		('FC','Fosco'),
        ('PT','Preto'),
        ('CR','Cromado'),
        ('BZ','Bronze'),
        ('INC','Incolor'),
        ('VD','Verde'),
        ('FU','Fumê');
        
	 SELECT * 
    FROM tb_cor;
    
  -- Estrutura da tabela espessura--------------------------------------------------------------
	CREATE TABLE IF NOT EXISTS`bd_vidracaria`.`tb_espessura`(
	`id_espessura` INT NOT NULL AUTO_INCREMENT,
    `sigla_espessura` VARCHAR(8) NOT NULL,
    `rotulo_espessura` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id_espessura`))ENGINE = InnoDB DEFAULT CHARSET=utf8;
    
     DESCRIBE tb_espessura;
    
-- Inserindo dados na Tabela espessura---------------------------------------------------------
INSERT INTO `tb_espessura`(`sigla_espessura`,`rotulo_espessura`)	
    VALUES
		(3,'3mm'),
		(6,'6mm'),
        (8,'8mm'),
        (10,'10mm'),
        ('3/4','19mm'),
        ('5x5','50mm'),
        ('10x10','100mm');
       
       SELECT *
    FROM tb_espessura; 
    
-- Criação da Estrutura da tabela unidades----------------------------------------------------
	CREATE TABLE IF NOT EXISTS`bd_vidracaria`.`tb_unidade`(
	`id_unidade` INT NOT NULL AUTO_INCREMENT,
    `sigla_unidade` VARCHAR(4) NOT NULL,
    `rotulo_unidade` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id_unidade`))ENGINE = InnoDB DEFAULT CHARSET=utf8;
    
    DESCRIBE tb_espessura;
    
-- Inserindo dados na Tabela unidades---------------------------------------------------------
	INSERT INTO `tb_unidade`(`sigla_unidade`,`rotulo_unidade`)	
    VALUES
		('M²','metro quadrado'),
		('ML','metro linear'),
        ('BR','barra'),
        ('UN','unidade');
        
         SELECT *
    FROM tb_unidade;

-- Criação da Estrutura  tabela categoria--------------------------------------------------
	CREATE TABLE IF NOT EXISTS`bd_vidracaria`.`tb_categoria`(
	`id_categoria` INT NOT NULL AUTO_INCREMENT,
    `sigla_categoria` VARCHAR(4) NOT NULL,
    `rotulo_categoria` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id_categoria`))ENGINE = InnoDB DEFAULT CHARSET=utf8;
	
    DESCRIBE tb_categoria;


-- Inserindo dados na Tabela categoria------------------------------------------------------
	INSERT INTO `tb_categoria`(`sigla_categoria`,`rotulo_categoria`)	
    VALUES
		('VD','Vidro'),
		('AL','Aluminio'),
        ('FR','Ferragens'),
        ('ACES','Acessorios');
	select *
	from tb_categoria;
    
-- Criação da Estrutura da Tabela colaboradores----------------------------------------------
	CREATE TABLE  IF NOT EXISTS`bd_vidracaria`.`tb_colaborador` ( 
	`id_colaborador` INT NOT NULL AUTO_INCREMENT,
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
    `status_colaborador`enum('Ativo','Desativado') NOT NULL,
    PRIMARY KEY (id_colaborador)) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
    
 DESCRIBE tb_colaborador;

-- Inserindo Dados na Tabela colaborador----------------------------------------------------
INSERT INTO `tb_colaborador` 
	(`nome_colaborador`,`tel_cel_colaborador`,`tel_fixo_colaborador`,`email_colaborador`,`rg_colaborador`,`cpf_colaborador`,`rua_colaborador`,`numero_casa_colaborador`,`bairro_colaborador`,`ref_colaborador`,`cidade_colaborador`,`uf_colaborador`,`data_nasci_colaborador`,`data_admissao_colaborador`,`login_colaborador`,`senha_colaborador`,`nivel_colaborador`,`status_colaborador`) 
	VALUES
		('claudio Milton da Silva','15991628233','1535371625','claudioalinefilhos@gmail.com','430000000','3100000000','major da fonserca campos taubate','1500','jardim Leonel','proximo ao mercado do balão','itapetininga','sp',23121984,04122022,'claudiomilton',123,'adm','Ativo'),
		('aline de fatima da cruz almeida','15996484601','1535371625','claudioalinefilhos@gmail.com','430000000','3100000000','major da fonserca campos taubate','1500','jardim Leonel','proximo ao mercado do balão','itapetininga','sp',23121984,04122022,'alinesilva',123,'adm','Ativo');
SELECT *
FROM tb_colaborador;		
	
-- Adicionar Chave Primária tabela produtos-----------------------------------------------------
	ALTER TABLE `tb_produtos`
	ADD PRIMARY KEY (`id_produto`);

-- Adicionar Chave Primária tabela categoria----------------------------------------------------
	ALTER TABLE `tb_categoria`
	ADD PRIMARY KEY (`id_categoria`);  

-- Adicionar Chave Primária tabela colaborador---------------------------------------------------
	ALTER TABLE `tb_colaborador`
	ADD PRIMARY KEY `id_colaborador_pk`(`id_colaborador`),
	ADD UNIQUE KEY `login_colaborador_uniq`(`login_colaborador`);
    
-- Adicionar Chave Primária tabela cor------------------------------------------------------------
	-ALTER TABLE `tb_cor`
	ADD PRIMARY KEY (`id_cor`);  
    
-- Adicionar Chave Primária tabela unidade------------------------------------------------------------
	ALTER TABLE `tb_unidade`
	ADD PRIMARY KEY (`id_unidade`);  
    
-- Adicionar Chave Primária tabela medidas------------------------------------------------------------
	ALTER TABLE `tb_espessura`
	ADD PRIMARY KEY (`id_espessura`); 
    

-- Caso ja tenha dados adicionado colocar AUTO_INCREMENT= para comecar a auto numeraçao apartir desse id-------------
	ALTER TABLE `tb_produtos`
	MODIFY `id_produto` int NOT NULL AUTO_INCREMENT=10;
  
--  Caso ja tenha dados adicionado colocar AUTO_INCREMENT= para comecar a auto numeraçao apartir desse id------------
	ALTER TABLE `tb_categoria`
	MODIFY `id_categoria` INT NOT NULL AUTO_INCREMENT=1;
   
-- Caso ja tenha dados adicionado colocar AUTO_INCREMENT= para comecar a auto numeraçao apartir desse id-------------
	ALTER TABLE `tb_colaborador`
	MODIFY `id_colaborador` INT NOT NULL AUTO_INCREMENT=3;
    
-- Caso ja tenha dados adicionado colocar AUTO_INCREMENT= para comecar a auto numeraçao apartir desse id-------------
	ALTER TABLE `tb_cor`
	MODIFY `id_cor` INT NOT NULL AUTO_INCREMENT=9;
    
-- Caso ja tenha dados adicionado colocar AUTO_INCREMENT= para comecar a auto numeraçao apartir desse id-------------
	ALTER TABLE `tb_espessura`
	MODIFY `id_espessura` INT NOT NULL AUTO_INCREMENT=8;
    
-- Caso ja tenha dados adicionado colocar AUTO_INCREMENT= para comecar a auto numeraçao apartir desse id--------------
	ALTER TABLE `tb_unidade`
	MODIFY `id_unidade` INT NOT NULL AUTO_INCREMENT=5;
    
    
-- Relação tabela produtos e cor--------------------------------------------------
	ALTER TABLE `tb_produtos`
	ADD CONSTRAINT `id_cor_produto_fk` FOREIGN KEY (`id_cor_produto`)
    REFERENCES `tbcor` (`id_cor`)
		ON DELETE NO ACTION
        ON UPDATE NO ACTION;
    
-- Relação tabela produtos e espessura--------------------------------------------
	ALTER TABLE `tb_produtos`
	ADD CONSTRAINT `id_espessura_produto_fk` FOREIGN KEY (`id_espessura_produto`)
    REFERENCES `tb_espessura` (`id_espessura`)
		ON DELETE NO ACTION
        ON UPDATE NO ACTION;
   
    
-- Relação tabela produtos e unidade-----------------------------------------------
	ALTER TABLE `tb_produtos`
	ADD CONSTRAINT `id_unidade_produto_fk` FOREIGN KEY (`id_unidade_produto`)
    REFERENCES `tb_unidade` (`id_unidade`)
		ON DELETE NO ACTION
        ON UPDATE NO ACTION;
    
    
-- Relação tabela produto e categoria ----------------------------------------------
ALTER TABLE `tb_produtos`
	ADD CONSTRAINT `id_categoria_produto_fk` FOREIGN KEY (`id_categoria_produto`)
    REFERENCES `tb_categoria` (`id_categoria`)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION;  