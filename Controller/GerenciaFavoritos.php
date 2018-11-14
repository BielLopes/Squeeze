<?php
    require_once "verifica.php";
    require_once "../DAO/FavoritoDAO.php";
    require_once "../Model/Favorito.php";

    /*error_reporting(0);
    ini_set('display_errors', FALSE);*/
    $id_User = $_SESSION['ID'];
    $id_Artista = $_GET['id'];

    $gerenciaFavorito = new FavoritoDAO($id_User);
    $favorito = new Favorito();
    $favorito->setIdUser($id_User);
	$favorito->setIdArtista($id_Artista);

    if($_GET['tipo'] == "like"){
        $bol = $gerenciaFavorito->include($favorito);
        if($bol){
            echo "<script>alert('Favoritado com Sucesso');</script>";
        }else{
            echo "<script>alert('Não foi possivel Favoritar');</script>";
        }
        echo "<script>location.href='../View/PaginaInicial.php#UltFavoritados'</script>";
    }
    
    if($_GET['tipo'] == "deslike"){
        $bol = $gerenciaFavorito->delete($favorito);
        if($bol){
            echo "<script>alert('Desfavritado com Sucesso');</script>";
        }else{
            echo "<script>alert('Não foi possivel Desfavoritar');</script>";
        }
        echo "<script>location.href='../View/PaginaInicial.php#UltFavoritados'</script>";
    }

    echo "<script>location.href='../View/PaginaInicial.php#UltFavoritados'</script>";