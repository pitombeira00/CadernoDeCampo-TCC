<?php

namespace App\Http\Middleware;

use Closure;

class UsuarioAtivo
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

        
        if (auth()->user()->ativo == 1) {

            return $next($request);

        }
        else{

             \Session::flash('mensagem',['msg'=>'Usuário Desativado','class'=>'green white-text']);
            return redirect()->route('home');
        }
       
    }
}
