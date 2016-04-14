@extends('layout.principal')

@section('conteudo')
@if(empty($produtos))
	<div class="alert alert-danger alert-position" role="alert">
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  	<span class="sr-only">Error:</span>
	  	Não há produto cadastrado
	</div>

@else
	<h1>Listagem de produtos</h1>
	<table class="table table-striped table-bordered table-condensed text-center">
		<tr>
			<th>Nome</th>
			<th>Valor</th>
			<th>Descrição</th>
			<th>Quantidade</th>
			<th>Tamanho</th>
			<th>Detalhes</th>
			<th>Editar</th>
			<th>Excluir</th>
			<th>Categoria</th>
		</tr>
		@foreach ($produtos as $p)
		<tr class="{{ $p->quantidade <=1 ? 'danger' : ''}}"> 
		<!-- <tr class="@if($p->quantidade <= 1)danger @endif, @if($p->quantidade > 4)success @endif"> -->
			<td> {{$p->nome}} </td>
			<td> {{$p->valor}} </td>
			<td> {{$p->descricao}} </td>
			<td> {{$p->quantidade}} </td>
			<td> {{$p->tamanho}} </td>
			<td> {{$p->categoria->nome}} </td>
			<td><a href="/produtos/mostra/{{$p->id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
			<td><a href="/produtos/altera/{{$p->id}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
			<td><a href="/produtos/remove/{{$p->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td>
		</tr>
		@endforeach
	</table>
@endif

<h4>
	<span class="label label-danger pull-right">
	Um ou menos itens no estoque
	</span>
</h4>

@if(old('nome'))
  <div class="alert alert-success">
    <strong>Sucesso!</strong> 
        O produto {{ old('nome') }} foi adicionado.
  </div>
@endif

@stop