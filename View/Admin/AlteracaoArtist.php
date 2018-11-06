<?php
	require_once "../../Controller/verifica2.php";
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../Fontes/stylesheet.css" type="text/css">
        <link rel="stylesheet" href="../CSS/Admin.css" type="text/css">
		<link rel="stylesheet" href="../Css/w3.css" type="text/css">
		<link rel="stylesheet" href="../Css/AlteraArtist.css" type="text/css">
		<link rel="stylesheet" href="../Css/Confirma.css" type="text/css">
	<title>Editar Artista</title>
</head>
<body>

	<!--Deslogar
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
-->
<a href="Admin.php"><button style="text-decoration: none; text-align: left;margin-left:1%;margin-rigth: 2%" class="Fixar w3-red w3-btn">Voltar</button></a>
	
<?php
  $ID = $_GET['ID_Artist'];
    $nome = $_GET['nome'];
   $IDG = $_GET['nomeG'];
?>

			
<div class="Formulario">
	<h2>Dados do Artista</h2>
	<form action="alteraART.php" method="post">
		<p>Id do Artista : <?php echo "$ID"; ?></p>
		<input type="hidden" name="ID_Artista" value="<?php echo "$ID"; ?>">
		<input maxlength="12" class="pesquisa" type="text"  name ="nome" placeholder="Nome" value="<?php echo "$nome"; ?>"><br>
		<h3>Gênero Do Artista:</h3>
		  <select class="pesquisa" name="Generos">
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
                    $query = "SELECT Nome, ID_Genero FROM genero";
                    $resultado = $conn->query($query);


                    if( mysqli_num_rows($resultado)){
                        
                        while($row = mysqli_fetch_assoc($resultado)){
                            if( $IDG == $row['ID_Genero']){
                                echo "<option  selected>". $row['Nome']."</option>";
                            }else{
                                echo "<option >". $row['Nome']."</option>"; 
                            }
                        }

                    }

                    $conn->close();
                }catch(Exception $ex){
                    echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
                }
                ?>
		  </select>
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