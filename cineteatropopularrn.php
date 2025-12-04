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

            <div style="background-color: rgb(65, 31, 128); text-align:center; padding:15px;">
                <h1 style="color: white; margin:0;">Cine Teatro Popular RN</h1>
            </div>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3 mt-4">

                    <img src="projetos/cineteatro/EntradaCineTeatro.png" class="card-img-top imgcineteatro" alt="..." width="600">

                    <div class="card-body">
                        <h5 class="card-title p-Ref"></h5>
                        <p class="card-text p-Ref">.</p>
                        <p class="card-text p-Ref">Endereço: R. do Comércio, 225 - Lidici (Justinópolis), Ribeirão das Neves - MG, 33930-780</p>
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: https://www.google.com/maps/place/Gin%C3%A1sio+Poliesportivo+Municipal/@-19.7738501,-44.0862083,17z/data=!3m1!4b1!4m6!3m5!1s0xa68dfbc901b495:0x63f9c06373c1679d!8m2!3d-19.7738552!4d-44.0836334!16s%2Fg%2F11f76_ypsp?entry=ttu&g_ep=EgoyMDI1MDkxNC4wIKXMDSoASAFQAw%3D%3D</small></p>
                    </div>

                </div>
            </div>

            <p>
                O Cine Teatro Popular RN é um dos principais espaços culturais do bairro Justinópolis, em Ribeirão das Neves. 
                Criado para oferecer acesso à arte, ao cinema e às apresentações cênicas, ele se tornou um ponto de referência para moradores que buscam um local de encontro, convivência e 
                valorização da cultura local. O espaço funciona como um teatro comunitário, reunindo eventos culturais, filmes, oficinas, apresentações escolares e projetos sociais voltados
                para crianças, jovens e adultos. Localizado em uma área central de Justinópolis, o Cine Teatro Popular RN foi pensado para democratizar o acesso à cultura em uma cidade
                que historicamente sofreu com a falta de equipamentos culturais estruturados. Assim, ele cumpre um papel essencial: aproximar a população de diferentes manifestações 
                artísticas sem a necessidade de deslocamento para Belo Horizonte ou outras regiões.
                Além de servir como palco para produções artísticas locais, o teatro também abre espaço para debates, encontros educativos, palestras 
                e atividades promovidas por escolas, coletivos culturais e iniciativas independentes. Sua presença fortalece o desenvolvimento sociocultural do bairro,
                permitindo que a comunidade tenha contato constante com atividades artísticas de qualidade. É um ambiente que incentiva talentos, promove inclusão e ajuda a construir 
                uma identidade cultural mais forte para Ribeirão das Neves.
            </p>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3">

                    <img src="projetos/cineteatro/ApresentacaoCineTeatro.png" class="card-img-top imgcineteatro" alt="..." width="600">

                    <div class="card-body">
                        <h5 class="card-title p-Ref"></h5>
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de:https://www.google.com/maps/place/Gin%C3%A1sio+Poliesportivo+Municipal/@-19.7738501,-44.0862083,17z/data=!3m1!4b1!4m6!3m5!1s0xa68dfbc901b495:0x63f9c06373c1679d!8m2!3d-19.7738552!4d-44.0836334!16s%2Fg%2F11f76_ypsp?entry=ttu&g_ep=EgoyMDI1MDkxNC4wIKXMDSoASAFQAw%3D%3D5</small></p>
                    </div>

                </div>
            </div>

            <p>
                A história do Cine Teatro Popular RN está ligada ao crescimento de Justinópolis e à necessidade de criar espaços culturais acessíveis para a população. 
                Embora não seja um equipamento antigo, o teatro surgiu como resposta à carência histórica de locais dedicados ao cinema e às artes cênicas em Ribeirão das Neves. 
                Sua criação representou um avanço para o município, pois ofereceu à comunidade um espaço estruturado onde é possível assistir a filmes, participar de oficinas culturais, 
                prestigiar apresentações teatrais e acompanhar eventos educativos sem sair do bairro. 
                Desde que começou a funcionar, o Cine Teatro Popular RN passou a receber produções locais e regionais, além de servir como ponto de apoio para iniciativas de 
                artistas independentes e grupos culturais que, antes, não encontravam locais adequados para se apresentar na cidade.
            </p>

            <p>
                Com o passar dos anos, o teatro se consolidou como símbolo de resistência cultural e como espaço de fortalecimento da arte feita pelos próprios moradores. 
                Ele contribui diretamente para o desenvolvimento social do território, oferecendo acesso à cultura para diversas faixas etárias, incentivando a formação artística 
                e jovens e criando oportunidades para que novos talentos possam surgir. Sua relevância para Ribeirão das Neves vai além do entretenimento: o teatro também promove
                inclusão, amplia horizontes e ajuda a transformar a realidade local por meio da arte. Para Justinópolis, ele representa um patrimônio cultural importante, que
                reforça a identidade comunitária e mantém viva a produção cultural do município.
            </p>

            <div class="d-flex justify-content-center">
                <div class="card mb-3 w-75 mx-3">

                    <img src="projetos/cineteatro/AmbienteCineTeatro.png" class="card-img-top imgcineteatro" alt="...">

                    <div class="card-body">
                        <p class="card-text p-Ref"><small class="p-Ref2">Retirado de: 
                        https://www.google.com/maps/place/Gin%C3%A1sio+Poliesportivo+Municipal/@-19.7738501,-44.0862083,17z/data=!3m1!4b1!4m6!3m5!1s0xa68dfbc901b495:0x63f9c06373c1679d!8m2!3d-19.7738552!4d-44.0836334!16s%2Fg%2F11f76_ypsp?entry=ttu&g_ep=EgoyMDI1MDkxNC4wIKXMDSoASAFQAw%3D%3D5
                        </small></p>
                    </div>

                </div>
            </div>

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
                    <p class="mb-0 p-Foo">O Projeta Neves é uma iniciativa do IFMG que une geografia e tecnologia para mapear e valorizar Ribeirão das Neves, destacando sua cultura, projetos e potencial, desconstruindo estereótipos e fortalecendo a identidade local.</p>
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
                    <p class="mb-0 p-Foo">O Projeta Neves é um projeto de origem do Instituto Federal de Educação, Ciência e Tecnologia de Minas Gerais (IFMG), Campus Ribeirão das Neves, Brasil.</p>
                </div>

            </div>

            <hr class="border-light my-3">

            <div class="text-center">
                <p class="mb-0 p-Foo">&copy; 2025 Projeta Neves. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>

