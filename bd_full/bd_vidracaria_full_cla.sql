-- Criação do Banco De dados----------------------------------------------------------------
	CREATE DATABASE IF NOT EXISTS bd_vidracaria DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

	USE bd_vidracaria;
   
-- Criação da Estrutura tabela produtos----------------------
	CREATE TABLE IF NOT EXISTS`bd_vidracaria`.`tb_produtos` (
     `id_produto` INT NOT NULL AUTO_INCREMENT, 
     `codigo_produto` VARCHAR(15) NOT NULL , 
     `legenda_produto` varchar(100) NOT NULL,
     `descri_produto`  VARCHAR(300) NOT NULL , 
     `unidade_produto` VARCHAR(100) NOT NULL,
     `espessura_produto`  VARCHAR(100)NOT NULL,
	 `cor_produto`  VARCHAR(100) NOT NULL,
	 `id_categoria_produto` INT NOT NULL,
     `venda_produto` DECIMAL(9,2) NOT NULL ,
     `imagem_produto` VARCHAR(50) NOT NULL , 
     `promo_produto` ENUM('Sim','Não') NOT NULL , 
     PRIMARY KEY (`id_produto`)) ENGINE = InnoDB;
     
      DESCRIBE tb_produtos;
     
-- Inserindo dados na Tabela produtos---------------------------------------------
     INSERT INTO `tb_produtos` ( `codigo_produto`,`legenda_produto`,`descri_produto`,`unidade_produto`,`espessura_produto`,`cor_produto`,
     `id_categoria_produto`,`venda_produto`,`imagem_produto`,`promo_produto`)
     VALUES
     ('VTI4','Vidro temperado incolor 4mm','Vidro temperado 4mm suporta peso de até 50kg e na cor incolor tem mais transparencia','ml','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('VTV4','Vidro temperado VERDE 4mm','Vidro temperado 4mm suporta peso de até 50kg e na cor verde tem mais proteção','ml','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('VTI6','Vidro temperado incolor 6mm','Vidro temperado 6mm suporta peso de até 100kg','br','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('VTV6','Vidro temperado VERDE 6mm','Vidro temperado 6mm suporta peso de até 100kg','br','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('AL1523','TRINCO SUPERIOR PARA BASCULANTE','Utilizado como trinco de basculante','un','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('AL1335','TRINCP PARA PORTA PIVOTANTE','Utilizado como trinco de porta na parte inferior','un','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('CG-25','CORRRIMÃO PANORAMICO','Utilizado no guarda corpo uma barra mais reformaçada','un','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('BCC-02','TRILHO SUPERIOR','Utilizado no guarda corpo uma barra mais reformaçada','un','8mm','incolor',1,'150.00','incolor.png','Sim'),
	 ('GUA-00','BARRACHA PARA VIDRO FIXO','em caso de aluminio mais largo que o vidro podemos usar a borracha','un','8mm','incolor',1,'150.00','incolor.png','Sim');
    


-- Criação da Estrutura  tabela categoria------------------------
	CREATE TABLE IF NOT EXISTS`bd_vidracaria`.`tb_categoria`(
	`id_categoria` INT NOT NULL AUTO_INCREMENT,
    `sigla_categoria` VARCHAR(4) NOT NULL,
    `rotulo_categoria` VARCHAR(15) NOT NULL,
    PRIMARY KEY (`id_categoria`))ENGINE = InnoDB DEFAULT CHARSET=utf8;
	
    DESCRIBE tb_categoria;


-- Inserindo dados na Tabela categoria-----------------------------
	INSERT INTO `tb_categoria`(`sigla_categoria`,`rotulo_categoria`)	
    VALUES
		('VD','Vidro'),
		('AL','Aluminio'),
        ('FR','Ferragens'),
        ('ACES','Acessorios');
    
-- Criação da Estrutura da Tabela colaboradores------------------------
	CREATE TABLE  IF NOT EXISTS`bd_vidracaria`.`tb_colaborador` ( 
	`id_colaborador` INT NOT NULL AUTO_INCREMENT,
	`login_colaborador` VARCHAR(30) NOT NULL, 
	`senha_colaborador` VARCHAR(10) NOT NULL, 
	`nivel_colaborador` enum('adm','comum') NOT NULL,
	`imagem_colaborador` VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_colaborador)) ENGINE=InnoDB DEFAULT CHARSET=utf8; 
    
 DESCRIBE tb_colaborador;

-- Inserindo Dados na Tabela colaborador-------------------------
INSERT INTO `tb_colaborador` 
	(`login_colaborador`,`senha_colaborador`,`nivel_colaborador`,`imagem_colaborador`) 
	VALUES
		('claudio milton',123,'adm','perfil-1.jpeg'),
		('aline silva',123,'comum','perfil-2.jpg'),
		('gabriel',123,'comum','perfil-2.jpg'),
		('Anderson',123,'adm','perfil-1.jpeg');		


-- Adicionar Chave Primária tabela colaborador-------------------
	ALTER TABLE `tb_colaborador`
	ADD UNIQUE KEY `login_colaborador_uniq`(`login_colaborador`);
    


-- Caso ja tenha dados adicionado colocar AUTO_INCREMENT= para comecar a auto numeraçao apartir desse id
	ALTER TABLE `tb_produtos`
	MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
  
	ALTER TABLE `tb_categoria`
	MODIFY `id_categoria` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
   
	ALTER TABLE `tb_colaborador`
	MODIFY `id_colaborador` INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
    

	ALTER TABLE `tb_produtos`
		ADD CONSTRAINT `id_categoria_produto_fk` FOREIGN KEY (`id_categoria_produto`)
		REFERENCES `tb_categoria` (`id_categoria`)
		ON DELETE NO ACTION
		ON UPDATE NO ACTION;
        
-- Criando a view lista de produto-----
	CREATE VIEW `vw_tbprodutos` AS
		SELECT	p.id_produto,
				p.codigo_produto,
                p.legenda_produto,
				p.descri_produto,
				p.unidade_produto,
				p.espessura_produto,
				p.cor_produto,
                p.id_categoria_produto,
                c.sigla_categoria,
				c.rotulo_categoria,
				p.imagem_produto,
				p.venda_produto,
				p.promo_produto
		FROM 	tb_produtos p 
		INNER JOIN tb_categoria c ON P.id_categoria_produto = c.id_categoria;      