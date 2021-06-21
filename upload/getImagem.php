<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "demutran";
	$PicNum = $_GET["PicNum"];

	$conexao = mysqli_connect($host,$username,$password,$db) or die("Impossível conectar ao banco."); 
	@mysqli_select_db($conexao,$db) or die("Impossível conectar ao banco.");

	$sql = ("SELECT * FROM pessoa WHERE PES_ID=$PicNum");
	$result=mysqli_query($conexao,$sql);
	
	$row=mysqli_fetch_object($result); 
	Header( "Content-type: image/gif"); 
	echo $row->PES_IMG; 
?>