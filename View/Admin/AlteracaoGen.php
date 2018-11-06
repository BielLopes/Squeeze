<?php
	require_once "../../Controller/verifica2.php";
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../Fontes/stylesheet.css" type="text/css">
		<link rel="stylesheet" href="../Css/w3.css" type="text/css">
		<link rel="stylesheet" href="../Css/AlteraArtist.css" type="text/css">
		<link rel="stylesheet" href="../Css/Confirma.css" type="text/css">
	<title>Editar Artista</title>
</head>
<body>
	
<?php
  $ID = $_POST['IDG'];
    $nome = $_POST['nome'];

?>

			
<div class="Formulario">
	<h2>Dados do Genero</h2>
	<form action="alteraGEN.php" method="post">
		<p>Id do Genero : <?php echo "$ID"; ?></p>
		<input maxlength="20" type="hidden" name="IDG" value="<?php echo "$ID"; ?>">
		<input class="pesquisa" type="text"  name ="nome" placeholder="Nome" value="<?php echo "$nome"; ?>"><br>
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