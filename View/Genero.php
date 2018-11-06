<?php
	require_once "../Controller/verifica.php";
	require_once "ExibeGenero.php";
	require_once "../DAO/GeneroDAO.php";
	require_once "../DAO/PreferenciaDAO.php";

	$id_User = $_SESSION['ID'];
	$viewGeneros = new ExibeGenero($id_User);
?>

<!DOCTYPE html5>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Css/w3.css">
	<link rel="stylesheet" href="Css/Comunit.css" type="text/css">
	<link rel="stylesheet" href="Css/Confirma.css" type="text/css">
  	<link rel="stylesheet" href="Css/components.css" type="text/css">
  	<link rel="stylesheet" href="Css/reset.css" type="text/css">
  	<link rel="stylesheet" href="Fontes/stylesheet.css" type="text/css">
  	<link rel="stylesheet" href="Css/w3.css" type="text/css">
	<title>Gêneros</title>
</head>
<body class="Fundo">
		<!--Deslogar-->
			<div id="exit" class="w3-modal">
				<div class="Formular">
					<span onclick="sumir('exit')" class="w3-closebtn">&times;</span>
					<h1>Você tem certeza que deseja Deslogar?</h1>
					<form action="../Controller/LogOut.php" method="post">
						<input type="hidden" name="logout" value="true">
						<button class="btn5 w3-btn w3-blue" action="">Sair</button>
						<button class="btn5 w3-btn w3-blue" type="reset" onclick="sumir('exit')">Cancelar</button>
					</form>
				</div>
			</div>



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
					<li class="w3-right"><a onclick="aparecer('exit')">Sair</a></li>	
					<li class="w3-right"><a ><?php  echo $_SESSION['Name']; ?> </a></li>												
				</ul>  
			</nav>
		</header>
		<br/>
		<a name="Top"></a>
		<h6 style="font-size: 8px"  class="Invisible">Topo da Minha Página</h6>
		<br/>
		<h1 id="Title">Gêneros</h1>
			
	<section id="AtalhoPesquisa" >
  <div class="w3-bar w3-border-bottom w3-light-grey intronav">
    <ul class="w3-navbar w3-card-3 w3-white ">
      <li ><a onclick="openC('Ranq')">Os Mais Badalados</a></li>
      <li><a onclick="openC('Ordem')">Em Ordem</a></li>
    </ul>
  </div>
  <div id="Ranq" class="w3-background6 w3-container city w3-animate-opacity">
    	<!--Colocar com PHP uma quantidade Limitada de Artistas-->
      		<ul>

				<?php
						/* Generos Mais Badalados */
					$viewGeneros->exibeMelhores();
				?>
						
			</ul>
			<br/>
			<br/>
			  <br/>
  </div>

  <div id="Ordem" class=" w3-background3 w3-container city w3-animate-opacity" style="display:none">
    		<ul>
				<?php
						/* Generos Ordem Alfabética */
					$viewGeneros->exibeOredemAlfabetica();
				?>
		
			</ul>
			<br/>
			<br/>
			  <br/>
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
  function sumir(i) {
		document.getElementById(i).style.display = "none";
	}

	function aparecer(i) {
		document.getElementById(i).style.display = "initial";

	}
  </script>
			
	</section>
</body>
</html>