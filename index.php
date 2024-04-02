<?php
    require_once ("conexao.php");
    include 'header.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Pizzaria Per favoré</title>
</head>
<body>


<div class="welcome-gallery small-12 columns">



<div class="photo-section small-12 columns">
    <img class="homepage-main-photo" src="img/main-photo.jpg" alt="slider imagem 1">
</div>

<div class="main-section-title small-10 columns">
    <div class="table">
        <div class="table-cell">
            <img src="img/Group 2.png" alt="per favore logo">

            <br>
            <button class= "novo" onclick="window.location.href='cardapio.php'">Cardápio</button>
            
        </div>
    </div>
    
</div>

<div class="photo-gradient">
    
</div>

</div>




<div  class="about-us small-11 large-12 columns no-padding small-centered">

<div id="about-us" class="global-page-container">
    <br>
    <div class="about-us-title small-12 columns no-padding">
    <h3>Nossa História</h3>
    <hr></hr>
    </div>

    
        <img src="img/fachada.jpg" alt="fachada do restaurante">
    

    <div class="about-us-text">

    <p>
        Pizza é uma preparação culinária que consiste em um disco de massa fermentada de farinha de trigo, 
        coberto com molho de tomate e os ingredientes variados que normalmente incluem algum tipo de queijo, 
        carnes preparadas ou defumadas e ervas, normalmente orégano ou manjericão, tudo assado em forno.</p>
    <p>
    Prezando pelas tradições italianas e com uma grande paixão pela cozinha, 
    o La Vera é a primeira pizzaria contemporânea italiana do Brasil, 
    com a máxima de sempre trazer um pedaço da Toscana para Belo Horizonte. 
    O restaurante e pizzaria trabalha com produtos artesanais e importados. 
    A maioria dos ingredientes vêm da Itália, como farinha, azeite extra virgem, 
    mortadela com pistache, anchova, alcaparra, molho de tomate com Denominação de Origem Controlada (DOCG), presunto, salame, azeitona.
        </p>
        

    </div>

</div>

</div>


<div  class="cardapio small-11 large-12 columns no-padding small-centered">
<br>
<div id="cardapio" class="global-page-container">
    <div class="cardapio-title small-12 columns no-padding">
    <h3>Cardapio</h3>
    <hr></hr>
    </div>
</div>

<div class="global-page-container">


    <div class="slider-cardapio">
        <div class="slider-002 small-12 small-centered columns">

        
<?php
        
        $sql = "SELECT * FROM produtos WHERE destaque='Sim'";
        $result = $db_connect->query($sql);

        if($result->num_rows > 0){

            while ($row = $result->fetch_assoc()) { ?> 

            <div class="cardapio-item-outer bounce-hover small-10 medium-4 columns"> 
                <div class="cardapio-item">
                    <a href="prato.php?prato=<?php 
                        echo $row['foto'];
                    ?>">
                        
                        <div class="cardapio-item-image">
                            <img src="./img/cardapio/<?php 
                        echo $row['foto'];
                    ?>" />   
                        </div>

                        <div class="item-info">
                            
                        
                            <div class="title"> <?php 
                                    echo $row['nome'];
                                                ?></div>
                        </div>

                        <div class="gradient-filter">
                        </div>
                        
                    </a>
                </div>
            </div>
                
            <?php  }

        } else {
            echo 'Não possui nenhum produto em destaque!';
        }
?>  
          
    
        </div>
    </div>
</div>
</div>

<div id="contact-us" class="contact-us small-11 large-12 columns no-padding small-centered">

