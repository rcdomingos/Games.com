<?php

/*********************************************************
 * MODEL PRODUTO - FUNÇÕES USADAS NA PARTE DE PRODUTOS
 * DESENV - Reginaldo,Renata,Thais
 *********************************************************/

/**FUNÇÃO PARA CARREGAR OS DETALHES DO PRODUTO */
function listarProduto($produto, $conn)
{
  $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img,p.banner_img, p.valor_un, p.data_lancamento,  
  p.promocao, p.valor_promocao,p.estoque,g.nome_genero, c.nome_categoria FROM produto p INNER JOIN genero g 
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
function carregarJogos($conn, $limit = 12, $offset = 0)
{
  $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.valor_un, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria 
    ORDER BY p.nome_prod ASC LIMIT ? OFFSET ? ";

  //$offset = 0;
  //$limit = 12;

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ii", $limit, $offset);
  $stmt->execute();

  // $data = $stmt->get_result();
  // $rows = $data->num_rows;
  // $result = $data->fetch_all(MYSQLI_ASSOC);
  // $result['rows'] = $rows;

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


/* ================================================================================ */

/* FUNÇÃO PARA CADASTRAR GENERO DOS PRODUTOS  ||  THAIS M */
function cadastargenero($dados, $conn)
{
  $valores = $dados;
  $sql = 'INSERT INTO genero (nome_genero) VALUES (?)';
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
  $sql = 'SELECT cod_genero, nome_genero FROM genero';
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $result;
}

/* ALTERAR GENERO NO BANCO */
function alterargenero($dados, $conn)
{
  $sql = 'UPDATE genero SET nome_genero = ? WHERE cod_genero = ?';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $dados['nome_genero'], $dados['cod_genero']);
  $result = $stmt->execute() ? true : false;
  $stmt->close();
  return $result;
}

/* ================================================================================ */

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

/* ALTERAR CATEGORIA NO BANCO */
function alterarcategoria($dados, $conn)
{
  $sql = 'UPDATE categoria SET nome_categoria = ? WHERE cod_categoria = ?';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("si", $dados['nome_categoria'], $dados['cod_categoria']);
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
function selectgenero($conn)
{
  $sql = 'SELECT cod_genero, nome_genero FROM genero ';
  // $sql = 'SELECT cod_genero FROM genero ';
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $result;
}

function selectcategoria($conn)
{
  $sql = 'SELECT cod_categoria, nome_categoria FROM categoria ';
  // $sql = 'SELECT cod_genero FROM genero ';
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $result;
}

/* ================================================================================ */

/* FUNÇÃO PARA CADASTRAR PRODUTOS  ||  THAIS M. */
function cadastarproduto($dados, $conn)
{
  $valores = $dados;
  $sql = 'INSERT INTO produto (nome_prod, codigobarra, descricao_prod, valor_un, cover_img, banner_img, estoque, destaque, cod_categoria, cod_genero, data_lancamento) VALUES(?,?,?,?,?,?,?,?,?,?,?)';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssdssiiiis", $valores['nome_prod'], $valores['codigobarra'], $valores['descricao_prod'], $valores['valor_un'], $valores['cover_img'], $valores['banner_img'], $valores['estoque'], $valores['destaque'], $valores['cod_categoria'], $valores['cod_genero'], $valores['data_lancamento']);
  // $stmt->execute();
  $result = $stmt->execute() ? true : false;
  $stmt->close();

  return $result;
  // print_r($_FILES);
  // print_r($dados);
}

/* FUNÇÃO PARA CARREGAR OS DADOS DAS IMAGENS ||  THAIS M. */
function publicarImagem($arquivo)
{
  $data = new DateTime();
  $arquivotemp = $arquivo['tmp_name'];
  $nomeoriginal = $arquivo['name'];
  $nomeproduto = "imagem-" . $data->format('dmY') . $data->format('His') . rand(1, 9999) . pegarExtensão($nomeoriginal);

  if (move_uploaded_file($arquivotemp, SITE_PATH . "/images/produtos/" . $nomeproduto)) {
    return $nomeproduto;
  } else {
    return false;
  }
}

function pegarExtensão($nome)
{
  return strrchr($nome, ".");
}


/* LISTAR NA INDEX OS PRODUTOS || THAIS M */
function carregarprodutos($conn)
{
  $sql = "SELECT p.cod_produto, p.nome_prod,g.nome_genero, c.nome_categoria, p.estoque 
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria ORDER BY p.nome_prod ASC ";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $result;
}


/* FUNÇÃO PARA CARREGAR OS DADOS DAS IMAGENS PARA ALTERARÇÃO ||  THAIS M. */
function alterImagem($arquivo)
{
  $data = new DateTime();
  $arquivotemp = $arquivo['tmp_name'];
  $nomeoriginal = $arquivo['name'];
  $nomeproduto = "imagem-" . $data->format('dmY') . $data->format('His') . rand(1, 9999) . alterpegarExtensão($nomeoriginal);

  if (move_uploaded_file($arquivotemp, SITE_PATH . "/images/produtos/" . $nomeproduto)) {
    return $nomeproduto;
  } else {
    return false;
  }
}

function alterpegarExtensão($nome)
{
  return strrchr($nome, ".");
}

/* FUNÇÃO PARA FAZER O SELECT QUE VAI CARREGAR OS DADOS "VIA $_GET" PARA ALTERAÇÃO DO PRODUTO */
function selectalterarproduto($conn, $cod_produto)
{
  $sql = "SELECT p.nome_prod, p.codigobarra, p.descricao_prod, p.data_lancamento, p.valor_un, p.cover_img, p.banner_img, p.estoque, c.cod_categoria, g.cod_genero, p.destaque, p.promocao, p.valor_promocao
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria WHERE p.cod_produto = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $cod_produto);

  $stmt->execute();

  $result = $stmt->get_result()->fetch_assoc();
  $stmt->close();
  return $result;
  // print_r($result);
}

function alterarproduto($conn, $dados)
{
  // print_r($dados);
  $sql = 'UPDATE produto SET nome_prod = ? , codigobarra = ? , descricao_prod = ?, valor_un = ?, cover_img = ?, banner_img = ?, estoque = ?, cod_categoria = ?, cod_genero = ?, destaque = ?, promocao = ?, valor_promocao = ?, data_lancamento = ?, situacao = ? WHERE cod_produto = ?';
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssdssiiiiidsii", $dados['nome_prod'], $dados['codigobarra'], $dados['descricao_prod'], $dados['valor_un'], $dados['cover_img'], $dados['banner_img'], $dados['estoque'], $dados['cod_categoria'], $dados['cod_genero'], $dados['destaque'], $dados['promocao'], $dados['valor_promocao'], $dados['data_lancamento'], $dados['situacao'], $dados['cod_produto']);
  $result = $stmt->execute() ? true : false;
  $stmt->close();
  return $result;
  // print_r($result);
}

/* FUNÇÃO PARA LISTAR OS PRODUTOS DE ACORDO COM A CATEGORIA */
function carregarJogosCategoria($conn, $codCategoria, $limit = 12, $offset = 0)
{
  $sql = "SELECT  p.cod_produto, p.nome_prod, p.descricao_prod, p.cover_img, p.valor_un, g.nome_genero, c.nome_categoria
    FROM produto p INNER JOIN genero g ON p.cod_genero = g.cod_genero INNER JOIN categoria c ON p.cod_categoria = c.cod_categoria 
    WHERE p.cod_categoria = ? ORDER BY p.nome_prod ASC  LIMIT ? OFFSET ? ";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iii", $codCategoria, $limit, $offset);

  $stmt->execute();
  $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
  return $result;
}
