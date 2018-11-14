
<?php	
    $host = 'localhost';
	$usuario = 'root';
	$senha = '';
	$database = 'squeeze';

    $conn= new mysqli($host, $usuario, $senha, $database);

    $pesq = $_GET['gener'];
	if($conn->connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
	else{
		$sql = "SELECT ID_Genero, Nome FROM genero WHERE Nome LIKE '%%$pesq%%'";
		$resultado = $conn-> query($sql);

        ?>
        <table class="tabela w3-table-all w3-centered">
            <tr>
                <th>Gênero</th>
                <th></th>
                <th></th>
            </tr>
        <?php

		if( mysqli_num_rows($resultado)){
			while($row = mysqli_fetch_assoc($resultado)){
				echo "<tr><td>".$row['Nome']."</td><td>
				<form action=\"AlteracaoGen.php\" method=\"post\">
					<input type=\"hidden\" name=\"IDG\" value=\"".$row['ID_Genero']."\">
					<input type=\"hidden\" name=\"nome\" value=\"".$row['Nome']."\">
					<button style=\" border-radius: 10px;\" class=\"w3-btn w3-red\" type=\"submit\">Alterar</button>
				</form>
			</td>
				
			<td>
				<form action=\"../Components/Confirmacao2.php\" method=\"post\" >
					<input type=\"hidden\" name=\"IDG\" value=\"".$row['ID_Genero']."\">
					<button style=\" border-radius: 10px;\" class=\"w3-btn w3-red\" type=\"submit\">Excluir</button>
				</form>
			</td></tr>";
			}
			echo "</table>";
		}
		$conn->close();
	}