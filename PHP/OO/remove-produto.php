<?php 
include("cabecalho.php"); 
include("conecta.php"); 
include("banco-produto.php");
include("logica-usuario.php");

$produtoDao = new ProdutoDAO($conexao);

$id = $_POST['id'];
$produtoDao->removeProduto($id);
$_SESSION["success"] = "Produto removido com sucesso";
header("Location: produto-lista.php");
die();
?>

