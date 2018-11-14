<?php
	require_once "../../Controller/verifica2.php";
?>

<?php
		$host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $database = 'squeeze';
        $conn= new mysqli($host, $usuario, $senha, $database);

    $nome = $_POST['nome'];
    $ID = $_POST['IDG'];
        

        if($conn->connect_error){
            die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
        }

            $query = "UPDATE genero SET Nome ='$nome' WHERE ID_Genero = $ID;";
            if($conn->query($query)){
                echo "<script>alert('TOP');</script>";
                echo "<script>location.href='Admin.php';</script>";
            }else{
                echo "Error: ". $query. "<br>". $conn->error;
                echo "<script>alert('TOP');</script>";
                echo "<script>location.href='Admin.php';</script>";
            }



            $conn->close();

?>