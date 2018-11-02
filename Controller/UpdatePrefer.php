<?php
    require_once "verifica.php";
    require_once '../Model/User.php';
    require_once '../DAO/PreferenciaDAO.php';
    require_once '../Model/Genero.php';
    require_once '../DAO/GeneroDAO.php';

    $consulta_Banco = new GeneroDAO();
    $todosOsGeneros = $consulta_Banco->retornaAll();

    $id_User = $_SESSION['ID'];
    $prefDAO = new PreferenciaDAO();
    $minhasPreferencias = $prefDAO->preferenciasDoUsuario($id_User);

    if($_POST['tipo'] == "alteraPref"){
        
        $marcados = array();
        foreach ($todosOsGeneros as $genero) {
            if(isset($_POST[$genero->getId()]))
            {
                array_push($marcados, $genero->getId());
            }
        }

        foreach ($minhasPreferencias as $id) {
            $prefDAO->deletaPreferencia($id_User, $id);
        }

        foreach ($marcados as $id) {
            $prefDAO->criaPreferencia($id_User, $id);
        }

        echo "<script>location.href='../PaginaInicial.php';</script>";

    }else{
        echo "<script>alert('Você não deveria estar aqui!!!!!!');</script>";
        echo "<script>location.href='../HomePage.html';</script>";
    }