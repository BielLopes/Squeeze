<?php
	require_once "../../Controller/verifica2.php";
?>

<?php
		$host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $database = 'squeeze';
        $conn= new mysqli($host, $usuario, $senha, $database);

    $ID = $_POST['IDG'];
        

        if($conn->connect_error){
            die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
        }

            $query = "DELETE FROM artista WHERE ID_Artista = $ID";
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