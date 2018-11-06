<?php
	require_once "../../Controller/verifica2.php";
?>

<?php

	$Name = filter_input(INPUT_POST, 'Genero');

	if(!empty($Name)){

		$conn = new mysqli("localhost","root","","squeeze");

		if($conn-> connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
		}else{
			$sql = "INSERT INTO genero(Nome) VALUES ('$Name' )";
		
			if($conn->query($sql)){
				$conn->close();
				echo "<script>alert('Adicionado com sucesso!');</script>";
                echo "<script>location.href='Admin.php';</script>";
			}else{
				$conn->close();
				echo "<script>alert('Falha ao Adicionar!');</script>";
                echo "<script>location.href='Admin.php';</script>";
				echo "Error: ". $sql. "<br>". $conn->error;
			}
			
		}
	}else{
		echo "Empty";
		die();
	}

?>