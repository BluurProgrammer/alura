<?php 
include("cabecalho.php"); 
include("conecta.php"); 
include("banco-produto.php");
include("logica-usuario.php");
?>

<?php  
	verificaUsuario();

	$categoria = new Categoria();
	$categoria->id = $_POST["categoria_id"];

	if (array_key_exists("usado", $_POST)) {
		$usado = true;
	} else {
		$usado = 0;
	}
	
	if ($_POST['tipoProduto'] == "Livro") {
		$produto = new Livro($_POST["nome"],$_POST["preco"],$_POST["descricao"],$categoria,$usado);
		$produto->isbn = $_POST['isbn'];
	} else {
		$produto = new Produto($_POST["nome"],$_POST["preco"],$_POST["descricao"],$categoria,$usado);
	}

	$produtoDao = new ProdutoDAO($conexao);

	if ($produtoDao->insereProduto($produto)) { ?>
		<p class="text-success">Produto <?= $produto->nome;?>,<?= $produto->getPreco();?> adicionado com sucesso!</p>

		<?php } else { 
			$msg = mysqli_error($conexao);
		?> 
		<p class="text-danger">Produto <?= $produto->nome;?>,<?= $produto->getPreco();?> não foi adicionado:! <?= $msg;?></p>	
		<?php } 

	mysqli_close($conexao);
?>	
<?php include("footer.php")?>