<div class="global-page-container">
    <div class="contact-us-title small-12 columns no-padding">
    <h3>Faça a sua reserva</h3>
    <hr></hr>
    </div>
    

    <div class="reservation-form small-12 columns no-padding">

        <form action=index.php#contact-us method= "POST">

            <div class="form-part1 small-12 large-8 xlarge-7 columns no-padding">
        
                <input type="text" name="nome" class="field" placeholder="Nome completo" required/>
                
                <input type="email" name="email" class="field" placeholder="E-mail" required/>
                
                <textarea type="text" name="mensagem" class="field" placeholder="Mensagem" ></textarea>


            </div>

            <div class="form-part2 small-12 large-3 xlarge-3 end columns no-padding">
                <input type="text" name="telefone" class="field" placeholder="Telefone" required/>
                
                <input type="datetime-local" name="data" class="field" placeholder="Data e hora" required/>

                <input type="text" name="pessoas" class="field" placeholder="Número de pessoas" required/>

                <input type="submit" name="submit" value="Reservar"/>

            </div>


        </form>


        <?php

                // Inserir Arquivos do PHPMailer
                require 'vendor/autoload.php';
                require 'vendor/phpmailer/src/Exception.php';
                require 'vendor/phpmailer/src/PHPMailer.php';
                require 'vendor/phpmailer/src/SMTP.php';

                // Usar as classes sem o namespace
                use PHPMailer\PHPMailer\PHPMailer;
                use PHPMailer\PHPMailer\Exception;

            function clean_input($input) {
                $input = trim($input);
                $input = stripslashes($input);
                $input = htmlspecialchars($input);

                return $input;
            }

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $mensagem = $_POST['mensagem'];
                $telefone = $_POST['telefone'];
                $data = $_POST['data'];
                $pessoas = $_POST['pessoas'];

                $nome = clean_input($nome);
                $email = clean_input($email);
                $mensagem = clean_input($mensagem);
                $telefone = clean_input($telefone);
                $data = clean_input($data);
                $pessoas = clean_input($pessoas);
                
                $texto_msg = 'Email referente a reserva realizada no site do Restaurante.' . '<br><br>' .
                'Nome: ' . $nome . '<br>' .
                'Email: ' . $email . '<br>' .
                'mensagem: ' . $mensagem . '<br>' .
                'telefone: ' . $telefone . '<br>' .
                'data: ' . $data . '<br>' .
                'pessoas: ' . $pessoas . '<br>';

                // Criação do Objeto da Classe PHPMailer
                $mail = new PHPMailer(true); 
                $mail->CharSet="UTF-8";


                try {
                    
                    //Retire o comentário abaixo para soltar detalhes do envio 
                    // $mail->SMTPDebug = 2;                                
                    
                    // Usar SMTP para o envio
                    $mail->isSMTP();                                      

                    // Detalhes do servidor (No nosso exemplo é o Google)
                    $mail->Host = 'smtp.gmail.com';

                    // Permitir autenticação SMTP
                    $mail->SMTPAuth = true;                               

                    // Nome do usuário
                    $mail->Username = 'hztech.suporte.sistemas@gmail.com';        
                    // Senha do E-mail         
                    $mail->Password = 'higor123';                           
                    // Tipo de protocolo de segurança
                    $mail->SMTPSecure = 'tls';   

                    // Porta de conexão com o servidor                        
                    $mail->Port = 587;

                    
                    // Garantir a autenticação com o Google
                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    // Remetente
                    $mail->setFrom($email, $nome);
                    
                    // Destinatário
                    $mail->addAddress('hztech.suporte.sistemas@gmail.com', 'Admin User');

                    // Conteúdo

                    // Define conteúdo como HTML
                    $mail->isHTML(true);                                  

                    // Assunto
                    $mail->Subject = 'PEDIDO DE RESERVA';
                    $mail->Body    = $texto_msg;
                    $mail->AltBody = $texto_msg;

                    // Enviar E-mail
                    $mail->send();
                    $msg_confimacao =  'Mensagem enviada com sucesso';
                } catch (Exception $e) {
                    echo 'A mensagem não foi enviada pelo seguinte motivo: ', $mail->ErrorInfo;
                }

            }

                                                                    
        ?>
    </div>
 <?php   if($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
    <br>
    <p>
    <?php echo $msg_confimacao; ?>
    </p>
<?php } ?>

</div>
</div>

</body>
</html>

        <?php

        include 'footer.php';

        ?>

       