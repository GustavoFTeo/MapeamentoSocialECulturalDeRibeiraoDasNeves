<?php
session_start();

// 1. Verifica login
if (!isset($_SESSION['usuario'])) {
    die("Você precisa estar logado!");
}

$usuario_id = $_SESSION['usuario']['id'];

// Arquivos
$arquivo_projetos = "documentos/projetos.txt";
$arquivo_curtidas = "documentos/curtidas.txt";

// ===============================
// 2. Lê lista de projetos
// ===============================
$projetos = [];

if (file_exists($arquivo_projetos)) {
    $linhas = file($arquivo_projetos, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($linhas as $linha) {
        $partes = explode('|', $linha);
        $dados = [];

        foreach ($partes as $p) {
            if (strpos($p, ':') !== false) {
                list($chave, $valor) = explode(':', $p, 2);
                $dados[$chave] = $valor;
            }
        }

        if (isset($dados['id'])) {
            $projetos[$dados['id']] = $dados;
        }
    }
}

// ===============================
// 3. Lê CURTIDAS do usuário
// ===============================
$curtidas = [];

if (file_exists($arquivo_curtidas)) {
    $linhas = file($arquivo_curtidas, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($linhas as $linha) {

        list($u_raw, $p_raw) = explode("|", $linha);

        $u_id = str_replace("usuario_id:", "", $u_raw);
        $p_id = str_replace("projeto_id:", "", $p_raw);

        if ($u_id == $usuario_id) {
            $curtidas[] = $p_id;
        }
    }
}
?>



<html>
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
              
              <button class="botaonav btn me-2" type="button"><a href="index.php">Sobre nós</a></button>
              <button class="botaonav btn me-2" type="button"><a href="pagina_mapeamento.php">Mapeamento</a></button>
              <button class="botaonav btn me-2" type="button"><a href="projetos.php">Projetos</a></button>
          </div>
      </nav>

<!--MENU LATERAL-->
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
              <li class="list-group-item menuoculto"><a type="button" data-bs-toggle="modal" data-bs-target="#popup_curtidas" href="#">Curtidas</a></li>
              <li class="list-group-item menuoculto"><a href="#">Descurtidas</a></li>
              <li class="list-group-item menuoculto"><a href="#">Salvos</a></li>
            </ul>
          </div>
      </div>

<!--POPUP CADASTRO-->
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
<!--POPUP LOGIN-->
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

<!--POPUP CURTIDAS-->
      <div class="modal fade" id="popup_curtidas" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Curtidas</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5 style="color: #212529;text-align: center;">Projetos que você curtiu</h2>
              <?php if (empty($curtidas)): ?>
                  <h6 style="color: #212529; text-align: center;">Você ainda não curtiu nenhum projeto.</h6>

              <?php else: ?>
              <table style="width: 100%; border-collapse: collapse;" border="1" cellpadding="8">
                  <tr>
                      <th>Projeto</th>
                      <th>Categoria</th>
                      <th>Acessar</th>
                  </tr>

                  <?php foreach ($curtidas as $idProjeto): ?>
                      <?php $p = $projetos[$idProjeto]; ?>
                      <tr>
                          <td><?= $p['projeto'] ?></td>
                          <td><?= $p['categoria'] ?></td>
                          <td><a style="color: #212529;"  href="<?= $p['link'] ?>">Abrir</a></td>
                      </tr>
                  <?php endforeach; ?>
              </table>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    
<!--TEXTOS DA PAGINA-->
      <div class="container">
        <div class="container text-center my-4">
          <h1>Casa SemiFusa</h1>
          <img src="projetos\casasemifusa\casasemifusa.jpg" alt="Imagem do projeto" class="img-fluid my-3">

            <p class="lh-base p-cent"> A Casa Semifusa é um centro cultural comunitário localizado em Ribeirão das Neves, fundado pelo
        Instituto Cultural Semifusa. Ela atua como um ponto de encontro e formação artística para a juventude
        periférica, com atividades que valorizam a cultura local e promovem cidadania. Lá acontecem oficinas
        de arte, dança, graffiti, música, audiovisual, além de eventos como saraus, batalhas de rima e festivais.
            </p>
            <p class="lh-base p-cent">
                O espaço busca transformar a realidade da região por meio da arte e da educação, incentivando o
        pertencimento, a autoestima e a criatividade dos moradores. No coração de sua missão, a Semifusa
        oferece um portfólio amplo de projetos: a Escola de Artes, o Cineclube, o Sarau no Ribeirão, o Podcast
        Semifusa, o Estúdio Ecos, a Batalha da Casa, além dos festivais Pá na Pedra, Neves Encena e do Festival
        de Cinema.
            </p>
            <p class="lh-base p-cent">
                Entre fevereiro e maio de 2022, diversas atividades como oficinas de capoeira, grafite, beat, design de
        interiores e confecção de instrumentos recicláveis aconteceram integradas a saraus e eventos
        carnavalescos. A relevância da Casa vai além do aprendizado: ela fortalece o sentimento de
        pertencimento e autoestima local, agindo contra o estigma da cidade e buscando impulsionar a
        economia criativa, saúde mental, educação, igualdade e justiça.
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
