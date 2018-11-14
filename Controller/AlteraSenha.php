<?php
    include "verifica.php";
    require_once '../Model/User.php';
    require_once '../DAO/UserDAO.php';

    $mudaSenha = new UserDAO();

    if($_POST['tipo'] == "mudaSenha"){
        $senhaAtual = crypt($_POST['senhaAtl'], "sqz");
        $novaSenha = $_POST['novaSenha'];
        $confirmaNovaSenha = $_POST['confirmaNovaSenha'];

        if($novaSenha != $confirmaNovaSenha){
            echo "<script>alert('Senha Atual Incorreta!');</script>";
            echo "<script>location.href='../View/PaginaInicial.php#AlteraSenha';</script>";
        }

        if($senhaAtual != $_SESSION['Senha']){
            echo "<script>alert('As Senhas não Batem!');</script>";
            echo "<script>location.href='../View/PaginaInicial.php#AlteraSenha';</script>";
        }

        $novaSenha = crypt($novaSenha, "sqz");
        $changes = new User($_SESSION['Name'], $_SESSION['Email'], $novaSenha, $_SESSION['Login']);
        $changes->setIdUser($_SESSION['ID']);
        $bol = $mudaSenha->updateUser($changes);

        if($bol){
            $_SESSION['Senha'] = $novaSenha;
            echo "<script>alert('SENHA ALTERADO COM SUCESSO!');</script>";
            echo "<script>location.href='../View/PaginaInicial.php#AlteraSenha';</script>";
        }else{
            echo "<script>alert('ERRO AO ALTERAR SENHA!');</script>";
            echo "<script>location.href='../View/PaginaInicial.php#AlteraSenha';</script>";
        }

    }