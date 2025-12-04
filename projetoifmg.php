
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
    <!-- 🔧 Ajuste das imagens + rodapé fixo no fim -->
    <style>
        .imgpadrao {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }
    </style>
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
            <div style="background-color: rgb(65, 31, 128); text-align:center; padding:15px;">
                <h1 style="color: white; margin:0;">IFMG</h1>
            </div>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3 mt-4">

                    <img src="projetos/IFMG/imagemifmg.png" class="card-img-top imgpadrao" alt="Imagem IFMG">
                    <div class="card-body">
                        <p class="card-text p-Ref">Endereço: Rua Taiobeiras, 169, Sevilha (2ª Seção), Ribeirão das Neves - MG, 33858-480.</p>
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: Google Maps</small></p>
                    </div>
                </div>
            </div>

            <p>
                O IFMG Campus Ribeirão das Neves foi formalmente criado em 2010, como parte da expansão da rede de Institutos
                Federais em Minas Gerais, com o objetivo de oferecer educação pública de qualidade e promover o desenvolvimento
                social e profissional da região. Com o passar dos anos, o campus ganhou autonomia e tornou-se oficialmente 
                “Campus Ribeirão das Neves” por volta de 2013. Em janeiro de 2016, foi inaugurada sua sede própria, com
                estruturas dimensionadas para atender inicialmente cerca de 1.200 alunos e com possibilidade de expansão.
            </p>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3">
                    <img src="projetos/ifmg/imagempredionovo.jpeg" class="card-img-top imgpadrao" alt="Prédio novo IFMG">
                    <div class="card-body">
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: Google Maps</small></p>
                    </div>
                </div>
            </div>

            <p>
                Com o crescimento da demanda, o campus passou por uma ampliação significativa: foi construído um novo bloco
                didático, inaugurado nos últimos anos, com cerca de 2.200 m², 10 salas de aula, 2 laboratórios de informática,
                acessibilidade completa (incluindo dois elevadores) e um sistema de reaproveitamento de água da chuva. 
            </p>

            <p>
                Esse bloco tem capacidade para cerca de 480 alunos simultaneamente, aumentando o número total de estudantes 
                atendidos para cerca de 1.600. A expansão também possibilitou novas turmas e a perspectiva de mais cursos 
                superiores no futuro.
            </p>

            <p>
                O IFMG Neves também se destaca academicamente: foi 1º lugar entre todos os Institutos Federais de Minas Gerais 
                no ENEM 2022 e entrou no ranking das 100 melhores escolas públicas do Brasil no ENEM 2024.
            </p>

            <p>
                Com a expansão, o campus passou a abrigar o “Ambiente de Inovação”, com laboratórios modernos como o Ápice e o 
                IFMaker, que estimulam criatividade, tecnologia e desenvolvimento de projetos com impacto real na comunidade.
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
                    <p class="mb-0 p-Foo">O Projeta Neves é uma iniciativa do IFMG que une geografia e tecnologia para mapear e valorizar Ribeirão das Neves, destacando sua cultura, projetos e potencial.</p>
                </div>
                
                <div class="col-md-3 mb-3 mb-md-0">
                    <h5>Páginas principais:</h5>
                        <ul class="list-unstyled">
                            <li class="li-Foo"><a href="index.html" class="text-light text-decoration-none">Sobre nós / Inicial</a></li>
                            <li class="li-Foo"><a href="pagina_mapeamento.html" class="text-light text-decoration-none">Mapeamento Sociocultural</a></li>
                            <li class="li-Foo"><a href="projetos.html" class="text-light text-decoration-none">Projetos / Conheça mais</a></li>
                        </ul>
                </div>
                
                <div class="col-md-4 mb-3 mb-md-0">
                    <h5>Uma Iniciativa IFMG</h5>
                    <p class="mb-0 p-Foo">Projeto do Instituto Federal de Minas Gerais, Campus Ribeirão das Neves.</p>
                </div>
            </div>

            <hr class="border-light my-3">

            <div class="text-center">
                <p class="mb-0 p-Foo">&copy; 2025 Projeta Neves. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>

