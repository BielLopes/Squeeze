<?php
	require_once "../../Controller/verifica2.php";


	$host = 'localhost';
	$usuario = 'root';
	$senha = '';
	$database = 'squeeze';
	$conn= new mysqli($host, $usuario, $senha, $database);

	?>
	<table class="tabela w3-table-all w3-centered">
	<tr>
		<th>Nome</th>
		<th>Gênero</th>
		<th></th>
		<th></th>
	</tr>
	<?php

	$pesq = $_GET['artist'];
	if($conn->connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
		$query = "SELECT artista.ID_Genero, artista.ID_Artista, artista.Nome, genero.Nome AS NomeG, artista.ID_Artista AS ID FROM artista INNER JOIN genero ON genero.ID_Genero=artista.ID_Genero WHERE artista.Nome LIKE '%%$pesq%%'";
		$resultado = $conn-> query($query);

		if( mysqli_num_rows($resultado)){
			while($row = mysqli_fetch_assoc($resultado)){
				echo "<tr><td>".$row['Nome']."</td><td>".$row['NomeG']."</td>			<td>
				<form action=\"AlteracaoArtist.php\" method=\"get\">
					<input type=\"hidden\" name=\"ID_Artist\" value=\"".$row['ID_Artista']."\">
					<input type=\"hidden\" name=\"nome\" value=\"".$row['Nome']."\">
					<input type=\"hidden\" name=\"nomeG\" value=\"".$row['ID_Genero']."\">
					<button style=\" border-radius: 10px;\" class=\"w3-btn w3-red\" type=\"submit\">Alterar</button>
				</form>
			</td>
				
			<td>
				<form action=\"../Components/Confirmacao.php\" method=\"post\" >
					<input type=\"hidden\" name=\"ID_Artist\" value=\"".$row['ID_Artista']."\">
					<button style=\" border-radius: 10px;\" class=\"w3-btn w3-red\" type=\"submit\">Excluir</button>
				</form>
			</td></tr>";
			}
		}
		$conn->close();
	?>
	</table>
	<?php
	/*$conn = mysqli_connect("localhost","root","","squeeze");


	if($conn-> connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
		$query = "SELECT artista.NomeA, genero.NomeG FROM artista INNER JOIN genero ON genero.ID_Genero=artista.ID_Genero";
		$resultado = $conn-> query($query);
		$conn->close();
*/
	?>