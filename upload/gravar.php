<?php

$imagem = $_FILES["imagem"];
$host = "localhost";
$username = "root";
$password = "";
$db = "demutran";

if($imagem != NULL) { 
	$nomeFinal = time().'.jpg';
	if (move_uploaded_file($imagem['tmp_name'], $nomeFinal)) {
		$tamanhoImg = filesize($nomeFinal); 

		$mysqlImg = addslashes(fread(fopen($nomeFinal, "r"), $tamanhoImg)); 

	$conexao = mysqli_connect($host,$username,$password,$db) or die("Impossível Conectar"); 
	@mysqli_select_db($conexao,$db) or die("Impossível conectar ao banco"); 
		
		$sql = ("INSERT INTO pessoa (PES_IMG) VALUES ('$mysqlImg')");
		mysqli_query($conexao,$sql);
		unlink($nomeFinal);
		
		header("location:exibir.php");
	}
} 
else { 
	echo"Você não realizou o upload de forma satisfatória."; 
} 

?>