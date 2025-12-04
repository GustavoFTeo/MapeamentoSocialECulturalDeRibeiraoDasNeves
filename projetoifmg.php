<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="estilizacaoPI2.css">

        <!-- 🔧 Ajuste das imagens + rodapé fixo no fim -->
        <style>
            .imgpadrao {
                width: 100%;
                height: 350px;
                object-fit: cover;
            }

            
        </style>
    </head>

    <body>
      <nav class="navbar border-bottom border-body" data-bs-theme="dark">
        <div style="height: 60px;" class="container-fluid justify-content-around">
              <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#menuLateral">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <img src="navbar/logo.png" alt="logo" width="60">
              <a id="marca-nome" class="navbar-brand" href="#">Projeta Neves</a>
              
              <button class="botaonav btn me-2" type="button"><a href="index.html">Sobre nós</a></button>
              <button class="botaonav btn me-2" type="button"><a href="pagina_mapeamento.html">Mapeamento</a></button>
              <button class="botaonav btn me-2" type="button"><a href="projetos.html">Projetos</a></button>
          </div>
      </nav>

      <div class="offcanvas offcanvas-start menuoculto align-items-center" tabindex="-1" id="menuLateral">
          <div class="align-items-end">
            <img src="navbar/logo.png" alt="logo" width="60">
          </div>

          <div class="offcanvas-header menuoculto">
            <img src="icone/usuario.png" alt="usuario" width="200">
          </div>

          <div>
              <h5 class="offcanvas-title text-center menuoculto marca-nome">Usuário</h5>
          </div>  

          <div class="offcanvas-body menuoculto w-75">
            <ul class="list-group menuoculto">
              <li class="list-group-item menuoculto"><a href="#">Dados do Usuário</a></li>
              <li class="list-group-item menuoculto"><a href="#">Curtidas</a></li>
              <li class="list-group-item menuoculto"><a href="#">Descurtidas</a></li>
              <li class="list-group-item menuoculto"><a href="#">Salvos</a></li>
            </ul>
          </div>
      </div>

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
