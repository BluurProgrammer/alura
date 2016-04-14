<?php namespace estoque\Http\Controllers; 

use Illuminate\Support\Facades\DB;
use Request;
use estoque\Produto;
use estoque\Categoria;
use Validator;
use estoque\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller {

	//Construtor que define as regras de acesso - Kernel.php
	//public function __construct() {
    //    $this->middleware('autorizador');
    //}

	//Construtor com regras de acesso específicando os métodos
    // public function __construct() {
    //     $this->middleware('autorizador', 
    //         ['only' => ['novo', 'remove']]);
    // }

    //Construtor com regras de acesso específicando os métodos
    public function __construct() {
        $this->middleware('adminFilter', 
            ['only' => ['novo', 'remove']]);
    }

	public function lista() {
		$produtos = Produto::all();
		return view('produto.listagem')->with('produtos', $produtos);
	}

	public function mostra($id) {
		$produto = Produto::find($id);
		if(empty($produto)) {
    		return "Esse produto não existe";
  		}
		return view('produto.detalhes')->with('p', $produto);
	}

	public function altera($id) {
		$produto = Produto::find($id);
		return view('produto.altera')->with('p', $produto);
	}

	public function remove($id) {
		$produto = Produto::find($id);
		$produto->delete();
		return redirect()->action('ProdutoController@lista');
	}

	public function novo() {
		return view ('produto.formulario')->with('categorias', Categoria::all());
	}

	public function adiciona(ProdutoRequest $request) {
		// $params = Request::all(); //Recebe todos os parâmetros
		// $produto = new Produto($params);
		// $produto->save();

		Produto::create($request->all()); //Realiza o mesmo procedimento das linhas acima
		return redirect('/')->withInput();
	}

	public function edita($id) {
		$produto = Produto::find($id);
		$produto->nome = Request::input('nome');
		$produto->valor = Request::input('valor');
		$produto->quantidade = Request::input('quantidade');
		$produto->descricao = Request::input('descricao');
		$produto->save();
		return redirect('/produtos')->withInput();
	}

	public function listaJson() {
    	$produtos = Produto::all();
    	return response()->json($produtos);

    	//$produtos = Produto::select('nome')->get()->toArray(); //Pega apenas dados da coluna nome
    	//return $produtos;
	}

	public function download() {
		$arquivo = "VP_Console.pdf";
		return response()->download($arquivo);
	}
}