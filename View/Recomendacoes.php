<?php
	require_once "../Controller/verifica.php";
	require_once "ExibeRecomendacao.php";
	require_once "../DAO/FavoritoDAO.php";
	require_once "../Model/Artista.php";
	require_once "../DAO/ArtistaDAO.php";
	require_once "../DAO/PreferenciaDAO.php";
	require_once "../DAO/GeneroDAO.php";

	$id_User = $_SESSION['ID'];
	$viewRecomendacao = new ExibeRecomendacao($id_User);
?>

<!DOCTYPE html5>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Css/w3.css">
	<link rel="stylesheet" href="Css/Comunit.css" type="text/css">
  	<link rel="stylesheet" href="Css/components.css" type="text/css">
  	<link rel="stylesheet" href="Css/reset.css" type="text/css">
  	<link rel="stylesheet" href="Fontes/stylesheet.css" type="text/css">
  	<link rel="stylesheet" href="Css/w3.css" type="text/css">
	<title>Artistas</title>
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
		<h6 style="font-size: 8px"  class="Invisible">Topo da Minha Página</h6>
		<br/>
		<h1 id="Title">Recomendações</h1>
			
	<section id="AtalhoPesquisa" >
  <div class="w3-bar w3-border-bottom w3-light-grey intronav">
    <ul class="w3-navbar w3-card-3 w3-white ">
      <li ><a onclick="openC('ByMigos')">Por Amigos</a></li>
      <li><a onclick="openC('ByPref')">Por Preferencias</a></li>
    </ul>
  </div>
  <div id="ByMigos" class="w3-background1 w3-container city w3-animate-opacity">
    	<!--Colocar com PHP uma quantidade Limitada de Artistas-->
      		<ul>

				<?php
					$viewRecomendacao->exibeBaseadoMigos();
				?>
				
					<!--Colocar com PHP os Artistas mais favoritados em Ordem
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
                      			<li >
								Amigos que Favoritaram
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
					<div class="component">
						<img src="Images/Artista.jpg">
						<h1>Da Leste</h1>
						<form method="GET">
						  <input type="hidden" name="id" value="PHP">
						  <button class="btn2 w3-red" type="submit">
							<img src="Images/deslike.png">
						  </button>
						</form>
					  <nav>
						  <ul >
								<li>Gênero: PHP</li>	
								<li >
							  Amigos que Favoritaram
								<ul class="w3-ul w3-border">
								  <li>Jão das couves</li>
								  <li>Jãozinho</li>
								  <li>Jé Pequeno</li>
								</ul>
								</li>
						  </ul>
						</nav>
				  </div>
				<li>

				</li>
-->
			
						<!--Mais Atistas-->

				</li>
			</ul>
			<br/>
			<br/>
			  <br/>
			</div>
  </div>

  <div id="ByPref" class=" w3-background4 w3-container city w3-animate-opacity" style="display:none">
    		<ul>
				<?php
					$viewRecomendacao->exibeByPreferencia();
				?>
				
					<!--
				<li>
							<div class="component">
								<img src="Images/Artista.jpg">
								<h1>Annita</h1>
								<form method="GET">
								  <input type="hidden" name="id" value="PHP">
								  <button class="btn2 w3-red" type="submit">
									<img src="Images/like.png">
								  </button>
								</form>
							  <nav>
								  <ul >
										<li>Gênero: PHP</li>	
										<li >
									  Amigos que Favoritaram
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
								<h1>Catra</h1>
								<form method="GET">
								  <input type="hidden" name="id" value="PHP">
								  <button class="btn2 w3-red" type="submit">
									<img src="Images/like.png">
								  </button>
								</form>
							  <nav>
								  <ul >
										<li>Gênero: PHP</li>	
										<li >
									  Amigos que Favoritaram
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
-->
				<li>
					<!--Mais Artistas com PHP em ordem Alfabetica-->
				</li>

			</ul>
			<br/>
			<br/>
			  <br/>
			</div>
  </div>
  <script>
  function openC(cityName) {
      var i;
      var x = document.getElementsByClassName("city");
      for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
      }
      document.getElementById(cityName).style.display = "block";
  }
  </script>
			
	</section>
</body>
</html>