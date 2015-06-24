<?php include("conecta.php");
include("banco-usuario.php"); 
include("logica-usuario.php");

$email = $_POST['email'];
$senha = $_POST['senha'];
$usuario = buscaUsuario($conexao, $email, $senha);
//var_dump ($usuario);

if($usuario == null) {
    header("Location: index.php?login=0");
} else {
    logaUsuario($usuario["email"]);
    header("Location: index.php?login=1");
}
die();