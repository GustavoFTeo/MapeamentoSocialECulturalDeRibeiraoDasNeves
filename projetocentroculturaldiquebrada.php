<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="estilizacaoPI2.css">
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
                    <button class="btn me-2" type="submit">
                        <img width="30" src="navbar/lupa.png" alt="">
                    </button>
                    <input class="pesquisa form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
                </form>

                <button class="botaonav btn me-2" type="button">
                    <a href="index.html">Sobre nós</a>
                </button>
                <button class="botaonav btn me-2" type="button">
                    <a href="pagina_mapeamento.html">Mapeamento</a>
                </button>
                <button class="botaonav btn me-2" type="button">
                    <a href="projetos.html">Projetos</a>
                </button>
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
                    <li class="list-group-item menuoculto"><a href="#">Dados do Usúario</a></li>
                    <li class="list-group-item menuoculto"><a href="#">Curtidas</a></li>
                    <li class="list-group-item menuoculto"><a href="#">Descurtidas</a></li>
                    <li class="list-group-item menuoculto"><a href="#">Salvos</a></li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="container text-center my-4">
                <h1>Centro Cultural Di Quebrada</h1>

                <div class="d-flex justify-content-center">
                    <div class="card mb-3 w-75">
                        <img src="projetos/diquebrada/imagemdiquebrada.png" class="card-img-top imagemdiquebrada" alt="...">
                        <div class="card-body">
                            <p class="card-text p-Ref">
                                R. Cenira Gurgel de Carvalho, 137 - São João de Deus (Justinópolis), 
                                Ribeirão das Neves - MG, 33943-360
                            </p>
                            <p class="card-text p-Ref">
                                <small class="p-Ref2">
                                    Retirado de: https://www.google.com/maps/contrib/105564481576825213493/photos/@-19.8080257,-44.0149405,17z/data=!3m1!4b1!4m3!8m2!3m1!1e1?entry=ttu&g_ep=EgoyMDI1MTEyMy4xIKXMDSoASAFQAw%3D%3D. 
                                    Acesso em: 02 de dez. 2025
                                </small>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="card mb-3 w-75">
                        <img src="projetos/diquebrada/imagemdiquebrada2.webp" class="card-img-top imagemdiquebrada2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title p-Ref">
                                Formatura de cursos de qualificação profissional
                            </h5>
                            <p class="card-text p-Ref">
                                O Centro Cultural Di Quebrada é um espaço dedicado à arte, educação e 
                                valorização da cultura periférica. Criado para ser um ponto de encontro da 
                                comunidade, o centro promove atividades como oficinas de dança, música, 
                                grafite, teatro, rodas de conversa e projetos sociais que fortalecem o 
                                sentimento de pertencimento. Mais do que um local de eventos, o Centro Cultural 
                                di Quebrada funciona como uma plataforma de oportunidades, abrindo portas para 
                                talentos locais e incentivando jovens e adultos a se expressarem através da arte. 
                                É um símbolo de resistência, identidade e transformação dentro da quebrada.
                            </p>
                            <p class="card-text p-Ref">
                                <small class="p-Ref2">
                                    Retirado de: https://www.google.com/maps/contrib/105564481576825213493/photos/@-19.8080257,-44.0149405,17z/data=!3m1!4b1!4m3!8m2!3m1!1e1?entry=ttu&g_ep=EgoyMDI1MTEyMy4xIKXMDSoASAFQAw%3D%3D. 
                                    Acesso em: 02 dez. 2025
                                </small>
                            </p>
                        </div>
                    </div>
                </div>

                <p>
                    A missão do Centro Cultural Di Quebrada é promover a valorização da cultura periférica, 
                    oferecendo acesso à arte, educação e oportunidades para a comunidade. O centro busca fortalecer 
                    identidades, estimular o protagonismo juvenil, incentivar a criatividade, gerar transformação 
                    social e construir um espaço onde todos possam aprender, se expressar e se reconhecer.
                </p>

                <div class="d-flex justify-content-center">
                    <div class="card mb-3 w-75">
                        <img src="projetos/diquebrada/imagemdiquebrada3.jpg" class="card-img-top imagemdiquebrada3" alt="...">
                        <div class="card-body">
                            <h5 class="card-title p-Ref">
                                Centro Cultural di Quebrada: missão, origem coletiva e força da cultura periférica
                            </h5>
                            <p class="card-text p-Ref">
                                O Centro Cultural di Quebrada foi formado por agentes culturais da sociedade 
                                civil de Ribeirão das Neves, ligados à Rede de Trabalhadores da Cultura, 
                                e recebe apoio de editais públicos, como a Lei Aldir Blanc.
                            </p>
                            <p class="card-text p-Ref">
                                <small class="p-Ref2">
                                    Retirado de: https://www.google.com/maps/contrib/105564481576825213493/photos/@-19.8080257,-44.0149405,17z/data=!3m1!4b1!4m3!8m2!3m1!1e1?entry=ttu&g_ep=EgoyMDI1MTEyMy4xIKXMDSoASAFQAw%3D%3D. 
                                    Acesso em: 2 dez. 2025.
                                </small>
                            </p>
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
                            O Projeta Neves é uma iniciativa do IFMG que une geografia e tecnologia 
                            para mapear e valorizar Ribeirão das Neves, destacando sua cultura, 
                            projetos e potencial, desconstruindo estereótipos e fortalecendo a 
                            identidade local.
                        </p>
                    </div>
                    
                    <div class="col-md-3 mb-3 mb-md-0">
                        <h5>Páginas principais:</h5>
                        <ul class="list-unstyled">
                            <li class="li-Foo">
                                <a href="index.html" class="text-light text-decoration-none">Sobre nós / Inicial</a>
                            </li>
                            <li class="li-Foo">
                                <a href="pagina_mapeamento.html" class="text-light text-decoration-none">Mapeamento Sociocultural</a>
                            </li>
                            <li class="li-Foo">
                                <a href="projetos.html" class="text-light text-decoration-none">Projetos / Conheça mais</a>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="col-md-4 mb-3 mb-md-0">
                        <h5>Uma Iniciativa IFMG</h5>
                        <p class="mb-0 p-Foo">
                            O Projeta Neves é um projeto de origem do Instituto Federal de Educação, 
                            Ciência e Tecnologia de Minas Gerais (IFMG), Campus Ribeirão das Neves, Brasil.
                        </p>
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
