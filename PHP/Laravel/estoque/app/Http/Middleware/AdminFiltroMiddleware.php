<?php

namespace estoque\Http\Middleware;

use Closure;
use Auth;
use estoque\Usuario;

class AdminFiltroMiddleware {
    public function handle($request, Closure $next) {	
    	 
	    $usuario = Auth::user();
	    $visitante = Auth::guest();

        if ($visitante) {
            return redirect ('/');
        }

        if (!$visitante) {
            if ($usuario->is_admin == 0) {
                return redirect ('/');
            }
            else return $next($request);
        }
    }

}