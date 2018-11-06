<?php
/*
require_once "../DAO/FavoritoDAO.php";
require_once "../Model/Artista.php";
require_once "../DAO/ArtistaDAO.php";
require_once "../DAO/PreferenciaDAO.php";
require_once "../DAO/GeneroDAO.php";
*/  
    class ExibeRecomendacao{

        private $acessoFavoritos;
        private $acessoGenero;
        private $acessoArtistas;
        private $acessoPreferencia;
        private $ID_User;

        function __construct($_id_User){
            $this->ID_User = $_id_User;
        }

        function exibeBaseadoMigos(){
            $this->acessoFavoritos = new FavoritoDAO($this->ID_User);
            $this->acessoPreferencia = new PreferenciaDAO($this->ID_User);
            $todosArtista = $this->acessoFavoritos->allArtistasDosMigos();
            $this->acessoGenero = new GeneroDAO();
            $bol = FALSE;
            $i = 0;
            $buton = "";
            $genero = "";
            $migos = array();
            foreach($todosArtista as $artista){
                $bol = $this->acessoFavoritos->isFavorited($artista->getId());
                if($bol){
                    continue;
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
                $i++;
            }

            if($i == 0){
                echo "<li><h1 style=\"text-align: center;\">Nenhuma Recomendação Por Amigo</h1></li>";
            }
        }

        function exibeByPreferencia(){
            $this->acessoFavoritos = new FavoritoDAO($this->ID_User);
            $this->acessoPreferencia = new PreferenciaDAO($this->ID_User);
            $prefernciaSelected = $this->acessoPreferencia->preferenciasDoUsuario($this->ID_User);
            $this->acessoGenero = new GeneroDAO();
            $this->acessoArtistas = new ArtistaDAO();
            $bol = FALSE;
            $i = 0;
            $buton = "";
            $genero = "";
            $migos = array();
            foreach($prefernciaSelected as $id_pref){
                $todosArtista = $this->acessoArtistas->doGenero($id_pref);
                
                foreach($todosArtista as $artista){

                    $bol = $this->acessoFavoritos->isFavorited($artista->getId());
                    if($bol){
                        continue;
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
                    $i++;
                }
            }

            if($i == 0){
                echo "<li><h1 style=\"text-align: center;\">Nenhuma Recomendação Por Preferência</h1></li>";
            }
        }
    }