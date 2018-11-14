
<?php
    require_once "ExibeUser.php";
    require_once "../DAO/UserDAO.php";
    require_once "../Controller/verifica.php";
    $id_User = $_SESSION['ID'];

    $name = $_GET['name'];
    $viewMigos = new ExibeUser($id_User);
    ?>
        <h2>Pesquisa</h2><br/>
		<a href="#Migos"><span onclick="sumir('resultado')" class="y3">x</span></a>
        <ul class="w3-ul w3-border w3-hoverable">
    <?php
    $viewMigos->exibePesquisa($name);
    ?>
        </ul>