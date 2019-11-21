DROP DATABASE games_com;

CREATE DATABASE games_com;

USE games_com;

/** CRIANDO A TABELA CATEGORIA **/
CREATE TABLE categoria (
	cod_categoria INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_categoria VARCHAR(50) NOT NULL
);

/** CRIANDO A TABELA GENERO **/
CREATE TABLE genero (
	cod_genero INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_genero VARCHAR(50) NOT NULL
);

/** CRIANDO A TABELA PRODUTO**/
CREATE TABLE produto (
	cod_produto INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_prod VARCHAR(50) NOT NULL,
	codigobarra VARCHAR(14),
	descricao_prod VARCHAR(250),
	valor_un DECIMAL(6,2) NOT NULL,
	cover_img VARCHAR(250),
	banner_img VARCHAR(250),
	estoque INT,
	cod_categoria INT NOT NULL,
	cod_genero INT NOT NULL,
	destaque TINYINT NOT NULL DEFAULT 0,
	promocao TINYINT DEFAULT 0,
	valor_promocao DECIMAL(6,2),
	data_lancamento DATE
);

/**ADICIONANDO AS CHAVES ESTRANGEIRAS DA TABELA PRODUTO**/
ALTER TABLE produto
	ADD CONSTRAINT FK_produto_categoria FOREIGN KEY (cod_categoria) REFERENCES categoria(cod_categoria),
	ADD CONSTRAINT FK_produto_genero FOREIGN KEY (cod_genero) REFERENCES genero (cod_genero);


/**CRIANDO A TABELA USUARIO **/
CREATE TABLE usuario (
	cod_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_usuario VARCHAR(150) NOT NULL,
	telefone VARCHAR(15),
	cpf VARCHAR(13),
	email VARCHAR(100),
  logim varchar(50),
	senha VARCHAR(255)
);


/**CRIANDO A TABELA DE CLIENTES **/
CREATE TABLE cliente (
	cod_cliente INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nome_cliente VARCHAR(150) NOT NULL,
	telefone VARCHAR(15),
	cpf VARCHAR(13),
	email VARCHAR(100),
	senha VARCHAR(255),
	logradouro VARCHAR(255),
	numero VARCHAR(9),
	uf VARCHAR(2),
	cep VARCHAR(10)
);

/**CRIANDO A TABELA PEDIDO **/
CREATE TABLE pedido (
	cod_pedido INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cod_cliente INT NOT NULL,
	data_pedido DATE NOT NULL, 
	data_entrega DATE,
	valor_pedido DECIMAL(6,2),
  cod_carrinho VARCHAR(50)
);

/**ADICIONANDO AS CHAVES ESTRANGEIRAS DA TABELA PEDIDO**/
ALTER TABLE pedido
	ADD CONSTRAINT FK_pedido_cliente FOREIGN KEY (cod_cliente) REFERENCES cliente(cod_cliente);



/**CRIANDO A TABELA PEDIDO_ITEM **/
CREATE TABLE pedido_item (
	cod_pedido INT NOT NULL, 
	cod_produto INT NOT NULL,
	valor_item DECIMAL(6,2),
	quantidade INT
);


/**ADICIONANDO AS CHAVES ESTRANGEIRAS DA TABELA PEDIDO_ITEM**/
ALTER TABLE pedido_item
	ADD CONSTRAINT FK_pedidoitem_pedido FOREIGN KEY (cod_pedido) REFERENCES pedido(cod_pedido),
	ADD CONSTRAINT FK_pedidoitem_produto FOREIGN KEY (cod_produto) REFERENCES produto(cod_produto);


/**CRIANDO A TABELA COMENTARIO **/
CREATE TABLE comentario (
	cod_comentario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	cod_cliente INT,
	comentario VARCHAR(255),
	data_comentario DATE,
	data_edit DATE,
	excluido INT DEFAULT 0
);

/**ADICIONANDO AS CHAVES ESTRANGEIRAS DA TABELA COMNETARIO**/
ALTER TABLE comentario
	ADD CONSTRAINT FK_comentario_cliente FOREIGN KEY (cod_cliente) REFERENCES cliente(cod_cliente);


/**CRIANDO A TABELA FAVORITO **/
CREATE TABLE favorito (
cod_favorito INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
cod_produto INT,
cod_cliente INT 
);



/**ADICIONANDO AS CHAVES ESTRANGEIRAS DA TABELA FAVORITOO**/
ALTER TABLE favorito
	ADD CONSTRAINT FK_favoritoo_cliente FOREIGN KEY (cod_cliente) REFERENCES cliente(cod_cliente),
	ADD CONSTRAINT FK_favoritoo_produto FOREIGN KEY (cod_produto) REFERENCES produto(cod_produto);





/**ADCIOANDO ITENS PARA TESTE **/
INSERT INTO categoria (nome_categoria) 
VALUES ("Playstation"),("Xbox"),("Nintendo");

