-- Criando a view lista de produto--------------------------------------------------
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
    
-- chamando a view-------------------------
      SELECT *
       FROM  vw_tbprodutos       