<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Metas;
use App\Atividade;
use App\Safra;
use App\Local;
use DB;

class MetasController extends Controller
{
    /**
     * index imprime todas as metas cadastradas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = DB::table('metas')
        ->join('safra', 'safra.id', '=', 'metas.id_safra')
        ->join('atividade', 'atividade.id', '=', 'metas.id_atividade')
        ->join('local', 'local.id', '=', 'metas.id_local')
        ->where('safra.terminou', '=', '0')
        ->where('atividade.apagada', '=', '0')
        ->where('local.apagada', '=', '0')
        ->select('metas.*', 'local.descricao as local', 'atividade.tipo as tipo', 'atividade.medicao as medicao', 'safra.descricao as safra', 'atividade.descricao as atividade')
        ->get();
        
        
        return view('Atividades.metas.home', compact('dados'));
    }
    /**
     * Safra_atual filta a safra atual na tela de metas
     *
     * @return \Illuminate\Http\Response
     */
    public function safra_atual()
    {

        $atual = safra::where('terminou', '0')->get();
        //dd($atual->count());
        if ($atual->count() > 1 ) {
            \Session::flash('mensagem',['msg'=>'Mais de uma Safra vigente, verificar cadastro!','class'=>'green white-text']);
            return redirect()->route('metas.inicio');
        }elseif ($atual->count() == 0) {
            \Session::flash('mensagem',['msg'=>'Nenhuma Safra vigente!','class'=>'green white-text']);
            return redirect()->route('metas.inicio');
        }
        
        $dados = metas::where('id_safra',$atual[0]->id)->get();
       
        return view('Atividades.metas.home', compact('dados'));
    }

    /**
     * Tela para criar uma nova meta
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $atividade = Atividade::where('apagada', '0')->get();
        $safra     = safra::where('terminou', '0')->get();
        $local     = local::where('apagada','0')->get();

       
     return view('Atividades.metas.create', compact('atividade','safra','local'));

    }

    /**
     * Store a salvar os dados da nova meta
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $dados = $request->all();

       
        $inseri = new Metas; 
        $inseri->id_atividade   = $dados['id_atividade'];
        $inseri->id_safra       = $dados['id_safra'];
        $inseri->id_local       = $dados['id_local'];
        $inseri->Data_inicio    = $dados['dt_ini'];
        $inseri->Data_fim       = $dados['dt_fim'];
        $inseri->valor_meta     = $dados['val_meta'];
        $inseri->finalizado     = 0;
        $inseri->func_apontados = 0;

        $inseri->save();

        \Session::flash('mensagem',['msg'=>'Meta Salva com sucesso']);

     return redirect()->route('metas.inicio');
    }

    public function update(Request $request)
    {
        
        $dados = $request->all();
       
        $inseri = Metas::find($dados['id']); 

        $inseri->id_atividade   = $dados['id_atividade'];
        $inseri->id_safra       = $dados['id_safra'];
        $inseri->id_local       = $dados['id_local'];
        $inseri->Data_inicio    = $dados['dt_ini'];
        $inseri->Data_fim       = $dados['dt_fim'];
        $inseri->valor_meta     = $dados['val_meta'];
        $inseri->finalizado     = 0;
        $inseri->func_apontados = 0;

        $inseri->save();

       \Session::flash('mensagem',['msg'=>'Meta Editada com sucesso']);

     return redirect()->route('metas.inicio');
    }

    public function edit($id)
    {

        $atividade = Atividade::where('apagada', '0')->get();
        $safra     = safra::where('terminou', '0')->get();
        $local     = local::where('apagada','0')->get();

        $dados = Metas::find($id);

//      dd($dados->Data_inicio);
     return view('Atividades.metas.edit', compact('atividade','safra','local','dados'));

    }
   }