INSERT INTO genero (nome_genero)
VALUE ("corrida"),("luta"),("Aventura");

INSERT INTO produto (nome_prod, codigobarra, descricao_prod, valor_un,cover_img, banner_img ,	estoque , cod_categoria,
	cod_genero, destaque , promocao , valor_promocao, data_lancamento)
	VALUES("Grid","789123456","Com o Grid seu conceito de corrida ira mudar",119.90,"grid-ps4.jpg","GRID-PS4-banner.jpg",10,1,1,1,1,99.99,'2019-10-19'),
        ("Grid","789123456","Com o Grid seu conceito de corrida ira mudar",119.90,"grid-ps4.jpg","GRID-PS4-banner.jpg",10,1,1,1,1,99.99,'2019-10-19'),
        ("Grid","789123456","Com o Grid seu conceito de corrida ira mudar",119.90,"grid-ps4.jpg","GRID-PS4-banner.jpg",10,1,1,1,1,99.99,'2019-10-19'),
        ("Grid","789123456","Com o Grid seu conceito de corrida ira mudar",119.90,"grid-ps4.jpg","GRID-PS4-banner.jpg",10,1,1,1,1,99.99,'2019-10-19'),
        ("Forza Horizon 4","789123456","Forza Horizon 4 é um jogo de corrida em mundo aberto desenvolvido pela Playground Games em colaboração com a Turn 10 e publicado pela Xbox Game Studios, que na época do lançamento ainda era conhecida como Microsoft Studios.",149.90,"forza-horizon-xbox.jpg","forza-horizon-banner.jpg",10,2,1,1,0,NULL,'2019-10-1'),
        ("Forza Horizon 4","789123456","Forza Horizon 4 é um jogo de corrida em mundo aberto desenvolvido pela Playground Games em colaboração com a Turn 10 e publicado pela Xbox Game Studios, que na época do lançamento ainda era conhecida como Microsoft Studios.",149.90,"forza-horizon-xbox.jpg","forza-horizon-banner.jpg",10,2,1,1,0,NULL,'2019-10-1'),
			  ("Grid","789123456","Com o Grid seu conceito de corrida ira mudar",119.90,"grid-ps4.jpg","GRID-PS4-banner.jpg",10,1,1,1,0,NULL,'2019-10-19'),
	      ("Forza Horizon 4","789123456","Forza Horizon 4 é um jogo de corrida em mundo aberto desenvolvido pela Playground Games em colaboração com a Turn 10 e publicado pela Xbox Game Studios, que na época do lançamento ainda era conhecida como Microsoft Studios.",149.90,"forza-horizon-xbox.jpg","forza-horizon-banner.jpg",10,2,1,1,0,NULL,'2019-10-1'),
	      ("Death Stranding","789123456","Death Stranding é um jogo eletrônico de ação desenvolvido pela Kojima Productions e publicado pela Sony Interactive Entertainment. Foi lançado no dia 8 de novembro de 2019 para PlayStation 4",229.00,"death-stranding-ps4.jpg","death-stranding-ps4-banner.jpg",10,1,3,1,0,NULL,'2019-11-8'),
	      ("Death Stranding","789123456","Death Stranding é um jogo eletrônico de ação desenvolvido pela Kojima Productions e publicado pela Sony Interactive Entertainment. Foi lançado no dia 8 de novembro de 2019 para PlayStation 4",229.00,"death-stranding-ps4.jpg","death-stranding-ps4-banner.jpg",10,1,3,1,0,NULL,'2019-11-8'),
	      ("Death Stranding","789123456","Death Stranding é um jogo eletrônico de ação desenvolvido pela Kojima Productions e publicado pela Sony Interactive Entertainment. Foi lançado no dia 8 de novembro de 2019 para PlayStation 4",229.00,"death-stranding-ps4.jpg","death-stranding-ps4-banner.jpg",10,1,3,1,0,NULL,'2019-11-8'),
        ("Mario+Rabbits","789123456","Mario + Rabbids Kingdom Battle é um RPG eletrônico baseado em turnos desenvolvido e distribuído pela Ubisoft. É um crossover da franquia Mario, da Nintendo, e da franquia Raving Rabbids, da Ubisoft, que foi lançada mundialmente em agosto de 2017.",249.90,"mario-rabbits-switch.jpg","MarioAndRabbidsKingdomBattl_banner.jpg",10,3,1,1,0,NULL,'2019-10-1'),
        ("Mario+Rabbits","789123456","Mario + Rabbids Kingdom Battle é um RPG eletrônico baseado em turnos desenvolvido e distribuído pela Ubisoft. É um crossover da franquia Mario, da Nintendo, e da franquia Raving Rabbids, da Ubisoft, que foi lançada mundialmente em agosto de 2017.",249.90,"mario-rabbits-switch.jpg","MarioAndRabbidsKingdomBattl_banner.jpg",10,3,1,1,0,NULL,'2019-10-1');


