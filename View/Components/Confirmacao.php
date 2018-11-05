<!DOCTYPE html5>
<html>
<head>
	<meta charset="UTF-8">
  <link rel="stylesheet" href="../Fontes/stylesheet.css" type="text/css">
  <link rel="stylesheet" href="../Css/w3.css" type="text/css" >
  <link rel="stylesheet" href="../Css/Confirma.css" type="text/css">
	<title>Squeeze</title>	
</head>
<?php
    $ID = $_POST['ID_Artist'];
?>
<body>
		<div class="Formular" style="margin-top:5%;" method="post" action="../Admin/delGEN.php">
			<h1>Você tem certeza que deseja excluir isso?</h1>
			<form action="../Admin/delGEN.php" method="post">
				<input type="hidden" name="IDG" value="<?php echo $ID ?>">
				<button class="btn5 w3-btn w3-blue" type="submit">Deletar</button>
				<a href="../Admin/Admin.php"><button class="btn5 w3-btn w3-blue" type="reset">Cancelar</button></a>
			</form>
		</div>
</body>
</html>