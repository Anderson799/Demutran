<?php
session_start();
include 'conexao.php';
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

$_SESSION['nome'] = $nome; 
$_SESSION['email'] = $email;
$_SESSION['telefone'] = $telefone;
$_SESSION['mensagem'] = $mensagem;

$sqlInserir = "INSERT INTO contato (nome,email,telefone,mensagem)values('$_SESSION[nome]','$_SESSION[email]',
'$_SESSION[telefone]','$_SESSION[mensagem]')";
$consulta = mysqli_query($conexao,$sqlInserir);
if(isset($consulta)){
header('Location:index.html');
}
 ?>