<?php 

$banco = 'restaurante';
$usuario = 'root';
$senha = 'higor3433';
$servidor = 'localhost';

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", "$usuario", "$senha");
} catch (Exception $e) {
	echo 'Não conectado ao Banco de Dados! <br><br>' .$e;
}


//VARIAVEIS DO SISTEMA
$nome_sistema = 'Pizzaria Per Favore';
$email_sistema = 'perfavore@gmail.com.br';

 ?>