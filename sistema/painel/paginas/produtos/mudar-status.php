<?php 
require_once("../../../conexao.php");
$tabela = 'produtos';

$id = $_POST['id'];
$acao = $_POST['acao'];

$pdo->query("UPDATE $tabela SET destaque = '$acao' where id = '$id'");
echo 'Alterado com Sucesso';
 ?>