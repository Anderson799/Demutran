<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "demutran";
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if(mysqli_connect_errno($conexao)){
	echo "Erro na conexão com o banco";
	mysqli_connect_error();
}else{
	
} ?>

<!DOCTYPE html>
<html>
<head>
	<title>Demutran</title>
<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

</head>
<body bgcolor="gray">

</body>
</html>