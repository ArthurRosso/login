<?php
	$hostname = "localhost";
	$user = "root";
	$password = "";
	$database = "aula_php";
	$conexao = mysqli_connect($hostname,$user,$password,$database);
	$salvar = mysqli_set_charset($conexao,"UTF8");
	if(!$conexao){
		echo "Deu ruim na conexão";
	}
?>