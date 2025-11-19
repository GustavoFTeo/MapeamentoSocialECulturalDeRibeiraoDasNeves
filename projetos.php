<?php
session_start();
?>

<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css"
      integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      <h1 style="color: white; margin:0;">Projetos Culturais, Artísticos e de Lazer</h1>
    </div>

    <div class="container my-5">
        <label class="form-label fw-bold" style="color: rgb(255, 255, 255);">Filtrar por tipo de projeto:</label>
        <select id="filtro-projetos" class="form-select">
            <option value="">Selecione...</option>
            <option value="culturais">Projetos Culturais</option>
            <option value="esportes">Esportes</option>
            <option value="educacao">Educação</option>
        </select>
    </div>


    <div class="my-5"></div>

    <div style="background-color: rgb(65, 31, 128); text-align:center; padding:15px;">
      <h2 class="mt-5" id="culturais">Projetos culturais</h2>
      <div class="my-4"></div>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card projeto-card">
            <img src="pagina_projetos/imagemprojeto.jpeg" class="card-img-top" alt="Casa Semifusa">
            <div class="card-body">
              <h5 class="card-title">Casa Semifusa</h5>
              <i class="fas fa-heart"></i>
              <i class="fas fa-bookmark"></i>
              <i class="fas fa-paper-plane"></i>
              <p class="local_projeto mt-2 p-Pro">Sevilha | Cultural</p>
              <a href="projetosemifusa.html" class="btn btn-primary mt-2"
                style="background-color: rgb(65, 31, 128); border-color: rgb(38, 9, 65);">Ver mais</a>
            </div>
          </div>
        </div>
      

        <div class="col-md-4 mb-4">
          <div class="card projeto-card">
            <img src="pagina_projetos/imagemcasadamulhernevense.png" class="card-img-top"
              alt="Casa da Mulher Nevense">
            <div class="card-body">
              <h5 class="card-title">Casa da Mulher Nevense</h5>
              <i class="fas fa-heart"></i>
              <i class="fas fa-bookmark"></i>
              <i class="fas fa-paper-plane"></i>
              <p class="local_projeto mt-2 p-Pro">São Pedro | Projeto Sociocultural</p>
              <a href="projetocasadamulhernevense.html" class="btn btn-primary mt-2"
                style="background-color: rgb(65, 31, 128); border-color: rgb(38, 9, 65);">Ver mais</a>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="card projeto-card">
            <img src="pagina_projetos/imagemirmandade.png" class="card-img-top" alt="Irmandade">
            <div class="card-body">
              <h5 class="card-title">Irmandade Nossa Senhora do Rosário</h5>
              <i class="fas fa-heart"></i>
              <i class="fas fa-bookmark"></i>
              <i class="fas fa-paper-plane"></i>
              <p class="local_projeto mt-2 p-Pro">Justinópolis | Projeto Religioso</p>
              <a href="projetoirmandade.html" class="btn btn-primary mt-2"
                style="background-color: rgb(65, 31, 128); border-color: rgb(38, 9, 65);">Ver mais</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="my-5"></div>

    <div style="background-color: rgb(65, 31, 128); text-align:center; padding:15px;">
      <h2 class="mt-5" id="esportes">Esportes</h2>
      <div class="my-4"></div>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card projeto-card">
            <img src="pagina_projetos/imagemhenfil.png" class="card-img-top" alt="Henfil">
            <div class="card-body">
              <h5 class="card-title">Centro Esportivo Henfil</h5>
              <i class="fas fa-heart"></i>
              <i class="fas fa-bookmark"></i>
              <i class="fas fa-paper-plane"></i>
              <p class="local_projeto mt-2 p-Pro">Savassi | Esportivo</p>
              <a href="ginasiopoliesportivohenfil.html" class="btn btn-primary mt-2"
                style="background-color: rgb(65, 31, 128); border-color: rgb(38, 9, 65);">Ver mais</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="my-5"></div>
    
    <div style="background-color: rgb(65, 31, 128); text-align:center; padding:15px;">
      <h2 class="mt-5" id="educacao">Educação</h2>
      <div class="my-4"></div>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card projeto-card">
            <img src="pagina_projetos/imagemcapacitaneves.PNG" class="card-img-top" alt="Capacita Neves">
            <div class="card-body">
              <h5 class="card-title">Capacita Neves</h5>
              <i class="fas fa-heart"></i>
              <i class="fas fa-bookmark"></i>
              <i class="fas fa-paper-plane"></i>
              <p class="local_projeto mt-2 p-Pro">Justinópolis | Mercado de Trabalho </p>
              <a href="capacitaneves.html" class="btn btn-primary mt-2"
                style="background-color: rgb(65, 31, 128); border-color: rgb(38, 9, 65);">Ver mais</a>
            </div>
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

    <script>
    document.getElementById("filtro-projetos").addEventListener("change", function () {
        const valor = this.value;

        if (valor) {
        const alvo = document.getElementById(valor);
        if (alvo) {
            alvo.scrollIntoView({ behavior: "smooth", block: "start" });
        }
        }
    });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
  </body>
</html>
