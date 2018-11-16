<?php
    require_once "../Controller/verifica.php";
    require_once "../DAO/FavoritoDAO.php";
    require_once "../DAO/ArtistaDAO.php";
    require_once "../DAO/GeneroDAO.php";
    require_once "../Model/Favorito.php";
    require_once "../Model/Artista.php";

    $id_User = $_SESSION['ID'];
    $id_Artista = $_GET['id'];
    $gerenciaFavorito = new FavoritoDAO($id_User);
    $favorito = new Favorito();
    $acessoGenero = new GeneroDAO();
    $favorito->setIdUser($id_User);
    $favorito->setIdArtista($id_Artista);
    

    $acessoArtista = new ArtistaDAO();

    if($_GET['tipo'] == 'like'){
        $bol = $gerenciaFavorito->include($favorito);
        if($bol){
            $buton = "deslike";
            $artista = $acessoArtista->porId($id_Artista);
            $migos = $gerenciaFavorito->migosFavoritaram($artista->getId());
            $genero = $acessoGenero->retornaNomePorID($artista->getId_Genero());
            $tip = "tip";
            $order = "ordem";
            ?>
                <img src="Images/Artista.jpg">
                <h1><?php echo $artista->getName();?></h1>
                <input type="hidden" id="<?php echo $artista->getId(); echo $tip?>" name="tipo" value="<?php echo $buton;?>">
                <input type="hidden" name="id" value="<?php echo $artista->getId();?>">
                <button class="btn2 w3-red" type="button" onclick="reloadArt('<?php echo $artista->getId(); echo $order;?>', '<?php echo $artista->getId(); echo $tip;?>', '<?php echo $artista->getId();?>');">
                    <img src="Images/<?php echo $buton;?>.png">
                </button>
                <nav>
                    <ul >
                        <li>Gênero: <?php echo $genero;?></li>	
                        <li >Amigos que Favoritaram
                        <ul class="w3-ul w3-border">
                        <?php
                            if(count($migos) == 0){
                                echo"<li>Nenhum Amigo Favoritou Esse Artista!</li>";
                            }
                            foreach($migos as $nameMigo){
                                echo"<li>$nameMigo</li>";
                            }    
                        ?>
                        </ul>
                        </li>
                    </ul>
                </nav>
            <?php
        }else{
            echo "<script>alert('Não foi possivel Favoritar');</script>";
        }
    }
    
    if($_GET['tipo'] == 'deslike'){
        $bol = $gerenciaFavorito->delete($favorito);
        if($bol){
            $buton = "like";
            $artista = $acessoArtista->porId($id_Artista);
            $migos = $gerenciaFavorito->migosFavoritaram($artista->getId());
            $genero = $acessoGenero->retornaNomePorID($artista->getId_Genero());
            $tip = "tip";
            $order = "ordem";
            ?>
                <img src="Images/Artista.jpg">
                <h1><?php echo $artista->getName();?></h1>
                <input type="hidden" id="<?php echo $artista->getId(); echo $tip?>" name="tipo" value="<?php echo $buton;?>">
                <input type="hidden" name="id" value="<?php echo $artista->getId();?>">
                <button class="btn2 w3-red" type="button" onclick="reloadArt('<?php echo $artista->getId(); echo $order;?>', '<?php echo $artista->getId(); echo $tip;?>', '<?php echo $artista->getId();?>');">
                    <img src="Images/<?php echo $buton;?>.png">
                </button>
                <nav>
                    <ul >
                        <li>Gênero: <?php echo $genero;?></li>	
                        <li >Amigos que Favoritaram
                        <ul class="w3-ul w3-border">
                        <?php
                            if(count($migos) == 0){
                                echo"<li>Nenhum Amigo Favoritou Esse Artista!</li>";
                            }
                            foreach($migos as $nameMigo){
                                echo"<li>$nameMigo</li>";
                            }    
                        ?>
                        </ul>
                        </li>
                    </ul>
                </nav>
            <?php
        }else{
            echo "<script>alert('Não foi possivel Desfavoritar');</script>";
        }
    }
