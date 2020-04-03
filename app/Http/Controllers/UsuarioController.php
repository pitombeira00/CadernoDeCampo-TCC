<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index(){

    	$dados = User::all();
   
    	
    	return view('cadastro.usuario.home', compact('dados')); 
    }

    public function edit($id){

    	$registro = User::find($id);
   	
   		
    	
    	return view('cadastro.usuario.edit', compact('registro')); 
    }

    public function user_desativar($id){

    	$registro = User::find($id);
   	
   		if ($registro->ativo==0) {
   			
   			$registro->ativo = 1;
   			$msg = 'Usuário Ativado';

   		}elseif ($registro->ativo==1) {
   			
			$registro->ativo = 0;
			$msg = 'Usuário Desativado';
   		}

   		$registro->save();
   		
    	 \Session::flash('mensagem',['msg'=>$msg]);
    	return redirect()->route('usuario.inicio'); 
	}
	
    public function gerar_senha($id){

    	$registro = User::find($id);
   	
   		if ($registro->ativo==0) {
   			
   			$registro->ativo = 1;
   			$msg = 'Usuário Desativado, não pode gerar nova senha';

   		}elseif ($registro->ativo==1) {
   			
			$registro->password = Hash::make('123456');

			$msg = 'Alterado para a senha padrão, 123456';

			//SALVAR ALTERAÇÃO DE SENHA
			$registro->save();
		}

   		
    	 \Session::flash('mensagem',['msg'=>$msg]);
    	return redirect()->route('usuario.inicio'); 
	}
	
	public function create(){

       	return view('cadastro.usuario.novo'); 
	}
	
	public function store(Request $request){
		
		$dados = $request->all();

		$valida = user::where('email', '=', $dados['email'])->get();
		
		
		if (isset($valida[0])){

			if(trim($valida[0]->email) == trim($dados['email'])){

				\Session::flash('mensagem',['msg'=>'ERRO, E-mail já criado']);
				
				return redirect()->route('usuario.create');
			 
			}
		}
		


		
		$salvar = new user();

		$salvar->name  		= $dados['nome'];
		$salvar->password 	= Hash::make('123456');
        $salvar->tipo    	= $dados['tipo_user'];
        $salvar->email      = $dados['email'];
        $salvar->ativo    	= '1';
        $salvar->altera_senha    	= '1';

        $salvar->save();

		$msg = 'Usuário Cadastrado com Sucesso';


		\Session::flash('mensagem',['msg'=>$msg]);
    	return redirect()->route('usuario.inicio');  
	}
	
	public function auth_dev(){

		if (auth()->user()->ativo == 1) {

			return redirect()->route('home');

        }
        else{

             \Session::flash('mensagem',['msg'=>'Usuário Desativado','class'=>'green white-text']);
			
			Auth::logout();
			return redirect()->route('login');
        }
	}
}
