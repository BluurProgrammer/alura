@extends('layout.principal')
@section('conteudo')

	<h1>Alteração de produto</h1>

	<form action="/produtos/edita/{{$p->id}}" method="get">

		<input type="hidden" name="id" value="{{$p->id}}">

		<div class="form-group">
			<label>Nome</label>
			<input type="text" class="form-control" name="nome" value="{{$p->nome}}">
		</div>
		<div class="form-group">
			<label>Valor</label>
			<input type="text" class="form-control" name="valor" value="{{$p->valor}}">
		</div>
		<div class="form-group">
			<label>Quantidade</label>
			<input type="text" class="form-control" name="quantidade" value="{{$p->quantidade}}">
		</div>
		<div class="form-group">
			<label>Tamanho</label>
			<input type="text" class="form-control" name="tamanho" value="{{$p->tamanho}}">
		</div>
		<div class="form-group">
			<label>Descrição</label>
			<textarea class="form-control" name="descricao">{{$p->descricao}}</textarea>
		</div>

		<button class="btn btn-primary" type="submit">Alterar</button>
	</form>

@stop