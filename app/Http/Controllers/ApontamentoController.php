<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\metas;
use App\safra;
use App\funcionario;
use DB;

class ApontamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $atual = safra::where('terminou', '0')->get();
        
        if ($atual->count() > 1 ) {
            \Session::flash('mensagem',['msg'=>'Mais de uma Safra vigente, verificar cadastro!','class'=>'green white-text']);
            return redirect()->route('home');
        }elseif ($atual->count() == 0) {
            \Session::flash('mensagem',['msg'=>'Nenhuma Safra vigente!','class'=>'green white-text']);
            return redirect()->route('home');
        }

        //$dados = metas::where('id_safra',$atual[0]->id)->get();
        $dados = DB::table('metas')
        ->join('safra', 'safra.id', '=', 'metas.id_safra')
        ->join('atividade', 'atividade.id', '=', 'metas.id_atividade')
        ->join('local', 'local.id', '=', 'metas.id_local')
        ->where('safra.terminou', '=', '0')
        ->where('atividade.apagada', '=', '0')
        ->where('local.apagada', '=', '0')
        ->where('id_safra',$atual[0]->id)
        ->select('metas.*', 'local.descricao as local', 'atividade.tipo as tipo', 'atividade.medicao as medicao','safra.descricao as safra', 'atividade.descricao as atividade')
        ->get();
       // dd($dados);
        return view('Atividades.apontamento.home',compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $dados = metas::find($id);
        $func  = funcionario::where('demitido', 0)->get();

        return view('Atividades.apontamento.create',compact('dados','func'));
    }
    public function reapontar($id)
    {
        $dados = metas::find($id);
        $func  = funcionario::where('demitido', 0)->get();

        return view('Atividades.apontamento.reapontar',compact('dados','func'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lValida = false;

        $dados = $request->all();
        if (isset($dados['funcs'])) {

            $funcionarios = implode(',', $dados['funcs']);

        }
        else   {
            
            $lValida = true;
        }


        
        //--------------------------
        //Validações Antes de Salvar
        //--------------------------

        //Valida campos em branco
        if ($lValida) {

            \Session::flash('mensagem',['msg'=>'ERRO!, Nenhum Funcionário apontado.']);
        
             return redirect()->route('apontamento.create',$dados['id']);

        }elseif (empty($dados['dt_ini']) OR empty($dados['dt_fim']) ) {
            
            \Session::flash('mensagem',['msg'=>'ERRO!, Nenhuma data apontada']);
        
             return redirect()->route('apontamento.create',$dados['id']);

        }elseif ($dados['dt_ini'] > $dados['dt_fim']) {
            
            \Session::flash('mensagem',['msg'=>'ERRO!, Data Inicial Maior que Final']);
        
             return redirect()->route('apontamento.create',$dados['id']);

        }
        
        

        $salvar = metas::find($dados['id']);

        $salvar->finalizado = 1;
        $salvar->Data_ini_aponta = $dados['dt_ini'];
        $salvar->Data_fim_aponta = $dados['dt_fim'];
        $salvar->func_apontados  = $funcionarios;
        $salvar->realizado  = $dados['quantidade'];

        $salvar->save();
        
        \Session::flash('mensagem',['msg'=>'Apontamento Realizado com Sucesso']);
        
        return redirect()->route('apontamento.inicio');
        
    }
    public function reapontar_store(Request $request)
    {
        $lValida = false;

        $dados = $request->all();
        if (isset($dados['funcs'])) {

            $funcionarios = implode(',', $dados['funcs']);

        }
        else   {
            
            $lValida = true;
        }


       
        
        //--------------------------
        //Validações Antes de Salvar
        //--------------------------

        //Valida campos em branco
        if ($lValida) {

            \Session::flash('mensagem',['msg'=>'ERRO!, Nenhum Funcionário apontado.']);
        
             return redirect()->route('apontamento.reapontar',$dados['id']);

        }elseif (empty($dados['dt_ini']) OR empty($dados['dt_fim']) ) {
            
            \Session::flash('mensagem',['msg'=>'ERRO!, Nenhuma data apontada']);
        
             return redirect()->route('apontamento.reapontar',$dados['id']);

        }
        
        

        $salvar = metas::find($dados['id']);

        $salvar->finalizado = 1;
        $salvar->Data_ini_aponta = $dados['dt_ini'];
        $salvar->Data_fim_aponta = $dados['dt_fim'];
        $salvar->func_apontados  = $funcionarios;
        $salvar->realizado  = $dados['quantidade'];

        $salvar->save();
        
        \Session::flash('mensagem',['msg'=>'Apontamento Realizado com Sucesso']);
        
        return redirect()->route('apontamento.inicio');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
