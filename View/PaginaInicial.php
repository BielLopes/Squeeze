<?php
	require_once "../Controller/verifica.php";
	require_once "ExibeCheckbox.php";
	require_once "ExibeUser.php";
	require_once "ExibeFavorito.php";
	require_once "../DAO/MigoDAO.php";
	require_once "../DAO/UserDAO.php";
	require_once "../DAO/GeneroDAO.php";
	require_once "../DAO/FavoritoDAO.php";
	require_once "../DAO/PreferenciaDAO.php";
	require_once "../Model/Migo.php";
	require_once "../Model/Genero.php";
	/*
	Desabilita os warning e erros:
	error_reporting(0);
	ini_set('display_errors', FALSE);
*/
	$id_User = $_SESSION['ID'];
	$prefDAO = new PreferenciaDAO();
	$minhasPreferen = $prefDAO->preferenciasDoUsuario($id_User);

	$viewCheckbox = new ExibeCheckbox();

	$viewMigos = new ExibeUser($id_User);

	$viewFavoritos = new ExibeFavorito($id_User);

	define('qtnFavoritos', 4);

	/*error_reporting(0);
	ini_set('display_errors', FALSE);*/

	/*$user = new User("Aleluia","","","");
	echo $user->getNmUser();
	$name = $_SESSION['Usuario'];
	echo $name->getNmUser();
	*/
?>

<!DOCTYPE html5>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="Css/components.css" type="text/css">
	<link rel="stylesheet" href="Css/Comunit.css" type="text/css">
	<link rel="stylesheet" href="Css/Confirma.css" type="text/css">
	<link rel="stylesheet" href="Css/Inicial.css" type="text/css">
	<link rel="stylesheet" href="Css/reset.css" type="text/css">
	<link rel="stylesheet" href="Fontes/stylesheet.css" type="text/css">
	<link rel="stylesheet" href="Css/w3.css" type="text/css">
	<title>Inicial</title>
