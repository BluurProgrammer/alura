<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Controle de Estoque</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/custom.css">
</head>
<body>
	<div class="container">

		<nav class="navbar navbar-default">
		    <div class="container-fluid">
			    <div class="navbar-header">      
			    	<a class="navbar-brand" href="{{action('ProdutoController@lista')}}">Estoque Laravel</a>
			    </div>

			    <ul class="nav navbar-nav navbar-right">
			    	<li><a href="{{action('ProdutoController@lista')}}">Listagem</a></li>
			    	<li><a href="{{action('ProdutoController@novo')}}">Novo</a></li>

			    	@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('login') }}">Login</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/register') }}">Register</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu menu" role="menu">
								<li><a href="{{ url('/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
			    </ul>
		    </div>
		    <!-- <div>
		    	<ul class="nav navbar-nav navbar-right">
					@if(auth()->guest())
						@if(!Request::is('auth/login'))
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
						@endif
						@if(!Request::is('auth/register'))
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@endif
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
		    </div> -->
	  	</nav>

		@yield('conteudo')

		<footer class="footer">
      		<p>© Livro de Laravel do Alura.</p>
  		</footer>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>