<?php namespace estoque\Http\Controllers; 

use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends Controller {

	public function lista() {
		$produtos = DB::select('select * from produtos;');
		
		return view('produto.listagem')->with('produtos', $produtos);
	}

	public function mostra($id) {
		//$id= Request::route('id');
		$produto = DB::select('select * from produtos where id = ?', [$id]);

		if(empty($produto)) {
    		return "Esse produto não existe";
  		}
		return view('produto.detalhes')->with('p', $produto[0]);
	}

	public function novo() {
		return view ('produto.formulario');
	}

	public function adiciona() {
		$nome = Request::input('nome');
		$quantidade = Request::input('quantidade');
		$valor = Request::input('valor');
		$descricao = Request::input('descricao');

		DB::insert('insert into produtos (nome, quantidade, valor, descricao) values(?,?,?,?)', array($nome, $quantidade, $valor, $descricao));

		return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
	}

	public function listaJson(){
    	$produtos = DB::select('select * from produtos');
    	return $produtos;
	}

	public function download() {
		$arquivo = "VP_Console.pdf";
		return response()->download($arquivo);
	}
}