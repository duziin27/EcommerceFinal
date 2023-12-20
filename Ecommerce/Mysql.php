<?php
$servername = 'localhost';
$username = 'root';
$pass = '';
$db_name = 'MSCODE';

$conexao = new mysqli($servername, $username, $pass, $db_name);
if($conexao->connect_error){
   echo "Desconectado! Erro: " . $conexao->connect_error;
}