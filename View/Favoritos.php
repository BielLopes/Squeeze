<?php
  require_once "../Controller/verifica.php";
  require_once "ExibeFavorito.php";
  require_once "../DAO/GeneroDAO.php";

  $id_User = $_SESSION['ID'];

  $viewFavoritos = new ExibeFavorito($id_User);
  define('qtnFavoritos', 10000);
?>

<!DOCTYPE html5>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="Css/Comunit.css" type="text/css">
  <link rel="stylesheet" href="Css/components.css" type="text/css">
  <link rel="stylesheet" href="Css/reset.css" type="text/css">
  <link rel="stylesheet" href="Fontes/stylesheet.css" type="text/css">
  <link rel="stylesheet" href="Css/w3.css" type="text/css">
  <title>Favoritos</title>
</head>
<body class="Fundo">
    <div id="BackToTop">
        <a href="#Top"><img src="Images/backtotop.png"></a>
      </div>
      <header class="Fixar">
        <nav>
          <ul class="w3-navbar w3-red">
              <a name="Preferencias"></a>
            <li><a href="PaginaInicial.php" class="w3-grey"><img src="imagens/logo.png" style="width:24px;margin-bottom:-2px;"></a></li>
            <li><a href="PaginaInicial.php">Página Inicial</a></li>
            <li><a href="Favoritos.php">Favoritos</a></li>
            <li><a href="Recomendacoes.php">Recomendações</a></li>
            <li><a href="Artistas.php">Artistas</a></li>
            <li><a href="Genero.php">Gêneros Musicais</a></li>
            <li class="w3-right"><a href="#">Sair</a></li>	
            <li class="w3-right"><a href="#">Nome Do Usuário </a></li>						
          </ul>
          
        </nav>
      </header>
      <br/>
      <a name="Top"></a>
      <h6 style="font-size: 12px"  class="Invisible">Topo da Minha Página</h6>
      <br/>
      <h1 id="Title">Favoritos</h1>

      <!--Carregar com PHP todos os Artistas Favoritados-->
      <section class="container UltimosFavorit">
          <div>
            <ul>

            <?php
				      $viewFavoritos->exibeX(qtnFavoritos);
			      ?>
              <!--
              <li>
                <div class="component">
                  <img src="Images/Artista.jpg">
                  <h1>Pitty</h1>
                  <form method="GET">
                    <input type="hidden" name="id" value="PHP">
                    <button class="btn2 w3-red" type="submit">
                      <img src="Images/deslike.png">
                    </button>
                  </form>
                  <nav>
                    <ul >
                      <li>Gênero: PHP</li>	
                      <li >Amigos que Favoritaram
                      <ul class="w3-ul w3-border">
                        <li>Jão das couves</li>
                        <li>Jãozinho</li>
                        <li>Jé Pequeno</li>
                      </ul>
                      </li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li>
                <div class="component">
                  <img src="Images/Artista.jpg">
                  <h1>Mc Biel</h1>
                  <form method="GET">
                    <input type="hidden" name="id" value="PHP">
                    <button class="btn2 w3-red" type="submit">
                      <img src="Images/deslike.png">
                    </button>
                  </form>
                  <nav>
                    <ul >
                      <li>Gênero: PHP</li>	
                      <li >Amigos que Favoritaram
                      <ul class="w3-ul w3-border">
                        <li>Jão das couves</li>
                        <li>Jãozinho</li>
                        <li>Jé Pequeno</li>
                      </ul>
                      </li>
                    </ul>
                  </nav>
                </div>
              </li>
              <li>
                Mais artista colocados dinâmicamente
              </li>
              -->
            </ul> 
            <br/>
            <br/>
              <br/>
            </div>  
      </section>   
      
  

</body>
</html>