</head>
<body class="Fundo">
	<!--Todos os Alertes e Confirmations nessa Parte-->
			<!--Excluir Conta-->
			<div id="exclude" class="w3-modal">
				<div class="Formular">
					<span onclick="sumir('exclude')" class="w3-closebtn">&times;</span>
					<h1>Você tem certeza que deseja excluir Sua Conta?</h1>
					<form action="../Controller/cancelaConta.php" method="post">
						<input type="hidden" name="tipo" value="deleta">
						<input type="hidden" name="ID_User" value="ID_PHP">
						<button class="btn5 w3-btn w3-blue" action="">Deletar</button>
						<button class="btn5 w3-btn w3-blue" type="reset" onclick="sumir('exclude')">Cancelar</button>
					</form>
				</div>
			</div>
		<!--Alterar Senha-->
		<div id="Alterada" class="w3-modal">
			<div class="Formular">
				<span onclick="sumir('Alterada')" class="w3-closebtn">&times;</span>
				<h1>Senha Alterada com Sucesso</h1>
			</div>
		</div>
		<div id="InAlterada" class="w3-modal">
			<div class="Formular">
				<span onclick="sumir('InAlterada')" class="w3-closebtn">&times;</span>
				<h1>Não Foi Possivel Alterar a Senha: Informações Incorretas</h1>
			</div>
		</div>	
		<!--Alterar Preferências-->
			<div id="ChangePrefer" class="w3-modal">
				<div class="Formular">
					<span onclick="sumir('ChangePrefer')" class="w3-closebtn">&times;</span>
					<h1>Preferências Alteradas com Sucesso</h1>
				</div>
			</div>

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
		<a href="#Preferencias1"><img src="Images/backtotop.png"></a>
	</div>
	<header class="Fixar">
		<nav>
			<ul class="w3-navbar w3-red">
				<li><a href="PaginaInicial.php" class="w3-grey"><img src="Imagens/logo.png" style="width:24px;margin-bottom:-2px;"></a></li>
				<li><a href="PaginaInicial.html">Página Inicial</a></li>
				<li><a href="Favoritos.html">Favoritos</a></li>
				<li><a href="Recomendacoes.html">Recomendações</a></li>
				<li><a href="Artistas.html">Artistas</a></li>
				<li><a href="Genero.html">Gêneros Musicais</a></li>
				<li class="w3-right"><a onclick="aparecer('exit')">Sair</a></li>	
				<li class="w3-right"><a href="#"><?php  echo $_SESSION['Name']; ?> </a></li>						
			</ul>
			
		</nav>
	</header>
	<br/>
	<a name="Preferencias1"></a>
	<h6  class="Invisible">Gernciar Preferências</h6>
	<section id="InterNavegation">
		<nav class="menu">
			<ul class=" w3-navbar w3-card-2 w3-white">
			  <li ><a href="#UltFavoritados">Favoritados Recentemente</a></li>
			  <li><a href="#Migos">Amigos</a></li>
			  <li><a href="#InfCadastradas">Informações Do Usuário</a></li>
			  <li><a href="#AlteraSenha">Alterar Senha</a></li>
			</ul>
		 </nav>
	</section>
	<section id="Preferencias" class="container Gener">
		<h2 >Gernciar Preferências</h2>
		<form action="../Controller/UpdatePrefer.php" method="post">
		<input type="hidden" name="tipo" value="alteraPref">
			<table class="w3-table-all w3-centered">
				<!--A view dos checkbox foi madularida pela classe ExibeCheckbox-->
			<?php	
				$viewCheckbox->exibeTodosselecionados($minhasPreferen);
			?>
			</table>
			<a name="UltFavoritados"></a>
			<button onclick="aparecer('AlterarPrefer')" class="btn w3-btn w3-blue" type="button">Salvar</button>
				<div id="AlterarPrefer" class="w3-modal">
					<div class="Formular">
						<span onclick="sumir('AlterarPrefer')" class="w3-closebtn">&times;</span>
						<h1>Você tem certeza que deseja alterar suas Preferências?</h1>
						<button class="btn5 w3-btn w3-blue" type="submit">Alterar</button>
						<button class="btn5 w3-btn w3-blue" type="reset" onclick="sumir('AlterarPrefer')">Cancelar</button>
					</div>
				</div>
		</form>
		
	</section>
	
	<section class="container UltimosFavorit">
		<div>
			<h2>Ultimos Aritas Favoritados</h2>
			<ul>
			<?php
				$viewFavoritos->exibeX(qtnFavoritos);
			?>
				</li>
			</ul>
			
		</div>
	</section>
	<a name="Migos"></a>
	<button class="Invisible" ></button>
	<section id="Amigos" class="container">
		<div class="AmigosDisplay">
			<h2>Amigos Atuais</h2><br/>
			<ul class="w3-ul w3-border w3-hoverable">
			<?php
			/*Colocando Todos os Amigos do Usuário*/
				$viewMigos->exibeMigos();
			?>
			</ul>
		</div>
		<div id="formMigos">
			<form method="POST" action="#pesquisar">
				<input type="hidden" name="tipo" value="pesquisaMigos">
				<input id="pesquisa2" type="text" name="pesq" class="pesquisaMigos w3-border" placeholder="Pesquisar" required>
				<a href="#pesquisar"  ><input type="submit" value="Pesquisar" class="btn_search"></a>
				<!--onclick="aparecer('resultado')"-->
				<a name="pesquisar"></a>
			</form>
		</div>
		<div id="resultado" class="AmigosDisplay" >
			<h2>Pesquisa</h2><br/>
			<?php
			if(array_key_exists( 'pesq' , $_POST )){
				echo "<a href=\"#Migos\"><span onclick=\"sumir('resultado')\" class=\"y3\">x</span></a>";
			}
			?>

			<!--<a href="#Migos"><span onclick="sumir('resultado')" class="y3">x</span></a>-->
			<ul class="w3-ul w3-border w3-hoverable">
			<?php
			/*Colocando Pesquisa*/
			//array_key_exists(indice, array) verifica se o incice é válido 
			if(array_key_exists( 'pesq' , $_POST )){
				echo "<script>aparecer('resultado')</script>";
				$pesquisa = $_POST['pesq'];
				$viewMigos->exibePesquisa($pesquisa);
			}else{
				echo "<script>sumir('resultado');</script>";
			}

			?>

			</ul>
		</div>
	</section>
	<a name="InfCadastradas"></a>
	<button class="Invisible" ></button>
	<section class="container Information">
		<h2>Informações Cadastradas</h2>
		<br/>
		<ul class="w3-ul w3-border">
			<li><h3>Nome de Usuário: <?php  echo $_SESSION['Name']; ?></h3></li>
			<li><h3>E-mail: <?php  echo $_SESSION['Email']; ?></h3></li>
		</ul>
	</section>
	<section class="container AlterPasword">
		<a name="AlteraSenha"></a>
		<table class="w3-centered">
			<tr>
				<td>
					<h2>Alterar Senha:</h2>
					<form action="../Controller/AlteraSenha.php" method="POST">
						<input type="hidden" name="tipo" value="mudaSenha">
						<label class="w3-text-blue"><b>Senha Atual:</b></label>
      					<input name="senhaAtl" class="inputar w3-input w3-border" type="password" placeholder="Senha Atual">

						<label class="w3-text-blue"><b>Nova Senha:</b></label>
      					<input name="novaSenha" class="inputar w3-input w3-border" type="password" placeholder="Nova Atual">

      					<label class="w3-text-blue"><b>Confirmar Nova Senha:</b></label>
      					<input name="confirmaNovaSenha" class="inputar w3-input w3-border" type="password" placeholder="Confirmar Nova Atual">	
						<button type="button" onclick="aparecer('AlterarSenha')" value="Nenhum" class="btn w3-btn w3-blue">Salvar</button>
							<div id="AlterarSenha" class="w3-modal">
								<div class="Formular">
									<span onclick="sumir('AlterarSenha')" class="w3-closebtn">&times;</span>
									<h1>Você tem certeza que deseja alterar sua senha?</h1>
									<button class="btn5 w3-btn w3-blue" type="submit">Alterar</button>
									<button class="btn5 w3-btn w3-blue" type="reset" onclick="sumir('AlterarSenha')">Cancelar</button>
								</div>
							</div>
					</form>
				</td>
				<td>
					<button onclick="aparecer('exclude')" class=" NoFim btn3 w3-btn w3-red">Cancelar <br/> Conta</button>
				</td>
				
			</tr>
		</table>
			
	</section>			
	<script language="Javascript">
		function sumir(i) {
			document.getElementById(i).style.display = "none";
		}
		
		function aparecer(i) {
			document.getElementById(i).style.display = "initial";
		
		}
	</script>
</body>
</html>