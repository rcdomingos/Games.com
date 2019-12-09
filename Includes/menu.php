<?php

/**Verificar os itens pendentes no carrinho */
$itPendentes = false;
if (isset($_SESSION['carrinho'])) {
    // var_dump($_SESSION['carrinho']);
    $itPendentes = count($_SESSION['carrinho']);
}

?>
<header class="menu-principal bk-laranja mb-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <a href="<?php echo SITE_URL ?>/Views/home/index.php"><img id="icon-logo"
            src="<?php echo SITE_URL ?>/images/logo.png" alt="Logo do site Games.com"></a>
      </div>
      <div class="col-md-4">
        <!-- caixa de pesquisa dos produto  -->
        <form class="box-search bk-escuro" action="<?php echo SITE_URL ?>/Views/produtos/todos.php" method="get">
          <input class="input-search bk-escuro" type="search" name="pesquisa" id="pesquisa"
            placeholder="Pesquise seu jogo">
          <span>
            <button class="btn-search bk-escuro" type="submit">
              <svg id="icon-lupa" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" xml:space="preserve">
                <g>
                  <path d="M497.938,430.062l-62.28-62.28c-18.156,26.655-41.22,49.719-67.875,67.875l62.28,62.28c18.75,18.75,49.156,18.75,67.875,0
			C516.688,479.188,516.688,448.812,497.938,430.062z" />
                  <path
                    d="M448,224C448,100.281,347.719,0,224,0S0,100.281,0,224s100.281,224,224,224C347.719,448,448,347.719,448,224z M224,400
			c-97.047,0-176-78.969-176-176c0-97.047,78.953-176,176-176c97.031,0,176,78.953,176,176C400,321.031,321.031,400,224,400z" />
                </g>
              </svg>
            </button>
          </span>
        </form>
      </div>
      <div class="col-md-3 text-right">
        <?php
        /**Tela de Login e Logout do cliente */
        if (isset($_SESSION['nome_cliente'])) {
            $nomeCliente = explode(" ", $_SESSION['nome_cliente']); ?>
        <a href="<?php echo SITE_URL ?>/Views/Clientes/alterarCliente.php">
        <img id="icone-user" src="<?php echo SITE_URL ?>/images/icones/utilizador.svg" alt="">
        </a>
        <div class="menu-entrar">
          <ul class="text-left">
            <li>Olá, <strong><?php echo $nomeCliente[0] ?></strong>
            </li>
            <li><a href="<?php echo SITE_URL ?>/Controllers/c_cliente.php?sair=true">Sair</a>
            </li>
          </ul>
        </div>
        <?php
        } else { ?>
        <img id="icone-user" src="<?php echo SITE_URL ?>/images/icones/utilizador.svg" alt="">
        <div class="menu-entrar">
          <ul class="text-left">
            <li><a href="<?php echo SITE_URL ?>/Views/Clientes/loginCliente.php">Entrar</a>
            </li>
            <li><a href="<?php echo SITE_URL ?>/Views/Clientes/cadastroClientes.php">Cadastrar</a>
            </li>
          </ul>
        </div>
        <?php }?>
      </div>
      <div class="col-md-1 text-right">
        <div class="carrinho">
          <a class="text-right" href="<?php echo SITE_URL ?>/Views/pedidos/carrinho.php" title="Meu Carrinho">
            <div class="icone-carrinho">
              <?php
              /**itens no carrinho */
              if ($itPendentes) {
                  echo "<span class='badge badge-light bdg-carrinho'>$itPendentes</span>";
              }?>
              <img class="img-carrinho" src="<?php echo SITE_URL ?>/images/icones/carrinho.svg" alt="Meu Carrinho">
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- menu principal do site -->
        <nav id="lista-menu">
          <ul>
            <li>
              <a class="border-button ft-escuro" href="<?php echo SITE_URL ?>/Views/home/index.php"><span><img
                    src="<?php echo SITE_URL ?>/images/icones/home.svg" alt=""></span>Home</a>
            </li>
            <li>
              <a class="border-button ft-escuro" href="<?php echo SITE_URL ?>/Views/produtos/playstation.php"><span><img
                    src="<?php echo SITE_URL ?>/images/icones/ps4-control.svg" alt=""></span>Playstation</a>
            </li>
            <li>
              <a class="border-button ft-escuro" href="<?php echo SITE_URL ?>/Views/produtos/xbox.php"><span><img
                    src="<?php echo SITE_URL ?>/images/icones/xbox-control.svg" alt=""></span>Xbox</a>
            </li>
            <li>
              <a class="border-button ft-escuro" href="<?php echo SITE_URL ?>/Views/produtos/nintendo.php"><span><img
                    src="<?php echo SITE_URL ?>/images/icones/nintendo-swtch.png" alt=""></span>Nintendo</a>
            </li>
            <li>
              <a class="border-button ft-escuro" href="<?php echo SITE_URL ?>/Views/produtos/todos.php"><span><img
                    src="<?php echo SITE_URL ?>/images/icones/joystick-control.svg" alt=""></span>Todos</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>