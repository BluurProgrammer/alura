<?php include("cabecalho.php"); ?>
<?php include("conecta.php"); ?>
<?php include("banco-categoria.php"); ?>
<?php $categorias = listaCategorias($conexao); ?>

<html>
    <form action="adiciona-produto.php" method="post">
        <table class="table">
            <tr>
                <td>Nome</td>
                <td><input type="text" class="form-control" name="nome" /></td>
            </tr>
            <tr>
                <td>Preço</td>
                <td><input type="number" class="form-control" name="preco" /></td>
            </tr>
            <tr>
                <td>Descrição</td>
                <td><textarea name="descricao" class="form-control"></textarea>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="usado" value="true"> Usado
            </tr>
            <tr>
                <td>Categoria</td>
                <td>
                    <select name="categoria_id">
                        <?php foreach($categorias as $categoria) : ?>
                        <option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
                        <?php endforeach ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><input type="submit" value="Cadastrar" class="btn btn-primary" /></td>
            </tr>
        </table>
    </form>
</html>

<?php include("rodape.php"); ?>
