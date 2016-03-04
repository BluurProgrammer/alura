<?php 
	class Produto {
		public $id;
		public $nome;
		private $preco;
		public $descricao;
		public $categoria;
		public $usado = false;

		function __construct($nome = "Produto indefinido", $preco = 999, $descricao = "Contate o administrador", Categoria $categoria, $usado = "true") {
			$this->nome = $nome;
			$this->setPreco($preco);
			$this->descricao = $descricao;
			$this->categoria = $categoria;
			$this->usado = $usado;
		}

		function __toString() {
			return "Nome: ".$this->nome."<br/> Preço: ".$this->preco."<br/> Descrição: ".$this->descricao."<br/> Categoria: ".$this->categoria."<br/> Usado: ".$this->usado;
		}

		// function __destruct() {
  		// 		echo "Destruindo o produto ".$this->getNome();
		// }

		public function valorComDesconto($valor = 0.1) {
			if ($valor <= 0.5 && $valor > 0) {
				$this->preco -= $this->preco * $valor;
			}
			return $this->preco;
		}

		public function setPreco($preco) {
			if ($preco > 0) {
				$this->preco = $preco;
			}
		}

		public function getPreco() {
			return $this->preco;
		}

		public function temIsbn() {
			return $this instanceof Livro;
		}

		public function calculaImposto() {
			return $this->getPreco() * 0.195;
		}
	}
?>