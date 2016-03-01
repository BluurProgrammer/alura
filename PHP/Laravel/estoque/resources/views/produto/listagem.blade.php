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
	<table class="table table-striped table-bordered table-condensed">
		<tr>
			<th>Nome</th>
			<th>Valor</th>
			<th>Descrição</th>
			<th>Quantidade</th>
			<th>Detalhes</th>
		</tr>
		@foreach ($produtos as $p)
		<tr class="{{ $p->quantidade <=1 ? 'danger' : ''}}"> 
		<!-- <tr class="@if($p->quantidade <= 1)danger @endif, @if($p->quantidade > 4)success @endif"> -->
			<td> {{$p->nome}} </td>
			<td> {{$p->valor}} </td>
			<td> {{$p->descricao}} </td>
			<td> {{$p->quantidade}} </td>
			<td><a href="/produtos/mostra/{{$p->id}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></a></td>
		</tr>
		@endforeach
	</table>
@endif

<h4>
	<span class="label label-danger pull-right">
	Um ou menos itens no estoque
	</span>
</h4>

@stop