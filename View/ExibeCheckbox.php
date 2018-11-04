<?php
    /*Pelo principio "Tell, don't asck", o ideal é carregar as informações aqui mesmo dos
    checkbox disponiveis e dos selecionados pelo usuário, logo gera um baixo acoplamento.*/


    class ExibeCheckbox {
        
        private $consulta_Banco;
        private $todosOsGeneros;


        function exibeTodos(){
            $this->consulta_Banco = new GeneroDAO();
            $this->todosOsGeneros = $this->consulta_Banco->retornaAll();
            $fecha = false;
            foreach ($this->todosOsGeneros as $genero) {
				if(!$fecha){
					$fecha = true;
					?>
				<tr>
				<td>
					<input type="checkbox" name="<?php echo $genero->getId(); ?>" value="<?php echo $genero->getName(); ?>" ><?php echo $genero->getName(); ?>
				</td>
				<?php
				}else{
					$fecha = false;
				?>					
				<td>
					<input type="checkbox" name="<?php echo $genero->getId(); ?>" value="<?php echo $genero->getName(); ?>" ><?php echo $genero->getName(); ?>
				</td>
				</tr>
			<?php
				}
			}
			if($fecha){
				echo "</tr>";
				$fecha = false;
			}

        }

        function exibeTodosSelecionados($minhasPreferencias){
            $this->consulta_Banco = new GeneroDAO();
            $this->todosOsGeneros = $this->consulta_Banco->retornaAll();
            $atual = " ";
            $fecha = false;
            foreach ($this->todosOsGeneros as $genero) {

                foreach($minhasPreferencias as $gener02){

                    if($genero->getId() == $gener02){
                        $atual =" checked ";
                    }

                }

                if(!$fecha){
                    $fecha = true;
                      ?>
                    <tr>
                    <td>
                        <input <?php echo $atual; ?> type="checkbox" name="<?php echo $genero->getId(); ?>" value="<?php echo $genero->getName(); ?>" ><?php echo $genero->getName(); ?>
                    </td>
                    <?php
                }else{
                        $fecha = false;
                    ?>					
                    <td>
                        <input <?php echo $atual; ?> type="checkbox" name="<?php echo $genero->getId(); ?>" value="<?php echo $genero->getName(); ?>" ><?php echo $genero->getName(); ?>
                    </td>
                    </tr>
                <?php

                }

                    $atual = " ";
            }
            if($fecha){
                echo "</tr>";
                $fecha = false;
            }
        }


    }