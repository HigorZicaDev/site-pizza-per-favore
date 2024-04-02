 <?php

 require_once ("conexao.php");

    ?>


    <?php



            foreach ($pratos as $prato ) {
                
                $id = $prato['id'];
                $nome = $prato['nome'];
                $categoria = $prato['categoria'];
                $descricao = $prato['descricao'];
                $preco = $prato['preco'];
                $calorias = $prato['calorias'];
                $destaque = $prato['destaque'];

                $sql = "INSERT INTO produtos(id,nome,categoria,descricao,preco,calorias,destaque) 
                VALUES ('$id','$nome','$categoria','$descricao','$preco','$calorias','$destaque')";

                if ($db_connect-> query($sql)) {
                    echo $nome . "Inserido Produto com Sucesso!" . '<br><br>';
                } else {
                    echo "Não foi Possivel inserir o Produto." . $nome . '<br>';
                    echo mysqli_error($db_connect) . '<br><br>';
                }

                echo '<br>';

            }
    ?>   

 