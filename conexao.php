<?php

$server = 'localhost';
$user = 'root';
$password = 'higor3433';
$db_name = 'restaurante';
$port = '3306';

$db_connect = new mysqli($server,$user,$password,$db_name,$port);
mysqli_set_charset($db_connect,"utf8");

if ($db_connect->connect_error) {
    echo 'Falha: ' . $db_connect->connect_error;
} else {
    //echo 'Conexão feita com sucesso' . '<br><br>';
}
?>