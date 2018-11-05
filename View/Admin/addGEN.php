<?php

	$Name = filter_input(INPUT_POST, 'Genero');

	if(!empty($Name)){

		$conn = new mysqli("localhost","root","","squeeze");

		if($conn-> connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
		}else{
			$sql = "INSERT INTO genero(Nome) VALUES ('$Name' )";
		
			if($conn->query($sql)){
				echo "New Record Inserted";
			}else{
				echo "Error: ". $sql. "<br>". $conn->error;
			}
			$conn->close();
		}
	}else{
		echo "Empty";
		die();
	}

?>