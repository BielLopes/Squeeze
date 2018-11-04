<?php

require_once "../DAO/FavoritoDAO.php";
    
    class ExibeFavorito{

        private $acessoFavoritos;
        private $acessoGenero;
        private $ID_User;
        function __construct($_id_User){
            $this->ID_User = $_id_User;
        }

        function exibeX($x){
            $acessoFavoritos = new FavoritoDAO($this->ID_User);
            $todosFavoritos = $acessoFavoritos->allEmOrdem();
            $acessoGenero = new GeneroDAO();
            $i = 0;
            $bol = FALSE;
            $buton = "";
            $genero = "";
            $migos = array();
            if(count($todosFavoritos) == 0){
                echo "<li><h1 style=\"text-align: center;\">Nenhum Artista Favoritado</h1></li>";
            }
            foreach($todosFavoritos as $artista){
                if($i >= $x){
                    break;
                }
                $i++;
                $bol = $acessoFavoritos->isFavorited($artista->getId());
                if($bol){
                    $buton = "deslike";
                }else{
                    $buton = "like";
                }
                $genero = $acessoGenero->retornaNomePorID($artista->getId_Genero());
                $migos = $acessoFavoritos->migosFavoritaram($artista->getId());
                ?>
                <li>
					<div class="component">
						<img src="../Images/Artista.jpg">
						<h1><?php echo $artista->getName();?></h1>
						<form method="GET" action="../Controller/GerenciaFavoritos.php">
                            <input type="hidden" name="tipo" value="<?php echo $buton;?>">
                            <input type="hidden" name="id" value="<?php echo $artista->getId();?>">
							<button class="btn2 w3-red" type="submit">
								<img src="../Images/<?php echo $buton;?>.png">
							</button>
						</form>
						<nav>
							<ul >
							  <li>Gênero: <?php echo $genero;?></li>	
							  <li >Amigos que Favoritaram
								<ul class="w3-ul w3-border">
                                <?php
                                    foreach($migos as $nameMigo){
                                        echo"<li>$nameMigo</li>";
                                    }    
                                ?>
								</ul>
							  </li>
						  </ul>
						</nav>
					</div>
				</li>
                <?php

            }
        }


    }