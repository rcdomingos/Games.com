<?php

/*********************************************************
 * MODEL PRODUTO - FUNÇÕES USADAS NA PARTE DE PRODUTOS
 * DESENV - Reginaldo,Renata,Thais
 *********************************************************/

/**FUNÇÃO PARA CARREGAR OS DETALHES DO PRODUTO */
function listarProduto($produto, $conn)
{
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img,p.banner_img, p.valor_un, p.data_lancamento,  
  p.promocao,p.valor_promocao,p.estoque,g.nome_genero, c.nome_categoria FROM produto p INNER JOIN genero g 
  ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria
  WHERE p.cod_produto = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $produto);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}

/**FUNÇÃO PARA LISTAR TODOS OS PRODUTO */
function carregarJogos($conn)
{
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.valor_un, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria 
    ORDER BY p.nome_prod ASC ";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

/**FUNÇÃO PARA PESQUISAR O JOGO DO CAMPO PESQUISA */
function pesquisarJogo($conn, $jogoPesquisa)
{
    $jogoPesquisa = "%" . $jogoPesquisa . "%";
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.valor_un, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria 
    WHERE p.nome_prod LIKE ? ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $jogoPesquisa);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    // $result = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $result;
}



/* FUNÇÃO PARA CADASTRAR GENERO DOS PRODUTOS  ||  THAIS M */
function cadastargenero($dados, $conn)
{
    $valores = $dados;
    $sql = 'INSERT INTO genero (nome_genero) VALUES(?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $valores['nome_genero']);
    // $stmt->execute();
    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
}

/* FUNÇÃO PARA LISTAR GENERO  || THAIS M */
function listargenero($conn)
{
    $sql = 'SELECT cod_categoria, nome_categoria FROM categoria';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

/* FUNÇÃO PARA CADASTRAR CATEGORIA DOS PRODUTOS   ||  THAIS M */
function cadastrarcategoria($dados, $conn)
{
    $valores = $dados;
    $sql = 'INSERT INTO categoria (nome_categoria) VALUES(?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $valores['nome_categoria']);
    // $stmt->execute();
    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
}

/* FUNÇÃO PARA LISTAR CATEGORIA  ||  THAIS M */
function listarcategoria($conn)
{
    $sql = 'SELECT cod_categoria, nome_categoria FROM categoria';
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

/* FUNÇÃO PARA FAZER UM SELECT E LISTAR OS GENEROS E CATEGORIAS  ||  THAIS M */
function listagenero($dados, $conn)
{
    $valores = $dados;
    $sql = 'SELECT cod_genero FROM genero WHERE nome_genero = nome_genero ';
}

/* FUNÇÃO PARA CADASTRAR PRODUTOS  ||  THAIS M*/
function cadastarproduto($dados, $conn)
{
    $valores = $dados;
    $sql = 'INSERT INTO produto (nome_produto, codigobarra, descricao_prod, valor_un, cover_img, banner_img, estoque, destaque, cod_categoria, cod_genero, data_lancamento) VALUES(?,?,?,?,?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdssiid", $valores['nome_produto'], $valores['codigobarra'], $valores['descricao_prod'], $valores['valor_un'], $valores['cover_img'], $valores['banner_img'], $valores['estoque'], $valores['destaque'], $valores['cod_categoria'], $valores['cod_genero'], $valores['data_lancamento']);
    // $stmt->execute();
    $result = $stmt->execute() ? true : false;
    $stmt->close();

    return $result;
}


/* LISTAR NA INDEX OS PRODUTOS || THAIS M */
function listarprodutos($conn)
{
    $sql = "SELECT p.cod_produto, p.nome_prod,g.nome_genero, c.nome_categoria, p.estoque 
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria ORDER BY p.nome_prod ASC ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}

/**FUNÇÃO PARA LISTAR OS PRODUTOS DE ACORDO COM A CATEGORIA */
function carregarJogosCategoria($conn, $codCategoria)
{
    $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.valor_un, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria 
    WHERE p.cod_categoria = ? ORDER BY p.nome_prod ASC ";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $codCategoria);

    $stmt->execute();
    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $result;
}
