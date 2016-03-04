<?php 
require_once("class/ProdutoDAO.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");
include("conecta.php");
	
	$produtoDao = new ProdutoDAO($conexao);

	$produtos = $produtoDao->listaProdutos();
	print_r($produtos)."<br />";

	//Criando o objeto na mão
	// $produto = new Produto();
	// $categoria = new Categoria();

	// $produto->nome = "Vitor";
	// $produto->setPreco("10");
	// $produto->descricao = "Mio que tem";
	// $produto->categoria = "esporte";
	// $produto->usado = "true";

	// echo $produto;

?>


