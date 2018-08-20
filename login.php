<?php 

// Error handling
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("conexao.php");

$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = mysqli_query("SELECT * FROM Usuario WHERE username = '$username'");
echo $sql;
$result = mysqli_query($conexao, $sql) or die(mysqli_error());
$linhas = mysqli_num_rows($result); //Se não retornou nenhuma linha, é porque não existe ninguém com esse login
$linha = mysqli_fetch_assoc($result); //Tenta retornar a primeira linha de qualquer forma, para testar a senha

if ($linhas <= 0 or !password_verify($password, $linha['password']) ) { //Se não existia o login OU a verificação da senha falhou
  echo"<script language='javascript' type='text/javascript'>alert('Username e/ou password incorretos');window.location.href='login.html';</script>";
}
else {
  setcookie("username",$username);
  header("Location:index.php");
}

?>