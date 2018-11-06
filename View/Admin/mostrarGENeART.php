<?php
	require_once "../../Controller/verifica2.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>

	<!-- Mostrar todos os Generos -->
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

	<table>
	<tr>
		<th>Nome</th>
		<th>Gênero</th>
	</tr>

	<!-- Mostrar todos os Artistas -->

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

	<?php
	$conn = mysqli_connect("localhost","root","","squeeze");


	if($conn-> connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
		$query = "SELECT artista.NomeA, genero.NomeG FROM artista INNER JOIN genero ON genero.ID_Genero=artista.ID_Genero";
		$resultado = $conn-> query($query);
		$conn->close();

	?>


	<!-- Inserir Genero -->
	<p>Adicione um Gênero</p>
	<form action="hue.php" method="post" >
		<input type="text" name="Genero" placeholder="Gênero"><br>
		<input type="submit" value="Insert"><br>
	</form>



</body> 
</html>