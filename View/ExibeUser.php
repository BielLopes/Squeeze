<?php
    
    class ExibeUser{

        private $acessoMigos;
        private $acessoUser;
        private $id_User;

        function __construct($_id_User){
            $this->id_User = $_id_User;
        }

        function exibeMigos(){
            $this->acessoMigos = new MigoDAO();
            $meusMigos = $this->acessoMigos->meusMigos($this->id_User);

            $this->acessoUser = new UserDAO();

            if(count($meusMigos) == 0){
                ?>
                <li style="text-align: center; font-size: 35px">
					<h5 style="text-align: center; font-size: 35px">Vai ficar ai sozinho? CHAME SEU AMIGOS!</h5>
                </li>
            <?php

            }else{

                foreach ($meusMigos as $migo){
                    $name = $this->acessoUser->pesquisaNomePorId($migo->getIdMigo());
                    ?>
                    <li>
                        <h5><?php echo $name; ?></h5>
                        <form action="../Controller/GerenciaMigos.php" method="POST">
                            <input type="hidden" name="tipo" value="Delete">
                            <input type="hidden" name="ID_User" value="<?php echo $this->id_User; ?>">
                            <input type="hidden" name="ID_Migo" value="<?php echo $migo->getIdMigo(); ?>">
                            <button class="btnnn w3-btn" type="submit"><img  src="Images/delete.png"></button>
                        </form>					
                    </li>
                    <?php
                }
            }

        }

        function exibePesquisa($pesquisa){

            $this->acessoUser = new UserDAO();
            $mostrar = $this->acessoUser->pesquisaPorNome($pesquisa);

            if(count($mostrar) == 0){
                echo "<script>aparecer('resultado')</script>";
                ?>
                <li style="text-align: center; font-size: 35px">
					<h5 style="text-align: center; font-size: 35px">NENHUM RESULTADO ENCONTRADO!</h5>
                </li>
            <?php

            }else{
                echo "<script>aparecer('resultado')</script>";

                foreach ($mostrar as $id){
                    if($this->id_User == $id){ 
                        continue;
                    }
                    $name = $this->acessoUser->pesquisaNomePorId($id);
                    ?>

                    <li>
                        <h5><?php echo $name; ?></h5>
                        <form action="../Controller/GerenciaMigos.php" method="POST">
                            <input type="hidden" name="tipo" value="Add">
                            <input type="hidden" name="ID_User" value="<?php echo $this->id_User; ?>">
                            <input type="hidden" name="ID_Migo" value="<?php echo $id; ?>">
                            <button class="btnnn w3-btn w3-gray" type="submit"><img  src="Images/add.png"></button>
                        </form>					
                    </li>
                    <?php
                }
            }
            
            echo "<script>aparecer('resultado')</script>";

        }

    }