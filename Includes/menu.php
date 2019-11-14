<header class="menu-principal bk-laranja mb-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <a
          href="<?php echo $conf['url']?>/Views/home/index.php"><img
            id="icon-logo"
            src="<?php echo $conf['url'] ?>/images/logo.png"
            alt="Logo"></a>
      </div>
      <div class="col-md-4">
        <form class="box-search bk-escuro">
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
        <img id="icone-user"
          src="<?php echo $conf['url']?>/images/icones/utilizador.svg"
          alt="">
        <div class="menu-entrar">
          <ul class="text-left">
            <li><a href="#">Entrar</a></li>
            <li><a href="#">Cadastrar</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-1 text-right">
        <div class="carrinho">
          <a class="text-right" href="#" title="Meu Carrinho"><img
              src="<?php echo $conf['url']?>/images/icones/carrinho.svg"
              alt="Meu Carrinho"></a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <nav id="lista-menu">
          <ul>
            <li>
              <a class="border-button ft-escuro" href="#"><span><img
                    src="<?php echo $conf['url'] ?>/images/icones/ps4-control.svg"></span>Playstation</a>
            </li>
            <li>
              <a class="border-button ft-escuro" href="#"><span><img
                    src="<?php echo $conf['url'] ?>/images/icones/xbox-control.svg"></span>Xbox</a>
            </li>
            <li>
              <a class="border-button ft-escuro" href="#"><span><img
                    src="<?php echo $conf['url'] ?>/images/icones/nintendo-swtch.png"></span>Nintendo</a>
            </li>
            <li>
              <a class="border-button ft-escuro" href="#"><span><img
                    src="<?php echo $conf['url'] ?>/images/icones/joystick-control.svg"></span>Todos</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</header>