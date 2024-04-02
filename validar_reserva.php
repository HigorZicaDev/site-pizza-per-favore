<?php

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
                            $nome = clean_input($email);
                            $nome = clean_input($mensagem);
                            $nome = clean_input($telefone);
                            $nome = clean_input($data);
                            $nome = clean_input($pessoas);                   

                        }

                                                                                    
                            // Inserir Arquivos do PHPMailer
                            require 'vendor/autoload.php';
                            require 'vendor/phpmailer/src/Exception.php';
                            require 'vendor/phpmailer/src/PHPMailer.php';
                            require 'vendor/phpmailer/src/SMTP.php';

                            // Usar as classes sem o namespace
                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\Exception;

                            // Criação do Objeto da Classe PHPMailer
                            $mail = new PHPMailer(true); 


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
                                $mail->setFrom('from@example.com', 'Mailer');
                                
                                // Destinatário
                                $mail->addAddress('hztech.suporte.sistemas@gmail.com', 'Admin User');

                                // Conteúdo

                                // Define conteúdo como HTML
                                $mail->isHTML(true);                                  

                                // Assunto
                                $mail->Subject = 'Insira o assunto';
                                $mail->Body    = 'Insira o texto do e-mail';
                                $mail->AltBody = 'Formato alternativo em texto puro para emails que não aceitam HTML';

                                // Enviar E-mail
                                $mail->send();
                                echo 'Mensagem enviada com sucesso';
                            } catch (Exception $e) {
                                echo 'A mensagem não foi enviada pelo seguinte motivo: ', $mail->ErrorInfo;
                            }
    


                    ?>