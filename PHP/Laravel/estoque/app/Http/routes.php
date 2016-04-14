<?php

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'ProdutoController@lista');
	Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
	Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
	Route::get('/produtos/altera/{id}', 'ProdutoController@altera');
	Route::get('/produtos/novo', 'ProdutoController@novo');
	Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
	Route::get('/produtos/edita/{id}', 'ProdutoController@edita');
	Route::get('/produtos/download', 'ProdutoController@download');
	Route::get('/produtos/json', 'ProdutoController@listaJson');
	
	//Route::get('/login', 'LoginController@form');
	//Route::post('/login', 'LoginController@login');
	//Route::get('/logout', 'LoginController@logout');

	//Route::get('/register', 'LoginController@userRegister');
	//Route::post('/register', 'LoginController@register');

	Route::auth();
    //Route::get('/home', 'HomeController@index');

    route::get('/hora', 'TestController@hora');

});
