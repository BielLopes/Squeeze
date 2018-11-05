<?php
    /*
    require_once "../DAO/ArtistaDAO.php";
    require_once "../DAO/FavoritoDAO.php";
    require_once "../DAO/GeneroDAO.php";*/
    
    class ExibeArtista{

        private $acessoFavoritos;
        private $acessoArtista;
        private $acessoGenero;
        private $ID_User;

        function __construct($_id_User){
            $this->ID_User = $_id_User;
        }

        function exibeMelhores(){
            $this->acessoArtista = new ArtistaDAO($this->ID_User);
            $this->acessoFavoritos = new FavoritoDAO($this->ID_User);
            $todosArtista = $this->acessoArtista->maisBadalados();
            $this->acessoGenero = new GeneroDAO();
            $bol = FALSE;
            $buton = "";
            $genero = "";
            $migos = array();
            if(count($todosArtista) == 0){
                echo "<li><h1 style=\"text-align: center;\">Nenhum Artista Cadastrado</h1></li>";
            }
            foreach($todosArtista as $artista){
                $bol = $this->acessoFavoritos->isFavorited($artista->getId());
                if($bol){
                    $buton = "deslike";
                }else{
                    $buton = "like";
                }
                $genero = $this->acessoGenero->retornaNomePorID($artista->getId_Genero());
                $migos = $this->acessoFavoritos->migosFavoritaram($artista->getId());
                ?>
                <li>
					<div class="component">
						<img src="Images/Artista.jpg">
						<h1><?php echo $artista->getName();?></h1>
						<form method="GET" action="../Controller/GerenciaFavoritos.php">
                            <input type="hidden" name="tipo" value="<?php echo $buton;?>">
                            <input type="hidden" name="id" value="<?php echo $artista->getId();?>">
							<button class="btn2 w3-red" type="submit">
								<img src="Images/<?php echo $buton;?>.png">
							</button>
						</form>
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
					</div>
				</li>
                <?php

            }
        }

        function exibeOredemAlfabetica(){
            $this->acessoArtista = new ArtistaDAO($this->ID_User);
            $this->acessoFavoritos = new FavoritaDAO($this->ID_User);
            $todosArtista = $this->acessoArtista->ordemAlfabetica();
            $this->acessoGenero = new GeneroDAO();
            $bol = FALSE;
            $buton = "";
            $genero = "";
            $migos = array();
            if(count($todosArtista) == 0){
                echo "<li><h1 style=\"text-align: center;\">Nenhum Artista Cadastrado</h1></li>";
            }
            foreach($todosFavoritos as $artista){
                $bol = $this->acessoFavoritos->isFavorited($artista->getId());
                if($bol){
                    $buton = "deslike";
                }else{
                    $buton = "like";
                }
                $genero = $this->acessoGenero->retornaNomePorID($artista->getId_Genero());
                $migos = $this->acessoFavoritos->migosFavoritaram($artista->getId());
                ?>
                <li>
					<div class="component">
						<img src="Images/Artista.jpg">
						<h1><?php echo $artista->getName();?></h1>
						<form method="GET" action="../Controller/GerenciaFavoritos.php">
                            <input type="hidden" name="tipo" value="<?php echo $buton;?>">
                            <input type="hidden" name="id" value="<?php echo $artista->getId();?>">
							<button class="btn2 w3-red" type="submit">
								<img src="Images/<?php echo $buton;?>.png">
							</button>
						</form>
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
					</div>
				</li>
                <?php

            }
        }


    }