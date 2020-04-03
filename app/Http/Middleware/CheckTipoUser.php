<?php

namespace App\Http\Middleware;

use Closure;

class CheckTipoUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (auth()->user()->tipo == 1) {

            return $next($request);

        }
        else{

             \Session::flash('mensagem',['msg'=>'Usuário sem acesso','class'=>'green white-text']);
            return redirect()->route('home');
        }
       
    }
}
