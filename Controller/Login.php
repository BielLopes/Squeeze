<?php
    require_once '../Model/User.php';
    require_once '../DAO/UserDAO.php';

    $logaDao = new UserDAO();


    if($_POST['tipo'] == "Login"){
        /*Primeiramente apenas os dados pessoais, depois as preferências*/
        $login = $_POST['login'];
        $senha =  crypt($_POST['Senha'], "sqz");

        $exite = $logaDao->verificaLogin($login);

        if($exite){

            echo "<script>alert('Login e/ou Senha Incorreto(s)');</script>";
            echo "<script>location.href='../HomePage.html';</script>";

        }else{

            $logaUser = $logaDao->buscarPorLogin($login);

            if($senha == $logaUser->getSenha()){
                
                /*Iniciando Uma Seção Para o Usuário*/
                session_start();
                $_SESSION['Usuario'] = $logaUser;
                $_SESSION['Name'] = $logaUser->getNmUser();
                $_SESSION['ID'] = $logaUser->getIdUser();
                $_SESSION['Senha'] = $logaUser->getSenha();
                $_SESSION['Email'] = $logaUser->getEmail();
                $_SESSION['Login'] = $logaUser->getLogin();
                echo "<script>location.href='../View/PaginaInicial.php';</script>";

                }else{
                    echo "<script>alert('Login e/ou Senha Incorreto(s)');</script>";
                    echo "<script>location.href='../HomePage.html';</script>";
                }
                    
            
        }
    }