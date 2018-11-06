<?php
	require_once "../../Controller/verifica2.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<!-- Inserir Genero -->
	<!--
	<p>Adicione um Gênero</p>
	<form action="hue.php" method="post" >
		<input type="text" name="Genero" placeholder="Gênero"><br>
		<input type="submit" value="Insert"><br>
	</form>
	-->


	<p>Adicione um artista</p>
	<form class="Adicionar" action="hue.php" method="post" >
		<input class="input w3-input" type="text" name="nome" placeholder="Nome"><br>


		<br>
		<h3>Gênero:</h3>
		<br>
		<input class="input w3-input" list="Gener" name="Generos" >
		  <datalist id="Gener">
			<?php
			$conn = mysqli_connect("localhost","root","","squeeze");


			if($conn-> connect_error){
				die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
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
		<input type="submit" value="Enviar">
	</form>

</body>
</html> 