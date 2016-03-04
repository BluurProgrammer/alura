@extends('layout.principal')
@section('conteudo')

<h1>Detalhes do produto {{$p->nome}} </h1>
<ul class="list-group">
	<li class="list-group-item">
		<b>Valor:</b> R$ {{$p->valor}}
	</li>
	<li class="list-group-item">
	 	<b>Descrição:</b> {{$p->descricao or 'Produto sem descrição'}}
	</li>
	<li class="list-group-item">
	 	<b>Quantidade em estoque:</b> {{$p->quantidade}}
	</li>
</ul>

@stop