<?php 
include("cabecalho.php"); 
include("conecta.php"); 
include("banco-produto.php");
require_once("class/Produto.php");
require_once("class/Categoria.php");
?>

<?php 

	$produtoDao = new ProdutoDAO($conexao);
	$produto = new Produto(); 

	$produto->id = $_POST["id"];
	$produto->nome = $_POST["nome"];
	$produto->setPreco($_POST["preco"]);
	$produto->descricao = $_POST["descricao"];
	
	$categoria = new Categoria();
	$produto->categoria = $categoria->nome = $_POST['categoria_nome'];

	if (array_key_exists("usado", $_POST)) {
		$usado = true;
	} else {
		$usado = 0;
	}

	$produto->usado = $usado;
	echo $produto;
	
	if ($produtoDao->alteraProduto($produto)) { ?>
		<p class="text-success">Produto <?= $nome;?>,<?= $preco;?> alterado com sucesso!</p>

		<?php } else { 
			$msg = mysqli_error($conexao);
		?>
		<p class="text-danger">Produto <?= $nome;?>,<?= $preco;?> não foi alterado:! <?= $msg;?></p>	
		<?php } 

	mysqli_close($conexao);
?>	
<?php include("footer.php")?>