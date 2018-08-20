<?php
	$hostname = "localhost";
	$user = "aula_php";
	$password = "aula_php";
	$database = "aula_php";
	$conexao = mysqli_connect($hostname,$user,$password,$database);
	$salvar = mysqli_set_charset($conexao,"UTF8");
	if(!$conexao){
		echo "Deu ruim na conexão";
	}
?>