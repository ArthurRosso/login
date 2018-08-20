<?php 

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("conexao.php");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM Usuario WHERE username = '$username';"; //O teste inicial deve ser só no login
$result = mysqli_query($conexao, $sql) or die(mysqli_error());
$linhas = mysqli_num_rows($result); //Se não retornou nenhuma linha, é porque não existe ninguém com esse login
$linha = mysqli_fetch_assoc($result); //Tenta retornar a primeira linha de qualquer forma, para testar a senha

if (($linhas <= 0) || !password_verify($password, $linha['password'])) { // Se não existia o login OU a verificação da senha falhou
	$err = "";
	if ($linhas <= 0) {
		$err .= "Username";
	}
	if (!password_verify($password, $linha['password'])){
		$err .= " password";	
	}
	echo"<script language='javascript' type='text/javascript'>alert('$err incorreto(s)');window.location.href='login.html';</script>";
} else {
  setcookie("username", $username);
  echo"<script language='javascript' type='text/javascript'>alert('Login efetuado com sucesso');window.location.href='index.php';</script>";
}

?>