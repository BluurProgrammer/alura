<?php include("cabecalho.php");
include("conecta.php");
include("banco-categoria.php");
include("banco-produto.php");

$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
$categorias = listaCategorias($conexao);
$usado = $produto['usado'] ? "checked = 'checked'" : "";
?>

	<h1>Altera produtos</h1>

<form action="altera-produto.php" method="post" class="form-group">
	<input type="hidden" name="id" value="<?=$produto['id']?>">
	<table class="table">
		
		<?php include("produto-formulario-base.php") ?>

		<tr>
			<td><button class="btn btn-primary" type="submit">Alterar</button></td>
		</tr>
	</table>
</form>
<?php include("footer.php") ?>