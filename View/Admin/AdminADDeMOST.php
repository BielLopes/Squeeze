<!DOCTYPE html>

<html wtx-context="51DE4C06-ED48-4358-8D1E-B337B653AC13"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../CSS/Admin.css" type="text/css">
<link rel="stylesheet" href="../Fontes/stylesheet.css" type="text/css">
<link rel="stylesheet" href="../CSS/w3.css" type="text/css">

	<title>Squeeze Admin</title>
	
</head>
<body>
	<h1 style="font-family: &#39;Topzera&#39;; font-size: 100px;">Página do Administrador</h1>
	<p>Adicione um artista</p>
	<form class="Adicionar" action="addART(1).php" method="post">
		<input class="input w3-input" type="text" name="nome" placeholder="Nome"><br>
		<br>
		<h3>Gênero:</h3>
		<br>
		<input class="input w3-input" list="Gener" name="Generos" >
		  <datalist id="Gener">
			<?php
			$conn = mysqli_connect("localhost","root","","squeeze");


			if($conn->connect_error){
				die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn->connect_error);
			}
				$query = "SELECT NomeG FROM genero";
				$resultado = $conn-> query($query);

				if($resultado-> num_rows > 0 ){
					while($row = $resultado-> fetch_assoc()){
						echo "<option>". $row["NomeG"] . "</option>";
					}
					echo "</datalist>";

				}
				else{
					echo "0 results";
				}
				$conn->close();

			?>
  		<br>
		<input class="btn-add w3-btn w3-red" type="submit" value="Adicionar"><br>
	</form>

	<p>Todos os artistas</p>
	<table class="tabela w3-table-all w3-centered">
		<tbody>
			<table>
				<tr>
					<th>Nome</th>
					<th>Gênero</th>
				</tr>
				<?php
				$conn = mysqli_connect("localhost","root","","squeeze");


				if($conn-> connect_error){
					die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
				}
					$query = "SELECT artista.NomeA, genero.NomeG FROM artista INNER JOIN genero ON genero.ID_Genero=artista.ID_Genero";
					$resultado = $conn-> query($query);

					if($resultado-> num_rows > 0 ){
						while($row = $resultado-> fetch_assoc()){
							echo "<tr><td>". $row["NomeA"] . "</td><td>" .$row["NomeG"]. "</td></tr>";
						}
						echo "</table>";

					}
					else{
						echo "0 results";
					}
					$conn->close();

				?>
				<form action="AlteracaoArtist.html" method="get">
					<input type="hidden" name="ID_Artist" value="PHP">
					<button class="w3-btn w3-red" type="submit">Alterar</button></form></td>
<!--				
			<td>
				<form action="Components/Confirmacao.html" method="get" >
					<button class="w3-btn w3-red" type="submit">Excluir</button>
				</form>
			</td>
-->
		</tr>
	</tbody></table><br>
	
	<p>Adicione um Gênero</p>
	<form class="Adicionar" action="addGEN.php" method="post">
		<input class="input w3-input" type="text" name="Genero" placeholder="Gênero"><br>
		<input class="btn-add w3-btn w3-red" type="submit" value="Adicionar"><br>
	</form>

	<p>Todos os Gêneros</p>
	<table class="tabela2 w3-table-all w3-centered">
		<tbody>
	<tr>
		<th>Gênero</th>
	</tr>
				<?php
				$conn = mysqli_connect("localhost","root","","squeeze");


				if($conn-> connect_error){
					die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
				}
					$query = "SELECT NomeG FROM genero";
					$resultado = $conn-> query($query);

					if($resultado-> num_rows > 0 ){
						while($row = $resultado-> fetch_assoc()){
							echo "<tr><td>". $row["NomeG"] . "</td></tr>";
						}
						echo "</table>";

					}
					else{
						echo "0 results";
					}
					$conn->close();

				?>
				<td>
					<form action="AlteraGene.html" method="get" >
					<button class="w3-btn w3-red" type="submit">Alterar</button>
					</form>
				</td>
<!--
				<td>
				<form action="Components/Confirmacao.html" method="get" >
					<button class="w3-btn w3-red" type="submit">Excluir</button>
					</form> 	
				</td>
-->
			</tr>
		</tbody>
	</table><br><br><br>

	<button style="text-decoration: none;" class="w3-red w3-btn"><a href="">Sair</a></button>


</body></html>