<?php
	require_once "../../Controller/verifica2.php";
?>

<!DOCTYPE html>
<html>
<head>	
	<link rel="stylesheet" href="../Css/Confirma.css" type="text/css">	
	<link rel="stylesheet" href="../Fontes/stylesheet.css" type="text/css">
	<script type="text/javascript" src="js/scripts.js"></script>
	<link rel="stylesheet" href="../Css/w3.css" type="text/css">
	<link rel="stylesheet" href="../Css/Admin.css" type="text/css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
	<meta charset="UTF-8">
	<title>Squeeze Admin</title>
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
						<button class="btn5 w3-btn w3-blue" type="reset" onclick="sumir('exit')">Cancelar
						</button>
					</form>
				</div>
			</div>

<button style="text-decoration: none; text-align: left;margin-left:1%; border-radius: 10px;" onclick="aparecer('exit')" class="Fixar w3-red w3-btn">Sair</button>


<section style="text-align: center; ">
	<br/>
	<h1 style="font-family: 'Topzera';font-size: 70px">Pagina do Admin</h1>
	<p>Adicione um artista</p>
	<form class="Adicionar" action="addART(1).php" method="post" >
		<input maxlength="12" class="input w3-input" type="text" name="nome" placeholder="Nome"><br>


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


	
	<br/>
	<br/>
	<p>Pesquisar Artistas</p>
	<div style="width: 70%; margin-left: 15%;" class="input-group mb-3">
  		<input onkeyup="buscarArtista()" id="ajaxArtista" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's 	username" aria-describedby="basic-addon2">
  		<div class="input-group-append">
    		<button onclick="buscarArtista()" class="btn btn-outline-secondary" type="button" id="UsarAjax2">Pesquisar</button>
  		</div>
	</div>
	<div id="reusultadoArtista">
	<!--<tr><td>".$row['Nome']."</td><td>".$row['NomeG']."</td>			<td>
				<form action="AlteracaoArtist.php\" method="get\">
					<input type="hidden" name="ID_Artist\" value="0">
					<input type="hidden" name="nome\" value="0">
					<input type="hidden" name="nomeG" value="0">
					<button class="w3-btn w3-red" type="submit">Alterar</button>
				</form>
			</td>
				Deu certo, Magavilha
			<td>
				<form action="../Components/Confirmacao.php" method="post" >
					<input type="hidden" name="ID_Artist" value="0">
					<button class="w3-btn w3-red" type="submit">Excluir</button>
				</form>
			</td></tr>
	-->	
	</div>

	<!-- Mostrar todos os Artistas -->

	<!--	<?php/*
	
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
	

	<?php
	$conn = mysqli_connect("localhost","root","","squeeze");


	if($conn-> connect_error){
		die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
	}
		$query = "SELECT artista.NomeA, genero.NomeG FROM artista INNER JOIN genero ON genero.ID_Genero=artista.ID_Genero";
		$resultado = $conn-> query($query);
		$conn->close();
*/
	?>-->
<br/>
	<br/>
	<br/>
	<br/>
		<p>Adicione um Gênero</p>
	<form class="Adicionar" action="addGEN.php" method="post" >
		<input style="width: 60%; margin-left: 20%;" maxlength="15" class="input w3-input" type="text" name="Genero" placeholder="Gênero"><br>
		<button class="btn-add w3-btn w3-red" type="submit">Adicionar</button><br>
	</form>

	<br/>
	<br/>
	<br/>
	<br/>

	<p>Pesquisar Gêneros</p>
	<div style="width: 70%; margin-left: 15%;" class="input-group mb-3">
  		<input onkeyup="buscarGenero()" id="ajaxGenero" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's 	username" aria-describedby="basic-addon2">
  		<div class="input-group-append">
    		<button onclick="buscarGenero()" class="btn btn-outline-secondary" type="button" id="UsarAjax2">Pesquisar</button>
  		</div>
	</div>
	<div id="reusultadoGenero">
		
	</div>
	<!--
	<?php
	/*
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

	*/
	?>
	-->
	<br/>
	<br/>
	<br/>

</section>
	<script language="Javascript">
		/*
		function buscarArtista(){
			var page = "buscaArtista.php";
			var artista = document.getElementById('UsarAjax').value;
			var exibeResultado = document.getElementById('pesquisaArtista');
			if(artista != "" && artista != null && artista.length >= 3){
				$.ajax
					({
						type: 'POST',
						dataType: 'html',
						url: page,
						beforeSend: function (){
							exibeResultado.html("<tr><td>Carregando ...</td><td>Carregando ...</td><td>Carregando ...</td><td>Carregando ...</td></tr>");
						},
						data: {palavra: artista},
						success: function (msg){
							exibeResultado.html(msg);
						}
					});
			}
		}
		
		
		$('#UsarAjax').keyup(function() {
			buscarArtista($("#UsarAjax").val())
		});

		
		$('#UsarAjax2').click(function() {
			buscarArtista($("#UsarAjax").val())
		});
		


		function sumir(i) {
			document.getElementById(i).style.display = "none";
		}
		
		function aparecer(i) {
			document.getElementById(i).style.display = "initial";
		
		}*/
	</script>

	<!--
	<script>
    $(document).ready(function()
    {
        $('#termo_busca').keyup(function()
        {
            $.ajax({
              type: 'POST',
              url:  'busca_ajax.php',
              data: {
                  nome: $("#termo_busca").val()
              },
              success: function(data) 
              {
                $('#listafornecedores').html(data);
              }
            });
        });

    });
    </script>
	-->
</body>
</html>