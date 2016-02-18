<?php 
require_once("conecta.php");

class ProdutoDAO {

	private $conexao;

	function __construct($conexao) {
		$this->conexao = $conexao;
	}

	function listaProdutos(){
		$produtos = array();
		$resultado = mysqli_query($this->conexao, "select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
		
		while($produto_atual = mysqli_fetch_assoc($resultado)){
			$categoria = new Categoria();
			$categoria->nome = $produto_atual['categoria_nome'];

			$produto = new Produto($produto_atual['nome'], $produto_atual['preco'], $produto_atual['descricao'],$categoria, $produto_atual['usado']);
			$produto->id = $produto_atual['id'];

			array_push($produtos, $produto);
		}
		return $produtos;	
	}

	function insereProduto($produto) {
		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn, tipoProduto) values ('{$produto->nome}', {$produto->getPreco()}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado}, '{$produto->isbn}', '{$produto->getTipoProduto()}')";
		return mysqli_query($this->conexao, $query);
	}

	function removeProduto($id){
		$query = "delete from produtos where id = {$id}";
		return mysqli_query($this->conexao, $query);
	}

	function buscaProduto($id){
		$quey = "select * from produtos where id = {$id}";
		$resultado = mysqli_query($this->conexao, $quey);
		return mysqli_fetch_assoc($resultado);
	}

	function alteraProduto($produto){
		$query = "update produtos set nome = '{$produto->nome}', preco = {$produto->preco}, descricao = '{$produto->descricao}', 
		          categoria_id = '{$produto->categoria->id}', usado = {$produto->usado} where id = '{$produto->id}'";
		return mysqli_query($this->conexao, $query);
	}


	function __toString() {
			return $this->nome.":".$this->preco."<br/>";
		}
}