<?php 

require_once("conexao.php");

$username = $_POST['username'];
$password = $_POST['password'];
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "SELECT * FROM Usuario WHERE username = '$username'"; //O teste inicial deve ser só no login
$result = mysqli_query($conexao, $sql) or die(mysqli_error());
$linhas = mysqli_num_rows($result); //Se não retornou nenhuma linha, é porque não existe ninguém com esse login
$linha = mysqli_fetch_assoc($result); //Tenta retornar a primeira linha de qualquer forma, para testar a senha

if($username == "" || $username == null){
  echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastro.html';</script>";
}else {
  if (!($linhas <= 0)) {
    echo"<script language='javascript' type='text/javascript'>alert('Esse nome de usuario já existe');window.location.href='cadastro.html';</script>";
  } else {
    $sql = "INSERT INTO Usuario (username,password) VALUES ('$username','$password');";
    setcookie("username", $username);
    if ($conexao->query($sql) === TRUE) {
      echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='index.php'</script>";
    } else {
      echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastro.html'</script>";
    }
  }
}
?>