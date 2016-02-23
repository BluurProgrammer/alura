 <?php 
include("cabecalho.php"); 
include("conecta.php"); 
include("banco-produto.php"); 
include("logica-usuario.php"); ?>

<?php verificaUsuario(); ?>

	<table class="table table-striped table-bordered table-hover">
		<?php
			$produtoDao = new ProdutoDAO($conexao);
			$produtos = $produtoDao->listaProdutos();
			foreach ($produtos as $produto) :
		?>
		<tr>
			<td><?=$produto->nome?></td>
			<td><?=$produto->getPreco()?></td>
			<td><?=$produto->calculaImposto()?></td>
			<td><?=substr($produto->descricao,0,40)?></td>
			<td><?=$produto->categoria->nome?></td>
			<td><a class="btn btn-primary altera-item" href="produto-altera-formulario.php?id=<?=$produto->id?>">Editar</a></td>
			<td>
				<?php 
					if ($produto->temIsbn()) {
						echo "ISBN: ".$produto->isbn;
					}
				?>
			</td>

			<td>
				<form action="remove-produto.php" method="post">
					<input type="hidden" name="id" value="<?=$produto->id?>">
					<button class="btn btn-danger remove-item">Remover</button>
				</form>
			</td>	
		</tr>
		<?php 
			endforeach
		 ?>
	</table>

<?php include("footer.php");?>