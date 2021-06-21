<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "demutran";

$conexao = mysqli_connect($host,$username,$password,$db) or die("Impossível conectar ao banco."); 

@mysqli_select_db($conexao,$db) or die("Impossível conectar ao banco"); 
$sql = ("SELECT * FROM pessoa");
$result=mysqli_query($conexao,$sql);

while($row=mysqli_fetch_object($result)) { 
	echo "<img src='getImagem.php?PicNum=$row->PES_ID' \">";
	
}
echo "<a href='../index.html'>Voltar para o menu</a>";
?>