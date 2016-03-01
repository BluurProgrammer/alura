<?php 
include("cabecalho.php"); 

	$produto = new Livro();
	$categoria = new Categoria();
	$categoria->id = "";


	$produto->id = 10;
	$produto->nome = "Senhor do Aneis";
	$produto->preco = 120;
	$produto->descricao = "Livro famoso";
	$produto->categoria = $categoria;
	$produto->usado = false;



?>