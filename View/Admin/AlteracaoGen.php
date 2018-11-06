<?php
	require_once "../../Controller/verifica2.php";
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../Fontes/stylesheet.css" type="text/css">
		<link rel="stylesheet" href="../CSS/Admin.css" type="text/css">
		<link rel="stylesheet" href="../Css/w3.css" type="text/css">
		<link rel="stylesheet" href="../Css/AlteraArtist.css" type="text/css">
		<link rel="stylesheet" href="../Css/Confirma.css" type="text/css">
	<title>Editar Artista</title>
</head>
<body>

<!--Deslogar
			<div id="exit" class="w3-modal">
				<div class="Formular">
					<span onclick="sumir('exit')" class="w3-closebtn">&times;</span>
					<h1>Você tem certeza que deseja Deslogar?</h1>
					<form action="../../Controller/LogOut.php" method="post">
						<input type="hidden" name="logout" value="true">
						<button class="btn5 w3-btn w3-blue" action="">Sair</button>
						<button class="btn5 w3-btn w3-blue" type="reset" onclick="sumir('exit')">Cancelar</button>
					</form>
				</div>
			</div>

<button style="text-decoration: none; text-align: left;margin-left:1%;" onclick="aparecer('exit')" class="Fixar w3-red w3-btn">Sair</button>
-->
<a href="Admin.php"><button style="text-decoration: none; text-align: left;margin-left:1%;margin-rigth: 2%" class="Fixar w3-red w3-btn">Voltar</button></a>

	
<?php
  $ID = $_POST['IDG'];
    $nome = $_POST['nome'];

?>

			
<div class="Formulario">
	<h2>Dados do Genero</h2>
	<form action="alteraGEN.php" method="post">
		<p>Id do Genero : <?php echo "$ID"; ?></p>
		<input  type="hidden" name="IDG" value="<?php echo "$ID"; ?>">
		<input maxlength="15" class="pesquisa" type="text"  name ="nome" placeholder="Nome" value="<?php echo "$nome"; ?>"><br>
  		<br/>
		<button class="btn1 w3-btn w3-blue" type="submit">Alterar</button><br>
	</form>

</div>
		<script language="Javascript">
			function sumir(i) {
			  document.getElementById(i).style.display = "none";
			}
			
			function aparecer(i) {
			  document.getElementById(i).style.display = "initial";
			
			}
		</script>
</div>	
</body>
</html>