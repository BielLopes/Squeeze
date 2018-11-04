<?php

    require_once "verifica.php";
    require_once "../DAO/MigoDAO.php";
    require_once "../Model/Migo.php";

    /*error_reporting(0);
	ini_set('display_errors', FALSE);*/

    $mudaMigo = new MigoDAO();

    $id_user = $_POST['ID_User'];
    $id_migo = $_POST['ID_Migo'];
    $amizade = new Migo($id_user, $id_migo);

    if($_POST['tipo'] == "Add"){
        $bol = $mudaMigo->gosteiDesse($amizade);
        if($bol){
            echo "<script>alert('Amizade criada com sucesso');</script>";
        }else{
            echo "<script>alert('Não foi possivel criar laços de amizade');</script>";
        }
        echo "<script>location.href='../View/PaginaInicial.php#Migos'</script>";
    }
    
    if($_POST['tipo'] == "Delete"){
        $bol = $mudaMigo->odeioEsse($amizade);
        if($bol){
            echo "<script>alert('Removido com sucesso');</script>";
        }else{
            echo "<script>alert('Não foi possivel remover');</script>";
        }
        echo "<script>location.href='../View/PaginaInicial.php#Migos'</script>";
    }