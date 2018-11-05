<?php
		$host = 'localhost';
        $usuario = 'root';
        $senha = '';
        $database = 'squeeze';
        $conn= new mysqli($host, $usuario, $senha, $database);

    $nome = $_POST['nome'];
    $Gen = $_POST['Generos'];
    $ID = $_POST['ID_Artista'];
        

        if($conn->connect_error){
            die("Ocorreu um erro ao tentar se conectar com o banco de dados MYSQL: ".$conn-> connect_error);
        }
            $busca = "SELECT ID_Genero FROM genero WHERE Nome = '$Gen'";
            $resultado = $conn->query($busca);
            $row = mysqli_fetch_assoc($resultado);
            $IDG = $row['ID_Genero'];

            $query = "UPDATE artista SET Nome ='$nome',ID_Genero = $IDG WHERE ID_Artista = $ID;";
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