<?php
if(isset($_COOKIE['username'])){
	echo"Bem-Vindo, $_COOKIE['username'] <br>";
	echo"Essas informações <font color='red'>PODEM</font> ser acessadas por você";
}else{
	echo"Bem-Vindo, convidado <br>";
	echo"Essas informações <font color='red'>NÃO PODEM</font> ser acessadas por você";
	echo"<br><a href='login.html'>Faça Login</a> Para ler o conteúdo";
}
?>