<?php
/*
    require_once "../DAO/GeneroDAO.php";
    require_once "../DAO/PreferenciaDAO.php";
*/  
    class ExibeGenero{

        private $acessoGenero;
        private $acessoPrefencia;
        private $ID_User;
        function __construct($_id_User){
            $this->ID_User = $_id_User;
        }

        function exibeMelhores(){

            $this->acessoGenero = new GeneroDAO();
            $this->acessoPreferencia = new PreferenciaDAO();
            $todosGeneros = $this->acessoGenero->maisBadalados();
            $migos = array();
            if(count($todosGeneros) == 0){
                echo "<li><h1 style=\"text-align: center;\">Nenhum Genero Cadastrado</h1></li>";
            }
            foreach($todosGeneros as $genero){
            
                $migos = $this->acessoPreferencia->migosPreferem($genero->getId(), $this->ID_User);
                ?>
                <li>
					<!--Colocar com PHP os Artistas mais favoritados em Ordem-->
					<div class="component">
							<img src="Images/Genero.jpg">
						<h1><?php echo $genero->getName();?></h1>
						
						<nav>
								<ul >
								  <li >Amigos que Preferem
									<ul class="w3-ul w3-border">
                                    <?php
                                        if(count($migos) == 0){
                                            echo"<li>Nenhum Amigo Preferiu Esse Genero!</li>";
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
            $this->acessoGenero = new GeneroDAO();
            $this->acessoPreferencia = new PreferenciaDAO();
            $todosGeneros = $this->acessoGenero->ordemAlfabetica();
            $migos = array();
            if(count($todosGeneros) == 0){
                echo "<li><h1 style=\"text-align: center;\">Nenhum Genero Cadastrado</h1></li>";
            }
            foreach($todosGeneros as $genero){
            
                $migos = $this->acessoPreferencia->migosPreferem($genero->getId(), $this->ID_User);
                ?>
                <li>
					<!--Colocar com PHP os Artistas mais favoritados em Ordem-->
					<div class="component">
							<img src="Images/Genero.jpg">
						<h1><?php echo $genero->getName();?></h1>
						
						<nav>
								<ul >
								  <li >Amigos que Preferem
									<ul class="w3-ul w3-border">
                                    <?php
                                        if(count($migos) == 0){
                                            echo"<li>Nenhum Amigo Preferiu Esse Genero!</li>";
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