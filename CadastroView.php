<?php
	require_once 'Model/Genero.php';
	require_once 'DAO/GeneroDAO.php';

	$consulta_Banco = new GeneroDAO();
	$todosOsGeneros = $consulta_Banco->retornaAll();
	/*var_dump($todosOsGeneros);
	echo "<br/> ";
	echo  1;
	
	foreach ($todosOsGeneros as $genero) {
		echo "<br/> ";
		echo $genero->getName();
	}*/
	$fecha = false;
?>

<!DOCTYPE html5>
<html>
<head>
		<meta charset="utf-8">
	  <link rel="stylesheet" href="Fontes/stylesheet.css" type="text/css">
	  <link rel="stylesheet" href="Css/w3.css" type="text/css">
	  <link rel="stylesheet" href="Css/Cadastro.css" type="text/css">
	<title>Squeeze Cadastro</title>
	
</head>
<body>
	<a href="HomePage.html"><button class="Fixar w3-btn w3-red">Voltar</button></a>
	<br/>
	    
	  <div class="Formulario">
	    <h2>Cadastrar</h2>
	    <form  name="e-mail" action="Controller/Cadastro.php" method="post">
				<input type="hidden" name="tipo" value="Cadastro">
	     	<input required type="text" class="pesquisa w3-input w3-border" name="nome" placeholder="Nome"/><br/>
	      <input required type="email" class="pesquisa w3-input w3-border" name="e-mail" placeholder="e-mail"/><br/>
	      <input required type="text" class="pesquisa w3-input w3-border" name="login" placeholder="Login"/><br/>
	      <input required type="password" class="pesquisa w3-input w3-border" name="Senha" placeholder="Senha"/><br/>
	      <input required type="password" class="pesquisa w3-input w3-border" name="ConfSenha" placeholder="Confirmar senha"/><br/>
	      <h3 id="poop">Selecione seus gêneros musicais favoritos</h3>
	      <table class="w3-table-all w3-centered">

			<?php   foreach ($todosOsGeneros as $genero) {
					if(!$fecha){
						$fecha = true;
						?>
					<tr>
					<td>
						<input type="checkbox" name="<?php echo $genero->getId(); ?>" value="<?php echo $genero->getName(); ?>" ><?php echo $genero->getName(); ?>
					</td>
					<?php
					}else{
						$fecha = false;
					?>					
					<td>
						<input type="checkbox" name="<?php echo $genero->getId(); ?>" value="<?php echo $genero->getName(); ?>" ><?php echo $genero->getName(); ?>
					</td>
					</tr>
				<?php

					}
				}
				if($fecha){
					echo "</tr>";
					$fecha = false;
				}
			
			?>
			</table>
	      <button type="submit" class="btn w3-btn w3-red w3-round" name="submeter">Cadastrar</button>
	    </form>
	  </div>
		
	</footer>
</body>
</html>