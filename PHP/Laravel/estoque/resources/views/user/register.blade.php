@extends('layout.principal')

@section('conteudo')
	
	@if($errors->all())
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form action="/register" method="post">
		
		<input type="hidden" name="_token" value="{{csrf_token()}}">

		<div class="form-group">
			<label>Nome</label>
			<input type="text" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label>Senha</label>
			<input type="password" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label>Confirme sua senha</label>
			<input type="password" class="form-control" name="email">
		</div>
		
		<button class="btn btn-primary" type="submit">Registrar</button>
	</form>
@stop