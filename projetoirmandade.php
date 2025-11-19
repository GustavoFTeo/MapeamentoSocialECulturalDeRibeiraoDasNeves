<?php
session_start();
?>

<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="estilizacaoPI2.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.8/js/bootstrap.bundle.min.js"></script>
        <title>Projeta Neves</title>
      </head>
    <body>

      <nav class="navbar border-bottom border-body" data-bs-theme="dark">
        <div style="height: 60px;" class="container-fluid justify-content-around">
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <img src="navbar/logo.png" alt="logo" width="60">
              <a id="marca-nome" class="navbar-brand" href="#">Projeta Neves</a>
              <form class="d-flex align-items-center me-2" role="search">
                  <button  class="btn me-2" type="submit"><img width="30" src="navbar/lupa.png" alt=""></button>
                  <input class="pesquisa form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
              </form>
              <button class="botaonav btn me-2" type="button"><a href="index.php">Sobre nós</a></button>
              <button class="botaonav btn me-2" type="button"><a href="pagina_mapeamento.php">Mapeamento</a></button>
              <button class="botaonav btn me-2" type="button"><a href="projetos.php">Projetos</a></button>
          </div>
      </nav>


      <div class="menuoculto offcanvas offcanvas-start align-items-center" tabindex="-1" id="menuLateral">
          <div class="align-items-end">
            <img src="navbar/logo.png" alt="logo" width="60">
          </div>
          <div class="offcanvas-header menuoculto">
            <img src="icone/usuario.png" alt="usuario" width="200">
          </div>
          <div>
              <h5 class="offcanvas-title text-center menuoculto marca-nome">
                <?php
                  if (isset($_SESSION['usuario'])) {
                      echo $_SESSION['usuario']['usuario'];
                  } else {
                      echo "Usuário";
                  }
                ?>
              </h5>
          </div>  

   
          <div class="offcanvas-body menuoculto" height="50">
            <button type="button" class="botaonav btn me-2" data-bs-toggle="modal" data-bs-target="#popup_login">
              Logar
            </button>
            <button type="button" class="botaonav btn me-2" data-bs-toggle="modal" data-bs-target="#popup_cadastro">
              Cadastrar
            </button>
          </div>
          <div class="offcanvas-body menuoculto w-75">
            <ul class="list-group menuoculto">
              <li class="list-group-item menuoculto"><a href="#">Dados do Usúario</a></li>
              <li class="list-group-item menuoculto"><a href="#">Curtidas</a></li>
              <li class="list-group-item menuoculto"><a href="#">Descurtidas</a></li>
              <li class="list-group-item menuoculto"><a href="#">Salvos</a></li>
            </ul>
          </div>
      </div>


      <div class="modal fade" id="popup_cadastro" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Cadastro</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="cadastro.php" method="POST">
                <div class="form-group">
                  <label for="usuario">Usuário</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
                </div>
                <div class="form-group">
                  <label for="contato">Contato</label>
                  <input type="text" class="form-control" id="contato" name="contato" placeholder="Digite seu email ou telefone">
                  <small class="form-text text-muted">Opcional</small>
                </div>
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>
                <button type="button" class="a m-2" data-bs-toggle="modal" data-bs-target="#popup_login">
                  Já possui cadastro?
                </button>
                <button type="submit" class="btn botaonav m-2">Cadastrar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="popup_login" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Login</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="login.php" method="POST">
                <div class="form-group">
                  <label for="usuario">Usuário</label>
                  <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Digite seu usuário" required>
                </div>
                <div class="form-group">
                  <label for="senha">Senha</label>
                  <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
                </div>
                <button type="button" class="a m-2" data-bs-toggle="modal" data-bs-target="#popup_cadastro">
                  Não possui cadastro?
                </button>
                <button type="submit" class="btn botaonav m-2">Enviar</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="my-5"></div>
      <div style="background-color: rgb(65, 31, 128); text-align:center; padding:15px;">
          <h1 style="color: white; margin:0;">Irmandade Nossa Senhora do Rosário</h1>
      </div>
      <div class="container">
        <div class="container text-center my-4">
            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3">
                    <img src="projetos/irmandade/img/imagemirmandade1.jpg" class="card-img-top imgHenfil" alt="...">
                    <div class="card-body">
                        <h5 class="card-title p-Ref">Igreja Nossa Senhora do Rosário</h5>
                        <p class="card-text p-Ref">Localizada em Justinópolis, a Igreja Nossa Senhora do Rosário é o espaço central das celebrações da irmandade. Sua arquitetura simples, mas carregada de simbolismo, abriga missas, festas religiosas e encontros culturais que unem fé, devoção e preservação da memória afro-brasileira.</p>
                        <p class="card-text p-Ref">Endereço: Rua Francisco Labanca, 189, Justinópolis, Ribeirão das Neves, MG</p>
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: Acervo pessoal. Acesso em: 15 de set. 2025</small></p>
                    </div>
                </div>
            </div>

            <p>
                A Irmandade Nossa Senhora do Rosário dos Homens Pretos de Justinópolis é um dos mais importantes símbolos da cultura afro-brasileira em Ribeirão das Neves. Reconhecida como patrimônio cultural imaterial, ela preserva tradições religiosas, sociais e culturais que unem fé católica e heranças africanas. A irmandade é responsável por manter viva a tradição dos congados e festejos, fortalecendo a identidade coletiva da comunidade e garantindo a transmissão desse legado para as novas gerações.
            </p>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3">
                    <img src="projetos/irmandade/img/imagemirmandade2.png" class="card-img-top imgHenfil" alt="...">
                    <div class="card-body">
                        <h5 class="card-title p-Ref">Congadeiros da Irmandade Nossa Senhora do Rosário</h5>
                        <p class="card-text p-Ref">Na imagem, os congadeiros aparecem com trajes coloridos, fitas e instrumentos tradicionais como tambores e caixas. Eles representam a força da cultura afrodescendente, trazendo ao público cantos e danças que celebram a devoção à Nossa Senhora do Rosário e reafirmam a resistência e ancestralidade do povo negro.</p>
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: https://ribeiraodasneves.mg.gov.br/fe-cultura-e-tradicao-ribeirao-das-neves-e-plural/. Acesso em: 15 set. 2025</small></p>
                    </div>
                </div>
            </div>

            <p>
                A irmandade foi fundada em 1889 no povoado de Areias e transferida para Justinópolis em 1919, em um terreno doado por Francisco Labanca. Desde 1922, realiza a festa em honra a Nossa Senhora do Rosário, que reúne fiéis de várias regiões. Em 2016, foi reconhecida como comunidade quilombola pela Fundação Palmares, reforçando sua importância histórica e cultural.
            </p>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3">
                    <img src="projetos/irmandade/img/imagemirmandade3.jpg" class="card-img-top imgHenfil" alt="...">
                    <div class="card-body">
                        <h5 class="card-title p-Ref">Tradicional Festa em honra a São Sebastião</h5>
                        <p class="card-text p-Ref">Na foto, é possível ver a procissão da Festa de São Sebastião, com devotos carregando estandartes e imagens religiosas. A celebração, que acontece há mais de 50 anos, mistura cânticos, danças de congado e manifestações de fé que fortalecem a união da comunidade.</p>
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: https://ribeiraodasneves.mg.gov.br/fe-cultura-e-tradicao-ribeirao-das-neves-e-plural/. Acesso em: 15 set. 2025</small></p>
                    </div>
                </div>
            </div>

            <p>
                Ao longo de sua história, a Irmandade do Rosário se consolidou como um espaço de fé, resistência e identidade. Ela representa a luta pela preservação da memória negra e pela valorização da cultura quilombola, além de manter viva a prática das festas tradicionais que unem espiritualidade e ancestralidade.
            </p>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3">
                    <img src="projetos/irmandade/img/imagemirmandade4.jpg" class="card-img-top imgHenfil" alt="...">
                    <div class="card-body">
                        <h5 class="card-title p-Ref">Festa em honra a Nossa Senhora do Rosário</h5>
                        <p class="card-text p-Ref">A imagem mostra o cortejo da festa em homenagem a Nossa Senhora do Rosário, com congadeiros e devotos enfeitados com roupas típicas e instrumentos. O evento, de grande expressividade cultural, combina religiosidade católica com traços de ancestralidade africana, tornando-se um dos momentos mais importantes do calendário festivo da cidade.</p>
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: https://ribeiraodasneves.net/111-diversao/entretenimento/5128-festa-em-honra-a-nossa-senhora-do-rosario-completa-126-anos-de-tradicao. Acesso em: 15 set. 2025</small></p>
                    </div>
                </div>
            </div>

            <p>
                Atualmente, a Irmandade promove não apenas as festividades religiosas, mas também ações sociais e culturais voltadas para a comunidade, como oficinas, encontros educativos e rodas de conversa que reforçam a importância da cultura afro-brasileira. É um verdadeiro patrimônio vivo de Ribeirão das Neves.
            </p>

        </div>
      </div>
    <footer class="text-light py-4 mt-5">
      <div class="container">
        <div class="row align-items-start">
          <div class="col-md-1 d-flex justify-content-center mb-3 mb-md-0">
            <img src="navbar/logo.png" alt="Logo Projeta Neves" class="img-fluid">
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <h4>Projeta Neves</h4>
            <p class="mb-0 p-Foo">
              O Projeta Neves é uma iniciativa do IFMG que une geografia e tecnologia para mapear e valorizar Ribeirão
              das Neves, destacando sua cultura, projetos e potencial, desconstruindo estereótipos e fortalecendo a
              identidade local.
            </p>
          </div>

          <div class="col-md-3 mb-3 mb-md-0">
            <h5>Páginas principais:</h5>
            <ul class="list-unstyled">
              <li class="li-Foo"><a href="index.php" class="text-light text-decoration-none">Sobre nós / Inicial</a>
              </li>
              <li class="li-Foo"><a href="pagina_mapeamento.php"
                  class="text-light text-decoration-none">Mapeamento Sociocultural</a></li>
              <li class="li-Foo"><a href="projetos.php" class="text-light text-decoration-none">Projetos / Conheça
                  mais</a></li>
            </ul>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <h5>Uma Iniciativa IFMG</h5>
            <p class="mb-0 p-Foo">
              O Projeta Neves é um projeto de origem do Instituto Federal de Educação, Ciência e Tecnologia de Minas
              Gerais (IFMG), Campus Ribeirão das Neves, Brasil.
            </p>
          </div>
        </div>

        <hr class="border-light my-3">
        <div class="text-center">
          <p class="mb-0 p-Foo">&copy; 2025 Projeta Neves. Todos os direitos reservados.</p>
        </div>
      </div>
    </footer>
    </body>
</html>
