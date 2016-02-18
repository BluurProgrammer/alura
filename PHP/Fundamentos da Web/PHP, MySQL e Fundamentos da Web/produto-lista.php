<?php include("cabecalho.php"); ?>
<?php include ("conecta.php"); ?>
<?php include ("banco-produto.php"); ?>

<?php if(array_key_exists("removido", $_GET) && $_GET['removido']=='true') { ?>
<p class="alert-success">Produto apagado com sucesso.</p>
<?php } ?>

<?php
$produtos = listaProdutos($conexao);
?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Tipo</th>
            <th>Editar/Excluir</th>
        </tr>
    </thead>

<?php
foreach($produtos as $produto) {
?>

    <tr>
    	<td><?= $produto['id'] ?></td>
        <td><?= $produto['nome'] ?></td>
        <td><?= $produto['preco'] ?></td>
        <td><?= substr($produto['descricao'], 0, 40) ?></td>
        <td><?= $produto['categoria_nome'] ?></td>
        <td class="text-center">
            
	        <form action="remove-produto.php" method="post">
                <a class="btn btn-primary" href="produto-altera-formulario.php?id=<?=$produto['id']?>"><i class="fa fa-pencil-square-o"></i></a>
	            <input type="hidden" name="id" value="<?=$produto['id']?>" />
	            <button class="btn btn-danger"><i class="fa fa-times"></i></button>
	        </form>
    	</td>
    </tr>

<?php
}
?>
</table>