<?php  
include("conecta.php");
include("banco-usuario.php");
include("logica-usuario.php");

$email = $_POST["email"];
$senha = $_POST["senha"];

$usuario = buscaUsuario($conexao, $email, $senha); 

if ($usuario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválida.";
	header("Location: index.php");
} else {
	$_SESSION["success"] = "Usuário logado com sucesso.";
	logaUsuario($usuario["email"]);
	header("Location: index.php");
} 

die();