<?php

namespace estoque\Http\Controllers;

use estoque\Http\Requests;
use estoque\Http\Controllers\Controller;

use Request;
use Auth;

class LoginController extends Controller {
   
    public function form() {
   		return view('form_login');
    }   

    public function login() {
   		$credenciais = Request::only('email','password');

   		if (Auth::attempt($credenciais)) {
   			return 'Usuário está logado com sucesso.';
   		}

   		return 'Usuário não existe.';
    }

    public function logout() {
        Auth::logout();
        return redirect ('/');
    }
}
