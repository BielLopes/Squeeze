<?php
	require_once "../../Controller/verifica2.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Squeeze Admin</title>
	<link rel="stylesheet" href="../CSS/Admin.css" type="text/css">	
	<link rel="stylesheet" href="../CSS/confirma.css" type="text/css">	
	<link rel="stylesheet" href="../Fontes/stylesheet.css" type="text/css">
	<link rel="stylesheet" href="../CSS/w3.css" type="text/css">
	<meta charset="UTF-8">
</head>
<body>
	<!--Deslogar-->
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


<section style="text-align: center; ">
	<h1 style="font-family: 'Topzera';font-size: 70px">Pagina do Admin</h1>
	<p>Adicione um artista</p>
	<form class="Adicionar" action="addART(1).php" method="post" >
		<input maxlength="20" class="input w3-input" type="text" name="nome" placeholder="Nome"><br>


		<br>
		<h3>Gênero:</h3>
		<br>
		  <select class="input w3-input" list="Gener" name="Generos">
			  <!--Alocar todos os gêneros cadastrados-->
			<option  value="PHP" disabled>Selecione Um Gênero</option>
			<?php
			try{
				$host = 'localhost';
				$usuario = 'root';
				$senha = '';
				$database = 'squeeze';
				$conn= new mysqli($host, $usuario, $senha, $database);

			if($conn->connect_error){
				die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn->connect_error);
			}
				$query = "SELECT Nome, ID_Genero AS ID FROM genero";
				$resultado = $conn->query($query);

				if( mysqli_num_rows($resultado)){
					while($row = mysqli_fetch_assoc($resultado)){
						echo "<option>". $row['Nome']."</option>";
					}
				}
				$conn->close();
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}
			?>
			</select>
  		<br>
		  <button class="btn-add w3-btn w3-red" type="submit">Adicionar</button><br>
	</form>


	
	
	<p>Todos os artistas</p>
	<table class="tabela w3-table-all w3-centered">
	<tr>
		<th>Nome</th>
		<th>Gênero</th>
		<th></th>
		<th></th>
	</tr>

	<!-- Mostrar todos os Artistas -->

	<?php
	$host = 'localhost';
	$usuario = 'root';
	$senha = '';
	$database = 'squeeze';
	$conn= new mysqli($host, $usuario, $senha, $database);


	if($conn->connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
		$query = "SELECT artista.ID_Genero, artista.ID_Artista, artista.Nome, genero.Nome AS NomeG, artista.ID_Artista AS ID FROM artista INNER JOIN genero ON genero.ID_Genero=artista.ID_Genero";
		$resultado = $conn-> query($query);

		if( mysqli_num_rows($resultado)){
			while($row = mysqli_fetch_assoc($resultado)){
				echo "<tr><td>".$row['Nome']."</td><td>".$row['NomeG']."</td>			<td>
				<form action=\"AlteracaoArtist.php\" method=\"get\">
					<input type=\"hidden\" name=\"ID_Artist\" value=\"".$row['ID_Artista']."\">
					<input type=\"hidden\" name=\"nome\" value=\"".$row['Nome']."\">
					<input type=\"hidden\" name=\"nomeG\" value=\"".$row['ID_Genero']."\">
					<button class=\"w3-btn w3-red\" type=\"submit\">Alterar</button>
				</form>
			</td>
				
			<td>
				<form action=\"../Components/Confirmacao.php\" method=\"post\" >
					<input type=\"hidden\" name=\"ID_Artist\" value=\"".$row['ID_Artista']."\">
					<button class=\"w3-btn w3-red\" type=\"submit\">Excluir</button>
				</form>
			</td></tr>";
			}
		}
		$conn->close();
	?>
	</table>

	<?php
	$conn = mysqli_connect("localhost","root","","squeeze");


	if($conn-> connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
		$query = "SELECT artista.NomeA, genero.NomeG FROM artista INNER JOIN genero ON genero.ID_Genero=artista.ID_Genero";
		$resultado = $conn-> query($query);
		$conn->close();

	?>

		<p>Adicione um Gênero</p>
	<form class="Adicionar" action="addGEN.php" method="post" >
		<input maxlength="20" class="input w3-input" type="text" name="Genero" placeholder="Gênero"><br>
		<button class="btn-add w3-btn w3-red" type="submit">Adicionar</button><br>
	</form>
	<p>Todos os Gêneros</p>
	
	<table class="tabela w3-table-all w3-centered">
	<tr>
		<th>Gênero</th>
		<th></th>
		<th></th>
	</tr>
	<?php
	$host = 'localhost';
	$usuario = 'root';
	$senha = '';
	$database = 'squeeze';
	$conn= new mysqli($host, $usuario, $senha, $database);


	if($conn->connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
	else{
		$sql = "SELECT ID_Genero, Nome FROM genero";
		$resultado = $conn-> query($sql);


		if( mysqli_num_rows($resultado)){
			while($row = mysqli_fetch_assoc($resultado)){
				echo "<tr><td>".$row['Nome']."</td><td>
				<form action=\"AlteracaoGen.php\" method=\"post\">
					<input type=\"hidden\" name=\"IDG\" value=\"".$row['ID_Genero']."\">
					<input type=\"hidden\" name=\"nome\" value=\"".$row['Nome']."\">
					<button class=\"w3-btn w3-red\" type=\"submit\">Alterar</button>
				</form>
			</td>
				
			<td>
				<form action=\"../Components/Confirmacao2.php\" method=\"post\" >
					<input type=\"hidden\" name=\"IDG\" value=\"".$row['ID_Genero']."\">
					<button class=\"w3-btn w3-red\" type=\"submit\">Excluir</button>
				</form>
			</td></tr>";
			}
			echo "</table>";
		}
		$conn->close();
	}


	?>
	<br/>
	<br/>
	<br/>
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