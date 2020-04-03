<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\funcionario;
use App\metas;
use App\safra;
use Khill\Lavacharts\Lavacharts;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //--------------------------------------
        //VERIFICA SE DEVE SER ALTERADO A SENHA
        //---------------------------------------


        if (auth()->user()->altera_senha == 1) {
            return view('altera_senha');
        }else {

            $safra = safra::where('terminou',0)->get();
            
            if (isset($safra[0])){

               
                //---------------------------------------
                //Metas Apontamentos
                //---------------------------------------
                
               // $Apontamentos = metas::where('id_safra', $safra[0]->id)->where('finalizado', 1)->take(10)->get();
                $Apontamentos = DB::table('metas')
                ->join('safra', 'safra.id', '=', 'metas.id_safra')
                ->join('atividade', 'atividade.id', '=', 'metas.id_atividade')
                ->join('local', 'local.id', '=', 'metas.id_local')
                ->select(DB::RAW(" sum(metas.valor_meta) as meta, sum(metas.realizado) as apontado, atividade.descricao as atividade"))
                ->where('safra.terminou', '=', '0')
                ->where('atividade.apagada', '=', '0')
                ->where('local.apagada', '=', '0')
                ->where('id_safra',$safra[0]->id)
                ->where('metas.finalizado',1)
                ->GroupBy('atividade.descricao')
                ->get();
                

                $dados = [[],[],[]];
                foreach($Apontamentos as $key => $value)
                {
                    array_push($dados[0],$value->atividade);
                    array_push($dados[1],$value->meta);
                    array_push($dados[2],$value->apontado);
                }
            

                //---------------------------------------
                //Meta por Apontamento Safra
                //---------------------------------------
                $MetaFin = DB::table('metas')
                ->join('safra', 'safra.id', '=', 'metas.id_safra')
                ->join('atividade', 'atividade.id', '=', 'metas.id_atividade')
                ->join('local', 'local.id', '=', 'metas.id_local')
                ->where('safra.terminou', '=', '0')
                ->where('atividade.apagada', '=', '0')
                ->where('local.apagada', '=', '0')
                ->where('id_safra',$safra[0]->id)
                ->where('metas.finalizado',1)
                ->count();

                $MetaOpe = DB::table('metas')
                ->join('safra', 'safra.id', '=', 'metas.id_safra')
                ->join('atividade', 'atividade.id', '=', 'metas.id_atividade')
                ->join('local', 'local.id', '=', 'metas.id_local')
                ->where('safra.terminou', '=', '0')
                ->where('atividade.apagada', '=', '0')
                ->where('local.apagada', '=', '0')
                ->where('id_safra',$safra[0]->id)
                ->where('metas.finalizado',0)
                ->count();
                

                $meta = [];
                array_push($meta,['Finalizado', 'Em Aberto']);
                array_push($meta,[$MetaFin, $MetaOpe]);
                


            }
            
        
            
            return view('inicial',compact('dados','meta'));
        }
        
         
    }

    public function alterar_senha(Request $request)
    {
       
        $senhas = $request->all();

        //--------------------------
        //VERIFICO SE AS SENHAS ESTÃO IGUAIS
        //--------------------------
        if ($senhas['new_senha'] == $senhas['confirm_senha'] AND strlen($senhas['new_senha']) >= 6 ) {
            
            $id_user = auth()->user()->id;
            
            $dados = User::find($id_user);
            
            if ($dados->altera_senha == 1) {
               
                $dados->altera_senha  = 0;
                $dados->password = Hash::make($senhas['new_senha']);
                $dados->save();
                
                return redirect()->route('home');

            }else {
                return view('inicial');
            }

        }else {

            \Session::flash('mensagem',['msg'=>'Senhas Diferentes ou menor que 6 Digitos']);
            return redirect()->route('home');
        }
       
        
         
    }
}
