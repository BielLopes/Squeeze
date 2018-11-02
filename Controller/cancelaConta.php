<?php
    require_once "verifica.php";
    require_once '../DAO/UserDAO.php';

    $UsuarioDao = new UserDAO();
    $id_User = $_SESSION['ID'];

    if($_POST['tipo'] == "deleta"){
        
        if($UsuarioDao->Deleta($id_User)){
            echo "<script>location.href='../HomePage.html';</script>";
        }else{
            echo "<script>alert('Olá, não vai embora não querido! Sorry');</script>";
            echo "<script>location.href='../PaginaInicial.php';</script>";
        }
    }

?>