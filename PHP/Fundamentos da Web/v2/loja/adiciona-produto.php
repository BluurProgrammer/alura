<?php 
include("cabecalho.php"); 
include("conecta.php"); 
include("banco-produto.php");
include("logica-usuario.php");
?>

<?php  
	$nome = $_POST["nome"];
	$preco = $_POST["preco"];
	$descricao = $_POST["descricao"];
	$categoria_id = $_POST["categoria_id"];

	verificaUsuario();

	if (array_key_exists("usado", $_POST)) {
		$usado = true;
	} else {
		$usado = 0;
	}
	
	if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado)) { ?>
		<p class="text-success">Produto <?= $nome;?>,<?= $preco;?> adicionado com sucesso!</p>

		<?php } else { 
			$msg = mysqli_error($conexao);
		?>
		<p class="text-danger">Produto <?= $nome;?>,<?= $preco;?> não foi adicionado:! <?= $msg;?></p>	
		<?php } 

	mysqli_close($conexao);
?>	
<?php include("footer.php")?>