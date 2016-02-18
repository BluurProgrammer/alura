<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<?php include("mostra-alerta.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Minha loja</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href=css/loja.css>
</head>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Minha Loja</a> 
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="produto-formulario.php">Adiciona Produto</a></li>
					<li><a href="produto-lista.php">Produtos</a></li>
					<li><a href="contato.php">Contato</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="principal">
			<?php mostraAlerta("success"); ?>
			<?php mostraAlerta("danger"); ?>
