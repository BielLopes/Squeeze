
<?php
	
	$Name = filter_input(INPUT_POST, 'nome');
	$Genero = filter_input(INPUT_POST, 'Generos');

	if(!empty($Name)){
		if(!empty($Genero)){
			$host = 'localhost';
			$usuario = 'root';
			$senha = '';
			$database = 'squeeze';
			$conn= new mysqli($host, $usuario, $senha, $database);

			if($conn->connect_error){
				die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn->connect_error);
			}
			else{

				$sql = "INSERT INTO artista (Nome,ID_Genero) SELECT '$Name', ID_Genero FROM genero WHERE Nome = '$Genero'";
			
				if($conn->query($sql)){
					echo "New Record Inserted";
				}else{
					echo "Error: ". $sql. "<br>". $conn->error;
				}
				$conn->close();
			}

		}else{
		echo "Empty GEN";
		die();
		}
	}else{
		echo "Empty NAME";
		die();
	}

?>