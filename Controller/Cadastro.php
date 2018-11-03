<?php
    include "verifica.php";
    require_once '../Model/User.php';
    require_once '../DAO/UserDAO.php';
    require_once '../Model/Genero.php';
    require_once '../DAO/PreferenciaDAO.php';
    require_once '../DAO/GeneroDAO.php';

	$consulta_Banco = new GeneroDAO();
	$todosOsGeneros = $consulta_Banco->retornaAll();

    $novoDao = new UserDAO();


    if($_POST['tipo'] == "Cadastro"){
        /*Primeiramente apenas os dados pessoais, depois as preferências*/
        $nome = $_POST['nome'];
        $email = $_POST['e-mail'];
        $login = $_POST['login'];
        $senha =  crypt($_POST['Senha'], "sqz");
        $confSenha = crypt($_POST['Senha'], "sqz");

        $exite = $novoDao->verificaLogin($login);

        /*Carregndo um arrai com todas as preferências selecionadas*/
        $marcados = array();
        foreach ($todosOsGeneros as $genero) {
            if(isset($_POST[$genero->getId()]))
            {
                array_push($marcados, $genero->getId());
            }
        }

        if($exite){

            $NovoUser = new User($nome, $email, $senha, $login);


            if($senha == $confSenha){
                $deuCerto = $novoDao->Novo($NovoUser);

                $user = $novoDao->buscarPorLogin($login);
                $id_User = $user->getIdUser();

                $preferencia = new PreferenciaDAO();

                if($deuCerto){

                    foreach ($marcados as $id) {
                        $preferencia->criaPreferencia($id_User, $id);
                    }

                    echo "<script>alert('Bem Vindo à Comunidade Squeeze');</script>";
                    echo "<script>location.href='../HomePage.html';</script>";
                }else{
                    echo "<script>alert('Não Foi Possivel Cadastrar-te! Tente Novamente!');</script>";
                    echo "<script>location.href='../CadastroView.php';</script>";
                }
                }else{
                    echo "<script>alert('As Senhas não Batem!');</script>";
                    echo "<script>location.href='../CadastroView.php';</script>";
                }
                    
        }else{
            echo "<script>alert('O Login Escolhido Não Está Disponível! Tente Outro Por Favor');</script>";
            echo "<script>location.href='../CadastroView.php';</script>";
        }
    }